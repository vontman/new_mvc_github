<?php
    include_once '/model/posts.php';
    $posts=new posts();
    $posts_id=array();
    @$topic = $_GET['topic'];
    @$news = $_GET['news']; 
    $post_type="";
    $post_id=0;
    $categories=array();
    $categories=$posts->categories_array();  
    if(!$topic==""){
        $post_type="topics";
        $post_id=$topic;
    }
    elseif(!$news==""){
            $post_type="news";
            $post_id=$news;
    }
    $post_views=$posts->add_views($post_type, $post_id);
//    $sql=select($post_type, array("id"));
    $sql=$posts->view_post($post_type, array("id"));
    while($rows_posts_id= mysqli_fetch_array($sql)){
        $posts_id[]=$rows_posts_id['id'];
    }
//    $sql =select($post_type,array("id","name","date","views","body","writer"),array("id",$post_id));
    $sql=$posts->view_post($post_type,array("id","name","date","views","body","writer"),$post_id);
    while($rows_posts=mysqli_fetch_array($sql)){
        $post_id =$rows_posts['id'];
        $post_name= $rows_posts['name'];
        $post_writer= $rows_posts['writer'];
        $post_date=$rows_posts['date'];
        $post_body= htmlentities(nl2br($rows_posts['body']));
    }

    //Add Comments
    if(isset($_POST['addreply'])){
        if(!empty($_POST['addreply_name_edit'])&&!empty($_POST['addreply_body_edit'])){
            $addreply_name=$_POST['addreply_name_edit'];
            $addreply_body=$_POST['addreply_body_edit'];
            if (isset($_SESSION['userlogin'])){
                $addreply_writer=$_SESSION['username'];
            }
            else{
                $addreply_writer=$_POST['addreply_writer_edit'];
            }
            $date=date('Y-m-d H:i:s');
            $comments_type="comments_$post_type";
//            $sql= insert($comments_type,array(array("name","body","post_id","writer","date"),array($addreply_name,$addreply_body,$post_id,$addreply_writer,$date)));
            $comment['name']=$addreply_name;
            $comment['body']=$addreply_body;
            $comment['writer']=$addreply_writer;
            $comment['date']=$date;
            $comment['post_id']=$post_id;
            $posts->add_post($comments_type, $comment);
        }
    }
    // END Comments
?> 


<div class="post">
    <div class="post_info">
        <div class="post_title">
            <h2><?php echo $post_name;?></h2>
        </div>
        <image class='profile_pic' src='images/profile-icon.PNG'/>
        <div class="writer_info"><?php echo "<font> By <a href='?user=".$post_writer."'>".$post_writer."</a> On ".$post_date."</font>";?></div>
    </div>
    <div class="post_body">
        <?php echo $post_body;?>
    </div>  
    <span class="post_views"><font>Views :<?php echo $post_views;?></font></span>
    <a class='btn' href='#add_reply_form'>Add Reply</a>
</div>
<div><ul class="comments_ul">
<?php
    $comments_type="comments_$post_type";
//    $sql=  select($comments_type, array("id","name","writer","body","date","post_id"), array("post_id",$post_id));
    $sql=$posts->view_comments($comments_type, $post_id,false,array("date","ASC"));
    while($rows_comments=  mysqli_fetch_array($sql)){
        echo "<li class='comments'>
            <div class='profile'>
                <image class='profile_pic' src='images/profile-icon.PNG'/>
                <font><a href='?user=".$rows_comments['writer']."'>".$rows_comments['writer']."</a></font>
            </div>
        <div class='comments_form'>
            <div class='sub'>
                <h4>".$rows_comments['name']."</h4>
                    <div class='post_info'><font>".$rows_comments['date']."</font></div>
            </div>
        
            <div class='comments_body'>".  nl2br($rows_comments['body'])."</div>
        </div>
    </li>";
    }
?>
    </ul></div>
<div class='add_reply'>
    <div class='sub'>
        <font>Add Reply</font>
    </div>
    <form action="" method="post" id='add_reply_form'>
        <input type="text" class="text" name="addreply_name_edit" placeholder="Title"/><br>
        <?php 
            if (!isset($_SESSION['userlogin'])){
                echo '<input type="text" class="text" name="addreply_writer_edit" placeholder="Writer"/><br>';
            }
        ?>
        <textarea cols="80" class="bigtext" name="addreply_body_edit" placeholder="ENTER THE CONTENT O_O" ></textarea><br>
        <input type="submit" class="btn" name='addreply' value="Reply"/>
    </form>
</div>
<div class='post_navigation'>
    <?php
    $prev_post=$post_id-1;
    $next_post=$post_id+1;
        if($post_id==$posts_id[0]){
            echo "<a style='float:right;transform:scaleX(-1);' href='?".$post_type."=".$next_post."'><image  class='arrows' src='./images/left_arrow.png'/></a>";
        }
        elseif($post_id==array_pop($posts_id)){
            echo "<a style='float:left;' href='?".$post_type."=".$prev_post."'><image class='arrows' src='./images/left_arrow.png'/></a>";
        }
        else{
            echo "
    <a style='float:left;' href='?".$post_type."=".$prev_post."'><image class='arrows' src='./images/left_arrow.png'/></a>
    <a style='float:right;transform:scaleX(-1);' href='?".$post_type."=".$next_post."'><image  class='arrows' src='./images/left_arrow.png'/></a>";
        }
    ?>
</div>