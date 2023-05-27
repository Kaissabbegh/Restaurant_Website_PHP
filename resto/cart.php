<?php
include('includes/connect.php');
include('./functions/common_function.php');
session_start();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Shop Homepage</title>
    <link rel="icon" type="image/x-icon" href="assets/tajine.png" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <link href="css/styless.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    
    <style>
    .cursor{
  position:fixed;
  width: 25px;
  height: 25px;
  border: 1px solid grey;
  border-radius: 50%;
  left: 0;
  top: 0;
  pointer-events: none;
  transform: translate(-50%,-50%);
  
}
.cursor2{
  position:fixed;
  width: 8px;
  height: 8px;
  background-color: grey;
  border-radius: 50%;
  left: 0;
  top: 0;
  pointer-events: none;
  transform: translate(-50%,-50%);
}
.content:hover ~ .cursor{
  transform:translate(-50%,-50%) scale(1.5) ;
  background-color: black;
  opacity: .5;
}
</style>
</head>

<body>

    <!-- Navigation-->
    <header class="p-3 mb-3 border-bottom">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <a href="./index.php" class="d-flex align-items-center mb-2 mb-lg-0 link-body-emphasis text-decoration-none">
                    <img src="assets/kosksi.jpg" alt="icon" srcset="" width="90">
                </a>

                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <li><a href="index.php" class="nav-link px-2 link-secondary">Overview</a></li>
                    <li><a href="./products.php" class="nav-link px-2 link-body-emphasis">Products</a></li>
                    <li><a href="contact.php" class="nav-link px-2 link-body-emphasis">Contact</a></li>
                </ul>

                <form role="search" action="search_product.php" method="get">
  <div style="display: flex;">
    <input class="form-control" type="search" name="search_data" placeholder="Search" aria-label="Search">
    <input type="submit" value="Search" class="btn btn-outline-dark" name="search_data_product">
  </div>
</form>
                <form class="d-flex mx-4">
                    <a class="btn btn-outline-dark" href="cart.php">
                        <i class="bi-cart-fill me-1"></i>
                        Cart
                        <span class="badge bg-dark text-white ms-1 rounded-pill"><?php cart_item(); ?></span>
                    </a>
                </form>
                <div class="dropdown text-end">
                    <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                            <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                        </svg>
                    </a>
                    <ul class="dropdown-menu text-small">
                    <?php
                if(!isset($_SESSION['username'])){
                    echo"<li><a class='dropdown-item' href='sign_in.php'>Sign In</a></li>";
                    
                }else{
                    echo " <a class='dropdown-item' href='user.php'>Profile</a></li>
                    
                    <li><hr class='dropdown-divider'></li>
                    <li><a class='dropdown-item' href='logout.php'>Logout</a></li>";;
                }
                ?>
                    </ul>
                </div>
            </div>
        </div>

    </header>
    <section class="h-100 gradient-background">
        <div class="container h-100 py-5">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <form action="" method="post">
                    <div class="col-10">

                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h3 class="fw-normal mb-0 text-white">Shopping Cart</h3>
                        </div>
                        <?php
                        global $conn;
                        $ip=getIPAddress();
                        $total_price = 0;
                        $cart_query = "SELECT * from cart_details where ip_add='$ip' ";
                        $result = mysqli_query($conn, $cart_query);
                        $result_count=mysqli_num_rows($result);
                        if($result_count>0){
                        while ($row = mysqli_fetch_array($result)) {
                            $product_id = $row['product_id'];
                            $select_products = "SELECT * from products where product_id='$product_id'";
                            $result_products = mysqli_query($conn, $select_products);
                            while ($row_product_price = mysqli_fetch_array($result_products)) {
                                $product_price = array($row_product_price['product_price']);
                                $price_table = $row_product_price['product_price'];
                                $product_title = $row_product_price['product_title'];
                                $product_image = $row_product_price['product_image'];
                                $product_value = array_sum($product_price);
                                $total_price += $product_value;
                            
                            
                        ?>
                                <div class="card rounded-3 mb-4">
                                    <div class="card-body p-4">
                                        <div class="row d-flex justify-content-between align-items-center">
                                            <div class="col-md-2 col-lg-2 col-xl-2">
                                                <img src="admin_area/product_images/<?php echo $product_image ?>" class="img-fluid rounded-3" alt="...">
                                            </div>
                                            <div class="col-md-3 col-lg-3 col-xl-3">

                                                <p class="lead fw-normal mb-2"><?php echo $product_title ?></p>
                                            </div>
                                            <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                                                

                                                <input name="id_item" value="<?php echo $product_id ?>" style="display :none;">
                                                <input id="form1" min="0" name="quantity" value="" type="number" class="form-control form-control-sm"  />


                                                
                                            </div>
                                            <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                                                <p class="lead fw-normal mb-2">Total Price:</p>
                                                <h5 class="mb-0"><?php echo $price_table ?> DT</h5>
                                                
                                            </div>
                                            <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                                                <button class="text-danger" name="removeitem" value="<?php echo $product_id?>"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z" />
                                                        <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z" />
                                                    </svg></button>
                                            </div>
                                        </div>
                                    </div> 
                                </div> <?php
                                    }
                                }}
                                else{
                                    echo "<div class='text-center'><img src='./assets/img/empty_cart.webp' ></div>";
                                }
                                
                                ?>

                        <div class="card mb-4">
                            <div class="card-body p-4 d-flex flex-row">
                            <a href="./products.php"> <button type="button" class="btn btn-outline-warning btn-lg ms-3">Continue Shopping</button></a>
                            </div>
                        </div>
                        

                        <div class="card">
                            <div class="card-body">
                            <a href="./checkout.php">  <button type="button" class="btn btn-warning btn-block btn-lg">Proceed to Pay</button></a>
                                <div class="float-end">
                                    <p class="mb-0 me-5 d-flex align-items-center">
                                        <span class="small text-muted me-2">Order total:</span> <span class="lead fw-normal"><?php echo $total_price ?> DT</span>
                                    </p>
                                </div>
                            </div>

                        </div>

                    </div>
                </form>
            </div>
        </div>
    </section>

    <?php 
        function remove_cart_item(){
            global $conn;
            if(isset($_POST['removeitem'])){
                $remove_id=$_POST['removeitem'];
                $delete_query= "DELETE from cart_details where product_id=$remove_id";
                $run_query=mysqli_query($conn,$delete_query);
                if($run_query){
                        echo "<script> window.open('cart.php','_self')</script>";
                    }
                }
            }
        
        echo $remove_item=@remove_cart_item();
    ?>
    <!-- Footer-->
    <footer class="py-5 gradient-background">

        <div class="col mb-3">
            <ul class="nav flex-column text-center">
                <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-white">Home</a></li>
                <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-white">Products</a></li>
                <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-white"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
                            <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z" />
                        </svg></a></li>
                <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-white"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-tiktok" viewBox="0 0 16 16">
                            <path d="M9 0h1.98c.144.715.54 1.617 1.235 2.512C12.895 3.389 13.797 4 15 4v2c-1.753 0-3.07-.814-4-1.829V11a5 5 0 1 1-5-5v2a3 3 0 1 0 3 3V0Z" />
                        </svg></a></li>
                <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-white"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                            <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z" />
                        </svg></a></li>
                <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-white">About</a></li>
            </ul>
        </div>
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; Your Website 2023</p>
        </div>
    </footer>
    <div class="cursor"></div>
    <div class="cursor2"></div>
    <script src=js/indexx.js></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>