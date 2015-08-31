<?php
//chklogin.php
require_once "tablemanager.php";
$user = $_REQUEST['usern'];
$passs = $_REQUEST['pass'];
$tic = false;

$result = array();

$manager = new TableManager("byakko","byakko");
$manager->selectdb("byakko");
$tablename = "Member";

$byakko = $manager->get_table_data($tablename);
$row = count($byakko);

for($i=0;$i<$row;$i++){
	if($user==$byakko[$i][1]){
		if($passs==$byakko[$i][2]){
			$result['status'] = "ss";
			$result['user'] = $byakko[$i][1];
			$tic = true;
		}
	}
	else{
        ;
	}
}
if(!$tic){
	$result['status'] = "ww";
}
echo json_encode($result);
?>
