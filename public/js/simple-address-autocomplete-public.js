let autocomplete;
let inputSplit = saa_settings_vars.form_field_ids.trim().split(/\s*\n\s*/);
let inputValues = new Array();
let country_select = saa_settings_vars.country_selected;

function initAutocomplete() {

	options = (country_select == 'WW') ? { types: ['geocode', 'establishment'] } : { types: ['geocode', 'establishment'], componentRestrictions: { country: country_select } };

	for (let i = 0; i < inputSplit.length; i++) {
		inputValues[i] = inputSplit[i];
		fields = document.getElementById(inputValues[i]);
		autocomplete = new google.maps.places.Autocomplete(fields, options);
	}
}

window.addEventListener('load', function () {

	for (let i = 0; i < inputSplit.length; i++) {
		inputValues[i] = inputSplit[i];
		fields = document.getElementById(inputValues[i]);
		if (typeof fields !== undefined && fields !== null) {
			fields.setAttribute("onfocus", "initAutocomplete()");
		}
	}

});