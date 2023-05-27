<?php
include('../includes/connect.php');
include('../functions/common_function.php');

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>Admin Homepage</title>
  <link rel="icon" type="image/x-icon" href="product_images/tajin.png" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
  <link href="../css/styless.css" rel="stylesheet" />
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
<div class="cursor"></div>
    <div class="cursor2"></div>

  <!--navbar-->
  <nav class="navbar navbar-expand-md navbar-dark gradient-background" aria-label="Fourth navbar example">
    <div class="container-fluid">
      <a href="../index.php"><img src="product_images/kosksi.jpg" alt="icon" srcset="" width="90"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="container text-light">
    <span id="hours">00</span>
    <span>:</span>
    <span id="minutes">00</span>
    <span>:</span>
    <span id="seconds">00</span>
    <span id="sessionT">AM</span>
</div>
<script>
  function formatTime(time) {
    return time.toString().padStart(2, '0');
  }
  
  function SetTime() {
    var dateTime = new Date();
    var hrs = dateTime.getHours();
    var min = dateTime.getMinutes();
    var sec = dateTime.getSeconds();
    var sessionT = document.getElementById('sessionT');
  
    if (hrs >= 12) {
      sessionT.innerHTML = 'PM';
    } else {
      sessionT.innerHTML = 'AM';
    }
  
    if (hrs > 12) {
      hrs = hrs - 12;
    }
  
    document.getElementById('hours').innerHTML = formatTime(hrs);
    document.getElementById('minutes').innerHTML = formatTime(min);
    document.getElementById('seconds').innerHTML = formatTime(sec);
  }
  
  setInterval(SetTime, 10);
</script>
      <form role="search">
        <h1 class="text-light px-4">Welcome Admin</h1>
      </form>
    </div>
    </div>
  </nav>




  <div class="bg-ligh">
    <h3 class="text-center p-2">Manage Details</h3>
  </div>

  <!-- <div class="navbar-collapse collapse" id="navbarsExampleXxl">
    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      <li class="nav-item">
        <a class="nav-link active" aria-current="page">Admin</a>
      </li>
      <li class="nav-item">
        <button class="my-3"><a href="index.php?insert_product" class="nav-link text-dark  my-1">Insert Product</a></button>
      </li>
      <li class="nav-item">
        <button><a href="index.php?view_products" class="nav-link text-dark  my-1">View Product</a></button>
      </li>
      <li class="nav-item">
        <button><a href="index.php?insert_categories" class="nav-link text-dark  my-1">Insert Categories</a></button>
      </li>
      <li class="nav-item">
        <button><a href="index.php?view_categories" class="nav-link text-dark  my-1">View Categories</a></button>
      </li>
      <li class="nav-item">
        <button><a href="index.php?view_orders" class="nav-link text-dark  my-1">All Orders</a></button>
      </li>
    </ul>
  </div> -->

  <div class="row gradient-background text-center">
    <div>
      <a><img src="../assets/person-circle.svg" width="100" class="py-3"></a>
      <p class="text-light text-center px-5">Admin</p>
      <div class="button text-center px-5">
        <button class="my-3"><a href="index.php?insert_product" class="nav-link text-dark  my-1">Insert Product</a></button>
        <button><a href="index.php?view_products" class="nav-link text-dark  my-1">View Product</a></button>
        <button><a href="index.php?insert_categories" class="nav-link text-dark  my-1">Insert Categories</a></button>
        <button><a href="index.php?view_categories" class="nav-link text-dark  my-1">View Categories</a></button>
        <button><a href="index.php?view_orders" class="nav-link text-dark  my-1">All Orders</a></button>
        <button><a href="../logout.php" class="nav-link text-dark  my-1">Log out</a></button>
      </div>
    </div>
  </div>



  <div class="container my-3">
    <?php
    if (isset($_GET['insert_categories'])) {
      include('insert_categories.php');
    }
    if (isset($_GET['insert_brands'])) {
      include('insert_brands.php');
    }
    if (isset($_GET['insert_product'])) {
      include('insert_product.php');
    }
    if (isset($_GET['view_products'])) {
      include('view_products.php');
    }
    if (isset($_GET['edit_products'])) {
      include('edit_products.php');
    }
    if (isset($_GET['delete_products'])) {
      include('delete_products.php');
    }
    if (isset($_GET['edit_category'])) {
      include('edit_category.php');
    }
    if (isset($_GET['view_categories'])) {
      include('view_categories.php');
    }
    if (isset($_GET['delete_category'])) {
      include('delete_category.php');
    }
    if (isset($_GET['view_orders'])) {
      include('view_orders.php');
    }
    if (isset($_GET['delete_order'])) {
      include('delete_order.php');
    }
    if (isset($_GET['confirm_order'])) {
      include('confirm_order.php');
    }
    ?>
  </div>
  <footer class="py-5 gradient-background m-auto">
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
  <script src=../js/indexx.js></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

</body>

</html>