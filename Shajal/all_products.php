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
   <?php getcat(); 
   
   
   ?>
    </ul>
    <div id="slide_title">Brand</div>
    <ul id="cats">
   
  <?php getbrand(); ?>
    
    
    
    </ul>
    
    
    
    
    
    
    </div>
    <div id="right_content">
    
    
    
    <div id="product_box">
  <?php
   $get_product="select * from products ";
	$run_products = mysqli_query($con, $get_product);
	while ($row_product=mysqli_fetch_array ($run_products)){
		$pro_id= $row_product['product_id'];
		$pro_title= $row_product['product_title'];
		$pro_cat= $row_product['cat_id'];
		$pro_brand= $row_product['brand_id'];
		$pro_des= $row_product['product_des'];
		$pro_price= $row_product['product_price'];
		$pro_image= $row_product['product_img1'];
		
		echo"
		<div id='single_product'>
		<h3>$pro_title</h3>
		
		<img src='admin_area/product_images/$pro_image' width='180' height='180' /><br>
		
		<p><b>Price: $pro_price </b></p>
		
		<a href='details.php?pro_id=$pro_id' style='float:left;' >Details</a>
		<a href='index.php?add_cart=$pro_id'><button style='float:right;'>Add to cart</button></a>
		</div>
		";
		
		
		}
	
	
	
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