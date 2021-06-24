<?php
   
  define('DS',DIRECTORY_SEPARATOR);
  define('ROOT',dirname(__FILE__));

  require_once(ROOT . DS . 'config' . DS . 'config.php');
  require_once(ROOT . DS . 'app' . DS . 'helpers' . DS . 'functions.php');
  require( ROOT .DS.'vendor' .DS .'autoload.php');
  // this function autoloading the autoload function from helpers/functions.php
  spl_autoload_register('autoload'); 


  session_start();

  // dnd(ROOT);
if (!Session::exists(GUEST))
  Session::set(GUEST, $_SERVER['REMOTE_ADDR']);


Router::route();


   
