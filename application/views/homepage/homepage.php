
<style type="text/css">
    #form .form-group label.error {
    color: #FB3A3A;
    display: inline-block;
    margin: 0px 0 0px 0px;
    padding: 0;
    text-align: left;
    }
</style>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/redils.css">
<script src="<?php echo base_url(); ?>assets/js/redils.js"></script>
<script type="text/javascript">

  $(document).ready(function(){

    $('#location-img-1').html('<img src="http://localhost/boekjeplekje.nl/assets/images/Ondernemersfabriek.jpg" class="img-fluid mx-auto d-block" alt="img1" id="" data-toggle="modal" data-target="#guestSubscribeModal" width="300px" >');

    $('#location-img-2').html('<img src="http://localhost/boekjeplekje.nl/assets/images/De-Drentse-Zaak.jpg" class="img-fluid mx-auto d-block" alt="img2" id="" data-toggle="modal" data-target="#guestSubscribeModal" width="300px" >');

    $('#location-img-3').html('<img src="http://localhost/boekjeplekje.nl/assets/images/De-Gouverneur.jpg" class="img-fluid mx-auto d-block" alt="img3" id="" data-toggle="modal" data-target="#guestSubscribeModal" width="300px" >');

    $('#location-img-4').html('<img src="http://localhost/boekjeplekje.nl/assets/images/De-Bonte-Wever.jpg" class="img-fluid mx-auto d-block" alt="img4" id="" data-toggle="modal" data-target="#guestSubscribeModal" width="300px">');

    $('#carouselExample').carousel({
				interval: 2000
		});

    $('#popup_host_email').keyup(function(){
      var reg = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
      var email = $('#popup_host_email').val();
      if(email.trim() != '' && reg.test(email)){
        $.ajax({
          url:"<?php echo base_url(); ?>welcome/check_email",
          method: "POST",
          data: {email:email},
          success:function(result){
            if(result =='ok'){
              $('#popup_host_btn').removeAttr("disabled");
              $('#popup_host_btn').css("background-color", "#C7D530");
              $('#popup_host_error').html('');
            }else{
              $('#popup_host_btn').attr("disabled","disabled");
              $('#popup_host_btn').css("background-color", "lightgray");
              $('#popup_host_error').html('<div class="alert alert-danger" id="alert"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Oeps! </strong> Dit e-mailadres is al geregistreerd</div>');
            }
          }
        });
      }
    });

    $('#popup_guest_email').keyup(function(){
      var reg = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
      var email = $('#popup_guest_email').val();
      if(email.trim() != '' && reg.test(email)){
        $.ajax({
          url:"<?php echo base_url(); ?>welcome/check_email",
          method: "POST",
          data: {email:email},
          success:function(result){
            if(result =='ok'){
              $('#popup_guest_btn').removeAttr("disabled");
              $('#popup_guest_btn').css("background-color", "#C7D530");
              $('#popup_guest_error').html('');
            }else{
              $('#popup_guest_btn').attr("disabled","disabled");
              $('#popup_guest_btn').css("background-color", "lightgray");
              $('#popup_guest_error').html('<div class="alert alert-danger" id="alert"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Oeps!</strong> Dit e-mailadres is al geregistreerd</div>');
            }
          }
        });
      }
    });

        setInterval(function () {
          var location = $('#pac-input').val();
          $('#location-search-text').html('<p> Ontdek: '+location+'</p>');
        },5000);


  });

  $('#blogCarousel').carousel({
    interval: 5000
  });

  function footer_subscription_form(){
    var reg = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
    var email = $('#footer_email').val();
    if(email.trim() == '' ){
      $('#footer_error').html('<div class="alert alert-danger " id="alert"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Vul je e-mailadres in</div>');
        return false;
    }else if(email.trim() != '' && !reg.test(email)){
      $('#footer_error').html('<div class="alert alert-danger " id="alert"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Vul een geldig e-mailadres in</div>');
        return false;
    }else{
      $.ajax({
        url:"<?php echo base_url(); ?>welcome/email_subscription",
        method: "POST",
        data: {email:email},
        success:function(result){
          if(result == 'ok'){
            $('#footer-btn').attr("disabled","disabled");
            $('#footer_error').html('<div class="alert alert-success" id="alert"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Yes!</strong> Je bent succesvol geregistreerd</div>');
          }else{
            $('#footer_error').html('<div class="alert alert-danger " id="alert"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Oeps!</strong> Dit e-mailadres is al geregistreerd</div>');
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
        $('#msg_username_error').html('<div class="alert alert-danger " id="alert"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Voer je gebruikersnaam in</div>'); //please enter your username
        return false;
    }else if(name.toString().length < 2 ){
        $('#msg_username_error').html('<div class="alert alert-danger " id="alert"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Je gebruikersnaam moet tenminste 2 tekens bevatten</div>'); //The Username field must be at least 2 characters in length
        return false;
    }else if(email.trim() == '' ){
        $('#msg_username_error').html('<div class="alert alert-danger " id="alert"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Vul je e-mailadres in</div>'); //Please enter you email
        return false;
    }else if(email.trim() != '' && !reg.test(email)){
        $('#msg_username_error').html('<div class="alert alert-danger " id="alert"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Vul een geldig e-mailadres in</div>'); //Please Enter Valid email
        return false;
    }else if(message.toString().length < 10 ){
        $('#msg_username_error').html('<div class="alert alert-danger " id="alert"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Je bericht moet uit minimaal 10 tekens bevatten</div>'); //The Message field must be at least 10 characters in length.
        return false;
    }else if(message.toString().length > 2000 ){
      $('#msg_username_error').html('<div class="alert alert-danger " id="alert"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Je bericht mag niet uit meer dan 2000 tekens bestaan</div>'); //The Message field cannot exceed 2000 characters in length
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
            $('#msg_username_error').html('<div class="alert alert-success" id="alert"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Joehoe! </strong> Je bericht is verzonden. Je hoort binnenkort van ons!</div>')
          }else{
            $('#msg_username_error').html('<div class="alert alert-danger " id="alert"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Oeps!</strong> Er ging iets fout! Probeer opnieuw</div>');
          }
        }
      });
    }
  }

  function host_subscription_form(){
      var reg   = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
      var name  = $('#popup_host_name').val();
      var email = $('#popup_host_email').val();
      var type  = 'host';
      if(name.trim() == '' ){
          $('#popup_host_error').html('<div class="alert alert-danger " id="alert"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Voer je gebruikersnaam in</div>'); //please enter your username
          return false;
      }else if(name.toString().length < 2 ){
          $('#popup_host_error').html('<div class="alert alert-danger " id="alert"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Je gebruikersnaam moet tenminste 2 tekens bevatten</div>'); //The Username field must be at least 5 characters in length
          return false;
      }else if(email.trim() == '' ){
          $('#popup_host_error').html('<div class="alert alert-danger " id="alert"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Vul je e-mailadres in</div>'); //please enter your email
          return false;
      }else if(email.trim() != '' && !reg.test(email)){
          $('#popup_host_error').html('<div class="alert alert-danger " id="alert"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Vul een geldig e-mailadres in</div>'); //please enter valid username
          return false;
      }else{
          $.ajax({
            type:'POST',
            url:'<?php echo base_url(); ?>welcome/register_user',
            data: {name:name,email:email,type:type},
            success:function(msg){
              if(msg == 'ok'){
                $('#popup_host_name').val('');
                $('#popup_host_email').val('');
                $('#popup_host_error').html('<div class="alert alert-success " id="alert"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Thanxs!</strong> We laten van ons horen!</div>');
              }else{
                $('#popup_host_error').html('<div class="alert alert-danger " id="alert"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Oeps!</strong> Er zijn een paar problemen, probeer opnieuw</div>');
              }
            }
          });
      }
  }

  function guest_subscription_form(){
      var reg   = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
      var name  = $('#popup_guest_name').val();
      var email = $('#popup_guest_email').val();
      var type  = 'guest';
      if(name.trim() == '' ){
          $('#popup_guest_error').html('<div class="alert alert-danger " id="alert"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Voer je gebruikersnaam in</div>'); //please enter your username
          return false;
      }else if(name.toString().length < 2 ){
          $('#popup_guest_error').html('<div class="alert alert-danger " id="alert"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Je gebruikersnaam moet tenminste 2 tekens bevatten</div>'); //The Username field must be at least 5 characters in length
          return false;
      }else if(email.trim() == '' ){
          $('#popup_guest_error').html('<div class="alert alert-danger " id="alert"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Vul je e-mailadres in</div>'); //please enter your email
          return false;
      }else if(email.trim() != '' && !reg.test(email)){
          $('#popup_guest_error').html('<div class="alert alert-danger " id="alert"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Vul een geldig e-mailadres in</div>'); //please enter valid username
          return false;
      }else{
          $.ajax({
            type:'POST',
            url:'<?php echo base_url(); ?>welcome/register_user',
            data: {name:name,email:email,type:type},
            success:function(msg){
              if(msg == 'ok'){
                $('#popup_guest_name').val('');
                $('#popup_guest_email').val('');
                $('#popup_guest_error').html('<div class="alert alert-success " id="alert"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Joehoe! Het is gelukt! </strong> Wij houden je binnnekort op de hoogte</div>');
              }else{
                $('#popup_guest_error').html('<div class="alert alert-danger " id="alert"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Oeps! </strong> Er zijn een paar problemen, probeer opnieuw</div>');
              }
            }
          });
      }
  }
</script>
    <!-- MAIN HEADER SECTION CODE START  -->
    <div class="bg-dark">

      <!-- MAP SECTION CODE START  -->
      <div id="map"></div>
      <!-- MAP SECTION CODE START  -->

      <!-- LOGO/TOP LEFT BAR SECTION CODE START  -->
      <div class="top-left">
        <img src="<?php echo base_url(); ?>assets/images/Logo-website.png" alt="" id="top-left-logo">
      </div>
      <!-- LOGO/TOP LEFT BAR SECTION CODE END  -->

      <!-- MENU BAR/TOP RIGHT BAR SECTION CODE START  -->
      <div class="top-right">
        <div class="navigation-bar">
          <div class="container-fluid">
            <nav class="navbar navbar-expand-lg navbar-light">
              <button class="navbar-toggler bg-white" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                  <li class="nav-item active">
                    <a class="nav-link text-white" data-toggle="modal" data-target="#hostSubscribeModal" href="#">Word verhuurder  <span class="sr-only">(current)</span></a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link text-white" data-toggle="modal" data-target="#guestSubscribeModal" href="#">Help</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link text-white" data-toggle="modal" data-target="#guestSubscribeModal" href="#">Registreren</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link text-white" data-toggle="modal" data-target="#guestSubscribeModal" href="#">Inloggen</a>
                  </li>
                </ul>
              </div>
            </nav>
          </div>
        </div>
        <?php
          if(validation_errors() == true){
            echo '<div class="alert alert-danger" id="alert">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Error!</strong> Some problem occurred, please try again.
                  </div>';
          }
        ?>
        <script type="text/javascript">
          $(".alert").fadeTo(2000, 500).slideUp(500, function(){
            $(".alert").slideUp(500);
          });
        </script>
      </div>
      <!-- MENU BAR/TOP RIGHT BAR SECTION CODE END  -->

      <!-- LOCATION SEARCH FORM SECTION CODE START  -->
      <div class="centered container">
        <div class="row">
          <div class="col-md-3">

          </div>
          <div class="text-center col-md-6">
            <img class="img-fluid" src="<?php echo base_url(); ?>assets/images/header.png" alt="" id="centered-image" style="padding-top:40px">
          </div>
          <div class="col-md-3 text-center">
            <img class="rounded centered-left-image" src="<?php echo base_url(); ?>assets/images/button.png" alt="" data-toggle="modal" data-target="#hostSubscribeModal" style="padding-bottom:80px;width:70%;">
          </div>
          <div class="col-md-5">
            <div id="pac-container">
              <input class="form-control location" id="pac-input" type="text" name="location" placeholder="Probeer: Assen" required>
            </div>
          </div>

          <div class="col-md-3">
            <input list="browsers" class="form-control" placeholder="Categorie: Vergaderen" required>
            <datalist id="browsers">
              <option value="Vergaderen">
              <option value="Feestlocatie">
              <option value="Flexwerken">
              <option value="Werkplaats">
              <option value="Opslag">
            </datalist>
          </div>

          <div class="col-md-2">
            <input type="text" class="form-control" id="datepicker" data-translate-mode="true" data-lang="nl" data-fx-mobile="true" data-default-date="Datum: 01-02-19" data-large-default="true"
            data-large-mode="true" data-modal="true" required />
            <script type="text/javascript">
              $("#datepicker").dateDropper();
            </script>
          </div>
          <div class="col-md-2">
            <button type="button" class="form-control btn-color  BureauEagleFBBook" name="btn_find_location" data-toggle="modal" data-target="#guestSubscribeModal" >ZOEK!</button>
          </div>
        </div>
      </div>
      <!-- LOCATAION SEARCH FORM  SECTION CODE END  -->

    </div>
    <!-- MAIN HEADER SECTION CODE END  -->

    <br>
    <!--  ICON SECTION CODE START -->
    <div class="container">
      <img class="img-fluid" src="<?php echo base_url(); ?>assets/images/icons.png" alt="">
    </div>
    <!--  ICON SECTION CODE END -->
    <br><br>
    <!--  HORIZONTAL LINE SECTION CODE START -->
    <div class="container">
      <h1 style="border-bottom:3px solid black;"></h1>
    </div>
    <!--  HORIZONTAL LINE SECTION CODE END -->
    <br>
    <!--  CATEGORY IMAGES SECTION CODE START -->
    <div class="container">
      <p class="BureauEagleFBBook heading-img-sec">Ontdek <br> Boekjeplekje.nl </p>
      <div class="row">
        <div class="col-md-1">
        </div>
        <div class="col-md-2">
          <img class="img-fluid" src="<?php echo base_url(); ?>assets/images/Feestlocaties.png" alt="" data-toggle="modal" data-target="#guestSubscribeModal">
        </div>
        <div class="col-md-2">
          <img class="img-fluid" src="<?php echo base_url(); ?>assets/images/Vergaderen.png" alt="" data-toggle="modal" data-target="#guestSubscribeModal">
        </div>
        <div class="col-md-2">
          <img class="img-fluid" src="<?php echo base_url(); ?>assets/images/Flexwerken.png" alt="" data-toggle="modal" data-target="#guestSubscribeModal">
        </div>
        <div class="col-md-2">
          <img class="img-fluid" src="<?php echo base_url(); ?>assets/images/Werkplaatsen.png" alt="" data-toggle="modal" data-target="#guestSubscribeModal">
        </div>
        <div class="col-md-2">
          <img class="img-fluid" src="<?php echo base_url(); ?>assets/images/Opslag.png" alt="" data-toggle="modal" data-target="#guestSubscribeModal">
        </div>
        <div class="col-md-1">
        </div>
      </div>
    </div>
    <!--  CATEGORY IMAGES SECTION CODE START -->
    <br>
    <!--  LOCATION IMAGES SECTION CODE START -->
    <div class="container">
      <p class="BureauEagleFBBook heading-img-sec" id="location-search-text">Ontdek: Assen</p>
      <div class="container">
        <div class="row blog">
          <div class="col-md-12">
            <div id="blogCarousel" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#blogCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#blogCarousel" data-slide-to="1"></li>
                    <li data-target="#blogCarousel" data-slide-to="2"></li>
                </ol>

                <!-- Carousel items -->
                <div class="carousel-inner">
                  <div class="carousel-item active">
                      <div class="row">
                          <div class="col-md-3">
                            <img src="http://placehold.it/250x250" alt="Image" style="max-width:100%;">
                          </div>
                          <div class="col-md-3">
                            <img src="http://placehold.it/250x250" alt="Image" style="max-width:100%;">
                          </div>
                          <div class="col-md-3">
                            <img src="http://placehold.it/250x250" alt="Image" style="max-width:100%;">
                          </div>
                          <div class="col-md-3">
                            <img src="http://placehold.it/250x250" alt="Image" style="max-width:100%;">
                          </div>
                      </div>
                      <!--.row-->
                  </div>
                  <!--.item-->
                    <div class="carousel-item">
                        <div class="row">
                            <div class="col-md-3">
                              <div class="" id="location-img-1">

                              </div>
                            </div>
                            <div class="col-md-3">
                              <div class="" id="location-img-2">

                              </div>
                            </div>
                            <div class="col-md-3">
                              <div class="" id="location-img-3">

                              </div>
                            </div>
                            <div class="col-md-3">
                              <div class="" id="location-img-4">

                              </div>
                            </div>
                        </div>
                        <!--.row-->
                    </div>
                    <!--.item-->

                    <div class="carousel-item">
                        <div class="row">
                            <div class="col-md-3">
                              <img src="http://placehold.it/250x250" alt="Image" style="max-width:100%;">
                            </div>
                            <div class="col-md-3">
                              <img src="http://placehold.it/250x250" alt="Image" style="max-width:100%;">
                            </div>
                            <div class="col-md-3">
                              <img src="http://placehold.it/250x250" alt="Image" style="max-width:100%;">
                            </div>
                            <div class="col-md-3">
                              <img src="http://placehold.it/250x250" alt="Image" style="max-width:100%;">
                            </div>
                        </div>
                        <!--.row-->
                    </div>
                    <!--.item-->
                </div>
                <!--.carousel-inner-->
            </div>
            <!--.Carousel-->

          </div>
        </div>
        <br><br><br><br>
      </div>
      <style media="screen">
        .blog .carousel-indicators {
        left: 0;
        top: auto;
          bottom: -40px;

        }

        /* The colour of the indicators */
        .blog .carousel-indicators li {
          background: #a3a3a3;
          border-radius: 50%;
          width: 8px;
          height: 8px;
        }

        .blog .carousel-indicators .active {
        background: #707070;
        }
      </style>
      <!-- div id="carouselExample" class="carouselPrograms carousel slide" data-ride="carousel" data-interval="false">
        <div class="carousel-inner row w-100 mx-auto" role="listbox">
            <div class="carousel-item col-md-4 active">
               <div class="panel panel-default">
                  <div class="panel-thumbnail">

                  </div>
                </div>
            </div>
            <div class="carousel-item col-md-4 ">
               <div class="panel panel-default">
                  <div class="panel-thumbnail">
                    <div class="" id="location-img-2">

                    </div>
                  </div>
                </div>
            </div>
            <div class="carousel-item col-md-4 ">
                <div class="panel panel-default">
                  <div class="panel-thumbnail">
                    <div class="" id="location-img-3">

                    </div>
                  </div>
                </div>
            </div>
            <div class="carousel-item col-md-4 ">
                <div class="panel panel-default">
                  <div class="panel-thumbnail">
                    <div class="" id="location-img-4">

                    </div>
                  </div>
                </div>
            </div>
            <div class="carousel-item col-md-4 ">
              <div class="panel panel-default">
                  <div class="panel-thumbnail">
                    <a href="#" title="image 6" class="thumb">
                      <img class="img-fluid mx-auto d-block" src="//via.placeholder.com/600x400?text=5" alt="slide 5">
                    </a>
                  </div>
                </div>
            </div>
            <div class="carousel-item col-md-4 ">
               <div class="panel panel-default">
                  <div class="panel-thumbnail">
                    <a href="#" title="image 7" class="thumb">
                      <img class="img-fluid mx-auto d-block" src="//via.placeholder.com/600x400?text=6" alt="slide 6">
                    </a>
                  </div>
                </div>
            </div>
            <div class="carousel-item col-md-4 ">
               <div class="panel panel-default">
                  <div class="panel-thumbnail">
                    <a href="#" title="image 8" class="thumb">
                      <img class="img-fluid mx-auto d-block" src="//via.placeholder.com/600x400?text=7" alt="slide 7">
                    </a>
                  </div>
                </div>
            </div>
           <div class="carousel-item col-md-4  ">
              <div class="panel panel-default">
                <div class="panel-thumbnail">
                  <a href="#" title="image 2" class="thumb">
                   <img class="img-fluid mx-auto d-block" src="//via.placeholder.com/600x400?text=8" alt="slide 8">
                  </a>
                </div>
              </div>
            </div>
          </div>
          <a class="carousel-control-prev" href="#carouselExample" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next text-faded" href="#carouselExample" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
          </a>
          <br><br>

      </div -->
      <div class="row">
        <div class="col-md-3">

        </div>
        <div class="col-md-6 text-center">
          <img src="<?php echo base_url(); ?>assets/images/Small-text.png" class="img-ht img-fluid rounded" id="">
        </div>
        <div class="col-md-3">

        </div>
      </div>
    </div>
    <!--  LOCATION IMAGES SECTION CODE START -->
    <br>
    <!-- COMPANY NAME LABEL SECTION CODE START -->
    <div class="container-fluid bg-dark">
      <div class="text-center" id="company-label-section">
        <h2 class="text-white BureauEagleFBBook">BOEKJEPLEKJE.NL</h2>
      </div>
    </div>
    <!-- COMPANY NAME LABEL SECTION CODE END -->

    <br>

    <!--  DESCRIPTION SECTION CODE START -->
    <div class="container">
      <p class="text-dark OpenSans-Semibold"> Boek eenvoudig en snel jouw ruimte op boekjeplekje.nl. Of je nou op zoek bent naar een vergaderruimte of locatie om een verjaardag te vieren, op boekjeplekje.nl vind je alle beschikbare locaties bij jou in de buurt!</p>
      <p class="text-dark OpenSans-Semibold"> Vanaf februari 2019 zullen de eerste locaties vindbaar zijn op boekjeplekje.nl. Uw locatie ook op boekjeplekje.nl? Neem contact met ons op: <a href="mailto:info@boekjeplekje.nl">info@boekjeplekje.nl</a></p>
    </div>
    <!--  DESCRIPTION SECTION CODE END -->

    <br>

    <!--  CONTACT FORM SECTION CODE START -->
    <div class="container">
      <div class="" id="contact-form-section">
        <h5><b>NEEM CONTACT OP:</b> </h5><small>velden die gemarkeerd zijn met een * zijn verplichte velden.</small>
        <br>
        <?php echo form_open('message') ?>
          <?php echo '<span class="text-danger" id="msg_username_error" style="color:red;"></span>'; ?>
          <div class="form-group">
            <label for="email"><b>Naam*</b></label>
            <input type="text" class="form-control" name="msg_username" id="msg_username" value="<?php echo set_value('msg_username'); ?>" required>
            <?php echo '<span class="text-danger" id="msg_username_error" style="color:red;">' . form_error('msg_username') . '</span>'; ?>
          </div>
          <div class="form-group">
            <label for="pwd"><b>Email*</b></label>
            <input type="email" class="form-control" name="msg_email" id="msg_email" value="<?php echo set_value('msg_email'); ?>" required>
            <?php echo '<span class="text-danger" id="msg_email_error" style="color:red;">' . form_error('msg_email') . '</span>'; ?>
          </div>
          <div class="form-group">
            <label for="pwd"><b>Bericht*</b></label>
            <textarea rows="10" cols="50" class="form-control" name="msg_message" id="msg_message" value="<?php echo set_value('msg_message'); ?>" maxlength="2000" required></textarea>
            <?php echo '<span class="text-danger" id="msg_message_error" style="color:red;">' . form_error('msg_message') . '</span>'; ?>
          </div>
          <button type="button" class="btn btn-theme BureauEagleFBBook verstuur-btn" id="verstuur-btn" onclick="contact_form()">VERSTUUR</button>
        </form>
      </div>
    </div>
    <!--  CONTACT FORM SECTION CODE END -->

    <br>

    <!--  FOOTER SECTION START -->
    <div class="footer container-fluid bg-dark">
      <div class="row container-fluid">
        <div class="col-md-1 text-center">
          <img src="<?php echo base_url(); ?>assets/images/Logo-website.png" alt="" id="footer-logo">
        </div>
        <div class="col-md-1"></div>
        <div class="col-md-5">
          <div class="text-center">
            <p class="text-white BureauEagleFBBook" id="footer-text">ALS EERSTE OP DE HOOGTE? SCHRIJF JE NU IN</p>
          </div>
          <?php echo form_open('EmailSubscription'); ?>
          <?php echo '<div class="text-danger bg-white" id="footer_error" style="color:red;">' . form_error('footer_email') . '</div>'; ?>
            <div class="input-group">
             <input type="email" class="form-control" name="footer_email" id="footer_email" placeholder="E-mailadres:" value="<?php echo set_value('footer_email'); ?>" required>
             <span class="input-group-btn">
               <button class="form-control btn btn-theme" type="button" id="footer-btn" onclick="footer_subscription_form()"><span class="fa fa-arrow-right"></span> </button>
             </span>
            </div>
          </form>
        </div>
        <div class="col-md-5">
          <div class="text-center center-block" style ="padding-top:60px;">
            <br />
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <a href="https://www.linkedin.com/company/boekjeplekje/about/" target="__blank"><img class="img-fluid sm-link" src="<?php echo base_url(); ?>assets/images/LinkedIn.png" alt="" id="" style="height:60px;"></a>
              &nbsp;&nbsp;&nbsp;&nbsp;
              <a href="http://www.instagram.com/boekjeplekje.nl" target="__blank"><img class="img-fluid sm-link" src="<?php echo base_url(); ?>assets/images/instagram.png" alt="" id="" style="height:60px;"></a>
              &nbsp;&nbsp;&nbsp;&nbsp;
              <a href="https://www.facebook.com/Boekjeplekjenl-1676104692495898/?ref=br_rs" target="__blank"><img class="img-fluid sm-link" src="<?php echo base_url(); ?>assets/images/facebook.png" alt="" id="" style="height:60px;"></a>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 text-white">
          <br>
          <p class="float-right" style="font-size:12px;">Copyright © 2019. Alle rechten voorbehouden. Boekjeplekje.nl</p>
        </div>
      </div>
    </div>
    <!--  FOOTER SECTION END -->
