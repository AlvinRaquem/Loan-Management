$(document).ready(function(){	
   
	//$('input#btnDone').hide(); 
 	//$('input#btn').hide();
 
  //Seal0
  /*
  $('input#txtTest').keypress(function( event ){
	 if (event.which==13) {
		alert("test");
	 }
   	
  });
  */
 
 $("input[type='checkbox']").change(function (event) {
	if ($(this).is(":checked")) {
		textVal = $(this).val();
		textval = "[name=" + textVal + "]";
		CheckClass(textval,'info');
	} else {textVal = $(this).val();
		
		textval = "[name=" + textVal + "]";
		UncheckClass(textval);
		 }
	 
 });
  
  
  
  			function CheckClass(name,validationClass){
			
			//function validationClass(name,validationClass,validationError){
               // $(name).parents('tr[class^="active"]').addClass(validationClass);
				$(name).addClass(validationClass);
				

				/*
				if(validationError != ''){
					$(name).after('<p class="help-block">'+ validationError +'</p>');
				}
				*/
			}

            function UncheckClass(name){
                //$('p.help-block').remove();
                //$('div.form-group').removeClass('has-error has-success');
				//$(name).parents('tr[class^="form-group"]').removeClass('has-error has-success');
				$(name).removeClass('info');
            }
			
			
			
		
  
});