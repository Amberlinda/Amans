<?php
include "db.php";
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale = 1.0">
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,300i,400,700" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="resources/css/stylealakarte.css">
    <link rel="stylesheet" type="text/css" href="resources/css/stylealakarte2.css">
    <link rel="stylesheet" type="text/css" href="vendors/css/grid.css">
    <link rel="stylesheet" type="text/css" href="vendors/css/animate.css">
    <link rel="stylesheet" type="text/css" href="vendors/css/ionicons.min.css">
    <link rel='stylesheet' href='http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css'>
    <link rel='stylesheet' href='http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css'>

    <link href="https://unpkg.com/ionicons@4.4.8/dist/css/ionicons.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="vendors/css/normalize.css">
    <title>Ala-karte</title>
</head>

<body>
    <?php
        session_start();
        $status = "";
        if (isset($_POST['code']) &&  $_POST['code'] != "")
        {
            $code = $_POST['code'];
            $result = mysqli_query($conn,"SELECT * FROM alakarte WHERE code = '$code'");
            $row = mysqli_fetch_assoc($result);
            $name = $row['name'];
            $code = $row['code'];
            $des = $row['description'];
            $price = $row['price'];

            $cartArray = array(
                $code=>array(
                'name'=>$name,
                'code'=>$code,
                'price'=>$price,
                'description' => $des)
            );
                
            if(empty($_SESSION["shopping_cart"])) 
            {
                $_SESSION["shopping_cart"] = $cartArray;
                $status = "
                <div class='alert alert-success' role='alert'>
                Product added to your cart.
                 </div>";
            }
            else
            {
                $array_keys = array_keys($_SESSION["shopping_cart"]);
                if(in_array($code,$array_keys))
                {
                    $status = "
                <div class='alert alert-success' role='alert'>
                Product is already present your cart.
                 </div>";
                } 
                else 
                {
                    $_SESSION["shopping_cart"] = array_merge($_SESSION["shopping_cart"],$cartArray);
                    $status = "
                    <div class='alert alert-success' role='alert'>
                    Product added to your cart.
                     </div>";
                }
    
            }
            
            if(!empty($_SESSION["shopping_cart"])) 
            {
                $cart_count = count(array_keys($_SESSION["shopping_cart"]));
                #foreach($_SESSION["shopping_cart"] as $product){
                    #print_r($product);
                #}
            }
        }

        if (isset($_POST['action']) && $_POST['action'] === "remove")
            {
                if(!empty($_SESSION["shopping_cart"]))
                {
                   foreach($_SESSION['shopping_cart'] as $key => $value)
                   {
                       if ($key == $_POST['code'])
                       {
                           unset($_SESSION['shopping_cart'][$key]);
                            $status = "
                            <div class='alert alert-success' role='alert'>
                            Product removed from your cart.
                            </div>";
                       }
                    }
                }
                else
                {
                    unset($_SESSION["shopping_cart"]);
                }
            }

        if (isset($_POST['action']) && $_POST['action'] == "send")
        {
            if (empty($_SESSION['shopping_cart']))
            {
                $status = "
                <div class='alert alert-success' role='alert'>
                Cart is empty.
                 </div>";
            }
            else
            {
                if (!empty($_SESSION['email']))
                {
                    foreach ($_SESSION['shopping_cart'] as $ins=>$val)
                    {
                        print_r($val);
                        $email = $_SESSION['email'];
                        echo "$email";
                        $sql = sprintf(
                            "INSERT INTO alakartecart (email,%s) VALUES ('$email','%s')",
                            implode(",",array_keys($val)),
                            implode("','",array_values($val))
                        );
                        if (mysqli_query($conn, $sql))
                        {
                            unset($_SESSION['shopping_cart'][$ins]);
                        }
                        else 
                        {
                            echo "Error: " . $sql . "<br>" . $conn->error;
                            unset($_SESSION['shopping_cart'][$ins]);
                        }
                    }
                    $status = "
                    <div class='alert alert-success' role='alert'>
                    Sent to your profile.
                     </div>";
                    header('location:index1.php');
                }
                else
                {
                    echo "<script type=text/javasccript>>alert('Login first.')</script>";

                    header('location:loginUp.html');
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
    <a href="#popup1" class="float">
        <i class="ion-md-cart icon-big"></i>
    </a>
    <?php if (!empty($_SESSION['shopping_cart'])) $cart_count = count(array_keys($_SESSION['shopping_cart'])); else $cart_count = 0; ?>
    <div class="count"><?php echo "$cart_count"; ?></div>
    <div id="popup1" class="overlay">
        <div class='popup'>
            <h2>Selected items</h2>
            <a class='close' href='#'>&times;</a>
            <div class='content'>
            <?php
                if(empty($_SESSION['shopping_cart']))
                {
                    echo"
                    <table class='table'>
                        <tr>
                            <th>Name</th>
                            <th>Price/plate</th>
                        </tr>
                        <tr>
                            <td>Cart is empty.</td>                           
                        </tr>
                    </table>
                    ";
                }
                else
                {
            ?>
                    <table class="table">
                        <tr>
                            <th>Name</th>
                            <th>Price/plate</th>
                        </tr>
                        <?php 
                        foreach($_SESSION['shopping_cart'] as $product)
                        {
                            $sum += $product['price'];
                            echo"
                            <tr>
                                <td>".$product['name']."</td>
                                <td>".$product['price']."</td>
                                <td>
                                <form method='post'>
                                    <input type='hidden' name='code' value=".$product['code'].">
                                    <input type='hidden' value='remove' name='action'>
                                    <button type='submit' class='btn btn-primary btn-xs'>remove</button>
                                </form>     
                                </td>
                                                            
                            </tr>
                            ";
                        }
                }?>
                <tr>
                    <td colspan='3' align='right'>
                        <strong><?php echo "TOTAL : Rs.$sum"; ?></strong>
                    </td>
                </tr>
                <tr>
                    <td>
                        <form method='post' >
                            <input type="hidden" name='action' value='send'>
                            <button type='submit' class='btn btn-primary'>Send it</button>
                        </form>
                    </td>
                    </tr>
                
            </table>
            </div>
        </div>
    
    
    </div>
    
   
   
    <div id="popup2" class="overlay">
        <div class="popup2">
            <h2>How it works</h2>
            <a class="close" href="#">&times;</a>
            <div class="content">
                <img src="resources/img/info_ala.png" alt="aman's logo" class="info">
            </div>
        </div>
    </div> 

    <section class="container">

        <h1>Select Your Items</h1>
        <a href="#popup2">
        <h4>How it works</h4>
        </a>
        <!--
        <div class="ac">

            <input class="ac-input" id="ac-1" name="ac-1" type="checkbox" />
            <label class="ac-label" for="ac-1">Add Extra</label>

            <article class="ac-text">
                        <div id="table" class="table-editable">
                        <button class="table-add glyphicon glyphicon-plus"></button>
                            <table class="table">
                                <tr>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Add</th>
                                    <th>Remove</th>
                                </tr>
                                
                                <form>
                                <tr class="hide">
                                    <td><input type="text" name="name" maxlength="10" placeholder="Enter item name" required></td>
                                    <td><input type="text" name="description" maxlength="10" placeholder="Description" required></td>
                                    <td>
                                        <input type='submit' name='action' value='add' class="glyphicon glyphicon-ok">
                                    </td>
                                    <td>
                                        <span class="table-remove glyphicon glyphicon-remove"></span>
                                    </td>
                                </tr>
                                </form>
                            </table>
                        </div>
            </article>
           

        </div>
        
    -->
        <div class="ac">

            <input class="ac-input" id="ac-13" name="ac-13" type="checkbox" />
            <label class="ac-label" for="ac-13">Veg</label>

            <article class="ac-text">

                <div class="ac-sub">
                    <input class="ac-input" id="ac-14" name="ac-14" type="checkbox" />
                    <label class="ac-label" for="ac-14">Starter</label>
                    <article class="ac-sub-text">
                        <div id="table" class="table-editable">
                            
                            <table class='table'>
                                <tr>
                                    <th>Select</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Price/plate</th>
                                </tr>
                                <?php 
                                $sql = "SELECT name, description, price, code FROM alakarte where code like 'vs%'";
                                $resultset = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));
                                while( $record = mysqli_fetch_assoc($resultset) ){
                                    echo "
                                <tr>
                                    <td>
                                        <form method='post'>
                                            <input type='hidden' name='code' value=".$record['code'].">
                                            <button id='add' type='submit' class='btn btn-primary btn-sm'>Add</button>
                                        </form>
                                    </td>
                                    <td>".$record['name']."</td>
                                    <td>".$record['description']."</td>
                                    <td>".$record['price']."</td>                                   
                                </tr>
                                ";
                        }?>
                            </table>   
                        </div>
                    </article>
                </div>

                <div class="ac-sub">
                    <input class="ac-input" id="ac-15" name="ac-15" type="checkbox" />
                    <label class="ac-label" for="ac-15">Main-course</label>
                    <article class="ac-sub-text">
                        <div id="table" class="table-editable">
                        
                            <table class='table'>
                                <tr>
                                    <th>Select</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Price/plate</th>
                                </tr>
                                <?php 
                                $sql = "SELECT name, description, price, code FROM alakarte where code like 'vmc%'";
                                $resultset = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));
                                while( $record = mysqli_fetch_assoc($resultset) ){
                                    echo "
                                <tr>
                                    <td>
                                    <form method='post'>
                                        <input type='hidden' name='code' value=".$record['code'].">
                                        <button type='submit' class='btn btn-primary btn-sm'>Add</button>
                                    </form>
                                    </td>
                                    <td>".$record['name']."</td>
                                    <td>".$record['description']."</td>
                                    <td>".$record['price']."</td>                                   
                                </tr>
                                ";
                                }?>
                            </table>
                            
                        </div>
                    </article>
                </div>



            </article>
            <!--/ac-text-->

        </div>
        <!--/ac-->
        

        <div class="ac">

            <input class="ac-input" id="ac-5" name="ac-5" type="checkbox" />
            <label class="ac-label" for="ac-5">Non-Veg</label>

            <article class="ac-text">

                <div class="ac-sub">
                    <input class="ac-input" id="ac-6" name="ac-6" type="checkbox" />
                    <label class="ac-label" for="ac-6">Starter</label>
                    <article class="ac-sub-text">
                        <div id="table" class="table-editable">
                        
                            <table class='table'>
                                <tr>
                                    <th>Select</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Price/plate</th>
                                </tr>
                                <?php 
                                $sql = "SELECT name, description, price, code FROM alakarte where code like 'nvs%'";
                                $resultset = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));
                                while( $record = mysqli_fetch_assoc($resultset) ){
                                    echo "
                                <tr>
                                    <td>
                                    <form method='post'>
                                        <input type='hidden' name='code' value=".$record['code'].">
                                        <button type='submit' class='btn btn-primary btn-sm'>Add</button>
                                    </form>
                                    </td>
                                    <td>".$record['name']."</td>
                                    <td>".$record['description']."</td>
                                    <td>".$record['price']."</td>                                   
                                </tr>
                                ";
                            }?>
                            </table>
                           
                        </div>
                    </article>
                </div>

                <div class="ac-sub">
                    <input class="ac-input" id="ac-7" name="ac-7" type="checkbox" />
                    <label class="ac-label" for="ac-7">Main-course</label>
                    <article class="ac-sub-text">
                        <div id="table" class="table-editable">
                        
                            <table class='table'>
                                <tr>
                                    <th>Select</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Price/plate</th>
                                </tr>
                                <?php 
                                $sql = "SELECT name, description, price, code FROM alakarte where code like 'nvmc%'";
                                $resultset = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));
                                while( $record = mysqli_fetch_assoc($resultset) ){
                                    echo "
                                <tr>
                                    <td>
                                    <form method='post'>
                                        <input type='hidden' name='code' value=".$record['code'].">
                                        <button type='submit' class='btn btn-primary btn-sm'>Add</button>
                                    </form>
                                    </td>
                                    <td>".$record['name']."</td>
                                    <td>".$record['description']."</td>
                                    <td>".$record['price']."</td>                                   
                                </tr>
                                ";
                            }?>
                            </table>
                        </div>
                    </article>
                </div>

                <div class="ac-sub">
                    <input class="ac-input" id="ac-8" name="ac-8" type="checkbox" />
                    <label class="ac-label" for="ac-8">Desert</label>
                    <article class="ac-sub-text">
                        <div id="table" class="table-editable">
                            <table class="table">
                                <tr>
                                    <th>Select</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Price/plate</th>
                                </tr>
                               
                                <?php 
                                $sql = "SELECT name, description, price, code FROM alakarte where code like 'nvd%'";
                                $resultset = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));
                                while( $record = mysqli_fetch_assoc($resultset) ){
                                    echo "
                                <tr>
                                    <td>
                                    <form method='post'>
                                        <input type='hidden' name='code' value=".$record['code'].">
                                        <button type='submit' class='btn btn-primary btn-sm'>Add</button>
                                    </form>
                                    </td>
                                    <td>".$record['name']."</td>
                                    <td>".$record['description']."</td>
                                    <td>".$record['price']."</td>                                   
                                </tr>
                                ";
                            }?>

                            </table>
                        </div>
                    </article>
                </div>


            </article>
            <!--/ac-text-->

        </div>
        <!--/ac-->
        <div class="ac">

            <input class="ac-input" id="ac-9" name="ac-9" type="checkbox" />
            <label class="ac-label" for="ac-9">Common</label>

            <article class="ac-text">

                <div class="ac-sub">
                    <input class="ac-input" id="ac-10" name="ac-10" type="checkbox" />
                    <label class="ac-label" for="ac-10">Starter</label>
                    <article class="ac-sub-text">
                        <div id="table" class="table-editable">
                            <table class="table">
                                <tr>
                                    <th>Select</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Price/plate</th>
                                </tr>
                                <?php 
                                $sql = "SELECT name, description, price, code FROM alakarte where code like 'cs%'";
                                $resultset = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));
                                while( $record = mysqli_fetch_assoc($resultset) ){
                                    echo "
                                <tr>
                                    <td>
                                    <form method='post'>
                                        <input type='hidden' name='code' value=".$record['code'].">
                                        <button type='submit' class='btn btn-primary btn-sm'>Add</button>
                                    </form>
                                    </td>
                                    <td>".$record['name']."</td>
                                    <td>".$record['description']."</td>
                                    <td>".$record['price']."</td>                                   
                                </tr>
                                ";
                            }?>
                            </table>
                        </div>
                    </article>
                </div>

                <div class="ac-sub">
                    <input class="ac-input" id="ac-11" name="ac-11" type="checkbox" />
                    <label class="ac-label" for="ac-11">Main-course</label>
                    <article class="ac-sub-text">
                        <div id="table" class="table-editable">
                            <table class="table">
                                <tr>
                                    <th>Select</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Price/plate</th>
                                </tr>
                                <?php 
                                $sql = "SELECT name, description, price, code FROM alakarte where code like 'cmc%'";
                                $resultset = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));
                                while( $record = mysqli_fetch_assoc($resultset) ){
                                    echo "
                                <tr>
                                    <td>
                                    <form method='post'>
                                        <input type='hidden' name='code' value=".$record['code'].">
                                        <button type='submit' class='btn btn-primary btn-sm'>Add</button>
                                    </form>
                                    </td>
                                    <td>".$record['name']."</td>
                                    <td>".$record['description']."</td>
                                    <td>".$record['price']."</td>                                   
                                </tr>
                                ";
                            }?>
                            </table>
                        </div>
                    </article>
                </div>

                <div class="ac-sub">
                    <input class="ac-input" id="ac-12" name="ac-12" type="checkbox" />
                    <label class="ac-label" for="ac-12">Desert</label>
                    <article class="ac-sub-text">
                        <div id="table" class="table-editable">
                            <table class="table">
                                <tr>
                                    <th>Select</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Price/plate</th>
                                </tr>
                                <?php 
                                $sql = "SELECT name, description, price, code FROM alakarte where code like 'cd%'";
                                $resultset = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));
                                while( $record = mysqli_fetch_assoc($resultset) ){
                                    echo "
                                <tr>
                                    <td>
                                    <form method='post'>
                                        <input type='hidden' name='code' value=".$record['code'].">
                                        <button type='submit' class='btn btn-primary btn-sm'>Add</button>
                                    </form>
                                    </td>
                                    <td>".$record['name']."</td>
                                    <td>".$record['description']."</td>
                                    <td>".$record['price']."</td>                                   
                                </tr>
                                ";
                            }?>
                            </table>
                        </div>
                    </article>
                </div>

            </article>
            <!--/ac-text-->

        </div>
        <!--/ac-->
    </section>
    <?php echo $status; ?>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <div class="lightbox js-lightbox js-toggle-cart"></div>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>



    <script src="resources/js/jsalkarte.js"></script>
</body>

</html>
