
<?php 
     include("../connection/Connection.php");
	 
	 


	if(isset($_POST['btnsubmit']))
	{
  			$d_name=$_POST['txtname'];
		
			$disName=$_POST['ddldistrict'];
			
 			$insQuery= "insert into tbl_place(place_name,district_id)values('$d_name','$disName')";
			mysql_query($insQuery,$con) or die(mysql_error());
 			echo "<b>Values Added successfully!";
	    	echo "<meta http-equiv=Refresh content=6;url=PlaceDetails.php>"; 
		
	}



     $id=$_REQUEST['delid'];
	 if($_GET['del'])
      {
 		$delQuery="delete from tbl_place where place_id='".$id."'";
 		mysql_query($delQuery,$con);
		echo "<b>Values Deleted successfully!";
		echo "<meta http-equiv=Refresh content=6;url=PlaceDetails.php>"; 
		
      }

?>




<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>PlaceDetails</title>
</head>

<?php
include("header.php");

?>

<body>


<form id="form1" name="form1" method="post" action="">

  <table width="323" height="63"  align="center">
  
    <tr>
      <td width="122">Place Name</td>
      <td width="140"><input type="text" name="txtname" id="txtname"  /></td>
    </tr>
    
   <tr>
    <td>District Name</td>
    <td>
        <select name="ddldistrict">
           <option name="sel">--select--</option>
               <?php
	  					$selQry="select * from tbl_district";
	  					$sel=mysql_query($selQry)or die(mysql_error());
	  					while($row=mysql_fetch_array($sel))
	  						{
	  		   ?>
   		  <option value="<?php echo $row['district_id']; ?>"> <?php echo $row['district_name']; ?> </option>
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
      <th width="166">Place Name</td>
      <th width="166">District Name</td>
       <th  align="center">Action</th>
    </tr>
    
    <?php
   		 	$Selquery="select * from tbl_place c inner join tbl_district t on c.district_id=t.district_id";
  			$sel=mysql_query($Selquery,$con)or die(mysql_error());
  			while($row=mysql_fetch_array($sel)or die(mysql_error()))
   				{
	 ?>
     
     <tr>
       <td>
               <?php echo $row['place_name'];?>
       </td>
        <td>
               <?php echo $row['district_name'];?>
       </td>
        
       <td width="85">
          <a href="PlaceDetails.php?del=1&amp;delid=<?php echo $row['place_id'];?>">Delete</a>
         
          </td>
      
     </tr>
     <?php	
         }
      ?>
 
    
  </table>
  
</form>

</body>
</html>

<?php
include("footer.php");

?>


