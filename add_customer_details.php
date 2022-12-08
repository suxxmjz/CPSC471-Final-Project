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
			$_SESSION['select_seat'] = trim($_POST['select_seat']);
			$_SESSION['pass_id'] = trim($_POST['pass_id']);
			$_SESSION['pass_name'] = trim($_POST['pass_name']);
			$_SESSION['pass_age'] = trim($_POST['pass_age']);
            echo "<form action=\"add_customer_details_handler.php\" method=\"post\">";
            echo "<p><strong>Signup as Customer<strong></p>";
            echo "<p><strong>Enter your information<strong></p>";
            echo "<table cellpadding=\"10\">";
            echo "<tr>";
            echo "<td class=\"fix_table_short\">Phone Number</td>";
            echo "<td class=\"fix_table_short\">Building Number</td>";
            echo "<td class=\"fix_table_short\">Community</td>";	
            echo "</tr>";
            echo "<tr>";
            echo "<td class=\"fix_table_short\"><input type=\"number\" min=\"1000000000\" max=\"9999999999\" name=\"phone_number\" required></td>";
            echo "<td class=\"fix_table_short\"><input type=\"number\" min=\"1\" max=\"9999\" name=\"building_number\" required></td>";
            echo "<td class=\"fix_table_short\"><input type=\"text\" name=\"community\" required></td>";
            echo "<td class=\"fix_table_short\">";
            echo "</td>";
            echo "</tr>";
            echo "<tr>";
            echo "<td class=\"fix_table_short\">City</td>";
            echo "<td class=\"fix_table_short\">Province</td>";
            echo "</tr>";
            echo "<tr>";
            echo "<td class=\"fix_table_short\"><input type=\"text\" name=\"customer_city\" required></td>";
            echo "<td class=\"fix_table_short\"><input type=\"text\" name=\"customer_province\" required></td>";
            echo "<td class=\"fix_table_short\">";
            echo "</td>";
            echo "</tr>";

            echo "</table>";
            echo "<input type=\"submit\" value=\"Submit Information\" name=\"Select\">";
            echo "</form>";
		?>

	</body>
</html>