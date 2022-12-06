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
			$no_of_pass=$_SESSION['no_of_pass'];
			
			$count=$_SESSION['count'];
			$flight_no=$_POST['select_flight'];
			$_SESSION['flight_no']=$flight_no;
			//$pass_name=array();
			echo "<h2>ADD PASSENGERS DETAILS</h2>";
			echo "<form action=\"add_ticket_details_form_handler.php\" method=\"post\">";
			while($count<=$no_of_pass)
			{
					echo "<p><strong>PASSENGER ".$count."<strong></p>";
					echo "<table cellpadding=\"10\">";
					echo "<tr>";
					echo "<td class=\"fix_table_short\">Passenger's ID Number</td>";
					echo "<td class=\"fix_table_short\">Passenger's Name</td>";
					echo "<td class=\"fix_table_short\">Passenger's Age</td>";

				
				
					echo "</tr>";
					echo "<tr>";
					echo "<td class=\"fix_table_short\"><input type=\"text\" name=\"pass_id[]\" required></td>";
					echo "<td class=\"fix_table_short\"><input type=\"text\" name=\"pass_name[]\" required></td>";
					echo "<td class=\"fix_table_short\"><input type=\"number\" name=\"pass_age[]\" required></td>";
					echo "<td class=\"fix_table_short\">";
		

  				
		
  					echo "</td>";
  					
					echo "</tr>";
					echo "</table>";
					
					$count=$count+1;
				}
		
				echo "<input type=\"submit\" value=\"Submit\" name=\"Submit\">";
				echo "</form>";
		?>

	</body>
</html>