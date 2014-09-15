<!DOCTYPE html>
<?php 
    session_start();
    ob_start();
?>
<head>
    <title>SoftEdition!!</title>
    <link type="text/css" rel="stylesheet" href="../view/style.css">
    <link type="text/css" rel="stylesheet" href="../view/header.css">
    <link type="text/css" rel="stylesheet" href="../view/footer.css">
    <link type="text/css" rel="stylesheet" href="../view/left.css">
    <link type="text/css" rel="stylesheet" href="../view/promo.css">
    <link type="text/css" rel="stylesheet" href="../view/news.css">
    <link type="text/css" rel="stylesheet" href="../view/heart.css">
    <link type="text/css" rel="stylesheet" href="../view/registry.css">
    <link type="text/css" rel="stylesheet" href="../view/login.css">
    <link type="text/css" rel="stylesheet" href="../view/admin/admin.css">
    <link type="text/css" rel="stylesheet" href="../view/tasks.css">
</head>

<body>
	<div id="container">
    	<?php // include '../view/header.php';?>
        <?php // include '../view/promo.php';?>        
                  <!--body-->
        <div id="main">
            <?php // include '../view/news.php';?>
            <div id="heart">
                <?php 
                    if(isset($_SESSION['userlogin'])&&@$_SESSION['userlogin']){
                        include_once $_SERVER['DOCUMENT_ROOT'].'/phptest/new_mvc/model/tasks.php';
                        $tasks=new tasks();
                        @$task_id = $_GET['task']; 
                        if(isset($task_id)){
                            echo "shit";
                            try{
                                    $sql=$tasks->view_task($task_id);
                                    while($rows_task=  mysqli_fetch_array($sql)){
                                        $task_userid=$rows_task['user_id'];
                                        $task_name=$rows_task['name'];
                                        $task_body=$rows_task['body'];
                                        $task_from=$rows_task['from'];
                                        $task_from_time=$rows_task['from_time'];
                                        $task_to=$rows_task['to'];
                                        $task_to_time=$rows_task['to_time'];
                                        $task_category_id=$rows_task['category_id'];
                                    }
                                    if(isset($_SESSION['userid']) &&@$_SESSION['userid']==$task_userid){
                                        include_once 'tasks.php';
                                    }
                                    else{
                                        die("Premission Denied");
                                    }

                            } catch (Exception $ex) {
                                echo "<h2>Topic Not Found !!</h2>";
                            }
                        }
                        else{
                            include_once 'tasks.php';
                        }
                    }
                    else{
                         echo "<meta http-equiv='refresh' content='0; url=../view/form.php'>" ;
                    }
                ?>
            </div>
            <?php // include '../view/left.php';?>

        <!--end body-->

     
        </div>
        <div id="butright">
            <div id="buttop"><a href="#Top"><img src="../images/up-arrow.png"></a></div>
            <div id="butbot"><a href="#bottom"><img src="../images/down-arrow.png"></a></div>
        </div>  
        <?php include'../view/footer.php';?>
    </div>
</body>

