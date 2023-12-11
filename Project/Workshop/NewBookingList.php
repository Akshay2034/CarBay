<?php
     include("../connection/connection.php");
	
		 session_start();
	 
	 $id=$_REQUEST['acid'];
	 if($_GET['ac'])
      {
 				$up="update tbl_productbooking  set pbooking_status='1' where pbooking_id='".$id."'";
 				mysql_query($up,$con) or die(mysql_error());
 				echo "<b>Updated successfully!";
	    		echo "<meta http-equiv=Refresh content=6;url=NewBookingList.php>";
		
      }
	 
	 
	 
	 $id1=$_REQUEST['rejid'];
	 if($_GET['rej'])
      {
 				$rejq="update tbl_productbooking  set pbooking_status='2' where pbooking_id='".$id1."'";
 				mysql_query($rejq,$con) or die(mysql_error());
 				echo "<b>Updated successfully!";
	    		echo "<meta http-equiv=Refresh content=6;url=NewBookingList.php>";
		
      }


?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>BookingList</title>


</head>

<body>
<?php
include("header.php");
?>

  
</body>
</html>



  
  <br /><br />
    <table width="453" height="92" border="1" align="center">
    <tr>
    <th width="166">Image</td>
     <th width="166">Category</td>
     <th width="166">Sub Category</td>
 	<th width="166">Product Name</td>
     <th width="166">Rate</td>
      <th width="166">Qty</td>
       <th width="166">Total</td>
  <th width="166">BookingDate</td>
 <th width="166">Username</td>
  <th width="166">Contact</td>
   <th width="166">Email</td>
  <th width="166">Address</td>
    </tr>
    
    <?php
   		 	$Selquery="select * from tbl_productbooking pb inner join tbl_workshopproduct o on pb.product_id=o.product_id inner join tbl_sparesubcategory p on o.sparesubcat_id=p.sparesubcat_id inner join  tbl_sparecategory  t on p.sparecat_id=t.sparecat_id inner join tbl_user s on s.user_id=pb.user_id where pb.pbooking_status='0' and o.workshop_id='".$_SESSION["uid"]."'";
			
  			$sel=mysql_query($Selquery,$con)or die(mysql_error());
  			while($row=mysql_fetch_array($sel)or die(mysql_error()))
   				{
	 ?>
     
     <tr>
      <td>
       <img src="../Assets/Photo/<?php echo $row['product_photo'];?>" width="50" height="50" />
       </td>
      <td>
               <?php echo $row['sparecat_name'];?>
       </td>
       <td>
               <?php echo $row['sparesubcat_name'];?>
       </td>
      
      
        <td>
               <?php echo $row['product_name'];?>
       </td>
        <td>
               <?php echo $row['product_rate'];?>
       </td>
        <td>
               <?php echo $row['pbooking_qty'];?>
       </td>
           <td>
               <?php echo $row['pbooking_amt'];?>
       </td>
          <td>
               <?php echo $row['pbooking_date'];?>
       </td>
          <td>
               <?php echo $row['user_name'];?>
       </td>
          <td>
               <?php echo $row['user_contact'];?>
       </td>
        <td>
               <?php echo $row['user_email'];?>
       </td>
        <td>
               <?php echo $row['user_address'];?>
       </td>
       <td width="85">
          <a href="NewBookingList.php?ac=1&amp;acid=<?php echo $row['pbooking_id'];?>">Accept</a>
         <a href="NewBookingList.php?rej=1&amp;rejid=<?php echo $row['pbooking_id'];?>">Reject</a>
          </td>
     </tr>
     <?php	
         }
      ?>
 
    
  </table>