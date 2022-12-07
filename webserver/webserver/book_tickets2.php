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
				<li><a href="home_page.php"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
				<li><a href="customer_homepage.php"><i class="fa fa-desktop" aria-hidden="true"></i> Dashboard</a></li>
				<li><a href="logout_handler.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a></li>
			</ul>
		</div>
		<?php
			$flight_no=trim($_POST['select_flight']);
			$_SESSION['select_flight'] = $flight_no;
			require_once('Database Connection file/mysqli_connect.php');
			$query="SELECT SeatNumber,PassengerID,SeatType FROM seat where FlightNumber = ?";
			$stmt=mysqli_prepare($dbc,$query);
			mysqli_stmt_bind_param($stmt,"s", $flight_no);
			mysqli_stmt_execute($stmt);
			mysqli_stmt_bind_result($stmt,$SeatNumber,$PassengerID,$SeatType);
			mysqli_stmt_store_result($stmt);
			//$pass_name=array();
			echo "<h2>BOOK THE TICKET</h2>";
			echo "<form action=\"add_ticket_details_form_handler.php\" method=\"post\">";
					echo "<p><strong>PASSENGER <strong></p>";
					echo "<table cellpadding=\"10\">";
					echo "<tr>";
					echo "<td class=\"fix_table_short\">Passenger's ID Number</td>";
					echo "<td class=\"fix_table_short\">Passenger's Name</td>";
					echo "<td class=\"fix_table_short\">Passenger's Age</td>";	
					echo "</tr>";
					echo "<tr>";
					echo "<td class=\"fix_table_short\"><input type=\"text\" name=\"pass_id[]\" required></td>";
					echo "<td class=\"fix_table_short\"><input type=\"text\" name=\"pass_name[]\" required></td>";
					echo "<td class=\"fix_table_short\"><input type=\"number\" name=\"pass_age[]\" required></td>";
					echo "<td class=\"fix_table_short\">";
  					echo "</td>";
  					
					echo "</tr>";
					echo "</table>";
					/*
					echo "<h2>SELECT SEAT FOR" .$flight_no."</h2>";
					echo'<table>
					<tr>
						 <td style="vertical-align: top">
						 <table cellpadding=\"10\"
						 <tr>
						 <th>Seat Row</th>
						 <th>Seat Type</th>
						 </tr>';
						 while(mysqli_stmt_fetch($stmt)) {
							 echo "<tr>
							 <td>".$SeatNumber."</td>
							 <td>".$SeatType."</td>
							 <td><input type=\"radio\" name=\"select_seatRow\" value=\"".$SeatNumber." \"></td>
							 </tr>";
						 }
						 echo "</table> <br>";
						 echo '</td>
						 <td style="vertical-align: top">
						 <table cellpadding=\"10\"
						 <tr>
						 <th>Seat Row</th>
						 <th>Seat Type</th>
						 </tr>';
						 mysqli_stmt_bind_param($stmt,"si", $flight_no, $column);
						 mysqli_stmt_execute($stmt);
						 mysqli_stmt_bind_result($stmt,$SeatColumn,$SeatRow,$FlightNumber,$SeatType);
						 mysqli_stmt_store_result($stmt);
						 while(mysqli_stmt_fetch($stmt)) {
							 echo "<tr>
							 <td>".$SeatRow."</td>
							 <td>".$SeatType."</td>
							 <td><input type=\"radio\" name=\"select_seatRow\" value=\"".$SeatRow." \"></td>
							 </tr>";
						 }	 
						 echo '</td>
					</tr>
			   	</table> <br>
				<input type=\"submit\" value=\"Select Seat\" name=\"Select\">;
				</form>';*/
				$takenseats = array();	
				while(mysqli_stmt_fetch($stmt)) {
					array_push($takenseats,$SeatNumber);
				}
				echo '<h2>SELECT SEAT FOR ' .$flight_no. "</h2>";
				echo "<p><strong>SEATS <strong></p>";
				echo "<table cellpadding=\"10\"";
				echo '<tr>
				<th>Seat Number</th>
				<th>Seat Type</th>
				</tr>';
				for($x = 1; $x <= 20; $x++) {
					if (!(in_array($x,$takenseats))) {
						echo "<tr>
						<td>".$x."</td>
						<td> Economy </td>
						<td><input type=\"radio\" name=\"select_seat\" value=\"".$x." \"></td>
						</tr>";
					}
				}
				echo "</table> <br>";
				echo "<input type=\"submit\" value=\"Select Flight\" name=\"Select\">";
				echo "</form>";
		?>

	</body>
</html>