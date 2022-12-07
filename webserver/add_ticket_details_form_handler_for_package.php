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
		if (!empty($_POST['weight'])) {
			$weight = trim($_POST['weight']);
			$receiver_name = trim($_POST['receiver_name']);
			$sender_name = trim($_POST['sender_name']);
			$flight_no = $_SESSION['select_flight'];
			$user_name = $_SESSION['login_user'];
		}
		else {
			$weight = $_SESSION['weight'];
			$receiver_name = $_SESSION['receiver_name'];
			$sender_name = $_SESSION['sender_name'];
			$flight_no = $_SESSION['select_flight'];
			$user_name = $_SESSION['login_user'];			
		}
			require_once('Database Connection file/mysqli_connect.php');
			$query= "INSERT INTO package (Weight, ReceiverName, SenderName) VALUES (?,?,?)";
			$stmt=mysqli_prepare($dbc,$query);
			mysqli_stmt_bind_param($stmt,"iss",$weight, $receiver_name, $sender_name,);
			mysqli_stmt_execute($stmt);	
			$query="INSERT INTO ticket (FlightNumber, CustomerEmail)VALUES (?,?)";
			$stmt=mysqli_prepare($dbc,$query);
			mysqli_stmt_bind_param($stmt,"ss", $flight_no, $user_name);
			mysqli_stmt_execute($stmt);	
			$query="SELECT PackageID from package WHERE PackageID IS NOT NULL order by PackageID desc LIMIT 0,1";
			$stmt=mysqli_prepare($dbc,$query);
			mysqli_stmt_execute($stmt);					
			mysqli_stmt_bind_result($stmt,$PackageID);
			mysqli_stmt_fetch($stmt);	
			mysqli_stmt_fetch($stmt);
			$query="SELECT TicketID from ticket WHERE TicketID IS NOT NULL order by TicketID desc LIMIT 0,1";
			$stmt=mysqli_prepare($dbc,$query);
			mysqli_stmt_execute($stmt);					
			mysqli_stmt_bind_result($stmt,$TicketID);
			mysqli_stmt_fetch($stmt);	
			mysqli_stmt_fetch($stmt);	
			$query="INSERT INTO tickettype (TicketID, PackageID) VALUES (?,?)";
			$stmt=mysqli_prepare($dbc,$query);
			mysqli_stmt_bind_param($stmt,"is", $TicketID, $PackageID);
			mysqli_stmt_execute($stmt);
			echo '<h2>BOOKED TICKET FOR ' .$flight_no. "</h2>
			<p> Ticket Details </p>";	
			echo "<table cellpadding=\"10\"";
			echo'
			<tr><td>Customer Email </td> <td>' .$user_name. '</td></tr>
			<tr><td>Ticket ID </td> <td>' .$TicketID. '</td></tr>
			<tr><td>Package ID </td> <td>' .$PackageID. '</td></tr>
			<tr><td>Package Weight </td> <td>' .$weight. '</td></tr>
			<tr><td>Package Sender </td><td>' .$sender_name. '</td></tr>
			<tr><td>Package Receiver </td><td>' .$receiver_name. '</td></tr>
			</table>' ;


			
		?>

	</body>
</html>
