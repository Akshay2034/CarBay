<?php
include("../connection/Connection.php");
session_start();
 
 
$seluser="select * from tbl_user where user_id='".$_SESSION["uid"]."'";
$row = mysql_query($seluser);
$data = mysql_fetch_array($row);

if(isset($_POST["btm_back"]))
{
header("Location:HomePage.php");	
}



if(isset($_POST["button"]))
{
	$update="update tbl_user set 	user_name='".$_POST["txt_name"]."',	user_contact='".$_POST["txt_contact"]."',user_address='".$_POST["txt_address"]."',user_email='".$_POST["txt_email"]."'where user_id='".$_SESSION["uid"]."'";
	
	(mysql_query($update));
	echo"<script>alert('data updated')</script>";
	 header("Location:Editprofile.php");



}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>EditProfile</title>
</head>

<body>
<?php
include("header.php");
?>
<form id="form1" name="form1" method="post" action="">
<table width="324" border="1" align="center">
<tr>
<td width="172">NAME</td>
<td width="136"><label for="txt_name"></label>
  <input type="text" name="txt_name" id="txt_name" value="<?php echo $data["user_name"]; ?>" /></td>
</tr>
<tr>
<td>CONTACT</td>
<td><label for="txt_contact"></label>
  <input type="text" name="txt_contact" id="txt_contact" value="<?php echo $data["user_contact"]; ?>" /></td>
</tr>
<tr>
<td>ADDRESS</td>
<td><label for="txt_address"></label>
  <input type="text" name="txt_address" id="txt_address" value="<?php echo $data["user_address"]; ?>"/></td>
</tr>
<tr>
<td>EMAIL</td>
<td><label for="txt_email"></label>
  <input type="text" name="txt_email" id="txt_email" value="<?php echo $data["user_email"]; ?>" /></td>
</tr>
<tr>
<center>
<td colspan="2" align="center"><input type="submit" name="button" id="button" value="UPDATE" />
  <input type="submit" name="btm_back" id="btm_back" value="Back" /></td>
  </center>
</tr>
</table>
</form>
</body>
</html>

