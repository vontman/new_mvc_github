	<div id="news">
            <div id="sub">
                <h2>Latest News</h2>
            </div>
            <ul>
                <?php 
                    $categories=array();
                    $sql= select("categories",array("id","name"));
                    while($rows=  mysqli_fetch_array($sql)){
                        $categories[$rows['id']]=$rows['name'];
                    }  
                    
                    
                    $sql=  select("news", array("id","category_id","name","body","date"), NULL, array("date","DESC"), 4);
                    while($rows=  mysqli_fetch_array($sql)){
                        echo "<li id='new_1'><a href='showpost.php?news=".$rows['id']."'><img src='images/slide-6-220x177.jpg'></a>
                                <div class='cont' > <br><font size='2px'>On ".$rows['date']." in <a href='?category=".$rows['category_id']."'></font><font color='rgb(0, 79, 131)'>".$categories[$rows['category_id']]."</font></a>
                                <font color='orange'><a href='showpost.php?news=".$rows['id']."'><h5>".$rows['name']."</h5></a></font>
                                rate us &smile;
                                </div>
                             </li>";
                    }
                ?>
            </ul>
	</div>