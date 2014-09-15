<div id="left">
    <?php
        include_once 'model/posts.php';
        $posts=new posts();        
        include_once 'model/functions.php';
        $f=new db_functions();
    ?>
                <div id="leftnav">
                   <h3>Categories</h3>
                   <ul>
                <?php
                    $categories=$posts->categories_array();
                    foreach($categories as $id=>$name){
                        echo "<li><a href='?page=categories/".$name."'>".$id."</a></li>";
                    }
                ?>
                   </ul>
                </div>

                <div id="leftnews">
                    <h3>Popular news</h3>
                    <ul>
                        <?php
//                            $sql=select("news", array("id","name","category_id"), NULL,array("views","DESC"), 5);
//                        $sql=$posts->view_news(array("id","category_id","name"), false, array("views","DESC"), 5);
                        $sql=$f->select("news");
                            while($rows=mysqli_fetch_array($sql)){
                                echo "<li><a href='showpost.php?news=".$rows['id']."'><img src='images/slide-2-86x86.jpg'></a>
                           <div class='cont_2'><a href='showpost.php?news=".$rows['id']."'><h5>".$rows['name']."</h5><br></a>".$categories[$rows['category_id']]."</div></li>";
                            }
                        ?>
                   </ul>
                    <a href="Registry.php">See all</a>
                </div>
            </div>