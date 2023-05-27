<h3 class="text-success">All Categories</h3>
<table class="table table-bordered my-5 text-center">
  <tr class="bg-dark text-white">
  <th>Category Number</th>
  <th>Category title</th>
    <th>Edit</th>
    <th>Delete</th>
    
  </tr>
  <?php
  $select_queryy="SELECT * FROM categories";
  $result_queryy=mysqli_query($conn,$select_queryy);
  $num=0;
  while($row=mysqli_fetch_assoc($result_queryy)){
        $category_title=$row['category_title'];
        $category_id=$row['category_id'];
        $num++;
        echo" 
        <tr>
    <th>$num</th>
    <th>$category_title</th>
    
    <th><a href='index.php?edit_category=$category_id' class='text-dark' ><i class='bi bi-pencil-square'></i></a></th>
    <th><a href='index.php?delete_category=$category_id' class='text-dark' ><i class='bi bi-trash'></i></a></th>
    
  </tr>
        ";
  }
  ?>
</table>