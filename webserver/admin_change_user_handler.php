<?php
	session_start();
?>
<html>
	<head>
		<title>Change User Email</title>
	</head>
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
				<li><a href="home_page.php"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
				<li><a href="admin_homepage.php"><i class="fa fa-desktop" aria-hidden="true"></i> Dashboard</a></li>
				<li><a href="logout_handler.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a></li>
			</ul>
		</div>
		<h2>CHANGING USER EMAIL</h2>
	<body>
		<?php
			// if(isset($_POST['Continue']))
			// {
				$data_missing=array();
				if(empty($_POST['useremail']))
				{
					$data_missing[]='User Email';
				}
				else
				{
					$user_email=($_POST['useremail']);
				}

                    require_once('Database Connection file/mysqli_connect.php');
                    $query2 = "SELECT COUNT(*) FROM user WHERE UserEmail = ?";
                    $stmt2 = mysqli_prepare($dbc, $query2);
                    mysqli_stmt_bind_param($stmt2,"s", $user_email);
                    mysqli_stmt_execute($stmt2);
                    mysqli_stmt_bind_result($stmt2,$UserEmail);
                    mysqli_stmt_fetch($stmt2);
                    if ($UserEmail == 1) {
                    
                    $_SESSION['useremail'] = trim($_POST['useremail']);
                    echo "<form action=\"admin_change_user_handler2.php\" method=\"post\">";
                            // echo "<p><strong>PASSENGER <strong></p>";
                            echo "<table cellpadding=\"10\">";
                            echo "<tr>";
                            echo "<td class=\"fix_table_short\">Enter New Email</td>";
                            echo "</tr>";
                            echo "<tr>";
            
                            echo "<td class=\"fix_table_short\"><input type=\"text\" name=\"newEmail\" required></td>";
                            echo "<td class=\"fix_table_short\">";
                            echo "</td>";
                            
                            echo "</tr>";
                            echo "</table> <br>";
                            echo "<input type=\"submit\" value=\"Change\" name=\"Select\">";
                            echo "</form>";
                        }
                        else{
                            header("location: admin_change_user.php?msg=failed");

                        }
                    
                            // if($affected_rows==1)
                            // {
                            //     echo "Successfully Changed";
                            //     header("location: admin_change_user.php?msg=success");
                            // }
                            // else
                            // {
                            //     echo "Submit Error";
                            //     echo mysqli_error();
                            //     header("location: admin_change_user.php?msg=failed");
                            // }
                        
				// else
				// {
				// 	echo "The following data fields were empty! <br>";
				// 	foreach($data_missing as $missing)
				// 	{
				// 		echo $missing ."<br>";
				// 	}
				// }
           // }
			// else
			// {
			// 	echo "Change request not received";
			// }
		?>
	</body>
</html>