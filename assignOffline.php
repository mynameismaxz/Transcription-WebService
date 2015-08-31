<?php
// echo "xxxx";
require_once "tablemanager.php";
$manager = new TableManager("byakko","byakko");
$manager->selectdb("byakko");
$tablename = "upload";
$topic = array();
$getAgent = array();
$getjob = $manager->get_table_data($tablename);
// var_dump($getjob);

for($i=0;$i<count($getjob);$i++){
	if($getjob[$i][4]=="inactive"){
		array_push($topic, $getjob[$i][1]);
		array_push($getAgent, $getjob[$i][2]);
	}
}

$aa = array();
$getag = $manager->get_table_data("Agent");
for($i=0;$i<count($getag);$i++){
	if($getag[$i][3]=="inactive"){
		array_push($aa, $getag[$i][1]);
	}
}

?>
<html>
<head>
<title>Super Agent</title>
</head>
<body>
Super Agent
<br>
<?php
// var_dump($getAgent);
for($i=0;$i<count($topic);$i++){
	echo "<b>"."File :".$topic[$i]."</b><br>";
	echo "User : ". $getAgent[$i]."<br>";
	echo "<form name="."\"".(string)$i."\" method=\"post\" action=\"ass.php\" >";
	echo "<select name=\"selected\" >";
	for($j=0;$j<count($aa);$j++){
		echo "<option value=\"".$aa[$j]."\">".$aa[$j]."</option>";
	}
	echo "<input type=\"hidden\" value=\"".$topic[$i]."\" name=\"file\"";
	echo "<input type=\"submit\">";
	echo "</form>";
// }
}
?>
</body>
</html>