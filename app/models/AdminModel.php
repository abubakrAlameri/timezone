<?php
class AdminModel extends Model
{
    public static $currentAdmin =null;
    public function __construct()
    {
        $table = "admin";
        parent::__construct($table);
        if(Session::exists(CURRENT_USER_SESSION_NAME))
        {
            self::$currentAdmin = $this->findFirst([
                'conditions' => 'ad_id =?',
                'bind' => [Session::get(CURRENT_USER_SESSION_NAME)]
            ]);
        }

     
    }
    public function getAdmin($email)
    {
        return $this->findFirst(['conditions'=>'email = ?', 'bind' => [$email]]);
    }
    public function login($remembr_me,$admin)
    {
        Session::set(CURRENT_USER_SESSION_NAME,$admin->ad_id);
        if($remembr_me)
        {  $this->setTable('cookie');
            $hash = md5(uniqid() + rand(0, 100));
            Cookie::set(REMEMBER_ME_COOKIE_NAME,$hash,REMEMBER_ME_COOKIE_EXPIRY);
            $this->delete(['user_id', $admin->ad_id]);
            $uagent = Session::uagent_no_version();
            $this->insert(['user_id' => $admin->ad_id ,'user_agent'=>$uagent,'cookie_name'=>$hash]);

        }
        self::$currentAdmin = $admin;
        
        Router::redirect('admin/index');
    }
    public function loginFromCookie()
    {
        if(Cookie::exists(REMEMBER_ME_COOKIE_NAME))
        {
            $this->setTable('cookie');
            $uagent = Session::uagent_no_version();
            $session = $this->findFirst([
                'conditions' => "cookie_name =? AND user_agent=?",
                'bind'=>[Cookie::get(REMEMBER_ME_COOKIE_NAME),$uagent]
                ]);
            Session::set(CURRENT_USER_SESSION_NAME,$session->user_id);
            $this->setTable('admin');
            self::$currentAdmin = $this->findFirst([
                'conditions' => 'ad_id =?',
                'bind' => [$session->user_id]
            ]);
            Router::redirect('admin/index');
        }
        
    }
    public function logout()        
    {
       
        if (Session::exists(CURRENT_USER_SESSION_NAME)) 
        {
            $this->setTable('cookie');
            $this->delete(['user_id',Session::get(CURRENT_USER_SESSION_NAME)]);
            Session::delete(CURRENT_USER_SESSION_NAME);
            if(Cookie::exists(REMEMBER_ME_COOKIE_NAME))
                Cookie::delete(REMEMBER_ME_COOKIE_NAME);
            self::$currentAdmin = null;
        }
    }
}
