<?php
		include("../connection/connection.php");
			
			if(isset($_POST["btnsave"]))
			{
				if($_POST["txtpassword"]==$_POST["txtconfirmpassword"])
				{
					
			
					$Companyname=$_POST["txtname"];
					$Companycontact=$_POST["txtcontact"];
					$Companyemail=$_POST["txtemail"];
					$Companyaddress=$_POST["txtaddress"];
					$Placeid=$_POST["ddnplace"];
					$password=$_POST["txtpassword"];

$ins="insert into tbl_user(user_name,user_contact,user_email,user_address,
place_id,user_password,user_doj,user_isactive)values('".$Companyname."','".$Companycontact."','".$Companyemail."','".$Companyaddress."','".$Placeid."',
'".$password."',curdate(),'0')";
			         //echo $ins;
			         mysql_query($ins);
			
				
			}
			}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>User Registration</title>
<script src="../JQ/jQuery.js"></script>
<script>
function getPlace(did)
{

	$.ajax({
	  url:"../Ajaxpages/Ajaxplace.php?did="+did,
	  success: function(html){
		$("#ddnplace").html(html);
	  }
	});
}
</script>

<?php

include("header.php");
?>
<body>
<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <table width="536" height="432"  align="center">
   <tr>
      <td>District </td>
      <td><label for="ddndistict"></label>
        <select name="ddndistict" id="ddndistict" onchange="getPlace(this.value)" required autofocus="autofocus">
         <option>---select---</option>
          <?php
		$sel="select * from tbl_district";
		$rows=mysql_query($sel);
		$i=0;
		while($data=mysql_fetch_array($rows))
		{
		
		?>
        <option value="<?php echo $data['district_id']?>"><?php echo $data['district_name']?></option>
        <?php
		}
		?>
      </select></td>
    </tr>
    <tr>
      <td>Place </td>
      <td><label for="ddnplace"></label>
        <select name="ddnplace" id="ddnplace">
        <option>---select---</option>
      </select></td>
    </tr>
    <tr>
      <td> Name</td>
      <td><label for="txtname"></label>
      <input type="text" name="txtname" id="txtname"  required="required" autocomplete="off" pattern="[A-Za-z ]*$" /></td>
    </tr>
    <tr>
      <td> Contact</td>
      <td><label for="txtcontact"></label>
      <input type="text" name="txtcontact" id="txtcontact" required="required" pattern="^[7-9][0-9]{9}$" autocomplete="off" /></td>
    </tr>
    <tr>
      <td> Email</td>
      <td><label for="txtemail"></label>
        <label for="txtemail2"></label>
      <input type="text" name="txtemail" id="txtemail2"  required="required" autocomplete="off"/></td>
    </tr>
    <tr>
      <td> Address</td>
      <td><label for="txtaddress"></label>
      <textarea name="txtaddress" id="txtaddress" cols="45" rows="5" required="required"></textarea></td>
    </tr>
    
    <tr>
      <td>Password</td>
      <td><label for="txtpassword"></label>
      <input type="password" name="txtpassword" id="txtpassword"  required="required" autocomplete="off" /></td>
    </tr>
    <tr>
      <td>Confirm Password</td>
      <td><label for="txtconfirmpassword"></label>
      <input type="password" name="txtconfirmpassword" id="txtconfirmpassword" required="required" autocomplete="off" /></td>
    </tr>
   
    <tr>
      <td colspan="2"align="center"><input type="submit" name="btnsave" id="btnsave" value="Save" />
      <input type="submit" name="btncancel" id="btncancel" value="cancel" /></td>
    </tr>
  </table>
</form>
</body>
</html>

<?php

include("footer.php");
?>