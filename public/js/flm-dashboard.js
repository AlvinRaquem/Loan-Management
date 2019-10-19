$(document).ready(function(){




	$("#btnstart").click(function(){
      $('tbody#item-dashboard').load('function/flm_dash.php');
    });
	
	
	$('input#txt').change(function() {
		 //$('tbody#item-dashboard').load('function/flm_dash.php');
		 alert("change");
	});


	setTimeout(explode, 1000);
	
	function explode(){
	  $('tbody#item-dashboard').load('function/flm_dash.php');
	  setTimeout(explode, 1000);
	}

	 //$('#txt').(function () {alert('changed');});
	 
	
	 
});