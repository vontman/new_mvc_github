<?php
    class tasks{
        public $link;
        public $functions;
        public function __construct(){
            include_once 'db_connect.php';
            include_once 'functions.php';
            try{
                $connect_db=new db_connect();
                $this->link=$connect_db->connect();
                $this->functions=new db_functions();
            } catch (Exception $ex) {
                return mysqli_error($this->link);   
            }
        }
        public function add_task($task){
            try{
                return $this->functions->insert("tasks", $task);
            } catch (Exception $ex) {
                return $ex->getMessage();
            }
        }
        public function view_tasks($user_id,$order=false,$limit=false){
            $query="SELECT * FROM tasks WHERE user_id='$user_id'";
            if($order){
                $query.=" ORDER BY $order[0] $order[1]";
            }
            if($limit){
                $query.=" LIMIT 0,$limit";
            }
            try{
                $sql=  mysqli_query($this->link, $query);
                return $sql;
            } catch (Exception $ex) {
                return $ex->getMessage();
            }
        }
        public function view_task($id){
            try{
                $this->functions->select("tasks", false, $id);
            } catch (Exception $ex) {
                return $ex->getMessage();
            }
        }
        public function categories(){
            try{
                return $this->select("tasks_categories",array("id","name","color"));
            } catch (Exception $ex) {
                return $ex->getMessage();
            }
        }
    }
?>