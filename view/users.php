<?php
    include_once '/model/users.php';
    $users=new users();
    $username=$_SESSION['username'];
    $user_id=$_SESSION['userid'];
    $sql=$users->view_user($user_id);
    while($rows_user=  mysqli_fetch_array($sql)){
        $_SESSION['user_id']=$rows_user['id'];
        $email=$rows_user['email'];
        $firstname=$rows_user['firstname'];
        $lastname=$rows_user['lastname'];
        $birthdate=$rows_user['birthdate'];
    }
//    if(isset($_POST['edit_user'])){
//        $username_edit=$_POST['username'];
//        $firstname_edit=$_POST['firstname'];
//        $lastname_edit=$_POST['lastname'];
//        $email_edit=$_POST['email'];
//        $birthdate_edit=$_POST['birthdate'];
//        $user_edit=array();
//        $valid=false;
//        if($username_edit!=$username && !empty($_POST['username'])){
//            $user_edit['username']=$username_edit;
//            $valid=true;
//        } 
//        if($email_edit!=$email && !empty($_POST['email'])){
//            $user_edit['email']=$email_edit;
//            $valid=true;
//        }        
//        if($firstname_edit!=$firstname){
//            $user_edit['firstname']=$firstname_edit;
//            $valid=true;
//        }        
//        if($lastname_edit!=$lastname){
//            $user_edit['lastname']=$lastname_edit;
//            $valid=true;
//        }        
//        if($birthdate_edit!=$birthdate){
//            $user_edit['birthdata']=$birthdate_edit;
//            $valid=true;
//        }
//        if($valid){
//            $users->update_user($user_edit, $user_id);
//        }
//    }
?>
<div class="sub">
    <h2>User : <font style="color:red;"><?php echo $_SESSION['username'];?></font></h2>
</div>
<div class="user_form">
    <form action='view/users_edit.php' method='post'>
        <image src='images/profile-icon.png' width=135px /><br><br>
        <input class='input' type="text" name="username" placeholder="Username" value='<?php echo $username;?>'/></a><br> <?php echo "<font>".@$usernameerror."</font>";?><br>
        <input class='input' type="email" name="email" placeholder="E-mail" value='<?php echo $email;?>'/><br>  <?php echo "<font>".@$emailerror."</font>";?><br>
        <input class='input' type="text" name="firstname" placeholder="First Name" value='<?php echo $firstname;?>'/><br>  <?php echo "<font>".@$firstnameerror."</font>";?><br>
        <input class='input' type="text" name="lastname" placeholder="Last Name" value='<?php echo $lastname;?>'/><br>  <?php echo "<font>".@$lastnameerror."</font>";?><br> 
        <input class='input' type="date" name="birthdate" value='<?php echo $birthdate;?>'/><br><br>
        <input class='btn'   type="submit"  name="edit_user" value="Edit"/><br>
    </form>
</div>
