<?php
include("conn.php");
if(isset($_POST['generatelog']))
{
	echo "<script> alert('Log is being generated! Please wait...')</script>";
	exec("tcpdump -nn -tttt -w /var/www/spy/pcap/generate.pcap");
}
if(isset($_POST['stop']))
{
	echo "Log is stop";
	exec("killall -15 tcpdump");
	exec("tcpdump -nn -tttt -r /var/www/spy/pcap/generate.pcap | cut -f1,3 -d':' > /var/lib/mysql/packetspy/generate.txt");
	$filename="/var/lib/mysql/packetspy/generate.txt";
	chmod($filename, 0777);
	$sql="LOAD DATA INFILE 'generate.txt' INTO TABLE temp FIELDS TERMINATED BY ' '";
  mysql_query($sql);
}

?>
<html>
<head>

<title>Welcome to Packet-SPY</title>
<link rel="shortcut icon" href="g.ico">


<link rel="stylesheet" href="wlcm.css" >

<link href="css/wlcm.css" rel="stylesheet" type="text/css">
<style>
.inr{
border-style: ridge;
border:1px ;
}

</style>
</head>

<body style="margin: 0px; padding: 0px; font-family: 'Trebuchet MS',verdana;">

<table width="100%" style="height: 100%;" cellpadding="0" cellspacing="0" border="0">
<tr>

<!-- ============ HEADER SECTION ============== -->
<td colspan="2" style="height: 120px;" bgcolor="#000066"><h1><img src="images/text.png" width="1286px" height="120px" </h1></td></tr>

<tr>
<!-- ============ LEFT COLUMN (MENU) ============== -->
<td width="15%" valign="top" bgcolor="#999f8e">
<form name="button" method="post">
<div style="margin-left:23px"><button name="generatelog" id="generatelog"  value="Genrate Log" class="btn_place_gen">Generate Log</button></div>
<div style="margin-left:23px"><button name="stop" id="stop"  value="Stop" class="btn_place_stop" >Stop</button></div>
<div style="margin-left:23px"><button name="displaylog" id="displaylog"  value="Display Log" class="btn_place_display">Dispaly Log</button></div>
<div style="margin-left:23px"><button name="Get Graph" id="Get Graph"  value="Get Graph" class="btn_place_display">Get Graph</button></div>
</form>
</td>

<!-- ============ RIGHT COLUMN (CONTENT) ============== -->
<td width="80%" valign="top" bgcolor="#d2d8c7">
<form method="post">
<input type="text" name="s" id="st" /></input>
<input type="text" name="e" id="et" /></input>
</form>
<h2 align="center"> <font size="6">Log Table</h2>


<table cellpadding="10" width="100%" cellspacing="0" border="1px"  class="inr" >
<?php 
if(isset($_POST['displaylog']))
{
	echo "display log";
	$s=$_POST['s'];
	echo $s;
	$e=$_POST['e'];
	echo $e;
	$sql="select * from temp WHERE time BETWEEN '$stime' AND '$etime'";
	$result=mysql_query($sql);
	while($row=mysql_fetch_array($result))
	{
?>
<tr >
<td align="center" bgcolor="#6699ff"><font size="6">Month</td>
<td align="center" bgcolor="#6699ff"><font size="6">Date</td>
<td align="center" bgcolor="#6699ff"><font size="6">Time</td>
<td align="center" bgcolor="#6699ff"><font size="6">User</td>
<td align="center" bgcolor="#6699ff"><font size="6">Local</td>
<td align="center" bgcolor="#6699ff"><font size="6">Remote</td>
</tr>
<?php 
/*if(isset($_POST['displaylog']))
{
		$sql="select * from temp";
	$result=mysql_query($sql);
	while($row=mysql_fetch_array($result))
	{
	*/
?>

<tr>
<td><?php echo $row['month']; ?></td>
<td><?php echo $row['dt']; ?></td>
<td><?php echo $row['time']; ?></td>
<td><?php echo $row['name']; ?></td>
<td><?php echo $row['local']; ?></td>
<td><?php echo $row['remote']; ?></td>
<?php
	}
}
?>
</tr>
</table><br>
<br>

</td></tr></table>
</body>

</html>