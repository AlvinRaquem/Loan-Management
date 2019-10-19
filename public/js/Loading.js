$(document).ready(function(){

	function ajaxindicatorstart(){

		if(jQuery('body').find('#resultLoading').attr('id') != 'resultLoading'){
		jQuery('body').append('<div id = "resultLoading" class="loader"><div class = "loader-container"><svg class="circular" viewBox="25 25 50 50"><circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10"/></svg></div><div class="bg"></div></div>');
		}

	    jQuery('#resultLoading .bg').height('100%');
        jQuery('#resultLoading').fadeIn(300);
	    jQuery('body').css('cursor', 'wait');
	}
	
	function ajaxindicatorstop(){
	    jQuery('#resultLoading .bg').height('100%');
        jQuery('#resultLoading').fadeOut(300);
	    jQuery('body').css('cursor', 'default');
	}
	jQuery(document).ajaxStart(function () {
		ajaxindicatorstart();
	});	
})