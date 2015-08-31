<?php

require_once "tablemanager.php";

$username = $_POST['username'];
$password = $_POST['password'];
$name = $_POST['name'];
$nationalid = $_POST['nationalid'];
$bd = $_POST['bd'];
$address = $_POST['address'];
$mail = $_POST['email'];


$data = array($username,$password,$name,$nationalid,$bd,$address,$mail);

$manager = new TableManager("byakko","byakko");
$manager->selectdb("byakko");
$tablename = "Member";

$manager->add_row($tablename,$data);

header("Location: ../index.php");

?>