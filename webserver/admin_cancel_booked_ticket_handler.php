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
        <h2>CANCEL BOOKED TICKET</h2>
		<?php
                require_once('Database Connection file/mysqli_connect.php');
                $TicketID = $_POST['select_ticket'];
                $query = "SELECT COUNT(*) FROM ticket WHERE TicketID = ?";
                $stmt=mysqli_prepare($dbc,$query);
                mysqli_stmt_bind_param($stmt,"i", $TicketID);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_bind_result($stmt,$exists);
                mysqli_stmt_fetch($stmt);
                if ($exists == 1) {
                    mysqli_stmt_fetch($stmt);
                    $query="DELETE FROM ticket WHERE TicketID = ?";
                    $stmt=mysqli_prepare($dbc,$query);
                    mysqli_stmt_bind_param($stmt,"i", $TicketID);
                    mysqli_stmt_execute($stmt);
                    echo "
                    <h3 style='padding-left: 40px;'>Ticket " .$TicketID. " has been cancelled successfully.</td>
                    </h3>";
                }
                else {
                    echo "<h3 style='padding-left: 40px;'>Ticket does not exists.</td>
                    </h3>";
                }
                mysqli_stmt_close($stmt);
                mysqli_close($dbc);                
        ?>
     </body>
</html>