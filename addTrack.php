<?php
if(!isset($_FILES['userfile']))
{
	echo 'Please select a file';
}

else if($_FILES['userfile']['error']===1 || $_FILES['userfile']['error']===2 )
{
	echo "File exceeds maximum file size that can be uploaded";
}
else if($_FILES['userfile']['error']!=0)
{
	echo "The file wasnt uploaded properly";
}
else
{	
	$name = $_FILES['userfile']['name'];
	$target_pat = $_SERVER["DOCUMENT_ROOT"] .'/uploads/';
	$target_pat = $target_pat. basename($name);
	$temp = $_FILES['userfile']['tmp_name'];
	$hashedAudio=SHA1(file_get_contents($temp));
	include "connect.php";
	$sql1="Select song from useraudios where hashContents='".$hashedAudio."'";
	$result=$conn->query($sql1);
	if($result->num_rows>0)
	{
		echo "The given file was already uploaded";
	}
	else
	{
	if (strpos($_FILES['userfile']['type'], 'audio/') !== false) 
	{
		echo "scuccess";
		move_uploaded_file($temp , $target_pat);
		$song=$_POST['songName'];
		$album=$_POST['albumName'];
		$genre=$_POST['genre'];
		$stmt=$conn->prepare("Insert into useraudios(song,album,path,Genre,hashContents) values (?,?,?,?,?)");
		$stmt->bind_param('sssss',$song,$album,$target_pat,$genre,$hashedAudio);
		if($stmt->execute())
			header("Location:home.php");
	}
	}
}
?>