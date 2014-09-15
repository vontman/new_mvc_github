<?php 
    session_start();
    ob_start();
?>
<head>
    <title>SoftEdition!!</title>
    <link type="text/css" rel="stylesheet" href="view/style.css">
    <link type="text/css" rel="stylesheet" href="view/header.css">
    <link type="text/css" rel="stylesheet" href="view/footer.css">
    <link type="text/css" rel="stylesheet" href="view/left.css">
    <link type="text/css" rel="stylesheet" href="view/promo.css">
    <link type="text/css" rel="stylesheet" href="view/news.css">
    <link type="text/css" rel="stylesheet" href="view/registry.css">
    <link type="text/css" rel="stylesheet" href="view/login.css">
    <link type="text/css" rel="stylesheet" href="view/admin/admin.css">
    <?php 
        @$page=$_GET['page'];
        @$topic = $_GET['topic'];
        @$news = $_GET['news']; 
        if($topic == "" && $news==""){
            echo '<link type="text/css" rel="stylesheet" href="view/heart.css">';
        }
    ?>
    <link type="text/css" rel="stylesheet" href="view/showpost.css">
</head>

<body>
	<div id="container">
    	<?php include 'view/header.php';?>
        <?php include 'view/promo.php';?>        
                  <!--body-->
        <div id="main">
            <?php include 'view/news.php';?>
            <div id="heart">
                <?php 
                @$page=$_GET['page'];
                @$topic = $_GET['topic'];
                @$news = $_GET['news']; 
                if($topic == "" && $news==""){ 
                    include"view/heart.php"; 
                }
//                elseif($page=="logout"){
//                    session_destroy();
//                    setcookie('username', NULL, -1,'/');
//                    setcookie("userlogin", NULL, -1,'/');
//                    header("location:index.php");
//                }
                else{
                    include"view/showpost.php";
                }
                ?>
            </div>
            <?php include 'view/left.php';?>
	    <div id="butright">
                <div id="buttop"><a href="#Top"><img src="images/up-arrow.png"></a></div>
                <div id="butbot"><a href="#bottom"><img src="images/down-arrow.png"></a></div>
                 </div>       
            </div>
        <!--end body-->
        <?php include'view/footer.php';?>
    </div>
</body>
<?php
            ob_end_flush();
?>