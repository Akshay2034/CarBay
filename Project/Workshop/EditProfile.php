
<?php 
     include("../connection/connection.php");
	  
	  session_start();
	  $selQry="select * from tbl_workshop  where workshop_email='".$_SESSION['username']."'";
  	  $sel=mysql_query($selQry,$con)or die(mysql_error());
  	  $row=mysql_fetch_array($sel)or die(mysql_error());
	  
	  if(isset($_POST['btnsubmit']))
	   {
  		   
			$contact=$_POST['txtcontact'];
			$email=$_POST['txtemail'];
			

 		    $upQry= "update tbl_workshop set workshop_contact='".$contact."',workshop_email='".$email."' where workshop_email='".$_SESSION['username']."'";
 		    //echo $insQuery;
		    mysql_query($upQry,$con) or die(mysql_error());
 		    echo "<b>Updated Completed Successfully!";
			echo "<meta http-equiv=Refresh content=2;url=HomePage.php>"; 
	 	   // header("location:Course.php");
	   }
	   
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Edit Profile</title>
</head>

<body>

<?php
include("header.php");
?>

<form action="" method="post" name="frmReg">
<table width="200" border="1" align="center">
 
 
  <tr>
    <td>Contact</td>
    <td><input name="txtcontact" type="text" value="<?php echo $row['workshop_contact'];?>" / required="required" autocomplete="off" autofocus="autofocus" ></td>
  </tr>
  <tr>
    <td>Email</td>
    <td><input name="txtemail" type="text" value="<?php echo $row['workshop_email'];?>" / required="required" autocomplete="off"></td>
  </tr>
 

    <tr>
    <td colspan="2" align="center">
    <input name="btnsubmit" type="submit" value="Submit" />
    </td>
   
  </tr>
</table> 
 

</form>
</body>
</html>