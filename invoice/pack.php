<?php

$invoice=$_GET['id'];
include('conn.php');
   $db_query = "SELECT * FROM `invoice` WHERE `invoice_no`='$invoice'";
$result=mysqli_query($conn,$db_query);
while($getinitialcount=mysqli_fetch_array($result))
{
  $new_id=$getinitialcount['id'];
  $invoice_no=$getinitialcount['invoice_no'];
  $cus_id=$getinitialcount['customer_name'];
  $address=$getinitialcount['address'];
  $invoice_date=$getinitialcount['invoice_date'];
  $due_date=$getinitialcount['due_date'];
  $terms=$getinitialcount['terms'];
  $net_amount=$getinitialcount['net_amount'];
  $email=$getinitialcount['email'];
  
}

$customer_query = "SELECT * FROM `users` WHERE `id`='$cus_id'";
$cus_result=mysqli_query($conn,$customer_query);
while($getinitialcount=mysqli_fetch_array($cus_result)){

	$customer_name=$getinitialcount['email'];
	$customer_num=$getinitialcount['contact'];
}

$html='';
  $inv_query = "SELECT * FROM `invoice_list` WHERE `invoice_no`='$invoice'";
                                       $inv_result=mysqli_query($conn,$inv_query);
                                    while($getinitialcount=mysqli_fetch_array($inv_result)){
                                    	

                                          
						                                       $html.='<tr>';
						                                        $html.='<td style="border-width: 1px; padding: 0.5em; position: relative; text-align: left; border-radius: 0.25em; border-style: solid; border-color: #DDD;">'.$getinitialcount["product_no"].'</td>';
						                                        $html.='<td style="border-width: 1px; padding: 0.5em; position: relative; text-align: left; border-radius: 0.25em; border-style: solid; border-color: #DDD;">'.$getinitialcount["description"].'</td>';
						                                        
						                                        $html.='<td style="border-width: 1px; padding: 0.5em; position: relative; text-align: left; border-radius: 0.25em; border-style: solid; border-color: #DDD;">'.$getinitialcount["qty"].'</td>';
						                                         $html.='<td style="border-width: 1px; padding: 0.5em; position: relative; text-align: left; border-radius: 0.25em; border-style: solid; border-color: #DDD;">'.$getinitialcount["unit_price"].'</td>';
						                                          $html.='<td style="border-width: 1px; padding: 0.5em; position: relative; text-align: left; border-radius: 0.25em; border-style: solid; border-color: #DDD;">'.$getinitialcount["total"].'</td>';
						                                                   
						                                                    
						                                           $html.="</tr>";

						                                                
	                              
                                           }
     

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once "vendor/autoload.php";

$mail = new PHPMailer;

$mail->From = "info@a1autoguru.com";
$mail->FromName = "a1autoguru";

$mail->addAddress($email, "A1autoguru");
$mail->AddCC('muhammadnabeel736@gmail.com', 'NABEEL MALIK');

//Provide file path and name of the attachments
// $mail->addAttachment("admin.php", "admin.php");        
// $mail->addAttachment("upload/nabeel.png"); //Filename is optional

$mail->isHTML(true);

$mail->Subject = "Subject Text";
$mail->Body = '<html style="border: 0;
	box-sizing: content-box;
	color: inherit;
	font-family: inherit;
	font-size: inherit;
	font-style: inherit;
	font-weight: inherit;
	line-height: inherit;
	list-style: none;
	margin: 0;
	padding: 0;
	text-decoration: none;
	vertical-align: top; font: 16px/1 "Open Sans", sans-serif; overflow: auto; padding: 0.5in;
background: #999; cursor: default; ">
	<head>
		<meta charset="utf-8">
		<title>Invoice</title>
		<link rel="stylesheet" href="style.css">
		<link rel="license" href="https://www.opensource.org/licenses/mit-license/">
		<script src="script.js"></script>
	</head>
	<body style=" box-sizing: border-box; height: 11in; margin: 0 auto; overflow: hidden; padding: 0.5in; width: 8.5in; background: #FFF; border-radius: 1px; box-shadow: 0 0 1in -0.25in rgba(0, 0, 0, 0.5);  ">
		<header>
			<h1 style="font: bold 100% sans-serif; letter-spacing: 0.5em; text-align: center; text-transform: uppercase; background: #000; border-radius: 0.25em; color: #FFF; margin: 0 0 1em; padding: 0.5em 0;">Invoice</h1>
			<address style="float: left; font-size: 75%; font-style: normal; line-height: 1.25; margin: 0 1em 1em 0; margin: 0 0 3em; ">
				<p style="margin: 0 0 0.25em; ">A1 AutoGuru</p>
				<p style="margin: 0 0 0.25em;  "></p>
				<p style="margin: 0 0 0.25em; "></p>
				<p style="margin: 0 0 0.25em; "></p>
			</address>
			<br>
			<br>
			<br>
			<br>
			<address style="float: right; font-size: 75%; font-style: normal; line-height: 1.25;  
  align-content: left; margin: 0 1em 1em 0;">
			    <p style="margin: 0 0 0.25em; ">'.$customer_name.'</p>
				<p style="margin: 0 0 0.25em; ">'.$customer_num.'</p>
				<p style="margin: 0 0 0.25em; ">'.$address.'</p>
			</address>
			<span style="display: block; float: right; margin: 0 0 1em 1em; max-height: 25%; max-width: 60%; position: relative;"></span>
		</header>
		<article style="margin: 0 0 3em; clear: both; content: ""; display: table;">
			<h1 style="clip: rect(0 0 0 0); position: absolute; "></h1>
			<address style="float: left; font-size: 125%; font-weight: bold;">
				
			</address>
			<table class="meta" style="font-size: 75%; table-layout: fixed; width: 30%; border-collapse: separate; border-spacing: 2px; margin: 0 0 3em; float: right; width: 36%; margin: 0 0 3em;">
				<tr>
					<th style="border-width: 1px; padding: 0.5em; position: relative; text-align: left; border-radius: 0.25em; border-style: solid; background: #EEE; border-color: #BBB; width: 40%; "><span >Invoice #</span></th>
					<td style="border-width: 1px; padding: 0.5em; position: relative; text-align: left; border-radius: 0.25em; border-style: solid; border-color: #DDD; width: 60%;"><span >'.$invoice_no.'</span></td>
				</tr>
				<tr>
					<th style="border-width: 1px; padding: 0.5em; position: relative; text-align: left; border-radius: 0.25em; border-style: solid; background: #EEE; border-color: #BBB; width: 40%;"><span >Date</span></th>
					<td style="border-width: 1px; padding: 0.5em; position: relative; text-align: left; border-radius: 0.25em; border-style: solid; border-color: #DDD; width: 60%;"><span >'.$invoice_date.'</span></td>
				</tr>
				<tr>
					<th style="border-width: 1px; padding: 0.5em; position: relative; text-align: left; border-radius: 0.25em; border-style: solid; background: #EEE; border-color: #BBB; width: 40%;"><span >Amount Due</span></th>
					<td style="border-width: 1px; padding: 0.5em; position: relative; text-align: left; border-radius: 0.25em; border-style: solid; border-color: #DDD; width: 60%;"><span id="prefix" >$</span><span>'.$net_amount.'</span></td>
				</tr>
			</table>
			<table class="inventory" style="clear: both; width: 100%; margin: 0 0 3em; font-size: 75%; table-layout: fixed; width: 100%; border-collapse: separate; border-spacing: 2px; margin: 0 0 3em; ">
				<thead>
					<tr>
						<th style="border-width: 1px; padding: 0.5em; position: relative; text-align: left; border-radius: 0.25em; border-style: solid; background: #EEE; border-color: #BBB; font-weight: bold; text-align: center;"><span >Item</span></th>
						<th style="border-width: 1px; padding: 0.5em; position: relative; text-align: left; border-radius: 0.25em; border-style: solid; background: #EEE; border-color: #BBB; font-weight: bold; text-align: center;"><span >Description</span></th>
						
						<th style="border-width: 1px; padding: 0.5em; position: relative; text-align: left; border-radius: 0.25em; border-style: solid; background: #EEE; border-color: #BBB; font-weight: bold; text-align: center;"><span >Quantity</span></th>
						<th style="border-width: 1px; padding: 0.5em; position: relative; text-align: left; border-radius: 0.25em; border-style: solid; background: #EEE; border-color: #BBB; font-weight: bold; text-align: center;"><span >Price</span></th><th style="border-width: 1px; padding: 0.5em; position: relative; text-align: left; border-radius: 0.25em; border-style: solid; background: #EEE; border-color: #BBB; font-weight: bold; text-align: center;"><span >Total</span></th>
					</tr>
				</thead>
				<tbody>
					'.$html.'
				</tbody>
			</table>
			<a class="add">+</a>
			<table class="balance" style="float: right; width: 36%; font-size: 75%; table-layout: fixed; width: 30%; border-collapse: separate; border-spacing: 2px; margin: 0 0 3em; ">
				<tr>
					<th style="border-width: 1px; padding: 0.5em; position: relative; text-align: left; border-radius: 0.25em; border-style: solid; background: #EEE; border-color: #BBB; width: 50%; "><span >Total</span></th>
					<td style="border-width: 1px; padding: 0.5em; position: relative; text-align: left; border-radius: 0.25em; border-style: solid; border-color: #DDD; width: 50%;"><span data-prefix>$</span><span>'.$net_amount.'</span></td>
				</tr>
				<tr>
					<th style="border-width: 1px; padding: 0.5em; position: relative; text-align: left; border-radius: 0.25em; border-style: solid; background: #EEE; border-color: #BBB; width: 50%; "><span >Amount Paid</span></th>
					<td style="border-width: 1px; padding: 0.5em; position: relative; text-align: left; border-radius: 0.25em; border-style: solid; border-color: #DDD; width: 50%;"><span data-prefix>$</span><span >0.00</span></td>
				</tr>
				<tr>
					<th style="border-width: 1px; padding: 0.5em; position: relative; text-align: left; border-radius: 0.25em; border-style: solid; background: #EEE; border-color: #BBB; width: 50%; "><span >Balance Due</span></th>
					<td style="border-width: 1px; padding: 0.5em; position: relative; text-align: left; border-radius: 0.25em; border-style: solid; border-color: #DDD; width: 50%;"><span data-prefix>$</span><span>'.$net_amount.'</span></td>
				</tr>
			</table>
		</article>
		<aside style="margin: 0 0 3em; margin-top: 400px;">
			<h1 style="border: none; border-width: 0 0 1px; margin: 0 0 1em; border-color: #999; border-bottom-style: solid;"><span >Additional Notes</span></h1>
			<div >
				<p>A finance charge of 1.5% will be made on unpaid balances after 30 days.</p>
			</div>
		</aside>
	</body>
</html>
';
$mail->AltBody = "This is the plain text version of the email content";

try {
    $mail->send();
    echo '<html style="border: 0;
	box-sizing: content-box;
	color: inherit;
	font-family: inherit;
	font-size: inherit;
	font-style: inherit;
	font-weight: inherit;
	line-height: inherit;
	list-style: none;
	margin: 0;
	padding: 0;
	text-decoration: none;
	vertical-align: top; font: 16px/1 "Open Sans", sans-serif; overflow: auto; padding: 0.5in;
background: #999; cursor: default; ">
	<head>
		<meta charset="utf-8">
		<title>Invoice</title>
		<link rel="stylesheet" href="style.css">
		<link rel="license" href="https://www.opensource.org/licenses/mit-license/">
		<script src="script.js"></script>
	</head>
	<body style=" box-sizing: border-box; height: 11in; margin: 0 auto; overflow: hidden; padding: 0.5in; width: 8.5in; background: #FFF; border-radius: 1px; box-shadow: 0 0 1in -0.25in rgba(0, 0, 0, 0.5);  ">
		<header>
			<h1 style="font: bold 100% sans-serif; letter-spacing: 0.5em; text-align: center; text-transform: uppercase; background: #000; border-radius: 0.25em; color: #FFF; margin: 0 0 1em; padding: 0.5em 0;">Invoice</h1>
			<address style="float: left; font-size: 75%; font-style: normal; line-height: 1.25; margin: 0 1em 1em 0; margin: 0 0 3em; ">
				<p style="margin: 0 0 0.25em; ">SHIP ME SOlUTIONS LLC</p>
				<p style="margin: 0 0 0.25em;  ">1581 W 49 St #120</p>
				<p style="margin: 0 0 0.25em; ">Hialaeh, FL 33012</p>
				<p style="margin: 0 0 0.25em; ">+3056469899</p>
			</address>
			<br>
			<br>
			<br>
			<br>
			<address style="float: right; font-size: 75%; font-style: normal; line-height: 1.25;  
  align-content: left; margin: 0 1em 1em 0;">
			    <p style="margin: 0 0 0.25em; ">'.$customer_name.'</p>
				<p style="margin: 0 0 0.25em; ">'.$customer_num.'</p>
				<p style="margin: 0 0 0.25em; ">'.$address.'</p>
			</address>
			<span style="display: block; float: right; margin: 0 0 1em 1em; max-height: 25%; max-width: 60%; position: relative;"></span>
		</header>
		<article style="margin: 0 0 3em; clear: both; content: ""; display: table;">
			<h1 style="clip: rect(0 0 0 0); position: absolute; "></h1>
			<address style="float: left; font-size: 125%; font-weight: bold;">
				
			</address>
			<table class="meta" style="font-size: 75%; table-layout: fixed; width: 30%; border-collapse: separate; border-spacing: 2px; margin: 0 0 3em; float: right; width: 36%; margin: 0 0 3em;">
				<tr>
					<th style="border-width: 1px; padding: 0.5em; position: relative; text-align: left; border-radius: 0.25em; border-style: solid; background: #EEE; border-color: #BBB; width: 40%; "><span >Invoice #</span></th>
					<td style="border-width: 1px; padding: 0.5em; position: relative; text-align: left; border-radius: 0.25em; border-style: solid; border-color: #DDD; width: 60%;"><span >'.$invoice_no.'</span></td>
				</tr>
				<tr>
					<th style="border-width: 1px; padding: 0.5em; position: relative; text-align: left; border-radius: 0.25em; border-style: solid; background: #EEE; border-color: #BBB; width: 40%;"><span >Date</span></th>
					<td style="border-width: 1px; padding: 0.5em; position: relative; text-align: left; border-radius: 0.25em; border-style: solid; border-color: #DDD; width: 60%;"><span >'.$invoice_date.'</span></td>
				</tr>
				<tr>
					<th style="border-width: 1px; padding: 0.5em; position: relative; text-align: left; border-radius: 0.25em; border-style: solid; background: #EEE; border-color: #BBB; width: 40%;"><span >Amount Due</span></th>
					<td style="border-width: 1px; padding: 0.5em; position: relative; text-align: left; border-radius: 0.25em; border-style: solid; border-color: #DDD; width: 60%;"><span id="prefix" >$</span><span>'.$net_amount.'</span></td>
				</tr>
			</table>
			<table class="inventory" style="clear: both; width: 100%; margin: 0 0 3em; font-size: 75%; table-layout: fixed; width: 100%; border-collapse: separate; border-spacing: 2px; margin: 0 0 3em; ">
				<thead>
					<tr>
						<th style="border-width: 1px; padding: 0.5em; position: relative; text-align: left; border-radius: 0.25em; border-style: solid; background: #EEE; border-color: #BBB; font-weight: bold; text-align: center;"><span >Item</span></th>
						<th style="border-width: 1px; padding: 0.5em; position: relative; text-align: left; border-radius: 0.25em; border-style: solid; background: #EEE; border-color: #BBB; font-weight: bold; text-align: center;"><span >Description</span></th>
						
						<th style="border-width: 1px; padding: 0.5em; position: relative; text-align: left; border-radius: 0.25em; border-style: solid; background: #EEE; border-color: #BBB; font-weight: bold; text-align: center;"><span >Quantity</span></th>
						<th style="border-width: 1px; padding: 0.5em; position: relative; text-align: left; border-radius: 0.25em; border-style: solid; background: #EEE; border-color: #BBB; font-weight: bold; text-align: center;"><span >Price</span></th><th style="border-width: 1px; padding: 0.5em; position: relative; text-align: left; border-radius: 0.25em; border-style: solid; background: #EEE; border-color: #BBB; font-weight: bold; text-align: center;"><span >Total</span></th>
					</tr>
				</thead>
				<tbody>
					'.$html.'
				</tbody>
			</table>
			<a class="add">+</a>
			<table class="balance" style="float: right; width: 36%; font-size: 75%; table-layout: fixed; width: 30%; border-collapse: separate; border-spacing: 2px; margin: 0 0 3em; ">
				<tr>
					<th style="border-width: 1px; padding: 0.5em; position: relative; text-align: left; border-radius: 0.25em; border-style: solid; background: #EEE; border-color: #BBB; width: 50%; "><span >Total</span></th>
					<td style="border-width: 1px; padding: 0.5em; position: relative; text-align: left; border-radius: 0.25em; border-style: solid; border-color: #DDD; width: 50%;"><span data-prefix>$</span><span>'.$net_amount.'</span></td>
				</tr>
				<tr>
					<th style="border-width: 1px; padding: 0.5em; position: relative; text-align: left; border-radius: 0.25em; border-style: solid; background: #EEE; border-color: #BBB; width: 50%; "><span >Amount Paid</span></th>
					<td style="border-width: 1px; padding: 0.5em; position: relative; text-align: left; border-radius: 0.25em; border-style: solid; border-color: #DDD; width: 50%;"><span data-prefix>$</span><span >0.00</span></td>
				</tr>
				<tr>
					<th style="border-width: 1px; padding: 0.5em; position: relative; text-align: left; border-radius: 0.25em; border-style: solid; background: #EEE; border-color: #BBB; width: 50%; "><span >Balance Due</span></th>
					<td style="border-width: 1px; padding: 0.5em; position: relative; text-align: left; border-radius: 0.25em; border-style: solid; border-color: #DDD; width: 50%;"><span data-prefix>$</span><span>'.$net_amount.'</span></td>
				</tr>
			</table>
		</article>
		<aside style="margin: 0 0 3em; margin-top: 400px;">
			<h1 style="border: none; border-width: 0 0 1px; margin: 0 0 1em; border-color: #999; border-bottom-style: solid;"><span >Additional Notes</span></h1>
			<div >
				<p>A finance charge of 1.5% will be made on unpaid balances after 30 days.</p>
			</div>
		</aside>
	</body>
</html>';
} catch (Exception $e) {
    echo "Mailer Error: " . $mail->ErrorInfo;
}
?>


