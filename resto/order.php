<?php
include ('./includes/connect.php');
include('./functions/common_function.php');


if (isset($_GET['user_id'])){
    $user_id=$_GET['user_id'];
}


//gettubg total items and prices

$ip=getIPAddress();
$total_price=0;
$cart_query="SELECT * from cart_details where ip_add='$ip'";
$result_cart=mysqli_query($conn,$cart_query);
$invoice_number=mt_rand();
$status='pending';
$count_products=mysqli_num_rows($result_cart);
while($row_price=mysqli_fetch_array($result_cart)){
    $product_id=$row_price['product_id'];
    $select_product="SELECT * from products where product_id=$product_id";
    $run_price=mysqli_query($conn,$select_product);
    while($row_product_price=mysqli_fetch_array($run_price)){
        $product_price=array($row_product_price['product_price']);
        $product_values=array_sum($product_price);
        $total_price+=$product_values;
    }
}
//getting quantity from cart
$get_cart="SELECT * from cart_details";
$run_cart=mysqli_query($conn,$get_cart);
$get_item_quantity=mysqli_fetch_array($run_cart);
$quantity=$get_item_quantity['quantity'];
if($quantity==0){
    $quantity=1;
    $subtotal=$total_price;

}else{
    $Quantity=$quantity;
    $subtotal=$total_price*$Quantity;
}
$insert_orders="INSERT into user_orders (user_id,amount_due,invoice_number,total_products,order_date,order_status) values ($user_id,$subtotal,$invoice_number,$count_products,NOW(),'$status')";
$result_query=mysqli_query($conn,$insert_orders);
if($result_query){ 
    echo "<script>alert('Order have submitted successfully')</script>";
    echo "<script>window.open('user.php','_self')</script>";

}

$insert_orders_pending="INSERT into order_pending (user_id,invoice_number,product_id,order_status,quantity) values ($user_id,$invoice_number,$product_id,'$status',$quantity)";
$result_query=mysqli_query($conn,$insert_orders_pending);

//deleting cart items

$empty_cart="DELETE from cart_details where ip_add='$ip'";
$result_delete=mysqli_query($conn,$empty_cart);
?>