<?php
	session_start();
?>
<html>
	<head>
		<title>Add Flight Schedule Details</title>
	</head>
	<body>
		<?php
			if(isset($_POST['Submit']))
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
					$dep_date=$_POST['dep_date'];
				}
	
				
				if(empty($_POST['dep_time']))
				{
					$data_missing[]='Departure Time';
				}
				else
				{
					$dep_time=$_POST['dep_time'];
				}
				if(empty($_POST['arr_time']))
				{
					$data_missing[]='Arrival Time';
				}
				else
				{
					$arr_time=$_POST['arr_time'];
				}

				if(empty($_POST['gateNum']))
				{
					$data_missing[]='Gate Number';
				}
				else
				{
					$gateNum=$_POST['gateNum'];
				}

				

				if(empty($data_missing))
				{
					
					require_once('Database Connection file/mysqli_connect.php');

			
						$query="INSERT INTO flight (DepTime, StartTime, EndTime,Destination, Source, GateNumber) VALUES (?,?,?,?,?,?)";
						$stmt=mysqli_prepare($dbc,$query);
						mysqli_stmt_bind_param($stmt,"sssssi",$dep_date,$dep_time,$arr_time,$destination,$origin,$gateNum);
						mysqli_stmt_execute($stmt);
						$affected_rows=mysqli_stmt_affected_rows($stmt);
						mysqli_stmt_close($stmt);
			
					mysqli_close($dbc);
					if($affected_rows==1)
					{
						echo "Successfully Submitted";
						header("location: add_flight_details.php?msg=success");
					}
					else
					{
						echo "Submit Error";
						echo mysqli_error();
						header("location: add_flight_details.php?msg=failed");
					}
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