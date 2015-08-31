<?php

require_once "tablemanager.php";

$username = $_POST['username'];
$password = $_POST['password'];
$status = $_POST['status'];
// $name = $_POST['name'];
// $nationalid = $_POST['nationalid'];
// $bd = $_POST['bd'];
// $address = $_POST['address'];
// $mail = $_POST['email'];

$data = array($username,$password,$status,$topic);

$manager = new TableManager("byakko","byakko");
$manager->selectdb("byakko");
$tablename = "Agent";
$getagent = $manager->get_table_data($tablename);
$row = count($getagent);
for ($i=0;$i<$row;$i++) { 
	$usernamedb = $getagent[$i][1];
	if ($username == $usernamedb){
		echo "<script>alert('This username is already taken!'); window.location = './new_regisagent.php';</script>";
		exit(0);
	}
}
$manager->add_row($tablename,$data);
// echo $username;
// echo $password;
// echo $status;

header("Location: ../index.php");

?>