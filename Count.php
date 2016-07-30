<?php
include "connect.php";

$sql="Update useraudios set count=count+1 where Path like '%".$_GET['id']."'";
$result=$conn->query($sql);

?>