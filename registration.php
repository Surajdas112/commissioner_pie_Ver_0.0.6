<?php
session_start();
ob_start();
include('inc/connection.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, min-width=480" />
  <title>CBIC Registration Form</title>
  <link rel="stylesheet" href="registrationstyle.css">




</head>

<body>
  
<div>
  <div class="form_wrapper">
    <div>
      <div class="row" >
        <img src="cbic.png" class="img-fluid" style="width:250px;height:210px;">
      </div>

    </div>
    <div class="form_container">
      <div class="title_container">
        <h2>Registration Form</h2>
      </div>
      <div class="row clearfix">
        <div class="">
          <form action="regsub.php" method="post" enctype="multipart/form-data">
            <div class="input_field"> <span><i aria-hidden="true" class="fa fa-envelope"></i></span>
              <input type="email" name="email" placeholder="Email" required />
            </div>
            <div class="input_field"> <span><i aria-hidden="true" class="fa fa-lock"></i></span>
              <input type="password" name="pass" placeholder="Password" required />
            </div>
            <div class="input_field"> <span><i aria-hidden="true" class="fa fa-lock"></i></span>
              <input type="password" name="cpass" placeholder="Re-type Password" required />
            </div>
            <div class="row clearfix">
              <div class="col_half">
                <div class="input_field"> <span><i aria-hidden="true" class="fa fa-user"></i></span>
                  <input type="text" name="fname" placeholder="First Name" />
                </div>
              </div>
              <div class="col_half">
                <div class="input_field"> <span><i aria-hidden="true" class="fa fa-user"></i></span>
                  <input type="text" name="lname" placeholder="Last Name" required />
                </div>
              </div>
            </div>

            <div class="input_field select_option">
              <select name="level" id="level" onchange="showLevel()" required>
                <option value="0">Select Designation</option>
                <option value="1">Chief Commissioner</option>
                <option value="2">Commissioner</option>
                <option value="3">Assistant Commissioner</option>
                <option value="4">Range Officer</option>
              </select>
              <div class="select_arrow"></div>
            </div>

            <div class="input_field select_option" id="levelSelector">

              <select class="input_field select_option" id="zone" name="zone" style="display:none;" >
                <option value="0">Select Zone</option>
                <!--Select Box for Showing Options-->

                <?php
                $select_category = "SELECT * FROM `zone` where `level`=1 order by ZCDR_NAME";
                $res = mysqli_query($conn, $select_category);
                if (mysqli_num_rows($res) > 0) {

                  while ($rs = mysqli_fetch_assoc($res)) {

                ?>
                    <option value='<?php echo $rs['ZCDR_CODE']; ?>' id="zone"><?php echo $rs['ZCDR_NAME']; ?>
                      <!--Showing Category in Select Box-->
                    </option>
                <?php

                  }
                }


                ?>
              </select>
              <div class="select_arrow"></div>
            </div>


            <div class="input_field select_option">
              <!--Comm SELET STARTS HERE-->

              <select class="input_field select_option" id="comm" name="comm" style="display:none;" >
                <option value="0">Select Commissionerate</option>

                <!--Select Box for Showing Options-->



                <?php




                ?>

              </select>
              <div class="select_arrow"></div>
            </div>



            <!--Comm SELET STARTS HERE-->
            <div class="input_field select_option">

              <select class="input_field select_option" id="asst_comm" name="asst_comm" onchange="showComm()" style="display:none;" >
                <option value="0">Select Division</option>

                <!--Select Box for Showing Options-->
              </select>
              <div class="select_arrow"></div>
            </div>

            <div class="input_field select_option">

              <select class="input_field select_option" id="range" name="range" onchange="showComm()" style="display:none;" >
                <option value="0">Select Range</option>

                <!--Select Box for Showing Options-->
              </select>
              <div class="select_arrow"></div>




            </div>
            <div class="input_field checkbox_option">
              <input type="checkbox" id="cb1">
              <label for="cb1">I agree with terms and conditions</label>
            </div>
            <h1 id="demo"></h1>

            <input class="button" type="submit" name="submit" value="submit" />
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- partial -->
  <script src='https://use.fontawesome.com/4ecc3dbb0b.js'></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script type="text/javascript" src=".//scripts//regdropdowns.js"></script>
  <script>
    $(document).ready(function() {

      var zcdr;

      $('#zone').on('change', function() {

        var zcdr_code = this.value;
       
        $.ajax({
          url: "getcomm.php",
          type: "POST",
          data: {
            zcdr_code: zcdr_code
          },
          cache: false,
          success: function(result) {
            $("#comm").html(result);
            //$('#city-dropdown').html('<option value="">Select State First</option>'); 
          }
        });
      });
      $('#comm').on('change', function() {
        var comm_code = this.value;
       

        // alert(comm_code);
        $.ajax({
          url: "get_asst_comm.php",
          type: "POST",
          data: {
            comm_code: comm_code
          },
          cache: false,
          success: function(result) {
            $("#asst_comm").html(result);
          }
        });
      });

      $('#asst_comm').on('change', function() {
        var div_code = this.value;
       

        // alert(comm_code);
        $.ajax({
          url: "get_range.php",
          type: "POST",
          data: {
            div_code: div_code
          },
          cache: false,
          success: function(result) {
            $("#range").html(result);
          }
        });
      });

      $('#range').on('change', function() {
        var range = this.value;
       
     
      });


     


    });


  

  </script>
</div>
</body>

</html>