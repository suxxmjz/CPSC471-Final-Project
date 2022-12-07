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
			$seat_no = trim($_POST['select_seat']);
			$passid = trim($_POST['pass_id']);
			$passname = trim($_POST['pass_name']);
			$passage = trim($_POST['pass_age']);
			require_once('Database Connection file/mysqli_connect.php');
			$query = "INSERT INTO passenger VALUES (?,?,?)"
			$stmt=mysqli_prepare($dbc,$query);
			mysqli_stmt_bind_param($stmt,"ssi", $passid, $passname, $passage);
			mysqli_stmt_execute($stmt);	
			if (mysqli_stmt_affected_rows($stmt) != 1) {
				echo '<p> Passenger not inserted</p>'
			}		
			$query= "INSERT INTO seat VALUES (?,?,?)";
			mysqli_stmt_bind_param($stmt,"iss",$seat_no, $flight_no, $passid,);
			mysqli_stmt_execute($stmt);	
			if (mysqli_stmt_affected_rows($stmt) != 1) {
				echo '<p> Passenger not inserted</p>'
			}							
			$query="INSERT INTO ticket VALUES (?,?)";
			$stmt=mysqli_prepare($dbc,$query);
			mysqli_stmt_bind_param($stmt,"ss", $flight_no, $user_name);
			mysqli_stmt_execute($stmt);
			if (mysqli_stmt_affected_rows($stmt) != 1) {
				echo '<p> Passenger not inserted</p>'
			}		
			$query="SELECT TicketID from ticket WHERE TicketID IS NOT NULL order by TicketID desc LIMIT 0,1";
			$stmt=mysqli_prepare($dbc,$query);
			mysqli_stmt_execute($stmt);					
			mysqli_stmt_bind_result($stmt,$TicketID);					
			$query="INSERT INTO `tickettype`(`TicketID`, `PassengerID`) VALUES (?,?)";
			$stmt=mysqli_prepare($dbc,$query);
			mysqli_stmt_bind_param($stmt,"is", $TicketID, $passid);
			mysqli_stmt_execute($stmt);
			if (mysqli_stmt_affected_rows($stmt) != 1) {
				echo '<p> Passenger not inserted</p>'
			}				

	
			
		?>

	</body>
</html>