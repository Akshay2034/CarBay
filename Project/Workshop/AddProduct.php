<?php
     include("../connection/connection.php");
	session_start();
if(isset($_POST["btn_save"]))
{
	
	
	
	$Cproof=$_FILES["fluPhoto"]["name"];
	$temp1=$_FILES["fluPhoto"]["tmp_name"];
	move_uploaded_file($temp1,"../Assets/Photo/".$Cproof);

	
	
	

	
	
	
	$ins="insert into tbl_workshopproduct(workshop_id,product_details,sparesubcat_id,product_name,product_rate,product_photo)values('".$_SESSION['lguser']."','".$_POST["txtdetails"]."','".$_POST["ddlsubcat"]."','".$_POST["txtname"]."','".$_POST["txtrate"]."','".$Cproof."')";
		if(mysql_query($ins))
		{
			header("location:AddProduct.php");
		}
		else
		{
			echo $ins;
		}
	
	
}


     $id=$_REQUEST['delid'];
	 if($_GET['del'])
      {
 		$delQuery="delete from tbl_workshopproduct where product_id='".$id."'";
 		mysql_query($delQuery,$con);
		echo "<b>Values Deleted successfully!";
		echo "<meta http-equiv=Refresh content=6;url=AddProduct.php>"; 
		
      }
	  
	  

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Add Product</title>
<script src="Jq/jQuery.js"></script>
<script>
function getPlace(did)
{
	//alert(did);
	$.ajax({
	url: "Ajaxpages/Ajaxplace.php?did="+did,
	 
	  success: function(html){
		$("#ddlsubcat").html(html);
		
	  }
	});
}

</script>

</head>
<?php
include("header.php");
?>
<body>
<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <table width="462" height="597" border="1" align="center" cellpadding="10" style="border-collapse:collapse;">
  
  <tr>
      <td width="116">Category</td>
      <td width="294"><label for="ddlcategory"></label>
        <select name="ddlcategory" id="ddlcategory" onchange="getPlace(this.value)" required autofocus="autofocus"  >
        <option>---Select---</option>
        <?php
		$seld="select * from tbl_sparecategory";
		$rowd=mysql_query($seld);
		while($datad=mysql_fetch_array($rowd))
		{
			?>
            <option value="<?php echo $datad['sparecat_id']?>"><?php echo $datad["sparecat_name"]?></option>
            <?php
		}
		?>
      </select></td>
    </tr>
    <tr>
      <td>SubCategory</td>
      <td><label for="ddlsubcat"></label>
        <select name="ddlsubcat" id="ddlsubcat" >
        <option>---Select---</option>
       
      </select></td>
    </tr>
    
    <tr>
      <td>Product Name</td>
      <td><label for="txtname"></label>
      <input name="txtname" type="text" id="txtname" size="40" / required="required" autocomplete="off" ></td>
    </tr>
    <tr>
      <td>Rate</td>
      <td><label for="txtrate"></label>
      <input name="txtrate" type="text" id="txtrate" size="40" / required="required" autocomplete="off" ></td>
    </tr>
    <tr>
      <td>Details</td>
      <td><label for="txtdetails"></label>
      <textarea name="txtdetails" id="txtdetails" cols="40" rows="3"></textarea></td>
    </tr>
    <tr>
      <td>Photo</td>
      <td><label for="fluPhoto"></label>
      <input type="file" name="fluPhoto" id="fluPhoto"  required="required" autocomplete="off" ></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btn_save" id="btn_save" value="Submit" />
      <input type="submit" name="btn_cancel" id="btn_cancel" value="Cancel" /></td>
    </tr>
  </table>
  <hr />
 
</form>
</body>
</html>



  
  <br /><br />
    <table width="453" height="92" border="1" align="center">
    <tr>
    <th width="166">Image</td>
     <th width="166">Category</td>
      <th width="166">Subcategory</td>
 <th width="166">Name</td>
<th width="166">Details</td>
<th width="166">Amount</td>
 
    </tr>
    
    <?php
   		 	$Selquery="select * from tbl_workshopproduct  o inner join  tbl_sparesubcategory p on o.sparesubcat_id=p.sparesubcat_id inner join  tbl_sparecategory t on p.sparecat_id=t.sparecat_id where o.workshop_id='".$_SESSION['lguser']."'";
			
  			$sel=mysql_query($Selquery,$con)or die(mysql_error());
  			while($row=mysql_fetch_array($sel)or die(mysql_error()))
   				{
	 ?>
     
     <tr>
     
       <td>
       <img src="../Assets/Photo/<?php echo $row['product_photo'];?>" width="50" height="50" />
       </td>
         <td>
               <?php echo $row['sparecat_name'];?>
       </td>
         <td>
               <?php echo $row['sparesubcat_name'];?>
       </td>
        <td>
               <?php echo $row['product_name'];?>
       </td>
        <td>
               <?php echo $row['product_details'];?>
       </td>
        <td>
               <?php echo $row['product_rate'];?>
       </td>
       
        
       <td width="85">
          
         <a href="AddProduct.php?del=1&amp;delid=<?php echo $row['product_id'];?>">Delete</a>
          </td>
       
     </tr>
     <?php	
         }
      ?>
 
    
  </table>