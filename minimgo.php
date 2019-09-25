<?php
session_start();
$date=$_POST['event'];
$time=$_POST['time'];
$phoneno=$_POST['phone'];

$request=$_POST['request'];
$address=$_POST['address'];
$email=$_SESSION['user'];

if (!empty($date)||!empty($time)||!empty($phoneno)||!empty($request)||!empty($address)) 
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
 	
    $INSERT= "INSERT into minimeal_p (email,dates,times,phoneno,address,request) values('".$email."','".$date."','".$time."','".$phoneno."','".$request."','".$address."')";
    //Statement'".$phoneno."'
    
    
    if ($conn->query($INSERT) === TRUE) {
    header( "refresh:1;url=http://localhost/Forms/mini-content.php" );
} 
 
else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
    
 }
}
    else
    {
        
        echo "<script>alert('All fields are Required.')</script>";
            header( "refresh:1;url=Program8.php" );
            exit;
    }
    echo '<br>';
    

echo '<br>';

?>