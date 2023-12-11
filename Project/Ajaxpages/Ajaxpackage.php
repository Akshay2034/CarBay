<?php 
			$con=mysql_connect("localhost","root","") or die("Error in Connection");
			$d=mysql_select_db("db_carbay")or die("Error in db");
     session_start();
?>

<?php
		 				
						
							
						
		 				$sel="select * from  tbl_package   where  package_id='".$_GET["pid"]."'";
						
						$row=mysql_query($sel);
						

                        $data=mysql_fetch_array($row);

$dateValue =  date('Y-m-d',strtotime('+'.$data["package_duration"].' day'));



?>
<?php echo $dateValue ; ?>