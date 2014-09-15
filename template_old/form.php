<html> 
<head>
    <link rel="stylesheet" type="text/css" href="form.css">
</head>
<div class="loghead">
    <ul>
        <li><a href="?page=login" >Log in</a></li>
        <li><a href="?page=Registry">Sign up</a></li>
    </ul> 
</div>
 <div>
     <?php
//     if(isset($_GET["page"])){
//      $url=@$_GET["page"].'.php';
     include_once  'login.php';
//     }
     ?>
     
 </div>
</html>

