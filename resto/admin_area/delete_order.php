<?php
if(isset($_GET['delete_order'])){
    $remove_id=$_GET['delete_order'];
    $delete_query= "DELETE from user_orders where order_id=$remove_id";
    $run_query=mysqli_query($conn,$delete_query);
    if($run_query){
            echo "<script> alert('order deleted with success!')</script>";
            echo "<script> window.open('./index.php?view_orders','_self')</script>";
        }
    }
?>