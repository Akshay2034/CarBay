<?php
include("../connection/Connection.php");
session_start();
if(isset($_POST["btn_update"]))
{
	$currentpwd=$_POST["txt_currentpassword"];
	$newpwd=$_POST["txt_newpassword"];
	$confirmpwd=$_POST["txt_resetpassword"];
	
	

 
$seluser="select * from tbl_user where user_id='".$_SESSION["uid"]."'";
$row=mysql_query($seluser);
$data=mysql_fetch_array($row);
if($currentpwd==$data["user_password"])
{
	if($newpwd==$confirmpwd)
	{
	$updatepwd="update tbl_user set user_password='".$_POST["txt_newpassword"]."' where user_id='".$_SESSION["uid"]."'";
    mysql_query($updatepwd);
    echo" <script>alert('password updated')</script>";
	}
	else
	{
		echo"<script>alert('Mismatch')</script>";
	}
}
else
{
echo" <script>alert('invalid password')</script>";
}
}
?>







<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
</head>

<body>
<?php
include("header.php");
?>
<form id="form1" name="form1" method="post" action="">
  <table width="409" height="119" border="1" align="center">
    <tr>
      <td width="214" height="29">CURRENT PASSWORD</td>
      <td width="124"><label for="txt_currentpassword"></label>
      <input type="text" name="txt_currentpassword" id="txt_currentpassword" /></td>
    </tr>
    <tr>
      <td>NEW PASSWORD</td>
      <td><label for="txt_newpassword"></label>
      <input type="text" name="txt_newpassword" id="txt_newpassword" /></td>
    </tr>
    <tr>
      <td>RESET PASSWORD</td>
      <td><label for="txt_resetpassword"></label>
      <input type="text" name="txt_resetpassword" id="txt_resetpassword" /></td>
    </tr>
    <tr>
    <center>
      <td colspan="2" align="center"><input type="submit" name="btn_update" id="btn_update" value="update" /></td>
      </center>
    </tr>
  </table>
</form>
</body>
</html>