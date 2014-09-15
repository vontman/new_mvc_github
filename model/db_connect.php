<?php
    class db_connect{
        public $link;
        public function connect(){
            try{
                $this->link=mysqli_connect("localhost","root","","softdb");
                return $this->link;
            } catch (Exception $ex){
                return $ex->getMessage();
            }
        }

    }
?>