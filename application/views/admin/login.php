<style media="screen">
  body{
  background-size: cover;
  background-color: lightgray;
  }
  .main-section  {
  margin: 0 auto;
  margin-top: 130px;
  padding: 0;
  }
  .modal-content {
  background-color: #3b4652;
  opacity: .95;
  padding: 0 18px;
  box-shadow: 0px 0px 3px #848484;
  }
  .user-img {
  margin-top: -50px;
  margin-bottom: 35px;
  }
  .user-img img {
  height: 100px;
  width: 100px;
  border-radius: 5px;
  box-shadow: 0px 0px 2px #3b4652;
  }
  .form-group {
  margin-bottom: 25px;
  }
  .form-group input {
  height: 42px;
  border-radius: 5px;
  border: 0;
  font-size: 15px;
  padding-left: 54px;
  }
  .form-group::before {
  font-family: 'Font Awesome\ 5 Free';
  content: "\f007";
  position: absolute;
  font-size: 22px;
  color: #555e60;
  left: 28px;
  padding-top: 4px;
  }
  .form-group:last-of-type::before {
  content: "\f023";
  }
  button {
  width: 50%;
  margin: 5px 0 25px;
  }
  .btn {
  background-color: #C7D530;
  color: #fff;
  font-size: 16px;
  padding: 7px 14px;
  border-radius: 5px;
  }
  .btn:hover, .btn:focus {
  background-color: #7e8908;
  }
</style>

<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/adminlogin_style.css">
<script type="text/javascript">
  function admin_login(){
    var username = $('#username').val();
    var password = $('#password').val();
    if(username == '' ){
      $('#login-error').html('<div class="alert alert-danger " id="alert"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Enter your username</div>');
        return false;
    }else if(password == ''){
      $('#login-error').html('<div class="alert alert-danger " id="alert"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Enter your passowrd</div>');
        return false;
    }else if(password.toString().length < 8 ){
      $('#login-error').html('<div class="alert alert-danger " id="alert"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Password must be at least 8 character long.</div>');
        return false;
    }else{
      $.ajax({
        url:"<?php echo base_url(); ?>welcome/admin_login",
        method: "POST",
        data: {username:username,password:password},
        success:function(result){
          if(result == 'ok'){
            $('#login-btn').attr("disabled","disabled");
            $('#login-error').html('<div class="alert alert-success" id="alert"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Redirecting...</strong></div>');
            setInterval(function () {
              window.location.replace("http://boekjeplekje.nl/home");
            },1000);
          }else{
            $('#login-error').html('<div class="alert alert-danger " id="alert"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Error!</strong> Invalid Data </div>');
          }
        }
      });
    }
  }
</script>


<div class="modal-dialog text-center">
    <div class="col-sm-8 main-section">
        <div class="modal-content">
            <div class="col-12 user-img">
                <img src="<?php echo base_url(); ?>assets/images/face.png">
            </div>
                <div id="login-error">

                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="username" id="username" placeholder="Enter Username">
                    <span class="text-danger"><?php echo set_value('username'); ?></span>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="password" id="password" placeholder="Enter Password">
                    <span class="text-danger"><?php echo set_value('password'); ?></span>
                </div>
                <button type="button" class="btn btn-info BureauEagleFBBook" id="login-btn" onclick="admin_login()"><i class="fas fa-sign-in-alt"></i>Sign In</button>

        </div>
    </div>