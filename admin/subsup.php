<?php
require_once "tablemanager.php";
$manager = new TableManager("byakko","byakko");
$manager->selectdb("byakko");

$usera = $_REQUEST["agent"];
$topic = $_REQUEST["selected"];

// echo $topic;
$adata = $manager->get_table_data("Agent");
for($i=0;$i<count($adata);$i++){
	if($adata[$i][1]==$usera){
		$id = $adata[$i][0];
		// echo "s";
	}
}
// echo $id;

// print_r (explode(" / ",$topic));

// $spl = explode(" / ",$topic);

$manager->update_cell_data("Agent","assign_topic",$id,$topic);
$manager->update_cell_data("Agent","status",$id,"active");
// $manager->update_cell_data("job","agent",$spl,$usera);

//find topic name to query
$spl = explode(" / ",$topic);
$broadcaster_name = $spl[0];
$topic_name = $spl[1];
echo $broadcaster_name;
echo $topic_name;


$manager->update_cell_without_id("job","agent","topic",$usera,$topic_name);
$update_top = array($usera,$topic_name);
$manager->add_row("top",$update_top);

header("Location: index.php");

?>