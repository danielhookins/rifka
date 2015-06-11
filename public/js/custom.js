/*
 *	TOOLTIPS
 */
$('[data-toggle="tooltip"]').tooltip({'placement': 'right'});

/*
 *	DROPDOWN
 */
$('.dropdown-toggle').dropdown();


/*
 *	LOADING
 */
$(document).ready(function() { 
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
}); 
    