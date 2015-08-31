<!DOCTYPE html>
<?PHP
    session_start();
    if($_SESSION['username'] == ''){
        header("location:index.html");
    }
//    mysqli_connect("localhost","byakko","byakko","byakko");
session_start();
//echo $_SESSION['username'];
//echo $_SESSION['status'];
$username = $_SESSION['username'];
$status = $_SESSION['status'];

mysql_connect("localhost","byakko","byakko");
mysql_select_db("byakko");

$query = "SELECT job . * 
FROM top
JOIN job ON job.topic = top.agent
WHERE top.topic = '".mysql_real_escape_string($username)."'";

$objQuery = mysql_query($query);
?>

<html>
<head>
    <link rel="stylesheet" href="css/agent-table-expands.css">
</head>
<body>
    <div class="login-wrap">
            <h1><i class="fa fa-group"></i></h1>
            <h2>Agent : <?php echo $username; ?></h2>
        <table width="100%" border="1">
  <tr>
      <th width="25%">Topic</th>
      <th width="10%">Start Time</th>
      <th width="10%">End Time</th>
      <th width="10%">Date</th>
      <th width="15%">with Agent</th>
      <th width="20%">Link</th>
  </tr>
    <?php
        while($objResult = mysql_fetch_array($objQuery)){
    ?>
  <tr>
    <td><?php echo $objResult["topic"];?></td>
    <td><?php echo $objResult["timestart"];?></td>
    <td><?php echo $objResult["timeend"];?></td>
    <td><?php echo $objResult["datestart"];?></td>
    <td><?php echo $objResult["agent"];?></td>
    <td>
        <form action="http://104.43.18.77:8007/co-ordination" method="POST" name="postToTyping">
            <input type="hidden" name="broadcaster" value='<?php echo $objResult["user"];?>'>
   			<?php
        			list($agent1,$agent2,$agent3) = explode(',',$objResult["agent"]);
    			?>
			<input type="hidden" name="agent1" value='<?php echo $agent1;?>'>
			<input type="hidden" name="agent2" value='<?php echo $agent2;?>'>
			<input type="hidden" name="agent3" value='<?php echo $agent3;?>'>
            <input type="hidden" name="topic" value='<?php echo $objResult["topic"];?>'>
            <input type="hidden" name="timestart" value='<?php echo $objResult["timestart"];?>'>
            <input type="hidden" name="timeend" value='<?php echo $objResult["timeend"];?>'>
            <center><a href="#" onclick="document.postToTyping.submit();">Link</a></center>
        </form>
    </td> 
   </tr>  
   
    <center><img src="https://chart.googleapis.com/chart?chs=150x150&cht=qr&chl=http://104.43.18.77:9001/p/<?php echo $objResult["topic"];?>"></center><br />
    <center><a href="logout.php"><i class="fa fa-key">logout</i></a></center>
    </div>
    <script src='https://code.jquery.com/jquery-1.10.0.min.js'></script>
    <script src="js/index.js"></script>
 <?php
    }   
    ?>
</body>
</html>