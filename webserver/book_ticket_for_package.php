<?php
	session_start();
?>
<html>
	<head>
		<title>
			Enter Travel/Ticket Details
		</title>
		<style>
			input {
    			border: 1.5px solid #dd6a1fa1;
    			border-radius: 4px;
    			padding: 7px 10px;
			}
			input[type=number] {
    			border: 1.5px solid #dd6a1fa1;
    			border-radius: 4px;
    			padding: 7px 0px;
			}
			input[type=submit] {
				background-color: #dd6a1fa1;
				color: white;
    			border-radius: 4px;
    			padding: 7px 45px;
    			margin: 0px 500px
			}
			input[type=radio] {
    			margin-right: 30px;
			}
			select {
    			border: 1.5px solid #dd6a1fa1;
    			border-radius: 4px;
    			padding: 6.5px 15px;
			}
			table {
			 border-collapse: collapse; 
			}
			tr/*:nth-child(3)*/ {
			 border: solid thin;
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
		<?php
    		echo "<h2>BOOK THE TICKET</h2>";                    
            $query2 = "SELECT COUNT(*) FROM customer WHERE CustomerEmail = ?";
            $stmt2 = mysqli_prepare($dbc, $query2);
            mysqli_stmt_bind_param($stmt2,"s", $user_name);
            mysqli_stmt_execute($stmt2);
            mysqli_stmt_bind_result($stmt2,$customer);
            mysqli_stmt_fetch($stmt2);
            if ($customer == 1) {
                $_SESSION['select_flight'] = $_POST['select_flight'];
                $flight_no = $_POST['select_flight'];
                require_once('Database Connection file/mysqli_connect.php');
                echo "<form action=\"book_tickets_for_package_handler.php\" method=\"post\">";
                echo "<p><strong>Package Infomation<strong></p>";
                echo "<table cellpadding=\"10\">";
                echo "<tr>";
                echo "<td class=\"fix_table_short\">Weight(kg)</td>";
                echo "<td class=\"fix_table_short\">Receiver Name</td>";
                echo "<td class=\"fix_table_short\">Sender Name</td>";	
                echo "</tr>";
                echo "<tr>";
                echo "<td class=\"fix_table_short\"><input type=\"number\" name=\"weight\" required></td>";
                echo "<td class=\"fix_table_short\"><input type=\"text\" name=\"receiver_name\" required></td>";
                echo "<td class=\"fix_table_short\"><input type=\"text\" name=\"sender_name\" required></td>";
                echo "<td class=\"fix_table_short\">";
                echo "</td>";
                echo "</tr>";
                echo "</table>";
                echo "<input type=\"submit\" value=\"Submit Package\" name=\"Select\">";
                echo "</form>";
            }
            else
            {
                $_SESSION['select_flight'] = $_POST['select_flight'];
                $flight_no = $_POST['select_flight'];
                require_once('Database Connection file/mysqli_connect.php');
                echo "<form action=\"add_customer_details_for_package.php\" method=\"post\">";
                echo "<p><strong>Package Infomation<strong></p>";
                echo "<table cellpadding=\"10\">";
                echo "<tr>";
                echo "<td class=\"fix_table_short\">Weight</td>";
                echo "<td class=\"fix_table_short\">Receiver Name</td>";
                echo "<td class=\"fix_table_short\">Sender Name</td>";	
                echo "</tr>";
                echo "<tr>";
                echo "<td class=\"fix_table_short\"><input type=\"number\" name=\"weight\" required></td>";
                echo "<td class=\"fix_table_short\"><input type=\"text\" name=\"receiver_name\" required></td>";
                echo "<td class=\"fix_table_short\"><input type=\"text\" name=\"sender_name\" required></td>";
                echo "<td class=\"fix_table_short\">";
                echo "</td>";
                echo "</tr>";
                echo "</table>";
                echo "<input type=\"submit\" value=\"Submit Package\" name=\"Select\">";
                echo "</form>";            
            }
		?>

	</body>
</html>
<?php
	session_start();
?>
<html>
	<head>
		<title>
			View Available Flights
		</title>
		<style>
			input {
    			border: 1.5px solid #dd6a1fa1;
    			border-radius: 4px;
    			padding: 7px 30px;
			}
			input[type=submit] {
				background-color: #dd6a1fa1;
				color: white;
    			border-radius: 4px;
    			padding: 7px 45px;
    			margin: 0px 127px
			}
			input[type=date] {
				border: 1.5px solid #dd6a1fa1;
    			border-radius: 4px;
    			padding: 5.5px 44.5px;
			}
			select {
    			border: 1.5px solid #dd6a1fa1;
    			border-radius: 4px;
    			padding: 6.5px 75.5px;
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
				<li><a href="customer_homepage.php"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
				<li><a href="customer_homepage.php"><i class="fa fa-desktop" aria-hidden="true"></i> Dashboard</a></li>
				<li><a href="logout_handler.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a></li>
			</ul>
		</div>
		<form action="view_flights_form_handler_for_package.php" method="post">
			<h2>SEARCH FOR AVAILABLE FLIGHTS</h2>
			<table cellpadding="5">
				<tr>
					<td class="fix_table">Enter the Origin</td>
					<td class="fix_table">Enter the Destination</td>
				</tr>
				<tr>
					<td class="fix_table">
						<input list="origins" name="origin" placeholder="From" required>
  						<datalist id="origins">
  						  	<option value="Calgary Airport">
							<option value="Vancouver Airport">
							<option value="Toronto Airport">
							<option value="Montreal Airport">

  						</datalist>
						<!-- <input type="text" name="origin" placeholder="From" required> --></td>
					<td class="fix_table">
						<input list="destinations" name="destination" placeholder="To" required>
  						<datalist id="destinations">
  						  	<option value="Calgary Airport">
							<option value="Vancouver Airport">
							<option value="Toronto Airport">
							<option value="Montreal Airport">
  						</datalist>
						<!-- <input type="text" name="destination" placeholder="To" required> --></td>
				</tr>
			</table>
			<br>
			<table cellpadding="5">
				<tr>
					<td class="fix_table">Enter the Departure Date</td>
				</tr>
				<tr>
					<td class="fix_table"><input type="date" name="dep_date" min=
						<?php 
							$todays_date=date('Y-m-d'); 
							echo $todays_date;
						?> 
						max=
						<?php 
							$max_date=date_create(date('Y-m-d'));
							date_add($max_date,date_interval_create_from_date_string("90 days")); 
							echo date_format($max_date,"Y-m-d");
						?> required></td>
				</tr>
			</table>
			<br>
			<br>
			<input type="submit" value="Search for Available Flights" name="Search">
		</form>
	</body>
</html>