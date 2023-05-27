<?php
include ('./includes/connect.php');
include('./functions/common_function.php');
@session_start();
$ip=getIPAddress();
$username=$_SESSION['username'];
$user_query="SELECT * from user_table where ip_add='$ip' and username='$username'";
$result=mysqli_query($conn,$user_query);
$run_query=mysqli_fetch_array($result);
$user_id=$run_query['user_id'];

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Shop Homepage</title>
    <link rel="icon" type="image/x-icon" href="assets/tajine.png" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <link href="css/styless.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

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
    <div class="container">
      <h1 class="text-center my-4">Payment Options</h1>
      <div class="row justify-content-center">
        <div class="col-md-6 col-lg-4">
          <a href="https://www.paypal.com" target="_blank">
            <img src="./assets/online.png" class="img-fluid rounded" alt="Online Payment Option">
          </a>
          <h2 class="text-center my-4">Online Payment Option</h2>
        </div>
        <div class="col-md-6 col-lg-4">
          <a href="order.php?user_id=<?php echo $user_id;?>">
            <img src="./assets/offline.jpg" class="img-fluid rounded" alt="Offline Payment Option">
          </a>
          <h2 class="text-center my-4">Offline Payment Option</h2>
        </div>
      </div>
    </div>
    <div class="cursor"></div>
    <div class="cursor2"></div>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
        <script src=js/indexx.js></script>
  </body>
</html>
