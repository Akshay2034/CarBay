<?php
     include("../connection/connection.php");
	
		 session_start();
	 
	


?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>BookingList</title>


</head>

<?php
include("Header.php");
?>
<body>


  
</body>
</html>



  
  <br /><br />
     <br /><br />
     <h1 align="center">My Package Details</h2>
    <table width="453" height="92" border="1" align="center">
    <tr>
 
     <th width="166">Packege Name</td>
    
 	<th width="166">Duration</td>
     <th width="166">Rate</td>
      <th width="166">Expire date</td>
    </tr>
    
    <?php
   		 	$Selquery="select * from  tbl_workshop s inner join tbl_package p on p.package_id=s.package_id  where s.workshop_id='".$_SESSION["uid"]."'";
			//echo $Selquery;
  			$sel=mysql_query($Selquery);
  			while($row=mysql_fetch_array($sel))
   				{
	 ?>
     
     <tr>

      <td>
               <?php echo $row['package_name'];?>
       </td>
      
      
        <td>
               <?php echo $row['package_duration'];?>
       </td>
        <td>
               <?php echo $row['package_amt'];?>
       </td>
        <td>
               <?php echo $row['date'];?>
       </td>
          
      
   
 
       
     </tr>
     <?php	
         }
      ?>
 
    
  </table>