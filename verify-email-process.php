<?php
session_start();
ob_start();
include('inc/connection.php');


if(isset($_POST['otp']) && !empty(isset($_POST['otp']))){
    
   
    
    $emailOtp =  (int)$_POST['otp'];


   
    $otp_query = "SELECT * FROM `login` WHERE username='". $_SESSION['useremail']."' AND otp=".$emailOtp;
	$query_res = mysqli_query($conn,$otp_query);
    if (mysqli_num_rows($query_res) > 0) {

            

        ?>
        <script>
        alert('Your Email has been verfied Sucessfully');
        window.location.href='index.php';
        </script>";
                        
    <?php
        
        
	} else {
        header('location:verify-email.php');
	}	
    
}else{

                 ?>
					<script>
					alert('You have entered wrong OTP');
					window.location.href='verify-email.php';
					</script>";
									
				<?php
}








?>