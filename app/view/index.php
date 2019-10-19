<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Ticketing System">
    <meta name="author" content="asraquem">
    <meta name="keyword" content="Dashboard,Tracker,Management">
    <title></title>

  <style>
    html, body {
      margin: 0;
      padding: 0;
      height: 100%;
      width: 100%;
      overflow:hidden;
      font-family: calibri;
    }

    body {
      background-image: url('public/image/background3.jpg');
      background-repeat: no-repeat;
      background-size: cover;
      background-position: center;

    }

    header {
      width: 100%;
      height: 80px;
      background: #00A65A;
      background: rgba(0,100,0,0.9) !important;
      box-shadow: 1px 1px 1.5px black;
      padding: 25px 0px 0px 10px;
      box-sizing: border-box;
      text-align: center;
    }


    div#login{
      position: absolute;
      height: 380px;
      width: 350px;
      background: #ccc;
      background: rgba(128,128,128,0.7);
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%,-50%);
      box-shadow: 2px 2px 1.5px black;
      padding: 20px;
      box-sizing: border-box;
      padding-top: 80px;
      border-radius: 10px;
    }

    div#imagelogin {
      position: absolute;
      height: 80px;
      width: 80px;
      background: black;
      top: 0%;
      left: 50%;
      transform: translate(-50%,-50%);
      border-radius: 48%;
    }

    div#imagelogin img{
      height: 100%;
      width: 100%;
      border-radius: 50%;
    }

    input,button {
      width: 95%;
      padding: 10pt 5pt;
      outline: none;
      border-radius: 5px;
      color: dimgray;
      font-size: 12pt;
      margin-bottom: 10px;
    }


    button {
      margin-top: 20px;
      width: 101%;
      background: #34495E;
      border:none;
      color: white;
      cursor: pointer;
    }


    span {
      color: maroon;
      font-size: 10pt;
    }

    div#errormessage {
      text-align: center;
      margin-bottom: 20px;
      display: none;
    }

    div#errormessage span {
      padding: 10pt;
      background: mistyrose;
      border-radius: 10px;
      font-weight: bold;
      font-size: 9pt;
      position: relative;
    }

    header span {
      color: white; 
      font-weight: bold;
      font-size: 20pt;
      padding: 10px;
      background: transparent;
      border-radius: 20px;
    }

    i {
      font-style: normal;
    }

  
  </style>
</head>
<body>

  <header>
    <span><i style="color: whtie">Loan  Monitoring System</i></span>
  </header>

  <div id="login">
    <div id="imagelogin">
      <img src="public/image/user.png">
    </div>
    <div id="errormessage">
      <span id="page-alert-message"></span>
    </div>
      <form class="form-login form-signin" method="post" role="form">

      <input type="text" name="username" placeholder="Username">

      <input type="password" name="password" placeholder="Password">

      <button style="background: #00A65A;color: white;" class="form-btn btn btn-lg btn-block" type="button">Sign in</button>
      <div style="text-align: center;">
      <span style="font-weight: normal;color: white;">Don't have account? Please contact your administrator</span>
      </form>   
    </div>
  </div>

 <script src="public/assets/js/jquery.js"></script>
    <script src="public/assets/js/bootstrap.min.js"></script>
<script>
$(document).ready(function() {

    //ALERT
    $("#page-alert").hide();

    //show alert
    function showAlert(){
        $("#page-alert").fadeIn("slow");
    }

    $('.form-btn').click(function(){

        var errorMessage = "";
        var errFlag = "";

        if($('input[name=username]').val() == "" || $('input[name=password]').val() == ""){
            
            if($('input[name=username]').val() == ""){
                errFlag = 1;
            }

            if($('input[name=password]').val() == ""){
                errFlag += 2;
            }

            switch(errFlag) {
                case 1:
                    errorMessage = "Username is required.";
                    break;
                case 2:
                    errorMessage = "Password is required.";
                    break;
                default:
                    errorMessage = "Username and password is required.";
            } 

                  $('#errormessage').css('display','block');
            $('#page-alert-message').html(errorMessage);
            showAlert();
        }else{
            
            //ajax to send datas
            $.ajax({
              type: 'POST',
              url: 'checkuser',
              data: $('.form-signin').serialize(),
              success: function(msg){
                if(msg > 0){
                	// alert('exist');
                    window.location.href = "cpanel"; 
                }else{
                          $('#errormessage').css('display','block');
                    $('#page-alert-message').html("Wrong username and password combination!");
                    showAlert();
                }   
            },
            error: function(){
              alert('wrong');
            }
          });//end ajax


        }
            
    
    });

});
</script>
</body>
</html>			