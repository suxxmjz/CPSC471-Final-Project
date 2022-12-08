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
				<li><a href="admin_homepage.php"><i class="fa fa-desktop" aria-hidden="true"></i> Dashboard</a></li>
				<li><a href="logout_handler.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a></li>
			</ul>
		</div>
		<?php
        $_SESSION['select_ticket'] = $_POST['select_ticket'];
        $TicketID = $_POST['select_ticket'];
        require_once('Database Connection file/mysqli_connect.php');
        $query="SELECT PassengerID, PackageID FROM tickettype where TicketID = ?";
        $stmt=mysqli_prepare($dbc,$query);
        mysqli_stmt_bind_param($stmt,"i", $TicketID);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $PassengerID, $PackageID);
        mysqli_stmt_store_result($stmt);
        mysqli_stmt_fetch($stmt);
        if (empty($PassengerID)) {
            $_SESSION['pack_id'] = $PackageID;
            echo "<script> location.href='admin_change_packet.php'; </script>";
        }	
        else {
            $_SESSION['pass_id'] = $PassengerID;
            echo "<script> location.href='admin_change_passenger.php'; </script>";
        }
        mysqli_stmt_close($stmt);
        mysqli_close($dbc);       
		?>
	</body>
</html>