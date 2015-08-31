<?php
// ini_set("display_errors", 1);
require_once "tablemanager.php";

$topic = $_POST['topic'];
$timestart = $_POST['timestart'];
$timeend = $_POST['timeend'];
$datestart = $_POST['datestart'];
$user = $_POST['user'];
/* $user = $_POST['user']; */
// $user="key";


$data = array($user,$topic,$timestart,$timeend,$datestart,$agent);

$manager = new TableManager("byakko","byakko");
$manager->selectdb("byakko");
$tablename = "job";

$getjob = $manager->get_table_data($tablename);
$row = count($getjob);
date_default_timezone_set('Asia/Bangkok');
$timestarts = strtotime($datestart.' '.$timestart);
$timeends = strtotime($datestart.' '.$timeend);

for ($i=0;$i<$row;$i++) { 
	$timesdb = strtotime($getjob[$i][5].' '.$getjob[$i][3]);
	$timeedb = strtotime($getjob[$i][5].' '.$getjob[$i][4]);
	if(($timeends>=$timesdb&&$timeends<=$timeedb)||($timestarts>=$timesdb&&$timestarts<=$timeedb))
	{
		echo "<script>
		if(confirm('Please use Auto Speech Recognition System(ASR)')){
			window.location='./asren.php';
		} 
		else {
			window.location='./select_time.php';
		};
			</script>";
	
		exit(0);
	}
	// echo $getjob[$i][5].'<br>';
	// echo $getjob[$i][3].'<br>';
	// echo $times.'<br>';

}


$manager->add_row($tablename,$data);

echo $topic,$timeend,$timeend,$datestart,$user;

echo "<meta http-equiv=\"refresh\" content=\"2;url=select_time.php\"/>";

?>

<HTML>
<HEAD></HEAD>
<BODY>
	<center>Register Successful : Please wait for 2 sec to redirect</center>
</BODY>
</HTML>