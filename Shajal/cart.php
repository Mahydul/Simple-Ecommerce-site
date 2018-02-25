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
  <form action="" method="post" enctype="multipart/form-data" >
  <table align="center" width="700" bgcolor="yellow" >
  <tr align="center">
  <td colspan="5"><h3>Update your cart or checkout </h3></td>
  </tr>
  
  <tr aling="center">
<th>Remove </th>
<th>Product</th>
<th>Total price </th>
  </tr>
  
  <?php 
  $total=0;
  global $db;
	$ip=getIp();
	$sel_price="select * from cart where ip_add='$ip'";
	$run_price=mysqli_query($db,$sel_price);
	while($p_price=mysqli_fetch_array($run_price)){
		$pro_id=$p_price['p_id'];
		$pro_price="select * from products where product_id='$pro_id'";
		$run_pro_price=mysqli_query($db,$pro_price);
		while ($pp_price=mysqli_fetch_array($run_pro_price)){
			$product_price=array($pp_price['product_price']);
			$values=array_sum($product_price);
			$total=$total+$values;
		
	
	$product_title=$pp_price['product_title'];
	$product_image=$pp_price['product_img1'];
	$single_price=$pp_price['product_price'];
  ?>
  
  <tr align="center">
  <td><input type ="checkbox" name="remove[]" value="<?php echo $pro_id; ?>" /></td>
  <td><?php echo $product_title; ?> <br> 
  <img src="admin_area/product_images/<?php echo $product_image; ?>" width="60" height="60" />
  </td>
  
  
  
  
  
  <td><?php echo $single_price; ?> </td>
  </tr>
  
	<?php } } ?>
	
	<tr align="right">
	<td colspan="5"><b>Sub Total: </b></td>
	<td><?php echo $total ?></td>
	</tr>
	
	<tr>
	<td><input type="submit" name="update_cart" value="update cart" /></td>
	<td><input type="submit" name="continue" value="Continue Shopping" /></td>
	<td><input type="submit" name="set_qty" value="Set Quantity" /></td>
	<td>
	</tr>
	
  </table>
  </form>
  
  <?php 
  //update cart
  

  $ip=getIp();
  if(isset($_POST['update_cart'])){
	  
	  foreach($_POST['remove'] as $remove_id){
		  $delete_product="delete from cart where p_id='$remove_id' AND ip_add='$ip'";
		  $run_delete =mysqli_query($db,$delete_product);
		  if($run_delete){
			  echo"<script>window.open('cart.php','_self')</script>";
		  }
		  
	  }
	  
  }
  
  
  //continue 
  if(isset($_POST['continue'])){
	  echo"<script>window.open('index.php','_self')</script>";
  }
  if(isset($_POST['set_qty']))
  {
	  
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