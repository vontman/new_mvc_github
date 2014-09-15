<?php 
$url=$_GET['url'];
include 'functions.php';
$link= connect_softdb();
if(isset($_POST["submit"])){
   $username=$_POST["username"];
   $password=$_POST["password"]; 
    session_start();
    $_SESSION['username']=$username;
          
    if(isset($_POST["re"])){
        setcookie("username", $username, time()+60*60*7,'/');
        
    }
     if(empty($_POST["username"])||$_POST["username"]==""){
         $corruser="Enter username ";
     }
     if(empty($_POST["password"])||$_POST["password"]==""){  
         $corrpass="Enter password";
     }
     else{
            $query="SELECT * FROM users WHERE username='$username'";
            $sql=  mysqli_query($link, $query);
         if(mysqli_affected_rows($link)>0){       
            while($rows= mysqli_fetch_array($sql)){ 
                if(@$rows['password']==@$password){
                             $_SESSION['userlogin']=true;
                             if(isset($_POST["re"])){
                                 setcookie("userlogin", true, time()+60*60*7,'/');
                             }
                             if($rows['permission']=="admin"){
                                echo "<meta http-equiv='refresh' content='0; url=$url'>" ;
                             }
                             else{
                                 echo "<meta http-equiv='refresh' content='0; url=$url'>" ;
                             }
                               }
                               else { 
                                       $correctpassword="password isn't correct";
                                       setcookie("username", $username, -1);
                               }
            }
        }
        else {
            $correctusername="username doesn't exist";
            setcookie("username", $username, -1);
        }
 }
}
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="login.css">
</head>
<body>
<div class="login" >
    <form   method="post" action="">
        <input type="text" name="username" class="username"  placeholder="Username"><br><font class="log_font"><?php echo @$corruser;?></font><br />
        <input type="password" name="password" class="password"  placeholder="Password"><br><font class="log_font"><?php echo @$corrpass;?></font><br />
        <input type="checkbox" class="re"  name="re"><font class="log_font2">Remember me</font><br>
          <input type="submit" name="submit" class="submit" value="Login">
          <a href="?page=registry">Sign up</a><br>
          <font class="log_font"><?php echo @$correctpassword; ?></font>
          <font class="log_font"><?php echo @$correctusername; ?></font>
          
    </form>
</div>
</body>
</html>


