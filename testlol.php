<?php

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale = 1.0">
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,300i,400,700" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="resources/css/stylealakarte.css">
    <link rel="stylesheet" type="text/css" href="vendors/css/grid.css">
    <link rel="stylesheet" type="text/css" href="vendors/css/animate.css">
    <link rel="stylesheet" type="text/css" href="vendors/css/ionicons.min.css">
    <link href="https://unpkg.com/ionicons@4.4.8/dist/css/ionicons.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="vendors/css/normalize.css">
    <title>Mini-Meals</title>
</head>

<body>

    <nav>
        <img src="resources/img/logo3%20white.png" alt="aman's logo" class="logo">
        <ul class="main-nav js--main-nav">
            <li><a href="/../../../index1.html">Home </a></li>
            <li><a href="#about">About Us </a></li>
            <li><a href="#contact">Contact Us </a></li>
        </ul>
    </nav>

    <section class="container">

        <h1>Select Your Items</h1>

        <div class="ac">

            <input class="ac-input" id="ac-1" name="ac-1" type="checkbox" />
            <label class="ac-label" for="ac-1">Veg</label>

            <article class="ac-text">

                <div class="ac-sub">
                    <input class="ac-input" id="ac-2" name="ac-2" type="checkbox" />
                    <label class="ac-label" for="ac-2">Starter</label>
                    <article class="ac-sub-text">
                        <table>
                            <tr>
                                <td>Product Name</td>
                                <td>₹20</td>
                                <td><a class="button js-add-product" href="#" title="Add to cart">
                                        <p>Add </p>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>Product Name</td>
                                <td>₹30</td>
                                <td><a class="button js-add-product" href="#" title="Add to cart">
                                        <p>Add </p>
                                    </a>
                                </td>
                            </tr>
                        </table>
                    </article>
                </div>


                <div class="ac-sub">
                    <input class="ac-input" id="ac-3" name="ac-3" type="checkbox" />
                    <label class="ac-label" for="ac-3">Main-Course</label>
                    <article class="ac-sub-text">
                        <table>
                            <tr>
                                <td>Product Name</td>
                                <td>₹20</td>
                                <td><a class="button js-add-product" href="#" title="Add to cart">
                                        <p>Add </p>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>Product Name</td>
                                <td>₹30</td>
                                <td><a class="button js-add-product" href="#" title="Add to cart">
                                        <p>Add </p>
                                    </a>
                                </td>
                            </tr>
                        </table>
                    </article>
                </div>

                <div class="ac-sub">
                    <input class="ac-input" id="ac-4" name="ac-4" type="checkbox" />
                    <label class="ac-label" for="ac-4">Desert</label>
                    <article class="ac-sub-text">
                        <p>My younger brother was in London </p>
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
                        <p>My younger brother was in London </p>
                    </article>
                </div>

                <div class="ac-sub">
                    <input class="ac-input" id="ac-7" name="ac-7" type="checkbox" />
                    <label class="ac-label" for="ac-7">Main-course</label>
                    <article class="ac-sub-text">
                        <p>But not only is the sea such a </p>
                    </article>
                </div>

                <div class="ac-sub">
                    <input class="ac-input" id="ac-8" name="ac-8" type="checkbox" />
                    <label class="ac-label" for="ac-8">Desert</label>
                    <article class="ac-sub-text">
                        <p>My younger brother was in London </p>
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
                        <p>But not only is the sea such a foe to man who is an alien to it,
                    </article>
                </div>

                <div class="ac-sub">
                    <input class="ac-input" id="ac-11" name="ac-11" type="checkbox" />
                    <label class="ac-label" for="ac-11">Main-course</label>
                    <article class="ac-sub-text">
                        <p>My younger brother was in London </p>
                    </article>
                </div>

                <div class="ac-sub">
                    <input class="ac-input" id="ac-12" name="ac-12" type="checkbox" />
                    <label class="ac-label" for="ac-12">Desert</label>
                    <article class="ac-sub-text">
                        <p>My younger brother was in London </p>
                    </article>
                </div>

            </article>
            <!--/ac-text-->

        </div>
        <!--/ac-->


    </section>




    <aside class="cart js-cart">
        <div class="cart__header">
            <h1 class="cart__title">Shopping cart</h1>
        </div>
        <div class="cart__products js-cart-products">
            <p class="cart__empty js-cart-empty">
                Add a product to your cart
            </p>
            <div class="cart__product js-cart-product-template">
                <div class="prod">
                    <article class="js-cart-product">
                        <h1>Product title</h1>
                        <p>
                            <a class="js-remove-product" href="#" title="Delete product">
                                Delete product
                            </a>
                        </p>
                    </article>
                </div>
            </div>
        </div>
        <div class="cart__footer">
            <p class="cart__text">
                <a class="button" href="#" title="Buy products">
                    Buy products
                </a>
            </p>
        </div>
    </aside>

    <div class="lightbox js-lightbox js-toggle-cart"></div>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>



    <script src="resources/js/jsalkarte.js"></script>
</body>

</html>

