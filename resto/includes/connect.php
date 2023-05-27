<?php
$conn=mysqli_connect('127.0.0.1','root','','mystore');
if($conn->connect_error){
    die("Connection failed" .$conn->connect_error);
 }
?>