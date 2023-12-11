
<?php 
     include("../connection/connection.php");
	 
	 
	 $id=$_REQUEST['edid'];
	 
	 if($_GET['ed'])
      {
 			$SelQuery="select * from tbl_district where district_id='".$id."'";
  			$sel=mysql_query($SelQuery);
  			list($deptid,$deptname)=mysql_fetch_array($sel);


      }
	  
	  

	if(isset($_POST['btnsubmit']))
	{
  		$d_name=$_POST['txtdept'];
		
		if($id!="")
		{
			$updQuery="update tbl_district set district_name='".$d_name."' where district_id='".$id."'";
			mysql_query($updQuery,$con) or die(mysql_error());
			echo "<b>Values updated successfully!</b>";
	 		header("location:District.php");
		}
		else
		{
 			$insQuery= "insert into tbl_district(district_name)values('$d_name')";
 			//echo $insQuery;
			mysql_query($insQuery,$con) or die(mysql_error());
 			echo "<b>Values Added successfully!";
	    	echo "<meta http-equiv=Refresh content=6;url=District.php>"; 
		}
	}



     $id=$_REQUEST['delid'];
	 if($_GET['del'])
      {
 		$delQuery="delete from tbl_district where district_id='".$id."'";
 		mysql_query($delQuery,$con);
		echo "<b>Values Deleted successfully!";
		echo "<meta http-equiv=Refresh content=6;url=District.php>"; 
		
      }

?>




<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>District</title>
</head>

<body>
<?php
include("header.php");

?>

<form id="form1" name="form1" method="post" action="">

  <table width="323" height="63"  align="center">
    <tr>
      <td width="122">District Name</td>
      <td width="140"><input type="text" name="txtdept" id="txtdept" value="<?php echo $deptname;?>" /></td>
    </tr>
    
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btnsubmit" value="Submit"/></td>
    </tr>
    
  </table>
  
  <br /><br />
    <table width="278" border="1" align="center">
    <tr>
      <th width="166">District Name</td>
      <th colspan="2" align="center">Action</td>
    </tr>
    
    <?php
   		 	$Selquery="select * from tbl_district";
  			$sel=mysql_query($Selquery,$con)or die(mysql_error());
  			while($row=mysql_fetch_array($sel)or die(mysql_error()))
   				{
	 ?>
     
     <tr>
       <td>
               <?php echo $row['district_name'];?>
       </td>
       <td width="85">
          <a href="District.php?del=1&amp;delid=<?php echo $row['district_id'];?>">Delete</a>
          <a href="District.php?ed=1&amp;edid=<?php echo $row['district_id'];?>">Edit</a>
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
