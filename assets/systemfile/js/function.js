$('.inp-digit').bind('keypress',function(e) {
    if ($.isNumeric($(this).attr('max'))) {
        if (e.which == 8 || e.which == 0) {

        } else if (e.which < 48 || e.which > 57 || $(this).val().length === parseInt($(this).attr('max'))) {
            return false;
        } else if ($(this).val().length === 0 && e.which === 32) {
            return false;
        }
    } else {

        if (e.which == 8 || e.which == 0) {

        } else if (e.which < 48 || e.which > 57) {
            return false;
        } else if ($(this).val().length === 0 && e.which === 32) {
            return false;
        } else if(e.key.match('^[0-9]*$') == null){
    		return false;
    	} 
    }
});
