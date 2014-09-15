
    <?php
        $news=array(); 
        $sql= select("news",array("id","name"));
        while($rows=  mysqli_fetch_array($sql)){
            $news[$rows['id']]=$rows['name'];
        }
        $categories=array();
        $sql= select("categories",array("id","name"));
        while($rows=  mysqli_fetch_array($sql)){
            $categories[$rows['id']]=$rows['name'];
        }     
    ?>
    <div id="topics">
            <div id="sub"> <font color="black"><h2>Latest Topics</h2></font></div>
            <ul>
                <?php
                    $sql=select("topics", array("id","name","body","category_id","date","writer"), NULL, array("date","DESC"), 4);
                    while($rows=  mysqli_fetch_array($sql)){
                        echo "<li><a href='showpost.php?topic=".$rows['id']."'><img src='images/slide-10-220x177.jpg'></a><div class='cont_3'> By ".$rows['writer']." on ".$rows['date']." in ". $categories[$rows['category_id']]."<br><a href='showpost.php?topic=".$rows['id']."'><h4>".$rows['name']."</h4></a>".$rows['body']."<br>rate us &smile;<div class='butplace'><a class='button' href='showpost.php?topic=".$rows['id']."'>Read more</a></div></div>";
                    }
                ?>
            </ul>
    </div>

    <div id="comments">
    <ul>
        <?php
            $sql=select("comments_news",array("id","name","body","writer","date","post_id"),NULL,array("date","DESC"),3);
            while($rows=  mysqli_fetch_array($sql)){
                echo '<li>By '.$rows['writer'].' on '.$rows['date'].' in <a href="showpost.php?news='.$rows['post_id'].'">'.$news[$rows['post_id']].'</a>
                  <a href="showpost.php?news='.$rows['post_id'].'"><h4>'.$rows['name'].'</h4></a>
                      '.$rows['body'].'...<br><br>
                      rate us &smile;   <a href="">Read more</a>
              </li>';
            }
        ?>
    </ul>
         <a href="">See all</a>
    </div>
