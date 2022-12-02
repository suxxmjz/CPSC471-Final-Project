<?php
	session_start();
?>
<html>
	<head>
		<title>Add Ticket Details</title>
	</head>
	<body>
		<?php
			$i=1;
			if(isset($_POST['Submit']))
			{
				
				$date_of_res=date("Y-m-d");
				//$flight_no=$_SESSION['flight_no'];
				//$journey_date=$_SESSION['journey_date'];
		
				$no_of_pass=$_SESSION['no_of_pass'];
				$total_amount = $no_of_pass * "100";
				// $total = &_SESSION['total_amount'];
		
				


				$payment_id=NULL;
				$customer_id=$_SESSION['login_user'];
				
				for($i=1;$i<=$no_of_pass;$i++)
				{

					
					require_once('Database Connection file/mysqli_connect.php');
					$query="INSERT INTO passenger (PassengerName,PassengerAge) VALUES (?,?)";
					$stmt=mysqli_prepare($dbc,$query);

					mysqli_stmt_bind_param($stmt,"si",$_POST['pass_name'][$i-1],$_POST['pass_age'][$i-1]);
					mysqli_stmt_execute($stmt);
					$affected_rows=mysqli_stmt_affected_rows($stmt);
					echo 'Passenger added '.$affected_rows.'<br>';
					// mysqli_stmt_bind_result($stmt,$cnt);
					// mysqli_stmt_fetch($stmt);
					// echo $cnt;
				}
				
				$pnr=rand(1000000,9999999);
				$_SESSION['pnr']=$pnr;
				mysqli_stmt_close($stmt);
				mysqli_close($dbc);

				// header("location: payment_details.php");
				
				header('location:ticket_success.php');

// 						else
// 						{
// 							echo "Submit Error";
// 							echo mysqli_error();
// 						}
// 					}
// 					else
// 					{
// 						echo "The following data fields were empty! <br>";
// 						foreach($data_missing as $missing)
// 						{
// 							echo $missing ."<br>";
// 						}
// 					}
// 				}
			}
			else
			{
				echo "Submit request not received";
			}
		?>
	</body>
</html>