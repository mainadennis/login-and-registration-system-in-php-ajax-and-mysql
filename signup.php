<!DOCTYPE html>
<html lang="en">

<head>
  <title>
    Dentricedev - Sign up system in php
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
        <h4>while checking if a username and email is available for use (not used by another person)</h4>
        <div class="section text-center">
            <div class="row">
                <div class="col-md-6 ml-auto mr-auto">
                    <div class="card">
                        <div class="card-header card-header-info">
                            <h5 class="card-title">SIGN UP</h5>
                        </div>
                        <form action="dev.php" id="sform" method="post">
                            <div class="ss" id="resp1"></div>
                            <div class="form-group">
                                <div class="input-group" style="margin-top:30px;">
                                    <div class="input-group-addon">
                                        <i class="bx bx-user" style="padding:5px;"></i>
                                    </div>
                                    <input type="text"  name="fname" placeholder="First Name" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group" style="margin-top:30px;">
                                    <div class="input-group-addon">
                                        <i class="bx bx-user" style="padding:5px;"></i>
                                    </div>
                                    <input type="text"  name="lname" placeholder="Last Name" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group" style="margin-top:30px;">
                                    <div class="input-group-addon">
                                        <i class="bx bx-user" style="padding:5px;"></i>
                                    </div>
                                    <input type="text"  name="username" placeholder="Username" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group" style="margin-top:30px;">
                                    <div class="input-group-addon">
                                        <i class="bx bx-envelope" style="padding:5px;"></i>
                                    </div>
                                    <input type="email"  name="email" placeholder="Email" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group" style="margin-top:30px;">
                                    <div class="input-group-addon">
                                        <i class="bx bx-key" style="padding:5px;"></i>
                                    </div>
                                    <input type="password"  name="password" placeholder="password" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="bx bx-key" style="padding:5px;"></i>
                                    </div>
                                    <input type="password"  name="password1" placeholder=" Confirm Password" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-actions form-group">
                            <button type="submit" class=" col-md-8 col-sm-6 btn btn-success btn-block" name="signup" style="margin:auto;">sign up</button>
                            </div>
                            <div class="row ml-auto mr-auto" >
                            Have an account ? 
                            <div class="form-actions form-group">
                                <a href="login.php" class=" col-md-12 col-sm-6 btn btn-success btn-block" style="margin:auto;">LOGIN
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
    // sign up form data
    $("#sform").on('submit',(function(e) {
    e.preventDefault();
    $.ajax({
    url: "dev.php",
    type: "POST",
    data:  new FormData(this),
    contentType: false,
    cache: false,
    processData:false,
    success: function(data){
      if(data == 'used'){
        $("#resp1").html('<div class="alert alert-danger col-md-8" >Ooops! The username provided is already used.</div>').fadeIn();
        setTimeout(function(){
          $("#resp1").hide();
           
        },7000);
        }else if(data == 'used1'){
        $("#resp1").html('<div class="alert alert-danger col-md-8" >Ooops! The email provided is already used.</div>').fadeIn();
        setTimeout(function(){
          $("#resp1").hide();
           
        },7000);
        }else if(data == 'pass'){
          $("#resp1").html('<div class="alert alert-danger col-md-8">Password fields do not match!!</div>').fadeIn();
          setTimeout(function(){
              $("#resp1").hide();
          },3000);
        } else{
          $("#resp1").html('<div class="alert alert-success col-md-8"> New Member successfully created</div>').fadeIn();
          $("#sform")[0].reset(); 
          setTimeout(function(){
              $("#resp1").hide();
          },3000);
        }
        },

        error: function(e) {
          $("#resp1").html(e).fadeIn();
        }         
        });

    }));
   });
</script>
</body>
</html>