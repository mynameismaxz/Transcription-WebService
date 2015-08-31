<?php
$id=$_REQUEST["id"];
$topic=$_REQUEST["topic"];
$deleteagent=$_REQUEST["deleteagent"];

require_once "tablemanager.php";
$manager = new TableManager("byakko","byakko");
$manager->selectdb("byakko");

$getagent = $manager->get_table_data("Agent");
$id_agent=0;
$row=count($getagent);
for($i=0;$i<$row;$i++){
	if($getagent[$i][1]==$deleteagent){
		$id_agent=$getagent[$i][0];
	}
}

$manager->update_cell_data("Agent","status",$id_agent,"inactive");

////////////////////////////////
$deleted = array();
$getjob = $manager->get_cell_data("job","agent",$id);
$s_getjob = explode(",", $getjob);
for($i=0;$i<count($s_getjob);$i++){
	if($s_getjob[$i]!=$deleteagent){
		array_push($deleted,$s_getjob[$i]);
	}
}
$updatedelete="";
for($i=0;$i<count($deleted);$i++){
	if($i==count($deleted)-1){
		$updatedelete = $updatedelete.$deleted[$i];
		break;
	}
	$updatedelete = $updatedelete.$deleted[$i].",";
	
}
$manager->update_cell_data("job","agent",$id,$updatedelete);

header( "location: index.php" );
exit(0);
?>
