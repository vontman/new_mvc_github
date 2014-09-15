<?php
session_start();
    include_once '../model/users.php';
    $users=new users();
    if(isset($_POST['edit_user'])){
        $username_edit=$_POST['username'];
        $firstname_edit=$_POST['firstname'];
        $lastname_edit=$_POST['lastname'];
        $email_edit=$_POST['email'];
        $birthdate_edit=$_POST['birthdate'];
        $user_edit=array();
        $valid=false;
        if(!empty($_POST['username'])){
            $user_edit['username']=$_POST['username'];
            $valid=true;
        } 
        if(!empty($_POST['email'])){
            $user_edit['email']=$_POST['email'];
            $valid=true;
        }        
//        if($firstname_edit!=$_POST['firstname']){
            $user_edit['firstname']=$_POST['firstname'];
//            $valid=true;
//        }        
//        if($lastname_edit!=$_POST['lastname']){
            $user_edit['lastname']=$_POST['lastname'];
//            $valid=true;
//        }        
//        if($birthdate_edit!=$_POST['birthdate']){
            $user_edit['birthdate']=$_POST['birthdate'];
//            $valid=true;
//        }
        if($valid){
            echo $users->update_user($user_edit, $_SESSION['user_id']);
            header("location:../?page=users");
        }
    }
    
?>