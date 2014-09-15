<html>
    <head>
        <link type="text/css" rel="stylesheet" href="registry.css">
        <?php // include 'functions.php';?>
    </head>
    <?php  //database connection
//        $link=mysqli_connect("localhost", "root","","softdb");
            // database connection END
            //Var Definitions
            include_once '../model/users.php';
            $users=new users();
        @$username=$_POST['username'];
        @$password=$_POST['password'];
        @$email=$_POST['email'];
        @$birthdate=$_POST['birthdate'];
        @$firstname=$_POST['firstname'];
        @$lastname=$_POST['lastname'];
            $usernameregistererror=false;
//            $check=array();			//Error Array Definition !! 
            $valid=true;
            //Var Def END
    ?>
    
         <form id="registeryform" method="post" >
        <div id="Register_form">
            <?php  //Error Check start
                if(isset($_POST['create'])){
                    if(empty($_POST['username'])||$_POST['username']==""){
                        $usernameerror="Please enter your username";
                        $valid=false;
                    }
                    else if(strlen($_POST['username'])<6){
                        $usernameerror="The Username must contain of at least 6 characters";
                        $valid=false;
                    }
                    if(empty($_POST["email"])){
                        $emailerror="E-mail required";
                        $valid=false; 
                    }        
                    if(empty($_POST["password"])||$_POST['password']==""){
                        $passworderror="Password required";
                        $valid=false;
                    }
                    else if(strlen($_POST['password'] )<6){
                        $passworderror="The Password Must contain of at least 6 characters";
                        $valid=false;
                    }
                    if(empty($_POST['repassword'])||$_POST['repassword']==""){
                        $repassworderror="Please Re-enter your password";
                        $valid=false;
                    }
                            //Password Verfication
                    else if($_POST['password']!=$_POST['repassword']){
                        $passworderror="Passwords Don't Match";
                        $valid=false;
                    }
//                     // Error Check End
//                    foreach($check as $k3=>$v3){
//                            echo "<font color='red'>".$v3."</font><br>";
//                    }  
                    if($valid){
                        if(isset($_POST["terms"])){
//                        $query="SELECT * FROM users "; // Read From DB
//                        $sql=  mysqli_query($link, $query);
//                        echo 'Number of Affected Rows : '.mysqli_affected_rows($link).'<br>';
//                        while($rows=mysqli_fetch_array($sql)){
//                            if($rows['username']==$username){   // Check if User exists
//                                    $usernameregistererror=true;
//                                    $usernameerror= 'Username already exists';
//                                }
//                            if($rows['email']==$email){        // Check if Email Exists
//                                    $usernameregistererror=true;
//                                    $emailerror= 'E-mail already exists';
//                                }
    //                        }
                            if($users->checkuser($username)){
                                $usernameregistererror=true;
                                $usernameerror= 'Username already exists';
                            }
                            if($users->checkuser($email,2)){
                                $usernameregistererror=true;
                                $emailerror= 'E-mail already exists';
                            }
                            if(!$usernameregistererror){ // if check is OK !
                                // Addition Into DB !!
                                $query="INSERT INTO users VALUES(NULL,'$username','$email','$password','$firstname','$lastname','$birthdate')";
                                $user['username']=$username;
                                $user['password']=$password;
                                $user['email']=$email;
                                $user['firstname']=$firstname;
                                $user['lastname']=$lastname;
                                $user['birthdate']=$birthdate;
                                $users->register($user);
                            }
                        }
                        else {
                                $terms= "Please read and accept the terms first";
                            }
                    }
                }
            ?>
            <!--                        Form Decomposition START !!!-->
            
                <font2>The required fields are marked with "*"</font2><br>
                <input class='input' type="text" name="username" placeholder="Username"/> *<br> <?php echo "<font>".@$usernameerror."</font>";?><br>
                <input class='input' type="email" name="email" placeholder="E-mail"/>*<br>  <?php echo "<font>".@$emailerror."</font>";?><br>
                <input class='input' type="password" name="password" placeholder="Password"/>*<br>  <?php echo "<font>".@$passworderror."</font>";?><br>
                <input class='input' type="password" name="repassword" placeholder="Re-enter your Password"/> *<br> <?php echo "<font>".@$repassworderror."</font>";?><br>
                <input class='input' type="text" name="firstname" placeholder="First Name"/><br><br>
                <input class='input' type="text" name="lastname" placeholder="Last Name"/><br><br>
                <input class='input' type="date" name="birthdate"/><br><br>
                <input class='btn'   type="submit"  name="create" value="Sign up"/><br>
            <!--                        Form Decomposition END !!!-->

            </div>
             <input type="checkbox" class="terms"  name="terms" >
                <label for="terms" class="terms">
                I agree to the
                <a href="" target="_blank">Terms of Use</a>
                and
                <a href="" target="_blank">Privacy Policy</a>
                </label>
             <font id="terms_font"><?php echo @$terms; ?></font>
                        </form>

</html>
