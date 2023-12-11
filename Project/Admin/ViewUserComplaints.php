<?php
		 include("../connection/Connection.php");
	
		
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
<form action="" method="post" enctype="multipart/form-data">
<table width="606" height="111" border="1" align="center" cellpadding="10">
  <tr>
    <td>SI No</td>
    <td>Type</td>
    <td>Complaint</td>
    <td>UserName</td>
    <td>Contact</td>
     <td>Email</td>
    <td>Date</td>
  </tr>
  <?php
  $sel="select * from tbl_complaint c inner join tbl_user u on c.user_id=u.user_id inner join tbl_complainttype t on t.ctype_id=c.ctype_id where c.complaint_status=0";
  $row=mysql_query($sel);
  $i=0;
  while($data=mysql_fetch_array($row)) 
  {
	  $i++;
  ?>
  <tr>
    <td><?php echo $i;?></td>
     <td><?php echo $data["ctype_name"];?></td>
      <td><?php echo $data["complaint_details"];?></td>
       <td><?php echo $data["user_name"];?></td>
        <td><?php echo $data["user_contact"];?></td>
    <td><?php echo $data["user_email"];?></td>
    <td><?php echo $data["complaint_date"];?></td>
    <td><a href="ComplaintReply-User.php?del=<?php echo $data["complaint_id"];?>" >Reply</a></td>
  </tr>
  <?php
  }
  ?>
</table>
</form>


</body>
</html>


