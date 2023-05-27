<h3 class="text-danger mb-4 text-center">Delete Account</h3>
<form action="" method="post" class="mt-5">
    <div class="form-outline">
        <input type="submit" class="form-control w-50 m-auto" name="delete" value="Delete this account">
    </div>

</form>

<?php
$username_session=$_SESSION['username'];
if(isset($_POST['delete'])){
    $delete_query="DELETE from user_table where username='$username_session'";
    $result=mysqli_query($conn,$delete_query);
    if($result){
        session_destroy();
        echo "<script> alert('Account deleted with success')</script>";
        echo "<script>window.open('index.php','_self')</script>";
    }
}

?>