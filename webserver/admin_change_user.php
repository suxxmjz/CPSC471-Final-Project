<?php
	session_start();
?>
<html>
	<head>
		<title>
			Change User Email
		</title>
		<style>
			input {
    			border: 1.5px solid #dd6a1fa1;
    			border-radius: 4px;
    			padding: 7px 10px;
			}
			input[type=submit] {
				background-color: #dd6a1fa1;
				color: white;
    			border-radius: 4px;
    			padding: 7px 45px;
    			margin: 0px 215px
			}
			input[type=date] {
				border: 1.5px solid #dd6a1fa1;
    			border-radius: 4px;
    			padding: 5.5px 30px;
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
		<form action="admin_change_user_handler.php" method="post">
			<h2>ENTER THE USER EMAIL YOU WISH TO CHANGE</h2>
			<div>
			<?php
				if(isset($_GET['msg']) && $_GET['msg']=='success')
				{
					echo "<strong style='color:green; padding-left:20px;'>User email has been changed.</strong>
						<br>
						<br>";
				}
				else if(isset($_GET['msg']) && $_GET['msg']=='failed')
				{
					echo "<strong style='color:red; padding-left:20px;'>*Invalid user email, try again..</strong>
						<br>
						<br>";
				}
			?>
            
			<table cellpadding="5" style="padding-left: 20px;">
				<tr>
					<td class="fix_table">Enter a Valid User Email.</td>
					<td class="fix_table"><input type="text" name="useremail" required></td>
					<!-- <td class="fix_table">Enter the Departure Date</td> -->
				</tr>
				<!-- <tr>
					
					<td class="fix_table"><input type="date" name="departure_date" required></td>
				</tr> -->
			</table>
            
			<br>
			<br>
			<input type="submit" value="Continue" name="Continue">
			</div>
		</form>
	</body>
</html>