<?php
$id=$_REQUEST["id"];
$topic=$_REQUEST["topic"];

require_once "tablemanager.php";
$manager = new TableManager("byakko","byakko");
$manager->selectdb("byakko");
$manager->delete_row("job",$id);
header( "location: index.php" );
exit(0);
?>