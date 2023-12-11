
<?php 
     include("../connection/connection.php");
	 
	 
	 $id=$_REQUEST['edid'];
	 
	 if($_GET['ed'])
      {
 			$SelQuery="select * from tbl_model where model_id='".$id."'";
  			$sel=mysql_query($SelQuery);
  			list($deptid,$deptname)=mysql_fetch_array($sel);


      }
	  
	  

	if(isset($_POST['btnsubmit']))
	{
  		$d_name=$_POST['txtdept'];
		
		if($id!="")
		{
			$updQuery="update tbl_model set model_name='".$d_name."' where model_id='".$id."'";
			mysql_query($updQuery,$con) or die(mysql_error());
			echo "<b>Values updated successfully!</b>";
	 		header("location:Model.php");
		}
		else
		{
 			$insQuery= "insert into tbl_model(model_name)values('$d_name')";
 			//echo $insQuery;
			mysql_query($insQuery,$con) or die(mysql_error());
 			echo "<b>Values Added successfully!";
	    	echo "<meta http-equiv=Refresh content=6;url=Model.php>"; 
		}
	}



     $id=$_REQUEST['delid'];
	 if($_GET['del'])
      {
 		$delQuery="delete from tbl_model where model_id='".$id."'";
 		mysql_query($delQuery,$con);
		echo "<b>Values Deleted successfully!";
		echo "<meta http-equiv=Refresh content=6;url=Model.php>"; 
		
      }

?>




<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Model</title>
</head>



<body>
<?php
include("header.php");

?>


<form id="form1" name="form1" method="post" action="">

  <table width="323" height="63"  align="center">
    <tr>
      <td width="122">Model Name</td>
      <td width="140"><input type="text" name="txtdept" id="txtdept" value="<?php echo $deptname;?>" /></td>
    </tr>
    
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btnsubmit" value="Submit"/></td>
    </tr>
    
  </table>
  
  <br /><br />
    <table width="278" border="1" align="center">
    <tr>
      <th width="166">Model Name</td>
       <th  align="center">Action</th>
    </tr>
    
    <?php
   		 	$Selquery="select * from tbl_model";
  			$sel=mysql_query($Selquery,$con)or die(mysql_error());
  			while($row=mysql_fetch_array($sel)or die(mysql_error()))
   				{
	 ?>
     
     <tr>
       <td>
               <?php echo $row['model_name'];?>
       </td>
       <td width="85">
          <a href="Model.php?del=1&amp;delid=<?php echo $row['model_id'];?>">Delete</a>
          <a href="Model.php?ed=1&amp;edid=<?php echo $row['model_id'];?>">Edit</a>
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


