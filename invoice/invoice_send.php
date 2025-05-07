
<html style="border: 0;
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
	vertical-align: top; font: 16px/1 'Open Sans', sans-serif; overflow: auto; padding: 0.5in;
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
				<p style="margin: 0 0 0.25em; ">Jonathan Neal</p>
				<p style="margin: 0 0 0.25em;  ">101 E. Chapman Ave<br>Orange, CA 92866</p>
				<p style="margin: 0 0 0.25em; ">(800) 555-1234</p>
			</address>
			<span style="display: block; float: right; margin: 0 0 1em 1em; max-height: 25%; max-width: 60%; position: relative;"><img style="display: block; float: right; max-height: 100%; max-width: 100%;" alt="" src="http://www.jonathantneal.com/examples/invoice/logo.png"></span>
		</header>
		<article style="margin: 0 0 3em; clear: both; content: ""; display: table;">
			<h1 style="clip: rect(0 0 0 0); position: absolute; ">Recipient</h1>
			<address style="float: left; font-size: 125%; font-weight: bold;">
				<p>Some Company<br>c/o Some Guy</p>
			</address>
			<table class="meta" style="font-size: 75%; table-layout: fixed; width: 30%; border-collapse: separate; border-spacing: 2px; margin: 0 0 3em; float: right; width: 36%; margin: 0 0 3em;">
				<tr>
					<th style="border-width: 1px; padding: 0.5em; position: relative; text-align: left; border-radius: 0.25em; border-style: solid; background: #EEE; border-color: #BBB; width: 40%; "><span >Invoice #</span></th>
					<td style="border-width: 1px; padding: 0.5em; position: relative; text-align: left; border-radius: 0.25em; border-style: solid; border-color: #DDD; width: 60%;"><span >101138</span></td>
				</tr>
				<tr>
					<th style="border-width: 1px; padding: 0.5em; position: relative; text-align: left; border-radius: 0.25em; border-style: solid; background: #EEE; border-color: #BBB; width: 40%;"><span >Date</span></th>
					<td style="border-width: 1px; padding: 0.5em; position: relative; text-align: left; border-radius: 0.25em; border-style: solid; border-color: #DDD; width: 60%;"><span >January 1, 2012</span></td>
				</tr>
				<tr>
					<th style="border-width: 1px; padding: 0.5em; position: relative; text-align: left; border-radius: 0.25em; border-style: solid; background: #EEE; border-color: #BBB; width: 40%;"><span >Amount Due</span></th>
					<td style="border-width: 1px; padding: 0.5em; position: relative; text-align: left; border-radius: 0.25em; border-style: solid; border-color: #DDD; width: 60%;"><span id="prefix" >$</span><span>600.00</span></td>
				</tr>
			</table>
			<table class="inventory" style="clear: both; width: 100%; margin: 0 0 3em; font-size: 75%; table-layout: fixed; width: 100%; border-collapse: separate; border-spacing: 2px; margin: 0 0 3em; ">
				<thead>
					<tr>
						<th style="border-width: 1px; padding: 0.5em; position: relative; text-align: left; border-radius: 0.25em; border-style: solid; background: #EEE; border-color: #BBB; font-weight: bold; text-align: center;"><span >Item</span></th>
						<th style="border-width: 1px; padding: 0.5em; position: relative; text-align: left; border-radius: 0.25em; border-style: solid; background: #EEE; border-color: #BBB; font-weight: bold; text-align: center;"><span >Description</span></th>
						<th style="border-width: 1px; padding: 0.5em; position: relative; text-align: left; border-radius: 0.25em; border-style: solid; background: #EEE; border-color: #BBB; font-weight: bold; text-align: center;"><span >Rate</span></th>
						<th style="border-width: 1px; padding: 0.5em; position: relative; text-align: left; border-radius: 0.25em; border-style: solid; background: #EEE; border-color: #BBB; font-weight: bold; text-align: center;"><span >Quantity</span></th>
						<th style="border-width: 1px; padding: 0.5em; position: relative; text-align: left; border-radius: 0.25em; border-style: solid; background: #EEE; border-color: #BBB; font-weight: bold; text-align: center;"><span >Price</span></th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td style="border-width: 1px; padding: 0.5em; position: relative; text-align: left; border-radius: 0.25em; border-style: solid; border-color: #DDD;"><a class="cut">-</a><span >Front End Consultation</span></td>
						<td style="border-width: 1px; padding: 0.5em; position: relative; text-align: left; border-radius: 0.25em; border-style: solid; border-color: #DDD;"><span >Experience Review</span></td>
						<td style="border-width: 1px; padding: 0.5em; position: relative; text-align: left; border-radius: 0.25em; border-style: solid; border-color: #DDD;"><span data-prefix>$</span><span >150.00</span></td>
						<td style="border-width: 1px; padding: 0.5em; position: relative; text-align: left; border-radius: 0.25em; border-style: solid; border-color: #DDD;"><span >4</span></td>
						<td style="border-width: 1px; padding: 0.5em; position: relative; text-align: left; border-radius: 0.25em; border-style: solid; border-color: #DDD;"><span data-prefix>$</span><span>600.00</span></td>
					</tr>
				</tbody>
			</table>
			<a class="add">+</a>
			<table class="balance" style="float: right; width: 36%; font-size: 75%; table-layout: fixed; width: 30%; border-collapse: separate; border-spacing: 2px; margin: 0 0 3em; ">
				<tr>
					<th style="border-width: 1px; padding: 0.5em; position: relative; text-align: left; border-radius: 0.25em; border-style: solid; background: #EEE; border-color: #BBB; width: 50%; "><span >Total</span></th>
					<td style="border-width: 1px; padding: 0.5em; position: relative; text-align: left; border-radius: 0.25em; border-style: solid; border-color: #DDD; width: 50%;"><span data-prefix>$</span><span>600.00</span></td>
				</tr>
				<tr>
					<th style="border-width: 1px; padding: 0.5em; position: relative; text-align: left; border-radius: 0.25em; border-style: solid; background: #EEE; border-color: #BBB; width: 50%; "><span >Amount Paid</span></th>
					<td style="border-width: 1px; padding: 0.5em; position: relative; text-align: left; border-radius: 0.25em; border-style: solid; border-color: #DDD; width: 50%;"><span data-prefix>$</span><span >0.00</span></td>
				</tr>
				<tr>
					<th style="border-width: 1px; padding: 0.5em; position: relative; text-align: left; border-radius: 0.25em; border-style: solid; background: #EEE; border-color: #BBB; width: 50%; "><span >Balance Due</span></th>
					<td style="border-width: 1px; padding: 0.5em; position: relative; text-align: left; border-radius: 0.25em; border-style: solid; border-color: #DDD; width: 50%;"><span data-prefix>$</span><span>600.00</span></td>
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
