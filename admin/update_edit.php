<?php
$id=$_REQUEST["id"];
$topic=$_REQUEST["topic"];
$selectedit=$_REQUEST["selectedit"];
$edit=$_REQUEST["edit"];

require_once "tablemanager.php";
$manager = new TableManager("byakko","byakko");
$manager->selectdb("byakko");
if ($selectedit == "1"){
	$manager->update_cell_data("job","topic",$id,$edit);
}
elseif ($selectedit == "2"){
	$manager->update_cell_data("job","timestart",$id,$edit);
}
elseif ($selectedit == "3"){
	$manager->update_cell_data("job","timeend",$id,$edit);
}
else{
	$manager->update_cell_data("job","datestart",$id,$edit);
}

header( "location: index.php" );
exit(0);

?>