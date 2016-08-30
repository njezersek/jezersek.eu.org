
window.addEventListener("load", action);

function action(){	
  
	if(typeof(localStorage.auth) === 'undefined'){
		console.warn("Ktoś tam był ... zgadnij kto");
		//document.body.style.background = "hotpink";
	document.getElementById("toolbartop").style.display = "none";
	document.getElementById("toolbarbottom").style.display = "none";


document.body.innerHTML = "Fatal error; MySQL: database err 0x000515";
	}
	auth = true;
  localStorage.auth = true;


}
