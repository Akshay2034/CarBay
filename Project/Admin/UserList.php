<?php
		include("../Connection/connection.php");
		
		

	

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>UserList</title>
</head>

<?php
include("header.php");

?>


<body>

 <table width="200" border="1" align="center">
    <tr>
      <td>Si no</td>
      <td>District</td>
      <td>Place</td>
      <td>Name</td>
      <td>ContactNumber</td>
      <td>EmailID</td>
      <td>Address</td>
      <td>DOJ</td>
     
   </tr>
    <?php
	$i=0;
	$selquery="select * from tbl_user w inner join tbl_place p on w.place_id=p.place_id inner join tbl_district d on p.district_id=d.district_id";
	
	$row = mysql_query($selquery);
	while($data=mysql_fetch_array($row))
    {
	     $i++;
		 ?>
         <tr>
         <td><?php echo $i;?></td>
         <td><?php echo $data["district_name"];?></td>
         <td><?php echo $data["place_name"];?></td>
         <td><?php echo $data["user_name"];?></td>
         <td><?php echo $data["user_contact"];?></td>
         <td><?php echo $data["user_email"];?></td>
         <td><?php echo $data["user_address"];?></td>
         <td><?php echo $data["user_doj"];?></td>
         
        
         
         </tr>
         <?php
	
         }	
	
	
         ?>
  </table>


</body>
</html>

<?php
//include("footer.php");

?>
