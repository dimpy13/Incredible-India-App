

if(sessionStorage.getItem)
{
	if(navigator.geolocation){
		navigator.geolocation.getCurrentPosition(showPosition, error);

	}
	else{
		alert('Geolocation not supported');
        sessionStorage.setItem('loc','Mumbai');
		$('#u_location').html("I am in "+loc);
		
	}
}
 
function showPosition(position) {

            
            var condition = navigator.onLine; 

            //console.log(condition);

            if (!condition) {
            
                //window.alert = function (message) {
                    // navigator.notification.alert(message, null, "Internet Connection needed", "OK");
                     alert("You are offline");
             //}
         }
         else{

            var GEOCODING = 'https://maps.googleapis.com/maps/api/geocode/json?latlng=' + position.coords.latitude + '%2C' + position.coords.longitude + '&language=en';

            $.getJSON(GEOCODING).done(function(location) {
                //$('#country').html(location.results[0].address_components[5].long_name);
                //$('#state').html(location.results[0].address_components[4].long_name);
                $('#u_location').html("I am in "+location.results[0].address_components[2].long_name);
                //$('#address').html(location.results[0].formatted_address);
                //$('#latitude').html(position.coords.latitude);
                //$('#longitude').html(position.coords.longitude);
                
                var field = location.results[0].address_components[2].long_name;
                //var field = document.getElementById('u_location');
                //console.log(field);
                var lat=position.coords.latitude;
				var long=position.coords.longitude;
                sessionStorage.setItem('loc',field);
				localStorage.setItem('latitude',lat);
				localStorage.setItem('longitude',long);
                console.log(localStorage.latitude);
				console.log(localStorage.longitude);

            })

        }
    }

        function error(err) {
            console.log(err)
        }