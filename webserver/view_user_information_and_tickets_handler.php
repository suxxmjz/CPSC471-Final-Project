<?php
	session_start();
?>
<html>
	<head>
		<title>
			View Booked Tickets
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
				<!-- <li><a href="admin_homepage.php"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li> -->
				<li><a href="admin_homepage.php"><i class="fa fa-desktop" aria-hidden="true"></i> Dashboard</a></li>
				<li><a href="logout_handler.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a></li>
			</ul>
		</div>
		<h2>BOOKED TICKETS</h2>
		<?php
			if(isset($_POST['Submit']))
			{
				$data_missing=array();
				if(empty($_POST['customer_email']))
				{
					$data_missing[]='Customer_Email';
				}
				else
				{
					$customer_email=trim($_POST['customer_email']);
				}
				if(empty($data_missing))
				{
					require_once('Database Connection file/mysqli_connect.php');
					$query="SELECT * FROM customer where CustomerEmail = ?";
                    $query2="SELECT * FROM ticket WHERE CustomerEmail = ?";
					$stmt=mysqli_prepare($dbc,$query);
                    $stmt2=mysqli_prepare($dbc, $query2);
					mysqli_stmt_bind_param($stmt,"s",$customer_email);
                    mysqli_stmt_bind_param($stmt2,"s",$customer_email);
					mysqli_stmt_execute($stmt);
					mysqli_stmt_bind_result($stmt,$CustomerEmail, $PhoneNumber, $Province, $City, $BuildingNum, $Community);
					mysqli_stmt_store_result($stmt);
                    mysqli_stmt_fetch($stmt);
                    echo "<p>Customer Email: ".$CustomerEmail."</p>
                    <p>Customer Phone Number: ".$PhoneNumber."</p>
                    <p>Customer Address: ".$BuildingNum. " " .$Community. ", " .$City. ", " .$Province. "</p>";
                    mysqli_stmt_execute($stmt2);
                    mysqli_stmt_bind_result($stmt2,$TicketID,$FlightNumber,$CustomerEmail);
                    mysqli_stmt_store_result($stmt2);
					if(mysqli_stmt_num_rows($stmt2)!=0)
					{
                        echo "<h3>Tickets List</h3>";
						echo "<table cellpadding=\"10\"";
						echo "<tr>
						<th>Flight Number</th>
						<th>Ticket ID</th>
						</tr>";
						while(mysqli_stmt_fetch($stmt2)) {
        					echo "<tr>
							<td>".$FlightNumber."</td>
							<td>".$TicketID."</td>
        					</tr>";
    					}
    					echo "</table> <br>";
					}
					else
					{
                        echo "<h3>Tickets List Empty</h3>";
    				}
					mysqli_stmt_close($stmt);
                    mysqli_stmt_close($stmt2);
					mysqli_close($dbc);
				}
				else
				{
					echo "The following data fields were empty! <br>";
					foreach($data_missing as $missing)
					{
						echo $missing ."<br>";
					}
				}
			}
			else
			{
				echo "Submit request not received";
			}
		?>
	</body>
</html>