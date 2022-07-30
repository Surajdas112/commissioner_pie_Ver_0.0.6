<?php
session_start();
ob_start();
include('inc/connection.php');






if (isset($_POST['submit'])) {

	
	    
    
    	$email = strtolower($_POST['email']);
	
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$emailErr = "Invalid email format";
		echo $emailErr;
	}
	
   $_SESSION['useremail'] = trim($email);
	



   


	$firstname = ucfirst($_POST['fname']);
	if (!preg_match("/^[a-zA-Z ]*$/", $firstname)) {
		$nameErr = "Only letters and white space allowed";
		echo $nameErr;
		echo "<br>";
	}

	$lastname = ucfirst($_POST['lname']);
	if (!preg_match("/^[a-zA-Z ]*$/", $lastname)) {
		$nameErr = "Only letters and white space allowed";
		echo $nameErr;
		echo "<br>";
	}

    $level = $_POST['level'];
	if (empty($level)) {

		die('You Must Select Level to proceed');
	}


	$password = $_POST['pass'];
	if (empty($password)) {

		die('password can not be empty');
	}



	$cpassword = $_POST['cpass'];

	if (empty($cpassword)) {

		die('can not be empty');
	} else {
		$select_query = "SELECT `username` FROM `login` WHERE username='" . $email . "'";
		$res1 = mysqli_query($conn, $select_query);
		if (mysqli_num_rows($res1) > 0) {


			

				?>
					<script>
					alert('Email Already Exist');
					window.location.href='index.php';
					</script>";
									
				<?php


		} else {

            	$otp = rand(1000, 9999);

		

				$insert = "INSERT INTO `login`( `fname`, `lname`, `username`, `password`, `level`, `otp`, `ZONE_CODE`, `COMM_CODE`, `DIV_CODE`, `RANGE_CODE`) VALUES('$firstname','$lastname','". $_SESSION['useremail']."','$password','$level',$otp,'".$_POST['zone']."','".$_POST['comm']."','".$_POST['asst_comm']."','".$_POST['range']."')";

				if ($conn->query($insert) === TRUE) {



					$to      =  $_SESSION['useremail'];
					$subject = 'Account Verification Code : Deep Coaching ';
					$message = "Hello " . $firstname . "     This is your OTP to verify you E-mail   :-" . $otp;
					$header = "From:noreply@mart.denpower.org \r\n";
					$header .= "Cc:noreply@mart.denpower.org \r\n";
					$header .= "MIME-Version: 1.0\r\n";
					$header .= "Content-type: text/html\r\n";

					$retval = mail($to, $subject, $message, $header);

					if ($retval == true) {
					//	header('Location:verify-email.php');
                        exit;
						
					} else {
						echo "Message could not be sent...";
					}
						//header('Location:verify-email.php');
                        exit;
				} else {
					echo "Error: " . $insert . "<br>" . $conn->error;
				}
			
		}
	}
}
