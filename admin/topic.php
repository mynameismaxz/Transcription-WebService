<?php
require_once "tablemanager.php";
$manager = new TableManager("byakko","byakko");
$manager->selectdb("byakko");

$getjob = $manager->get_table_data("job");
$id=array();
$user=array();
$topic=array();
$timestart=array();
$timeend=array();
$datestart=array();
for($i=0;$i<count($getjob);$i++){
	array_push($id,$getjob[$i][0]);
	array_push($user,$getjob[$i][1]);
	array_push($topic,$getjob[$i][2]);
	array_push($timestart,$getjob[$i][3]);
	array_push($timeend,$getjob[$i][4]);
	array_push($datestart,$getjob[$i][5]);
	echo "User : ".$user[$i]."<br>"."Topic : ".$topic[$i]."<br>"."Time start : ".$timestart[$i]."<br>"."Time end : ".$timeend[$i]."<br>"."Date start : ".$datestart[$i];
	echo "<form method=\"post\">";
	echo "<input type=\"hidden\" name=\"id\" value=\"".$id[$i]."\">";
	echo "<input type=\"hidden\" name=\"topic\" value=\"".$topic[$i]."\">";
	echo "<input type=\"button\" value=\"edit\" onclick=\"javascript:this.form.action='selectedit.php';this.form.submit()\"/>";
	echo "<input type=\"button\" value=\"delete\" onclick=\"javascript:this.form.action='deletetopic.php';this.form.submit()\"/>";
	echo "</form>";
	echo "<br><br>";
}
?>