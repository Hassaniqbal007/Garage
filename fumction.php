
<?php 
$path = "http://".$_SERVER['HTTP_HOST']."/garage";
$main_path = $_SERVER['DOCUMENT_ROOT']."/garage"; 
function session($userDet){
            if (session_status() === PHP_SESSION_NONE) {
                     session_start();
                  }
          // $s = serialize($_SESSION);
           unset($userDet['password']);
            //$_SESSION['email'] =$email;
           
?>
<script type="text/javascript">
  window.location.replace("<?php echo $main_path; ?>/Administer/admin1.php?user=<?php echo $getUserRow['username']; ?>&status=<?php echo $getUserRow['type']; ?>");
</script>
  <?php



}

function add_service($service,$description,$price){
	include "../conn.php";
	$sqle=mysqli_query($conn,"INSERT INTO `services` (`id`, `service_name`, `description`, `service_price`) VALUES (NULL, '$service', '$description', '$price');");
  if(!$sqle)
    {
      mysqli_error($conn);
      echo "<script>alert('Service Is Not Inserted!');</script>";
    }
    else
    {
      echo "<script>alert('Successful Inserted Into Service!');</script>";
      
    }

}

function update_service($service,$description,$price,$id){
  include "../conn.php";
  $sqle=mysqli_query($conn,"UPDATE `services` SET `service_name`='$service',`description`='$description',`service_price`='$price' WHERE `id`='$id'");
  if(!$sqle)
    {
      mysqli_error($conn);
      echo "<script>alert('Service Is Not Edit!');</script>";
    }
    else
    {
      echo "<script>alert('Successful Edit Into Service!');</script>";
      header("location:".$main_path."/Service/service_list.php");
      
    }

}

function update_garage($service,$description,$price,$city,$id){
  include "../conn.php";
  $sqle=mysqli_query($conn,"UPDATE `garage` SET `garage_name`='$service',`garage_location`='$description',`garage_area`='$price',`garage_city`='$city' WHERE `id`='$id'");
  if(!$sqle)
    {
      mysqli_error($conn);
      echo "<script>alert('Garage Is Not Edit!');</script>";
    }
    else
    {
      echo "<script>alert('Successful Edit Into Garage!');</script>";
      header("location:".$main_path."/garage/garage_list.php");
      
    }

}

function add_garage($service,$description,$price,$city){
  include "../conn.php";
  $sqle=mysqli_query($conn,"INSERT INTO `garage` (`id`, `garage_name`, `garage_location`, `garage_area`, `garage_city`) VALUES (NULL, '$service', '$description', '$price', '$city');");
  if(!$sqle)
    {
      mysqli_error($conn);
      echo "<script>alert('Garage Is Not Inserted!');</script>";
    }
    else
    {
      echo "<script>alert('Successful Inserted Into Garage!');</script>";
      
    }

}
function add_vehicle($service,$description,$price,$city){
  include "../conn.php";
  $sqle=mysqli_query($conn,"INSERT INTO `vehicle`(`id`, `vehicle_name`, `model`, `year`, `reg_no`) VALUES (Null,'$service','$description','$price','$city')");
  if(!$sqle)
    {
      mysqli_error($conn);
      echo "<script>alert('Vehicle Is Not Inserted!');</script>";
    }
    else
    {
      echo "<script>alert('Successful Inserted Into Vehicle!');</script>";
      
    }

}
function update_vehicle($service,$description,$price,$city,$id){
  include "../conn.php";
  $sqle=mysqli_query($conn,"UPDATE `vehicle` SET `vehicle_name`='$service',`model`='$description',`year`='$price',`reg_no`='$city' WHERE `id`='$id'");
  if(!$sqle)
    {
      mysqli_error($conn);
      echo "<script>alert('Vehicle Is Not Inserted!');</script>";
    }
    else
    {
      echo "<script>alert('Successful Edit Into Vehicle!');</script>";
      header("location:".$main_path."/vehicle/vehicle_list.php");
      
    }

}

function add_supplier($service,$description,$price,$city){
  include "../conn.php";
  $sqle=mysqli_query($conn,"INSERT INTO `supplier`(`id`, `supplier_name`, `address`, `contact`, `email`) VALUES (NULL,'$service','$description','$price','$city')");
  if(!$sqle)
    {
      mysqli_error($conn);
      echo "<script>alert('Supplier Is Not Inserted!');</script>";
    }
    else
    {
      echo "<script>alert('Successful Inserted Into Supplier!');</script>";
      
    }

}
function update_supplier($service,$description,$price,$city,$id){
  include "../conn.php";
  $sqle=mysqli_query($conn,"UPDATE `supplier` SET `supplier_name`='$service',`address`='$description',`contact`='$price',`email`='$city' WHERE `id`='$id'");
  if(!$sqle)
    {
      mysqli_error($conn);
      echo "<script>alert('Supplier Is Not Inserted!');</script>";
    }
    else
    {
      echo "<script>alert('Successful Edit Into Supplier!');</script>";
      header("location:".$main_path."/supplier/supplier_list.php");
      
    }

}


function add_job($service,$booking,$description,$city){
  include "../conn.php";
  $sqle=mysqli_query($conn,"INSERT INTO `job_card` (`id`, `garage_name`, `booking_id`, `description`, `date`) VALUES (NULL, '$service', '$booking', '$description', '$city');");
  if(!$sqle)
    {
      mysqli_error($conn);
      echo "<script>alert('Job Is Not Inserted!');</script>";
    }
    else
    {
      echo "<script>alert('Successful Inserted Into Job!');</script>";
      //header("location:".$main_path."/assign_job/assign_job.php");

      
    }

}
function update_job($service,$booking,$description,$city,$id){
  include "../conn.php";
  $sqle=mysqli_query($conn,"UPDATE `job_card` SET `garage_name`='$service',`booking_id`='$booking',`description`='$description',`date`='$city' WHERE `id`='$id'");
  if(!$sqle)
    {
      mysqli_error($conn);
      echo "<script>alert('Job Is Not Inserted!');</script>";
    }
    else
    {
      echo "<script>alert('Successful Inserted Into Job!');</script>";
      //header("location:".$main_path."/assign_job/job_list.php");

      
    }

}

function update_customrr($ser_name,$contact,$email,$address,$customer_type,$id){
  include "../conn.php";
  $sqle=mysqli_query($conn,"UPDATE `users` SET `username`='$ser_name',`email`='$email',`contact`='$contact',`address`='$address',`type`='$customer_type' WHERE `id`='$id'");
  if(!$sqle)
    {
      mysqli_error($conn);
      echo "<script>alert('Job Is Not Inserted!');</script>";
    }
    else
    {
      echo "<script>alert('Successful Inserted Into Job!');</script>";
      header("location:".$main_path."/customers/customers.php");

      
    }


}
function add_booking($service,$description,$price,$city){
  include "../conn.php";
  include 'security.php';
  $user=$_SESSION['username'];

  $sqle=mysqli_query($conn,"INSERT INTO `booking` (`id`, `contact_name`, `manager`, `contact_type`, `service`, `date`, `time`, `address`,`in_charge`,`next_date`,`garage_name`,`no_of_vehicles`) VALUES (NULL, '$user', '', 'Individual', '$service', '$description', '$city', '','','$price','','');");
  if(!$sqle)
    {
      mysqli_error($conn);
      echo "<script>alert('Booking Is Not Inserted!');</script>";
    }
    else
    {
      echo "<script>alert('Successful Inserted Into Booking!');</script>";
      //header("location:".$main_path."/booking/add_booking.php");
      
    }

}function update_booking($service,$description,$price,$city,$id){
  include "../conn.php";
  include 'security.php';
  $user=$_SESSION['username'];

  $sqle=mysqli_query($conn,"UPDATE `booking` SET `service`='$service',`date`='$description',`time`='$city',`next_date`='$price' WHERE `id`='$id';");
  if(!$sqle)
    {
      mysqli_error($conn);
      echo "<script>alert('Booking Is Not Inserted!');</script>";
    }
    else
    {
      echo "<script>alert('Successful Inserted Into Booking!');</script>";
      //header("location:".$main_path."/customers/customers.php");
      
    }

}
function add_company($service,$description,$price,$city,$company,$manager,$garage,$vehicles){
  include "../conn.php";
  include 'security.php';
  $user=$_SESSION['username'];

  $sqle=mysqli_query($conn,"INSERT INTO `booking` (`id`, `contact_name`, `manager`, `contact_type`, `service`, `date`, `time`, `address`,`in_charge`,`next_date`,`garage_name`,`no_of_vehicles`) VALUES (NULL, '$user', '$company', 'Company', '$service', '$description', '$city', '','$manager','$price','$garage','$vehicles');");
  if(!$sqle)
    {
      mysqli_error($conn);
      echo "<script>alert('Booking Is Not Inserted!');</script>";
    }
    else
    {
      echo "<script>alert('Successful Inserted Into Booking!');</script>";
      //header("location:".$main_path."/booking/add_booking.php");
      
    }

}
function update_company($service,$description,$price,$city,$company,$manager,$garage,$vehicles,$id){
  include "../conn.php";
  include 'security.php';
  $user=$_SESSION['username'];

  $sqle=mysqli_query($conn,"UPDATE `booking` SET `manager`='$company',`service`='$service',`date`='$description',`time`='$city',`in_charge`='$manager',`next_date`='$price',`no_of_vehicles`='$vehicles',`garage_name`='$garage' WHERE `id`='$id'");
  if(!$sqle)
    {
      mysqli_error($conn);
      echo "<script>alert('Booking Is Not Inserted!');</script>";
    }
    else
    {
      echo "<script>alert('Successful Inserted Into Booking!');</script>";
      //header("location:".$main_path."/customers/customers.php");
      
    }

}

if(isset($_POST['items_id'])){
  $id=$_POST['items_id'];
    include "../conn.php";

    $sql=mysqli_query($conn,"DELETE FROM `booking` WHERE `booking`.`id` = '$id'");
    if($sql){
      echo "Successfully Deleted!";
    }

}

if(isset($_GET['gar_id'])){
  $id=$_GET['gar_id'];
    include "../conn.php";

    $sql=mysqli_query($conn,"DELETE FROM `garage` WHERE `id`='$id'");
    if($sql){
      echo "Successfully Deleted!";
      header("location:".$main_path."/garage/garage_list.php");
    }

}if(isset($_GET['jb_id'])){
  $id=$_GET['jb_id'];
    include "../conn.php";

    $sql=mysqli_query($conn,"DELETE FROM `assign_task` WHERE `id`='$id'");
    if($sql){
      echo "Successfully Deleted!";
      header("location:".$main_path."/garage/garage_list.php");
    }

}
if(isset($_GET['ser_id'])){
  $id=$_GET['ser_id'];
    include "../conn.php";

    $sql=mysqli_query($conn,"DELETE FROM `services` WHERE `id`='$id'");
    if($sql){
      echo "Successfully Deleted!";
      header("location:".$main_path."/Service/service_list.php");
    }

}
if(isset($_GET['veh_id'])){
  $id=$_GET['veh_id'];
    include "../conn.php";

    $sql=mysqli_query($conn,"DELETE FROM `vehicle` WHERE `id`='$id'");
    if($sql){
      echo "Successfully Deleted!";
      header("location:".$main_path."/vehicle/vehicle_list.php");
    }

}if(isset($_GET['sup_id'])){
  $id=$_GET['sup_id'];
    include "../conn.php";

    $sql=mysqli_query($conn,"DELETE FROM `supplier` WHERE `id`='$id'");
    if($sql){
      echo "Successfully Deleted!";
      header("location:".$main_path."/supplier/supplier_list.php");
    }

}if(isset($_GET['cus_id'])){
  $id=$_GET['cus_id'];
    include $main_path."/conn.php";

    $sql=mysqli_query($conn,"DELETE FROM `users` WHERE `id`='$id'");
    if($sql){
      echo "Successfully Deleted!";
      header("location:".$main_path."/customers/customers.php");
    }

}


 ?>
