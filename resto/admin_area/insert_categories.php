
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
<h2 class="text-center pb-3">Insert Categories</h2>
<form action="" method="post" class="mb-2">
    <div class="input-group mb-2 w-90">
        <span class="input-group-text bg-dark" id="basic-addon1">
            <i class="fa-solid fa-receipt"></i>
        </span>
        <input type="text" class="form-control" name="cat_title" 
        placeholder="Insert categories" aria-label="Categories"
         aria-describedby="basic-addon1">

    </div>
    <div class="input-group mb-2 w-10">
       <input type="submit" class="bg-dark border-0 p-2 m-3 text-white" name="insert_cat" value="Insert Categories">

    </div>
</form>