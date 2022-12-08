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
		<h2>VIEW BOOKED TICKETS</h2>
		<?php
					echo "<form action=\"change_ticket_redirect.php\" method=\"post\">";
							$customer_email=$_SESSION['login_user'];
							require_once('Database Connection file/mysqli_connect.php');
							$query ="SELECT TicketID, FlightNumber, PackageID, PassengerID FROM (ticket NATURAL JOIN tickettype) WHERE CustomerEmail = ?";
							$query2 ="SELECT PassengerName, PassengerAge, SeatNumber FROM (passenger NATURAL JOIN seat) WHERE PassengerID = ?";
							$query3 ="SELECT Weight,ReceiverName,SenderName FROM package WHERE PackageID = ?";
							$stmt=mysqli_prepare($dbc,$query);
							$stmt2 = mysqli_prepare($dbc, $query2);
							$stmt3 = mysqli_prepare($dbc, $query3);
							mysqli_stmt_bind_param($stmt,"s",$customer_email);
							mysqli_stmt_execute($stmt);
							mysqli_stmt_bind_result($stmt,$TicketID, $FlightNumber, $PackageID, $PassengerID);
							mysqli_stmt_store_result($stmt);
							echo "<h3>Tickets List</h3>";
							echo "<table cellpadding=\"10\"";
							echo "<tr>
							<th>Flight Number</th>
							<th>Ticket ID</th>
							<th>Ticket Type</th>
							</tr>";
							while(mysqli_stmt_fetch($stmt)) {
								if (!empty($PassengerID)) {
									mysqli_stmt_bind_param($stmt2,"s",$PassengerID);
									mysqli_stmt_execute($stmt2);
									mysqli_stmt_bind_result($stmt2, $PassengerName, $PassengerAge, $SeatNumber);
									mysqli_stmt_store_result($stmt2);	
									mysqli_stmt_fetch($stmt2);								
									echo "<tr>
									<td>".$FlightNumber."</td>
									<td>".$TicketID."</td>
									<td> Passenger </td>
									<td><input type=\"radio\" name=\"select_ticket\" value=\"".$TicketID." \"required></td>
									</tr>
									<tr>
									<td>Passenger ID ".$PassengerID."</td>
									<td>Passenger Name ".$PassengerName."</td>
									<td>Passenger Age ".$PassengerAge."</td>
									<td>Seat Number ".$SeatNumber. "</td>
									</tr>";					
								}
								else {
									mysqli_stmt_bind_param($stmt3,"s",$PackageID);
									mysqli_stmt_execute($stmt3);
									mysqli_stmt_bind_result($stmt3,$Weight, $ReceiverName, $SenderName);
									mysqli_stmt_store_result($stmt3);
									mysqli_stmt_fetch($stmt3);	
									echo "<tr>
									<td>".$FlightNumber."</td>
									<td>".$TicketID."</td>
									<td> Package </td>
									<td><input type=\"radio\" name=\"select_ticket\" value=\"".$TicketID." \"required></td>
									</tr>
									<tr>
									<td>Package ID ".$PackageID."</td>
									<td>Package Weight ".$Weight."</td>
									<td>Package Receiver ".$ReceiverName."</td>
									</tr>";		
								}
							}
							echo "</table> <br>";
							mysqli_stmt_close($stmt);
							mysqli_stmt_close($stmt2);
							mysqli_stmt_close($stmt3);
							mysqli_close($dbc);
							echo "<input type=\"submit\" value=\"Change Ticket\" name=\"Select\">";
							echo "</form>";

		?>
	</body>
</html>