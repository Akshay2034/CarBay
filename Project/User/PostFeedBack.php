
<?php 
     include("../connection/Connection.php");
	 
	 session_start();


	if(isset($_POST['btnsubmit']))
	{
  			$d_name=$_POST['txtname'];
		
			
			
 			$insQuery= "insert into tbl_feedback(feedback_details,feedback_date,user_id)values('$d_name',curdate(),'".$_SESSION["uid"]."')";
			mysql_query($insQuery,$con) or die(mysql_error());
 			echo "<b>Values Added successfully!";
	    	echo "<meta http-equiv=Refresh content=6;url=PostFeedBack.php>"; 
		
	}



     $id=$_REQUEST['delid'];
	 if($_GET['del'])
      {
 		$delQuery="delete from tbl_feedback where feedback_id='".$id."'";
 		mysql_query($delQuery,$con);
		echo "<b>Values Deleted successfully!";
		echo "<meta http-equiv=Refresh content=6;url=PostFeedBack.php>"; 
		
      }

?>




<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>FeedBack</title>
</head>

<body>
<?php
include("header.php");
?>

<form id="form1" name="form1" method="post" action="">

  <table width="431" height="79" border="1" align="center">
  
    <tr>
      <td width="77">Feed Back</td>
      <td width="230"><textarea name="txtname" cols="40" id="txtname"></textarea></td>
    </tr>
    
   
  
  
     
  
  
    
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btnsubmit" value="Submit"/></td>
    </tr>
    
  </table>
  
  <br /><br />
    <table width="453" height="72" border="1" align="center">
    <tr>
      
      <th width="166">Details</td>
      <th width="166">Date</td>
       
 
    </tr>
    
    <?php
   		 	$Selquery="select * from tbl_feedback where user_id='".$_SESSION["uid"]."'";
  			$sel=mysql_query($Selquery,$con)or die(mysql_error());
  			while($row=mysql_fetch_array($sel)or die(mysql_error()))
   				{
	 ?>
     
     <tr>
     
       <td height="23">
               <?php echo $row['feedback_details'];?>
       </td>
        <td>
               <?php echo $row['feedback_date'];?>
       </td>
        
       <td width="85">
          <a href="PostFeedBack.php?del=1&amp;delid=<?php echo $row['feedback_id'];?>">Delete</a>
         
          </td>
       <td width="5"></td>
     </tr>
     <?php	
         }
      ?>
 
    
  </table>
  
</form>

</body>
</html>

