<?php
include('../includes/connect.php');
if(isset($_POST['insert_brand'])){
    $brand_title=$_POST['brand_title'];

    //select from database
    $select_query="SELECT * FROM brands where brand_title='$brand_title'";
    $result_select =mysqli_query($con, $select_query);
    $number=mysqli_num_rows($result_select);
    if($number>0){
        echo "<script>alert('Brand already present')</script>";
    }else{
        $insert_query = "INSERT INTO brands(brand_title) VALUES('$brand_title')";
        $result =mysqli_query($con, $insert_query);
        if($result){
            echo "<script>alert('Brand has been inserted successfully')</script>";
        }
    }   
}
?>









<h2 class="text-center">Insert Brands</h2>
<form action="" method="post" class="mb-2">
<div class="input-group mb-3 w-90">
  <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
  <input type="text" class="form-control" placeholder="Insert Brand" aria-label="brands" aria-describedby="basic-addon1" name="brand_title">
</div>

<div class="input-group mb-2 w-10 m-auto">
  <input type="submit" class="border-0 p-2 my-3 bg-info" name="insert_brand" value="Insert Brand">
</div>
</form>