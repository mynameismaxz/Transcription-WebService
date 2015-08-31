<?php
$id=$_REQUEST["id"];
$topic=$_REQUEST["topic"];
$selectedit=$_REQUEST["selectedit"];
?>

 <html>
 <head>
 </head>
 <body>
 	<h1>Edit:</h1>
	<form action="update_edit.php" method="post">
			<input type="text" name="edit">
		<?php
		echo "<input type=\"hidden\" name=\"id\" value=\"".$id."\">";
	 	echo "<input type=\"hidden\" name=\"topic\" value=\"".$topic."\">";
	 	echo "<input type=\"hidden\" name=\"selectedit\" value=\"".$selectedit."\">";
	 	?>
		<input type="submit">
	</form>