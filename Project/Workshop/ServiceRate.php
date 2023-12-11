
<?php 
     include("../connection/Connection.php");
	 
	 
session_start();

	if(isset($_POST['btnsubmit']))
	{
  			$d_name=$_POST['txtname'];
		
			$disName=$_POST['ddldistrict'];
			
 			$insQuery= "insert into tbl_servicerate(service_rate,servicetype_id,workshop_id)values('$d_name','$disName','".$_SESSION["uid"]."')";
			mysql_query($insQuery,$con) or die(mysql_error());
 			echo "<b>Values Added successfully!";
	    	echo "<meta http-equiv=Refresh content=6;url=ServiceRate.php>"; 
		
	}



     $id=$_REQUEST['delid'];
	 if($_GET['del'])
      {
 		$delQuery="delete from tbl_servicerate where service_id='".$id."'";
 		mysql_query($delQuery,$con);
		echo "<b>Values Deleted successfully!";
		echo "<meta http-equiv=Refresh content=6;url=ServiceRate.php>"; 
		
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

<form id="form1" name="form1" method="post" action="">

  <table width="494" height="115" border="1" align="center">
  
  <tr>
    <td>Service Type</td>
    <td>
        <select name="ddldistrict">
           <option name="sel">--select--</option>
               <?php
	  					$selQry="select * from  tbl_servicetype";
	  					$sel=mysql_query($selQry)or die(mysql_error());
	  					while($row=mysql_fetch_array($sel))
	  						{
	  		   ?>
   		  <option value="<?php echo $row['servicetype_id']; ?>"> <?php echo $row['servicetype_name']; ?> </option>
      		<?php }?>
        </select>
    </td>
  </tr>
  
  
    <tr>
      <td width="145">Rate </td>
      <td width="333"><input type="text" name="txtname"  id="txtname"></td>
    </tr>
    
   
  
  
     
  
  
    
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btnsubmit" value="Submit"/></td>
    </tr>
    
  </table>
  
  <br /><br />
    <table width="453" height="92" border="1" align="center">
    <tr>
      <th width="166">ServiceType</td>
      <th width="166">Rate</td>
      
 
    </tr>
    
    <?php
   		 	$Selquery="select * from tbl_servicerate c inner join  tbl_servicetype t on c.servicetype_id=t.servicetype_id where c.workshop_id='".$_SESSION["uid"]."'";
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
          <a href="ServiceRate.php?del=1&amp;delid=<?php echo $row['service_id'];?>">Delete</a>
         
          </td>
       
     </tr>
     <?php	
         }
      ?>
 
    
  </table>
  
</form>

</body>
</html>

