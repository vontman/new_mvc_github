<?php
            //  O_O El kebeer Gy !!
    if(isset($_POST['add'])){
        if(!empty($_POST['name_edit'])){
            $name=$_POST['name_edit'];
            insert("categories",array(array("name"),array($name)));
        }
    }
?>

<form action="" method="post" class="admin_form">
    <font>Current Categories</font><select name="categories_select">
        <?php
            $sql=  select("categories",array("name","id"));
            while($rows=  mysqli_fetch_array($sql)){
                echo "<option value=".$rows['id'].">".$rows['name']."</option>";
            }
        ?>
    </select><br>
    <input type="text" class="text" name="name_edit" placeholder="Write the Category"/><br>
    <input type="submit" class="btn" name="add"/>
</form>