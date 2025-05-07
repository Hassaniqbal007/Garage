<?php 
if(isset($_POST['product_no'])){
	include 'connection.php';
	$product_no = $_POST['product_no'];
	$department = $_POST['department'];
	$category = $_POST['category_name'];
	$product_name = $_POST['doctor_name'];
	$desc = $_POST['desc'];
	$piece_cotton = $_POST['piece_cotton'];
	$purchase_price = $_POST['purchase_price'];
	$purchase_discount = $_POST['purchase_discount'];
	$sale_price = $_POST['sale_price'];
	$sale_discount = $_POST['sale_discount'];
  $cube = $_POST['cube'];
  $weight = $_POST['weight'];
  $brand = $_POST['brand'];
	$gst = $_POST['gst'];
  // $barcode = $_POST['barcode'];
  $pack = $_POST['pack'];
	$sql=mysqli_query($conn,"INSERT INTO `items` (`id`, `product_no`, `department`, `category`, `product_name`, `description`, `piece_per_cotton`, `purchase_price`, `purchase_discount`, `sale_price`, `sale_discount`, `gst`, `product_image`,`brand`,`cube`,`weight`,`barcode`,`pack`) VALUES (NULL, '$product_no', '$department', '$category', '$product_name', '$desc', '$piece_cotton', '$purchase_price', '$purchase_discount', '$sale_price', '$sale_discount', '$gst', '','$brand','$cube','$weight','$product_no','$pack');");
    if($sql){
      echo "Item Inserted Successfully!";
       }
      else{
        echo "Item Not Inserted!";
           }


}

if(isset($_POST['depart'])){
	$dep_id=$_POST['depart'];
	?>
	 <script src="assets/libs/select2/dist/js/select2.full.min.js"></script>
    <script src="assets/libs/select2/dist/js/select2.min.js"></script>
    <script src="dist/js/pages/forms/select2/select2.init.js"></script>
    <!--  <link rel="stylesheet" type="text/css" href="assets/libs/select2/dist/css/select2.min.css"> -->
 <div class="form-group mb-5 focused">
                                       <label for="category" class="text-info">Category</label>
                                        <select class="select2 form-control text-info" style="width: 100%; height:36px;" id="category" name="category_name">
                                         <option value="0" >Select Category</option>
                                           <?php
                                     include("connection.php");
                                        $get_department=mysqli_query($conn, "SELECT * FROM `category` WHERE `dep_name`='$dep_id'");
                                        while($department=mysqli_fetch_array($get_department))
                                        {
                                        $department_id=$department['id'];
                                        $department_name=$department['category'];
                                        if($id==$department_name){
                                        	echo '<option selected="" value="'.$department_id.'">'.$department_name.'</option>';
                                        }
                                        else{
                                        	echo '<option value="'.$department_id.'">'.$department_name.'</option>';
                                        }
                                       
                                        }
                                        ?>
                                          
                                        </select>
                                        <!-- <span class="bar"></span> -->
                                        
                                    </div>

	<?php
}

if(isset($_POST['customer_no'])){
	include 'connection.php';
	$customer_no = $_POST['customer_no'];
	$customer_name = $_POST['customer_name'];
	$desc = $_POST['desc'];
	$phone_no = $_POST['phone_no'];
	$city = $_POST['City'];
	$address = $_POST['address'];
	$email = $_POST['email'];
	
	$sql=mysqli_query($conn,"INSERT INTO `customers` (`id`, `customer_num`, `customer_name`, `address`, `ph_num`, `city`, `email`, `description`) VALUES (NULL, '$customer_no', '$customer_name', '$address', '$phone_no', '$city', '$email', '$desc');");
    if($sql){
      echo "Customer Inserted Successfully!";
       }
      else{
        echo "Customer Not Inserted!";
           }


}

 ?>