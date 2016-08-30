<!DOCTYPE html>
<html>
	<head>
		<title>AJAX FIle Manager</title>
		<style>
			body{
				margin: 0;
				font-family: 'Roboto';
			}
			
			header{
				background: #333;
				display: flex;
				justify-content: space-between;
				align-items: center;
				color: #fff;
				padding: 10px;
			}
			
			header .logo{
				color: #fff;
				font-size: 24px;
				min-width: 20%;
			}
			
			header .nav{
				width: 60%;
				display: flex;
				align-items: center;
			}
			
			header .nav img{
				padding: 5px;
				margin: 0 3px;
				border-radius: 50%;
				transition: background 0.3s;
				cursor: pointer;
			}
			
			header .nav img:hover{
				background: #444;
			}
			
			header .nav .path{
				background: #eee;
				color: #333;
				padding: 5px;
				max-width: 1000px;
				border-radius: 5px;
				box-shadow: inset 0px 0px 10px 0px rgba(0,0,0,0.2);
				height: 19px;
				width: 100%;
				margin: 0 5px;
				border: 1px #ccc solid;
				outline: none;
				font-size: 18px;
			}
			
			header .menu{
				font-size: 24px;
				min-width: 20%;
				text-align: right;
			}
			
			header .menu a{
				color: #fff;
				text-decoration: none;
			}
			
			.toolbar{
				background: #eee;
				display: flex;
			}
			
			.toolbar .button{
				padding: 10px;
				cursor: pointer;
				width: 64px;
				display: flex;
				flex-wrap: wrap;
				justify-content: center;
			}
			
			.toolbar .button img{
				padding: 10px;
			}
			
			main .container{
				display: flex;
				flex-wrap: wrap;
				margin: 5px;
			}
			
			main .container .item{
				padding: 10px;
				cursor: pointer;
				width: 100px;
				display: flex;
				flex-wrap: wrap;
				justify-content: center;
				margin: 5px;
				border-radius: 3px;
				cursor: pointer;
			}
			
			main .container .item:hover{
				border: 1px solid #6af;
				padding: 9px;
			}
			
			main .container .selected{
				background: #bef;
				border: 1px solid #6af;
				padding: 9px;
			}
			
			main .container .item .img{
				width: 100px; 
				height: 100px;
				//border: 1px solid #aaa;
				background-position: center;
				background-size: contain;
				background-repeat: no-repeat;
			}
			
			main .container .item label{
				padding: 10px 0;
				overflow-wrap: break-word;
				word-wrap: break-word;
				-ms-word-break: break-all;
				width: 100%;
				text-align: center;
				cursor: pointer;
			}
			
		</style>
	</head>
	</body>
		<header>
			<div class="logo">AJAX File Manager</div>
			<div class="nav">
				<img onclick="backDir()" src="media/left-arrow.png" width="19" height="19">
				<img onclick="upDir()" src="media/up-arrow.png" width="19" height="19">
				<input type="text" class="path" id="path">
			</div>
			<div class="menu"><a href="#">&#9776;</a></div>
			<!--<meta http-equiv="refresh" content="1">-->
		</header>
		<div class="toolbar">
			<div class="button" onclick="uploadPrompt()">
				<img src="media/upload.png" width="32" height="32">
				<label>Upload</label>
			</div>
			<div class="button" onclick="download()">
				<img src="media/download.png" width="32" height="32">
				<label>Download</label>
			</div>
			<div class="button">
				<img src="media/monitor.png" width="32" height="32">
				<label>Find</label>
			</div>
			<div class="button">
				<img src="media/delete.png" width="32" height="32">
				<label>Remove</label>
			</div>
		</div>
		<main>
			<div class="container" id="container" ondrop="drag_drop(event)" ondragover="return false">
				
			</div>
			<form id="upload_form" enctype="multipart/form-data" method="post">
				<input type="file" name="file1" id="file1" onchange="uploadFile()" hidden>	
			</form>
		</main>
		<script>
			var items = {};
			var imgTypes = ['jpg', 'png', 'gif', 'jpeg', 'bmp', 'tiff'];
			
			var currentDir = "";
			if(history.state != null)currentDir = history.state.dir;
			else{
				history.replaceState({dir: currentDir}, '', '' );
			}
			
			var historyDir = [currentDir];		
			load(currentDir);

			
			function _(el){
				return document.getElementById(el);
			}
			
			function load(dir){
				
				var xhttp = new XMLHttpRequest();
				xhttp.onreadystatechange = function() {
					if (xhttp.readyState == 4 && xhttp.status == 200) {
						items = JSON.parse(xhttp.responseText);
						render();
					}
				};
				xhttp.open("GET", "scandirjson.php?dir="+escape(dir), true);
				xhttp.send();
			}
			
			function render(){
				_('path').value = currentDir;
				_('container').innerHTML = "";
				for(i=0; i<items.length; i++){
					var item = items[i];
					if(item.type == "dir"){
						_('container').innerHTML += '<div class="item" id="i'+i+'" data-path="'+item.path+'" onclick="select(this, event)" ondblclick="changeDir(\''+item.path+'\')"><img src="media/folder.png" width="100" height="100"><label>'+item.name+'</label></div>';
					}
				}
				for(i=0; i<items.length; i++){
					var item = items[i];
					if(item.type == "file"){
						if(imgTypes.indexOf(item.extension.toLowerCase()) != -1){
							_('container').innerHTML += '<div class="item" id="i'+i+'" data-path="'+item.path+'" onclick="select(this, event)" ondblclick="openImg(\''+item.path+'\')"><div class="img" style="background-image: url('+escape(item.path)+');"></div><label>'+item.name+'</label></div>';							
						}
						else{
							var image = "file.png";
							if(item.extension.toLowerCase() == "pdf")image = "pdf.png";
							if(item.extension.toLowerCase() == "doc")image = "doc.png";
							if(item.extension.toLowerCase() == "docx")image = "doc.png";
							if(item.extension.toLowerCase() == "ppt")image = "ppt.png";
							if(item.extension.toLowerCase() == "pptx")image = "ppt.png";
							if(item.extension.toLowerCase() == "xls")image = "xls.png";
							if(item.extension.toLowerCase() == "xlsx")image = "xls.png";
							if(item.extension.toLowerCase() == "mp3")image = "mp3.png";
							if(item.extension.toLowerCase() == "mp4")image = "mp4.png";
							if(item.extension.toLowerCase() == "ai")image = "ai.png";
							if(item.extension.toLowerCase() == "avi")image = "avi.png";
							if(item.extension.toLowerCase() == "css")image = "css.png";
							if(item.extension.toLowerCase() == "dbf")image = "dbf.png";
							if(item.extension.toLowerCase() == "dwg")image = "dwg.png";
							if(item.extension.toLowerCase() == "exe")image = "exe.png";
							if(item.extension.toLowerCase() == "fla")image = "fla.png";
							if(item.extension.toLowerCase() == "html")image = "html.png";
							if(item.extension.toLowerCase() == "iso")image = "iso.png";
							if(item.extension.toLowerCase() == "js")image = "javascript.png";
							if(item.extension.toLowerCase() == "json")image = "json-file.png";
							if(item.extension.toLowerCase() == "psd")image = "psd.png";
							if(item.extension.toLowerCase() == "rtf")image = "rtf.png";
							if(item.extension.toLowerCase() == "svg")image = "svg.png";
							if(item.extension.toLowerCase() == "txt")image = "txt.png";
							if(item.extension.toLowerCase() == "xml")image = "xml.png";
							if(item.extension.toLowerCase() == "zip")image = "zip.png";
							if(item.extension.toLowerCase() == "php")image = "php.png";
							
							_('container').innerHTML += '<div class="item" id="i'+i+'" data-path="'+item.path+'" onclick="select(this, event)" ondblclick="openFile(\''+item.path+'\')"><img src="media/file_types/'+image+'" width="100" height="100"><label>'+item.name+'</label></div>';
							
						}
					}
				}
			}
			
			function changeDir(dir){
				//console.log(dir);
				currentDir = dir+"/";
				historyDir.push(currentDir);
				load(currentDir);
				
				history.pushState({dir: currentDir}, '', '' );
			}
			
			function openImg(dir){
				window.location = dir;
			}
			
			function openFile(dir){
				window.location = dir;
			}
			
			function upDir(){
				var dirArray = currentDir.split("/");
				//console.log(dirArray);
				dirArray.pop();
				dirArray.pop();
				//console.log(dirArray);
				var newDir = "";
				for(i=0; i<dirArray.length; i++){
					newDir += dirArray[i]+"/";
				}
				currentDir = newDir;
				historyDir.push(currentDir);
				load(currentDir);
				history.pushState({dir: currentDir}, '', '' );
			}
			
			function backDir(){
				historyDir.pop();
				if(historyDir.length < 1)historyDir.push("");
				currentDir = historyDir[historyDir.length-1];
				load(currentDir);
				currentDir = historyDir[historyDir.length-1];
				//console.log(historyDir);
				history.pushState({dir: currentDir}, '', '' );
			}
			
			function select(el, event){
				//deselect
				if(!event.ctrlKey){
					var els = document.getElementsByClassName("selected");
					
					while(els.length){
						els[0].classList.remove('selected');
					}
				} 				
				//alert();
				el.classList.toggle('selected');
			}
			
			function download(){
				var els = document.getElementsByClassName("selected");
				for(i=0; i<els.length; i++){
					window.downloadFile(els[i].dataset.path);
				}
			}
			
			window.addEventListener('popstate', function(e) {
				if(history.state != null)currentDir = history.state.dir;
				load(currentDir);
			});
			
			_('path').addEventListener('keypress', function(e){
				if(e.keyCode == 13){
					var newDir = _('path').value;
					if(newDir.charAt(newDir.length-1) != "/")newDir += "/";
					
					currentDir = newDir;
					
					load(currentDir);
					
					historyDir.push(currentDir);
					history.pushState({dir: currentDir}, '', '' );
				}
			});
			
			
			
			//AJAX UPLOAD
			function uploadFile(){
				var file = _("file1").files[0];
				upload(file);
			}
			function upload(file){
				 //alert(file.name+" | "+file.size+" | "+file.type);
				var formdata = new FormData();
				formdata.append("file1", file);
				var ajax = new XMLHttpRequest();
				ajax.upload.addEventListener("progress", function(event){progressHandler(event,file.name)}, false);
				ajax.addEventListener("load", completeHandler, false);
				ajax.addEventListener("error", errorHandler, false);
				ajax.addEventListener("abort", abortHandler, false);
				ajax.open("POST", "file_upload_parser.php?dir="+escape(currentDir));
				ajax.send(formdata);
				
				_('container').innerHTML += "<a class='progress'><div class='bar-cont'><div class='bar' id='bar"+file.name+"'></div></div><div class='text-cont'><div class='text'>"+file.name+"</div></div></a>";
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
				load(currentDir);
			}
			function errorHandler(event){
				alert("Upload Failed");
			}
			function abortHandler(event){
				alert("Upload Aborted");
			}
			
			function uploadPrompt(){
				_('file1').click();
			}
			
			// FILE DOWNLOAD
			
			window.downloadFile = function(sUrl) {

				//iOS devices do not support downloading. We have to inform user about this.
				if (/(iP)/g.test(navigator.userAgent)) {
					alert('Your device do not support files downloading. Please try again in desktop browser.');
					return false;
				}

				//If in Chrome or Safari - download via virtual link click
				if (window.downloadFile.isChrome || window.downloadFile.isSafari) {
					//Creating new link node.
					var link = document.createElement('a');
					link.href = sUrl;

					if (link.download !== undefined) {
						//Set HTML5 download attribute. This will prevent file from opening if supported.
						var fileName = sUrl.substring(sUrl.lastIndexOf('/') + 1, sUrl.length);
						link.download = fileName;
					}

					//Dispatching click event.
					if (document.createEvent) {
						var e = document.createEvent('MouseEvents');
						e.initEvent('click', true, true);
						link.dispatchEvent(e);
						return true;
					}
				}

				// Force file download (whether supported by server).
				var query = '?download';

				window.open(sUrl + query, '_self');
			}

			window.downloadFile.isChrome = navigator.userAgent.toLowerCase().indexOf('chrome') > -1;
			window.downloadFile.isSafari = navigator.userAgent.toLowerCase().indexOf('safari') > -1;
			
			
		</script>
	</body>
</html>