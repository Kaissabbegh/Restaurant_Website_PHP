<h3 class="text-success">All Orders</h3>
<table class="table table-bordered my-5 text-center">
  <tr class="bg-dark text-white">
    <th>Sl number</th>
    <th>Due amount</th>
    <th>invoice number</th>
    <th>Total products</th>
    <th>Order Date</th>
    <th>Status</th>
    <th>Delete</th>
    
  </tr>
  <?php
  $select_queryy="SELECT * FROM user_orders";
  $result_queryy=mysqli_query($conn,$select_queryy);
  $row_count=mysqli_num_rows($result_queryy);
  
  
  if($row_count==0){
    echo"<h2 class='bg-danger text-center mt-5'>No orders yet</h2>";
  }else{
    $num=0;
    while($row=mysqli_fetch_assoc($result_queryy)){
          $order_status=$row['order_status'];
          $user_id=$row['user_id'];
          $amount_due=$row['amount_due'];
          $invoice_number=$row['invoice_number'];
          $total_products=$row['total_products'];
          $order_date=$row['order_date'];
          $order_id=$row['order_id'];
          $num++;
          echo" 
          <tr>
      <th>$num</th>
      <th>$amount_due</th>
      <th>$invoice_number</th>
      <th>$total_products</th>
      <th>$order_date</th>
      <th><a href='index.php?confirm_order=$order_id'>$order_status</a></th>
      <th><a href='index.php?delete_order=$order_id' class='text-dark' ><i class='bi bi-trash'></i></a></th>
      
    </tr>
          ";}
  }
  ?>
</table>