<?php
class ProductModel extends Model
{
    static public $currentPage, $pagesNumber, $productsPerPage;
    public function __construct()
    {
        $table = "product";
        parent::__construct($table);
        self::$productsPerPage = 4;

        //number of pages
        self::$pagesNumber = ceil($this->count() / self::$productsPerPage);
    }
    public function newArrivals($num = 3)
    {
        return $this->find([
            'conditions' => 'quantity>0',
            'order' => 'date',
            'limit' => $num
        ]);
    } 
    public function getProducts($ppp = 0, $currentPage = 1)
    {
        if($ppp != 0)
        {
            self::$productsPerPage =$ppp;
        }

        self::$currentPage = $currentPage;

        $from = (self::$currentPage - 1) * self::$productsPerPage;

        $to = self::$currentPage  * self::$productsPerPage;

        return  $this->find(['limit' => $from . ',' . $to, 'order' => 'b_date']);
    }
    public function getImgName($id)
    {
        $img = $this->findFirst(['conditions' => 'b_id=?', 'bind' => [$id]]);
        $imgname = explode('/', $img->img);
        $imgname = end($imgname);
        return $imgname;
    }
    public static function getProductById($id)
    {
        $productModel = new ProductModel();
        return $productModel->findFirst(['conditions' => 'p_id=?', 'bind'=> [$id]]);
    }

    public function productExists($id,$ses = '')
    {
        $conditions = "";
        $bind = [];
        if(isset($ses))
        {
            $conditions = "p_id = ? AND session = ?";
            $bind = [$id,$ses];
        }
        else
        {
            $conditions = "p_id = ?";
            $bind = [$id];
        }
        
        if($this->findFirst(['conditions'=> $conditions , 'bind'=>$bind]))
            return true;

        return false;
            
    }
    /*
        INSERT INTO students 
        (id, score1, score2)
        VALUES 
            (1, 5, 8),
            (2, 10, 8),
            (3, 8, 3),
            (4, 10, 7)
        ON DUPLICATE KEY UPDATE 
            score1 = VALUES(score1),
        score2 = VALUES(score2);

    */

    public function updateCart($fields = [])
    {
        $valuseStr = '';
        $bind = [];
        foreach($fields as $row)
        {
            $valuseStr .="(?,?,?),";
            foreach($row as $v)  
                $bind [] =$v;
        }
        $valuseStr = rtrim($valuseStr, ',');
        $sql = "INSERT INTO cart (session,p_id,quantity) VALUES $valuseStr ON DUPLICATE KEY UPDATE quantity = VALUES(quantity)";
        $this->query($sql,$bind);
    }
}
