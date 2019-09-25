
<?php
session_start();
?><!DOCTYPE html>
<html >
<head>
    <meta charset="UTF-8">
    <title>Login & Sign Up Form Concept</title>


    <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Open+Sans:400,300'>
    <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/icon?family=Material+Icons'>

    <link rel="stylesheet" href="resources/css/stylelogUP.css">
<style >
    .error
    {
        color: red;
    }
</style>

</head>

<body>
    <?php
    $emailerror=$passworderror=$loginerror="";
    $name=$email="";
    ?>
    
    <ul>
              <li><img src="resources/css/img/logo3%20white.png" class="logo"></li>
              <li><a>&nbsp;</a></li>
              <li  class="side"><a href="index.html">Home</a></li>
              <li  class="side"><a href="#">Contact us</a></li>
              <li  class="side"><a href="#">About us</a></li>
        </ul>
            <div class="cont_login">
                <div class="cont_info_log_sign_up">
                    <div class="col_md_login">
                        <div class="cont_ba_opcitiy">

                            <h2>LOGIN</h2>
                            <h1></h1><span class="error">*<?php echo $emailerror; ?> </span>
<span class="error">*<?php echo $passworderror; ?> </span>
<span class="error">*<?php echo $loginerror; ?> </span></h1>
                            <p> LOG IN to get better response from us</p>
                            <button class="btn_login" onclick="cambiar_login()">LOGIN</button>
                        </div>
                    </div>
                    <div class="col_md_sign_up">
                        <div class="cont_ba_opcitiy">
                            <h2>SIGN UP</h2>


                            <p>Be a part of Aman's family by signing in</p>

                            <button class="btn_sign_up" onclick="cambiar_sign_up()">SIGN UP</button>
                        </div>
                    </div>
                </div>


                <div class="cont_back_info">
                    <div class="cont_img_back_grey">
                        <img src="resources/img/img6-min.JPG" alt="" />
                    </div>

                </div>
                <div class="cont_forms">
                    <div class="cont_img_back_">
                        <img src="resources/img/img6-min.JPG" alt="" />
                    </div>
                    <div class="cont_form_login">
                        <a href="#" onclick="ocultar_login_sign_up()"><i class="material-icons">&#xE5C4;</i></a>
                        <h2>LOGIN</h2>

                        <form  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" class="contact-form">
                            
                        <input type="text" placeholder="Email" name="email" value="<?php echo $email;?>">
                        <span class="error">*<?php echo $emailerror; ?> </span>
                        <input type="password" placeholder="Password" name="pass" value="<?php echo $name;?>">
                        <span class="error">*<?php echo $passworderror; ?> </span>
                        <br>
                        <a href="#">Lost your password?</a><br>
                        <button class="btn_login" name="action"  onclick="cambiar_login()" >LOGIN</button>
                    </form>
                    </div>

                    <div class="cont_form_sign_up">
                        <a href="#" onclick="ocultar_login_sign_up()"><i class="material-icons">&#xE5C4;</i></a>
                        <h2>SIGN UP</h2>
                        
                        <form  action="signin.php" method="POST" class="contact-form">
                        <input type="text" name="email" placeholder="Email" >
                        <input type="text" name="user" placeholder="Username">
                        <input type="password" name="pass" placeholder="Password" >
                        <input type="password" name="cpass" placeholder="Confirm Password" >
                        Sequrity Question
                        <select class="drop">
                            <option>
                                Your dogs name ?
                            </option>
                            <option>
                                Your favourite colour ?
                            </option>
                        </select>
                        <input type="text" name="answer" placeholder="Answer">
                        <button class="btn_sign_up" onclick="cambiar_sign_up()">SIGN UP</button>
                         </form>
                    </div>

                </div>

            </div>

    <script src="resources/js/login.js"></script>
<?php 
   if ($_SERVER["REQUEST_METHOD"] == "POST") {
if(isset($_REQUEST['action'])==1)
    {
        $hostname = "localhost";
        $user = "root";
        $password = "";
        $database = "amans";
        $prefix = "";
        //$bd = mysql_connect($mysql_hostname, $mysql_user, $mysql_password) or die("Opps some thing went wrong");
        //mysql_select_db($mysql_database, $bd) or die("Oops some thing went wrong");
        $database=mysqli_connect($hostname,$user,$password,$database);
        $errmsg_arr = array();
        $errflag = false;
        $email=  mysqli_real_escape_string($database,$_REQUEST['email']);
        $pass1=  mysqli_real_escape_string($database,$_REQUEST['pass']);
        if($_POST['email']=="")//empty email
        {
            $emailerror="Please enter your email";
        header("Location: loginUp.php"); 
            exit;
        }
        if($_POST['pass']=="")//empty password
        {
            $passworderror="Please Enter your password";
                   exit;
           
        }
        if($errflag) 
        {
            $_SESSION['ERRMSG_ARR'] = $errmsg_arr;
            session_write_close();
            $emailerror="Please enter a registered email";
            $passworderror="Please enter a valid password";
            header( "Location:loginUp.php" );
            exit;
        }
      /*  $temp=md5($pass1);
        echo "$temp";*/
        $sql="SELECT * FROM login WHERE email='$email'AND pass='$pass1'";
        $result=  mysqli_query($database,$sql) or die(mysqli_errno($database));
        $trws= mysqli_num_rows($result);

        

        if($trws==1)
        {
            $rws=  mysqli_fetch_array($result);
            $_SESSION['email']=$rws['email'];
            $_SESSION['pass']=$rws['pass'];
            $_SESSION['user']=$rws['user'];
            header("location: index1.php");    
        }
        
        else 
        {
            $errmsg_arr[] = 'E-mail ID and password not found';
            $errflag = true;
            if($errflag) 
            {
                $_SESSION['ERRMSG_ARR'] = $errmsg_arr;
                session_write_close();
                $loginerror="E-mail ID and password not found!";
                header("Location: loginUp.php"); 
                exit;
            }
        }
    }

}
?>
</body>
</html>
