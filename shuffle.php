<?php
include "connect.php";
$sql="Select Path,song from useraudios ORDER BY RAND()";
$result=$conn->query($sql);
$control=0;
while($row=$result->fetch_assoc())
{
	$pos = strpos($row['Path'],"/uploads");
	$path=substr($row['Path'],$pos);
	$jsondata[$control]=$path;
	$control++;
}
echo json_encode($jsondata);
?>
 