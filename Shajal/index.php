<?php
include("includes/dp.php");
include("functions/functions.php");
?>



<!DOCTYPE html >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Shajal voltage</title>
<link rel="stylesheet" href="styles/style.css" media="all" />
</head>

<body>
<div class="main_wrapper">
<!-- header starts-->
    <div class="header_wrapper">
  <a href="index.php"><img src="images/pic.gif" style="float:right"></a>
 <a href="index.php">   <img src="images/welcome.gif" style="float:left"></a>
    
    </div>
    
    
    <!-- header end-->
    <div id="navbar">
    
    <ul id="menu">
    <li><a href="index.php" > Home</a></li>
     <li><a href="all_products.php" > All products</a></li>
      <li><a href="#" > My acc</a></li>
       <li><a href="#" > Sign up</a></li>
        <li><a href="#" > Shopping</a></li>
        <li><a href="#" > Contuct us</a></li>
    </ul>  
        
    <div id="form">
    <form method="get" action="result.php" enctype="multipart/form-data" >
    <input type="text" name="user_querry" placeholder="seacrh a products" />
    <input type="submit" name="search" value="search" />
    </form>
    </div>
    
     <div>
         <div>
		 <br>
		 <br>
            <b>welcome guest </b>
           <b><a style="color:yellow"  href="cart.php" >  Shopping cart </a></b>
           <span>-Ttem- <?php total_items(); ?> price- <?php total_price(); ?> </span>
        </div>
    </div>
    
    
    
    
    
    </div>
    
    
    <div class="content_wrapper">
	
    <div id="left_content">
    <div id="slide_title">Categories</div>
    <ul id="cats">
   <?php getcat(); ?>
  
   
   
   
    </ul>
    <div id="slide_title">Brand</div>
    <ul id="cats">
   
  <?php getbrand(); ?>
    
    
    
    </ul>
    
    
    
    
    
    
    </div>
    <div id="right_content">
    
   
	
	
    <div id="product_box">
  <?php getpro(); 
  getcatpro();
  getbrandpro();
  cart();
  ?>
    </div>
    
    
    </div>
    
    
     </div>
    
    
    <div class="footer">
    <h1 style="color:#000; padding-top:30px; text-align:center;">&copy; 2015-BY Onurita Voyngkori. </h1>
    
    
    
    </div>
    

</div>

</body>
</html>