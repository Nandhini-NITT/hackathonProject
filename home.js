function insert_track()
{
	$('#insertTrack').toggle();
}
function viewTrack()
{
	$('#view').empty();
	$('#view').show();
	$('#Show').hide();
	$('#Show').empty();
	var xmlhttp=new XMLHttpRequest();
	xmlhttp.onreadystatechange = function(){
			if(xmlhttp.readyState == 4 &&  xmlhttp.status == 200){
				$("#view").append(xmlhttp.responseText);
	}
	}
		xmlhttp.open('GET','viewTrack.php',true);
		xmlhttp.send();
}
window.onload=function(){
	aud=document.getElementById("audio");
	aud.addEventListener("play",function(){count(this.src);});
};
function count(id)
{
	var pos = id.indexOf("/uploads");
	var path=id.substring(pos);
	var xmlhttp=new XMLHttpRequest();
	xmlhttp.onreadystatechange = function(){
			if(xmlhttp.readyState == 4 &&  xmlhttp.status == 200){
			
	}
	}
		xmlhttp.open('GET','Count.php?id='+path,true);
		xmlhttp.send();
}
var Paths;

function Shuffle()
{
	var xmlhttp=new XMLHttpRequest();
	xmlhttp.onreadystatechange = function(){
			if(xmlhttp.readyState == 4 &&  xmlhttp.status == 200){
				console.log(xmlhttp.responseText);
				Paths=JSON.parse(xmlhttp.responseText);
			shuffleTrack();
			var control=1;
			var aud=document.getElementById("audio");
			aud.addEventListener("ended",function(){
				if(control>=xmlhttpRequest.length)
					control=0;
				control++
			});
	}
	}
		xmlhttp.open('GET','shuffle.php',true);
		xmlhttp.send();
		
		
}
var pointer=0;
function shuffleTrack()
{
	aud=document.getElementById("audio");
	aud.src=Paths[pointer];
	aud.play();
	aud.addEventListener("ended",function(){
		pointer++;
		shuffleTrack();
	});
}

function showSuggestion()
{
	$('#view').hide();
	var xmlhttp=new XMLHttpRequest();
	xmlhttp.onreadystatechange = function(){
			if(xmlhttp.readyState == 4 &&  xmlhttp.status == 200){
				$('#mostPlayed').append(xmlhttp.responseText);
	}
	}
		xmlhttp.open('GET','fetchSuggest.php',true);
		xmlhttp.send();
}
function playTrack(path)
{
	aud=document.getElementById("audio");
	aud.src=path;
	aud.play();
}