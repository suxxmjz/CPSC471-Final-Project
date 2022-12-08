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
				<!-- <li><a href="home_page.php"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li> -->
				<li><a href="customer_homepage.php"><i class="fa fa-desktop" aria-hidden="true"></i> Dashboard</a></li>
				<li><a href="logout_handler.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a></li>
			</ul>
		</div>
        <h2>Changed Account Information</h2>
		<?php
        //parse email here
            $user_name = $_SESSION['login_user'];
            $newEml = $_POST['new_email'];
            $newPass = $_POST['new_password'];
			require_once('Database Connection file/mysqli_connect.php');
            $query="SELECT count(*) FROM customer WHERE CustomerEmail = ?";
            $stmt=mysqli_prepare($dbc,$query);
            mysqli_stmt_bind_param($stmt,"s",$user_name);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_bind_result($stmt,$customer);
            mysqli_stmt_fetch($stmt);
            if ($customer == 1) { 
                $newPhone = $_POST['new_phonenumber']; 	
				mysqli_stmt_fetch($stmt);
                if (!empty($newEml)) {
                        if(filter_var($newEml, FILTER_VALIDATE_EMAIL)){
                            $query="SELECT count(*) FROM user WHERE UserEmail = ?";
                            $stmt=mysqli_prepare($dbc,$query);
                            mysqli_stmt_bind_param($stmt,"s",$newEml);
                            mysqli_stmt_execute($stmt);
                            mysqli_stmt_bind_result($stmt,$exists);
                            mysqli_stmt_fetch($stmt);
                            if ($exists == 1) { 	
                                mysqli_stmt_fetch($stmt);
                                echo "<p><strong> Email in use, no change was made <strong></p>";
                            }
                            else {
                                mysqli_stmt_fetch($stmt);
                                $query = "UPDATE user SET UserEmail = ? WHERE UserEmail = ?";
                                $stmt=mysqli_prepare($dbc,$query);
                                mysqli_stmt_bind_param($stmt,"ss", $newEml, $user_name);
                                mysqli_stmt_execute($stmt);
                                $_SESSION['login_user'] = $newEml;
                                $user_name = $newEml;
                                echo "<p><strong> Changed Email <strong></p>";
                            }
                        }
                        else{
                            echo "Invalid email.";
                            
					}
                }
                if (!empty($newPass)) {
                    $query = "UPDATE user SET UserPassword = ? WHERE UserEmail = ?";
                    $stmt=mysqli_prepare($dbc,$query);
                    mysqli_stmt_bind_param($stmt,"ss", $newPass, $user_name);
                    mysqli_stmt_execute($stmt);
                    echo "<p><strong> Changed Password <strong></p>";

                }
                if (!empty($newPhone)) {
                    //parse phonenumber here for length
                    $query = "UPDATE customer SET PhoneNumber = ? WHERE CustomerEmail = ?";
                    $stmt=mysqli_prepare($dbc,$query);
                    mysqli_stmt_bind_param($stmt,"is", $newPhone, $user_name);
                    mysqli_stmt_execute($stmt);  
                    echo "<p><strong> Changed Phone Number <strong></p>";     
                }               

			}
			else {
				mysqli_stmt_fetch($stmt);
                if (!empty($newEml)) {
                    $query="SELECT count(*) FROM user WHERE UserEmail = ?";
                    $stmt=mysqli_prepare($dbc,$query);
                    mysqli_stmt_bind_param($stmt,"s",$newEml);
                    mysqli_stmt_execute($stmt);
                    mysqli_stmt_bind_result($stmt,$exists);
                    mysqli_stmt_fetch($stmt);
                    if ($exists == 1) { 	
                        mysqli_stmt_fetch($stmt);
                        echo "<p><strong> Email in use, no change was made <strong></p>";
                    }
                    else {
                        mysqli_stmt_fetch($stmt);
                        $query = "UPDATE user SET UserEmail = ? WHERE UserEmail = ?";
                        $stmt=mysqli_prepare($dbc,$query);
                        mysqli_stmt_bind_param($stmt,"ss", $newEml, $user_name);
                        mysqli_stmt_execute($stmt);
                        $_SESSION['login_user'] = $newEml;
                        $user_name = $newEml;
                        echo "<p><strong> Changed Email <strong></p>";
                    }
                }
                if (!empty($newPass)) {
                    $query = "UPDATE user SET UserPassword = ? WHERE UserEmail = ?";
                    $stmt=mysqli_prepare($dbc,$query);
                    mysqli_stmt_bind_param($stmt,"ss", $newPass, $user_name);
                    mysqli_stmt_execute($stmt);
                    echo "<p><strong> Changed Password <strong></p>";

                }    
                mysqli_stmt_close($stmt);
                mysqli_close($dbc); 
			}



			
		?>

	</body>
</html>
