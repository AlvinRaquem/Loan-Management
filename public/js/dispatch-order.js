$(document).ready(function(){
	/*
	$('#div-date').hide();
	$('#div_sites').hide();
	$('tbody#item-sites').html("<tr></tr>");
	
	
	$('button#btnSites').click(function() {
		itemval = $(this).val();

		$('#div_bank').hide();
		$('#div_date').show();
		$('label#lblBank').text(itemval);
		$('input#txtBank').val(itemval);
		$('#div_sites').hide();
		//$('tbody#item-sites').load('proc/search-site-exec.php?search-bank='+itemval);
			
	});
	*/
	
	$('input#dateLoad').change(function(){
		itemval = $(this).val();
		
		if (itemval!="") {
		$('label#lblDate').text(itemval);
		$('input#dateLoad').hide();
		$('tbody#modal-table').load('proc/dispatch-load.php?search-date='+itemval);
		}
	});
	
	/*
	$("#dateLoad").on("dp.change", function(e) {
    	alert('hey');
	});
	*/
	
	
	$('button#btnSam').click(function() {
		itemval = $(this).val(); 
		
		$('label#txtDisplay').text(itemval);
		$('#user-add-modal').modal('hide');
		
	});
	
	
	

	
	
	
	

	 
});