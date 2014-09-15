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
    <link type="text/css" rel="stylesheet" href="view/heart.css">
    <link type="text/css" rel="stylesheet" href="view/registry.css">
    <link type="text/css" rel="stylesheet" href="view/login.css">
    <link type="text/css" rel="stylesheet" href="view/admin/admin.css">
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
                @$page = $_GET['page']; 
                if($page == "index"||$page==""){ 
                    include"view/heart.php"; 
                }
                else{
                    include"view/$page.php";
                }
                ?>
            </div>
            <?php include 'view/left.php';?>

        <!--end body-->

     
        </div>
        <div id="butright">
            <div id="buttop"><a href="#Top"><img src="images/up-arrow.png"></a></div>
            <div id="butbot"><a href="#bottom"><img src="images/down-arrow.png"></a></div>
        </div>  
        <?php include'view/footer.php';?>
    </div>
</body>
