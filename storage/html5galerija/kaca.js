/*		=================================
			 * IGRA KAČA verzija 6 *	 	
		=================================
				  Kazalo kode:			
		=================================
		  ~spremenljivke
		    ~konstruktor igra		149
		  ~funkcije
		    ~izrisovanje
			  ~spremembaOkna()		201
			  ~izrisMreze()			218
			  ~izrisKace()			239
			  ~osveziCanvas()		298
			~računanje
			  ~premikKace()			306
			  ~detekcija()			322
			~dogodki
			  ~start				347
			  ~sprememba okna		350
			  ~pritisk tipke		351
			  ~tik generator		360
		
		=================================
*/

		//SPREMENLJIVKE
		var barva = 1;
		var hitrost = 200;
		var igraKaca;
		var igra = function(){
			this.delKace = function (x, y, r) {
				this.X = x;
				this.Y = y;
				this.R = r;//smer
			};
			this.okno = {
				visina: 111,//višina okna
				sirina: 111//širina okna
			};
			this.mreza = {
				razmik: 111,//sirina okna / številom stolpcev
				stVrstic: 111,//zaokroženo((visina okna-višina ododne vrstice) / rzmik vrstic )
				stStolpcev: 60//manjša kot je širina zaslona manjše je število stolpcev
			};
			this.canvas = {
				def: document.getElementById("canvas"),
				povrsina: document.getElementById("canvas").getContext("2d"),
				visina: 111,//višina canvas-a
				sirina: 111//širina canvas-a
			};
			this.kaca = [
				new this.delKace(10,3,3),//začetni 4 delčki kače
				new this.delKace(9,3,3),
				new this.delKace(8,3,3),
				new this.delKace(7,3,3),
				new this.delKace(6,3,3),
				new this.delKace(5,3,3),
				new this.delKace(4,3,3)
			];
			this.hrana = new this.delKace(111111,11111,0);

			this.barvaKace = {
				barva1: "#243500",//glava
				barva2: "#334C00",//rep
				barva3: "#6BB224",//črte
			};
			this.orodnaVrsticaVisina = 60;//minimalna višina rezervirana za orodno vrstico
			this.kacaSmer = 3;
			this.pauza = true;
			this.ugrizAnimation = false;
			this.pokaziNadaljuj = false;
			this.tocke = 0;
			this.pusti;
			this.srcki = 3;
			
			//seznam funkcij
			this.spremembaOkna();
			this.osveziCanvas();
			this.izrisMreze();
			this.izrisKace();
			this.izrisHrane();
			this.izrisVrstice();
			
			this.pokaziMenu();
			this.pokaziGameOver();
			this.pokaziIgro();
			this.pokaziNastavitve();
			this.pokaziRekord();
			
			this.premikKace();
			this.detekcija();
			this.postaviHrano();
			this.ugriz();
			this.spremeniHitrost();
			this.spremeniBarvo();
			
			this.tickGenerator();
		}
		
		//FUNKCIJE
		
		igra.prototype = {
			//IZRISOVALNI DEL
			spremembaOkna: function() {
				this.okno.sirina = window.innerWidth;
				this.okno.visina = window.innerHeight;
				
				this.mreza.stStolpcev = Math.floor(this.okno.sirina/25);//manjša kot je širina zaslona manjše je število stolpcev

				this.mreza.razmik = this.okno.sirina/this.mreza.stStolpcev;//sirina okna / številom stolpcev
				this.mreza.stVrstic = Math.floor((this.okno.visina-this.orodnaVrsticaVisina)/this.mreza.razmik);//zaokroženo((visina okna-višina ododne vrstice) / rzmik vrstic )
				
				this.canvas.sirina = this.okno.sirina;
				this.canvas.visina = this.mreza.stVrstic * this.mreza.razmik;
				
				this.canvas.def.height = this.canvas.visina;
				this.canvas.def.width = this.canvas.sirina;
				
				this.osveziCanvas();
			},
			izrisMreze: function() {
				var x = 0;
				var y = 0;
				this.canvas.povrsina.beginPath();
				for(i=0; i<this.mreza.stStolpcev+1; i++){//izris stolpcev
					this.canvas.povrsina.beginPath();
					this.canvas.povrsina.moveTo(x, 0);
					this.canvas.povrsina.lineTo(x, this.canvas.visina);
					this.canvas.povrsina.lineWidth=0.2;
					this.canvas.povrsina.stroke();
					x += this.mreza.razmik;
				}
				for(i=0; i<this.mreza.stVrstic+1; i++){//izris stolpcev
					this.canvas.povrsina.beginPath();
					this.canvas.povrsina.moveTo(0, y);
					this.canvas.povrsina.lineTo(this.canvas.sirina, y);
					this.canvas.povrsina.lineWidth=0.2;
					this.canvas.povrsina.stroke();
					y += this.mreza.razmik;
				}
			},
			izrisKace: function() {
				for(i=0; i < this.kaca.length; i++){
					if(i==0){//izriše glavo
						var kacax = this.kaca[i].X * this.mreza.razmik;
						var kacay = this.kaca[i].Y * this.mreza.razmik;
						this.canvas.povrsina.fillStyle=this.barvaKace.barva1;
						this.canvas.povrsina.fillRect(kacax,kacay,this.mreza.razmik,this.mreza.razmik);//izriše osnovo glave
						if(this.kaca[i].R == 1){
							var oko1x = (this.kaca[i].X * this.mreza.razmik) + this.mreza.razmik/5;//5px (na zaslonu 1280px)
							var oko1y = (this.kaca[i].Y * this.mreza.razmik) + this.mreza.razmik/5;//5px
							var oko2x = (this.kaca[i].X * this.mreza.razmik) + this.mreza.razmik/5;//5px
							var oko2y = (this.kaca[i].Y * this.mreza.razmik) + this.mreza.razmik/1.6;//15px
						}
						if(this.kaca[i].R == 2){
							var oko1x = (this.kaca[i].X * this.mreza.razmik) + this.mreza.razmik/5;//5px
							var oko1y = (this.kaca[i].Y * this.mreza.razmik) + this.mreza.razmik/5;//5px
							var oko2x = (this.kaca[i].X * this.mreza.razmik) + this.mreza.razmik/1.6;//15px
							var oko2y = (this.kaca[i].Y * this.mreza.razmik) + this.mreza.razmik/5;//5px
						}
						if(this.kaca[i].R == 3){
							var oko1x = (this.kaca[i].X * this.mreza.razmik) + this.mreza.razmik/1.6;//15px
							var oko1y = (this.kaca[i].Y * this.mreza.razmik) + this.mreza.razmik/5;//5px
							var oko2x = (this.kaca[i].X * this.mreza.razmik) + this.mreza.razmik/1.6;//15px
							var oko2y = (this.kaca[i].Y * this.mreza.razmik) + this.mreza.razmik/1.6;//15px
						}
						if(this.kaca[i].R == 4){
							var oko1x = (this.kaca[i].X * this.mreza.razmik) + this.mreza.razmik/5;//5px
							var oko1y = (this.kaca[i].Y * this.mreza.razmik) + this.mreza.razmik/1.6;//15px
							var oko2x = (this.kaca[i].X * this.mreza.razmik) + this.mreza.razmik/1.6;//15px
							var oko2y = (this.kaca[i].Y * this.mreza.razmik) + this.mreza.razmik/1.6;//15px
						}
						this.canvas.povrsina.fillStyle="#FFFFFF";
						this.canvas.povrsina.fillRect(oko1x,oko1y,this.mreza.razmik/5,this.mreza.razmik/5);
						this.canvas.povrsina.fillRect(oko2x,oko2y,this.mreza.razmik/5,this.mreza.razmik/5);
					}
					else{//izriše rep
						var kaca1x = this.kaca[i].X * this.mreza.razmik;
						var kaca1y = this.kaca[i].Y * this.mreza.razmik;
						this.canvas.povrsina.fillStyle=this.barvaKace.barva2;
						this.canvas.povrsina.fillRect(kaca1x,kaca1y,this.mreza.razmik,this.mreza.razmik);//izriše osnovo repa
						
						if((this.kaca[i].R==1)||(this.kaca[i].R==3)){							
							var kaca2x = (this.kaca[i].X * this.mreza.razmik) + this.mreza.razmik/3;
							var kaca2y = this.kaca[i].Y * this.mreza.razmik;
							
							this.canvas.povrsina.fillStyle=this.barvaKace.barva3;
							this.canvas.povrsina.fillRect(kaca2x,kaca2y,this.mreza.razmik/2,this.mreza.razmik);
						}
						
						if((this.kaca[i].R==2)||(this.kaca[i].R==4)){							
							var kaca2x = this.kaca[i].X * this.mreza.razmik;
							var kaca2y = (this.kaca[i].Y * this.mreza.razmik) + this.mreza.razmik/3;
							
							this.canvas.povrsina.fillStyle=this.barvaKace.barva3;
							this.canvas.povrsina.fillRect(kaca2x,kaca2y,this.mreza.razmik,this.mreza.razmik/2);
						}
					}
				}
			},
			izrisHrane: function(){
				var predmetX = this.hrana.X * this.mreza.razmik;
				var predmetY = this.hrana.Y * this.mreza.razmik;
				this.canvas.povrsina.fillStyle="#FF9933";
				this.canvas.povrsina.fillRect(predmetX,predmetY,this.mreza.razmik,this.mreza.razmik);//izriše hrano
			},
			izrisVrstice: function(){
				document.getElementById("tocke").innerHTML = this.tocke;//prikaže točke
				var visina = this.okno.visina - this.canvas.visina;
				document.getElementById("vrstica").style.height = visina.toString()+"px";//nastavi višino orodne vrstice
				
				//izris srčkov
				document.getElementById("dispalyLife").innerHTML = "";
				for(i=0; i<this.srcki; i++){
					document.getElementById("dispalyLife").innerHTML += "<span class='poln'>&#9829;</span>";
				}
				for(i=0; i<5-this.srcki; i++){
					document.getElementById("dispalyLife").innerHTML += "<span class='prazen'>&#9829;</span>";
				}
			},
			osveziCanvas: function() {//izvede vse funkcije prikazovanja
				this.canvas.def.height = this.canvas.visina;//pobrise canvas
				this.canvas.def.width = this.canvas.sirina;//
				this.izrisMreze();
				this.izrisKace();
				this.izrisVrstice();
				this.izrisHrane();
			},
			//PRIKAZ MENUJEV
			pokaziIgro: function(){
				document.getElementById("game").style.display = "block";
				document.getElementById("game-over").style.display = "none";
				document.getElementById("menu").style.display = "none";
				document.getElementById("nastavitve").style.display = "none";
				document.getElementById("rekord").style.display = "none";
				document.getElementById("con").style.display = "none";
				document.getElementById("body").style.overflow = "hidden";
				this.pauza = false;
			},
			pokaziGameOver: function(){
				document.getElementById("game").style.display = "none";
				document.getElementById("game-over").style.display = "block";
				document.getElementById("menu").style.display = "none";
				document.getElementById("nastavitve").style.display = "none";
				document.getElementById("rekord").style.display = "none";
				document.getElementById("con").style.display = "block";
				document.getElementById("body").style.overflow = "scroll";
				this.pokaziNadaljuj = false;
				this.pauza = true;
				
				if(localStorage.rekord < this.tocke){
					localStorage.rekord = this.tocke;
				}
				document.getElementById("tockeDisplay").innerHTML = "točke: " + this.tocke;
				document.getElementById("rekordDisplay").innerHTML = "rekord: " + localStorage.rekord;
			},
			pokaziMenu: function(){
				document.getElementById("game").style.display = "none";
				document.getElementById("game-over").style.display = "none";
				document.getElementById("menu").style.display = "block";
				document.getElementById("nastavitve").style.display = "none";
				document.getElementById("rekord").style.display = "none";
				document.getElementById("con").style.display = "block";
				document.getElementById("body").style.overflow = "scroll";
				if(this.pokaziNadaljuj == false){
					document.getElementById("nadaljuj").style.display = "none";
				}
				else{
					document.getElementById("nadaljuj").style.display = "block";
				}
				this.pauza = true;
			},
			pokaziNastavitve: function(){
				document.getElementById("game").style.display = "none";
				document.getElementById("game-over").style.display = "none";
				document.getElementById("menu").style.display = "none";
				document.getElementById("nastavitve").style.display = "block";
				document.getElementById("rekord").style.display = "none";
				document.getElementById("con").style.display = "block";
				document.getElementById("body").style.overflow = "scroll";
				this.spremeniHitrost(0);
				this.spremeniBarvo(0);
				this.pauza = true;
			},
			pokaziRekord: function(){
				document.getElementById("game").style.display = "none";
				document.getElementById("game-over").style.display = "none";
				document.getElementById("menu").style.display = "none";
				document.getElementById("nastavitve").style.display = "none";
				document.getElementById("rekord").style.display = "block";
				document.getElementById("con").style.display = "block";
				document.getElementById("body").style.overflow = "scroll";
				this.pauza = true;
				document.getElementById("rekordDisplay1").innerHTML = "rekord: " + localStorage.rekord;
			},
			
			//RAČUNSKI DEL
			
			premikKace: function() {
				this.kaca.splice(this.kaca.length-1, 1);
				if(this.kacaSmer == 1){//premik levo
						this.kaca.unshift(new this.delKace(this.kaca[0].X-1,this.kaca[0].Y, this.kacaSmer));
				}
				if(this.kacaSmer == 2){//premik gor
						this.kaca.unshift(new this.delKace(this.kaca[0].X,this.kaca[0].Y-1, this.kacaSmer));
				}
				if(this.kacaSmer == 3){//premik desno
						this.kaca.unshift(new this.delKace(this.kaca[0].X+1,this.kaca[0].Y, this.kacaSmer));
				}
				if(this.kacaSmer == 4){//premik dol
						this.kaca.unshift(new this.delKace(this.kaca[0].X,this.kaca[0].Y+1, this.kacaSmer));
				}
			},
			detekcija: function() {//če se kača zaleti v rob pride ven na drugi strani
				//detekcija roba
				if(this.kacaSmer == 1){//levo
					if(this.kaca[0].X < 0){
						this.kaca[0].X = this.mreza.stStolpcev-1;
					}
				}
				if(this.kacaSmer == 2){//gor
					if(this.kaca[0].Y < 0){
						this.kaca[0].Y = this.mreza.stVrstic-1;
					}
				}
				if(this.kacaSmer == 3){//desno
					if(this.kaca[0].X > this.mreza.stStolpcev-1){
						this.kaca[0].X = 0;
					}
				}
				if(this.kacaSmer == 4){//dol
					if(this.kaca[0].Y > this.mreza.stVrstic-1){
						this.kaca[0].Y = 0;
					}
				}
				//detekcija repa
				for(i=1; i<this.kaca.length; i++){
					var repX = this.kaca[i].X;
					var repY = this.kaca[i].Y;
					if((this.kaca[0].X == repX)&&(this.kaca[0].Y == repY)){
						this.ugrizAnimation = true;
						this.pusti = i;
						if(this.srcki>1){
							this.srcki--;
						}
						else{
							this.srcki--;
							this.pusti = 0;
						}
						this.ugriz();//tudi pove če je konec igre
					}
				}
				//detekcija hrane
					var hranaX = this.hrana.X;
					var hranaY = this.hrana.Y;
					if((this.kaca[0].X == hranaX)&&(this.kaca[0].Y == hranaY)){
						this.postaviHrano();
						this.tocke++;
						this.kaca.push(new this.delKace(this.kaca[this.kaca.length-1].X,this.kaca[this.kaca.length-1].Y, this.kaca[this.kaca.length-1].R));//doda nov delček kače
					}
			},
			postaviHrano: function(){
				var X = Math.floor(Math.random()* this.mreza.stStolpcev);
				var Y = Math.floor(Math.random()* this.mreza.stVrstic);
				var ok = true;//spremenljivka blokira postavitev hrane na kačo
				for(i=1; i<this.kaca.length; i++){
					if((this.kaca[i].X == X)&&(this.kaca[i].Y == Y)){ok = false;}
				}
				if(ok == true){
					this.hrana = new this.delKace(X,Y,0);
				}
				else{
					this.postaviHrano();
				}
			},
			ugriz: function(){
				if(this.kaca.length > this.pusti){
					setTimeout(this.ugriz.bind(this), 100);	
					this.kaca.splice(this.pusti,1);
				}
				else{
					if(this.srcki < 1){
						this.pokaziGameOver();
					}
					else{
						this.ugrizAnimation = false;
					}
				}
				this.osveziCanvas();
			},
			spremeniHitrost: function(na){
				if(na>50){
					hitrost = na;
				}
				if(hitrost == 100){
					document.getElementById("pocasi").style.background = "#5DADE2";
					document.getElementById("srednje").style.background = "#5DADE2";
					document.getElementById("hitro").style.background = "#3399FF";
				}
				if(hitrost == 200){
					document.getElementById("pocasi").style.background = "#5DADE2";
					document.getElementById("srednje").style.background = "#3399FF";
					document.getElementById("hitro").style.background = "#5DADE2";
				}
				if(hitrost == 300){
					document.getElementById("pocasi").style.background = "#3399FF";
					document.getElementById("srednje").style.background = "#5DADE2";
					document.getElementById("hitro").style.background = "#5DADE2";
				}
			},
			spremeniBarvo: function(na){
				if(na>0){
					barva = na;
				}
					if(barva == 1){
						document.getElementById("zelena").style.background = "#3399FF";
						document.getElementById("modra").style.background = "#5DADE2";
						document.getElementById("rdeca").style.background = "#5DADE2";
						document.getElementById("oranzna").style.background = "#5DADE2";
						document.getElementById("rjava").style.background = "#5DADE2";
						
						this.barvaKace.barva1 = "#243500";
						this.barvaKace.barva2 = "#334C00";
						this.barvaKace.barva3 = "#6BB224";
					}
					if(barva == 2){
						document.getElementById("zelena").style.background = "#5DADE2";
						document.getElementById("modra").style.background = "#3399FF";
						document.getElementById("rdeca").style.background = "#5DADE2";
						document.getElementById("oranzna").style.background = "#5DADE2";
						document.getElementById("rjava").style.background = "#5DADE2";
						
						this.barvaKace.barva1 = "#0066CC";
						this.barvaKace.barva2 = "#0052CC";
						this.barvaKace.barva3 = "#3375D6";
					}
					if(barva == 3){
						document.getElementById("zelena").style.background = "#5DADE2";
						document.getElementById("modra").style.background = "#5DADE2";
						document.getElementById("rdeca").style.background = "#3399FF";
						document.getElementById("oranzna").style.background = "#5DADE2";
						document.getElementById("rjava").style.background = "#5DADE2";
						
						this.barvaKace.barva1 = "#B22400";
						this.barvaKace.barva2 = "#E62E00";
						this.barvaKace.barva3 = "#A22F12";
					}
					if(barva == 4){
						document.getElementById("zelena").style.background = "#5DADE2";
						document.getElementById("modra").style.background = "#5DADE2";
						document.getElementById("rdeca").style.background = "#5DADE2";
						document.getElementById("oranzna").style.background = "#3399FF";
						document.getElementById("rjava").style.background = "#5DADE2";
						
						this.barvaKace.barva1 = "#CF5300";
						this.barvaKace.barva2 = "#FF6600";
						this.barvaKace.barva3 = "#FF8533";
					}
					if(barva == 5){
						document.getElementById("zelena").style.background = "#5DADE2";
						document.getElementById("modra").style.background = "#5DADE2";
						document.getElementById("rdeca").style.background = "#5DADE2";
						document.getElementById("oranzna").style.background = "#5DADE2";
						document.getElementById("rjava").style.background = "#3399FF";
						
						this.barvaKace.barva1 = "#80421A";
						this.barvaKace.barva2 = "#663515";
						this.barvaKace.barva3 = "#8A3700";
					}
			},
			//TICK GENERATOR
			tickGenerator: function() {
				if((this.pauza == false)&&(this.ugrizAnimation == false)){//med pauzo se kača na premika
					this.premikKace();
					this.detekcija();
					this.osveziCanvas();
				}
				setTimeout(this.tickGenerator.bind(this), hitrost);	
			}
		}
		
		function novaIgra(){
			igraKaca = new igra();//kliče konstruktor
			igraKaca.pokaziIgro();
			igraKaca.pokaziNadaljuj = true;
		}
		
		if(localStorage.rekord == undefined)localStorage.rekord = 0;
		if(localStorage.rekord == "")localStorage.rekord = 0;
		
		
		igraKaca = new igra();//kliče konstruktor
		igraKaca.pokaziMenu();
		
		//DOGODKI
		window.addEventListener("resize", function(){igraKaca.spremembaOkna()});
		document.addEventListener('keydown', function(event) {
			if(igraKaca.pauza == false){//med pauzo ne moreš spreminjati smeri
				if		(event.keyCode == 37) {if(igraKaca.kaca[0].R != 3){igraKaca.kacaSmer=1;};}//leva
				else if	(event.keyCode == 38) {if(igraKaca.kaca[0].R != 4){igraKaca.kacaSmer=2;};}//gor
				else if	(event.keyCode == 39) {if(igraKaca.kaca[0].R != 1){igraKaca.kacaSmer=3;};}//desna
				else if	(event.keyCode == 40) {if(igraKaca.kaca[0].R != 2){igraKaca.kacaSmer=4;};}//dol
			}
		});