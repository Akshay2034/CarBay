
<?php 
     include("../connection/Connection.php");
	 
	 
session_start();

	


     if($_GET['delid'])
      {
		  	$_SESSION["proid"]= $_GET['delid'];
 			header("location:PostRequestMessage.php");	
		
      }

?>




<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ServiceRate</title>
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
      
 
    </tr>
    
    <?php
   		 	$Selquery="select * from tbl_servicerate c inner join  tbl_servicetype t on c.servicetype_id=t.servicetype_id where c.workshop_id='".$_SESSION["selid"]."'";
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
       
        
       <td width="85">
          <a href="ServiceRate.php?del=1&amp;delid=<?php echo $row['service_id'];?>">PostRequestMessage</a>
         
          </td>
       
     </tr>
     <?php	
         }
      ?>
 
    
  </table>
  
</form>

</body>
</html>

