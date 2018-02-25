<?php
$db = mysqli_connect("localhost","root","","myshop");

function getIp() {

    $ip = $_SERVER['REMOTE_ADDR'];

 

    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {

        $ip = $_SERVER['HTTP_CLIENT_IP'];

    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {

        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];

    }

 

    return $ip;

}

function cart(){
if (isset($_GET['add_cart'])){
	global $db;
$ip= getIp();
$pro_id= $_GET['add_cart'];

$check_pro= "select * from cart where ip_add='$ip' AND p_id='$pro_id'";
$run_check=mysqli_query($db,$check_pro);
$count_check=mysqli_num_rows($run_check);
if ($count_check>0){
	
	echo"";
}
else {
	$insert_pro="insert into cart (p_id,ip_add) values ('$pro_id','$ip')";
	$run_pro=mysqli_query($db,$insert_pro);
	echo"<script>window.open('index.php','_self')<script>";
}

}




}

//function of total item
function total_items(){
	if(isset($_GET['add_cart'])){
		global $db;
		$ip=getIp();
		$get_items="select * from cart where ip_add='$ip'";
		$run_items=mysqli_query($db,$get_items);
		$count_items=mysqli_num_rows($run_items);

		}
		else {
			global $db;
		$ip=getIp();
		$get_items="select * from cart where ip_add='$ip'";
		$run_items=mysqli_query($db,$get_items);
		$count_items=mysqli_num_rows($run_items);

			
		}
		echo $count_items;
}
//total price
function total_price (){
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
		}
	}
	
	echo $total;
}
	
function getpro(){

global $db;
if(!isset($_GET['cat'])){
	if(!isset($_GET['brand'])){
	 
	$get_product="select * from products order by rand() LIMIT 0,6";
	$run_products = mysqli_query($db, $get_product);
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
	
	
	
	
	} //if cat 
}
} //function braket

//function of getcatpro 
function getcatpro(){

global $db;
if(isset($_GET['cat'])){
	
	 $cat_id=$_GET['cat'];
	 
	$get_cat_pro = "select * from products where cat_id='$cat_id'";
	$run_cat_pro = mysqli_query($db, $get_cat_pro);
	
	$count = mysqli_num_rows ($run_cat_pro);
	if ($count==0)
	echo"<h1>no product store in this catagory</h1>";
	
	while ($row_cat_pro=mysqli_fetch_array ($run_cat_pro)){
		$pro_id= $row_cat_pro['product_id'];
		$pro_title= $row_cat_pro['product_title'];
		$pro_cat= $row_cat_pro['cat_id'];
		$pro_brand= $row_cat_pro['brand_id'];
		$pro_des= $row_cat_pro['product_des'];
		$pro_price= $row_cat_pro['product_price'];
		$pro_image= $row_cat_pro['product_img1'];
		
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
	
	
	
	
	} //if cat braket

} //end of getcatpro


//function of getbrandpro 
function getbrandpro(){

global $db;
if(isset($_GET['brand'])){
	
	 $brand_id=$_GET['brand'];
	 
	$get_brand_pro = "select * from products where brand_id='$brand_id'";
	$run_brand_pro = mysqli_query($db, $get_brand_pro);
	
	$count = mysqli_num_rows ($run_brand_pro);
	if ($count==0)
	echo"<h1>no product store in this brand</h1>";
	
	while ($row_brand_pro=mysqli_fetch_array ($run_brand_pro)){
		$pro_id= $row_brand_pro['product_id'];
		$pro_title= $row_brand_pro['product_title'];
		$pro_cat= $row_brand_pro['cat_id'];
		$pro_brand= $row_brand_pro['brand_id'];
		$pro_des= $row_brand_pro['product_des'];
		$pro_price= $row_brand_pro['product_price'];
		$pro_image= $row_brand_pro['product_img1'];
		
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
	
	
	
	
	} //end if

}  //end of getbrandtpro



//function of brand 
function getbrand(){
	  global $db;
    $get_brands = "select * from brands";
	$run_brands = mysqli_query($db, $get_brands);
	while($row_brands=mysqli_fetch_array($run_brands)){
		$brand_id=$row_brands['brand_id'];
		$brand_title=$row_brands['brand_title'];
     echo "<li><a href='index.php?brand=$brand_id'>$brand_title</a></li>";
   
	}
   
	
	
	
	}//function brand
	
	//function cat
	function getcat(){
		
		global $db;
    $get_cats = "select * from categories";
	$run_cats = mysqli_query($db, $get_cats);
	while($row_cats=mysqli_fetch_array($run_cats)){
		$cat_id=$row_cats['cat_id'];
		$cat_title=$row_cats['cat_title'];
     echo "<li><a href='index.php?cat=$cat_id'>$cat_title</a></li>";
   
	}
   
		
		}//function cat

?>