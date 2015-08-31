<?php
$id=$_REQUEST["id"];
$topic=$_REQUEST["topic"];
$agent=$_REQUEST["agent"];
$s_agent=explode(",",$agent);
?>
 <html>
 <head>
 </head>
 <body>
 	<h1>Topic:<?php echo $topic;?></h1>
 	<form action="update_delete.php" method="post">
	 	<select name="deleteagent" >
	 		<?php
	 			for($i=0;$i<count($s_agent);$i++){
	 			echo "<option value=\"".$s_agent[$i]."\">".$s_agent[$i]."</option>";
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
 