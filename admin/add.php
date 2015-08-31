<?php
$id=$_REQUEST["id"];
$topic=$_REQUEST["topic"];
require_once "tablemanager.php";
$manager = new TableManager("byakko","byakko");
$manager->selectdb("byakko");

$getagent = $manager->get_table_data("Agent");
$inac=array();
$row=count($getagent);
for($i=0;$i<$row;$i++){
	if($getagent[$i][3]=="inactive"){
		array_push($inac,$getagent[$i][1]);
	}
}
var_dump($inac);
 ?>

 <html>
 <head>
 </head>
 <body>
 	<h1>Topic:<?php echo $topic;?></h1>
 	<form action="update_add.php" method="post">
	 	<select name="addagent" >
	 		<?php
	 			for($i=0;$i<count($inac);$i++){
	 			echo "<option value=\"".$inac[$i]."\">".$inac[$i]."</option>";
	 		}
	 		?>
	 	</select>
	 	<?php
	 		echo "<input type=\"hidden\" name=\"id\" value=\"".$id."\">";
	 		echo "<input type=\"hidden\" name=\"topic\" value=\"".$topic."\">";
	 	?>
	 	<input type="submit">
	 </form>
 </body>
 </html>