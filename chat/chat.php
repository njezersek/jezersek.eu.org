<?php
	require "connection.php";
	if(isset($_GET['r'])){
		$room = mysqli_real_escape_string($mysql, $_GET['r']);
	}
	if(isset($_SESSION["user"])){
		$user = mysqli_real_escape_string($mysql, $_SESSION["user"]);
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Simpl Chat</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="chat">
        <div id="output"></div>
    </div>
    <a class="input" id="inputBar">
        <input type="text" id="input">
        <button onclick="upload()">send</button>
    </a>
    
	<script>
		var room = "<?php echo $room ?>";
		var user = "<?php echo $user ?>";
	
        var lastUpdate = now();
        var lastMsgID = 0;
        var massages = [];
        
        
        function now(){
            var d = new Date();
            var yyyy = (d.getFullYear()).toString();
            var mm = (d.getMonth()+1).toString();
            while(mm.length<2)mm="0"+mm;
            var dd = (d.getDate()).toString();
            while(dd.length<2)dd="0"+dd;
            var HH = (d.getHours()).toString();
            while(HH.length<2)HH="0"+HH;
            var MM = (d.getMinutes()).toString();
            while(MM.length<2)MM="0"+MM;
            var SS = (d.getSeconds()).toString();
            while(SS.length<2)SS="0"+SS;
            
            return yyyy+"-"+mm+"-"+dd+"%20"+HH+":"+MM+":"+SS;
        }
        
        function load() {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (xhttp.readyState == 4 && xhttp.status == 200) {
                    var response = JSON.parse(xhttp.responseText);
                    for(i=0;i<response.length;i++){
                        var ok = true;
                        for(j=0;j<massages.length;j++){
                            if(massages[j].id == response[i].id)ok = false;
                        }
                        if(ok){
                            massages.push(response[i]);
							if(lastMsgID < response[i].id)lastMsgID = response[i].id;
                            update();
                        }
                        lastUpdate = now();
                    }
                    setTimeout(load, 100);
                }
            };
            xhttp.open("GET", "update.php?date="+lastUpdate+"&id="+lastMsgID+"&room="+room, true);
            xhttp.send();
        }
        
        function upload(){
            var msg = document.getElementById('input').value;
            document.getElementById('input').value = "";
			if(msg.toLowerCase().slice(0,1) == "/"){
				if(msg.toLowerCase() == "/home"){
					window.location = "index.php";
				}
				else if(msg.toLowerCase() == "/help"){
					window.location = "index.php";
				}
				else if(msg.toLowerCase().slice(0,6) == "/room "){
					window.location = "redirect.php?room="+msg.slice(6,msg.length)+"&user="+user;
				}
				else{
					
				}
			}
			else{
			
				var xhttp = new XMLHttpRequest();
				if(msg.length>0){
					if (xhttp.readyState == 4 && xhttp.status == 200) {
						var response = JSON.parse(xhttp.responseText);
					}
					xhttp.open("GET", "upload.php?msg="+msg+"&room="+room, true);
					xhttp.send();
				}
			}
        }
        
        function update(){
            document.getElementById("output").innerHTML = "";
            for(i=0;i<massages.length;i++){
				var my = "";
				if(massages[i].fromUser == user){
					my = "-my";
				}
                document.getElementById("output").innerHTML += "<div class='massage"+my+"' id='a"+massages[i].id+"'>"+massages[i].msg+"<div class='info'>"+massages[i].fromUser+"@"+massages[i].fromIP+" - "+massages[i].date+"</div></div><br class='break'>";
            }
            document.getElementById("a"+massages[massages.length-1].id).scrollIntoView();
        }
        
        document.getElementById('input').addEventListener("keyup", function(event){
            if(event.keyCode == 13){
                upload();
            }
        });
        
        load();
	</script>
</body>
</html>
