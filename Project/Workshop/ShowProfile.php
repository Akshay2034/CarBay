<?php 


        include("../connection/Connection.php");
	  
	  session_start();
	  $selQry="select * from  tbl_workshop  where workshop_email='".$_SESSION['username']."'";
  	  $sel=mysql_query($selQry,$con)or die(mysql_error());
  	  $row=mysql_fetch_array($sel)or die(mysql_error());
	  
   				
	 ?>






<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>My Profile</title>
</head>

<body>
<?php
include("header.php");
?>
<table width="200" border="1" align="center">
  <tr>
    <td>Name</td>
    <td><?php echo $row['workshop_name'];?></td>
  </tr>
  <tr>
    <td>Contact</td>
    <td><?php echo $row['workshop_contact'];?></td>
  </tr>
  <tr>
    <td>Email</td>
    <td><?php echo $row['workshop_email'];?></td>
  </tr>
  
 
</table> 
</body>
</html>