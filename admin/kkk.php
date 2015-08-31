<?php
require_once "tablemanager.php";
$manager = new TableManager("byakko","byakko");
$manager->selectdb("byakko");

$getmember = $manager->get_table_data("Member");
$abc=array();
$aaa=array();
$row=count($getmember);
for($i=0;$i<$row;$i++){
	array_push($abc,$getmember[$i][1]);
	array_push($aaa,$getmember[$i][2]);
	echo "username : ".$abc[$i]."<br>"."pass : ".$aaa[$i]."<br>"."<br>";
}

?>
