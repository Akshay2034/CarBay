<?php
		include("../Connection/Connection.php");
	if(isset($_POST["btn_save"]))
	{
		$up="update tbl_complaint set complaint_reply='".$_POST["txt_reply"]."',complaint_status=1 where complaint_id='".$_GET["del"]."'";
		mysql_query($up);
		header("location:HomePage.php");
	}
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
</head>
<?php
include("header.php");
?>

<body>
<a href="HomePage.php">Home</a>
<form id="form1" name="form1" method="post" action="">
  <table width="200" border="1" align="center" cellpadding="10" style="border-collapse:collapse">
    <tr>
      <td>Reply</td>
      <td><label for="txt_reply"></label>
      <textarea name="txt_reply" id="txt_reply" cols="45" rows="5"></textarea></td>
    </tr>
    <tr>
      <td colspan="2"><input type="submit" name="btn_save" id="btn_save" value="Send" /></td>
    </tr>
  </table>
</form>

</body>
</html>


