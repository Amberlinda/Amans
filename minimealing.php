<?php
session_start();
$veg=$_POST['nonvegquantity'];
$nonveg=$_POST['vegquantity'];
//$nonveg_name=$_POST['nonveg_name'];
//$veg_name=$_POST['veg_name'];


$email=$_SESSION['email'];

if (!empty($veg)||!empty($nonveg)||!empty($total)||!empty($email)) 
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
 	
    $INSERT= "INSERT into minicontent (email,/*nonveg_name*/nonvegquantity,/*veg_name,*/vegquantity) values('".$email."',,'".$nonveg."',,'".$veg."')";
    //Statement
    
    
    if ($conn->query($INSERT) === TRUE) {
    header( "refresh:1;url=http://localhost/Forms/index1.php" );
} 
 
else {
    echo "<script>alert('Mini Meal Cart Updated')</script>";
     header( "refresh:1;url=http://localhost/Forms/index1.php" );
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