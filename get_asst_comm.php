<?php
include("inc/connection.php");
$comm_code = $_POST["comm_code"];
$result = mysqli_query($conn,"SELECT * FROM zone WHERE ZCDR_CODE LIKE '".$comm_code."%' and level= 3 order by ZCDR_NAME;");
?>
<option value="0">Select Division</option>
<?php
while($row = mysqli_fetch_array($result)) {
?>
<option value="<?php echo $row["ZCDR_CODE"];?>"><?php echo $row["ZCDR_NAME"];?></option>
<?php
}   
?>