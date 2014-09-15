<?php
            //  O_O El kebeer Gy !!
            @session_start();
    if(isset($_POST['add'])){
        if(!empty($_POST['name_edit'])&&!empty($_POST['body_edit'])){
            $name=$_POST['name_edit'];
            $body=$_POST['body_edit'];
            $writer=$_POST['writer_edit'];
            $select_id=$_POST['id_select'];
            $date=date('Y-m-d H:i:s');
            $comments_type="comments_".@$_SESSION['comments_type'];
            $comments_type2=@$_SESSION['comments_type']."_id";
            $sql= insert($comments_type,array(array("name","body",$comments_type2,"writer","date"),array($name,$body,$select_id,$writer,$date)));
        }
    }
?>

<form action="" method="post" class="admin_form" id="comments_form">
    <font>Select The Type</font><br>
<!--        <input type="radio" name="type_select" value="topics">Topics</input>
    <input type="radio"  name="type_select" value="news">News</input>-->
    <select name="type_select" >
        <?php
            if(isset($_SESSION['comments_type']))
                echo "<option>".$_SESSION['comments_type']."</option>";
        ?>
        <option name="type_select" value="topics">Topics</option>
        <option name="type_select" value="news">News</option>
    </select>
    <input type="submit" name="type_submit" value="Select">
        <?php
            if(isset($_POST['type_submit'])){
                @$type=$_POST['type_select'];
                $_SESSION['comments_type']=$type;
                echo '<select name="id_select">';
                $sql=  select($type,array("name","id"));
                while($rows=  mysqli_fetch_array($sql)){
                    echo "<option value=".$rows['id'].">".$rows['name']."</option>";
                }
                echo '</select><br>';
            }
        ?>
    <input type="text" class="text" name="name_edit" placeholder="Title"/><br>
    <input type="text" class="text" name="writer_edit" placeholder="Writer"/><br>
    <textarea cols="80" class="bigtext" name="body_edit" placeholder="ENTER THE CONTENT O_O" ></textarea><br>

    <input type="submit" class="btn" name="add"/>
</form>