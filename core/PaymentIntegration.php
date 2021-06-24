<?php

use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Api\ExecutePayment;
use PayPal\Api\PaymentExecution;

    class PaymentIntegration 
    {

        private $_apiContext,$_payer, $_redirectUrls,$_payment;
        public function __construct()
        {
            
            $this->_apiContext = new \PayPal\Rest\ApiContext(
                new \PayPal\Auth\OAuthTokenCredential(
                    'AXrJH_SwN3flixf-I_EXDVAl1Rw426_dPZRT3iyYPty2oXXGivvz6A6mNMyVMVCAAQ50uiwkHdtzlY0w', // client id
                    'ELNmtCYTrriBBsOENulmQNVcd1ML5ES-keMJ1r8_JcV8z_9fptGuEYizWHjTeRMDytoDvtTFur1Cvp3Z'  // secret
                )
            );
            // Create new payer and method
            $this->_payer = new Payer();
            $this->_payer->setPaymentMethod("paypal");

        // Set redirect URLs
            $this->_redirectUrls = new RedirectUrls();
            $this->_redirectUrls->setReturnUrl('http://timezone.great-site.net/timezone/shop/exec/')
            ->setCancelUrl('http://timezone.great-site.net/timezone/shop/checkout/');

        }
   
        public function preparePayment($products,$subtotal,$shiping,$tax)
        {
            $total = $subtotal + $shiping + $tax;
            $itemsArry = [];
            foreach($products as $p)
            {
                 // Set item list
                $item = new Item();
                $item->setName($p->name)
                ->setCurrency('USD')
                ->setQuantity($p->quantity)
                ->setPrice($p->total_cost);

                $itemsArry [] = $item;

            }
     
            // dnd($itemsArry);

            $itemList = new ItemList();
            $itemList->setItems($itemsArry);

            // Set payment details
            $details = new Details();
            $details->setShipping($shiping)
            ->setTax($tax)
            ->setSubtotal($subtotal);

            // Set payment amount
            $amount = new Amount();
            $amount->setCurrency("USD")
                ->setTotal($total)
                ->setDetails($details);

            // Set transaction object
            $transaction = new Transaction();
            $transaction->setAmount($amount)
            ->setItemList($itemList)
            ->setDescription("Pay for timezone")
            ->setInvoiceNumber(uniqid());

            // Create the full payment object
            $this->_payment = new Payment();
            $this->_payment->setIntent("order")
            ->setPayer($this->_payer)
            ->setRedirectUrls($this->_redirectUrls)
            ->setTransactions(array($transaction));
        // echo '----------';
        //     dnd($this);

        }
        

        public function sendPayment()
        {
            // Create payment with valid API context
            try {

                $this->_payment->create($this->_apiContext);
              
                // Get PayPal redirect URL and redirect the customer
                $approvalUrl = $this->_payment->getApprovalLink();
                // dnd($approvalUrl);
                header("Location: $approvalUrl");
                // Redirect the customer to $approvalUrl
            } catch (PayPal\Exception\PayPalConnectionException $ex) {
               Router::redirect('restricted/paymentError');
            } catch (Exception $ex) {
                Router::redirect('restricted/paymentError');
            }
        }
        public function confirmPayment()
        {

            // Get payment object by passing paymentId
            $paymentId = $_GET['paymentId'];
            $payment = Payment::get($paymentId, $this->_apiContext);

            // Execute payment with payer id
            $execution = new PaymentExecution();
            $execution->setPayerId($_GET['PayerID']);

            try {
                // Execute payment
                $result = $payment->execute($execution, $this->_apiContext);
                return $result;
            } catch (PayPal\Exception\PayPalConnectionException $ex) {
                Router::redirect('restricted/paymentError');
            } catch (Exception $ex) {
                Router::redirect('restricted/paymentError');
            }
            
        }

    }