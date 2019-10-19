$(document).ready(function(){
	
	$('#err_taken').hide();
	
	$('#btnupdateID').click(function() {
		oldtid = $('#txtID2').val();
		newtid = $('#txtnewID').val();
		
		
		$.ajax({
				type: "POST",
				url: "function/update-tid.php",
				data: "oldtid="+oldtid+"&newtid="+newtid,
				success: function(html){  
				if(html=='true'){
					$('#err_taken').show();
				} else {
					$('#err_taken').hide();
					
					$.ajax({
						type: "POST",
						url: "function/update-tid-cluster.php",
						data: "oldtid="+oldtid+"&newtid="+newtid,
						success: function(html){ 
						
						},
					});
					
					
					
					window.location.href = 'main_atm_new.php?AtmID='+newtid;
					
				}
				
				
			},
	                                 			
		});
		
		
		
	});


	$('#txtnewID').keydown(function() {
		$('#err_taken').hide();
		
	});

		
});