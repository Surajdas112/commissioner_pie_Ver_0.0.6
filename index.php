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

      <!-- LOGN IN FORM by Omar Dsoky -->
      <form action="login_sub.php" method="POST">
         <!--   con = Container  for items in the form-->
         <div class="con">
            <div class="col-sm-12">
               <div class="row">
                  <img src="cbic.png" class="img-fluid" style="width:250px;height:210px;">
               </div>

            </div>
            <!--     End  header Content  -->
            <br>
            <div class="container">
               <div class="row justify-content-center">

                  <div class="col-md-12">
                     <!--   user name -->
                     <span class="input-item" style="width:50px;">
                        <i class="fa fa-user-circle"></i>
                     </span>
                     <!--   user name Input-->
                     <input class="form-input" style="padding-left: 50px;" id="txt-input" name="username" type="text" placeholder="UserName" required>

                     <br>

                     <!--   Password -->

                     <span class="input-item" style="width:50px;">
                        <i class="fa fa-key"></i>
                     </span>
                     <!--   Password Input-->
                     <input style="padding-left: 50px;" class="form-input" type="password" placeholder="Password" id="pwd" name="password" required>

                     <!--      Show/hide password  -->
                     <span>
                        <i class="fa fa-eye" aria-hidden="true" style="padding-left:4px;border: 1px solid salmon;" type="button" id="eye"></i>
                     </span>


                     <br>
                     <!--        buttons -->
                     <div class="d-flex justify-content-center">

                        <input  id="login" type="submit" name="login">


                     </div>

                  </div>


               </div>
            </div>

            <!--   other buttons -->

            <!--   End Conrainer  -->






            <!-- End Form -->
      </form>
      <div style="display:inline-block;width:100%;margin-left:30%;">
      <a  class="formmenu" href="registration.php" style="width:auto;">
        
        New User ?
      </a>
      <a class="formmenu" href="registration.php" style="width: auto;border:none;">
        
         Forgot Password ?
      </a>
      </div>


   
   <script type="text/javascript">
      function myFunction() {
         location.href = "registration.php";
      };
   </script>
   <!-- partial -->
   <script src="./loginscript.js"></script>

</body>

</html>