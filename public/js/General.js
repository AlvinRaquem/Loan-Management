$(document).ready(function(){
	/* ----------------------------------------------------------------------------------------------------------------------------------  */
	
	$(".chosen,.chosen_body").chosen({width: "100%"});
	
	/* ----------------------------------------------------------------------------------------------------------------------------------  */
	
	var config = {
		'.chosen-select'           : {},
		'.chosen-select-deselect'  : {allow_single_deselect:true},
		'.chosen-select-no-single' : {disable_search_threshold:10},
		'.chosen-select-no-results': {no_results_text:'Oops, nothing found!'},
		'.chosen-select-width'     : {width:"95%"}
	}
	
	for (var selector in config) {
		$(selector).chosen(config[selector]);
	}	
	
	/* ----------------------------------------------------------------------------------------------------------------------------------  */
	
	$('#btnLocate').on("click",function(e){
		if($('#T_ID').val().trim() === ""){
			e.preventDefault();
			$('#error-handler').html("<div class=\"alert alert-dismissible alert-danger\" style = \"text-align:center;\">"+
										"Please select a Terminal ID."+
										 "</div>"						 
			);
		}		
	})
	
	/* ----------------------------------------------------------------------------------------------------------------------------------  */
})