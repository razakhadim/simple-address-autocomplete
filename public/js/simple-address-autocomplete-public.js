let autocomplete;

function initAutocomplete() {

	let input = document.getElementsByClassName('autocomplete');
	let country_select = saa_settings_vars.country_selected;

	options = (country_select == 'WW') ? { types: ['geocode', 'establishment'] } : { types: ['geocode', 'establishment'], componentRestrictions: { country: country_select } };

	for (let i = 0; i < input.length; i++) {
		autocomplete = new google.maps.places.Autocomplete(input[i], options);
	}
}

// 	Bias the autocomplete object to the user's geographical location,
// 	as supplied by the browser's 'navigator.geolocation' object.
function geolocate() {
	if (navigator.geolocation) {
		navigator.geolocation.getCurrentPosition((position) => {
			const geolocation = {
				lat: position.coords.latitude,
				lng: position.coords.longitude,
			};
			const circle = new google.maps.Circle({
				center: geolocation,
				radius: position.coords.accuracy,
			});
			autocomplete.setBounds(circle.getBounds());
		});
	}
}


if (saa_settings_vars.enable_geolocation == 'enable' && saa_settings_vars.geo_type == 'onFocus') {
	window.onload = set_onfocus_attributes;
}

function set_onfocus_attributes() {
	let inputs = document.getElementsByClassName('autocomplete');
	for (let i = 0; i < inputs.length; i++) {
		inputs[i].setAttribute("onfocus", "geolocate()");
	}
}

if (saa_settings_vars.enable_geolocation == 'enable' && saa_settings_vars.geo_type == 'onPageLoad') {
	window.onload = geolocate;
}
