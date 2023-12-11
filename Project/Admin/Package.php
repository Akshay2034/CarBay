<?php
include("../connection/connection.php");
?>


<?php
if(isset($_POST["btn_save"]))
{
	$txtpackage=$_POST["txtpackage"];
	$txtduration=$_POST["txtduration"];
		$amount=$_POST["amount"];
	$in="insert into  tbl_package(package_name,package_duration,package_amt)values('".$txtpackage."','".$txtduration."','".$amount."')";
	mysql_query($in);
	//echo $in;
}







?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Place</title>
</head>
<?php
include("header.php");

?>
<body>

<br /><br /><br /><br /><br /><br />
<form id="form1" name="form1" method="post" action="">

  <table width="519" height="149" align="center">
  
  
  
    <tr>
   
    
    
    <tr>
      <td>Package Name</td>
      <td><label for="btn_place"></label>
      <input type="text" name="txtpackage" id="txtpackage" /></td>
    </tr>
     <tr>
      <td>Duration</td>
      <td><label for="btn_place"></label>
      <input type="text" name="txtduration" id="txtduration" /></td>
    </tr>
     <tr>
      <td>Amount</td>
      <td><label for="btn_place"></label>
      <input type="text" name="amount" id="amount" /></td>
    </tr>
    
    
    <tr>
      <td colspan="2"><div align="center">
        <input type="submit" name="btn_save" id="btn_save" value="save" />
        <input type="submit" name="btn_cancel" id="btn_cancel" value="cancel" />
      </div></td>
    </tr>
  </table>

</form>
</body>
</html>
<?php
include("footer.php");

?>