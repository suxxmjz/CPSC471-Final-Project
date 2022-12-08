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
				<li><a href="home_page.php"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
				<li><a href="customer_homepage.php"><i class="fa fa-desktop" aria-hidden="true"></i> Dashboard</a></li>
				<li><a href="logout_handler.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a></li>
			</ul>
		</div>
        <h2>Change Package Confimration</h2>
		<?php
        $TicketID = $_SESSION['select_ticket'];
        require_once('Database Connection file/mysqli_connect.php');
        $query ="SELECT PackageID FROM tickettype WHERE TicketID = ?";
        $stmt=mysqli_prepare($dbc,$query);
        mysqli_stmt_bind_param($stmt,"i", $TicketID);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt,$PackageID);
        mysqli_stmt_store_result($stmt);
        mysqli_stmt_fetch($stmt);
        $PWeight = $_POST['package_weight'];
        $PRec = $_POST['package_receiver'];
        $PSend = $_POST['package_sender'];
        if (!empty($PWeight)) {
            //add input parse
            $query ="UPDATE package SET Weight = ? where PackageID = ?";
            $stmt=mysqli_prepare($dbc,$query);
            mysqli_stmt_bind_param($stmt,"ii",$PWeight, $PackageID);
            mysqli_stmt_execute($stmt);
            echo "<p><strong>Changed Package Weight to ".$PWeight. "<strong></p>";
        }
        if (!empty($PRec)) {
            $query ="UPDATE package SET ReceiverName = ? where PackageID = ?";
            $stmt=mysqli_prepare($dbc,$query);
            mysqli_stmt_bind_param($stmt,"si",$PRec, $PackageID);
            mysqli_stmt_execute($stmt);
            echo "<p><strong>Changed Package Receiver to ".$PRec. "<strong></p>";
        }
        if (!empty($PSend)) {
            $query ="UPDATE package SET SenderName = ? where PackageID = ?";
            $stmt=mysqli_prepare($dbc,$query);
            mysqli_stmt_bind_param($stmt,"si",$PSend, $PackageID);
            mysqli_stmt_execute($stmt);     
            echo "<p><strong>Changed Package Sender to ".$PSend. "<strong></p>";     
        }
    
        ?>
     </body>
</html>