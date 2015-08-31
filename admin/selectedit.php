<?php
$id=$_REQUEST["id"];
$topic=$_REQUEST["topic"];
?>

 <html>
 <head>
 </head>
 <body>
 	<h1>Topic:<?php echo $topic;?></h1>
	<form action="edit.php" method="post">
		<select name="selectedit" >
			<option value="1">edit topic</option>
	 		<option value="2">edit timestart</option>
	 		<option value="3">edit timeend</option>
	 		<option value="4">edit datestart</option>
		</select>
		<?php
		echo "<input type=\"hidden\" name=\"id\" value=\"".$id."\">";
	 	echo "<input type=\"hidden\" name=\"topic\" value=\"".$topic."\">";
	 	?>
		<input type="submit">
	</form>