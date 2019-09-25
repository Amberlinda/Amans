<?php
   session_start();
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
            echo "<script>alert('Please enter your E-mail ID.')</script>";
            header( "refresh:1;url=loginUp.html" );
            exit;
        }
        if($_POST['pass']=="")//empty password
        {
            echo "<script>alert('Please enter your password.')</script>";
            header( "refresh:1;url=loginUp.html" );
            exit;
        }
        if($errflag) 
        {
            $_SESSION['ERRMSG_ARR'] = $errmsg_arr;
            session_write_close();
            echo "<script>alert('Please enter your credentials.')</script>";
            header( "refresh:1;url=loginUp.html" );
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
            $_SESSION["user"]=$rws["user"];

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
                echo "<script>alert('E-mail ID and password not found!')</script>";
                header( "refresh:1;url=loginUp.html" );
                exit;
            }
        }
    }

?>