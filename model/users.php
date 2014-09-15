<?php
    class users{
        public $link;
        public $functions;
        public $userlogin_id;
        public function __construct(){
            include_once 'db_connect.php';
            try{
                $connect_db=new db_connect();
                $this->link=$connect_db->connect();
                include_once 'functions.php';
                $this->functions=new db_functions();
            } catch (Exception $ex) {
                return mysqli_error($this->link);   
            }
        }
        public function checkuser($input,$password=false,$input_id=0){
            switch ($input_id){
                case 0:
                $query="SELECT username FROM users WHERE username='$input'";
                    break;    
                case 1:
//                $query="SELECT username,password FROM users WHERE username='$input' AND password='$password'";
                $query="SELECT username FROM users WHERE password='$input'";
                    break;
                case 2:
                $query="SELECT email FROM users WHERE email='$input'";
                    break;
                default:
                    break;
            }
            $sql=  mysqli_query($this->link, $query);
            return mysqli_affected_rows($this->link);
        }
        public function login($username,$password){
            $query="SELECT id,username,password FROM users WHERE username='$username' AND password='$password'";
            $sql=  mysqli_query($this->link, $query);
            while($rows=  mysqli_fetch_array($sql)){
                $this->userlogin_id=$rows['id'];
            }
            $aff_rows=  mysqli_affected_rows($this->link);
            return $aff_rows;
        }
        public function register($user=array()){
//            $user_add=implode("','",$user);
//            $user_cols=implode(",", array_keys($user));
//            $query="INSERT INTO users($user_cols) VALUE('$user_add')";
//            try{
//                $sql=  mysqli_query($this->link, $query);
//            } catch (Exception $ex) {
//                return mysqli_error($this->link);
//            }
            try{
                return $this->functions->insert("users", $user);
            } catch (Exception $ex) {
                return $ex->getMessage();
            }
        }
        public function update_user($user_edit,$id){
//            foreach($user as $k=>$v){
//                $user_input[]=$k."='".$v."' ";
//            }
//            $user_edit=implode(",",$user_input);
//            $query="UPDATE users SET $user_edit WHERE id='$id'";
//            try{
//                $sql=  mysqli_query($this->link, $query);
//                return $query;
//            } catch (Exception $ex) {
//                return mysqli_error($this->link);
//            }
            try{
                return $this->functions->update("users", $user_edit, $id);
            } catch (Exception $ex) {
                return $ex->getMessage();
            }
        }
        public function view_user($user_id,$cols=false){
//            if(!$input){
//                $query="SELECT * FROM users WHERE username='$user_id'";
//            }
//            else{
//                $input_edit=implode(",","'".$input."'");
//                $query="SELECT ($input_edit) FROM users WHERE username='$user_id'";
//            }
//            try{
//                $sql=  mysqli_query($this->link, $query);
//                return $sql;
//            } catch (Exception $ex) {
//                return mysqli_error($this->link);
//            
            try{
                return $this->functions->select("users", $cols, $user_id);
            } catch (Exception $ex) {
                return $ex->getMessage();
            }
        }
    }
?>