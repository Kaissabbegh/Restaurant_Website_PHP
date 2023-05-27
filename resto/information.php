<?php

session_start();
if(isset($_SESSION['username'])){
echo "welc".$_SESSION['username'];
echo '<br>';
echo "your pass: ".$_SESSION['password'];

}
?>