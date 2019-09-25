<?php
 session_start();
 
include "db.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="vendors/css/normalize.css">
    <link rel="stylesheet" type="text/css" href="vendors/css/grid.css">
    <link rel="stylesheet" type="text/css" href="resources/css/styleprofile.css">
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,300i,400" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script type="text/javascript" src="resources/js/jquery-1.10.2.min.js"></script>
    <title>Aman's</title>


</head>

<body>

    <div class="top">
        <ul>
            <li><img src="resources/css/img/logo3%20white.png" class="logo"></li>
            <li><a>&nbsp;</a></li>
            <li class="side"><a href="index1.php">Home</a></li>
            <li class="side"><a href="#">Contact us</a></li>
            <li class="side"><a href="#">About us</a></li>
        </ul>
    </div>
    <div class="pro">
        <div id="w">
            <div id="content" class="clearfix">
                <div id="userphoto"><img src="resources/img/avatar.png" alt="default avatar"></div>
                <h1>Profile Page</h1>

                <nav id="profiletabs">
                    <ul class="clearfix">
                        <li><a href="#profile">Profile</a></li>
                        <li><a href="#minimeal">Mini-Meal</a></li>
                        <li><a href="#alakarte">Ala-Karte</a></li>
                        <li><a href="#package">Package.</a></li>
                    </ul>
                </nav>


                <!--
                <section id="logout" class="hidden log">
                    <a href="index.html">Click To Logout</a>
                </section>
-->


                <section id="minimeal" class="hidden">
                  <p>Your Choice:</p>
                   
                    <?php
           $user=$_SESSION['email'];         
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "amans";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * FROM minicontent";
$result = $conn->query($sql);

if(!empty($result) && $result->num_rows > 0) 
{
   
    echo "<table>
               <tr>
                    <th>Non Veg Item Name</th>
                   <th>Non Veg Quantity</th>
                   <th>Veg Item Name</th>
                   <th>Veg Quantity</th>
                   <th>Toal Price</th>
                   <th>Status</th>
               </tr>";// output data of each row
    while($row = $result->fetch_assoc()) {
         
        echo "<tr><td>" . $row["nonveg_name"]. "</td><td>" . $row["nonvegquantity"]. "</td><td>" . $row["veg_name"]. "</td><td>" . $row["vegquantity"] . "</td>" . "<td>" . $row["total"]. "</td>"."</tr>"."<td>" . $row["status"]. "</td>". "<br>";
    }
echo  "</table>";
} 
else {
    echo "0 results";
}
?> 
                    
                </section>
                <section id="alakarte" class="hidden">
                    
                    <p>Your Choice:</p>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Email</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $sql = "SELECT * FROM alakartecart WHERE email = '$user'";
                            $resultset = mysqli_query($conn,$sql) or die("database error:". mysqli_error($conn));
                            while ($row = mysqli_fetch_assoc($resultset))
                            {
                                echo "
                                
                            <tr>
                                <td>".$row['name']."</td>
                                <td>".$row['description']."</td>
                                <td>".$row['price']."</td>
                            </tr> 
                            ";
                            }
                            ?>
                            </tbody>
                        </table>
                        </div>
                </section>
                
                <section id="package" class="hidden">
                    <p>Your Choice:</p>
                    <table>
                
                    <?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "amans";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * FROM package-selection";
$result = $conn->query($sql);

if(!empty($result) && $result->num_rows > 0) 
{
   
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr>
        <td>".$row["veg_item_name"]."</td>
        <td>" . $row["veg_count"] . "</td>
        " . "<td>" . $row["nonveg_item_name"]."</td>
        "."<td>".$row["nonveg_count"]."</td>
        "."<td>".$row["total"]."</td>
        "."<td>".$row["status"]."</td>
        "."<br>";
    }

} 
else {
    echo "0 results";
}

if(isset($_POST['set']) && $_POST['set'] == 'logout')
{
    $_SESSION['email'] = "";
    $_SESSION['user'] = "";
    $_SESSION['pass'] = "";
    unset($_SESSION['shopping_cart']);
    unset($_SESSION['minimeal']);
    header("location:index1.php");
}
$conn->close();
?> 
  </table> 
                </section>
        

                <section id="profile" class="hidden">
                    <p>Edit your user settings:</p>

                    <p class="setting"><span>Email Address</span><?php echo $_SESSION['email']; ?></p>

                    <p class="setting"><span>Password<input type="image" src="resources/img/edit.png" alt="edit" width="15" height="15" class="open-button" onclick="openForm2()"></span><?php echo "************" ?></p>
                    <p class="setting"><span>Phone No.<input type="image" src="resources/img/edit.png" alt="edit" width="15" height="15" class="open-button" onclick="openForm3()"></span> None</p>
                    
                    <p class="setting"><span>Log-out</span>
                    <form method="post">
                        <button type='submit' name = 'set' value='logout' class='btn btn-primary btn-xs'>log-out</button>
                    </form>
                    </p>

                    <div class="form-popup" id="myForm2">
                        <form class="form-container" action="updatepass.php" method="POST">
                            <h1>Update Password</h1>

                            <label for="email"><b>New Password</b></label>
                            <input type="Password" placeholder="Enter New Password" name="pass" required>

                            <label for="email"><b>Re-enter Password</b></label>
                            <input type="Password" placeholder="Enter New Password" name="repass" required>
                            <div class="btnn">
                                <button type="submit" class="btn">Update</button>
                                <button type="button" class="btn cancel" onclick="closeForm2()">Close</button></div>
                        </form>
                    </div>
                    
                    <div class="form-popup" id="myForm3">
                        <form class="form-container">
                            <h1>Enter Your Phone no.</h1>
                            <input type="text" placeholder="Answer" name="phone">
                            <div class="btnn">
                                <button type="submit" class="btn" onclick=" closeForm3()">Submit</button>
                                <button type="button" class="btn cancel" onclick="closeForm3()">Close</button></div>
                        </form>
                    </div>
                </section>
            </div><!-- @end #content -->
        </div><!-- @end #w -->
    </div>


    
    <script>
        function openForm2() {
            document.getElementById("myForm2").style.display = "block";
        }

        function closeForm2() {
            document.getElementById("myForm2").style.display = "none";
        }
    </script>
    <script>
        function openForm3() {
            document.getElementById("myForm3").style.display = "block";
        }

        function closeForm3() {
            document.getElementById("myForm3").style.display = "none";
        }
    </script>

    <script type="text/javascript">
        $(function() {
            $('#profiletabs ul li a').on('click', function(e) {
                e.preventDefault();
                var newcontent = $(this).attr('href');

                $('#profiletabs ul li a').removeClass('sel');
                $(this).addClass('sel');

                $('#content section').each(function() {
                    if (!$(this).hasClass('hidden')) {
                        $(this).addClass('hidden');
                    }
                });

                $(newcontent).removeClass('hidden');
            });
        });
    </script>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/respond@0.9.0/main.js"></script>
<script src="https://cdn.jsdelivr.net/npm/html5shiv@3.7.3/dist/html5shiv.min.js"></script>

</html>
