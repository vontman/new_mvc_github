<?php
            //  O_O El kebeer Gy !!
    if(isset($_POST['add'])){
        if(!empty($_POST['name_edit'])&&!empty($_POST['body_edit'])&&!empty($_POST['writer_edit'])){
            $name=$_POST['name_edit'];
            $body=$_POST['body_edit'];
            $writer=$_POST['writer_edit'];
            $date=  date('Y-m-d H:i:s');
            $cat_id=$_POST['categories_select'];
            $sql=  insert("topics",array(array("name","body","writer","date","category_id"),array($name,$body,$writer,$date,$cat_id)));
        }
    }
?>

<form action="" method="post" class="admin_form">
    <font>Select The Category</font><select name="categories_select">
        <?php
            $sql=  select("categories",array("name","id"));
            while($rows=  mysqli_fetch_array($sql)){
                echo "<option value=".$rows['id'].">".$rows['name']."</option>";
            }
        ?>
    </select><br>
    <input type="text" class="text" required name="writer_edit" placeholder="The Writer"/><br>
    <input type="text" class="text" required name="name_edit" placeholder="The Title"/><br>
    <textarea cols="80" class="bigtext" required name="body_edit" placeholder="ENTER THE CONTENT O_O" ></textarea><br>

    <input type="submit" class="btn" name="add"/>
</form>