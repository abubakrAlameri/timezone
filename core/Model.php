<?php
///  I need to insure this class will be instantionate just one time
    class Model
    {
        private $_table;
        private $_pdo, $_query , $_error = false , $_result , $_count = 0 , $_lastInsertID = null;

        public function __construct($table = '')
        {
            $this->_table = $table;
            try {
                $this->_pdo = new PDO(SERVER_INFO,USER_NAME,PASSWORD);
                $this->_pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                $this->_pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
            } catch (PDOException $e) {
                die($e->getMessage());
            }
        }
       
        public function query($sql,$parms=[])
        {
            //dm($parms,__FILE__);
            $this->_error = false;
            //check if sql is not empty and prepare sql stetmant in query var
            if ($this->_query = $this->_pdo->prepare($sql) ) {
              
                $i= 1;
                // check if there is params
                if(count($parms)){
                  
                    foreach($parms as $p){
                        //bind each param in it's place
                        $this->_query->bindvalue($i,$p);
                        $i++;
                    }
                }
           
                if ($this->_query->execute()){
                    $this->_result = $this->_query->fetchALL(PDO::FETCH_OBJ);
                    $this->_count = $this->_query->rowCount();
                    $this->_lastInsertID = $this->_pdo->lastInsertId();
                }else{
                    $this->_error = true;
                }
            }
        
            
            return $this;
          
        }
        public function setTable($table)
        {
            $this->_table = $table;
        }
      

        /* 
         * to use find and findFirst function 
         * you nust pass an array 
         * the array have four params: 
         *  [
         *   'condtions' => 'your condtion',
         *   'bnid' => 'your binds if you use ? , its alawes an array',
         *   'order' => 'by whitch field you want to order thr results',
         *   'limit' => 'limit number'
         *  ]
         */
        public function find($params = [])
        {
           
            if($this->_read($params))
                return $this->results();
            
            return false;
        }
        public function findFirst($params = [])
        {
       
            if($this->_read($params))
                return $this->first();
            
            return false;
        }
        protected function _read($params = [])
        {
            ///dnd($params);
            $conditionsString = '';
            $bind = [];
            $order = '';
            $limit= '';
            //conditioin
            if(array_key_exists('conditions',$params) && ($params['conditions'] != '')){
                
                    $conditionsString = "WHERE " . $params['conditions'];
            }

            //binds

            if(array_key_exists('bind',$params))
            {
                $bind = $params['bind'];
            }
             //ORDER
            if(array_key_exists('oder',$params))
            {
                $order = "ORDER BY " . $params['order'];
            }
            //limit
            if(array_key_exists('limit',$params))
            {
                $limit = "LIMIT " . $params['limit'];
            }

            $sql = " SELECT * FROM $this->_table $conditionsString $order $limit";

        
            if(!$this->query($sql,$bind)->error())
            {
                
                if(!count($this->_result))
                    return false;
                else 
                    return true;

            }
            else
            {
                return false;
            }
        }
        public function insert($fields = [])
        {
           
            $fieldString = '';
            $valueString = '';
            $values = [];
            // remove all null values from array
            $fields = array_filter($fields);

            foreach ($fields as $field => $value) {
                $fieldString .= "`$field`,";
                $valueString .= '?,';
                $values[] = $value;
            }
            $fieldString = rtrim($fieldString, ',');
            $valueString = rtrim($valueString, ',');
            $sql = "INSERT INTO $this->_table ($fieldString) VALUES ($valueString)";

            if (!$this->query($sql, $values)->error()) {
                return true;
            } else {
                return false;
            }
        }
        public function update($id =[], $fields = [])
        {
          
            $fieldString = '';
            $valuse = [];
            $id_col = $id[0];
            foreach ($fields as $field => $value) {
                $fieldString .= "$field=?,";
                $valuse[] = $value;
            }
            $fieldString = rtrim($fieldString, ',');
            $sql = "UPDATE $this->_table SET $fieldString WHERE $id_col = $id[1]";
        
            if (!$this->query($sql, $valuse)->error()) {
                return true;
            } else {
                return false;
            }
        }
        public function delete($id =[])
        {
            
            $id_col = $id[0];
            $sql = "DELETE FROM $this->_table WHERE $id_col=$id[1]";
            // dnd($sql);
            if (!$this->query($sql)->error()) {
                return true;
            } else {
                return false;
            }
        }

        public function get_Columns()
        {
            return $this->query("SHOW COLUMNS FROM $this->_table")->results();
        }
        public function results()
        {
            return $this->_result;
        }
        public function first()
        {
            return (!empty($this->_result)) ? $this->_result[0] : [];
        }
        public function count()
        {
            $this->_count = $this->query("SELECT count(*) as c FROM $this->_table")->results()[0]->c;
        
           return $this->_count;
           
        }
        public function lastID()
        {
            return $this->_lastInsertID;
        }
        public function error()
        {
            return $this->_error;
        }
    }
    