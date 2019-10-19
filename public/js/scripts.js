$(document).ready(function() {

    //GLOBAL DEC
    var tdata;// USED TO UPDATE TABLE
    var selectedUser;//USED FOR ID


    //LINK IF ACTIVE
    $(function() {
        var link = location.pathname.split("/")[2];
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
$(window).bind("load", function (){
    var main = $(".main");
    var height = $(window).height() - 50;

    if (height > 0) {
        main.css({
            'min-height': height + 'px'
        });
    }

});



});