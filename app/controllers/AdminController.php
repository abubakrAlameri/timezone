<?php
class AdminController extends Controller
{
    public function __construct($controller, $action)
    {
        parent::__construct($controller, $action);
        $this->view->setLayout('adminLayout');
        $this->load_model('admin');
        $this->load_model('content');
        $this->load_model('product');
        $this->load_model('blog');
        $this->load_model('admin');
       

    }
    public function indexAction($params = [])
    {
       
        $this->view->info = $this->productModel->query(
            "SELECT SUM(pa.total) as total_earnings,
                    COUNT(pa.order_id) as orders_num,
                    COUNT(p.p_id) as products_num, 
                    COUNT(b.b_id) as blogs_num 
            FROM payment as pa , product as p , blog as b"
        )->results()[0];
        // dnd($this->view->info);
        $this->view->render('admin/index');
    }

    public function editeContentAction($params = [])
    {
        //$this->contentModel = new ContentModel();
     
 
        if($_POST)
        {
            $type = Input::get('type');
            if($type == 'img')
            {
                $img = Input::getFile('img');
                $status = $this->uploadImg($this->contentModel->getImgName(Input::get('id')), "assets/img");
              
                if($status['passed'])
                {
                    Session::set('status', "<pre class='px-2 py-2 bg-gradient-success text-white text-md'>Content Updated</pre>");
                    
                    //upload the new img
                    if ($status['uploaded'])
                    $this->contentModel->update(['id',Input::get('id')], ['url' => PROOT . "assets/img/" . $img['name']]);
                
                }
               
            }
            else
            {
                // when the content to be updated is url or text
              
                Session::set('status', "<pre class='px-2 py-2 bg-gradient-success text-white text-md'>Content Updated</pre>");
                if($type == 'txt')
                $this->contentModel->update(['id', Input::get('id')], ['text' => Input::get('text')]);
                if ($type == 'lnk')
                $this->contentModel->update(['id', Input::get('id')], ['text' => Input::get('text'),'url'=> Input::get('url')]);
                 
                
            }
         
        }   
        
        

        $this->view->content = $this->contentModel;
      
        $this->view->render('admin/editeContent');
    }

    public function productsAction($params = [])
    {
        if (!isset($params) || $params == '' || !is_numeric($params))
            $params = 1;

       // $this->productModel = new ProductModel();

        $this->view->products = $this->productModel->getProducts($params);
        //dnd($this->view->products);
        $this->view->render('admin/products');
    }
    public function editeProductsAction($params = [])
    {
        //$this->productModel = new ProductModel();
        if(Input::exists('delete'))
        {
         
            $this->productModel->delete(['p_id',Input::get('id')]);
            Session::set('status', "<p class='px-2 py-2 bg-gradient-success text-white text-'>Product Deleted Successsfully</p>");
            Router::redirect('admin/products');
        }

        if (Input::exists('edite')) 
        {
            $this->view->product = $this->productModel->findFirst(['conditions'=> 'p_id = ?', 'bind'=>[Input::get('id')]]);
           // dnd($this->view);
            $this->view->render('admin/manageProduct');
        }

        if (Input::exists('add')) 
        {
            dnd($_POST);
            $this->view->render('admin/manageProduct');
        }


        if (Input::exists('insert')) 
        {
            
                $validation = new Validate();
                //$this->productModel = new ProductModel();

                
                $validation->check($_POST, [
                    'name' => ['required' => true, 'display' => 'name'],
                    'description' => ['required' => true, 'display' => 'description'],
                    'cost' => ['required' => true, 'display' => 'cost'],
                    'quantity' => ['required' => true, 'display' => 'quantity'],
                ]);
               
                if($validation->passed())
                {
             
                    if (Input::get('insert') == 'add') 
                    {
                   
                        if (Input::fileExists('img')) 
                        {
                            $img = Input::getFile('img');
                            $status = $this->uploadImg($img['name'], "assets/img/gallery");
                            if ($status['passed']) {
                                if ($status['uploaded'])
                                    $this->productModel->insert([
                                        'name' => Input::get('name'),
                                        'description' => Input::get('description'),
                                        'img' => PROOT . "assets/img/gallery/" . $img['name'],
                                        'cost' => Input::get('cost'),
                                        'quantity' => Input::get('quantity')

                                    ]);
                            Session::set('status', "<p class='px-2 py-2 bg-gradient-success text-white text-'>Product added successsfully </p>");
                            } 
                            else 
                            {
                                Session::set('status', $validation->displayErrors());

                                $this->view->render('admin/manageProduct');
                            }
                        } 
                        else 
                        {
                            Session::set('status', "<p class='px-2 py-2 bg-gradient-danger text-white text-'>Image is required </p>");
                            $this->view->render('admin/manageProduct'); 
                        }

                      
                    }
                    else if(Input::get('insert') == 'update')
                    {
               
                        if ($_FILES['img']['name'] !='') 
                        {
                        
                            $img = Input::getFile('img');
                            $status = $this->uploadImg($img['name'], "assets/img/gallery");
                            if ($status['passed']) {
                                if ($status['uploaded'])
                                    $this->productModel->update(['p_id',Input::get('id')],[
                                        'name' => Input::get('name'),
                                        'description' => Input::get('description'),
                                        'img' => PROOT . "assets/img/gallery/" . $img['name'],
                                        'cost' => Input::get('cost'),
                                        'quantity' => Input::get('quantity')

                                    ]);
                            Session::set('status', "<p class='px-2 py-2 bg-gradient-success text-white text-'>Product updated successsfully </p>");
                            } 
                            else 
                            {
                                Session::set('status', $validation->displayErrors());

                                $this->view->render('admin/manageProduct');
                            }
                        } 
                        else 
                        {
                     
                          
                            $this->productModel->update(['p_id', Input::get('id')], [
                                'name' => Input::get('name'),
                                'description' => Input::get('description'),

                                'cost' => Input::get('cost'),
                                'quantity' => Input::get('quantity')

                            ]);
                        Session::set('status', "<p class='px-2 py-2 bg-gradient-success text-white text-'>Product updated successsfully </p>");
                        }

                    }
                   
                

                } 
                else 
                {
                    Session::set('status', $validation->displayErrors());

                    $this->view->render('admin/manageProduct');
                }
            
            Router::redirect('admin/products');
        }
       
        
    }

    public function addBlogAction($params = [])
    {
        
        $this->view->render('admin/addBlog');
    }
    public function addingAction($params =[])
    {
        if (isset($_POST['post'])) {
            if (Input::fileExists('img')) {
                $validation = new Validate();
                //$this->blogModel =new BlogModel();

                $img = Input::getFile('img');
                $status = $this->uploadImg($img['name'], "assets/img/blog");
                $validation->check($_POST, [
                    'title' => ['required' => true, 'display' => 'Title'],
                    'text' => ['required' => true, 'display' => 'text']
                ]);
                Session::set('status', $validation->displayErrors());
                if ($status['passed'] && $validation->passed()) {
                    if ($status['uploaded'])
                    $this->blogModel->insert([
                        'title' => Input::get('title'),
                        'text' => Input::get('text'),
                        'img' => PROOT . "assets/img/blog/" . $img['name'],
                        'comments_num' => 0,
                        'b_date' => date("d M Y")
                    ]);
                } else {

                    Router::redirect('admin/addBlog');
                }
            }


            Session::set('status', "<p class='px-2 py-2 bg-gradient-success text-white text-'> Blog Posted successsfully</p>");
            Router::redirect('admin/addBlog');
        }
    }
    public function blogListAction($params = [])
    {
        if (!isset($params) || $params == '' || !is_numeric($params))
            $params = 1;
   
       // $this->blogModel = new BlogModel();

        $this->view->content =$this->blogModel->getBlogs($params);
        $this->view->render('admin/blogList');
    }
    public function editeBlogAction($params = [])
    {
        

        //$this->blogModel = new BlogModel();
        if(isset($_POST['delete']))
        {
            $this->blogModel->delete(['b_id',Input::get('id')]);
            Session::set('status', "<p class='px-2 py-2 bg-gradient-success text-white text-'> Blog deleted successsfully</p>");
            Router::redirect('admin/blogList');
        }

        if (isset($_POST['edite'])) {
            $this->view->content = $this->blogModel->find(['conditions'=>'b_id=?','bind'=>[Input::get('id')]]);
            $this->view->content = $this->view->content[0];
            //show([$this->view->content->img]);die();
            $this->view->render('admin/editeBlog');
        }

        if (isset($_POST['update'])) 
        {
            if(Input::fileExists('img'))
            {
                $img = Input::getFile('img');
                $status = $this->uploadImg($this->blogModel->getImgName(Input::get('id')), "assets/img/blog");
                if ($status['passed']) 
                {

                    //upload the new img
                    if ($status['uploaded'])
                        $this->blogModel->update(['b_id',Input::get('id')], ['img' => PROOT . "assets/img/blog/" . $img['name']]);
                } 
                else 
                {
                    Router::redirect('admin/blogList');
                } 
            }
           
            $this->blogModel->update(
                ['b_id',Input::get('id')],
                ['title'=> Input::get('title'),'text'=> Input::get('text')]
            );
           
            Session::set('status', "<p class='px-2 py-2 bg-gradient-success text-white text-'> Blog Updated successsfully</p>");
            Router::redirect('admin/blogList');
        }
        die();
        
    }

    public function uploadImg($imgname,$path)
    {
        $status = ['passed' => false, 'uploaded' => false] ;
        $pathStr='';
        $pathArr = explode('/',$path);
        $validation = new Validate();
        $img = Input::getFile('img');

        //show([$_FILES]);

        $validation->check($img, [
            'img' => [
                'file' => true,
                'display' => "Blog Image",
                'required' => true,
                // 'maxsize' => 70000,
                'valideExt' => ['image/png', 'image/webp', 'image/jbg', "image/jpeg"]
            ]
        ]);
        if ($validation->passed()) {
            $status['passed'] = true;
            foreach($pathArr as $val )
            {
                $pathStr .= DS . $val;
            }
            if (file_exists(ROOT . $pathStr . DS . $imgname)) {
                unlink(ROOT . $pathStr . DS . $imgname);
            }
            //upload the new img
            if (move_uploaded_file($img['tmp_name'], ROOT . $pathStr . DS . $img['name']))
            $status['uploaded'] = true;

        }
        else
        {
            Session::set('status', $validation->displayErrors());
        }
        
        return $status;
    }

 
}
