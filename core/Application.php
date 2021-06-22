<?php // did not understand this file 
    class Application{
        public function __construct(){
            $this->_set_reporting();
            $this->_unregister_globals();
        }
        private function _set_reporting(){
            if(DEBUG){
                error_reporting(E_ALL);
                ini_set("display_errors",1);
            }else{
                error_reporting(0);
                ini_set("display_errors",0);
                ini_set("log_errors",1);
                ini_set("erro_log", ROOT . DS . 'tmp' . DS . 'logs' . DS . 'errors.log');
              
            }
        }
        private function _unregister_globals(){
            if(ini_get('register_glogals')){
                $globalsAry = ['_SESSION' , '_COOKIE' , '_POST' , '_GET' , '_REQUSET' ,'_SERVER' , '_ENV' , '_FILES'];
                foreach($globalsAry as $g){
                    foreach($_GLOBALS[$g] as $k => $v){
                        if($_GLOBALS[$k] === $v){
                            unset($_GLOBALS[$k]);
                        }
                    }
                } 
            }
        }
    } 