<?php
class RegisterController extends Controller
{
    public function __construct($controller, $action)
    {
        parent::__construct($controller, $action);
        $this->view->setLayout('registerLayout');
        $this->load_model('admin');
        
        
    }
    public function loginAction($params = [])
    {
        if(Cookie::exists(REMEMBER_ME_COOKIE_NAME))
        {
            
            $this->adminModel->loginFromCookie();
        }
     
        //dnd( password_hash('0000',PASSWORD_DEFAULT));
        $this->view->render('register/login');
    }

    public function verifyAction($params = [])
    {
        
        if(isset($_POST['login']))
        {
            $validation = new Validate();
            $validation->check($_POST,[
                'email' => ['required' =>true, 'display' =>'Email', 'valid_email' => true],
                'password' => ['required' =>true, 'display' =>'Password']
                
            ]); 
            if($validation->passed())
            {
                
                if (
                    $this->adminModel->getAdmin(Input::get('email'))
                    && password_verify(Input::get('password'), $this->adminModel->first()->password)
                    ) 
                {
                    
                    if(Input::exists('remember_me'))
                    {
                        $this->adminModel->login(true, $this->adminModel->first());
                    }
                    else
                    {
                        $this->adminModel->login(false, $this->adminModel->first());
                    }

                }
                else
                {
                    Session::set('status', "<p class='px-2 py-2 bg-gradient-danger text-white text-md'>Incorrect Email or Password </p>");
                }
            }
            else
            {
                Session::set('status', $validation->displayErrors());
            }
            Router::redirect('register/login');
        }
    }

    public function logoutAction($params = [])
    {
        
        if(Input::exists('logout')){

            
            $this->adminModel->logout();
          
            Router::redirect('register/login');
        }
    }

    public function forgetPasswordtAction($params = [])
    {
        $this->view->render('home/contact');
    }
}
