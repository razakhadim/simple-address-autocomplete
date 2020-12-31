let autocomplete;

function initAutocomplete() {
	
	//get the inputs and split them
	let inputSplit = saa_settings_vars.form_field_ids.trim().split(/\s*\n\s*/);
	let inputValues = new Array();

	let country_select = saa_settings_vars.country_selected;

	options = (country_select == 'WW') ? { types: ['geocode', 'establishment'] } : { types: ['geocode', 'establishment'], componentRestrictions: { country: country_select } };
	
	for (let i =0; i<inputSplit.length;i++){
		inputValues[i] = inputSplit[i];
		autocomplete = new google.maps.places.Autocomplete(document.getElementById(inputValues[i]), options);
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


if (saa_settings_vars.enable_geolocation == 'enable' && saa_settings_vars.country_selected == 'WW') {
	window.onload = geolocate;
}
