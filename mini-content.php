<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale = 1.0">
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,300i,400,700" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="resources/css/styleminicontent.css">
    <link rel="stylesheet" type="text/css" href="vendors/css/grid.css">
    <link rel="stylesheet" type="text/css" href="vendors/css/animate.css">
    <link rel="stylesheet" type="text/css" href="vendors/css/ionicons.min.css">
    <link href="https://unpkg.com/ionicons@4.4.8/dist/css/ionicons.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="vendors/css/normalize.css">
    <title>Mini-Meals</title>
</head>

<body>

    <section class="section-meals clearfix">
        <div class="image-section js--image-section  clearfix">
            <nav>
                <img src="resources/img/logo3%20white.png" alt="aman's logo" class="logo">
                <ul class="main-nav js--main-nav">
                    <li><a href="/../../../index1.html">Home </a></li>
                    <li><a href="#about">About Us </a></li>
                    <li><a href="#contact">Contact Us </a></li>
                    <li><a href="gallery.html">gallery </a></li>
                </ul>
            </nav>
            <div class="welcome-text js--welcome-text">
                <i class="ion-md-quote"></i>
                <blockquote>
                    Hey guys! This is the mini-meals section.<br> Here you can choose the package as per your preference of &#58;<br>
                    <span>
                        veg &amp; non-veg.
                    </span>
                </blockquote>
            </div>
            <div class="veg">

                <div class="meals-showcase clearfix js--meals-showcase">
                    <div>
                        <img src="resources/img/pita-bread.jpg" alt="Pita-Bread" class="img-responsive">
                        <div class="overlay v-1">
                            <a href="#" class="btn btn-show veg-1">Pita-Bread<br>Rs.60</a>
                            <ion-icon name="close-circle-outline" class="icon icon-v-1"></ion-icon>

                        </div>
                    </div>
                    <div>
                        <img src="resources/img/fries.jpg" alt="Fries" class="img-responsive">
                        <div class="overlay v-2">
                            <a href="#" class="btn btn-show veg-2">Fries<br>Rs.60</a>
                            <ion-icon name="close-circle-outline" class=" icon icon-v-2"></ion-icon>
                        </div>
                    </div>
                    <div>
                        <img src="resources/img/pastaveg_640x480.jpg" alt="Veg-pasta" class="img-responsive">
                        <div class="overlay v-3">
                            <a href="#" class="btn btn-show veg-3">Veg-Pasta<br>Rs.60</a>
                            <ion-icon name="close-circle-outline" class=" icon icon-v-3"></ion-icon>
                        </div>
                    </div>
                    <div>
                        <img src="resources/img/veg-pizza.jpg" alt="Veg-Pizza" class="img-responsive">
                        <div class="overlay v-4">
                            <a href="#" class="btn btn-show veg-4">Veg-Pizza<br>Rs.60</a>
                            <ion-icon name="close-circle-outline" class=" icon icon-v-4"></ion-icon>
                        </div>
                    </div>
                    <div>
                        <img src="resources/img/veg-burger.jpg" alt="Veg-Burger" class="img-responsive">
                        <div class="overlay v-5">
                            <a href="#" class="btn btn-show veg-5">Veg-Burger<br>Rs.60</a>
                            <ion-icon name="close-circle-outline" class=" icon icon-v-5"></ion-icon>
                        </div>
                    </div>
                    <div>
                        <img src="resources/img/fries.jpg" alt="kebab" class="img-responsive">
                        <div class="overlay v-6">
                            <a href="#" class="btn btn-show veg-6">Kebab<br>Rs.60</a>
                            <ion-icon name="close-circle-outline" class=" icon icon-v-6"></ion-icon>
                        </div>
                    </div>
                    <div>
                        <img src="resources/img/fries.jpg" alt="kebab" class="img-responsive">
                        <div class="overlay v-7">
                            <a href="#" class="btn btn-show veg-7">Kebab<br>Rs.60</a>
                            <ion-icon name="close-circle-outline" class=" icon icon-v-7"></ion-icon>
                        </div>
                    </div>
                    <div>
                        <img src="resources/img/fries.jpg" alt="kebab" class="img-responsive">
                        <div class="overlay v-8">
                            <a href="#" class="btn btn-show veg-8">Kebab<br>Rs.60</a>
                            <ion-icon name="close-circle-outline" class=" icon icon-v-8"></ion-icon>
                        </div>
                    </div>

                </div>

            </div>
            <div class="non-veg">

                <div class="non-veg-meals-showcase js--non-veg-meals-showcase clearfix">
                    <div>
                        <img src="resources/img/kebab.jpg" alt="kebab" class="img-responsive">
                        <div class="overlay nv-1">
                            <a href="#" class="btn btn-show non-veg-1">Kebab<br>Rs.60</a>
                            <ion-icon name="close-circle-outline" class=" icon icon-nv-1"></ion-icon>
                        </div>
                    </div>
                    <div>
                        <img src="resources/img/chicken-sandwich.jpg" alt="Chicken-Sandwich" class="img-responsive">
                        <div class="overlay nv-2">
                            <a href="#" class="btn btn-show non-veg-2">Chicken-Sandwich<br>Rs.60</a>
                            <ion-icon name="close-circle-outline" class="icon icon-nv-2"></ion-icon>
                        </div>
                    </div>
                    <div>
                        <img src="resources/img/chicken-chilli.jpg" alt="chicken-chilli" class="img-responsive">
                        <div class="overlay nv-3">
                            <a href="#" class="btn btn-show non-veg-3">chicken-chilli<br>Rs.60</a>
                            <ion-icon name="close-circle-outline" class="icon icon-nv-3"></ion-icon>
                        </div>
                    </div>
                    <div>
                        <img src="resources/img/chicken-manchurian.jpg" alt="chicken-manchurian" class="img-responsive">
                        <div class="overlay nv-4">
                            <a href="#" class="btn btn-show non-veg-4">chicken-manchurian<br>Rs.60</a>
                            <ion-icon name="close-circle-outline" class="icon icon-nv-4"></ion-icon>
                        </div>
                    </div>
                    <div>
                        <img src="resources/img/chicken-sandwich.jpg" alt="kebab" class="img-responsive">
                        <div class="overlay nv-5">
                            <a href="#" class="btn btn-show non-veg-5">Kebab<br>Rs.60</a>
                            <ion-icon name="close-circle-outline" class="icon icon-nv-5"></ion-icon>
                        </div>
                    </div>
                    <div>
                        <img src="resources/img/chicken-sandwich.jpg" alt="kebab" class="img-responsive">
                        <div class="overlay nv-6">
                            <a href="#" class="btn btn-show non-veg-6">Kebab<br>Rs.60</a>
                            <ion-icon name="close-circle-outline" class="icon icon-nv-6"></ion-icon>
                        </div>
                    </div>
                    <div>
                        <img src="resources/img/chicken-sandwich.jpg" alt="kebab" class="img-responsive">
                        <div class="overlay nv-7">
                            <a href="#" class="btn btn-show non-veg-7">Kebab<br>Rs.60</a>
                            <ion-icon name="close-circle-outline" class="icon icon-nv-7"></ion-icon>
                        </div>
                    </div>
                    <div>
                        <img src="resources/img/chicken-sandwich.jpg" alt="kebab" class="img-responsive">
                        <div class="overlay nv-8">
                            <a href="#" class="btn btn-show non-veg-8">Kebab<br>Rs.60</a>
                            <ion-icon name="close-circle-outline" class="icon icon-nv-8"></ion-icon>
                        </div>
                    </div>

                </div>

            </div>
        </div>

        <div class="form">
            <h1>mini &mdash; meals</h1>
            <form class="meals-form" action="minimealing.php" method="POST">
              <div class="form-elements">
                    <label >Quantity : </label>
                </div>
               <div class="form-elements">

                    <label>Veg&nbsp;</label>
                    <p class="line"></p>
                    <label>Non-Veg</label>
                </div>
                <div class="form-elements">
                    <input type="text" id="veg-name" class="veg-name" disabled>
                    <input type="text" id="nonveg-name" class="nonveg-name" disabled>
                </div>
                <div class="form-elements">

                    <input type="number" id="vquantity" name="vegquantity" min="0" placeholder="Quantity" onchange="displaySum()" required>
                    <p class="line"></p>
                    <input type="number" id="nvquantity" name="nonvegquantity" min="0" placeholder="Quantity" onchange="displaySum()" required>
                </div>
                <div class="form-elements">
                    <label class="tq"></label>
                </div>
                <div class="form-elements">
                    <label>Total Rs.</label>
                    <input type="number" name='tottal' id="total" placeholder="TOTAL" disabled>
                </div>
                <div class="form-elements">
                    <input type="submit" value="submit" class="submit">
                    <input type="reset" value="reset" id="reset">
                </div>
                <div class="form-elements">
                    <h3>Choose one to show : </h3>
                    <ul class="btn-section">
                        <li>
                            <img src="resources/img/veg-btn.jpg" alt="Veg">
                            <div class="btn-overlay">
                                <a href="#" class="btn js--veg-btn">Vegetarian<br>food</a>
                            </div>
                        </li>
                        <li>
                            <img src="resources/img/non-veg-btn.jpg" alt="Veg">
                            <div class="btn-overlay">
                                <a href="#" class="btn js--non-veg-btn">Non-vegetarian<br>food</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </form>
        </div>

    </section>
    <section class="section-1">

    </section>
    <script src="https://unpkg.com/ionicons@4.4.4/dist/ionicons.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="resources/js/script2.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    <script src="sweetalert2.all.min.js"></script>
    <!-- Optional: include a polyfill for ES6 Promises for IE11 and Android browser -->
    <script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
</body>

</html>

