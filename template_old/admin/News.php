<?php
            //  O_O El kebeer Gy !!
    if(isset($_POST['add'])){
        if(!empty($_POST['name_edit'])&&!empty($_POST['body_edit'])&&!empty($_POST['categories_select'])){
            $name=$_POST['name_edit'];
            $body=$_POST['body_edit'];
            $writer=$_POST['writer_edit'];
            $cat_id=$_POST['categories_select'];
            $date=  date("Y-m-d");
            insert("news", array(array("name","body","writer","category_id","date"),array($name,$body,$writer,$cat_id,$date)));
        }
    }
?>

<form action="" method="post" class="admin_form">
    <font>Select The Category</font><select name="categories_select">
        <?php
            $sql=select("categories",array("id","name"));
            while($rows=  mysqli_fetch_array($sql)){
                echo "<option value=".$rows['id'].">".$rows['name']."</option>";
            }
        ?>
    </select><br>
    <input type="text" class="text" name="name_edit" placeholder="Title"/><br>
    <input type="text" class="text" name="writer_edit" placeholder="Writer"/><br>
    <textarea cols="80" class="bigtext" name="body_edit" placeholder="ENTER THE CONTENT O_O" ></textarea><br>

    <input type="submit" class="btn" name="add"/>
</form>