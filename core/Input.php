<?php
    class Input  
    {
        public static function sanitize($dirty)
        {
            return htmlentities($dirty,ENT_QUOTES,'UTF-8');
        }
        public static function get($input)
        {
            if(isset($_POST[$input]))
                return self::sanitize($_POST[$input]);
            else if(isset($_GET[$input]))
                return self::sanitize($_GET[$input]);
            
            
        }
        public static function exists($input)
        {
            if (isset($_POST[$input]) || isset($_GET[$input]))
                return true;
            return false;
        }
        public static function fileExists($input)
        {
            if (isset($_FILES[$input]))
                return true;
            return false;
        }
        
        public static function getFile($input)
        {
            
            return $_FILES[$input];
            
        }
    }
    