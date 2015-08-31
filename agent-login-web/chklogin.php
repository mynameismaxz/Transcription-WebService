<?php
session_start();
mysql_connect("localhost","byakko","byakko");
mysql_select_db("byakko");
$strSQL = "SELECT * FROM Agent WHERE agent = '".mysql_real_escape_string($_POST['username'])."'
	and password = '".mysql_real_escape_string($_POST['password'])."'";
//echo $strSQL;
$objQuery = mysql_query($strSQL);
$row=mysql_fetch_array($objQuery);
//var_dump($row);
//exit;
if($row['agent']==$_POST['username'] && $row['password'] == $_POST['password'])
{
    $_SESSION["username"] = $row["agent"];
    $_SESSION["status"] = $row["status"];

    session_write_close();

//    header("location:agent_task.php");

    if($_POST['username'] == $row['agent'])
    {
        header("location:agent_task.php");
    }
    else
    {
        header("location:index.html");
    }
}
else
{
    echo "Username and Password Incorrect!";
}
mysql_close();
?>

