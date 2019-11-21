$(document).ready(function(){
  $('#popup_email').change(function(){
    var email = $('#popup_email').val();
    if(email != ''){
      $.ajax({
        url:"<?php echo base_url(); ?>welcome/check_email",
        method: "POST",
        data: {email:email},
        success:function(result){
          if(result =='ok'){
            $('#popup-btn').removeAttr("disabled");
            $('#popup-btn').css("background-color", "#C7D530");
            $('#popup_error').html('');
          }else{
            $('#popup-btn').attr("disabled","disabled");
            $('#popup-btn').css("background-color", "lightgray");
            $('#popup_error').html('<div class="alert alert-danger" id="alert"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Error!</strong> Email Already Registered</div>');
          }
        }
      });
    }
  });
});

function footer_subscription_form(){
  var reg = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
  var email = $('#footer_email').val();
  if(email.trim() == '' ){
    $('#footer_error').html('<div class="alert alert-danger " id="alert"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Error!</strong> Enter your email</div>');
      return false;
  }else if(email.trim() != '' && !reg.test(email)){
    $('#footer_error').html('<div class="alert alert-danger " id="alert"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Error!</strong> Enter valid email</div>');
      return false;
  }else{
    $.ajax({
      url:"<?php echo base_url(); ?>welcome/email_subscription",
      method: "POST",
      data: {email:email},
      success:function(result){
        if(result == 'ok'){
          $('#footer-btn').attr("disabled","disabled");
          $('#footer_error').html('<div class="alert alert-success" id="alert"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Congrats!</strong> Successfully Registered</div>');
        }else{
          $('#footer_error').html('<div class="alert alert-danger " id="alert"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Error!</strong> Email Already Registered</div>');
        }
      }
    });
  }
}

function contact_form(){
  var reg = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
  var name = $('#msg_username').val();
  var email = $('#msg_email').val();
  var message = $('#msg_message').val();
  if(name.trim() == '' ){
      $('#msg_username_error').html('<div class="alert alert-danger " id="alert"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Error!</strong> Enter your username</div>'); //please enter your username
      return false;
  }else if(name.toString().length < 2 ){
      $('#msg_username_error').html('<div class="alert alert-danger " id="alert"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Error!</strong> The Username field must be at least 2 characters in length</div>'); //The Username field must be at least 2 characters in length
      return false;
  }else if(email.trim() == '' ){
      $('#msg_username_error').html('<div class="alert alert-danger " id="alert"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Error!</strong> Please enter you email</div>'); //Please enter you email
      return false;
  }else if(email.trim() != '' && !reg.test(email)){
      $('#msg_username_error').html('<div class="alert alert-danger " id="alert"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Error!</strong> Please Enter Valid email</div>'); //Please Enter Valid email
      return false;
  }else if(message.toString().length < 10 ){
      $('#msg_username_error').html('<div class="alert alert-danger " id="alert"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Error!</strong> The Message field must be at least 10 characters in length</div>'); //The Message field must be at least 10 characters in length.
      return false;
  }else if(message.toString().length > 2000 ){
    $('#msg_username_error').html('<div class="alert alert-danger " id="alert"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Error!</strong> The Message field cannot exceed 2000 characters in length</div>'); //The Message field cannot exceed 2000 characters in length
      return false;
  }else{
    $.ajax({
      url:"<?php echo base_url(); ?>welcome/message",
      method: "POST",
      data: {name:name,email:email,message:message},
      success:function(msg){
        if(msg = 'ok'){
          $('#msg_username').val('');
          $('#msg_email').val('');
          $('#msg_message').val('');
          $('#verstuur-btn').attr("disabled","disabled");
          $('#msg_username_error').html('<div class="alert alert-success" id="alert"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Message!</strong> Successfully sent. We\'ll contact you shortly.</div>')
        }else{
          $('#msg_username_error').html('<div class="alert alert-danger " id="alert"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Error!</strong> Something went wrong! Please Try again.</div>');
        }
      }
    });
  }
}

function popup_subscription_form(){
    var reg = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
    var name = $('#popup_name').val();
    var email = $('#popup_email').val();
    if(name.trim() == '' ){
        $('#popup_error').html('<div class="alert alert-danger " id="alert"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Error!</strong> Enter your username</div>'); //please enter your username
        return false;
    }else if(name.toString().length < 2 ){
        $('#popup_error').html('<div class="alert alert-danger " id="alert"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Error!</strong> The Username field must be at least 2 characters in length</div>'); //The Username field must be at least 5 characters in length
        return false;
    }else if(email.trim() == '' ){
        $('#popup_error').html('<div class="alert alert-danger " id="alert"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Error!</strong> Enter your email</div>'); //please enter your email
        return false;
    }else if(email.trim() != '' && !reg.test(email)){
        $('#popup_error').html('<div class="alert alert-danger " id="alert"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Error!</strong> Enter valid email</div>'); //please enter valid username
        return false;
    }else{
        $.ajax({
          type:'POST',
          url:'<?php echo base_url(); ?>welcome/subscription',
          data: {name:name,email:email},
          success:function(msg){
            if(msg == 'ok'){
              $('#popup_name').val('');
              $('#popup_email').val('');
              $('#popup_error').html('<div class="alert alert-success " id="alert"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Thanks for contacting us,</strong> we\'ll get back to you soon.</div>');
            }else{
              $('#popup_error').html('<div class="alert alert-danger " id="alert"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Some problem occurred,</strong> please try again.</div>');
            }
          }
        });
    }
}
