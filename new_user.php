<html>
	<head>
		<title>
			Create New User Account
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
    			margin: 0px 135px
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
				<li><a href="login_page.php"><i class="fa fa-ticket" aria-hidden="true"></i> Book Tickets</a></li>
				<li><a href="login_page.php"><i class="fa fa-sign-in" aria-hidden="true"></i> Login</a></li>
			</ul>
		</div>
		<br>
		<form class="center_form" action="new_user_form_handler.php" method="POST" id="new_user_from">
			<h2><i class="fa fa-user-plus" aria-hidden="true"></i> CREATE NEW USER ACCOUNT</h2>
			<br>
			<table cellpadding='10'>
				<strong>ENTER LOGIN DETAILS</strong>
				<tr>
					<td>Email Address:</td>
					<td><input type="text" name="email" required><br><br></td>
				</tr>
				<tr>
					<td>Username: </td>
					<td><input type="text" name="username" required><br><br></td>
				</tr>
				<tr>
					<td>Password:</td>
					<td><input type="password" name="password" required><br><br></td>
				</tr>

			</table>
			<br>

			<br>
			<?php
			if(isset($_GET['msg']) && $_GET['msg']=='failed')
			{
				echo "<br>
				<strong style='color:red'>Invalid Email</strong>
				<br><br>";
			}
				?>
			<input type="submit" value="Submit" name="Submit">
			<br>
		</form>
	</body>
</html>