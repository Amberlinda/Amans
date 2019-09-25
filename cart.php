<?php 
require_once ('razorpay/config.php');
?>
<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <link href="resources/css/mini_meal_style.css" rel="stylesheet" type="text/css" >
    <title>cart</title>

</head>

<body>

<?php
    
    session_start();
    $status="";
    if (isset($_POST['action']) && $_POST['action']=="remove")
    {
        if(!empty($_SESSION["minimeal"]))
        {
            foreach($_SESSION["minimeal"] as $key => $value) 
            {
              if($_POST["code"] == $key)
              {
                  unset($_SESSION["minimeal"][$key]);
                  $status = "<div class='box' style='color:red;'>
                  Product is removed from your cart!</div>";
              }
              if(empty($_SESSION["minimeal"]))
              unset($_SESSION["minimeal"]);
            }		
        }
    }
     
    if (isset($_POST['action']) && $_POST['action']=="change")
    {
        foreach($_SESSION["minimeal"] as $value)
        {
            if($value['code'] === $_POST["code"])
            {
                $value['quantity'] = $_POST["quantity"];
                break; // Stop the loop after we've found the product
            }
        }
      	
    }
?>


    <div class="cart">
        <?php
if(isset($_SESSION["minimeal"])){
    $total_price = 0;
?>
<nav>
        <img src="resources/img/logo3%20white.png" alt="aman's logo" class="logo">
        <ul class="main-nav js--main-nav">
            <li><a href="mini_meal.php">Back to mini-meals</a></li>
            <li><a href="index1.php">Home </a></li>
            <li><a href="index1.php#contact">Contact Us </a></li>
        </ul>
    </nav>

<table class="table cart-table">
  <thead class="thead-light">
        <tr>
            <th scope="col">#</th>
            <th scope="col">ITEM NAME</th>
            <th scope="col">QUANTITY</th>
            <th scope="col">UNIT PRICE</th>
            <th scope="col">ITEMS TOTAL</th>
        </tr>
  </thead>
  <?php		
    foreach ($_SESSION["minimeal"] as $product){
        
    ?>
  <tbody>
    <tr>

        <td scope="row"><img src='<?php echo 'mini_meal_image/'.$product["image"]; ?>' width="50" height="40" /></td>
        <td>
            <?php echo $product["name"]; ?><br />
            <form method='post' >
                <input type='hidden' name='code' value="<?php echo $product["code"]; ?>" />
                <input type='hidden' name='action' value="remove" />
                <button type='submit' class='btn btn-primary btn-xs'>Remove Item</button>
            </form>
        </td>
        <td>
            <form method='post'>
                <input type='hidden' name='code' value="<?php echo $product["code"]; ?>">
                <input type='hidden' name='action' value="change" >
                <select name='quantity' class='quantity' onChange="this.form.submit()">
                    <option <?php if($product["quantity"]==1) {echo "selected";} ?>value="1">1</option>
                    <option <?php if($product["quantity"]==2) {echo "selected";}?>value="2" >2</option>
                    <option <?php if($product["quantity"]==3) {echo "selected";}?>value="3">3</option>
                    <option <?php if($product["quantity"]==4) {echo "selected";}?>value="4">4</option>
                    <option selected <?php if($product["quantity"]==15) {echo "selected";}?>value="15">15</option>
                </select>
            </form>
        </td>
        <td> <?php echo "Rs.".$product["price"];?></td>
        <?php $tot = $product["price"]*15 ?>
        <td><?php echo "Rs.".$tot; ?></td>
    </tr>
    
    <?php $total_price += ($product["price"]*15);
                            }
            ?>
    <tr>
        <td colspan="5" align="right">
            <strong>TOTAL:
                <?php echo "Rs.".$total_price; ?></strong>
        </td>
    </tr>
    <tr>
        <td colspan="5" align="right">
        <form action="https://www.example.com/payment/success/" method="POST">
            <script
                src="https://checkout.razorpay.com/v1/checkout.js"
                data-key="<?php echo $razor_api_key; ?>" // Enter the Key ID generated from the Dashboard
                data-amount="<?php echo $total_price*100; ?>" /** 1 rupee = 100 paise */
                data-buttontext="Proceed to pay"
                data-name="AMAN's"
                data-description="Event planning becomes easy"
                data-image="resources/img/logo-black.png"
                data-prefill.name="Amber linda"
                data-prefill.email="amberujjwallinda@gmail.com"
                data-theme.color="#3c59da">
            </script>
            <input type="hidden" custom="Hidden Element" name="hidden">
        </form>
        </td>
    </tr>
  </tbody>
</table>
        <?php
}else{
    echo "<h3>Your cart is empty!</h3>";
    header('location:mini_meal.php');
	}
?>
    </div>

    <div style="clear:both;"></div>

    <div class="message_box" style="margin:10px 0px;">
        <?php echo $status; ?>
    </div>

</body>

</html>
