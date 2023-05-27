<?php
$username=$_SESSION['username'];
$get_user="SELECT * from user_table where username='$username'";
$result=mysqli_query($conn,$get_user);
$row_fetch=mysqli_fetch_assoc($result);
$user_id=$row_fetch['user_id'];
?>

<div class="container">
<h3 class="text-success">All my Orders</h3>
<table class="table table-bordered my-5 bg-grey text-center">
  <tr>
    <th>SI no</th>
    <th>Order number</th>
    <th>Amount due</th>
    <th>Total products</th>
    <th>Invoice number</th>
    <th>Date</th>
    <th>Status</th>
    
  </tr>
  <?php
    $get_order_details="SELECT * from user_orders where user_id=$user_id";
    $result_order=mysqli_query($conn,$get_order_details);
    while($row_data=mysqli_fetch_assoc($result_order)){
        $order_id=$row_data['order_id'];
        $amount_due=$row_data['amount_due'];
        $total_products=$row_data['total_products'];
        $invoice_number=$row_data['invoice_number'];
        $order_status=$row_data['order_status'];
        if($order_status=='pending'){
            $order_status='Incomplete';

        }else {
            $order_status='Complete';
        }
        $order_date=$row_data['order_date'];
        $num=1;
        echo "
        <tr>
    <td>$num</td>
    <td>$order_id</td>
    <td>$amount_due</td>
    <td>$total_products</td>
    <td>$invoice_number</td>
    <td>$order_date</td>
    <td>$order_status</td>
    </tr>
        ";
        $num++;
    }
?>
</table>
</div>