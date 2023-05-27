<?php
if(isset($_GET['delete_products'])){
    $remove_id=$_GET['delete_products'];
    $delete_query= "DELETE from products where product_id=$remove_id";
    $run_query=mysqli_query($conn,$delete_query);
    if($run_query){
            echo "<script> alert('product deleted with success!')</script>";
            echo "<script> window.open('./index.php?view_products','_self')</script>";
        }
    }
?>