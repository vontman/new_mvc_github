    <?php
    $url = $_SERVER['REQUEST_URI'];
    if(ISSET($_COOKIE['username'])&&ISSET($_COOKIE['userlogin'])){
        @$user_username=$_COOKIE['username'];
        @$userlogin=$_COOKIE['userlogin'];
        @$_SESSION['username']=$_COOKIE['username'];
        @$_SESSION['userlogin']=$_COOKIE['userlogin'];
    }
    elseif(isset($_SESSION['username'])&&isset($_SESSION['userlogin'])){
        @$user_username=$_SESSION['username'];
        @$userlogin=$_SESSION['userlogin'];
    }
    ?>
<div id="header">
        	<div id="logo">
                    <a href="index.php">
            	<img id='logoimg' src='images/logo.png' alt="Logo"/>
                </a>
            </div>
            <div id="reg">
                <ul>
                    <?php
                    if(@$userlogin){
                        echo "<li><a>Welcome  <font>$user_username</font></a></li>"
                                . "<li><a href='logout.php?url=".$url."' >Log Out</a></li>";
                    }
                    else {
                        echo "<li><a target='_blank' href='template/form.php?url=".$url."'>Login</a></li>"
                        . "<li><a target='_blank' href='template/form.php?page=Registry'>Register</a></li>";
                    }
                    ?>
                </ul>
            </div>
            <div id="topnav">
                <ul>
                    <li><a href=''>First</a></li>
                    <li><a href=''>Second</a>
                        <ul>
                        <li><a href=''>First</a></li>
                        <li><a href=''>Second</a>
                         <ul>
                            <li><a href=''>First</a></li>
                            <li><a href=''>Second</a></li>
                            <li><a href=''>Third</a></li>
                            <li><a href=''>Fourth</a></li>
                            <li><a href=''>Fifth</a></li>
                    	</ul></li>
                        <li><a href=''>Third</a></li>
                        <li><a href=''>Fourth</a></li>
                        <li><a href=''>Fifth</a></li>
                    	</ul>
                    </li>
                    <li><a href=''>Third</a>
                        <ul>
                        <li><a href=''>First</a></li>
                        <li><a href=''>Second</a></li>
                        <li><a href=''>Third</a></li>
                        <li><a href=''>Fourth</a></li>
                        <li><a href=''>Fifth</a></li>
                    	</ul>
                    </li>
                    <li><a href=''>Fourth</a></li>
                    <li><a href=''>Fifth</a></li>
                </ul>
            </div>
    <form action="?page=search" method="POST">
    <div id="search">
            	<input type='text' id='txtbox' name='searchtxt' placeholder='Search ..........' />
                <div>
                    <select id="select" name="select">
                <option value="categories" selected="selected">All Categories</option>
               <?php  
               $sql=select('categories',array('id','name'));
               while ($rows = mysqli_fetch_array($sql)) {?>
        <option value="<?php echo $rows["id"];?>"> <?php echo $rows["name"];?></option>
        <?php } ?> 
            </select>
        </div>
                <input type="submit" value="" class="srchbtn" name="submit">
    </div>
        
    </form>
</div>