
    <?php

//        $sql= select("news",array("id","name"));
//        while($rows=  mysqli_fetch_array($sql)){
//            $news[$rows['id']]=$rows['name'];
//        }
//        $categories=array();
//        $sql= select("categories",array("id","name"));
//        while($rows=  mysqli_fetch_array($sql)){
//            $categories[$rows['id']]=$rows['name'];
//        }  
        include_once '/model/posts.php';
        $posts=new posts();
        $categories=$posts->categories_array();
        $sql=$posts->view_post("news",array("id","name"));
        while($news_array=  mysqli_fetch_array($sql)){
            $news[$news_array['id']]=$news_array['name'];
        }
    ?>
    <div id="topics">
            <div id="sub"> <font color="black"><h2>Latest Topics</h2></font></div>
            <ul>
                <?php
                    $sql=$posts->view_post("topics",false, false,array("date","DESC"),5);
                    while($rows_topics=  mysqli_fetch_array($sql)){
                        $topic_id=$rows_topics['id'];
                        $topic_name=$rows_topics['name'];
                        $topic_body=nl2br(htmlentities($rows_topics['body']));
                        $topic_writer=$rows_topics['writer'];
                        $topic_date=$rows_topics['date'];
                        $topic_category=$categories[$rows_topics['category_id']];
                        echo "<li>"
                        . "<a href='showpost.php?topic=".$topic_id."'>"
                                . "<img src='images/slide-10-220x177.jpg'>"
                            . "</a>"
                                . "<div class='cont_3'> By ".$topic_writer." on ".$topic_date." in ". $topic_category."<br><a href='showpost.php?topic=".$topic_id."'><h4>".$topic_name."</h4></a>". substr(nl2br(($topic_body)),0,20)."<br>rate us &smile;<div class='butplace'><a class='button' href='showpost.php?topic=".$topic_id."'>Read more</a></div></div>";
                    }
                ?>
            </ul>
    </div>

    <div id="comments">
    <ul>
        <?php
            $sql=$posts->view_post("comments_news",false,false,array("date","DESC"),5);
            while($rows=  mysqli_fetch_array($sql)){
                echo '<li>By '.$rows['writer'].' on '.$rows['date'].' in <a href="showpost.php?news='.$rows['post_id'].'">'.$news[$rows['post_id']].'</a>
                        <a href="showpost.php?news='.$rows['post_id'].'"><h4>'.$rows['name'].'</h4></a>
                            '.nl2br($rows['body']).'...<br><br>
                             rate us &smile;   <a href="">Read more</a>
                      </li>';
            }
        ?>
    </ul>
         <a href="">See all</a>
    </div>
