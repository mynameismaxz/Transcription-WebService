<?php
$id=$_REQUEST["id"];
$topic=$_REQUEST["topic"];
$agent=$_REQUEST["addagent"];

require_once "tablemanager.php";
$manager = new TableManager("byakko","byakko");
$manager->selectdb("byakko");

$getagent = $manager->get_table_data("Agent");
$id_agent=0;
$row=count($getagent);
for($i=0;$i<$row;$i++){
	if($getagent[$i][1]==$agent){
		$id_agent=$getagent[$i][0];
	}
}

$manager->update_cell_data("Agent","status",$id_agent,"active");

$getjob = $manager->get_cell_data("job","agent",$id);
//echo $getjob;
if($getjob==""){
	$updated = $agent;
}
else{
	$updated = $getjob.",".$agent;
}
$manager->update_cell_data("job","agent",$id,$updated);

header( "location: index.php" );
exit(0);

?>