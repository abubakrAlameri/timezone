<?php 
class Router{
    
    public static function route(){
       
        $url = isset($_SERVER['PATH_INFO']) ? explode('/', ltrim($_SERVER['PATH_INFO'], '/')) : [];
        
        //controller
       $controller_name = (isset($url[0]) && $url[0] !='') ? ucwords($url[0]) . 'Controller' : DEFAULT_CONTROLLER;
       $controller = (isset($url[0]) && $url[0] !='') ? ucwords($url[0]) : 'Home';
       
       array_shift($url); //delete first element (controller)

        //action
        $action_name = (isset($url[0]) && $url[0] !='') ? $url[0] . 'Action' : 'indexAction';
        $action = (isset($url[0]) && $url[0] !='') ? $url[0] : 'index';
       array_shift($url); //delete first element (action)


        //parameters
        $params =  isset($url)  ? $url : [];

//for 404 errors
        if (!class_exists($controller_name)) {
           
            $params[] = $controller;
            $controller_name = ACCESS_RESTRICTED;
            $action_name  = 'notFoundAction';
        }
       
       //check acl
       $grantaccess = self::hasAccess($controller_name, $action_name);
     
       if(!$grantaccess)
       {
            $controller_name = ACCESS_RESTRICTED;
            $action_name  = 'indexAction';
       }

            $dispatch = new $controller_name($controller_name  , $action_name);
   
        if(method_exists($controller_name, $action_name)){
           
            call_user_func_array([$dispatch, $action_name],$params);
            
        }else{
           self::redirect("restricted/notFound/" . $action);
        }



    }
   
    public static function redirect($location)
    {       
        
        if(!headers_sent())
        {            
            header("Location: " . PROOT . $location);
        }
        else
        {
            echo `<script >
                  window.location.href= {PROOT}{$location}
                  </script>
                  <noscript>
                  <meta http-equiv="refresh" content="0;url='{PROOT}{$location}'">
                  </noscript>`;
        }
        die();
    }

    public static function hasAccess($controller, $action)
    {
        $acl_file = file_get_contents(ROOT . DS . 'app' . DS . 'acl.json');
    
        $acl = json_decode($acl_file,true);
        $current_user_acls = ['Gust'];
        $grantaccess = false;
        if(Session::exists(CURRENT_USER_SESSION_NAME) || Cookie::exists(REMEMBER_ME_COOKIE_NAME))
        {
            $current_user_acls[] = 'LoggedIn';
            // get user cls from database and add them to $current_user_acls
            // foreach(currentUser()->acl() as $a)
            // {
            //     $current_user_acls[] = $a;
            // }
        }
      
        foreach($current_user_acls as $level)
        {
            if(array_key_exists($level,$acl) && array_key_exists($controller,$acl[$level]))
            {
                if(in_array($action,$acl[$level][$controller]) || in_array("*",$acl[$level][$controller]))
                {  
                    $grantaccess = true;
                    break;
                }
            }
        }
       
     
       //check fro denied
       foreach($current_user_acls as $level)
       {
           $denied = $acl[$level]['denied'];
           if(!empty($denied) && array_key_exists($controller,$denied) && in_array($action,$denied[$controller]))
           {
                $grantaccess = false;
                break;
           }
       }
       
       return $grantaccess;
    }
    // public static function getMenu($menu)
    // {
    //    $menuAry = [];
    //    $menuFile = file_get_contents(ROOT . DS . 'app' . DS . $menu . '.json');
    //    $acl = json_decode($menuFile,true);
    //    //dnd($acl);
    //   // $k =''; $v ='';
    //    foreach($acl AS $key => $value)
    //    {
    //        if(is_array($value))
    //         {   $sub = [];
    //             foreach($value as $k => $v)
    //             {
    //                 if($k == 'separator' && !empty($sub))
    //                 {
    //                     $sub[$k] = '';
    //                     continue; 
    //                 }
    //                 elseif($finalVal = self::get_link($v))
    //                 {
                       
    //                     $sub[$k] = $finalVal;

    //                 }
                    
    //             }
               
    //             if(!empty($sub))
    //             {
    //                 $menuAry[$key] = $sub; 
    //             }
    //         }
    //         else
    //         {
    //             if($finalVal = self::get_link($value))
    //             {
    //                 $menuAry[$key] = $finalVal; 
    //             }
    //         }
    //    }
    //    return $menuAry;
    // }
    // private static function get_link($val)
    // {
    //     if(preg_match('/https?:\/\//',$val) == 1)
    //     {
    //         return $val;
    //     }
    //     else
    //     {
    //         $uAry = explode('/',$val);
           
    //         $controller = ucwords($uAry[0]).'Controller';
        
    //         $action = (isset($uAry[1])) ? $uAry[1] . 'Action': '';
    //         if(self::hasAccess($controller,$action))
    //         {
    //             return PROOT . $val;
    //         }
    //     }
    //     return false;
    
    // }
}