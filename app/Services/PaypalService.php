<?php

namespace App\Services;

use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Amount;
use PayPal\Api\Transaction;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Payment;
use PayPal\Api\Payer;
use PayPal\Api\PaymentExecution;
use Request;

class PaypalService {
    private $apiContext;
    private $itemList;
    private $paymentCurrency;
    private $totalAmount;
    private $returnUrl;
    private $cancelUrl;

    public function __construct()
    {
        $paypalConfigs = config('paypal');

        $this->apiContext = new ApiContext(
        	new OAuthTokenCredential(
            	$paypalConfigs['client_id'],
                $paypalConfigs['secret']
            )
        );

        $this->paymentCurrency = "USD";
        $this->totalAmount = 0;
    }
}
