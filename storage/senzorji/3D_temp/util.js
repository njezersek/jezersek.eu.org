    function hex (c) {
       var s = "0123456789abcdef";
       var i = parseInt (c);
       if (i == 0 || isNaN (c))
       return "00";
       i = Math.round (Math.min (Math.max (0, i), 255));
       return s.charAt ((i - i % 16) / 16) + s.charAt (i % 16);
    }

    /* Convert an RGB triplet to a hex string */
    function convertToHex (rgb) {
       return hex(rgb[0]) + hex(rgb[1]) + hex(rgb[2]);
    }
	
	
		function hsvToRgb(h,s,v) {  
  
		var s = s / 100, v = v / 100;  
  
		var hi = Math.floor((h/60) % 6);  
		var f = (h / 60) - hi;  
		var p = v * (1 - s);  
		var q = v * (1 - f * s);  
		var t = v * (1 - (1 - f) * s);  
  
		var rgb = [];  
  
		switch (hi) {  
			case 0: rgb = [v,t,p];break;  
			case 1: rgb = [q,v,p];break;  
			case 2: rgb = [p,v,t];break;  
			case 3: rgb = [p,q,v];break;  
			case 4: rgb = [t,p,v];break;  
			case 5: rgb = [v,p,q];break;  
		}  
  
		var r = Math.min(255, Math.round(rgb[0]*256)),  
			g = Math.min(255, Math.round(rgb[1]*256)),  
			b = Math.min(255, Math.round(rgb[2]*256));  
  
		return [r,g,b];    
	} 
	
		function get_random_color() {
			var letters = '0123456789ABCDEF'.split('');
			var color = '#';
			for (var i = 0; i < 6; i++ ) {
				color += letters[Math.round(Math.random() * 15)];
			}
			return color;
		}
		
		function rainbow(t) {
		//function rainbow(numOfSteps, step) {
		// This function generates vibrant, "evenly spaced" colours (i.e. no clustering). This is ideal for creating easily distinguishable vibrant markers in Google Maps and other apps.
		// Adam Cole, 2011-Sept-14
		// HSV to RBG adapted from: http://mjijackson.com/2008/02/rgb-to-hsl-and-rgb-to-hsv-color-model-conversion-algorithms-in-javascript
			var r, g, b;
			//var h = step / numOfSteps;
			var h = (t - 10)/30;
			var i = ~~(h * 6);
			var f = h * 6 - i;
			var q = 1 - f;
			switch(i % 6){
				case 0: r = 1, g = f, b = 0; break;
				case 1: r = q, g = 1, b = 0; break;
				case 2: r = 0, g = 1, b = f; break;
				case 3: r = 0, g = q, b = 1; break;
				case 4: r = f, g = 0, b = 1; break;
				case 5: r = 1, g = 0, b = q; break;
			}
			//var c = "#" + ("00" + (~ ~(r * 255)).toString(16)).slice(-2) + ("00" + (~ ~(g * 255)).toString(16)).slice(-2) + ("00" + (~ ~(b * 255)).toString(16)).slice(-2);
			var rgb = [];
			rgb = [r * 255, g * 255, b * 255];
			return (rgb);
		}
	