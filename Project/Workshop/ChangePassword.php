<?php 


	include("../Connection/Connection.php");
	  
	  if(isset($_POST['btnSubmit']))
	   {
	  		session_start();
			$selQry="select * from tbl_workshop  where workshop_email='".$_SESSION['username']."' 
			and workshop_password='".$_POST['txtcurrent']."'";
            $sellog=mysql_query($selQry);
            $count=mysql_num_rows($sellog);
            if($count>0)
             {
	           $upQry= "update tbl_workshop set workshop_password='".$_POST['txtnew']."' where 
			   workshop_name='".$_SESSION['username']."'";
		       mysql_query($upQry,$con) or die(mysql_error());
 		       echo "<b>Updated Completed Successfully!";
			   echo "<meta http-equiv=Refresh content=2;url=HomePage.php>";
			 }
			 else
			 {
				 echo "<b>Invalid Password !!!";
			 }
	   }
	  
   				
	 ?>




<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Change Password</title>
</head>

<body>
<?php
include("header.php");
?>
<form name="frmchange" method="post">
<table width="253" border="1" align="center">
 
  
  <tr>
    <td width="117">CurrentPassword</td>
    <td width="120"><input type="password" name="txtcurrent" id="txtcurrent" / required="required" autocomplete="off" autofocus="autofocus" ></td>
  </tr>
  <tr>
    <td>NewPassword</td>
    <td><input type="password" name="txtnew" id="txtnew" / required="required" autocomplete="off" ></td>
  </tr>
    <tr>
    <td>Retype</td>
    <td><input type="password" name="txtrtype" id="txtrtype" / required="required" autocomplete="off" ></td>
  </tr>
  <tr>
    
    <td colspan="2" align="center"><input type="submit" name="btnSubmit" value="Update"/></td>  </tr>

</table>
<p align="center"><label></label></p>

</form>
</body>
</html>