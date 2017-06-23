<?php
session_start();
include('dbConnect.php');
include("config.inc.php");
$name = $_SESSION["firstName"];
setlocale(LC_MONETARY,"en_US");
$tname=$_SESSION["tname"];

?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Review Your Cart Before Buying</title>
<link href="style/style.css" rel="stylesheet" type="text/css">
<style>
      
        body{
            background: url("img/bg2.jpg");height: 100% ;
        }
       
    </style>
</head>
<body>
    <h3 style="text-align:center"><b>Review Your Cart Before Buying</b></h3>
    <h4 style="position: absolute;right:14%;top:8px; display: bold; font-size: 22px; "><b><?php echo $name ?></b></h4>
<h3 style="position: absolute;right:5%;top:10px; font-size: 22px;"> <a href="logout.php">Logout</a></h3>

<?php
if(isset($_SESSION["products"]) && count($_SESSION["products"])>0){
	$total 			= 0;
	$list_tax 		= '';
	$cart_box 		= '<ul class="view-cart">';
        $result=$mysqli_conn->query("SELECT address FROM user where firstName='" . $name . "'");
        while ($row = $result->fetch_assoc()) {
        $address= $row['address'];
       }

	foreach($_SESSION["products"] as $product){ //Print each item, quantity and price.
		$menu = $product["menu"];
               // $fullmenu=array($menu);
               // foreach ($fullmenu as $key) {
               //     $fullmenu=array($menu => $key);
               // }
          // $fullmenuarr= serialize($fullmenu);
           // $fullmenuarr=implode(",",$fullmenu);
           
            
            $product_qty = $product["product_qty"];
		$price = $product["price"];
		
		
		$product_size = $product["product_size"];
		
		$item_price 	= sprintf("%01.2f",($price * $product_qty));  // price x qty = total item price
		
		$cart_box 		.=  "<li>  $menu (Qty : $product_qty | $product_size) <span> $currency. $item_price </span></li>";
		
		$subtotal 		= ($price * $product_qty); //Multiply item quantity * price
		$total 			= ($total + $subtotal); //Add up to total price
	}
	
	$grand_total = $total + $shipping_cost; //grand total
        
	
	foreach($taxes as $key => $value){ //list and calculate all taxes in array
			$tax_amount 	= round($total * ($value / 100));
			$tax_item[$key] = $tax_amount;
			$grand_total 	= $grand_total + $tax_amount; 
	}
	
	foreach($tax_item as $key => $value){ //taxes List
		$list_tax .= $key. ' '. $currency. sprintf("%01.2f", $value).'<br />';
	}
	
	$shipping_cost = ($shipping_cost)?'Shipping Cost : '.$currency. sprintf("%01.2f", $shipping_cost).'<br />':'';
	
	//Print Shipping, VAT and Total
	$cart_box .= "<li class=\"view-cart-total\">$shipping_cost  $list_tax <hr>Payable Amount : $currency ".sprintf("%01.2f", $grand_total)."</li>";
	$cart_box .= "</ul>";
        
        echo $cart_box;
       mysqli_query($conn, "insert into delivery(tname,name,address,menu,quantity,extra,payment) VALUES('$tname','$name', '$address', '$menu','$product_qty','$product_size', '$grand_total')");
	
}else{
	echo "Your Cart is empty";
}
?>
</body>
</html>