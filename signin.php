<?php
$user=$_POST['user'];
$email=$_POST['email'];
$pass=$_POST['pass'];
$cpass=$_POST['cpass'];
/*$cpass=$_POST['cpass'];*/
if($cpass!=$pass)
{
     echo "<script>alert('Password And Confirm Password are not matching.')</script>";
            header( "refresh:1;url=http://localhost/Amans/loginUp.html" );
}
else if (!empty($email)||!empty($user)||!empty($pass))
{
 $host="localhost";
 $dbUsername="root";
 $dbPassword="";
 $dbname="amans";
 $conn=new mysqli($host,$dbUsername,$dbPassword,$dbname);
 if(mysqli_connect_error())
 {
 die('Connect Error ('. mysqli_connect_errno().')'.mysqli_connect_errno());
 }
 else
 {
 	$SELECT="SELECT email from login where email=? Limit 1";
    $INSERT= "INSERT into login (email,user,pass) values('".$email."','".$user."','".$pass."')";
    //Statement
    $stmt=$conn->prepare($SELECT);
    $stmt->bind_param("s",$email);
    $stmt->execute();
    $stmt->bind_result($email);
    $stmt->store_result();
    $rnum=$stmt->num_rows;
    if($rnum==0)
    {
    	$stmt->close();
    	$stmt=$conn->prepare($INSERT);
    	//$stmt->bind_param($name,$email,$phoneno,$findus,$message);
    	$stmt->execute();
        echo "<script>alert('Users has been Registered Successfully.')</script>";
            header( "refresh:1;url=http://localhost/Amans/index.html" );
            exit;
    }
    else
    {
    	$stmt->execute();
        echo "<script>alert(' Record Already Exists.')</script>";
            header( "refresh:1;url=http://localhost/Amans/loginUp.html" );
            exit;
    }
    $stmt->close();
    $conn->close();
 }
}
	else
	{
		$stmt->execute();
        echo "<script>alert('All fields are Required.')</script>";
            header( "refresh:1;url=http://localhost/Amans/loginUp.html" );
            exit;
	}
    echo '<br>';
    


?>