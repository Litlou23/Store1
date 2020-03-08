<?php

require_once "vendor/autoload.php";

class ControllerExtensionPaymentStripe extends Controller {

	public function index() {
        $order_info = $this->model_checkout_order->getOrder($this->session->data['order_id']);

		$data = $this->charge($this->currency->convert($order_info['total'], 'USD', $this->session->data['currency']), $_POST['stripeToken']);
        return $this->load->view('extension/payment/stripe', $data);
    }

	public function charge($amount, $paymentMethodID){
		$returnInfo = array();
		try {
			// Use Stripe's library to make requests...
			// Set your secret key. Remember to switch to your live secret key in production!
			// See your keys here: https://dashboard.stripe.com/account/apikeys
			\Stripe\Stripe::setApiKey('sk_test_6RXiAQuXpmFJ1iOyAjbkam4M00kG8xhfwU');

			//Multiplying amount by 100 to convert to decimal
			$paymentIntent = \Stripe\PaymentIntent::create([
				'amount' => $amount * 100,
				'currency' => $this->session->data['currency'],
				'payment_method' => $paymentMethodID
			]);

			$returnInfo['client_secret'] = $paymentIntent->client_secret; 
			return $returnInfo;
	  }
	  catch(\Stripe\Exception\CardException $e) {
		  // Since it's a decline, \Stripe\Exception\CardException will be caught
		  echo 'Status is:' . $e->getHttpStatus() . '\n';
		  echo 'Type is:' . $e->getError()->type . '\n';
		  echo 'Code is:' . $e->getError()->code . '\n';
		  // param is '' in this case
		  echo 'Param is:' . $e->getError()->param . '\n';
		  echo 'Message is:' . $e->getError()->message . '\n';
		} catch (\Stripe\Exception\RateLimitException $e) {
		  // Too many requests made to the API too quickly
		} catch (\Stripe\Exception\InvalidRequestException $e) {
		  // Invalid parameters were supplied to Stripe's API
		} catch (\Stripe\Exception\AuthenticationException $e) {
		  // Authentication with Stripe's API failed
		  // (maybe you changed API keys recently)
		} catch (\Stripe\Exception\ApiConnectionException $e) {
		  // Network communication with Stripe failed
		} catch (\Stripe\Exception\ApiErrorException $e) {
		  // Display a very generic error to the user, and maybe send
		  // yourself an email
		} catch (Exception $e) {
            //Display generic error
	    }
    }
}