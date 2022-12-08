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
        <h2>Change Passenger Seat</h2>
		<?php
        $TicketID = $_SESSION['select_ticket'];
        require_once('Database Connection file/mysqli_connect.php');
        $query = "SELECT FlightNumber FROM ticket WHERE TicketID = ?";
        $query2 ="SELECT SeatNumber,PassengerID FROM seat where FlightNumber = ?";
        $stmt=mysqli_prepare($dbc,$query);
        mysqli_stmt_bind_param($stmt,"i", $TicketID);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt,$flight_no);
        mysqli_stmt_store_result($stmt);
        mysqli_stmt_fetch($stmt);
        $_SESSION['select_flight'] = $flight_no;
        //$pass_name=array();
        $stmt2 = mysqli_prepare($dbc, $query2);
        mysqli_stmt_bind_param($stmt2,"s", $flight_no);
        mysqli_stmt_execute($stmt2);
        mysqli_stmt_bind_result($stmt2,$SeatNumber,$PassengerID);
        mysqli_stmt_store_result($stmt2);
        $takenseats = array();	
        while(mysqli_stmt_fetch($stmt2)) {
            array_push($takenseats,$SeatNumber);
        }
        echo "<form action=\"admin_change_passenger_handler.php\" method=\"post\">";
                echo '<h2>SELECT SEAT FOR FLIGHT ' .$flight_no. "</h2>";
                echo "<p><strong>SEATS <strong></p>";
                echo "<table cellpadding=\"10\"";
                echo '<tr>
                <th>Seat Number</th>
                <th>Seat Type</th>
                </tr>';
                for($x = 1; $x <= 20; $x++) {
                    if (!(in_array($x,$takenseats))) {
                        echo "<tr>
                        <td>".$x."</td>
                        <td> Economy </td>
                        <td><input type=\"radio\" name=\"select_seat\" value=\"".$x." \"required></td>
                        </tr>";
                    }
                }
                echo "</table> <br>";
                echo "<input type=\"submit\" value=\"Change Seat\" name=\"Select\">";
                echo "</form>";     
                mysqli_stmt_close($stmt);
                mysqli_stmt_close($stmt2);
                mysqli_close($dbc);      
                ?>
            </body>
</html>