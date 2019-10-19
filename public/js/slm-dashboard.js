$(document).ready(function(){


	setTimeout(explode, 30000);
	
	function explode(){
	  $('tbody#item-dashboard').load('function/flm_active.php');
	  setTimeout(explode, 30000);
	}

	 //$('#txt').(function () {alert('changed');});
	 	 
});