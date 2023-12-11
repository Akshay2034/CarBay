<?php
		include("../Connection/connection.php");
		
		

	
	if($_GET["rej"])
	{
		$rej="update tbl_workshop set workshop_status='2' where workshop_id='".$_GET["rej"]."'";
		mysql_query($rej);
	}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>WorkShopList</title>
</head>

<?php
include("header.php");

?>

<body>


 <table width="698" height="102" border="1" align="center">
    <tr>
      <td>SI No</td>
      <td>District</td>
      <td>Place</td>
      <td>WorkshopName</td>
      <td>ContactNumber</td>
      <td>EmailID</td>
      <td>Address</td>
      <td>DOJ</td>
      <td>Proof</td>
      <td>Logo</td>
    </tr>
    <?php
	$i=0;
	$selquery="select * from tbl_workshop w inner join tbl_place p on w.place_id=p.place_id inner join tbl_district d on p.district_id=d.district_id where w.workshop_status='1'";
	
	$row = mysql_query($selquery);
	while($data=mysql_fetch_array($row))
    {
	     $i++;
		 ?>
         <tr>
         <td><?php echo $i;?></td>
         <td><?php echo $data["district_name"];?></td>
         <td><?php echo $data["place_name"];?></td>
         <td><?php echo $data["workshop_name"];?></td>
         <td><?php echo $data["workshop_contact"];?></td>
         <td><?php echo $data["workshop_email"];?></td>
         <td><?php echo $data["workshop_address"];?></td>
         <td><?php echo $data["workshop_doj"];?></td>
          <td><img src="../Assets/Companyproof/<?php echo $data["workshop_proof"];?>" width="50" height="50" /></td>
          <td><img src="../Assets/Companylogo/<?php echo $data["workshop_photo"];?>" width="50" height="50" /></td>
        
          <td> <a href="WorkShopList-New.php?rej=<?php echo $data["workshop_id"];?>">Reject</a></td>
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
