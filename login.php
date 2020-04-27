<!DOCTYPE html>
<html lang="en">

<head>
  <title>
    Dentricedev - login system in php
  </title>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
  <link href="css/ui.css" rel="stylesheet" />
  <link href="css/boxicons.min.css" rel="stylesheet">
  <style>
  </style>
  <body>
<div class="man">
    <div class="container">
        <h1>Dentricedev</h1>
        <h4>login and registration system in php,mysql and ajax</h4>
        <div class="section text-center">
            <div class="row">
                <div class="col-md-6 ml-auto mr-auto">
                    <div class="card">
                        <div class="card-header card-header-info">
                            <h5 class="card-title">LOGIN</h5>
                        </div>
                        <form action="dev.php" id="loginf" method="post">
                            <div class="ss" id="resp"></div>
                        <div class="form-group">
                                <div class="input-group" style="margin-top:30px;">
                                    <div class="input-group-addon">
                                        <i class="bx bx-user" style="padding:5px;"></i>
                                    </div>
                                    <input type="text"  name="usernamel" placeholder="Username" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="bx bx-key" style="padding:5px;"></i>
                                    </div>
                                    <input type="password"  name="passwordl" placeholder="Password" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-actions form-group">
                            <button type="submit" class=" col-md-8 col-sm-6 btn btn-success btn-block" name="login" style="margin:auto;">Login</button>
                            </div>
                            <div class="row ml-auto mr-auto" >
                            Dont have an account ? 
                            <div class="form-actions form-group">
                                <a href="signup.php" class=" col-md-12 col-sm-6 btn btn-success btn-block" style="margin:auto;">SIGN UP
                                </a>
                            </div>
                            </div>
                        </form>
                     </div>
                </div>
            </div>

        </div> <!-- section text-center end -->
    </div> <!-- container end -->
</div> <!-- main-raised end -->

<script src="js/jquery.min.js" type="text/javascript"></script>
<script src="css/bootstrap.min.js" type="text/javascript"></script>
<script>
$(document).ready(function (e) {
// login data form
    $("#loginf").on('submit',(function(e) {
    e.preventDefault();
    $.ajax({
    url: "dev.php",
    type: "POST",
    data:  new FormData(this),
    contentType: false,
    cache: false,
    processData:false,
    success: function(data){
        if(data=='success'){
          $("#resp").html('<div class="alert alert-success col-md-8" id="msg1">successfully logged in</div>').fadeIn();
          $("#loginf")[0].reset(); 
          //uncomment the following line if you want to redirect to the main page after successful login.
          //window.location= 'index.php';
          setTimeout(function(){
              $("#resp").hide();
          },3000);

        }else{
        $("#resp").html('<div class="alert alert-danger col-md-8" id="msg1">Ooops! wrong username / password comination </div>').fadeIn();
        setTimeout(function(){
          $("#resp").hide();
           
        },7000);
        }
        },
        error: function(e) 
        {
        $("#resp").html(e).fadeIn();
        }         
        });

    }));
});
</script>
</body>
</html>