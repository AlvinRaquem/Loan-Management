$(document).ready(function(){


	//setTimeout(explode, 1000);
	$('#alertProgress').hide();
	
	 $('button#btnGenerate').click(function(event) {
		 bank = $('#optBank').val();
		 month = $('#dtMonth').val();
		 year = $('#dtYear').val();
		 alert(bank + year + month);
		 $.ajax({
				type: "POST",
				url: "function/process-bill.php",
				data:"xbank="+bank,
				dataType: 'json',
				success: function(data){ 
				alert(data);  
				if (data=='true') {
					$('#alertProgress').show();
					 
					} 
				
				}, 
		 });
	 });
});