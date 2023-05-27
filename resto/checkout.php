
<?php
session_start();
include ('./includes/connect.php');
function getIPAddresss() {  
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
?>
<?php
$ip=getIPAddresss();

$user_query="SELECT * from user_table where ip_add='$ip'";
$result=mysqli_query($conn,$user_query);
$run_query=mysqli_fetch_array($result);
$user_id=$run_query['user_id'];
?>
<?php
if (!isset($_SESSION['username'])) {
  include('./sign_in.php');
}else{
  include('./payment.php');
}
?>