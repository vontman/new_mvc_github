<?php
    session_start();
    session_destroy();
    setcookie('username', NULL, -1,'/');
    setcookie("userlogin", NULL, -1,'/');
    $url=$_GET['url'];
    header("location:$url");  
?>