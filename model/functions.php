<?php
    class db_functions{
        public $link;
        public function __construct(){
            include_once ('db_connect.php');
            $connect_db=new db_connect();
            $this->link=$connect_db->connect();
        }
        public function select($table,$cols=false,$id=false,$order=false,$limit=false){
//            if(!$cols){
//                $cols_select="*";
//            }
//            else{
//                $cols_select=implode(",",$cols);
//            }
//            if(!$order){
//                if(!$id){
//                    $query="SELECT $cols_select FROM $table";
//                }
//                else{
////                        $id_name=implode(",",$id);
////                        $id_select=implode("','", "'".array_keys($id)."'");
//                    $query="SELECT $cols_select FROM $table WHERE id='$id'";
//                }
//            }
//            else{
//                if(!$limit){
//                    $query="SELECT $cols_select FROM $table ORDER BY $order[0] $order[1]";
//                }
//                else{
//                    $query="SELECT $cols_select FROM $table ORDER BY  $order[0] $order[1] LIMIT  0 , $limit";
//                }
//            }
            if($cols){
               $cols_input=implode(",",$cols);
            }
            else{
                $cols_input="*";
            }
            $query="SELECT $cols_input FROM $table ";
            if($id){
                $id_input="WHERE id=$id";
                $query.=$id_input;
            }
            if($order){
                $order_input="ORDER BY $order[0] $order[1] ";
                $query.=$order_input;
            }
            if($limit){
                $limit_input="LIMIT 0,$limit ";
                $query.=$limit_input;
            }
            try{
                $sql=  mysqli_query($this->link, $query);
                return $sql;
            } catch (Exception $ex) {
                return $ex->getMessage();
            }
        }
        public function insert($table,$input){
            $input_adds=implode("','",$input);
            $input_cols=implode(",",array_keys($input));
            $query="INSERT INTO $table ($input_cols) VALUES ('$input_adds')";
            try{
                $sql=  mysqli_query($this->link, $query);
                return mysqli_insert_id($this->link);
//                return $query;
            } catch (Exception $ex) {
                return $ex->getMessage();
            }
        }
        public function update($table,$update,$id){
            $query="UPDATE $table SET ";
            $i=0;
            foreach($update as $k=>$v){
                if($i>0){
                    $query.=", ";
                }
                $query.=$k."='".$v."' ";
                $i++;
            }
            $query.="WHERE id='$id'";
            try{
                $sql=  mysqli_query($this->link, $query);
                return mysqli_insert_id($this->link);
            } catch (Exception $ex) {
                return $ex->getMessage();
            }
        }
        public function check($table,$input,$relation,$cols=false){
            $query="SELECT ";
            if(!$cols){
                $cols_input="* ";
            }
            else{
                $cols_input=implode(",",$cols);
            }
            $query.=$cols_input." FROM $table  WHERE ";
//            foreach($input as $k=>$v){
//                if($i>0){
//                    $query.=" ".$k." ";
//                }
//                $i2=0;
//                foreach($v as $k2=>$v2){
//                    if($i2>0){
//                        $query.=" (";
//                    }
//                    $query.=$k2."=".$v2;
//                    $i2++;
//                }
//                if($i2>0)
//                    $query.=")";
//                $i++;
//            }
            $i=0;
            $i2=0;
            foreach ($input as $col=>$value){
                if(@array_count_values($value)>0){
                    $i2=0;
//                    for($i2=0;$i2>count($value);$i2++){
//                        $query.=$value[$i2]."=".$value["$value[$i2]"]." ";
//                        $query.=$col;
//                    }
                    $query.=" ( ";
                    foreach($value as $k=>$v){
                        if($i2>0){
                            $query.=" ".$col;
                        }
                        $query.= " ".$k."=".$v." ";
                        $i2++;
                    }
                    $query.=" ) ";
                }
                else{
                    if($i>0){
                        $query.=$relation[$i-1]." ";
                    }
                    $query.=" ".$col."=".$value." ";
                }
                $i++;
            }
            try{
//                $sql=  mysqli_query($this->link, $query);
//                return mysqli_affected_rows($this->link);
                return $query;
            } catch (Exception $ex) {
                return $ex->getMessage();
            }
        }
        public function delete($table,$id){
            $query="DELETE FROM $table WHERE id=$id";
            try{
                $sql=  mysqli_query($this->link, $query);
                return mysqli_affected_rows($this->link);
            } catch (Exception $ex) {
                return $ex->getMessage();
            }   
        }
        public function return_array($table ,$cols=false){
            try{
                $sql=$this->functions->select($table, array("id","name"),false,array("name","ASC"));
                $array=array();
                while ($rows=  mysqli_fetch_array($sql)){
                    $array[$rows['id']]=$rows['name'];
                }
                return $array;
            } catch (Exception $ex) {
                return $ex->getMessage();
            }
        }
    }
?>
