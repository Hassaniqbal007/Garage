<?php 

if(isset($_POST['sendCode'])){
include '../conn.php';
    $error='';
    $new_id=0;
    $db_query = "SELECT * FROM `invoice` ORDER BY `id` DESC LIMIT 1";
$result=mysqli_query($conn,$db_query);
while($getinitialcount=mysqli_fetch_array($result))
{
  $new_id=$getinitialcount['id'];
  $new_id = (int) filter_var($new_id, FILTER_SANITIZE_NUMBER_INT); 
  $new_id=abs($new_id);

}
if($new_id==0){
	$new_id=$new_id+1;
}
else{
	$new_id=$new_id+1;
}

$invoice="inv-".$new_id;
$codeArr = json_decode($_POST["sendCode"]);
$QtyArr = json_decode($_POST["sendQty"]);
$PriceArr = json_decode($_POST["sendPrice"]);
$NetArr = json_decode($_POST["sendNet"]);
$UnitArr=json_decode($_POST['sendUnit']);
$DescArr=json_decode($_POST['sendDescription']);
$customer_name=$_POST['customer_name'];
$email=$_POST['email'];
$address=$_POST['destination'];
$phone_no=$_POST['phone_no'];
$invoice_date=$_POST['invoice_date'];
$due_date=$_POST['due_date'];
$terms=$_POST['terms'];
$total_net_amount=$_POST['total_net_amount'];

for ($i = 0; $i < count($QtyArr); $i++) {
	$QtyArr[$i];
  if(($QtyArr[$i] != "")){   
         
      $sql=mysqli_query($conn, "INSERT INTO `invoice_list` (`id`, `invoice_no`, `product_no`, `description`, `unit`, `unit_price`, `total`, `qty`) VALUES (NULL, '$invoice', '$codeArr[$i]', '$DescArr[$i]', '$UnitArr[$i]', '$PriceArr[$i]', '$NetArr[$i]', '$QtyArr[$i]');");

     }

    }
    $sqle=mysqli_query($conn,"INSERT INTO `invoice` (`id`, `invoice_no`, `customer_name`, `address`, `invoice_date`, `due_date`, `terms`, `email`, `phone_no`, `net_amount`) VALUES (NULL, '$invoice', '$customer_name', '$address', '$invoice_date', '$due_date', '$terms', '$email', '$phone_no', '$total_net_amount');");
  if(!$sql && !$sqle)
    {
      mysqli_error($conn);
      echo "Error In Invoice.";
    }
  
    else
    {
      echo $invoice;
      
    }


}

if(isset($_POST['item_code'])){
  include '../conn.php';
$item_code=$_POST['item_code'];
$search = mysqli_real_escape_string($conn, $_POST["item_code"]);
  $query = "SELECT * FROM `invoice` WHERE `invoice_no`='$search'";
$result = mysqli_query($conn, $query);
$i=0;
if(mysqli_num_rows($result) > 0)
{
  
while($getinitialcount=mysqli_fetch_array($result))
{
  $um=$getinitialcount['invoice_no'];
  $my_array[$i]['customer_name'] = $getinitialcount['customer_name'];
  $my_array[$i]['address'] = $getinitialcount['address'];
  $my_array[$i]['invoice_date'] = $getinitialcount['invoice_date'];
  $my_array[$i]['due_date'] = $getinitialcount['due_date'];
  $my_array[$i]['terms'] = $getinitialcount['terms'];
  $my_array[$i]['email'] = $getinitialcount['email'];
  $my_array[$i]['phone_no'] = $getinitialcount['phone_no'];
  $my_array[$i]['net_amount'] = $getinitialcount['net_amount'];
  $i++;

}
$list=json_encode($my_array);
echo $list;
}
else
{
  echo '0';
}


 }

 if(isset($_POST['invoice_code'])){
  include '../conn.php';
$item_code=$_POST['invoice_code'];
$search = mysqli_real_escape_string($conn, $_POST["invoice_code"]);
  $query = "SELECT * FROM `invoice_list` WHERE `invoice_no`='$search'";
$result = mysqli_query($conn, $query);
$i=0;
if(mysqli_num_rows($result) > 0)
{
  
while($getinitialcount=mysqli_fetch_array($result))
{
  $um=$getinitialcount['invoice_no'];
  $my_array[$i]['id'] = $getinitialcount['id'];
  $my_array[$i]['product_no'] = $getinitialcount['product_no'];
  $my_array[$i]['description'] = $getinitialcount['description'];
  $my_array[$i]['unit'] = $getinitialcount['unit'];
  $my_array[$i]['unit_price'] = $getinitialcount['unit_price'];
  $my_array[$i]['total'] = $getinitialcount['total'];
  $my_array[$i]['qty'] = $getinitialcount['qty'];
  $i++;

}
$list=json_encode($my_array);
echo $list;
}
else
{
  echo '0';
}


 }

if(isset($_POST['customer_id'])){
  include '../conn.php';
   $search = mysqli_real_escape_string($conn, $_POST["customer_id"]);
  $query = "SELECT * FROM `users` WHERE `id`='$search'";
$result = mysqli_query($conn, $query);
$i=0;
if(mysqli_num_rows($result) > 0)
{
  
while($getinitialcount=mysqli_fetch_array($result))
{
  $um=$getinitialcount['id'];
  $my_array[$i]['customer_name'] = $getinitialcount['email'];
  $my_array[$i]['address'] = $getinitialcount['address'];
  $my_array[$i]['ph_num'] = $getinitialcount['contact'];
  $my_array[$i]['email'] = '';
  $i++;

}
$list=json_encode($my_array);
echo $list;
}
else
{
  echo '0';
}
}



 ?>
