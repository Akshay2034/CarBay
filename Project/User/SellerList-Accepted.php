
<?php 
     include("../connection/connection.php");
	 
	 session_start();
	 
	 $id=$_REQUEST['delid'];
	 
	 if($_GET['del'])
      {
		  	$_SESSION["selid"]= $id;
 			header("location:ViewProductList.php");	
		
      }
	 
	
   
?>




<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SellerList</title>
</head>

<body>
<?php
include("header.php");
?>


  
  <br /><br />
    <table width="614" height="102" border="1" align="center">
    <tr>
    <th width="166">District <th width="166">Place 
      <th width="166">Photo</td>
 <th width="166">Name</td>
  <th width="166">Email</td>
 <th width="166">Contact</td>

 <th width="166">Address</td>
 <th width="166">DOJ</td>
 <th width="166">Proof</td>
 
    </tr>
    
    <?php
   		 	$Selquery="select * from   tbl_workshop  o inner join tbl_place p on o.place_id=p.place_id inner join tbl_district t on p.district_id=t.district_id where o.workshop_status='1'";
		
  			$sel=mysql_query($Selquery,$con)or die(mysql_error());
  			while($row=mysql_fetch_array($sel)or die(mysql_error()))
   				{
	 ?>
     
     <tr>
      <td>
               <?php echo $row['district_name'];?>
       </td>
       <td>
               <?php echo $row['place_name'];?>
       </td>
       <td>
       <img src="../Assets/Companylogo/<?php echo $row['workshop_photo'];?>" width="50" height="50" />
       </td>
        <td>
               <?php echo $row['workshop_name'];?>
       </td>
        <td>
               <?php echo $row['workshop_email'];?>
       </td>
        <td>
               <?php echo $row['workshop_contact'];?>
       </td>
        <td>
               <?php echo $row['workshop_address'];?>
       </td>
       
        <td>
               <?php echo $row['workshop_doj'];?>
       </td>
        <td>
      <a href="../Assets/Companyproof/<?php echo $row['workshop_proof'];?>"> <img src="../Assets/Companyproof/<?php echo $row['workshop_proof'];?>" width="50" height="50" /></a>
       </td>
        <td><a href="SellerList-Accepted.php?del=1&amp;delid=<?php echo $row['workshop_id'];?>">ViewProduct</a></td>
       
     </tr>
     <?php	
         }
      ?>
 
    
  </table>
  
</form>

</body>
</html>

