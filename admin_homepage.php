<?php
	session_start();
?>
<html>
	<head>
		<title>
			Welcome Administrator
		</title>
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
				<!-- <li><a href="admin_home.php"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li> -->
				<li><a href="admin_homepage.php"><i class="fa fa-desktop" aria-hidden="true"></i> Dashboard</a></li>
				<li><a href="logout_handler.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a></li>
			</ul>
		</div>
		<h2>Welcome Administrator!</h2>
		<table cellpadding="5">
			
			<!-- <tr>
				<td class="admin_func"><a href="admin_view_booked_tickets.php"><i class="fa fa-plane" aria-hidden="true"></i> View List of Booked Tickets for a Flight</a>
				</td>
			</tr> -->
			 <tr>
				<td class="admin_func"><a href="admin_view_all.php"><i class="fa fa-plane" aria-hidden="true"></i> View Or Change Tickets for Flight</a>
				</td>
			</tr>
			<tr>
				<td class="admin_func"><a href="view_user_information_and_tickets.php"><i class="fa fa-plane" aria-hidden="true"></i> View or Change User Tickets</a>
				</td>
			</tr>
			<tr>
				<td class="admin_func"><a href="admin_cancel_booked_tickets.php"><i class="fa fa-plane" aria-hidden="true"></i> Cancel Booked Ticket</a>
				</td>
			</tr>
			<tr>
				<td class="admin_func"><a href="view_flight_details.php"><i class="fa fa-plane" aria-hidden="true"></i> View Flight Schedule Details</a>
				</td>
			</tr>

			<tr>
				<td class="admin_func"><a href="add_flight_details.php"><i class="fa fa-plane" aria-hidden="true"></i> Add Flight Schedule Details</a>
				</td>
			</tr>
			<tr>
				<td class="admin_func"><a href="delete_flight_details.php"><i class="fa fa-plane" aria-hidden="true"></i> Delete Flight Schedule Details</a>
				</td>
			</tr>
			<tr>
				<td class="admin_func"><a href="change_flight_details.php"><i class="fa fa-plane" aria-hidden="true"></i> Change Flight Schedule Details</a>
				</td>
			</tr>
			<tr>
				<td class="admin_func"><a href="admin_change_user.php"><i class="fa fa-plane" aria-hidden="true"></i> Change User Account Information</a>
				</td>
			</tr>
			
		</table>
	</body>
</html>