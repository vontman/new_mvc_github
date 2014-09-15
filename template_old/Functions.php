          <?php  
            function connect_softdb(){
                $link=  mysqli_connect("localhost", "root", '', "softdb");
                return $link;
            }
            function insert($table,$cols=array()){
                $link=connect_softdb("localhost","root", "");
                $col_name=implode(",",$cols[0]);
                $col_edit=implode("','",$cols[1]);
                $query="INSERT INTO $table ($col_name) VALUES ('$col_edit')";
                $sql=  mysqli_query($link, $query);
//                echo mysqli_affected_rows($link)."<br>";
                if(!mysqli_errno($link)){
                    return $sql;
                }
                else{
                    echo "<br> Error :".mysqli_error($link);
                }
            }
            function select($table,$cols=false,$id=false,$order=false,$limit=false){
                $link=connect_softdb("localhost","root", "");
                if(!$cols){
                    $cols_select="*";
                }
                else{
                    $cols_select=implode(",",$cols);
                }
                if(!$order){
                    if(!$id){
                        $query="SELECT $cols_select FROM $table";
                    }
                    else{
//                        $id_name=implode(",",$id[0]);
//                        $id_select=implode("','",$id[1]);
                        $query="SELECT $cols_select FROM $table WHERE $id[0]=('$id[1]')";
                    }
                }
                else{
                    if(!$limit){
                        $query="SELECT $cols_select FROM $table ORDER BY $order[0] $order[1]";
                    }
                    else{
                        $query="SELECT $cols_select FROM $table ORDER BY  $order[0] $order[1] LIMIT  0 , $limit";
                    }
                }
                $sql=  mysqli_query($link, $query);
//                echo mysqli_affected_rows($link);
                if(!mysqli_errno($link)){
                    return $sql;
                }
                else{
                    return "<br> Error :".mysqli_error($link);
                }
            }
            function updateDB($table,$input=array(),$id=array()){
                $link=connect_softdb();
                $input_edit=array();
                foreach($input[0] as $k=>$v){
                    $input_edit[]=$v."='".$input[1][$k]."'";
                }
                $input_final=implode(",",$input_edit);
                if($id[1]!=""||$id[0]!=""){
                    $query="UPDATE $table SET $input_final WHERE $id[0]='$id[1]'";
                }
                $sql=  mysqli_query($link, $query);
                if(mysqli_errno($link))
                    echo "<br> Error : ".mysqli_error ($link);
                return $sql;                
            }
            function deleteDB($table,$id){
                $link=connect_softdb();
                $query="DELETE FROM $table WHERE $id[0]='$id[1]'";
                $sql=  mysqli_query($link, $query);
                if(mysqli_errno($link))
                    echo "<br> Error : ".mysqli_error ($link);
                return $sql;                
            }
            function add_views($table,$id){
                $link=connect_softdb();
                $query="SELECT views FROM $table WHERE id='$id'";
                $sql=  mysqli_query($link, $query);
                while($rows=  mysqli_fetch_array($sql))
                    $views=$rows['views'];
                $views++;
                $query="UPDATE $table SET views=$views WHERE id='$id'";
                $sql=  mysqli_query($link, $query);
//                echo mysqli_affected_rows($link);
                if(mysqli_errno($link))
                    return mysqli_error($link);
                else
                    return $sql;
            }
            function search($searchtxt2,$select=FALSE){
                $link=connect_softdb();
                if($select==FALSE){
                  $query= "SELECT * FROM topics WHERE name LIKE '%$searchtxt2%'OR body LIKE '%$searchtxt2%'";
                }
                else {
                    $query= "SELECT * FROM topics WHERE category_id='$select' AND(name LIKE '%$searchtxt2%' OR  body LIKE '%$searchtxt2%')" ;
                              }
                $sql=  mysqli_query($link, $query);
                return $sql;
            }
            ?>