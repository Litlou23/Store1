<?php

require_once "vendor/autoload.php";

class ControllerExtensionPaymentStripe extends Controller {

	public function index() {
        $order_info = $this->model_checkout_order->getOrder($this->session->data['order_id']);

		$data = $this->charge($this->currency->convert($order_info['total'], 'USD', $this->session->data['currency']), $_POST['stripeToken'], $_POST['backupClientSecret']);
        return $this->load->view('extension/payment/stripe', $data);
    }

	public function charge($amount, $paymentMethodID, $backupClientSecret){
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

			$returnInfo['client_secret'] = $paymentIntent->id; 
	  }
	  catch(\Stripe\Exception\CardException $e) {
		  // Since it's a decline, \Stripe\Exception\CardException will be caught
		  $returnInfo['error'] ='Status is:' . $e->getHttpStatus() . '\n'
		  . 'Type is:' . $e->getError()->type . '\n'
		  . 'Code is:' . $e->getError()->code . '\n'
		  . 'Param is:' . $e->getError()->param . '\n'
		  . 'Message is:' . $e->getError()->message . '\n';
		} catch (\Stripe\Exception\RateLimitException $e) {
		  // Too many requests made to the API too quickly
		  $returnInfo['error'] = 'Error: Too many payment requests';
		} catch (\Stripe\Exception\InvalidRequestException $e) {
		  // Invalid parameters were supplied to Stripe's API
		  if(isset($backupClientSecret) && !empty($backupClientSecret) && $e->GetError()->message == "The provided PaymentMethod is already attached to another object. You cannot reuse PaymentMethods without attaching them to a Customer object first."){
			  //User went back and clicked on the confirm button a second time for some reason without changing any cc information, just ignore it
			  $returnInfo['client_secret'] = $backupClientSecret; 
		  }
		  else{
			$returnInfo['error'] = 'Error: Invalid payment parameters. ' . $e->GetError()->message;
		  }
		} catch (\Stripe\Exception\AuthenticationException $e) {
		  // Authentication with Stripe's API failed
		  // (maybe you changed API keys recently)
		  $returnInfo['error'] = 'Error: Authentication for Stripe failed. API keys possibly out of date';
		} catch (\Stripe\Exception\ApiConnectionException $e) {
		  // Network communication with Stripe failed
		  $returnInfo['error'] = 'Error: Failed to connect to Stripe';
		} catch (\Stripe\Exception\ApiErrorException $e) {
		  // Display a very generic error to the user, and maybe send
		  // yourself an email
		  $returnInfo['error'] = 'Error: Issue with Stripe payment API';
		} catch (Exception $e) {
			//Display generic error
			$returnInfo['error'] = 'Error: Issue with Stripe payment API';
		}
		
		return $returnInfo;
	}
	
	public function confirm() {
		if ($this->session->data['payment_method']['code'] == 'stripe') {
			$this->load->model('checkout/order');

			\Stripe\Stripe::setApiKey('sk_test_6RXiAQuXpmFJ1iOyAjbkam4M00kG8xhfwU');

			try{
			// To create a PaymentIntent for confirmation, see our guide at: https://stripe.com/docs/payments/payment-intents/creating-payment-intents#creating-for-automatic
				$payment_intent = \Stripe\PaymentIntent::retrieve(
					$this->request->get['client_code']
				);
				$response = $payment_intent->confirm();
	
				if($response['status'] == 'succeeded')
				{
					$this->model_checkout_order->addOrderHistory($this->session->data['order_id'], $this->config->get('payment_stripe_order_status_id'));
			
					$this->response->redirect($this->url->link('checkout/success', '', true));
				}
				else
				{
					$this->response->redirect($this->url->link('checkout/failure', '', true));
				}	
			} catch (\Stripe\Exception\RateLimitException $e) {
				// Too many requests made to the API too quickly
				$this->response->redirect($this->url->link('checkout/failure', '', true));
			} catch (\Stripe\Exception\InvalidRequestException $e) {
				// Invalid parameters were supplied to Stripe's API
				$this->response->redirect($this->url->link('checkout/failure', '', true));
			} catch (\Stripe\Exception\AuthenticationException $e) {
				// Authentication with Stripe's API failed
				// (maybe you changed API keys recently)
				$this->response->redirect($this->url->link('checkout/failure', '', true));
			} catch (\Stripe\Exception\ApiConnectionException $e) {
				// Network communication with Stripe failed
				$this->response->redirect($this->url->link('checkout/failure', '', true));
			} catch (\Stripe\Exception\ApiErrorException $e) {
				// Display a very generic error to the user, and maybe send
				// yourself an email
				$this->response->redirect($this->url->link('checkout/failure', '', true));
			} catch (Exception $e) {
				  //Display generic error
				  $this->response->redirect($this->url->link('checkout/failure', '', true));
			}
		}
	}
}