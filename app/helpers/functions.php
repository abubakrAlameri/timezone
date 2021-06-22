<?php
    require_once(ROOT . DS . 'app' . DS . 'helpers' . DS . 'helpers.php');
    
  function autoload($className){
        if(file_exists(ROOT . DS . 'core' . DS . $className . '.php'))
             require_once(ROOT . DS . 'core' . DS . $className . '.php');
        elseif (file_exists(ROOT . DS . 'app' . DS . 'controllers' . DS . $className . '.php'))
            require_once(ROOT . DS . 'app' . DS . 'controllers' . DS . $className . '.php');
        elseif (file_exists(ROOT . DS . 'app' . DS . 'models' . DS . $className . '.php'))
            require_once(ROOT . DS . 'app' . DS . 'models' . DS . $className . '.php');
        elseif (file_exists(ROOT . DS . 'app' . DS . 'views' . DS . $className . '.php'))
            require_once(ROOT . DS . 'app' . DS . 'views' . DS . $className . '.php');
    }

    function sanitize($dirty)
    {
        return htmlentities($dirty, ENT_QUOTES , 'UTF-8');
    }
    function posted_values()
    {
        return ['fname' => Input::get('fname'),
                'lname' => Input::get('lname'), 
                'username' => Input::get('fname') .' '. Input::get('lname'),
                'email' => Input::get('email'), 
                'password' => Input::get('password'), 
                'confirm' => Input::get('confirm')
            ];

    }
    function product($id)
    {
         return ProductModel::getProductById($id);
    }
  
    // function pageRefreshed()
    // {
    //     return isset($_SERVER['HTTP_CACHE_CONTROL']) && $_SERVER['HTTP_CACHE_CONTROL'] == 'max-age=0';
    // }

  