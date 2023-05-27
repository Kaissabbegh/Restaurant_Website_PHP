<h3 class="text-success">All Products</h3>
<table class="table table-bordered my-5 text-center">
  <tr class="bg-dark text-white">
    <th>Product ID</th>
    <th>Product Title</th>
    <th>Product Image</th>
    <th>Product Price</th>
    <th>Category</th>
    <th>Description</th>
    <th>Edit</th>
    <th>Delete</th>
    
  </tr>
  <?php
  $select_queryy="SELECT * FROM products";
  $result_queryy=mysqli_query($conn,$select_queryy);
  $num=0;
  while($row=mysqli_fetch_assoc($result_queryy)){
        $product_id=$row['product_id'];
        $product_title=$row['product_title'];
        $product_description=$row['product_description'];
        $product_image=$row['product_image'];
        $product_price=$row['product_price'];
        $category_id=$row['category_id'];
        $num++;
        $select_category="SELECT * FROM categories where category_id=$category_id";
        $category_result=mysqli_query($conn,$select_category);
        while($row_cat=mysqli_fetch_assoc($category_result)){
            $cat_title=$row_cat['category_title'];
        echo" 
        <tr>
    <th>$num</th>
    <th>$product_title</th>
    <th><img src='product_images/$product_image' class='img-fluid rounded-3' width='100' alt='...'></th>
    <th>$product_price</th>
    <th>$cat_title</th>
    <th>$product_description</th>
    <th><a href='index.php?edit_products=$product_id' class='text-dark' ><i class='bi bi-pencil-square'></i></a></th>
    <th><a href='index.php?delete_products=$product_id' class='text-dark' ><i class='bi bi-trash'></i></a></th>
    
  </tr>
        ";
  }}
  ?>
</table>