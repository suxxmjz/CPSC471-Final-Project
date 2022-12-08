<?php
	session_start();
	// if($_SESSION['login_user']==null){
	// 	header('location:home_page.php');
	// }
?>
<html>
	<head>
		<title>
			Welcome Customer
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
				<!-- <li><a href="customer_homepage.php"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li> -->
				<li><a href="customer_homepage.php"><i class="fa fa-desktop" aria-hidden="true"></i> Dashboard</a></li>
				<li><a href="logout_handler.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a></li>
			</ul>
		</div>
		<?php
			echo "<h2>Hey ".$_SESSION['login_user']."✈!</h2>";
		?>
		<table cellpadding="5">
			<tr>
				<td class="admin_func"><a href="book_tickets.php"><i class="fa fa-plane" aria-hidden="true"></i> Book Passenger Flight Tickets</a>
				</td>
			</tr>
			<tr>
				<td class="admin_func"><a href="book_tickets_for_package.php"><i class="fa fa-plane" aria-hidden="true"></i> Book Package Flight Tickets</a>
				</td>
			</tr>
			 <tr>
				<td class="admin_func"><a href="view_booked_tickets.php"><i class="fa fa-plane" aria-hidden="true"></i> View Or Change Booked Tickets</a>
				</td>
			</tr> 
			<tr>
				<td class="admin_func"><a href="cancel_booked_tickets.php"><i class="fa fa-plane" aria-hidden="true"></i> Cancel Booked Tickets</a>
				</td>
			</tr>
			<tr>
				<td class="admin_func"><a href="user_change_user_information.php"><i class="fa fa-plane" aria-hidden="true"></i> Change Account Information</a>
				</td>
			</tr>
		</table>
		<!--Following data fields were empty!
			...
			
			ADD VIEW FLIGHT DETAILS AND VIEW JETS/ASSETS DETAILS for ADMIN
			PREDEFINED LOCATION WHEN BOOKING TICKETS

		-->
	</body>
</html>