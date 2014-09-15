<div id="left">
                <div id="leftnav">
                   <h3>Categories</h3>
                   <ul>
                <?php
                    include_once '/model/posts.php';
                    $posts=new posts();
                    $categories=$posts->categories_array();
                    foreach($categories as $id=>$name){
                        echo "<li><a href='?page=categories/".$id."'>".$name."</a></li>";
                    }
                ?>
                   </ul>
                </div>

                <div id="leftnews">
                    <h3>Popular news</h3>
                    <ul>
                        <?php
//                            $sql=select("news", array("id","name","category_id"), NULL,array("views","DESC"), 5);
                            $sql=$posts->view_news(array("id","name","category_id"),false,array("views","DESC"),5);
                            while($rows_news=  mysqli_fetch_array($sql)){
                                echo "<li><a href='showpost.php?news=".$rows_news['id']."'><img src='images/slide-2-86x86.jpg'></a>
                           <div class='cont_2'><a href='showpost.php?news=".$rows_news['id']."'><h5>".$rows_news['name']."</h5><br></a>".$categories[$rows_news['category_id']]."</div></li>";
                            }
                        ?>
                   </ul>
                    <a href="Registry.php">See all</a>
                </div>
            </div>