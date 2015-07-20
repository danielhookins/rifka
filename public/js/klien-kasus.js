/*
 *  Klien-Kasus JS
 */
function updateJenisKlienSelected(klien_id, kasus_id) {
	
	var selected = document.getElementById("jenis_klien_".concat(klien_id));
	var dataString = 
		"table=klien_kasus"+
		"&kasus_id="+kasus_id+
		"&klien_id="+klien_id+
		"&jenis_klien="+selected.value;

	$.ajax({
		type: "POST",
		url: window.location + '/autoUpdate',
		data: dataString,
		success: function(data) {
			console.log(data);
		}
	});

};