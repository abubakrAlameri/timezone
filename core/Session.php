<?php
    class Session
    {
        public static function exists($name)
        {
            return (isset($_SESSION[$name])) ? true : false;
        }
        public static function get($name)
        {
            return $_SESSION[$name];
        }
        public static function set($name , $val)
        {
            return $_SESSION[$name] = $val;
        }
        public static function delete($name)
        {
            if(self::exists($name))
                unset($_SESSION[$name]);
        }
        public static function uagent_no_version()
        {
            /// remove versions from the user agent to store them and it's gives more scure
            $uagent = $_SERVER['HTTP_USER_AGENT'];
            $regex = '/\/[a-zA-Z0-9.]+/';

            $str = preg_replace($regex,'',$uagent);
            return $str;
        }
    }