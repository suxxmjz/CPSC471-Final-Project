<!-- NOT IMPLEMENTED YET -->
<?php
	session_start();
?>
<html>
	<head>
		<title>
			Enter Payment Details
		</title>
		<style>
			input {
    			border: 1.5px solid #030337;
    			border-radius: 4px;
    			padding: 7px 30px;
			}
			input[type=submit] {
				background-color: #030337;
				color: white;
    			border-radius: 4px;
    			padding: 7px 45px;
    			margin: 0px 357px
			}
		</style>
		<link rel="stylesheet" type="text/css" href="css/style.css"/>
		<link rel="stylesheet" href="font-awesome-4.7.0\css\font-awesome.min.css">
	</head>
	<body>
		<img class="logo" src="images/logo.jpg"/> 
		<h1 id="title">
			SUJACA AIRLINES
		</h1>
		<div>
			<ul>
				<!-- <li><a href="home_page.php"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li> -->
				<li><a href="customer_homepage.php"><i class="fa fa-desktop" aria-hidden="true"></i> Dashboard</a></li>
				<li><a href="logout_handler.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a></li>
			</ul>
		</div>
		<form action="payment_details_form_handler.php" method="post">
			<h2>ENTER THE PAYMENT DETAILS</h2>
			<h3 style="margin-left: 30px"><u>Payment Summary</u></h3>
			<?php
				$flight_no=$_SESSION['flight_no'];
				$journey_date=$_SESSION['journey_date'];
				$no_of_pass=$_SESSION['no_of_pass'];
		
				$payment_id=rand(100000000,999999999);
				$pnr=$_SESSION['pnr'];
				$_SESSION['payment_id']=$payment_id;
				$payment_date=date('Y-m-d'); 
				$_SESSION['payment_date']=$payment_date;


				// require_once('Database Connection File/mysqli_connect.php');
			
				// mysqli_stmt_close($stmt);
				// mysqli_close($dbc);
				$total_ticket_price=$no_of_pass*"100";
			
				
				
				$total_amount= "100";
				$_SESSION['total_amount']=$total_amount;




				echo "</table>";

				echo "<hr style='margin-right:900px; margin-left: 50px'>";
				echo "<table cellpadding=\"5\" style='margin-left: 50px'>";
				echo "<tr>";
				echo "<td class=\"fix_table\"><strong>Total:</strong></td>";
				echo "<td class=\"fix_table\">$".$total_amount."</td>";
				echo "</tr>";
				echo "</table>";
				echo "<hr style='margin-right:900px; margin-left: 50px'>";
				echo "<br>";
				echo "<p style=\"margin-left:50px\">Your Payment/Transaction ID is <strong>".$payment_id.".</strong> Please note it down for future reference.</p>";
				echo "<br>";
			?>
			<!-- <table cellpadding="5" style='margin-left: 50px'>
				<tr>
					<td class="fix_table"><strong>Enter the Payment Mode:-</strong></td>
				</tr>
				<tr>
					<td class="fix_table"><i class="fa fa-credit-card" aria-hidden="true"></i> Credit Card <input type="radio" name="payment_mode" value="credit card" checked></td>
					<td class="fix_table"><i class="fa fa-credit-card-alt" aria-hidden="true"></i> Debit Card <input type="radio" name="payment_mode" value="debit card"></td>
					<td class="fix_table"><i class="fa fa-desktop" aria-hidden="true"></i> Net Banking <input type="radio" name="payment_mode" value="net banking"></td>
				</tr>
			</table>
			<br> -->
			<input type="submit" value="Confirm" name="Pay_Now">
		</form>
	</body>
</html>