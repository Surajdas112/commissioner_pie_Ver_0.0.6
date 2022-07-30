<?php
session_start();
ob_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <title>CBIC</title>
   <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'>
   <link rel="stylesheet" href="./loginstyle.css">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>


</head>

<body>
   <!-- partial:index.partial.html -->
   <div class="overlay container">
      <!-- LOGN IN FORM by Omar Dsoky -->
      <form action="verify-email-process.php" method="POST">
         <!--   con = Container  for items in the form-->
         <div class="con">
            <div class="col-sm-12">
               <div class="row">
                  <img src="cbic.png" class="img-fluid" style="width:250px;height:220px;">
               </div>

            </div>
            <!--     End  header Content  -->
            <br>
            <div class="container">
               <div class="row justify-content-center">
                    <h4 style="text-align:center;margin-top: 20px;">Please Enter The OTP We have just Sent on your mail</h4>
                    <div class="container">
                        <div class="row">
                                <h5 style="text-align:center;margin-top: 20px;"><?php echo  $_SESSION['useremail'];?></h5>
                        </div>

                    </div>
                  <div class="col-md-6">
                              <!--   user name -->
                     
                     <!--   user name Input-->
                    <div class="container">
                        <div class="row">
                                <div>
                                <input  class="form-input" id="txt-input"  name="otp" type="number" id="otp security"  placeholder="Enter Your OTP Here" required>
                                </div>
                        </div>

                    </div>

                     <br>

                    
                     <!--        buttons -->
                     <div class="container" style="margin-left:30px;">

                        <input type="submit" class="log-in">
                       
                     </div>
                  </div>
                     
                  
               </div>
            </div>

            <!--   other buttons -->

            <!--   End Conrainer  -->






            <!-- End Form -->
      </form>

   </div>
   <!-- partial -->
   <script src="./loginscript.js"></script>

</body>

</html>