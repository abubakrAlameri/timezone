<?php
class BlogController extends Controller
{
    public function __construct($controller, $action)
    {
        parent::__construct($controller, $action);
        $this->view->setLayout('blogLayout');
        $this->load_model('blog');
        

    }
    public function indexAction($params = [])
    {
        if (!isset($params) || $params == '' || !is_numeric($params))
            $params = 1;
        $this->view->content =$this->blogModel->getBlogs($params);
       
        $this->view->render('blog/index');
    }
    public function blogDetailsAction($params = [])
    {
        if (!isset($params) || $params == '' || !is_numeric($params))
            Router::redirect("blog/index");
        $this->view->content = $this->blogModel->query("SELECT * FROM blog WHERE b_id=?", [$params])->results();
        $this->view->content = $this->view->content[0];
        $this->view->comments = $this->blogModel->query("SELECT * FROM comments WHERE b_id=?",[$params])->results();
        $this->view->render('blog/blogDetails');
    }
    public function addCommentAction($params = [])
    {

        if (Input::exists('sbmt_cmmt')) {
            //validation 
            $this->blogModel->setTable('comments');
            $this->blogModel->insert([
                'b_id' => $params,
                'name' => input::get('name'),
                'email' => input::get('email'),
                'comm_txt' => input::get('comment'),
                'c_date' => date("d M Y")
            ]);

            $this->blogModel->setTable('blog');
            $this->view->content = $this->blogModel->findFirst(['conditions' => 'b_id=?', 'bind' => [$params]]);
        
            $commts_num = $this->view->content->comments_num + 1;

            $this->blogModel->update(['b_id', $params], ['comments_num' => $commts_num]);
        } 
        Router::redirect("blog/blogDetails/$params");
    }

    
}
