	<div id="news">
            <div id="sub">
                <h2>Latest News</h2>
            </div>
            <ul>
                <?php 
                    include_once '/model/posts.php';
                    $posts=new posts();
                    $categories=$posts->categories_array();
////                    $sql= select("categories",array("id","name"));
//                    while($rows_categories=  mysqli_fetch_array($sql)){
////                        echo "<li><a href='?page=categories/".$rows_categories['name']."'>".$rows_categories['name']."</a></li>";
//                        $categories[$rows_categories['id']]=$rows_categories['name'];
//                    }
                    
                    
//                    $sql=  select("news", array("id","category_id","name","body","date"), NULL, array("date","DESC"), 4);
                    $sql=$posts->view_news(array("id","name","date","category_id"),false,array("date","DESC"),4);
                    while($rows_news=  mysqli_fetch_array($sql)){
                        echo "<li id='new_1'><a href='showpost.php?news=".$rows_news['id']."'><img src='images/slide-6-220x177.jpg'></a>
                                <div class='cont' > <br><font size='2px'>On ".$rows_news['date']." in <a href='?category=".$rows_news['category_id']."'></font><font color='rgb(0, 79, 131)'>".$categories[$rows_news['category_id']]."</font></a>
                                <font color='orange'><a href='showpost.php?news=".$rows_news['id']."'><h5>".$rows_news['name']."</h5></a></font>
                                rate us &smile;
                                </div>
                             </li>";
                    }
                ?>
            </ul>
	</div>