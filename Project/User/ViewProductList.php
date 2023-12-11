<?php
     include("../connection/connection.php");
	
		 session_start();
	 
	 $id=$_REQUEST['delid'];
	 
	 if($_GET['del'])
      {
		  	$_SESSION["proid"]= $id;
 			header("location:OrderNow.php");	
		
      }


?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Product</title>


</head>

<body>
<?php
include("header.php");
?>

  
</body>
</html>



  
  <br /><br />
    <table width="453" height="92" border="1" align="center">
    <tr>
    <th width="166">Image</td>
     <th width="166">Type Name</td>
     
 	<th width="166">Product Name</td>
  <th width="166">Rate</td>
 
 <th width="166">Details</td>
 
 
    </tr>
    
    <?php
   		 	$Selquery="select * from tbl_workshopproduct o inner join tbl_sparesubcategory p on o.sparesubcat_id=p.sparesubcat_id  where o.workshop_id='".$_SESSION["selid"]."'";
  			$sel=mysql_query($Selquery,$con)or die(mysql_error());
  			while($row=mysql_fetch_array($sel)or die(mysql_error()))
   				{
	 ?>
     
     <tr>
      <td>
       <img src="../Assets/Photo/<?php echo $row['product_photo'];?>" width="50" height="50" />
       </td>
      <td>
               <?php echo $row['sparesubcat_name'];?>
       </td>
   
      
      
        <td>
               <?php echo $row['product_name'];?>
       </td>
        <td>
               <?php echo $row['product_rate'];?>
       </td>
        <td>
               <?php echo $row['product_details'];?>
       </td>
        
       
        <td width="85">
          
         <a href="ViewProductList.php?del=1&amp;delid=<?php echo $row['product_id'];?>">OrderNow</a>
          </td>
     </tr>
     <?php	
         }
      ?>
 
    
  </table>