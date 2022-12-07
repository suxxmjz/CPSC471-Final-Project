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
			$_SESSION['select_flight'] = $_POST['select_flight'];
			$flight_no = $_POST['select_flight'];
			$user_name = $_SESSION['login_user'];
			require_once('Database Connection file/mysqli_connect.php');
			$query="SELECT SeatNumber,PassengerID FROM seat where FlightNumber = ?";
			$stmt=mysqli_prepare($dbc,$query);
			mysqli_stmt_bind_param($stmt,"s", $flight_no);
			mysqli_stmt_execute($stmt);
			mysqli_stmt_bind_result($stmt,$SeatNumber,$PassengerID);
			mysqli_stmt_store_result($stmt);
			//$pass_name=array();
			echo "<h2>BOOK THE TICKET</h2>";
			$query2 = "SELECT COUNT(*) FROM customer WHERE CustomerEmail = ?";
			$stmt2 = mysqli_prepare($dbc, $query2);
			mysqli_stmt_bind_param($stmt2,"s", $user_name);
			mysqli_stmt_execute($stmt2);
			mysqli_stmt_bind_result($stmt2,$customer);
			mysqli_stmt_fetch($stmt2);
			if ($customer == 1) {
                echo "<form action=\"add_ticket_details_form_handler_for_package.php\" method=\"post\">";
                echo "<p><strong>Enter the package information<strong></p>";
                echo "<table cellpadding=\"10\">";
                echo "<tr>";
                echo "<td class=\"fix_table_short\">Weight(kg)</td>";
                echo "<td class=\"fix_table_short\">Receiver Name</td>";
                echo "<td class=\"fix_table_short\">Sender Name</td>";	
                echo "</tr>";
                echo "<tr>";
                echo "<td class=\"fix_table_short\"><input type=\"number\" min=\"1\" max=\"99\" name=\"weight\" required></td>";
                echo "<td class=\"fix_table_short\"><input type=\"text\" name=\"receiver_name\" required></td>";
                echo "<td class=\"fix_table_short\"><input type=\"text\" name=\"sender_name\" required></td>";
                echo "<td class=\"fix_table_short\">";
                echo "</td>";
                echo "</tr>";
                echo "</table>";
                echo "<input type=\"submit\" value=\"Submit Information\" name=\"Select\">";
                echo "</form>";
            }
            else {
                echo "<form action=\"add_customer_details_for_package.php\" method=\"post\">";
                echo "<p><strong>Enter the package information<strong></p>";
                echo "<table cellpadding=\"10\">";
                echo "<tr>";
                echo "<td class=\"fix_table_short\">Weight(kg)</td>";
                echo "<td class=\"fix_table_short\">Receiver Name</td>";
                echo "<td class=\"fix_table_short\">Sender Name</td>";	
                echo "</tr>";
                echo "<tr>";
                echo "<td class=\"fix_table_short\"><input type=\"number\" min=\"1\" max=\"99\" name=\"weight\" required></td>";
                echo "<td class=\"fix_table_short\"><input type=\"text\" name=\"receiver_name\" required></td>";
                echo "<td class=\"fix_table_short\"><input type=\"text\" name=\"sender_name\" required></td>";
                echo "<td class=\"fix_table_short\">";
                echo "</td>";
                echo "</tr>";
                echo "</table>";
                echo "<input type=\"submit\" value=\"Submit Information\" name=\"Select\">";
                echo "</form>";


            }
		?>

	</body>
</html>