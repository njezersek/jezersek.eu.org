var myCenter=new google.maps.LatLng(46.173012, 14.604798);
// lokacija (kordinati) točke				/\

	function initialize()
	{
	var mapProp = {
	  center: myCenter,
	  zoom:10,
	  mapTypeId: google.maps.MapTypeId.ROADMAP
	  };

	var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);

	var marker = new google.maps.Marker({
	  position: myCenter,
	  title:'Klikni za povečavo'
	  });

	marker.setMap(map);

	// Povečaj ob kliko na oznako
	google.maps.event.addListener(marker,'click',function() {
	  map.setZoom(15);
	  map.setCenter(marker.getPosition());});
	}
	google.maps.event.addDomListener(window, 'load', initialize);