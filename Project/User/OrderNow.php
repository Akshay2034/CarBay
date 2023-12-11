
<?php 
     include("../connection/Connection.php");
	 
	 
	
	  session_start();
	  
	  

	if(isset($_POST['btnsubmit']))
	{
  			$qty=$_POST['txtdept'];
		
			$sel1="select * from  tbl_workshopproduct  where product_id='".$_SESSION["proid"]."'";
			$rows1=mysql_query($sel1);
			$count1=mysql_num_rows($rows1);
			$data1=mysql_fetch_array($rows1);
		    $rate=$data1['product_rate'];
			
			$amount=$qty*$rate;
			
			
 			$insQuery= "insert into tbl_productbooking(product_id,user_id,pbooking_date,pbooking_qty,pbooking_amt)values('".$_SESSION["proid"]."','".$_SESSION["uid"]."',curdate(),'$qty','$amount')";
 			//echo $insQuery;
			mysql_query($insQuery,$con) or die(mysql_error());
 			echo "<b>Values Added successfully!";
	    	echo "<meta http-equiv=Refresh content=6;url=SellerList-Accepted.php>"; 
		
	}



    

?>




<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>OrderNow</title>
</head>

<body>
<?php
include("header.php");
?>

<form id="form1" name="form1" method="post" action="">

  <table width="323" height="63" border="1" align="center">
    <tr>
      <td width="101">Product Qty</td>
      <td width="206"><input type="text" name="txtdept" id="txtdept"  /></td>
    </tr>
    
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btnsubmit" value="Submit"/></td>
    </tr>
    
  </table>
  
 
  
</form>

</body>
</html>

