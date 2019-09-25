<?php 
require_once ('config.php');
?>
<html>
<head>
    <title>Razorpay test mode</title>
    <meta name="viewport" content="width=device-width">
</head>
<body>
<form action="https://www.example.com/payment/success/" method="POST">
<script
    src="https://checkout.razorpay.com/v1/checkout.js"
    data-key="<?php echo $razor_api_key; ?>" // Enter the Key ID generated from the Dashboard
    data-amount="29935" // INR 235
    data-buttontext="Razorpay"
    data-name="AMAN's"
    data-description="Anywhere in guwahati"
    data-image="https://example.com/your_logo.jpg"
    data-prefill.name="Gaurav Kumar"
    data-prefill.email="gaurav.kumar@example.com"
    data-theme.color="#F37254">
</script>
<input type="hidden" custom="Hidden Element" name="hidden">
</form>

</body>

</html>