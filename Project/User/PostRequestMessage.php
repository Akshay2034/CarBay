
<?php 
     include("../connection/Connection.php");
	 
	 session_start();


	if(isset($_POST['btnsubmit']))
	{
  			$message=$_POST['txtname'];
		
			$subject=$_POST['txtsubject'];
			
 			$insQuery= "insert into tbl_servicerequest(request_subject,request_message,request_date,user_id,service_id)values('$subject','$message',curdate(),'".$_SESSION["uid"]."','".$_SESSION["proid"]."')";
			mysql_query($insQuery,$con) or die(mysql_error());
 			echo "<b>Posted successfully!";
	    	echo "<meta http-equiv=Refresh content=6;url=PostedMessages.php>"; 
		
	}



    
?>




<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>RequestMessage</title>
</head>

<body>
<?php
include("header.php");
?>

<form id="form1" name="form1" method="post" action="">

  <table width="383" height="117" border="1" align="center">
  <tr>
    <td>Subject</td>
    <td><label for="txtsubject"></label>
      <input name="txtsubject" type="text" id="txtsubject" size="40" /></td>
  </tr>
    <tr>
      <td width="122">Message </td>
      <td width="140"><textarea name="txtname" cols="40" id="txtname"></textarea></td>
    </tr>
    
   
  
  
     
  
  
    
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btnsubmit" value="Submit"/></td>
    </tr>
    
  </table>
  
  
</form>

</body>
</html>

