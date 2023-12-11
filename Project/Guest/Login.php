<?php
	 include("../Connection/connection.php");
	
	if(isset($_POST['btnlogin']))
	{
		
		
		$selQry="select * from tbl_admin where admin_username='".$_POST['txtuname']."' and admin_password='".$_POST['txtpass']."'";
        $sellog=mysql_query($selQry);
        $count=mysql_num_rows($sellog);
		
		
		
		
		$selQry1="select * from tbl_workshop where workshop_email='".$_POST['txtuname']."' and 	workshop_password='".$_POST['txtpass']."' and workshop_status='1'";
		echo $selQry1;
        $sellog1=mysql_query($selQry1);
        $count1=mysql_num_rows($sellog1);
  		$row1=mysql_fetch_array($sellog1);
		
		
		$selQry2="select * from tbl_user where user_email='".$_POST['txtuname']."' and 	user_password='".$_POST['txtpass']."'";
        $sellog2=mysql_query($selQry2);
        $count2=mysql_num_rows($sellog2);
		$row2=mysql_fetch_array($sellog2);
		
		
  			
			
		
        if($count>0)
         {
              session_start();
              $_SESSION['username']=$_POST['txtuname'];
              header('location:../Admin/HomePage.php');
         }
		else if($count1>0)
         {
               session_start();
              $_SESSION['username']=$_POST['txtuname'];
			  $_SESSION['lguser']=$row1['workshop_id'];
			  $_SESSION["uid"]=$row1['workshop_id'];
              header('location:../Workshop/HomePage.php');
         }
		 	else if($count2>0)
         {
              session_start();
              $_SESSION['username']=$_POST['txtuname'];
			  $_SESSION['lguser']=$row2['user_id'];
			  $_SESSION["uid"]=$row2['user_id'];
              header('location:../User/HomePage.php');
         }
      else
	  {
                  echo "<script> alert('Invalid Username or password')</script>";
	  }
   }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login</title>
</head>

<?php

include("header.php");
?>
<body>
<form name="frm1" method="post">
<table width="286" height="95"  align="center">
 
  
  <tr>
    <td width="117">User Name</td>
    <td width="120"><input type="text" name="txtuname" id="txtuname" required="required" autocomplete="off" autofocus="autofocus" ></td>
  </tr>
  <tr>
    <td>Password</td>
    <td><input type="password" name="txtpass" id="txtpass" required="required" autocomplete="off"></td>
  </tr>
  <tr>
    
    <td colspan="2" align="center"><input type="submit" name="btnlogin" value="Login"/></td>  </tr>
  <tr>
    <td colspan="2" align="center"><a href="NewUser.php">NewUser</a>   <a href="NewWorkShop.php">NewWorkShop</a></td>
  </tr>

</table>
<p align="center"><label></label></p>

</form>
</body>
</html>

<?php

include("footer.php");
?>