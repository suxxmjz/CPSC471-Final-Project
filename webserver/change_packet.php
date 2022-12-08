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
        <h2>Change Package Information</h2>
		<?php
			echo "<form action=\"change_packet_handler.php\" method=\"post\">";
            echo "<p><strong>Package <strong></p>";
            echo "<table cellpadding=\"10\">";
            echo "<tr>";
            echo "<td class=\"fix_table_short\">Package Weight</td>";
            echo "<td class=\"fix_table_short\">Package Receiver</td>";
            echo "<td class=\"fix_table_short\">Package Sender</td>";	
            echo "</tr>";
            echo "<tr>";
            echo "<td class=\"fix_table_short\"><input type=\"number\" name=\"package_weight\" ></td>";
            echo "<td class=\"fix_table_short\"><input type=\"text\" name=\"package_receiver\" ></td>";
            echo "<td class=\"fix_table_short\"><input type=\"text\" name=\"package_sender\" ></td>";
            echo "<td class=\"fix_table_short\">";
            echo "</td>";
            echo "</tr>";
            echo "</table>"; 
            echo "<input type=\"submit\" value=\"Change Package\" name=\"Select\">";
            echo "</form>";     
                ?>
            </body>
</html>