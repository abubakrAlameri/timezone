<?php
    class Validate
    {
        private  $_errors = [] , $_db = null;

        public function __construct()
        {
            $this->_db = new Model();
        }

        public function check($source , $items=[])
        {
            
            $this->_errors = [];
           
            foreach($items as $item => $rules)
            {
                //$item = Input::sanitize($item);
                $display = $rules['display'];
                $file = isset($rules['file']) ? $rules['file'] :null;
                foreach($rules as $rule => $rule_value)
                {
                    if($file)
                    {
                       
                    
                        if ($rule == 'required' && $source['name'] == '') 
                        {
                            $this->addError("$display is required");
                        } 
                        elseif (!empty($source)) 
                        {
                            switch ($rule)
                            {
                           
                                case'maxsize':
                                    if( $source['size'] > $rule_value) 
                                    {
                                        $byesize = $rule_value / 1000;
                                        $this->addError("$display size bigger than $byesize KB");
                                    }
                                break;
                                case 'valideExt':
                                    $temp = explode('.', $source['name']);
                                    $ext = end($temp);
                                    //dnd($ext);
                                    if(!in_array($ext,['png','webp','jpg']))
                                    {
                                        //check level 1
                                        $this->addError("$display  have  illegal content use image with (png,webp,jpg,jpeg) extentsons");

                                    }
                                    else 
                                    {
                                        //check level 2
                                        $mime =explode(';', finfo_file(finfo_open(FILEINFO_MIME), $source['tmp_name']));
                                  
                                        if (!in_array($mime[0], $rule_value)) {

                                            $this->addError("$display have  elligal content use image with (png,webp,jpg,jpeg) extentions");
                                        }

                                    }
                                    
                                    break;
                            }
                        }
                                    
                    }
                    else
                    {
                        $input_value = Input::sanitize(trim($source[$item]));
                        if ($rule == 'required' && empty($input_value)) 
                        {
                            $this->addError("$display is required");
                        } 
                        elseif (!empty($input_value)) 
                        {
                            switch ($rule) {
                                case 'min':
                                    if (strlen($input_value) < $rule_value)
                                        $this->addError("$display must be a minimum of $rule_value characters.");
                                    break;

                                case 'max':
                                    if (strlen($input_value) > $rule_value)
                                        $this->addError("$display must be a maximum of $rule_value characters.");
                                    break;

                                case 'matches':
                                    if ($input_value != $source[$rule_value]) {
                                        $matchDisplay = $items[$rule_value]['display'];
                                        $this->addError("$matchDisplay and $display must match");
                                    }
                                    break;

                                case 'unique':
                                    $check = $this->_db->query(
                                        "SELECT $item FROM $rule_value WHERE $item = ?",
                                        [$input_value]
                                    );
                                    if ($check->count() > 0) {

                                        $this->addError("$display is aleardy exist");
                                    }
                                    break;

                                case 'unique_update':
                                    $t = explode(',', $rule_value);
                                    $table = $t[0];
                                    $id = $t[1];
                                    $check = $this->_db->query(
                                        "SELECT * FROM $table WHERE $id != ? AND $item = ?",
                                        [$id, $input_value]
                                    );
                                    if ($check->count() > 0) {
                                        $this->addError("$display is aleardy exist");
                                    }
                                    break;

                                case 'is_num':
                                    if (is_numeric($input_value)) {
                                        $this->addError("$display must be numeric");
                                    }
                                    break;

                                case 'valid_email':
                                    if (!filter_var($input_value, FILTER_VALIDATE_EMAIL)) {
                                        $this->addError("$display must be valid email address");
                                    }
                                    break;
                               
                            }
                        }
                    }
                    
                }
            }
        }
        public function addError($error)
        {
            $this->_errors [] = $error;
        }
        public function errors()
        {
            return $this->_errors;
        }
        public function passed()
        {

            if (empty($this->_errors))
               return true;
            
            return false;
     
        }
        public function displayErrors()
        {
            //<pre class='px-2 py-2 bg-gradient-danger text-white text-md'>". Session::get('status') ."</pre>
            $html= "<pre class='px-2 py-2 bg-gradient-danger text-white text-md'>";
            foreach($this->_errors as $e)
            {
                $html .= "$e\n";
              
            }
            $html .= "</pre>";
           
            return $html;
        }
    }
