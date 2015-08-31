<?php
require_once "tablemanager.php";
$manager = new TableManager("byakko","byakko");
$manager->selectdb("byakko");

$getjob = $manager->get_table_data("job");
$topic=array();
$agent=array();
$id=array();
$row=count($getjob);
for($i=0;$i<$row;$i++){
	array_push($topic,$getjob[$i][2]);
	array_push($agent,$getjob[$i][6]);
	array_push($id,$getjob[$i][0]);
	echo "topic : ".$topic[$i]."<br>"."agent : ".$agent[$i]."<br>";
	echo "<form method=\"post\">";
	echo "<input type=\"hidden\" name=\"id\" value=\"".$id[$i]."\">";
	echo "<input type=\"hidden\" name=\"topic\" value=\"".$topic[$i]."\">";
	echo "<input type=\"hidden\" name=\"agent\" value=\"".$agent[$i]."\">";
	echo "<input type=\"button\" value=\"add\" onclick=\"javascript:this.form.action='add.php';this.form.submit()\"/>";
	echo "<input type=\"button\" value=\"delete\" onclick=\"javascript:this.form.action='delete.php';this.form.submit()\"/>";
	echo "</form>";
	echo "<br><br>";
}

?>