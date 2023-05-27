
<?php
if(isset($_POST['insert_product'])){
    $product_title=$_POST['product_title'];
    $product_description=$_POST['product_description'];
    $product_category=$_POST['product_category'];
    $product_price=$_POST['product_price'];

    //accessing images  
    $product_image=$_FILES['product_image']['name'];

    //accessing image tmp name
    $tmp_image=$_FILES['product_image']['tmp_name'];
    //checking empty condition
    if($product_price=='' or $product_title=='' or $product_description=='' or $product_category=='' or $product_image=='' ){
        echo "<script>alert('Please fill all the available fields')</script>";
        exit();
    }else{
        move_uploaded_file($tmp_image,"./product_images/$product_image");
        //insert query
        $insert_product="INSERT INTO products (product_title,product_description,category_id,product_image,product_price) 
        VALUES 
        ('$product_title','$product_description','$product_category','$product_image','$product_price') ";
        $result=mysqli_query($conn,$insert_product);
        if($result){
            echo "<script>alert('You have successfully added: $product_title to products: $product_title,$product_description,$product_category,$product_image,$product_price ')</script>";
        }    
}}
?>

<div class="container">
    <h2 class="text-center pb-3"> Insert Product </h2>
    <form action="" method="post" enctype="multipart/form-data">
        <!--title-->
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="product_title" class="form-label">Product Title</label>
            <input type="text" name="product_title" id="product_title" class="form-control" placeholder="Enter product title" autocomplete="of" required="required">

        </div>
        <!-- description -->
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="product_description" class="form-label">Product description</label>
            <input type="text" name="product_description" id="product_description" class="form-control" placeholder="Enter product description" autocomplete="of" required="required">

        </div>
        <!-- categories -->
        <div class="form-outline mb-4 w-50 m-auto">
            <select name="product_category" id="" class="form-select">
            <option value=''>Select Category</option>
            <?php
                $select_category="SELECT * FROM categories";
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
            <input type="file" name="product_image" id="product_image" class="form-control" required="required">
        </div>   
        
        <!--price-->
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="product_price" class="form-label">Product Price</label>
            <input type="text" name="product_price" id="product_price" class="form-control" placeholder="Enter product price">

        </div>

        <div class="form-outline mb-4 w-50 m-auto">
            <input type="submit" name="insert_product" class="btn bg-dark border-0 text-white" value="Insert Product">

        </div>
    </form>
</div>