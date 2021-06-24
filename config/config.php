<?php
  
    define('DEBUG' , true);  // use it in application
   
    define('DEFAULT_CONTROLLER', 'HomeController');  //if there is not controller in the url

    define('DEFAULT_LATOUT', 'default');  //use this layout in View calss
    define('PROOT', "/timezone/"); //set this for '/' in live server
    define('SITE_TITLE', 'Time Zone');  // if there is no site title

    // we use id (127.0.0.1) instade of domin name(localhost) becuase it's faster
    define('SERVER_INFO', 'mysql:host=localhost;dbname=timezone'); // in db class
    define('USER_NAME', 'root');  // in db class
    define('PASSWORD', ''); // in db class
    

    define('CURRENT_USER_SESSION_NAME', 'JDDGsdkjdhHBHBbhdbH');  // give it a random chars 
    define('GUEST','DHIUBhducd5tgh57knh32H3uGduyio');// fror any visitor
    define('REMEMBER_ME_COOKIE_NAME','fhdbhHBjbnbfbHFBlhnf');  // give it a random chars 
    define('REMEMBER_ME_COOKIE_EXPIRY',259200 *30);  // this number is in secondes which equals 30 days
     

    define('ACCESS_RESTRICTED','RestrictedController'); /// used in router/route for acl