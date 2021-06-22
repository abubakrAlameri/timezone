<?php
class RestrictedController extends Controller
{
    public function __construct($controller, $action)
    {
        parent::__construct($controller, $action);
        $this->view->setLayout('errorLayout');
      
    }
    public function indexAction($params = [])
    {

        Router::redirect('home/index');
    }
    public function notFoundAction($params = [])
    {
        $this->view->content = $params;
        $this->view->render('restricted/404');
    }
    public function paymentErrorAction($params = [])
    {
        $this->view->render('restricted/paymentError');
    }
  
  
}
