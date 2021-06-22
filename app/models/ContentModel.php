<?php
    class ContentModel extends Model
    {
        public function __construct()
        {
            $table = 'content';
            parent::__construct($table);
                 
        }
        public function getContent($page = '',$fields = [])
        {   $fieldsStr = "";
            if (empty($fields)) 
            {
                $fieldsStr = "*";
            } 
            else 
            {
                foreach($fields as $field)
                {
                    $fieldsStr .= $field . ",";
                }
               $fieldsStr = rtrim($fieldsStr,',');
            }
            if($page == '')
            {
                
                return $this->query("SELECT $fieldsStr FROM content ")->results();
               
            }
            return $this->query("SELECT $fieldsStr FROM content WHERE page= ?",[$page])->results();
        
        }
 

        public function getImgName($id)
        {
            $img = $this->findFirst(['conditions'=>'id=?','bind'=>[$id]]);
            $imgname = explode('/',$img->url);
            $imgname = end($imgname);
             return $imgname;
        }
       
    }