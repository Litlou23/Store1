// Create a Stripe client.
var stripe = Stripe('pk_test_wznGDJwRSgwIxHphH1NKd71K00ot5kpq9r');
 
// Create an instance of Elements.
var elements = stripe.elements();
 
// Custom styling can be passed to options when creating an Element.
// (Note that this demo uses a wider set of styles than the guide below.)
var style = {
    base: {
        color: '#32325d',
        fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
        fontSmoothing: 'antialiased',
        fontSize: '16px',
        '::placeholder': {
            color: '#aab7c4'
        }
    },
    invalid: {
        color: '#fa755a',
        iconColor: '#fa755a'
    }
};
 
// Create an instance of the card Element.
var card = elements.create('card', {style: style});
 
// Add an instance of the card Element into the `card-element` <div>.
$( document ).ready(function() {
card.mount('#card-element');
});
 
// Handle real-time validation errors from the card Element.
card.addEventListener('change', function(event) {
    var displayError = document.getElementById('card-errors');
    if (event.error) {
        displayError.textContent = event.error.message;
    } else {
        displayError.textContent = '';
    }
});
 
// Handle form submission.
var paymentMethodDiv = document.getElementById('payment-method-form');
function submitCreditCardInfo() {
    stripe.createPaymentMethod(
        {
            type: 'card',
            card: card,
        }).then(function(result) {
        if (result.error) {
            // Inform the user if there was an error.
            var errorElement = document.getElementById('card-errors');
            errorElement.textContent = result.error.message;
        } else {
            // Send the token to your server.
            stripeTokenHandler(result.paymentMethod);
        }
    });
}
 
// Submit the form with the token ID.
function stripeTokenHandler(token) {
    // Insert the token ID into the form so it gets submitted to the server
    var form = document.getElementById('payment-method-form');
    var hiddenInput = document.createElement('input');
    hiddenInput.setAttribute('type', 'hidden');
    hiddenInput.setAttribute('name', 'stripeToken');
    hiddenInput.setAttribute('value', token.id);
    hiddenInput.setAttribute('id', 'stripeToken');
    form.appendChild(hiddenInput);
    getConfirmPaymentDiv();
}

function getConfirmPaymentDiv(){
    $.ajax({
        url: 'index.php?route=checkout/payment_method/save',
        type: 'post',
        data: $('#collapse-payment-method input[type=\'radio\']:checked, #collapse-payment-method input[type=\'checkbox\']:checked, #collapse-payment-method textarea, #collapse-payment-method input[type=\'hidden\']'),
        dataType: 'json',
        success: function(json){
            if (json['error']) {
                $('#button-payment-method').button('reset');
                
                if (json['error']['warning']) {
                    $('#collapse-payment-method .panel-body').prepend('<div class="alert alert-danger alert-dismissible">' + json['error']['warning'] + '<button type="button" class="close" data-dismiss="alert">&times;</button></div>');
                }
            } else {
                $.ajax({
                    url: 'index.php?route=checkout/confirm',
                    dataType: 'html',
                    data:
                    {
                        payment_method: $("#payment_method").val(),
                        stripeToken: $("#stripeToken").val(),
                    },
                    method: "POST",
                    success: function(html) {
                        $('#collapse-checkout-confirm .panel-body').html(html);
            
                        $('#collapse-checkout-confirm').parent().find('.panel-heading .panel-title').html('<a href="#collapse-checkout-confirm" data-toggle="collapse" data-parent="#accordion" class="accordion-toggle">Step 6: Confirm Order<i class="fa fa-caret-down"></i></a>');
            
                        $('a[href=\'#collapse-checkout-confirm\']').trigger('click');
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                        alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
                    },
                });
            }
        },
        error: function(xhr, ajaxOptions, thrownError) {
            alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
        }
    });
}

//Submit the credit card information to the stripe API, then open up the confirm payment form
document.getElementById('payment-method-confirm').addEventListener('click', function(){
    debugger;
    submitCreditCardInfo();
});