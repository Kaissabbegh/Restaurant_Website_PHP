<?php
if(isset($_GET['confirm_order'])){
    $confirm_id=$_GET['confirm_order'];
    $update_product="UPDATE user_orders set order_status='confirmed' where order_id=$confirm_id";
    $result_update=mysqli_query($conn,$update_product);
    if($result_update){
        echo "<script> alert('order updated successfully')</script>";
        echo "<script>window.open('./index.php?view_orders','_self')</script>";
    }
    }
?>