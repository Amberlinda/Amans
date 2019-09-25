<?php
session_start();
$date=$_POST['bday'];
$preference=$_POST['category'];
$why=$_POST['why'];
$b=implode(",",$preference);
$email=$_SESSION['user'];

if (!empty($date)||!empty($preference)||!empty($b)||!empty($email)||!empty($why)) 
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
 	
    $INSERT= "INSERT into category_p (email,dates,preference,selected) values('".$email."','".$date."','".$b."','".$why."')";
    //Statement
    
    
    if ($conn->query($INSERT) === TRUE && $why="Package") {
    header( "refresh:1;url=http://localhost/Forms/package.html" );
} 
  else if ($conn->query($INSERT) === TRUE && $why="Customizable") {
    header( "refresh:1;url=http://localhost/Forms/alakarte.html" );
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