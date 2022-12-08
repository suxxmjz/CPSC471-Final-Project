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
			$user_name = $_SESSION['login_user'];
			$phone_number = trim($_POST['phone_number']);
			$building_number = trim($_POST['building_number']);
			$community = trim($_POST['community']);
			$city = trim($_POST['customer_city']);
			$province = trim($_POST['customer_province']);
			require_once('Database Connection file/mysqli_connect.php');
			$query= "INSERT INTO customer(CustomerEmail, PhoneNumber, Province, City, BuildingNum, Community) VALUES (?,?,?,?,?,?)";
			$stmt=mysqli_prepare($dbc,$query);
			mysqli_stmt_bind_param($stmt,"sissis",$user_name, $phone_number, $province, $city, $building_number, $community);
			mysqli_stmt_execute($stmt);	
			echo "<h2>Congrats you are now a customer " .$user_name. "</h2>";
			echo "<form action=\"add_ticket_details_form_handler.php\" method=\"post\">";
            echo "<input type=\"submit\" value=\"Continue to Book your Ticket\" name=\"Select\">";
            echo "</form>";	
		?>

	</body>
</html>