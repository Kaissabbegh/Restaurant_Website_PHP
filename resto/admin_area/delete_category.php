<?php
if(isset($_GET['delete_category'])){
    $remove_id=$_GET['delete_category'];
    $delete_query= "DELETE from categories where category_id=$remove_id";
    $run_query=mysqli_query($conn,$delete_query);
    if($run_query){
            echo "<script> alert('category deleted with success!')</script>";
            echo "<script> window.open('./index.php?view_categories','_self')</script>";
        }
    }
?>