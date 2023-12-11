
<?php 
     include("../connection/Connection.php");
	 
	 session_start();


	if(isset($_POST['btnsubmit']))
	{
  			$d_name=$_POST['txtname'];
		
			$disName=$_POST['ddldistrict'];
			
 			$insQuery= "insert into tbl_complaint(complaint_details,ctype_id,complaint_date,user_id)values('$d_name','$disName',curdate(),'".$_SESSION["uid"]."')";
			mysql_query($insQuery,$con) or die(mysql_error());
 			echo "<b>Values Added successfully!";
	    	echo "<meta http-equiv=Refresh content=6;url=Complaint.php>"; 
		
	}



     $id=$_REQUEST['delid'];
	 if($_GET['del'])
      {
 		$delQuery="delete from tbl_complaint where complaint_id='".$id."'";
 		mysql_query($delQuery,$con);
		echo "<b>Values Deleted successfully!";
		echo "<meta http-equiv=Refresh content=6;url=Complaint.php>"; 
		
      }

?>




<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Complaint</title>
</head>

<body>
<?php
include("header.php");
?>

<form id="form1" name="form1" method="post" action="">

  <table width="450" height="115" align="center">
  
    <tr>
      <td width="122">Complaint </td>
      <td width="140"><textarea name="txtname" cols="40" id="txtname"></textarea></td>
    </tr>
    
   <tr>
    <td>Complaint Type</td>
    <td>
        <select name="ddldistrict">
           <option name="sel">--select--</option>
               <?php
	  					$selQry="select * from  tbl_complainttype";
	  					$sel=mysql_query($selQry)or die(mysql_error());
	  					while($row=mysql_fetch_array($sel))
	  						{
	  		   ?>
   		  <option value="<?php echo $row['ctype_id']; ?>"> <?php echo $row['ctype_name']; ?> </option>
      		<?php }?>
        </select>
    </td>
  </tr>
  
  
     
  
  
    
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btnsubmit" value="Submit"/></td>
    </tr>
    
  </table>
  
  <br /><br />
    <table width="453" height="92" border="1" align="center">
    <tr>
      <th width="166">Type</td>
      <th width="166">Details</td>
      <th width="166">Date</td>
       <th width="166">Replay</td>
 
    </tr>
    
    <?php
   		 	$Selquery="select * from tbl_complaint c inner join  tbl_complainttype t on c.ctype_id=t.ctype_id where c.user_id='".$_SESSION["uid"]."'";
  			$sel=mysql_query($Selquery,$con)or die(mysql_error());
  			while($row=mysql_fetch_array($sel)or die(mysql_error()))
   				{
	 ?>
     
     <tr>
       <td>
               <?php echo $row['ctype_name'];?>
       </td>
       <td>
               <?php echo $row['complaint_details'];?>
       </td>
       <td>
               <?php echo $row['complaint_date'];?>
       </td>
        <td>
               <?php echo $row['complaint_reply'];?>
       </td>
        
       <td width="85">
          <a href="Complaint.php?del=1&amp;delid=<?php echo $row['complaint_id'];?>">Delete</a>
         
          </td>
       
     </tr>
     <?php	
         }
      ?>
 
    
  </table>
  
</form>

</body>
</html>

