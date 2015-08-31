<?php

require_once "tablemanager.php";

$user = $_REQUEST["usern"];
$manager = new TableManager("byakko","byakko");
$manager->selectdb("byakko");
$tablename = "job";
$byakko = $manager->get_table_data($tablename);
$data_topic = array();
$data_start = array();
$data_end = array();
$date = array();
$row = count($byakko);
for($i=0;$i<$row;$i++){
        if($user==$byakko[$i][1]){
                array_push($data_topic,$byakko[$i][2]);
                array_push($data_start,$byakko[$i][3]);
                array_push($data_end,$byakko[$i][4]);
				array_push($date,$byakko[$i][5]);
        }
}
//$all = array($data_topic,$data_start,$data_end);
//echo json_encode($all,JSON_FORCE_OBJECT);

$data = array();
$data['count'] = count($data_topic);

$topics = array();
for($i=0;$i<count($data_topic);$i++){
	$topic = array();
	$topic['topic'] = $data_topic[$i];
	$topic['start'] = $data_start[$i];
	$topic['end'] = $data_end[$i];
	$topic['date'] = $date[$i];
	array_push($topics, $topic);
}

$data['data'] = $topics;
echo json_encode($data);
// $t = count($data_topic);
// $ass = (string)$t."---";
// for($i=0;$i<$t;$i++){
// 	$ass=$ass.$data_topic[$i]."//";
// }
// $ass=$ass."//";
// for($i=0;$i<$t;$i++){
// 	$ass=$ass.$data_start[$i]."//";
// }
// $ass=$ass."//";
// for($i=0;$i<$t;$i++){
// 	$ass=$ass.$data_end[$i]."//";
// }
// $ass=$ass."//";
// echo $ass;

?>