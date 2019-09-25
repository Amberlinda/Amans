<?php
$name=$_POST['name'];
$email=$_POST['email'];
$phoneno=$_POST['phoneno'];
$findus=$_POST['findus'];
$message=$_POST['message'];
if (!empty($name)||!empty($email)||!empty($phoneno)||!empty($findus)||!empty($message)) 
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
 	$SELECT="SELECT email from register where email=? Limit 1";
    $INSERT= "INSERT into register (name,email,phoneno,findus,message) values('".$name."','".$email."','".$phoneno."','".$findus."','".$message."')";
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
        echo "<script>alert('Feedback is taken under Consideration.')</script>";
        if (empty($_SESSION['email']))
        {
            header( "refresh:1;url=index.html" );
            exit;
        }
        else{
            header( "refresh:1;url=index1.php" );
            exit;
        }
            
    }
    else
    {
        $stmt->execute();
        echo "<script>alert('Feedback from this Email id is already available.')</script>";
            header( "refresh:1;url=index.html" );
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
            header( "refresh:1;url=index.html" );
            exit;
    }
    echo '<br>';
    

echo '<br>';
echo '<a href="First.php">google</a>';
?>