<?php 
if(isset($_POST['sendProduct'])){
	include 'connection.php';
$codeArr = json_decode($_POST["sendCode"]);
$ProductArr = $_POST["sendProduct"];
$QtyArr = json_decode($_POST["sendQty"]);
$PriceArr = json_decode($_POST["sendPrice"]);
$NetArr = json_decode($_POST["sendNet"]);
$DateArr=json_decode($_POST['sendDate']);
$UnitArr=json_decode($_POST['sendUnit']);
$WeightArr=json_decode($_POST['sendWeight']);
$CubeArr=json_decode($_POST['sendCube']);
$PackArr=json_decode($_POST['sendPack']);
$BinArr=json_decode($_POST['sendBin']);
$IDArr=json_decode($_POST['sendID']);

$TaxArr=$_POST['sendTax'];
$DescArr=json_decode($_POST['sendDescription']);
$sale_no=$_POST['sale_no'];
$sales_date=$_POST['sale_date'];
$customer_po=$_POST['customer_po'];
$customer_name=$_POST['customer_name'];
$vendor_po=$_POST['vendor_po'];
$saleperson=$_POST['saleperson'];
$carrier=$_POST['carrier'];
$service=$_POST['service'];
$bill_to=$_POST['bill_no'];
$ship_to=$_POST['ship_to'];
$truck_driver=$_POST['truck_driver'];
$sold_to=$_POST['sold_to'];
// $vendor_name=$_POST['vendor_name'];
$total_net_amount=$_POST['total_net_amount'];

for ($i = 0; $i < count($QtyArr); $i++) {
	 
  if(($QtyArr[$i] != "")){  

  if($IDArr[$i]=='add'){
  	$sql=mysqli_query($conn, "INSERT INTO `sales_list` (`id`, `sale_no`, `item_num`, `item_name`, `description`, `uom`, `unit_price`, `bin`, `qty`, `tax`, `total`,`brand`,`weight`,`cube`,`pack`) VALUES (NULL, '$sale_no', '$codeArr[$i]', '', '$DescArr[$i]', '$UnitArr[$i]', '$PriceArr[$i]', '$BinArr[$i]', '$QtyArr[$i]', '', '$NetArr[$i]','$DateArr[$i]','$WeightArr[$i]','$CubeArr[$i]','$PackArr[$i]');");
  } 

else{
	$sql=mysqli_query($conn,"UPDATE `sales_list` SET `item_num`='$codeArr[$i]',`item_name`='',`description`='$DescArr[$i]',`uom`='$UnitArr[$i]',`unit_price`='$PriceArr[$i]',`bin`='$BinArr[$i]',`qty`='$QtyArr[$i]',`tax`='',`total`='$NetArr[$i]',`brand`='$DateArr[$i]',`cube`='CubeArr[$i]',`weight`='$WeightArr[$i]',`pack`='$PackArr[$i]' WHERE `id`='$IDArr[$i]'");
}
      

     }

    }

    $sq="UPDATE `sales` SET `customer_no`='$customer_name',`customer_po`='$customer_po',`sales_date`='$sales_date',`services`='$service',`carrier`='$carrier',`saleperson`='$saleperson',`net_amount`='$total_net_amount',`bill_to`='$bill_to',`ship_to`='$ship_to',`term`='$vendor_po',`truck_driver`='$truck_driver',`sold_to`='$sold_to' WHERE `sale_no`='$sale_no'";
    $sqle=mysqli_query($conn,$sq);
  if(!$sql && !$sqle)
    {
      mysqli_error($conn);
      echo "Error In Sales.";
    }
  
    else
    {
      echo $sale_no;
      
    }


}

if (isset($_POST['imune'])) {
	# code...
	echo $_POST['imune'];
}

 ?>