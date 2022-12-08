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
        <h2>Account Information</h2>
		<?php
        $user_name = $_POST['useremail'];
		$_SESSION['useremail'] = $user_name;
        	require_once('Database Connection file/mysqli_connect.php');
            $query="SELECT count(*) FROM customer WHERE CustomerEmail = ?";
            $stmt=mysqli_prepare($dbc,$query);
            mysqli_stmt_bind_param($stmt,"s",$user_name);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_bind_result($stmt,$customer);
            mysqli_stmt_fetch($stmt);
            if ($customer == 1) {  
                mysqli_stmt_fetch($stmt);
                $query="SELECT UserName, UserPassword, PhoneNumber, Province, City, BuildingNum,Community FROM (customer NATURAL JOIN user) WHERE CustomerEmail = ?";
                $stmt=mysqli_prepare($dbc,$query);
                mysqli_stmt_bind_param($stmt,"s",$user_name);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_bind_result($stmt, $Name, $Password ,$PhoneNumber, $Province, $City, $BuildingNumber, $Community);
                mysqli_stmt_fetch($stmt);          
                echo "<form action=\"admin_change_user_handler2.php\" method=\"post\">";
                echo "<table cellpadding=\"10\">";
                echo "<tr>";
                echo "<td class=\"fix_table_short\">Current Email ".$user_name."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td class=\"fix_table_short\">New Email</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td class=\"fix_table_short\"><input type=\"text\" name=\"new_email\" ></td>";
                echo "<td class=\"fix_table_short\">";
                echo "</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td class=\"fix_table_short\">New Password</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td class=\"fix_table_short\"><input type=\"text\" name=\"new_password\" ></td>";
                echo "<td class=\"fix_table_short\">";
                echo "</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td class=\"fix_table_short\">Current Phone Number ".$PhoneNumber. "</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td class=\"fix_table_short\">New Phone Number</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td class=\"fix_table_short\"><input type=\"number\" min=\"1000000000\" max=\"9999999999\" name=\"new_phonenumber\" ></td>";
                echo "<td class=\"fix_table_short\">";
                echo "</td>";
                echo "</tr>";
                echo "</table>"; 
                echo "<input type=\"submit\" value=\"Change Information\" name=\"Select\">";
                echo "</form>";  
                echo "<table cellpadding=\"10\"><tr>";
                echo "<td class=\"fix_table_short\">Current Address is</td></tr>";
                echo "<tr><td>".$BuildingNumber. "  ".$Community. " ".$City. " " .$Province."</td></tr>";
                echo "</table>"; 
                echo "<form action=\"admin_change_user_address.php\" method=\"post\">";
                echo "<input type=\"submit\" value=\"Change Address\" name=\"Select\">";
                echo "</form>";  
            }
            else {
                mysqli_stmt_fetch($stmt);
                $query="SELECT * FROM user WHERE UserEmail = ?";
                $stmt=mysqli_prepare($dbc,$query);
                mysqli_stmt_bind_param($stmt,"s",$user_name);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_bind_result($stmt,$UserEmail, $Name, $Password);
                mysqli_stmt_fetch($stmt);  
                echo "<form action=\"admin_change_user_handler2.php\" method=\"post\">";
                echo "<p><strong> Hello " .$Name. "<strong></p>";
                echo "<table cellpadding=\"10\">";
                echo "<tr>";
                echo "<td class=\"fix_table_short\">Current Email ".$UserEmail."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td class=\"fix_table_short\">New Email</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td class=\"fix_table_short\"><input type=\"text\" name=\"new_email\" ></td>";
                echo "<td class=\"fix_table_short\">";
                echo "</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td class=\"fix_table_short\">New Password</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td class=\"fix_table_short\"><input type=\"text\" name=\"new_password\" ></td>";
                echo "<td class=\"fix_table_short\">";
                echo "</td>";
                echo "</tr>";
                echo "</table>"; 
                echo "<input type=\"submit\" value=\"Change Information\" name=\"Select\">";
                echo "</form>";            
            }
            mysqli_stmt_close($stmt);
            mysqli_close($dbc);
                ?>
            </body>
</html>