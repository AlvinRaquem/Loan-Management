$(document).ready(function() {
 var UnitsValidators = {
            row: '.col-lg-5',   // The title is placed inside a <div class="col-lg-5"> element
            validators: {
                notEmpty: {
                    message: 'Please enter a value'
                }
            }
        },
		
         NumbersValidators = {
            row: '.col-lg-2',   // The title is placed inside a <div class="col-lg-5"> element
            validators: {
                notEmpty: {
                    message: 'Enter a value'
                },
				integer: {
					message: 'Only numbers are allowed in this field.'	
				}
            }
        },		
	 proofIndex = 0;
	 proofIndex1 = 0;
    $('#formNew')
        .formValidation({
            framework: 'bootstrap',
            icon: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
				'txtDate': {
					row: '.col-sm-6',
					validators: {
						notEmpty: {
							message: 'Please select a date'	
						}	
					}
				},
				'txtCode': {
					row: '.col-sm-6',
					validators: {
						notEmpty: {
							message: 'Please enter a Code'	
						}	
					}
				},
				'txtBranch': {
					row: '.col-sm-6',
					validators: {
						notEmpty: {
							message: 'Please enter a Branch'	
						}	
					}
				},
				// 'txtBatch': {
				// 	row: '.col-sm-6',
				// 	validators: {
				// 		notEmpty: {
				// 			message: 'Please select a batch'	
				// 		}	
				// 	}
				// },					
            }
        
		})
        // Add button click handler
        .on('click', '.addButton', function() {
            proofIndex++;
            var $template = $('#proofTemplate'),
                $clone    = $template
                                .clone()
                                .removeClass('hide')
                                .removeAttr('id')
                                .attr('data-proof-index', proofIndex)
                                .insertBefore($template);

            // Update the attributes
			

			var i = 1;
			$('.txtLabel').each(function(){
				$(this).attr('value',i);
				
				if($(this).attr('value') >= 10){
					$(this).css('padding','6px 7px');
				} else {
					$(this).css('padding','6px 12px');
				}				
				
				i++;
			})

            // Add new fields
            // Note that we also pass the validator rules for new field as the third parameter
			/*
            $('#IncomingForm')
                .formValidation('addField', 'txtItem[]', UnitsValidators)
				.formValidation('addField', 'txtNumber[]', NumbersValidators)
			*/
        })
		
		
		.on('click', '.addDelivery', function() {
            proofIndex1++;
            var $template1 = $('#proofTemplateDel'),
                $clone    = $template1
                                .clone()
                                .removeClass('hide')
                                .removeAttr('id')
                                .attr('data-proof-index1', proofIndex1)
                                .insertBefore($template1);

            // Update the attributes
			

			var i = 1;
			$('.txtLabel1').each(function(){
				$(this).attr('value',i);
				
				if($(this).attr('value') >= 10){
					$(this).css('padding','6px 7px');
				} else {
					$(this).css('padding','6px 12px');
				}				
				
				i++;
			})
        })
		
		
		
		
		
		 // Remove button click handler
        .on('click', '.removeButton', function() {
            var $row  = $(this).closest('.form-group');
                index = $row.attr('data-proof-index');
				
           // Remove fields
		   /*
            $('#formNew')
                .formValidation('removeField', $row.find('[name="txtItem[]"]'))
				.formValidation('removeField', $row.find('[name="txtNumber[]"]'))
			*/
            // Remove element containing the fields
            $row.remove();
			var i = 1;
			$('.txtLabel').each(function(){
				$(this).attr('value',i);

				if($(this).attr('value') >= 10){
					$(this).css('padding','6px 7px');
				} else {
					$(this).css('padding','6px 12px');
				}
								
				i++;
			})			
			 
		})
			 
		 // Remove button click handler
        .on('click', '.removeDelivery', function() {
            var $row  = $(this).closest('.form-group');
                index = $row.attr('data-proof-index1');
				
           // Remove fields
		   /*
            $('#formNew')
                .formValidation('removeField', $row.find('[name="txtItem[]"]'))
				.formValidation('removeField', $row.find('[name="txtNumber[]"]'))
			*/
            // Remove element containing the fields
            $row.remove();
			var i = 1;
			$('.txtLabel1').each(function(){
				$(this).attr('value',i);

				if($(this).attr('value') >= 10){
					$(this).css('padding','6px 7px');
				} else {
					$(this).css('padding','6px 12px');
				}
								
				i++;
			})		
		
		
	});
	
	$('input#1000').keyup(function(event){	
		$('input#txtTotal').val(totalAmount());
	});
	$('input#500').keyup(function(event){	
		$('input#txtTotal').val(totalAmount());
	});
	$('input#200').keyup(function(event){	
		$('input#txtTotal').val(totalAmount());
	});
	$('input#100').keyup(function(event){	
		$('input#txtTotal').val(totalAmount());
	});
	$('input#50').keyup(function(event){	
		$('input#txtTotal').val(totalAmount());
	});
	$('input#20').keyup(function(event){	
		$('input#txtTotal').val(totalAmount());
	});
	$('input#10').keyup(function(event){	
		$('input#txtTotal').val(totalAmount());
	});
	$('input#5').keyup(function(event){	
		$('input#txtTotal').val(totalAmount());
	});
	$('input#1').keyup(function(event){	
		$('input#txtTotal').val(totalAmount());
	});
	$('input#25c').keyup(function(event){	
		$('input#txtTotal').val(totalAmount());
	});
	$('input#10c').keyup(function(event){	
		$('input#txtTotal').val(totalAmount());
	});
	$('input#5c').keyup(function(event){	
		$('input#txtTotal').val(totalAmount());
	});
	$('input#1c').keyup(function(event){	
		$('input#txtTotal').val(totalAmount());
	});
	
	
	function totalAmount(){
		onethou = $('#1000').val(); 
		fivehund = $('#500').val();
		twohund = $('#200').val();
		onehund = $('#100').val();
		fifty = $('#50').val();
		twenty = $('#20').val();
		ten = $('#10').val();
		five = $('#5').val();
		one = $('#1').val();
		twentyCent = $('#25c').val();
		tenCent = $('#10c').val();
		fiveCent = $('#5c').val();
		oneCent = $('#1c').val();
		
		if (onethou=="") { onethou="0" };
		if (fivehund=="") { fivehund="0" };
		if (twohund=="") { twohund="0" };
		if (onehund=="") { onehund="0" };
		if (fifty=="") { fifty="0" };
		if (twenty=="") { twenty="0" };
		if (ten=="") { ten="0" };
		if (five=="") { five="0" };
		if (one=="") { one="0" };
		if (twentyCent=="") { twentyCent="0" };
		if (tenCent=="") { tenCent="0" };
		if (fiveCent=="") { fiveCent="0" };
		if (oneCent=="") { oneCent="0" };
		 
			
		ttl = parseInt(onethou) + parseInt(fivehund) + parseInt(twohund) + parseInt(onehund) + parseInt(fifty) + 
				parseInt(twenty) + parseInt(ten) + parseInt(five) + parseInt(one) + parseFloat(twentyCent) +
				parseFloat(tenCent) + parseFloat(fiveCent) + parseFloat(oneCent);	
		
		ttl = addCommas(ttl);
		
		return ttl;	
		
	}
	
	function addCommas(nStr)
		{
			nStr += '';
			x = nStr.split('.');
			x1 = x[0];
			x2 = x.length > 1 ? ',' + x[1] : '';
			var rgx = /(\d+)(\d{3})/;
			while (rgx.test(x1)) {
				x1 = x1.replace(rgx, '$1' + ',' + '$2');
			}
			return x1 + x2;
		}
	
	
	
})