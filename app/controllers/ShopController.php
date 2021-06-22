<?php
    
    class ShopController extends Controller
    {
        public function __construct($controller , $action)
        {
            parent::__construct($controller,$action);
            $this->view->setLayout('default');
            $this->load_model('product');
  
            
        }
        public function indexAction($params = [])
        {
        if (!isset($params) || $params == '' || !is_numeric($params))
            $params = 1;
            $this->view->content = $this->productModel->getProducts(6,$params);
        
            $this->view->render('shop/index');
        }
        public function  productDetailsAction($params = [])
        {
            if (!isset($params) || $params == '' || !is_numeric($params))
                Router::redirect('home/index');

            $this->view->content = $this->productModel->findFirst(['conditions' => 'p_id=?','bind' => [$params]]);
            $this->view->render('shop/productDetails');
        }
        public function cartAction($params = [])
        {
            if(Session::exists(GUEST))
            {
                $this->productModel->setTable('cart');
               
                $this->view->cart = $this->productModel->find(['conditions'=>'session=?' , 'bind' => [Session::get(GUEST)]]);
                
                $this->view->cart = ($this->view->cart) ?  $this->view->cart : [];
                $this->view->render('shop/cart');

            }
            Router::redirect('home/index');
        }
        public function addToCartAction($params = [])
        {
            $cost = $this->productModel->query("SELECT cost FROM product WHERE p_id =?",[Input::get('p_id')])->first();
            $this->productModel->setTable('cart');
          
            if(!$this->productModel->productExists(Input::get('p_id'),Session::get(GUEST)))
            {
                $this->productModel->insert(['session' => Session::get(GUEST), 'p_id' => Input::get('p_id'), 'total_cost' => $cost->cost]);
            }
            
    
      
        }
        public function updateCartAction($params = [])
        {
            $fields =[];
           
            
            foreach($_POST as $p_id => $quantity)
            {
                $fields [] = [Session::get(GUEST),$p_id,$quantity];
            }
            $this->productModel->setTable('cart');
            $this->productModel->updateCart($fields); 
            Router::redirect('shop/cart');
        }
        public function deleteCartItemAction($params = [])
        {
            if(Input::exists('delete_cart'))
            {

                $this->productModel->setTable('cart');
                 $this->productModel->delete(['p_id',Input::get('p_id')]);               
            Router::redirect('shop/cart');
            }
       
        }
        public function checkoutAction($params = [])
        {
          
            $products = $this->productModel->query(
                            "SELECT p.name ,c.p_id , c.quantity , c.session , c.total_cost 
                             FROM cart as c INNER JOIN product as p 
                             ON p.p_id = c.p_id 
                             WHERE c.session =?",
                             [Session::get(GUEST)]
            )->results();
            //get shiping and tax from database
            $shiping = $this->productModel->query("SELECT * FROM shiping")->results()[0];
            $subtotal = 0;
            
            foreach($products as $p)
            {
                //colculate suntotal
                $subtotal += $p->quantity * $p->total_cost;
            }
            if(Input::exists('send'))
            {
                $payment = new PaymentIntegration();
                $payment->preparePayment(
                    $products,
                    $subtotal,
                    $shiping->shiping,
                    $shiping->tax
                );
                $payment->sendPayment();

            }
            
            $this->view->products = $products;
            $this->view->shiping = $shiping;
            $this->view->subtotal = $subtotal;

            $this->view->render('shop/checkout');
        }
     
        public function execAction($params = [])
        {
            $payment = new PaymentIntegration();
            $paymentInfo = $payment->confirmPayment();
            $info = [];
            $info['id'] = $paymentInfo->getId();
            $payerInfo = $paymentInfo->getPayer()->getPayerInfo();

            $info['email'] = $payerInfo->getEmail();
            $info['fname'] = $payerInfo->getFirstName();
            $info['lname'] = $payerInfo->getLastName();

            $shiping = $payerInfo->getShippingAddress();

            $info['line1'] = $shiping->getLine1();
            $info['city'] = $shiping->getCity();
            $info['state'] = $shiping->getState();
            $info['postal_code'] = $shiping->getPostalCode();


            $info['order_date'] = $paymentInfo->getCreateTime();
            $info['total'] = $paymentInfo->getTransactions()[0]->getAmount()->getTotal();

            $this->productModel->setTable('payment');
            $this->productModel->insert(
                [
                    'order_id' => $info['id'],
                    'email' => $info['email'],
                    'fname' => $info['fname'],
                    'lname' => $info['lname'],
                    'line1' => $info['line1'],
                    'city' => $info['city'],
                    'state' => $info['state'],
                    'postal_code' => $info['postal_code'],
                    'total' => $info['total'],
                    'order_date' => $info['order_date']
                ]
            );
            Session::set('info',$info);
            
            Router::redirect('shop/confirmation');
            
        }
        public function confirmationAction()    
        {
            $this->view->info = Session::get('info');
            $this->view->render('shop/confirmation');
            
       
        }
    }