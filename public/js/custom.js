/*
 *	PREPARE JS
 */
$('[data-toggle="tooltip"]').tooltip({'placement': 'right'});
$('.dropdown-toggle').dropdown();
$.ajaxSetup({headers:{'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')}});

/*
 * DATE PICKER
 * Custom date picker using Indonesian names and format
 */
$(function() {
  $( ".date-picker" ).datepicker({
    changeMonth: true,
    changeYear: true,
    yearRange: "-90:+0",
    closeText: 'Tutup',
		prevText: '&#x3c;mundur',
		nextText: 'maju&#x3e;',
		currentText: 'hari ini',
		monthNames: ['Januari','Februari','Maret','April','Mei','Juni',
		'Juli','Agustus','September','Oktober','Nopember','Desember'],
		monthNamesShort: ['Jan','Feb','Mar','Apr','Mei','Jun',
		'Jul','Agus','Sep','Okt','Nop','Des'],
		dayNames: ['Minggu','Senin','Selasa','Rabu','Kamis','Jumat','Sabtu'],
		dayNamesShort: ['Min','Sen','Sel','Rab','kam','Jum','Sab'],
		dayNamesMin: ['Mg','Sn','Sl','Rb','Km','jm','Sb'],
		weekHeader: 'Mg',
		dateFormat: 'yy-mm-dd',
		firstDay: 0,
		isRTL: false,
		showMonthAfterYear: false,
		yearSuffix: ''
  });
});

$.fn.modal.Constructor.prototype.enforceFocus = function() {};

$(document).ready(function () {


/*
 *	SHOW EDIT MODAL
 * 	If JS var set: Show the relevant "edit x" modal
 */
if(typeof edit_perkembangan !== 'undefined' && edit_perkembangan) {
	$("#perkembangan-edit").modal({show:true});
}
if(typeof edit_pemicu !== 'undefined' && edit_pemicu) {
	$("#pemicu-edit").modal({show:true});
}
if(typeof edit_upaya !== 'undefined' && edit_upaya) {
	$("#upaya-edit").modal({show:true});
}
if(typeof edit_layanan_dibutuhkan !== 'undefined' && edit_layanan_dibutuhkan) {
	$("#layanan-dbth-edit").modal({show:true});
}
if(typeof edit_dampak !== 'undefined' && edit_dampak) {
	$("#dampak-edit").modal({show:true});
}
if(typeof edit_arsip !== 'undefined' && edit_arsip) {
	$("#arsip-edit").modal({show:true});
}
if(typeof edit_litigasi !== 'undefined' && edit_litigasi) {
	$("#litigasi-edit").modal({show:true});
}
if(typeof edit_kegiatan !== 'undefined' && edit_kegiatan) {
	$("#kegiatan-litigasi-edit").modal({show:true});
}
if(typeof edit_kons_psikologi !== 'undefined' && edit_kons_psikologi) {
	$("#kons_psikologi-edit").modal({show:true});
}
if(typeof edit_kons_hukum !== 'undefined' && edit_kons_hukum) {
	$("#kons_hukum-edit").modal({show:true});
}
if(typeof edit_homevisit !== 'undefined' && edit_homevisit) {
	$("#homevisit-edit").modal({show:true});
}
if(typeof edit_supportGroup !== 'undefined' && edit_supportGroup) {
	$("#supportGroup-edit").modal({show:true});
}
if(typeof edit_mens_program !== 'undefined' && edit_mens_program) {
	$("#mens_program-edit").modal({show:true});
}
if(typeof edit_rujukan !== 'undefined' && edit_rujukan) {
	$("#rujukan-edit").modal({show:true});
}
if(typeof edit_medis !== 'undefined' && edit_medis) {
	$("#medis-edit").modal({show:true});
}
if(typeof edit_mediasi !== 'undefined' && edit_mediasi) {
	$("#mediasi-edit").modal({show:true});
}
if(typeof edit_shelter !== 'undefined' && edit_shelter) {
	$("#shelter-edit").modal({show:true});
}

/*
 *	SHOW NEW MODAL
 *  If JS var set: Show the relevant "new x" modal
 */
if(typeof kons_psikologi_baru !== 'undefined' && kons_psikologi_baru) {
	$("#kons_psikologi-baru").modal({show:true});
}
if(typeof kons_hukum_baru !== 'undefined' && kons_hukum_baru) {
	$("#kons_hukum-baru").modal({show:true});
}
if(typeof homevisit_baru !== 'undefined' && homevisit_baru) {
	$("#homevisit-baru").modal({show:true});
}
if(typeof supportGroup_baru !== 'undefined' && supportGroup_baru) {
	$("#supportGroup-baru").modal({show:true});
}
if(typeof mens_program_baru !== 'undefined' && mens_program_baru) {
	$("#mens_program-baru").modal({show:true});
}
if(typeof rujukan_baru !== 'undefined' && rujukan_baru) {
	$("#rujukan-baru").modal({show:true});
}
if(typeof medis_baru !== 'undefined' && medis_baru) {
	$("#medis-baru").modal({show:true});
}
if(typeof mediasi_baru !== 'undefined' && mediasi_baru) {
	$("#mediasi-baru").modal({show:true});
}
if(typeof shelter_baru !== 'undefined' && shelter_baru) {
	$("#shelter-baru").modal({show:true});
}



/*
 *  BACK TO TOP BUTTON
 */
var btt = $('.back-to-top');

btt.on('click', function(e) {
		$('html,body').animate({
				scrollTop:0
		}, 500);

		//e.preventDefault();
});

$(window).on('scroll', function() {

		var self = $(this),
				top = self.scrollTop();

		if(top > 50) {
			if(!btt.is(':visible')) {
				btt.fadeIn("slow");
			}
		} else {
			btt.fadeOut("slow");
		}

});

/*
 *	LOADING
 */
$('#search-button').click(function() { 
		$.blockUI({ css: { 
				border: 'none', 
				padding: '15px', 
				backgroundColor: '#000', 
				'-webkit-border-radius': '10px', 
				'-moz-border-radius': '10px', 
				opacity: .5, 
				color: '#fff' 
		} }); 
}); 


/*
 * STEPWIZARD
 */
var navListItems = $('div.setup-panel div a'),
				allWells = $('.setup-content'),
				allNextBtn = $('.nextBtn');

allWells.hide();

navListItems.click(function (e) {
		e.preventDefault();
		var $target = $($(this).attr('href')),
						$item = $(this);

		if (!$item.hasClass('disabled')) {
				navListItems.removeClass('btn-primary').addClass('btn-default');
				$item.addClass('btn-primary');
				allWells.hide();
				$target.show();
				$target.find('input:eq(0)').focus();
		}
});

allNextBtn.click(function(){
		var curStep = $(this).closest(".setup-content"),
				curStepBtn = curStep.attr("id"),
				nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
				curInputs = curStep.find("input[type='text'],input[type='url']"),
				isValid = true;

		$(".form-group").removeClass("has-error");
		for(var i=0; i<curInputs.length; i++){
				if (!curInputs[i].validity.valid){
						isValid = false;
						$(curInputs[i]).closest(".form-group").addClass("has-error");
				}
		}

		if (isValid)
				nextStepWizard.removeAttr('disabled').trigger('click');
});

$('div.setup-panel div a.btn-primary').trigger('click');

});