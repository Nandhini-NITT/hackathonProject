<?php
include "connect.php";
$sql='Select * from useraudios where NOT Count=0 order by Count DESC';
$result=$conn->query($sql);
while($row1=$result->fetch_assoc())
{
	$pos = strpos($row1['Path'],"/uploads");
	$path=substr($row1['Path'],$pos);
	echo "<p>Song Name:".$row1['song']."</p><p>Path Name:".$row1['Album'].'</p><audio class="audios" id="'.$path.'"controls="controls" loop="loop" style="float:right"><source src="'.$path.'" type="audio/mpeg"/></audio>';
}
?>