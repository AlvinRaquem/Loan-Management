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

$('#user-edit-dp')
.datetimepicker({
    pickTime: false
})
.on('dp.change dp.show', function(e) {
    $('#user-edit-form')
        .data('bootstrapValidator')
        .updateStatus('birthday', 'NOT_VALIDATED', null)
        .validateField('birthday');
});

//LINK IF ACTIVE
$(function(){

    var link = location.pathname.split("/")[4];
   $('ul.nav a[href="' + link + '"]').parent('li').addClass('active');
       
    
    //or

    $('ul#sub-menu a[href="' + link + '"]').addClass('active');
    
    if($('ul#sub-menu a[href="' + link + '"]').hasClass('active')){
        $('#sub-menu').collapse('show');
        $('#has-submenu').addClass('add-border');
    }

});


//Sidenav off canvas
$('[data-toggle=offcanvas]').click(function() {
	$('.row-offcanvas').toggleClass('active');
	});


//ALERT
$("#page-alert").hide();


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



//STYLE
$(window).bind("load", function () {
    var main = $(".main");
    var height = $(window).height() - 50;

    if (height > 0) {
        main.css({
            'min-height': height + 'px'
        });
    }

});


/**********************************************


Record Manipulation


**********************************************/


var selectedItem = "";//USED TO GET ID.attr('id')
$('#id-holder').hide();//USED TO HIDE ID HOLDER




/******** CLICKING ITEM ********/

$('#data-table').delegate('tr.record', 'click', function(){
    if($(this).hasClass('active')){

        selectedItem = "";//Remove selected
        $(this).removeClass('active');

    }else{

        $('tr').removeClass('active');//Remove last active tr


        selectedItem = $(this).find('td.id').html();//Get selected
        $(this).addClass('active');
    }
});

/******** ADDING ITEM ********/

$('#btnAdd').on('click', function(){
    $('#user-add-modal').modal('show');
});

/******** END ADDING ITEM ********/




/******** START OF EDIT ********/


//Check if user already clicked

$('#btnEdit').on('click', function(){

    //Check if user selected some datas
    if(selectedItem != ""){

        getTableDatas(selectedItem);//Function to fill the input fields
        $('#user-edit-modal').modal('show');//SHOW MODAL

    }else{
        //do nothing first
    }

});

//Function to fill the input fields

function getTableDatas(findThis){


    //Function to get the data from the table
    var tableDatas = [];
    var ctr = 0;
    
    $('tr#data_' + findThis + ' td').each(function() {
        tableDatas[ctr++] = $(this).html();
    });

    //add input fields
    $('#edit-label').html(tableDatas[2] + ' ' + tableDatas[3]);
    $('#user-edit-form input[name=firstname]').val(tableDatas[2]);
    $('#user-edit-form input[name=lastname]').val(tableDatas[3]);
    $('#user-edit-form input:radio[name=gender][value=' + tableDatas[4] + ']').attr('checked', true); 
    $('#user-edit-form input[name=birthday]').val(tableDatas[5]);
    $('#user-edit-form input[name=address]').val(tableDatas[6]);
    $('#user-edit-form input[name=email]').val(tableDatas[7]);
    $('#user-edit-form input[name=contact]').val(tableDatas[8]);
    
    $('#user-edit-form input[name=id]').val(tableDatas[0]);//USERID

    //$('input[name=]').val();
}


//Highlight and remove active//MNOTE DO NOT USE!

function highLightEdit(manipulatedItem){

    $('#data_' + manipulatedItem).removeClass('active');
    $('#data_' + manipulatedItem).animate({ backgroundColor: "#00acec" }, "slow").animate({backgroundColor: '#ffffff'}, 5000);
    selectedItem = "";

}

//End Function

/******** END OF EDIT ********/



/******** START OF DELETE ********/


//Check if user already clicked

$('#btnDelete').on('click', function(){

    //Check if user selected some datas
    if(selectedItem != ""){
        //SHOW MODAL
        $('#confirm-delete').modal('show');
    }else{
        //do nothing first
    }

});


//DELETE USER
$('#confirmDelete').on('click', function(){

    $(window).scrollTop(0);//start progress and start del
    progressJs('.del-body').start();
    progressJs('.del-body').autoIncrease();//inc prog

    //ajax to del datas
    $.ajax({
      type: 'POST',
      url: 'proc/process-member-delete.php',
      data: 'userid=' + selectedItem,
      success: function(msg){
        if(msg){
            
            progressJs('.del-body').end();//end prog
            
            setTimeout(function() {
                $('#confirm-delete').modal('hide'); //hide the modal
                $('#page-alert-message').html(msg);//add message to alert
                showAlert();//show alert
            }, 1000);//delay the message

            
        }else{

            //Error part here
            progressJs('.del-body').end();//end prog
          
        }   
    },
    error: function(){
      alert('wrong');
    }
  });//end ajax

    
    hideAlert();//hide alert
    $('#data_' + selectedItem).fadeOut('slow');//fade the deleted data
    selectedItem = "";//remove selected item

});

/******** END OF DELETE ********/

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


            //Get information
            var username    = $('input[name=username]').val();
            var firstname   = $('input[name=firstname]').val();
            var lastname    = $('input[name=lastname]').val();
            var address     = $('input[name=address]').val();
            var email       = $('input[name=email]').val();
            var contact     = $('input[name=contact]').val();
            var gender      = $('input:radio[name=gender]:checked').val();
            var birthday    = $('input[name=birthday]').val();


            $('#user-add-modal').modal('hide');//hide modal
            $(window).scrollTop(0);//jump to top and start prog
            progressJs('.main').start();
            progressJs('.main').autoIncrease();//increase prog

                //ajax to send datas
                $.ajax({
                  type: 'POST',
                  url: 'proc/process-member-registration.php',
                  data: $('#user-add-form').serialize(),
                  success: function(msg){
                    if(msg){

                        var returnedData = msg.split("*");//Saplit the returned data

                        $('<tr id="data_' + returnedData[1] + '" class="record"><td class="id">' + returnedData[1] + '</td><td>' + username + '</td><td class="firstname">' + firstname + '</td><td class="lastname">' + lastname + '</td><td class="gender">' + gender + '</td><td class="birthday">' + birthday + '</td><td class="address">' + address + '</td><td class="email">' + email + '</td><td class="contact">' + contact + '</td></tr>').appendTo("#data-table");

                        progressJs('.main').end();//end prog
                        $('#page-alert-message').html(returnedData[0]);//add message to alert
                        showAlert();//show alert

                    }else{
                        //Error part here
                        progressJs('.main').end();//end prog
                    }   
                },
                error: function(){
                  alert('Opppss something went wrong to ajax');
                }
              });//end ajax


            //Reset form
            validator.resetForm();
            $('#user-information').each(function(){
                this.reset();
            });
            hideAlert();//hide alert
        }
    });

//EDIT VALIDATION

    //VALIDATION
    $('#user-edit-form').bootstrapValidator({
        feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
        },    
        fields: {
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

            //Get information
            var firstname   = $('#user-edit-form input[name=firstname]').val();
            var lastname    = $('#user-edit-form input[name=lastname]').val();
            var address     = $('#user-edit-form input[name=address]').val();
            var email       = $('#user-edit-form input[name=email]').val();
            var contact     = $('#user-edit-form input[name=contact]').val();
            var gender      = $('#user-edit-form input:radio[name=gender]:checked').val();
            var birthday    = $('#user-edit-form input[name=birthday]').val();


            $('#user-edit-modal').modal('hide');//hide modal
            $(window).scrollTop(0);//jump to top and start prog
            progressJs('.main').start();//Start progress
            progressJs('.main').autoIncrease(30);//increase prog


            //ajax to send datas

            $.ajax({
              type: 'POST',
              url: 'proc/process-member-update.php',
              data: $('#user-edit-form').serialize(),
              success: function(msg){
                        if(msg){

                            //Replace data
                            $('#data_' + selectedItem + ' td.firstname').html(firstname);
                            $('#data_' + selectedItem + ' td.lastname').html(lastname);
                            $('#data_' + selectedItem + ' td.contact').html(contact);
                            $('#data_' + selectedItem + ' td.email').html(email);
                            $('#data_' + selectedItem + ' td.gender').html(gender);
                            $('#data_' + selectedItem + ' td.birthday').html(birthday);
                            $('#data_' + selectedItem + ' td.address').html(address);

                            //$('#data_' + selectedItem + ' td.').html();

                            progressJs('.main').end();//end prog
                            $('#page-alert-message').html(msg);//add message to alert
                            showAlert();//show alert

                        }else{
                            progressJs('.main').end();//end prog
                        }   
                    },
                    error: function(){
                      alert('Opppss something went wrong to ajax');
                    }
            });//end ajax


            //Reset form
            validator.resetForm();
            $('#user-edit-form').each(function(){
                this.reset();
            });
            hideAlert();//hide alert
            getTableDatas(selectedItem);//get again the new datas


        }//END OF SUBMIT
    });//END OF VALIDATION


});