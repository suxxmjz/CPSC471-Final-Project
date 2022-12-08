<!-- NOT IMPLEMENTED YET -->
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
    			margin: 0px 390px
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
        <h2>Address Change Confirmation</h2>
		<?php
        //parse building number 
            $user_name = $_SESSION['login_user'];
            $newBNum = $_POST['building_num'];
            $newCom = $_POST['community'];
            $newCity = $_POST['city'];
            $newProv = $_POST['province'];
			require_once('Database Connection file/mysqli_connect.php');
            if (!empty($newBNum)) {
                $query = "UPDATE customer SET BuildingNum = ? WHERE CustomerEmail = ?";
                $stmt=mysqli_prepare($dbc,$query);
                mysqli_stmt_bind_param($stmt,"ss", $newBNum, $user_name);
                mysqli_stmt_execute($stmt);
                echo "<p><strong> Changed Building Number to " .$newBNum. "<strong></p>";
            }
            if (!empty($newCom)) {
                $query = "UPDATE customer SET Community = ? WHERE CustomerEmail = ?";
                $stmt=mysqli_prepare($dbc,$query);
                mysqli_stmt_bind_param($stmt,"ss", $newCom, $user_name);
                mysqli_stmt_execute($stmt);
                echo "<p><strong> Changed Community to " .$newCom. "<strong></p>";
            }
            if (!empty($newCity)) {
                $query = "UPDATE customer SET City = ? WHERE CustomerEmail = ?";
                $stmt=mysqli_prepare($dbc,$query);
                mysqli_stmt_bind_param($stmt,"ss", $newCity, $user_name);
                mysqli_stmt_execute($stmt);
                echo "<p><strong> Changed City to " .$newCity. "<strong></p>";
            }
            if (!empty($newProv)) {
                $query = "UPDATE customer SET Province = ? WHERE CustomerEmail = ?";
                $stmt=mysqli_prepare($dbc,$query);
                mysqli_stmt_bind_param($stmt,"ss", $newProv, $user_name);
                mysqli_stmt_execute($stmt);
                echo "<p><strong> Changed Province to " .$newProv. "<strong></p>";
            }
                ?>
            </body>
</html>