<!DOCTYPE html>
<html>
<head>
<script>
function _(el){
	return document.getElementById(el);
}
function uploadFile(){
	var file = _("file1").files[0];
	upload(file);
}
function upload(file){
	// alert(file.name+" | "+file.size+" | "+file.type);
	var formdata = new FormData();
	formdata.append("file1", file);
	var ajax = new XMLHttpRequest();
	ajax.upload.addEventListener("progress", function(event){progressHandler(event,file.name)}, false);
	ajax.addEventListener("load", completeHandler, false);
	ajax.addEventListener("error", errorHandler, false);
	ajax.addEventListener("abort", abortHandler, false);
	ajax.open("POST", "file_upload_parser.php");
	ajax.send(formdata);
	
	_('drop_zone').innerHTML += "<a class='progress'><div class='bar-cont'><div class='bar' id='bar"+file.name+"'></div></div><div class='text-cont'><div class='text'>"+file.name+"</div></div></a>";
}
function drag_drop(event) {
    event.preventDefault();
	upload(event.dataTransfer.files[0]);
}
function progressHandler(event, name){
	//console.log(event, name)
	//_("loaded_n_total").innerHTML = "Uploaded "+event.loaded+" bytes of "+event.total;
	var percent = (event.loaded / event.total) * 100;
	//_("progressBar").value = Math.round(percent);
	_("bar"+name).style.width = Math.round(percent)+"%";
	//_("status").innerHTML = Math.round(percent)+"% uploaded... please wait";
}
function completeHandler(event){
	//_("status").innerHTML = event.target.responseText;
	//_("progressBar").value = 0;
	scandir();
}
function errorHandler(event){
	alert("Upload Failed");
}
function abortHandler(event){
	alert("Upload Aborted");
}
function scandir(){
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		if (xhttp.readyState == 4 && xhttp.status == 200) {
		_("drop_zone").innerHTML = xhttp.responseText;
		}
	};
	xhttp.open("GET", "scandir.php", true);
	xhttp.send();
}
function uploadPrompt(){
	_('file1').click();
}

scandir();


</script>
<style>
body{
	font-family: 'Roboro', sans-serif;
}

.cont{
	display: flex;
	flex-wrap: wrap;
	padding: 20px;
	border: #999 5px dashed;
	border-radius: 10px;
}

.item{
	background-color: #48f;
	width: 200px;
	height: 150px;
	margin: 10px;
	overflow: hidden;
	display: flex;
	align-items: center;
	justify-content: center;
	
	background-position: center;
	background-repeat: no-repeat;
	background-size: cover;
}

.progress{
	width: 200px;
	height: 150px;
	background: #eee;
	margin: 10px;
	overflow: hidden;
}

.progress .bar-cont{
	width: 200px;
	height: 150px;
	float: left;
}

.progress .bar-cont .bar{
	width: 0px;
	height: 150px;
	background: #8c4;
	transition: width 0.3s;
}

.progress .text-cont{
	position: absolute;
	width: 200px;
	height: 150px;
}

.text{
	color: #fff;
	font-weight: bold;
	font-size: 18px;
	text-align: center;
	padding: 10px;
}

a{
	text-decoration: none;
}

.upload-button{
	background: pink;
	padding: 20px;
	display: inline-block;
	cursor: pointer;
	margin: 10px;
}

.or{
	display: flex;
	align-items: center;
	margin: 20px 0;
}

.or .line{
	width: 100%;
	height: 3px;
	background: #999;
}

.or .or-text{
	color: #999;
	padding: 10px;
}
</style>
</head>
<body>
<h2>HTML5 File Upload</h2>
<div class="cont" id="drop_zone" ondrop="drag_drop(event)" ondragover="return false">


</div>
<div class="or">
	<div class="line"></div>
	<div class="or-text">OR</div>
	<div class="line"></div>
</div>
<form id="upload_form" enctype="multipart/form-data" method="post">
	<input type="file" name="file1" id="file1" onchange="uploadFile()" hidden>	
	<div class="upload-button" onclick="uploadPrompt()">Choose a file</div>
</form>
</body>
</html>