<?php
include("inc/connection.php");
$div_code = $_POST["div_code"];
$result = mysqli_query($conn,"SELECT * FROM zone WHERE ZCDR_CODE LIKE '".$div_code."%' and level= 4 order by ZCDR_NAME;");
?>
<option value="0">Select Range</option>
<?php
while($row = mysqli_fetch_array($result)) {
?>
<option value="<?php echo $row["ZCDR_CODE"];?>"><?php echo $row["ZCDR_NAME"];?></option>
<?php
}
?>