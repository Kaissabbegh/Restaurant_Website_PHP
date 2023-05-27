<?php
if(isset ($_GET['edit_category'])){

    
     $edit_id=$_GET['edit_category'];
     // echo $edit_id;
     $get_data="SELECT * from categories where category_id=$edit_id";
     $result=mysqli_query($conn, $get_data);
     $row=mysqli_fetch_assoc($result);
     $cat_title=$row['category_title'];
}

?>







<?php
    include('../includes/connect.php');
    if(isset($_POST['insert_cat'])){
        $cat_title=$_POST['cat_title'];
        $select_query="SELECT * FROM categories WHERE category_title='$cat_title'";
        $result_select=mysqli_query($conn,$select_query);
        $number=mysqli_num_rows($result_select);
        if($number>0){
            echo "<script>alert('$cat_title already exists in categories')</script>";
        }else{
        $insert_query="INSERT INTO categories (category_title) values('$cat_title')";
        $result=mysqli_query($conn,$insert_query);
        if($result){
            echo "<script>alert('You have successfully added: $cat_title to categories')</script>";
        }
    }}
?>
<h2 class="text-center pb-3">Edit Category</h2>
<form action="" method="post" class="mb-2">
    <div class="input-group mb-2 w-90">
        <span class="input-group-text bg-dark" id="basic-addon1">
            <i class="fa-solid fa-receipt"></i>
        </span>
        <input type="text" class="form-control" name="cat_title" 
        placeholder="Insert categories" aria-label="Categories"
         aria-describedby="basic-addon1" value="<?php echo $cat_title?>">

    </div>
    <div class="input-group mb-2 w-10">
       <input type="submit" class="bg-dark border-0 p-2 m-3 text-white" name="update_cat" value="Update Categories">

    </div>
</form>







<?php
if(isset($_POST['update_cat'])){
    $product_title=$_POST['cat_title'];
    $update_product="UPDATE categories set category_title='$product_title' where category_id=$edit_id";
    $result_update=mysqli_query($conn,$update_product);
    if($result_update){
        echo "<script> alert('category updated successfully')</script>";
        echo "<script>window.open('./index.php?view_categories','_self')</script>";
    }
}

?>