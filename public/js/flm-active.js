$(document).ready(function(){


	setTimeout(explode, 1000);
	
	function explode(){
	  $('tbody#item-dashboard').load('function/flm_active.php');
	  setTimeout(explode, 1000);
	}

	 //$('#txt').(function () {alert('changed');});
	 	 
});