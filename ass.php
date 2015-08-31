<?php
	$select =  $_REQUEST['selected'];
	$file = $_REQUEST['file'];
	require_once "tablemanager.php";
	$manager = new TableManager("byakko","byakko");
	$manager->selectdb("byakko");

	$getdata = $manager->get_table_data("upload");
	for($i=0;$i<count($getdata);$i++){
		if($getdata[$i][1]==$file){
			$id = $getdata[$i][0];
		}
	}

	$manager->update_cell_data("upload","agent",$id,$select);
?>