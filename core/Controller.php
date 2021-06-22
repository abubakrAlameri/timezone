<?php
    class Controller extends Application{
        protected $_controller , $_action;
        public $view;
        public function __construct($controller,$action){
            parent::__construct();
            $this->_controller = $controller;
            $this->_action = $action;
            $this->view = new View();

        }

        protected function load_model($m)
        {
            $model = $m . 'Model';
            if (class_exists($model)) {
                $this->{$model} = new $model(strtolower($m));
            }
        }

        public function josnResponse($response)
        {
            header("Access-Control-Allow-Origin: *");
            header("Content-Type: application/json");
            http_response_code(200);
            echo json_encode($response);
            exit;

        }
    }