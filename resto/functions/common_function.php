<?php
//including connect file
@include('./includes/connect.php');
//getting products 
function getproducts(){
    global $conn;
    if(!isset($_GET['category'])){
    $select_query="SELECT * FROM products";
        $result_query=mysqli_query($conn,$select_query);
                while($row=mysqli_fetch_assoc($result_query)){
                    $product_id=$row['product_id'];
                    $product_title=$row['product_title'];
                    $product_description=$row['product_description'];
                    $product_price=$row['product_price'];
                    $product_image=$row['product_image'];
                    $category_id=$row['category_id'];
                    echo"
                    <div class='col mb-5'>
                    <div class='card h-100'>
                        <!-- Product image-->
                        <img class='card-img-top' src='./admin_area/product_images/$product_image' alt='$product_title' width=200 height=250>
                        <!-- Product details-->
                        <div class='card-body p-4'>
                            <div class='text-center'>
                                <!-- Product name-->
                                <h5 class='fw-bolder'>$product_title</h5>
                                <!-- Product price-->
                                <h6 class='fw-bolder'>$product_price dt</h6>
                            </div>
                        </div>
                        <!-- Product actions-->
                        <div class='card-footer p-4 pt-0 border-top-0 bg-transparent'>
                            <div class='text-center'><a class='btn btn-warning mt-auto' href='product.php?product_id=$product_id'>view more</a></div><br>
                            <div class='text-center'><a class='btn btn-outline-dark mt-auto' href='index.php?add_to_cart=$product_id'>Add to cart</a></div>
                        </div>
                    </div>
                </div>
                    ";
                    
                }
}}

function showcategories(){
    global $conn;
    $select_category="SELECT * FROM categories";
                $result_category=mysqli_query($conn,$select_category);
                while($row_data=mysqli_fetch_assoc($result_category)){
                    $category_title=$row_data['category_title'];
                    $category_id=$row_data['category_id'];
                    echo "<li class='nav-item px-4' >
                    <a class='nav-link active' aria-current='page' href='products.php?category=$category_id'>$category_title
                    </a>
                    </li>";
                }
}
function get_specific_product(){
    global $conn;
    if(isset($_GET['category'])){
    $category_id=$_GET['category'];
    $select_query="SELECT * FROM products where category_id=$category_id";
        $result_query=mysqli_query($conn,$select_query);
        while($row=mysqli_fetch_assoc($result_query)){
            $product_id=$row['product_id'];
            $product_title=$row['product_title'];
            $product_description=$row['product_description'];
            $product_price=$row['product_price'];
            $product_image=$row['product_image'];
            $category_id=$row['category_id'];
            echo"
            <div class='col mb-5'>
            <div class='card h-100'>
                <!-- Product image-->
                <img class='card-img-top' src='./admin_area/product_images/$product_image' alt='$product_title' width=200 height=300/>
                <!-- Product details-->
                <div class='card-body p-4'>
                    <div class='text-center'>
                        <!-- Product name-->
                        <h5 class='fw-bolder'>$product_title</h5>
                        <!-- Product price-->
                        <h6 class='fw-bolder'>$product_price dt</h6>
                    </div>
                </div>
                <!-- Product actions-->
                <div class='card-footer p-4 pt-0 border-top-0 bg-transparent'>
                    <div class='text-center'><a class='btn btn-warning mt-auto' href='product.php?product_id=$product_id'>view more</a></div><br>
                    <div class='text-center'><a class='btn btn-outline-dark mt-auto' href='index.php?add_to_cart=$product_id'>Add to cart</a></div>                </div>
            </div>
        </div>
            ";
                    
                }}}



function searchproduct(){
    global $conn;
    if (isset($_GET['search_data_product'])){
        $search_data_value=$_GET['search_data'];
        $search_query="SELECT * from products where product_title like '%$search_data_value%'";
        $result_query=mysqli_query($conn,$search_query);
        $num_of_rows=mysqli_num_rows($result_query);
        if($num_of_rows==0){
            echo "<h2 class='text-center text-danger'> No results match. NO product found on this category!</h2>";
        }
                while($row=mysqli_fetch_assoc($result_query)){
                    $product_id=$row['product_id'];
                    $product_title=$row['product_title'];
                    $product_description=$row['product_description'];
                    $product_price=$row['product_price'];
                    $product_image=$row['product_image'];
                    $category_id=$row['category_id'];
                    echo"
                    <div class='col mb-5'>
                    <div class='card h-100'>
                        <!-- Product image-->
                        <img class='card-img-top' src='./admin_area/product_images/$product_image' alt='$product_title' width=200 height=300/>
                        <!-- Product details-->
                        <div class='card-body p-4'>
                            <div class='text-center'>
                                <!-- Product name-->
                                <h5 class='fw-bolder'>$product_title</h5>
                                <!-- Product price-->
                                <h6 class='fw-bolder'>$product_price dt</h6>
                            </div>
                        </div>
                        <!-- Product actions-->
                        <div class='card-footer p-4 pt-0 border-top-0 bg-transparent'>
                            <div class='text-center'><a class='btn btn-warning mt-auto' href='product.php?product_id=$product_id'>view more</a></div><br>
                            <div class='text-center'><a class='btn btn-outline-dark mt-auto' href='index.php?add_to_cart=$product_id'>Add to cart</a></div>
                        </div>
                    </div>
                </div>
                    ";
                    
                }
}}

function view_details(){
    global $conn;
    if(isset($_GET['product_id'])){
    if(!isset($_GET['category'])){
    $product_id=$_GET['product_id'];
    $select_query="SELECT * FROM products where product_id='$product_id'";
    $result_query=mysqli_query($conn,$select_query);
                while($row=mysqli_fetch_assoc($result_query)){
                    $category_id=$row['category_id'];
                    
                    $select_query_cat="SELECT * FROM products where category_id='$category_id'";
                    $result_query_cat=mysqli_query($conn,$select_query_cat);
                    while($row=mysqli_fetch_assoc($result_query_cat)){
                    $product_id=$row['product_id'];
                    $product_title=$row['product_title'];
                    $product_description=$row['product_description'];
                    $product_price=$row['product_price'];
                    $product_image=$row['product_image'];
        
                    echo"
                    <div class='col mb-5'>
                    <div class='card h-100'>
                        <!-- Product image-->
                        <img class='card-img-top' src='./admin_area/product_images/$product_image' alt='$product_title' width=200 height=300/>
                        <!-- Product details-->
                        <div class='card-body p-4'>
                            <div class='text-center'>
                                <!-- Product name-->
                                <h5 class='fw-bolder'>$product_title</h5>
                                <!-- Product price-->
                                <h6 class='fw-bolder'>$product_price dt</h6>
                            </div>
                        </div>
                        <!-- Product actions-->
                        <div class='card-footer p-4 pt-0 border-top-0 bg-transparent'>
                            <div class='text-center'><a class='btn btn-warning mt-auto' href='product.php?product_id=$product_id'>view more</a></div><br>
                            <div class='text-center'><a class='btn btn-outline-dark mt-auto' href='index.php?add_to_cart=$product_id'>Add to cart</a></div>
                        </div>
                    </div>
                </div>
                    ";
                    
                }
}}}}
function show_item(){
    global $conn;
    if(isset($_GET['product_id'])){
    if(!isset($_GET['category'])){
    $product_id=$_GET['product_id'];
    $select_query="SELECT * FROM products where product_id='$product_id'";
        $result_query=mysqli_query($conn,$select_query);
                while($row=mysqli_fetch_assoc($result_query)){
                    $product_id=$row['product_id'];
                    $product_title=$row['product_title'];
                    $product_description=$row['product_description'];
                    $product_price=$row['product_price'];
                    $product_image=$row['product_image'];
                    $category_id=$row['category_id'];
                    echo"
                    <div class='row gx-4 gx-lg-5 align-items-center text-white'>
                    <div class='col-md-6'><img class='card-img-top mb-5 mb-md-0'
                    src='./admin_area/product_images/$product_image' alt='$product_title' width=300 height=400/></div>
                    <div class='col-md-6'>
                        <div class='small mb-1 text-white'>REF: #$product_id</div>
                        <h1 class='display-5 fw-bolder text-white'>$product_title</h1>
                        <div class='fs-5 mb-5 text-white'>
                            <span>$product_price DT</span>
                        </div>
                        <p class='lead'>$product_description</p>
                        <div class='d-flex'>
                            <input class='form-control text-center me-3' id='inputQuantity' type='num' value='1'
                                style='max-width: 3rem'>
                            <a href='index.php?add_to_cart=$product_id'><button class='btn btn-light flex-shrink-0' type='button' >
                                <i class='bi-cart-fill me-1'></i>
                                Add to cart
                            </button></a>
                        </div>
                    </div>
                </div>
                    ";
                    
                }
}}
}
function cart(){
    global $conn;
    if(isset($_GET['add_to_cart'])){
    $ip=getIPAddress();
       $get_product_id=$_GET['add_to_cart'];
       $select_query="SELECT * from cart_details where ip_add='$ip' and product_id='$get_product_id'";
       $result_query=mysqli_query($conn,$select_query);
       $num_of_rows=mysqli_num_rows($result_query);
       if ($num_of_rows>0){
        echo "<script> alert('This item is already present inside cart')</script>";
        echo "<script>window.open('index.php','_self')</script>";
       }else{
        $insert_query="insert into cart_details values ($get_product_id,0,'$ip')";
        $result_query=mysqli_query($conn,$insert_query);
        echo "<script>window.open('index.php','_self')</script>";
       }
    }

}
function cart_item(){
    global $conn;
    $ip=getIPAddress();
    if(isset($_GET['add_to_cart'])){
       $select_query="SELECT * from cart_details where ip_add='$ip' ";
       $result_query=mysqli_query($conn,$select_query);
       $count_cart_items=mysqli_num_rows($result_query);
       }else{
    $select_query="SELECT * from cart_details where ip_add='$ip'";
       $result_query=mysqli_query($conn,$select_query);
       $count_cart_items=mysqli_num_rows($result_query);
       }
       echo $count_cart_items;
    }
function total_cart_price(){
    global $conn;
    $ip=getIPAddress();
    $total_price=0;
    $cart_query="SELECT * from cart_details where ip_add=$ip";
    $result=mysqli_query($conn,$cart_query);
    while($row=mysqli_fetch_array($result)){
        $product_id=$row['product_id'];
        $select_products="SELECT * from products where product_id='$product_id'";
        $result_products=mysqli_query($conn,$select_products);
        while($row_product_price=mysqli_fetch_array($result_products)){
            $product_price=array($row_product_price['price']);
            $product_value=array_sum($product_price);
            $total_price+=$product_value;
        }
}echo $total_price;
}



//get ip address function 
function getIPAddress() {  
    //whether ip is from the share internet  
     if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
                $ip = $_SERVER['HTTP_CLIENT_IP'];  
        }  
    //whether ip is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
     }  
//whether ip is from the remote address  
    else{  
             $ip = $_SERVER['REMOTE_ADDR'];  
     }  
     return $ip;  
}

function get_total_order_details(){
    global $conn;
    $username=$_SESSION['username'];
    $get_details="SELECT * from user_table where username='$username'";
    $result=mysqli_query($conn,$get_details);
    while($row_query=mysqli_fetch_array($result)){
        $user_id=$row_query['user_id'];
            
                    $get_orders="SELECT * from user_orders where user_id=$user_id and order_status='pending'";
                    $result_orders=mysqli_query($conn,$get_orders);
                    $row_count=mysqli_num_rows($result_orders);
                    if($row_count>0){
                        echo"<h3 class='text-center text-success mt-5 mb-2'>You have <span class='text-danger'>$row_count</span> pending orders</h3>
                        <p class='text-center'> <a href='user.php?my_orders' class='text-dark'>Order Details</a></p>";
                    }else{
                        echo"<h3 class='text-center text-success mt-5 mb-2'>You have <span class='text-danger'>0</span> pending orders</h3>
                        <p class='text-center'> <a href='./index.php' class='text-dark'>Explore Products</a></p>";
                    }
                }
            }
        
    

?>