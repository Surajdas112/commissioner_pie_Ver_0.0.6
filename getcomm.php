<?php
include("inc/connection.php");
$zcdr_code = $_POST["zcdr_code"];
$result = mysqli_query($conn,"SELECT * FROM zone WHERE ZCDR_CODE LIKE '".$zcdr_code."%' and level= 2 order by ZCDR_NAME");
?>
<option value="0">Select Commissionerate</option>
<?php
while($row = mysqli_fetch_array($result)) {
?>
<option value="<?php echo substr($row["ZCDR_CODE"], -2);?>"><?php echo $row["ZCDR_NAME"];?></option>
<?php
}
?>