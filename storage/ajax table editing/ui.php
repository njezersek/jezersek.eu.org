<!DOCTYPE html>
<head>
	<title>jezersek's MC server</title>
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<style>
		body{
			font-family: 'Roboto', sans-serif;
		}
		
		td{
			border: 1px solid #000;
			min-width: 100px;
		}
		
		textarea{
			width: 100%;
			max-width: 100%;
			display: block;
		}
	</style>
</head>
<body>
	<h1>Tabela</h1>
	
	<table id="display_table">
	</table>
	
	<script>
		var table = [];
		var editing = [];
		
		function _(el){
			return document.getElementById(el);
		}
		
		function loadTable() {
			var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function() {
				if (xhttp.readyState == 4 && xhttp.status == 200){
					table = JSON.parse(xhttp.responseText);
					render();
				}
			};
			xhttp.open("GET", "ajax/get_json.php", true);
			xhttp.send();
		}
		
		function render(){
			_('display_table').innerHTML = "<tr><th>id</th><th>text</th><th>date</th><th>user</th></tr>";
			for(i=0; i<table.length; i++){
				var vrsta = "";
				vrsta += "<tr>";
				
				vrsta += "<td id='id"+i+"'   ondblclick='edit(this)' >"+table[i].id+"</td>";
				vrsta += "<td id='text"+i+"' ondblclick='edit(this)' >"+table[i].text+"</td>";
				vrsta += "<td id='date"+i+"' ondblclick='edit(this)' >"+table[i].date+"</td>";
				vrsta += "<td id='user"+i+"' ondblclick='edit(this)' >"+table[i].user+"</td>";
				
				vrsta += "</tr>";
				
				_('display_table').innerHTML += vrsta;
			}
		}
		
		function edit(el){
			
			edit_id = "edit"+el.id;
			el.innerHTML = "<textarea id='"+edit_id+"'>"+el.innerHTML+"</textarea>";
			el.ondblclick = "";
			editing.push(el);
			console.log(el);
		}
		
		function stop_edit(){
			for(i=0; i<editing.length; i++){
				if(editing[i].id.charAt(0) == "i")table[editing[i].id.charAt(editing[i].id.length-1)].id = _("edit"+editing[i].id).value;
				if(editing[i].id.charAt(0) == "t")table[editing[i].id.charAt(editing[i].id.length-1)].text = _("edit"+editing[i].id).value;
				if(editing[i].id.charAt(0) == "d")table[editing[i].id.charAt(editing[i].id.length-1)].date = _("edit"+editing[i].id).value;
				if(editing[i].id.charAt(0) == "u")table[editing[i].id.charAt(editing[i].id.length-1)].uset = _("edit"+editing[i].id).value;
			}
			editing = [];
			render();
		}
		
		window.addEventListener('keypress', function(event){
			if(event.keyCode == 13){
				stop_edit();
			}
		});
		
		loadTable();
	</script>
</body>