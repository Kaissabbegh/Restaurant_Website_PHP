<?php
if(isset ($_GET['edit_products'])){
    $edit_id=$_GET['edit_products'];
     // echo $edit_id;
     $get_data="SELECT * from products where product_id=$edit_id";
     $result=mysqli_query($conn, $get_data);
     $row=mysqli_fetch_assoc($result);
     $product_title=$row['product_title'];
     $product_description=$row['product_description'];
     $category_id=$row['category_id'];
     $product_image=$row['product_image'];
     $product_price=$row['product_price'];
     $select_category="SELECT * FROM categories where category_id=$category_id";
    $category_result=mysqli_query($conn,$select_category);
    $row_cat=mysqli_fetch_assoc($category_result);
    $cat_title=$row_cat['category_title'];

}

?>


<div class="container mt-5">
    <h1 class="text-center">Edit products</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <!--title-->
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="product_title" class="form-label">Product Title</label>
            <input type="text" name="product_title" id="product_title" class="form-control" placeholder="Enter product title" autocomplete="of" required="required" value="<?php echo $product_title?>">

        </div>
        <!-- description -->
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="product_description" class="form-label">Product Description</label>
            <input type="text" name="product_description" id="product_description" class="form-control" placeholder="Enter product description" required="required" value="<?php echo $product_description?>">

        </div>
        <!-- categories -->
        <div class="form-outline mb-4 w-50 m-auto">
            <select name="product_category" id="" class="form-select">
            <option value="<?php echo $cat_title?>"><?php echo $cat_title?></option>
            <?php
                $select_category="SELECT * FROM categories where category_title != '$cat_title'";
                $result_category=mysqli_query($conn,$select_category);
                while($row_data=mysqli_fetch_assoc($result_category)){
                    $category_title=$row_data['category_title'];
                    $category_id=$row_data['category_id'];
                    echo "
                    <option value='$category_id'>$category_title</option>
                    ";
                }
            
            ?>
            </select>
        </div>

        <!--image-->
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="product_image1" class="from-label">Product image</label>
            <div class="d-flex">
            <input type="file" name="product_image" id="product_image" class="form-control w-90 m-auto" required="required" value="<?php echo $product_image?>">
            <img src="./product_images/<?php echo $product_image?>" alt="" class="product_img" style="width: 150px;">
            </div>
        </div>   
        
        <!--price-->
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="product_price" class="form-label">Product Price</label>
            <input type="text" name="product_price" id="product_price" class="form-control" placeholder="Enter product price" value="<?php echo $product_price?>">

        </div>
        <div class="form-outline mb-4 w-50 m-auto">
            <input type="submit" name="edit_product" class="btn bg-dark border-0 text-white" value="Update Product">
        </div>
    </form>
</div>

<?php
if(isset($_POST['edit_product'])){
    $product_title=$_POST['product_title'];
    $product_description=$_POST['product_description'];
    $product_category=$_POST['product_category'];
    $product_price=$_POST['product_price'];
    $product_image=$_FILES['product_image']['name'];
    $temp_img=$_FILES['product_image']['tmp_name'];
    move_uploaded_file($temp_img,"./product_images/$product_image");
    $update_product="UPDATE products set product_title= '$product_title',product_description= '$product_description' ,product_image= '$product_image' ,product_price= '$product_price' where product_id=$edit_id";
    $result_update=mysqli_query($conn,$update_product);
    if($result_update){
        echo "<script> alert('Product updated successfully')</script>";
        echo "<script>window.open('./index.php?view_products','_self')</script>";
    }
    
}

?>