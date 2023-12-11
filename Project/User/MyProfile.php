
<?php
include("../connection/Connection.php");
session_start();
 
 
$seluser="select * from tbl_user where user_id='".$_SESSION["uid"]."'";
$row=mysql_query($seluser);
$data=mysql_fetch_array($row);

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
<form id="form1" name="form1" method="post" action="">
  <table width="200" border="1" align="center">
    <tr>
      <td width="71">Name</td>
      
      <td width="107"><?php echo $data["user_name"]; ?></td>
    </tr>
    <tr>
      <td>Address</td>
      <td><?php echo $data["user_address"]; ?></td>
    </tr>
    <tr>
      <td>Contact</td>
      <td><?php echo $data["user_contact"]; ?></td>
    </tr>
    <tr>
      <td>Email</td>
      <td><?php echo $data["user_email"]; ?></td>
    </tr>
    <tr>
    
    </tr>
  </table>
</form>
</body>
</html>