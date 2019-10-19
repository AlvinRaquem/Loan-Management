$(document).ready(function() {



//DATETIME PICKER
$('#user-add-dp')
.datetimepicker({
    pickTime: false
})
.on('dp.change dp.show', function(e) {
    $('#user-add-form')
        .data('bootstrapValidator')
        .updateStatus('birthday', 'NOT_VALIDATED', null)
        .validateField('birthday');
});

//ALERT
$("#page-alert-form").hide();


//show alert
function showAlert(){
    $("#page-alert").fadeIn("slow");
}

//hide alert
function hideAlert(){
    window.setTimeout(function () {
        $("#page-alert").fadeOut("slow");
    }, 5000);
}




/******** VALIDATION AREA ********/


//ADD VALIDATION

    //VALIDATION
    $('#user-add-form').bootstrapValidator({
        feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
        },    
        fields: {
            username: {
                validators: {
                    notEmpty: {
                        message: 'for username'
                    }
                }
            },
            password: {
                validators: {
                    notEmpty: {
                        message: 'for password'
                    }
                }
            },
            confirmpassword: {
                validators: {
                    identical: {
                        field: 'password',
                        message: 'The password and its confirm are not the same'
                    }
                }
            },
            firstname: {
                validators: {
                    notEmpty: {
                        message: 'firstname'
                    }
                }
            },
            lastname: {
                validators: {
                    notEmpty: {
                        message: 'The last name is required and cannot be empty'
                    }
                }
            },
            contact: {
                validators: {
                    digits: {
                        message: 'contact'
                    },
                    notEmpty: {
                        message: 'The email address is required'
                    }
                }
            },
            email: {
                validators: {
                    notEmpty: {
                        message: 'The email address is required'
                    },
                    emailAddress: {
                        message: 'The input is not a valid email address'
                    }
                }
            },
            gender: {
                validators: {
                    notEmpty: {
                        message: 'The gender is required'
                    }
                }
            },
            birthday: {
                validators: {
                    notEmpty: {
                        message: 'The date of birth is required and cannot be empty'
                    },
                    date: {
                        format: 'MM/DD/YYYY',
                        message: 'The value is not a valid date'
                    }
                }
            },
            address: {
                validators: {
                    notEmpty: {
                        message: 'The gender is required'
                    }
                }
            }
        },
        submitHandler: function(validator, form, submitButton) {

            $(window).scrollTop(0);//jump to top and start prog

                //ajax to send datas
                $.ajax({
                  type: 'POST',
                  url: 'proc/process-member-registration.php',
                  data: $('#user-add-form').serialize(),
                  success: function(msg){
                    if(msg){

                            var alertHtml = '<div id="page-alert" class="alert alert-success" data-alert="alert">';
                                alertHtml += '<span id="page-alert-message">You have successfully created an account!</span>';
                                alertHtml += '</div>';

                            $('.modal-body').html(alertHtml).fadeIn(3000);
                            $('.modal-footer').html('');

                            window.setTimeout(function () {
                                $('#user-add-modal').modal('hide');
                            }, 3000);

                    }else{
                        //Error part here
                    }   
                },
                error: function(){
                  alert('Opppss something went wrong to ajax');
                }
              });//end ajax


            //Reset form
            validator.resetForm();
        }
    });



});