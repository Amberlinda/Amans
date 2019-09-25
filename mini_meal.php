<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "amans";
$conn = mysqli_connect($servername, $username, $password, $dbname) or die("Connection failed: " . mysqli_connect_error());
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" type="text/css" href="vendors/css/ionicons.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
    <link href="resources/css/mini_meal_style.css" rel="stylesheet" type="text/css" >
    <link href="resources/css/stylealakarte.css" rel="stylesheet" type="text/css" >
    <link href="resources/css/stylealakarte2.css" rel="stylesheet" type="text/css" >
</head>

<body>
   <?php
        session_start();
        $status="";
        if (isset($_POST['code']) && $_POST['code']!="")
        {
            $code = $_POST['code'];
            $result = mysqli_query($conn,"SELECT * FROM minimeal WHERE code ='$code'");
            $row = mysqli_fetch_assoc($result);
            $name = $row['name'];
            $code = $row['code'];
            $price = $row['price'];
            $image = $row['image'];

            $cartArray = array(
                $code=>array(
                'name'=>$name,
                'code'=>$code,
                'price'=>$price,
                'quantity'=>1,
                'image'=>$image)
            );

            if(empty($_SESSION["minimeal"])) 
            {
                $_SESSION["minimeal"] = $cartArray;
                $status = "<div class='box'>Product is added to your cart!</div>";
            }
            else
            {
                $array_keys = array_keys($_SESSION["minimeal"]);
                if(in_array($code,$array_keys)) 
                {
                    $status = "<div class='box' style='color:red;'>
                    Product is already added to your cart!</div>";	
                } 
                else
                {
                    $_SESSION["minimeal"] = array_merge($_SESSION["minimeal"],$cartArray);
                    $status = "<div class='box'>Product is added to your cart!</div>";
                }

            }
        }

    ?>
    <nav>
        <img src="resources/img/logo3%20white.png" alt="aman's logo" class="logo">
        <ul class="main-nav js--main-nav">
            <li><a href="index1.php">Home </a></li>
            <li><a href="#about">About Us </a></li>
            <li><a href="#contact">Contact Us </a></li>
        </ul>
    </nav>
    <a href="cart.php" class="float">
        <i class="ion-md-cart icon-big"></i>
    </a>
    <?php $cart_count = count(array_keys($_SESSION['minimeal'])) ; ?>
    <div class="count"><?php echo "$cart_count"; ?></div>
    <section class="row mini-meal-body">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Veg</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Non-Veg</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <section class="section-cards">
                    <div class="flex-box">
                        <?php
                            $sql = "SELECT * FROM minimeal WHERE code LIKE 'v%'";
                            $resultset = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));
                            while( $record = mysqli_fetch_assoc($resultset) ) {
                            echo "

                            <div class='card mb-3' style='max-width: 540px;'>
                                <div class='row no-gutters'>
                                    <div class='col-md-4'>
                                        <img src='mini_meal_image/".$record['image']."' class='card-img' alt='image'>
                                    </div>
                                    <div class='col-md-8'>
                                        <div class='card-body'>
                                        <h5 class='card-title'>".$record['name']."</h5>
                                        <p class='card-text'>".$record['description']."</p>
                                        <form method='post'>
                                            <input type='hidden' name='code' value=".$record['code']." />
                                            <button class='btn btn-primary btn-xs' type='submit'>Add to cart</button>
                                        </form>
                                        <p class='card-text'><small class='text-muted'>Last updated 3 mins ago</small></p>
                                    </div>
                                    </div>
                                </div>
                            </div>


                                   ";
                         } ?>
                    </div>
                </section>
            </div>
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <section class="section-cards-non-veg">
                    <div class="flex-box">
                        <?php
                            $sql = "SELECT * FROM minimeal WHERE code LIKE 'nv%'";
                            $resultset = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));
                            while( $record = mysqli_fetch_assoc($resultset) ) {
                           echo "
                           <div class='card mb-3' style='max-width: 540px;'>
                           <div class='row no-gutters'>
                               <div class='col-md-4'>
                                   <img src='mini_meal_image/".$record['image']."' class='card-img' alt='image'>
                               </div>
                                   <div class='col-md-8'>
                                       <div class='card-body'>
                                       <h5 class='card-title'>".$record['name']."</h5>
                                       <p class='card-text'>".$record['description']."</p>
                                       <form method='post' >
                                           <input type='hidden' name='code' value=".$record['code']." />
                                           <button class='btn btn-primary btn-xs' type='submit'>Add to cart</button>
                                       </form>
                                       <p class='card-text'><small class='text-muted'>Last updated 3 mins ago</small></p>
                                   </div>
                               </div>
                           </div>
                       </div>

                        ";
                    
                    } ?>
                    </div>
                </section>
            </div>
        </div>
    </section>
</body>
<script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
<script href="resources/js/script.js" type="text/javascript"></script>
<!-- jQuery CDN - Slim version (=without AJAX) -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<!-- Popper.JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
<!-- jQuery Custom Scroller CDN -->


</html>
