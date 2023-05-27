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
    <link href="css/styless.css" rel="stylesheet" >
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
                        if (!isset($_SESSION['username'])) {
                            echo "<li><a class='dropdown-item' href='sign_in.php'>Sign In</a></li>";
                        } else {
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
    <!-- Header-->
    <header class="py-5 gradient-background">
        <div class="container px-4 px-lg-5 my-5">
            <div class="text-center text-white">
                <h1 class="display-4 fw-bolder">Tunisian Food</h1>
                <p class="lead fw-normal text-white-50 mb-0">Best food in the neighborhood </p>
            </div>
        </div>
    </header>
    <?php
    cart();
    ?>
    <!--test-->
    <div class="container mt-5">
        <div class="row g-4 py-5 row-cols-1 row-cols-lg-3">
            <div class="col d-flex align-items-start">
                <div class="icon-square text-body-emphasis bg-body-secondary d-inline-flex align-items-center justify-content-center fs-4 flex-shrink-0 me-3">
                    <img src="./assets/chili-pepper.png" alt="" width="35">

                </div>
                <div>
                    <h3 class="fs-2">Spicy Specialites</h3>
                    <p>You can find a lot of spicy food, for Low Prices 💸 </p>

                </div>
            </div>
            <div class="col d-flex align-items-start">
                <div class="icon-square text-body-emphasis bg-body-secondary d-inline-flex align-items-center justify-content-center fs-4 flex-shrink-0 me-3">
                    <svg xmlns="http://www.w3.org/2000/svg" height="30" fill="currentColor" class="bi bi-truck" viewBox="0 0 16 16">
                        <path d="M0 3.5A1.5 1.5 0 0 1 1.5 2h9A1.5 1.5 0 0 1 12 3.5V5h1.02a1.5 1.5 0 0 1 1.17.563l1.481 1.85a1.5 1.5 0 0 1 .329.938V10.5a1.5 1.5 0 0 1-1.5 1.5H14a2 2 0 1 1-4 0H5a2 2 0 1 1-3.998-.085A1.5 1.5 0 0 1 0 10.5v-7zm1.294 7.456A1.999 1.999 0 0 1 4.732 11h5.536a2.01 2.01 0 0 1 .732-.732V3.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5v7a.5.5 0 0 0 .294.456zM12 10a2 2 0 0 1 1.732 1h.768a.5.5 0 0 0 .5-.5V8.35a.5.5 0 0 0-.11-.312l-1.48-1.85A.5.5 0 0 0 13.02 6H12v4zm-9 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm9 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
                    </svg>
                </div>
                <div>
                    <h3 class="fs-2">Fast Delivery.</h3>
                    <p>Get what pleases you, In a short time 😍.</p>

                </div>
            </div>
            <div class="col d-flex align-items-start">
                <div class="icon-square text-body-emphasis bg-body-secondary d-inline-flex align-items-center justify-content-center fs-4 flex-shrink-0 me-3">
                    <svg xmlns="http://www.w3.org/2000/svg" height="30" fill="currentColor" class="bi bi-arrow-through-heart" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M2.854 15.854A.5.5 0 0 1 2 15.5V14H.5a.5.5 0 0 1-.354-.854l1.5-1.5A.5.5 0 0 1 2 11.5h1.793l.53-.53c-.771-.802-1.328-1.58-1.704-2.32-.798-1.575-.775-2.996-.213-4.092C3.426 2.565 6.18 1.809 8 3.233c1.25-.98 2.944-.928 4.212-.152L13.292 2 12.147.854A.5.5 0 0 1 12.5 0h3a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-.854.354L14 2.707l-1.006 1.006c.236.248.44.531.6.845.562 1.096.585 2.517-.213 4.092-.793 1.563-2.395 3.288-5.105 5.08L8 13.912l-.276-.182a21.86 21.86 0 0 1-2.685-2.062l-.539.54V14a.5.5 0 0 1-.146.354l-1.5 1.5Zm2.893-4.894A20.419 20.419 0 0 0 8 12.71c2.456-1.666 3.827-3.207 4.489-4.512.679-1.34.607-2.42.215-3.185-.817-1.595-3.087-2.054-4.346-.761L8 4.62l-.358-.368c-1.259-1.293-3.53-.834-4.346.761-.392.766-.464 1.845.215 3.185.323.636.815 1.33 1.519 2.065l1.866-1.867a.5.5 0 1 1 .708.708L5.747 10.96Z">
                        </path>
                    </svg>
                </div>
                <div>
                    <h3 class="fs-2">Support Our Work.</h3>
                    <p>leave likes and comments 💕.</p>

                </div>
            </div>
        </div>
    </div>
    <!--Carousel-->
    <div class="container px-4 px-lg-5 mt-5" style="max-width: 1000px;">
        <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner bg-dark">
                <div class="carousel-item active">
                    <img src="./assets/img/product_01.1.jpg" class="d-block w-100 product_img" alt="..." width="800" height="500">
                </div>
                <div class="carousel-item">
                    <img src="./assets/img/product_04.jpg" class="d-block w-100 product_img" alt="..." width="800" height="500">
                </div>
                <div class="carousel-item">
                    <a href=""></a> <img src="./assets/img/product_2.1.jpg" class="d-block w-100 product_img" alt="..." width="800" height="500">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <!-- Section-->

    <section class="py-5">

        <div class="container px-4 px-lg-5 mt-5">






            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                <?php

                getproducts();
                ?>

            </div>
        </div>
        </div>
    </section>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src=js/indexx.js></script>
</body>

</html>