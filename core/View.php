<?php
    class View{
        protected $_head , $_body , $_footer , $_siteTitle = SITE_TITLE, $_outputBuffer , $_layout = DEFAULT_LATOUT ;
        public function __construct()
        {
            # code...

        }
        public function render($viewName)
        {
 
           
            $viewAry = explode('/',$viewName);

            $viewString = implode(DS,$viewAry); // using DS because it's deffrent in every os
            if (file_exists(ROOT . DS . 'app'. DS . 'views' . DS . $viewString . '.php')) {
               
                include(ROOT . DS . 'app'. DS . 'views' . DS . $viewString . '.php');
                include(ROOT . DS . 'app' . DS . 'views' . DS . 'layouts' . DS . $this->_layout . '.php');

            }else{
                die('the view ' . $viewName . 'dose not exist');
            }
            
        }
        public function getContent($type)      
        {
           switch ($type) {
               case 'head':
                   return $this->_head;
                   break;
                case 'body':
                   return $this->_body;
                   break;
                case 'footer':
                    return $this->_footer;
                    break;
               default:
                   return false;
                   break;
           }
        }
        public function start($type)
        {
            $this->_outputBuffer = $type;
            ob_start();
            
        }
        public function end()
        {
            switch ($this->_outputBuffer) {
               case 'head':
                   $this->_head = ob_get_clean();
                   break;
                case 'body':
                   $this->_body = ob_get_clean();
                   break;
                case 'footer':
                    $this->_footer = ob_get_clean();
                    break;
               default:
                   die('you must run the start method');
                   break;
           }
            
        }
    
        public function getTitle()
        {
            return $this->_siteTitle;
        }
        public function setTitle($title)
        {
            $this->_siteTitle = $title ;
        }
        public function setLayout($path)
        {
            $this->_layout = $path;
        }

        public function buildTable($rows)
        {
            //dnd($rows);
            
            $html = "";
            
            foreach($rows as $row)
            {
                
                $html .="<tr>";
                $html .="<form id='".$row->id."' enctype='multipart/form-data' action='". PROOT ."admin/editeContent/' method='post'>";
                $html .= "</form>";
                $html .= "<td>$row->id";
                $html .= "<td>$row->page";
                $html .= "<input form='" . $row->id . "' type='hidden' name='id' value='" . $row->id . "'>";
                $html .="</td>";

                $html .= "<td>$row->type";
                $html .= "<input form='" . $row->id . "' type='hidden' name='type' value='" . $row->type . "'>";
                $html .= "</td>";
                if($row->type == 'img')
                {
                    // content and url
                    $html .= "<td><img loading='lazy' width='60' id='d_img" . $row->id ."' src='" . $row->url . "'></td>";
                    $html .= "<td><input form='" . $row->id . "' class='form-controll' type='file' name='img' onchange='".'readURL(this,'.'`#d_img' . $row->id . "`)' ></td>";
                }
                else
                {
                    $html .= "<td><input form='" . $row->id . "' class='form-control' type='text' name='text' value='" . $row->text . "'></td>";
                    if ($row->type == 'txt')
                    {//text
                        $html .= "<td></td>";
                    }
                    else
                    {//linkes
                        $html .= "<td><input form='" . $row->id . "' class='form-control' type='text' name='url' value='" . $row->url . "'></td>";
                    }
                }
               
                $html .= "<td>";
                $html .= "<button form='" . $row->id . "' type='submit' name='editeContent' class='btn btn-info' >";
                $html .= "save<i class='fas fa-fw fa-cog'></i>";
                $html .= "</button>";
                $html .="</td>";

                
                $html .="</tr>";
                 
            }            
            return $html;
        }

    }