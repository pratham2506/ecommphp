<?php
//Including conenct File
include('./includes/connect.php');

//Getting Products
function getproducts(){
    global $con;

    // Condition to check isset or not
    if(!isset($_GET['category'])){
      if(!isset($_GET['brand'])){
    
$select_query="SELECT * FROM products ORDER BY rand() LIMIT 0,3";
            $result_query=mysqli_query($con,$select_query);
            // $row=mysqli_fetch_assoc($result_query);
            // echo $row['product_title'];
            while($row=mysqli_fetch_assoc($result_query)){
              $product_id=$row['product_id'];
              $product_title=$row['product_title'];
              $product_description=$row['product_description'];
              $product_image1=$row['product_image1'];
              $product_price=$row['product_price'];
              $category_id=$row['category_id'];
              $brand_id=$row['brand_id'];
              echo "<div class='col-md-4 mb-2'>
              <div class='card'>
                <img src='./admin_area/product_images/$product_image1' class='card-img-top'>
                <div class='card-body'>
                  <h5 class='card-title'>$product_title</h5>
                  <p class='card-text'>$product_description</p>
                  <p class='card-text'>Price: $product_price/-</p>
                  <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to Cart</a>
                  <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
                </div>
              </div>
            </div>";
            }
        }}}


        //getting unique categories
       
          function getuniquecategories(){
            global $con;
        
            // Condition to check isset or not
            if(isset($_GET['category'])){
            $category_id=$_GET['category'];
        $select_query="SELECT * FROM products where category_id=$category_id";
                    $result_query=mysqli_query($con,$select_query);
                    $num_of_rows=mysqli_num_rows($result_query);
                    if($num_of_rows==0){
                      echo "<h2 class='text-center text-danger'>No Stock for this Category</h2>";
                    }
                    // $row=mysqli_fetch_assoc($result_query);
                    // echo $row['product_title'];
                    while($row=mysqli_fetch_assoc($result_query)){
                      $product_id=$row['product_id'];
                      $product_title=$row['product_title'];
                      $product_description=$row['product_description'];
                      $product_image1=$row['product_image1'];
                      $product_price=$row['product_price'];
                      $category_id=$row['category_id'];
                      $brand_id=$row['brand_id'];
                      echo "<div class='col-md-4 mb-2'>
                      <div class='card'>
                        <img src='./admin_area/product_images/$product_image1' class='card-img-top'>
                        <div class='card-body'>
                          <h5 class='card-title'>$product_title</h5>
                          <p class='card-text'>$product_description</p>
                  <p class='card-text'>Price: $product_price/-</p>
                          <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to Cart</a>
                          <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
                        </div>
                      </div>
                    </div>";
                    }
                }}




                 //getting unique categories
       
          function getuniquebrands(){
            global $con;
        
            // Condition to check isset or not
            if(isset($_GET['brand'])){
            $brand_id=$_GET['brand'];
        $select_query="SELECT * FROM products where brand_id=$brand_id";
                    $result_query=mysqli_query($con,$select_query);
                    $num_of_rows=mysqli_num_rows($result_query);
                    if($num_of_rows==0){
                      echo "<h2 class='text-center text-danger'>No Stock for this Brand</h2>";
                    }
                    // $row=mysqli_fetch_assoc($result_query);
                    // echo $row['product_title'];
                    while($row=mysqli_fetch_assoc($result_query)){
                      $product_id=$row['product_id'];
                      $product_title=$row['product_title'];
                      $product_description=$row['product_description'];
                      $product_image1=$row['product_image1'];
                      $product_price=$row['product_price'];
                      $category_id=$row['category_id'];
                      $brand_id=$row['brand_id'];
                      echo "<div class='col-md-4 mb-2'>
                      <div class='card'>
                        <img src='./admin_area/product_images/$product_image1' class='card-img-top'>
                        <div class='card-body'>
                          <h5 class='card-title'>$product_title</h5>
                          <p class='card-text'>$product_description</p>
                  <p class='card-text'>Price: $product_price/-</p>
                          <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to Cart</a>
                          <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
                        </div>
                      </div>
                    </div>";
                    }
                }}
        


//displaying brands in sidenav
        function getbrands(){
    global $con;
            $select_brands="SELECT * FROM brands";
            $result_brands=mysqli_query($con,$select_brands);
            $row_data=mysqli_fetch_assoc($result_brands);
            // echo $row_data['brand_title'];
            while($row_data=mysqli_fetch_assoc($result_brands)){
              $brand_title=$row_data['brand_title'];
              $brand_id=$row_data['brand_id'];
              echo "<li class='nav-item'>
              <a href='index.php?brand=$brand_id' class='nav-link text-light'>$brand_title</a>
            </li>";
            }
        }


//displaying categories in sidenav
function getcategory(){
    global $con;
    $select_categorires="SELECT * FROM categories";
            $result_categorires=mysqli_query($con,$select_categorires);
            $row_data=mysqli_fetch_assoc($result_categorires);
            // echo $row_data['brand_title'];
            while($row_data=mysqli_fetch_assoc($result_categorires)){
              $category_title=$row_data['category_title'];
              $category_id=$row_data['category_id'];
              echo "<li class='nav-item'>
              <a href='index.php?category=$category_id' class='nav-link text-light'>$category_title</a>
          </li>";
            }
}



//Searching Products Function
function search_product(){
  global $con;    
  if(isset($_GET['search_data_product'])){
    $search_data_value=$_GET['search_data'];

$search_query="SELECT * FROM products WHERE product_keyword LIKE '%$search_data_value%'";
            $result_query=mysqli_query($con,$search_query);
            // $row=mysqli_fetch_assoc($result_query);
            // echo $row['product_title'];
            $num_of_rows=mysqli_num_rows($result_query);
                    if($num_of_rows==0){
                      echo "<h2 class='text-center text-danger'>No results found</h2>";
                    }
            while($row=mysqli_fetch_assoc($result_query)){
              $product_id=$row['product_id'];
              $product_title=$row['product_title'];
              $product_description=$row['product_description'];
              $product_image1=$row['product_image1'];
              $product_price=$row['product_price'];
              $category_id=$row['category_id'];
              $brand_id=$row['brand_id'];
              echo "<div class='col-md-4 mb-2'>
              <div class='card'>
                <img src='./admin_area/product_images/$product_image1' class='card-img-top'>
                <div class='card-body'>
                  <h5 class='card-title'>$product_title</h5>
                  <p class='card-text'>$product_description</p>
                  <p class='card-text'>Price: $product_price/-</p>
                  <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to Cart</a>
                  <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
                </div>
              </div>
            </div>";
            }
        }}




        //getting all products
        function get_all_products(){
          global $con;

          // Condition to check isset or not
          if(!isset($_GET['category'])){
            if(!isset($_GET['brand'])){
          
      $select_query="SELECT * FROM products ORDER BY rand()";
                  $result_query=mysqli_query($con,$select_query);
                  // $row=mysqli_fetch_assoc($result_query);
                  // echo $row['product_title'];
                  while($row=mysqli_fetch_assoc($result_query)){
                    $product_id=$row['product_id'];
                    $product_title=$row['product_title'];
                    $product_description=$row['product_description'];
                    $product_image1=$row['product_image1'];
                    $product_price=$row['product_price'];
                    $category_id=$row['category_id'];
                    $brand_id=$row['brand_id'];
                    echo "<div class='col-md-4 mb-2'>
                    <div class='card'>
                      <img src='./admin_area/product_images/$product_image1' class='card-img-top'>
                      <div class='card-body'>
                        <h5 class='card-title'>$product_title</h5>
                        <p class='card-text'>$product_description</p>
                  <p class='card-text'>Price: $product_price/-</p>
                        <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to Cart</a>
                        <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
                      </div>
                    </div>
                  </div>";
                  }
              }}
        }




        //View details fuction
        function view_details(){
          global $con;

    // Condition to check isset or not
    if(isset($_GET['product_id'])){
    if(!isset($_GET['category'])){
      if(!isset($_GET['brand'])){
    $product_id=$_GET['product_id'];
$select_query="SELECT * FROM products WHERE product_id=$product_id";
            $result_query=mysqli_query($con,$select_query);
            // $row=mysqli_fetch_assoc($result_query);
            // echo $row['product_title'];
            while($row=mysqli_fetch_assoc($result_query)){
              $product_id=$row['product_id'];
              $product_title=$row['product_title'];
              $product_description=$row['product_description'];
              $product_image1=$row['product_image1'];
              $product_image2=$row['product_image2'];
              $product_image3=$row['product_image3'];
              $product_price=$row['product_price'];
              $category_id=$row['category_id'];
              $brand_id=$row['brand_id'];
              echo "<div class='col-md-4 mb-2'>
              <div class='card'>
                <img src='./admin_area/product_images/$product_image1' class='card-img-top'>
                <div class='card-body'>
                  <h5 class='card-title'>$product_title</h5>
                  <p class='card-text'>$product_description</p>
                  <p class='card-text'>Price: $product_price/-</p>
                  <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to Cart</a>
                  <a href='index.php' class='btn btn-secondary'>Go Home</a>
                </div>
              </div>
            </div>
            <div class='col-md-8'>
                <!-- related images -->
                <div class='row'>
                    <div class='col-md-12'>
                        <h4 class='text-center text-info mb-5'>Related Products</h4>
                    </div>
                    <div class='col-md-6'>
                    <img src='./admin_area/product_images/$product_image2' class='card-img-top'>
                    </div>
                    <div class='col-md-6'>
                    <img src='./admin_area/product_images/$product_image3' class='card-img-top'>
                    </div>
                </div>
            </div>
            ";
            }
        }}
          }}



          //Get IP Function
          function getIPAddress() {  
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
        // $ip = getIPAddress();  
        // echo 'User Real IP Address - '.$ip; 
        
        
        //Cart Function
        function cart(){
            if(isset($_GET['add_to_cart'])){
              global $con;
              $ip=getIPAddress();
              $get_product_id=$_GET['add_to_cart'];
              $select_query="SELECT * FROM cart_details WHERE ip_address='$ip' AND product_id=$get_product_id";
              $result_query=mysqli_query($con,$select_query);
              $num_of_rows=mysqli_num_rows($result_query);
              if($num_of_rows>0){
                echo "<script>alert('Item already there')</script>";
                echo "<script>window.open('index.php','_self')</script>";
              }else{
                $insert_query="INSERT INTO cart_details(product_id,ip_address,quantity) VALUES ('$get_product_id','$ip',0)";
              $result_query=mysqli_query($con,$insert_query);
              echo "<script>alert('Item added')</script>";
              echo "<script>window.open('index.php','_self')</script>";
              }
           }
        }



        //function to get cart item number
        function cart_item(){
          if(isset($_GET['add_to_cart'])){
            global $con;
            $ip=getIPAddress();
            // $get_product_id=$_GET['add_to_cart'];
            $select_query="SELECT * FROM cart_details WHERE ip_address='$ip'";
            $result_query=mysqli_query($con,$select_query);
            $num_of_rows=mysqli_num_rows($result_query);
          }
            else{
              global $con;
              $ip=getIPAddress();
              // $get_product_id=$_GET['add_to_cart'];
              $select_query="SELECT * FROM cart_details WHERE ip_address='$ip'";
              $result_query=mysqli_query($con,$select_query);
              $num_of_rows=mysqli_num_rows($result_query);
            }
            echo $num_of_rows;
         }



         //total cart price function
         function total_cart_price(){
          global $con;
          $ip=getIPAddress();
          $total_price=0;
          $cart_query="SELECT * FROM cart_details WHERE ip_address='$ip'";
          $result=mysqli_query($con,$cart_query);
          while($row=mysqli_fetch_array($result)){
            $product_id=$row['product_id'];
            $select_products="SELECT * FROM products WHERE product_id='$product_id'";
            $result_products=mysqli_query($con,$select_products);
            while($row_product_price=mysqli_fetch_array($result_products)){
              $product_price=array($row_product_price['product_price']);
              $product_values=array_sum($product_price);
              $total_price+=$product_values;
            }
          }
          echo $total_price;
         }
        
?>