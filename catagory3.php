<!DOCTYPE html>
<html lang="en" >

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">

  
      <link rel="stylesheet" href="resources/css/stylecat2.css">

  
</head>

<body>
    
    <div class="side2">
    <ul>
              <li><img src="resources/css/img/logo3%20white.png" class="logo"></li>
              <li><a>&nbsp;</a></li>
              <li  class="side"><a href="index.html">Home</a></li>
              <li  class="side"><a href="#">Contact us</a></li>
              <li  class="side"><a href="#">About us</a></li>
             
        </ul>
        </div>
    
    <div style="margin-left:14%;">
          <!-- multistep form -->
        <form id="msform" >
          <!-- progressbar -->
          <ul id="progressbar">
            <li class="active">Information</li>
            <li>category</li>
            <li>Menu</li>
          </ul>
          <!-- fieldsets -->
          <fieldset>
            <?php 

$month = date('m');
$day = date('d');
$year = date('Y');

$today = $year . '-' . $month . '-' . $day;
?>
            <h2 class="fs-title">Enter the date of event</h2>
              <input type="date" name="bday" min="<?php echo $today; ?>" value="<?php echo $today; ?>" checked>
            <input type="button" name="next" class="next action-button" value="Next" >
          </fieldset>


          <fieldset>
            <div class="row2">
                <div style="margin-left:1%;padding:30px;">
                    <h2 class="fs-title">Enter the categories you need for the event</h2>
                        <label class="container">Food
                          <input type="checkbox" checked="checked" name="category[]" value="food">
                          <span class="checkmark"></span>
                        </label>
                        <label class="container">Photography
                          <input type="checkbox" name="category[]" value="photography">
                          <span class="checkmark"></span>
                        </label>
                        <label class="container">Decoration
                          <input type="checkbox" name="category[]" value="decoration[]">
                          <span class="checkmark"></span>
                        </label>
                        <label class="container">DJ
                          <input type="checkbox" name="category[]" value="dj">
                          <span class="checkmark"></span>
                        </label>
                        <label class="container">Live Music
                          <input type="checkbox" name="category[]" value="live_music">
                          <span class="checkmark"></span>
                        </label>
                        <label class="container">Select All
                          <input type="checkbox" name="category[]">
                          <span class="checkmark"></span>
                        </label>
                </div>
                </div>
            <input type="button" name="previous" class="previous action-button" value="Previous" />
            <input type="button" name="next" class="next action-button" value="Next" />
          </fieldset>


          <fieldset>
            <h2 class="fs-title">Select the type of menu you want</h2>
              <div class="menu">
                  <a href="index.html">Customizable </a><br><br>
                  <a href="index.html">Package </a><br><br>
              </div>
            <input type="button" name="previous" class="previous action-button" value="Previous" />
          </fieldset>
        </form></div>
          <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
        <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js'></script>

    <script  src="resources/js/category2.js"></script>




</body>

</html>
