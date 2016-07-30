<html>
<head>
	<title>Online Music Portal</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<script src='home.js'></script>
</head>
<body onLoad='showSuggestion();'>
	<button class='btn btn-primary' onClick='insert_track();'>
		<span class='glyphicon glyphicon-plus'></span>
	</button>
	<div id='insertTrack' style='display:none'>
		<form action='addTrack.php' enctype="multipart/form-data" method="post" id="fields">
			<input type="hidden" name="MAX_FILE_SIZE" value="100000000" />
			<input name="userfile" type="file" id="files" required=""/>
			Song Name:<input name='songName' id='Name' type="text" required>
			Album/Movie Name<input name='albumName' type='text' required>
			Genre<input name='genre' type='text' required>
			<button type="submit" name="submit" value="submit">Submit</button>
		</form>
<script>
	$('#fields').change(function(){
		var form=document.getElementById("fields");
		var file=form.files.value;
		var filename = file.replace(/.*(\/|\\)/, '');
		document.getElementById("Name").value=filename;
	});
</script>
	</div>
	<button class='btn btn-primary' onClick='viewTrack();'>
		View Tracks 
	</button>
	<button class='btn btn-success' onClick='Shuffle();'>
	Shuffle your tracks
	</button>
	<div id='Show' style='float:right'>
	
	</div>
	<br>
	<div id='player' style='display:table-cell;margin:0 auto'>
	<audio controls type="audio/mpeg"  id='audio'>
	</audio>
	</div>
	<div id='view'>
	</div>
	<a href='#' onClick='$("#mostPlayed").toggle();return false;'>Songs Recommended for you </a>
	<div id='mostPlayed' style='display:none'>

	</div>
</body>
