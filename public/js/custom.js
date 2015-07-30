/*
 *	PREPARE JS
 */
$('[data-toggle="tooltip"]').tooltip({'placement': 'right'});
$('.dropdown-toggle').dropdown();
$.ajaxSetup({headers:{'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')}});

$(document).ready(function () {


/*
 *	SHOW EDIT MODAL
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