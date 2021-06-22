<?php
    class HomeController extends Controller{
        public function __construct($controller, $action)
        {
            parent::__construct($controller,$action);
            $this->view->setLayout('default');
            $this->load_model('content');
            $this->load_model('product');
            
        }
        public function indexAction($params = [])
        {
            
            // dm([$_SERVER['HTTP_CLIENT-ID']]);
            // dm([$_SERVER['HTTP_X_FORWARDED_FOR']]);
            // dnd([$_SERVER['REMOTE_ADDR']]);

           $this->view->content = $this->contentModel->getContent('home');
           $this->view->newArrivals = $this->productModel->newArrivals();
          
           $this->view->popular = $this->productModel->getProducts(6);
  
            $this->view->render('home/index'); 
        }
        public function aboutAction($params = [])
        {
            $this->view->render('home/about'); 
        }

        public function contactAction($params = []) 
        {
      
      
            $this->view->render('home/contact');
        }
        public function submitFormAction($params = [])
        {
            $name = Input::get('name');
            $subject = Input::get('subject');
            $messege = Input::get('messege');
            $from = Input::get('email');
            $to = "abubakralameri75@gmail.com";
            $header = array(
                'from' => $from,
                'Reply-Tp' => $to,
                'X-Mailer' => 'PHP/' . phpversion(),
                'Content-Type' => 'text/plaim; charset=utf-8'
            );

            if (!mail($to, $subject, $messege, $header)) 
            {
                $this->josnResponse('Can Not Send Email');
            }
            else
            {
            $this->josnResponse('Email Send Successfully');
            }
           
           
        }

    }

