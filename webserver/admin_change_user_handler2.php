<?php
	session_start();
?>
<html>
	<head>
		<title>
			Changing...
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
		<?php
		if (!empty($_POST['newEmail'])) {
			$_SESSION['newEmail'] = $_POST['newEmail'];
			$newEml = $_SESSION['newEmail'];
		
		}   

            $oldEml = $_SESSION['useremail'];
			require_once('Database Connection file/mysqli_connect.php');
			$query = "SELECT COUNT(*) from user WHERE UserEmail = ?";
			$stmt=mysqli_prepare($dbc,$query);
			mysqli_stmt_bind_param($stmt,"s", $newEml);
			mysqli_stmt_execute($stmt);	
			mysqli_stmt_bind_result($stmt,$UserEmail);
			mysqli_stmt_fetch($stmt);	
			if ($UserEmail == 1) {
				mysqli_stmt_fetch($stmt);
                header("location: admin_change_user_handler.php?msg=failed");

			}
			else {
				mysqli_stmt_fetch($stmt);
				$query = "UPDATE user SET UserEmail = ? WHERE UserEmail = ?";
				$stmt=mysqli_prepare($dbc,$query);
				mysqli_stmt_bind_param($stmt,"ss", $newEml, $oldEml);
				mysqli_stmt_execute($stmt);	
                header("location: admin_homepage.php?msg=success");
			}



			
		?>

	</body>
</html>
