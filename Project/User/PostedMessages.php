
<?php 
     include("../connection/Connection.php");
	 
	 session_start();



   

?>




<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
</head>

<body>
<?php
include("header.php");
?>

		
    
  
  
  <br /><br />
    <table width="453" height="92" border="1" align="center">
    <tr>
    <th width="166">ServiceType</td>
    <th width="166">Rate</td>
      <th width="166">Subject</td>
      <th width="166">Message</td>
      <th width="166">Date</td>
       <th width="166">Replay</td>
  <th width="166">Workshop</td>
      <th width="166">Email</td>
      <th width="166">Contact</td>

    </tr>
    
    <?php
   		 	$Selquery="select * from tbl_servicerequest  p  inner join tbl_servicerate s on s.service_id=p.service_id inner join tbl_workshop ws on ws.workshop_id=s.workshop_id inner join tbl_servicetype st on st.servicetype_id=s.servicetype_id where p.user_id='".$_SESSION["uid"]."'";
  			$sel=mysql_query($Selquery,$con)or die(mysql_error());
  			while($row=mysql_fetch_array($sel)or die(mysql_error()))
   				{
	 ?>
     
     <tr>
     <td>
               <?php echo $row['servicetype_name'];?>
       </td>
       <td>
               <?php echo $row['service_rate'];?>
       </td>
       <td>
               <?php echo $row['request_subject'];?>
       </td>
       <td>
               <?php echo $row['request_message'];?>
       </td>
       <td>
               <?php echo $row['request_date'];?>
       </td>
        <td>
               <?php echo $row['request_replay'];?>
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
        
       
       
     </tr>
     <?php	
         }
      ?>
 
    
  </table>
  
</form>

</body>
</html>

