<?php
include "db.php";
session_start();
if (isset ($_POST['action']) && $_POST['action'] == 'submit')
{
    $nonveg_name=$_POST['nonveg_name'];
    $veg_name=$_POST['veg_name'];
    $nonveg_total=$_POST['nonveg_total'];
    $veg_total=$_POST['veg_total'];

    $email=$_SESSION['email'];

    if (!empty($_SESSION['email'])) 
    {
        
        $INSERT= "INSERT into packaging (email,nonveg_name,nonveg_total,veg_name,veg_total) values('$email','$nonveg_name','$nonveg_total','$veg_name','$veg_total')";
        //Statement   
        if (mysqli_query($conn,$INSERT)) 
        {
            echo "<script type=text/javasccript>alert('inserted')</script>";
            //header('location:index1.php');
        } 
    
        else 
        {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
        
    }
    else
    {
            
        echo "<script type=text/javasccript>alert('Login first.')</script>";
        header('location:loginup.html');
    }
}




?>