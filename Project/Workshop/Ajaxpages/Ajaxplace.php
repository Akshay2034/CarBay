<?php 
    include("../../connection/connection.php");
?>
 <option value="">-----Select------</option> 
         <?php
		 				
						
							
						
		 				$sel="select * from  tbl_sparesubcategory  where  sparecat_id='".$_GET["did"]."'";
						
						$row=mysql_query($sel);
						echo $sel;
						while($data=mysql_fetch_array($row))
						{
						
					
						
		  ?>
           <option value="<?php echo $data['sparesubcat_id'];?>"  ><?php  echo $data["sparesubcat_name"]; ?></option>
                    <?php 
						}
					?>