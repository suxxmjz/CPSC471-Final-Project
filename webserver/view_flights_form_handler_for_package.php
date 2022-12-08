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
		<h2>AVAILABLE FLIGHTS</h2>
		<?php
			if(isset($_POST['Search']))
			{
				$data_missing=array();
				if(empty($_POST['origin']))
				{
					$data_missing[]='Origin';
				}
				else
				{
					$origin=$_POST['origin'];
				}
				if(empty($_POST['destination']))
				{
					$data_missing[]='Destination';
				}
				else
				{
					$destination=$_POST['destination'];
				}

				if(empty($_POST['dep_date']))
				{
					$data_missing[]='Departure Date';
				}
				else
				{
					$dep_date=trim($_POST['dep_date']);
				}

				if(empty($data_missing))
				{
					$_SESSION['journey_date']=$dep_date;
					require_once('Database Connection file/mysqli_connect.php');
						$query="SELECT FlightNumber,DepTime,StartTime,EndTime,Destination,Source FROM flight where Source=? and Destination=? and DepTime=?";
						$stmt=mysqli_prepare($dbc,$query);
						mysqli_stmt_bind_param($stmt,"sss",$origin,$destination,$dep_date);
						mysqli_stmt_execute($stmt);
						mysqli_stmt_bind_result($stmt,$FlightNumber,$DepTime,$StartTime, $EndTime, $Destination, $Source);
						mysqli_stmt_store_result($stmt);
						if(mysqli_stmt_num_rows($stmt)==0)
						{
							echo "<h3>No flights are available !</h3>";
						}
						else
						{	
							echo "<form action=\"book_tickets2_for_package.php\" method=\"post\">";
							echo "<table cellpadding=\"10\"";
							echo "<tr><th>Flight Number</th>
							<th>Departure Date</th>
							<th>Departure Time</th>
							<th>Arrival Time</th>
							<th>Destination</th>
							<th>Origin</th>	
							<th>Select</th>
							</tr>";
							while(mysqli_stmt_fetch($stmt)) {
        						echo "<tr>
        						<td>".$FlightNumber."</td>
        						<td>".$DepTime."</td>
								<td>".$StartTime."</td>
								<td>".$EndTime."</td>
								<td>".$Destination."</td>
								<td>".$Source."</td>
								<td><input type=\"radio\" name=\"select_flight\" value=\"".$FlightNumber."\"></td>
        						</tr>";
    						}
    						echo "</table> <br>";
    						echo "<input type=\"submit\" value=\"Select Flight\" name=\"Select\">";
    						echo "</form>";
    					}
					
				
					mysqli_stmt_close($stmt);
					mysqli_close($dbc);
					// else
					// {
					// 	echo "Submit Error";
					// 	echo mysqli_error();
					// }
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
				echo "Search request not received";
			}
		?>
	</body>
</html>