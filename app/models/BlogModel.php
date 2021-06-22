<?php
class BlogModel extends Model
{
    static public $currentPage , $pagesNumber,$blogsPerPage;
    
    public function __construct()
    {
        $table = "blog";
        parent::__construct($table);
        self::$blogsPerPage = 4;
    
        //number of pages
        self::$pagesNumber = ceil($this->count()/self::$blogsPerPage);
       
    }
    public function getBlogs($currentPage)
    {
        self::$currentPage = $currentPage;
       
        $from = ($currentPage - 1) * self::$blogsPerPage;
        
        $to = $currentPage  * self::$blogsPerPage;
       
        return  $this->find(['limit' => $from . ',' . $to, 'order' => 'b_date']);
        
    }
    public function updateContent($id, $fields)
    {
        return $this->update($id, $fields);
    }
    public function getImgName($id)
    {
        $img = $this->findFirst(['conditions' => 'b_id=?', 'bind' => [$id]]);
        $imgname = explode('/', $img->img);
        $imgname = end($imgname);
        return $imgname;
    }

  
}
