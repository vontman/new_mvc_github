<?php
    class posts{
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
        public function add_views($post_type,$post_id){
            $query="SELECT id,views FROM $post_type WHERE id='$post_id'";
            try{
                $sql=  mysqli_query($this->link, $query);
                while($rows=  mysqli_fetch_array($sql)){
                    $views=$rows['views'];
                }
                $views++;
//                $query="UPDATE $post_type SET views='$views' WHERE id='$post_id'";
                try{
//                    $sql=  mysqli_query($this->link, $query);
//                    return mysqli_insert_id($this->link);
                    $update['views']=$views;
                    $this->functions->update($post_type, $update, $post_id);
                    return $views;
                } catch (Exception $ex) {
                    return $ex->getMessage();
                }
            } catch (Exception $ex) {
                return $ex->getMessage();
            }
        }
        public function add_news($input){
//            $input_adds=implode("','",$input);
//            $input_cols=implode(",", array_keys($input));
//            $query="INSERT INTO $post_type($input_cols) VALUES('$input_adds')";
            try{
//                $sql=  mysqli_query($this->link, $query);
                return $this->functions->insert("news", $input);
            } catch (Exception $ex) {
                return mysqli_error($this->link);
            }
        }        
        public function add_topics($input){
            try{
//                $sql=  mysqli_query($this->link, $query);
                return $this->functions->insert("topics", $input);
            } catch (Exception $ex) {
                return mysqli_error($this->link);
            }
        }
        public function view_topics($post_id,$cols=false,$order=false,$limit=false){
//            if(!$cols){
//                if (!$post_id){
//                    if(!$limit)
//                        $query="SELECT * FROM $post_type";
//                    else
//                        $query="SELECT * FROM $post_type LIMIT 0,$limit";
//                }
//                else{
//                    $query="SELECT * FROM $post_type  WHERE id='$post_id'";
//                }
//            }
//            else{
//                $cols_input=implode(",",$cols);
//                if(!$post_id){
//                    if(!$limit)
//                        $query="SELECT $cols_input FROM $post_type";
//                    else
//                        $query="SELECT $cols_input FROM $post_type LIMIT 0,$limit";
//                }
//                else
//                    $query="SELECT $cols_input FROM $post_type WHERE id='$post_id'";
//            }
            try{
//                $sql=  mysqli_query($this->link, $query);
//                return $sql;
                return $this->functions->select("topics", $cols, $post_id, $order, $limit);
            } catch (Exception $ex) {
                return $ex->getMessage();
            }
        }
        public function view_news($cols=false,$post_id=false,$order=false,$limit=false){
            try{
                return $this->functions->select("news", $cols, $post_id, $order, $limit);
            } catch (Exception $ex) {
                return $ex->getMessage();
            }
        }
        public function view_post($post_type,$cols=false,$post_id=false,$order=false,$limit=false){
            try{
                return $this->functions->select($post_type, $cols, $post_id, $order, $limit);
            } catch (Exception $ex) {
                return $ex->getMessage();
            }
        }
        public function edit_topics($post_input,$post_id){
//            foreach($post_input as $k=>$v){
//                $input_edit[]=$k."='".$v."'";
//            }
//            $input=implode(",",$input_edit);
//            $query="UPDATE $post_type SET $input WHERE id='$post_id'";
            try{
//                $sql=  mysqli_query($this->link, $query);
                $this->functions->update("topics", $post_input, $post_id);
            } catch (Exception $ex) {
                return mysqli_error($this->link);
            }
        }        
        public function edit_news($post_input,$post_id){
//            foreach($post_input as $k=>$v){
//                $input_edit[]=$k."='".$v."'";
//            }
//            $input=implode(",",$input_edit);
//            $query="UPDATE $post_type SET $input WHERE id='$post_id'";
            try{
//                $sql=  mysqli_query($this->link, $query);
                $this->functions->update("news", $post_input, $post_id);
            } catch (Exception $ex) {
                return mysqli_error($this->link);
            }
        }
        public function view_comments($comments_type,$post_id,$cols=false,$order=false,$limit=false){
            if(!$cols){
                $query="SELECT * FROM $comments_type WHERE post_id='$post_id'";
            }
            else{
                $cols_input=implode(",",$cols);
                $query="SELECT $cols_input FROM $comments_type WHERE post_id='$post_id'";
            }
            try{
                $sql=  mysqli_query($this->link, $query);
                return $sql;
//                $this->functions->select($comments_type, $cols, $post_id, $order, $limit);
            } catch (Exception $ex) {
                return $ex->getMessage();
            }
        }
        public function categories_array(){
            try{
                return $this->categories_array("categories");
            } catch (Exception $ex) {
                return $ex->getMessage();
            }
        }
    }
?>