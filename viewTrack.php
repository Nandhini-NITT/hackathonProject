<?php
include "connect.php";
$sql="SELECT * FROM useraudios where 1";
$result = $conn->query($sql);
while($row1=$result->fetch_assoc())
{
	$pos = strpos($row1['Path'],"/uploads");
	$path=substr($row1['Path'],$pos);
	$path="".$path."";
	echo "<p>Song Name:".$row1['song']."Album Name:".$row1['Album'].'</p><a href="#" onClick="playTrack(\''.$path.'\');return false;">Click to play</a>';
}
?>
