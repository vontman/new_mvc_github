<?php
if(isset($_POST['edit_user'])){
    $input_cols=array();
    $input_adds=array();
    @$user_id=$_POST['users_edit'];
    $valid=false;
    if(!empty($_POST['username'])){
        $username_edit=$_POST['username'];
        $input_cols[]="username";  
        $input_adds[]=$username_edit;
        $valid=true;
    }
        if(!empty($_POST['password'])){
        $password_edit=$_POST['password'];
        $input_cols[]="password";  
        $input_adds[]=$password_edit;
        $valid=true;
    }
        if(!empty($_POST['email'])){
        $email_edit=$_POST['email'];
        $input_cols[]="email";  
        $input_adds[]=$email_edit;
        $valid=true;
    }
        if(!empty($_POST['firstname'])){
        $firstname_edit=$_POST['firstname'];
        $input_cols[]="firstname";  
        $input_adds[]=$firstname_edit;
        $valid=true;
    }
        if(!empty($_POST['lastname'])){
        $lastname_edit=$_POST['lastname'];
        $input_cols[]="lastname";  
        $input_adds[]=$lastname_edit;
        $valid=true;
    }
        if(!empty($_POST['birthdate'])){
        $birthdate_edit=$_POST['birthdate'];
        $input_cols[]="birthdate";  
        $input_adds[]=$birthdate_edit;
        $valid=true;
    }
    $edit_input=array($input_cols,$input_adds);
    if($valid){
        updateDB("users", $edit_input, array("id",$user_id));
    }
}
?>

<form id='form_users_edit' action="" method="post">
    <?php
        echo "<table id='table_users' border cellpadding='5px'> 
            <tr style='color:red; font-weight:bold; text-align:center; '>
            <td style='padding:10px;'>Username</td>
            <td style='padding:10px;''>Email</td>
            <td style='padding:10px;''>Password</td>
            <td style='padding:10px;''>First Name</td>
            <td style='padding:10px;''>Last Name</td>
            <td style='padding:10px;''>BirthDate</td>
            <td style='padding:10px;''>O</td>
            </tr>";
        $sql=  select("users", array("id","username","email","password","firstname","lastname","birthdate"));
        echo 'Number of Affected Rows : '.count(mysqli_fetch_array($sql));
        while($rows=mysqli_fetch_array($sql)){
            echo "<tr><td>".$rows['username']."</td>";
            echo "<td>".$rows['email']."</td>";
            echo "<td>".$rows['password']."</td>";
            echo "<td>".$rows['firstname']."</td>";
            echo "<td>".$rows['lastname']."</td>";
            echo "<td>".$rows['birthdate']."</td><td><input type='radio' name='users_edit' value='".$rows['id']."'></td></tr>";
        }
        echo "</table>";
    ?>
        <br>
        <input class='input' type="text" name="username" placeholder="Username"/>    
        <input class='input' type="email" name="email" placeholder="E-mail"/>
        <input class='input' type="password" name="password" placeholder="Password"/>
        <input class='input' type="text" name="firstname" placeholder="First Name"/>
        <input class='input' type="text" name="lastname" placeholder="Last Name"/>
        <input class='input' type="date" name="birthdate"/>
        <input class='users_btn'   type="submit"  name="edit_user" value="Edit User"/><br>
</form>

