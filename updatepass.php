<?php
session_start();
$pass=$_POST['pass'];
$repass=$_POST['repass'];
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "amans";
$user=$_SESSION["user"];
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
else if($pass!=$repass)
{
	echo "<script>alert('Password and re-entered password not the same')</script>";
     header( "refresh:1;url=profile.php" );
}
else
{
$sql = "UPDATE login SET pass='$pass' WHERE user='$user'";

if ($conn->query($sql)==TRUE) {
    echo "<script>alert('Record updated successfully')</script>";
     header( "refresh:1;url=profile.php" );
} 
else {
    echo "Error updating record: " . mysqli_error($conn);
}
}
?>