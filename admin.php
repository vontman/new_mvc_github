<?php 
ob_start();
@session_start();
include 'template/functions.php';
?>
<head>
    <title>SoftEdition</title>
    <link type="text/css" rel="stylesheet" href="template/style.css">
    <link type="text/css" rel="stylesheet" href="template/header.css">
    <link type="text/css" rel="stylesheet" href="template/footer.css">
    <link type="text/css" rel="stylesheet" href="template/left.css">
    <link type="text/css" rel="stylesheet" href="template/promo.css">
    <link type="text/css" rel="stylesheet" href="template/news.css">
    <link type="text/css" rel="stylesheet" href="template/heart.css">
    <link type="text/css" rel="stylesheet" href="template/registry.css">
    <link type="text/css" rel="stylesheet" href="template/login.css">
    <link type="text/css" rel="stylesheet" href="template/admin/admin.css">
</head>

<body>
    <div id="container">
    	<?php include 'template/header.php';?>
        <?php include 'template/promo.php';?>        
                  <!--body-->
        <div id="main">
            <?php include 'template/news.php';?>
            <div id="heart">
                <span class="sub">
                    <h1 >Adming Tools</h1>
                </span>
                <span id="admin_span">
                        <ul>
                            <li><a href="?admin=categories">Categories</a></li>
                            <li><a href="?admin=news">News</a></li>
                            <li><a href="?admin=Topics">Topics</a></li>
                            <li><a href="?admin=Comments">Comments</a></li>
                            <li><a href="?admin=users">Users</a></li>
                        </ul>
                </span>
                <div id="admin_controls">
                    <?php
                        @$admin=$_GET['admin'];
                        if($admin!=""){
                            include "template/admin/$admin.php";
                        }
                    ?>
                </div>
            </div>
            <?php include 'template/left.php';?>
	    <div id="butright">
                <div id="buttop"><a href="#Top"><img src="images/up-arrow.png"></a></div>
                <div id="butbot"><a href="#bottom"><img src="images/down-arrow.png"></a></div>
                 </div>       
            </div>
        <!--end body-->
        <?php include'template/footer.php';?>
    </div>
</body>