<script type="text/javascript">
  function validate_form(){
    var loc_name          = $('#loc_name').val();
    var loc_category1     = $('#loc_category1').val();
    var loc_category2     = $('#loc_category2').val();
    var loc_package       = $('#loc_package').val();
    var loc_streetname    = $('#loc_streetname').val();
    var loc_housenumber   = $('#loc_housenumber').val();
    var loc_zipcode       = $('#loc_zipcode').val();
    var loc_city          = $('#loc_city').val();
    var loc_province      = $('#loc_province').val();
    var loc_country       = $('#loc_country').val();
    var loc_phonenumber   = $('#loc_phonenumber').val();
    var loc_emailaddress  = $('#loc_emailaddress').val();
    var loc_websiteurl    = $('#loc_websiteurl').val();
    var loc_facebookurl   = $('#loc_facebookurl').val();
    var loc_instagramurl  = $('#loc_instagramurl').val();
    var loc_linkedinurl   = $('#loc_linkedinurl').val();
    var loc_information   = $('#loc_information').val();
    var loc_price         = $('#loc_price').val();
    var loc_persons       = $('#loc_persons').val();
    var loc_spacem2       = $('#loc_spacem2').val();

    var loc_mon_from      = $('#loc_mon_from').val();
    var loc_mon_till      = $('#loc_mon_till').val();
    var loc_tue_from      = $('#loc_tue_from').val();
    var loc_tue_till      = $('#loc_tue_till').val();
    var loc_wed_from      = $('#loc_wed_from').val();
    var loc_wed_till      = $('#loc_wed_till').val();
    var loc_thu_from      = $('#loc_thu_from').val();
    var loc_thu_till      = $('#loc_thu_till').val();
    var loc_fri_from      = $('#loc_fri_from').val();
    var loc_fri_till      = $('#loc_fri_till').val();
    var loc_sat_from      = $('#loc_sat_from').val();
    var loc_sat_till      = $('#loc_sat_till').val();
    var loc_sun_from      = $('#loc_sun_from').val();
    var loc_sun_till      = $('#loc_sun_till').val();
    if(loc_name.trim() == '' ){
      $('#error_msg').html('<div class="alert alert-danger " id="alert"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Location Name can\'n be empty</div>');
      return false;
    }else if(loc_phonenumber.toString().length < 10 ){
      $('#error_msg').html('<div class="alert alert-danger " id="alert"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Je gebruikersnaam moet tenminste 2 tekens bevatten</div>');
      return false;
    }else if(loc_information.trim() == '' ){
      $('#error_msg').html('<div class="alert alert-danger " id="alert"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Error!</strong> Information must be at least 10 characters. </div>');
      return false;
    }/*else{
      $.ajax({
        url:"<?php //echo base_url(); ?>welcome/message",
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
    }*/
  }
  $(document).ready(function () {
    $("input[type=file]").checkImageSize({
      minWidth: 100,
      minHeight: 100,
      maxWidth: 1024,
      maxHeight: 1020,
      showError: true,
      ignoreError: false
    });
      $('#sidebarCollapse').on('click', function () {
          $('#sidebar').toggleClass('active');
      });

        //IMAGE SIZE UPLOAD VALIDATION CODE START
        var logo              = document.getElementById("pic1");
        logo.onchange = function() {
            if(this.files[0].size > 2607200){
               alert("Image size must be less than 2 mb");
               this.value = "";
            };
            if(this.files[0].size < 2607200){
              /*var file = $(this)[0].files[0];
              if( file ) {
                var img = new Image();
                img.src = window.URL.createObjectURL( file );
                img.onload = function() {
                  var width = img.naturalWidth,
                      height = img.naturalHeight;
                  window.URL.revokeObjectURL( img.src );

                  if( width > 1024 && height > 1024 ) {
                      alert("Image dimension must be less or euqal to 1024*1024");
                      this.value = "";
                  }
                };
              }*/
              readURL1(this);
            };
        };
        var img1              = document.getElementById("pic2");
        img1.onchange = function() {
            if(this.files[0].size > 2607200){
               alert("Image size must be less than 2 mb");
               this.value = "";
            };
            if(this.files[0].size < 2607200){
              readURL2(this);
            };
        };
        var img2              = document.getElementById("pic3");
        img2.onchange = function() {
            if(this.files[0].size > 2607200){
               alert("Image size must be less than 2 mb");
               this.value = "";
            };
            if(this.files[0].size < 2607200){
              readURL3(this);
            };
        };
        var img3              = document.getElementById("pic4");
        img3.onchange = function() {
            if(this.files[0].size > 2607200){
               alert("Image size must be less than 2 mb");
               this.value = "";
            };
            if(this.files[0].size < 2607200){
              readURL4(this);
            };
        };
        var img4              = document.getElementById("pic5");
        img4.onchange = function() {
            if(this.files[0].size > 2607200){
               alert("Image size must be less than 2 mb");
               this.value = "";
            };
            if(this.files[0].size < 2607200){
              readURL5(this);
            };
        };
        var img5              = document.getElementById("pic6");
        img5.onchange = function() {
            if(this.files[0].size > 2607200){
               alert("Image size must be less than 2 mb");
               this.value = "";
            };
            if(this.files[0].size < 2607200){
              readURL6(this);
            };
        };
        //IMAGE SIZE VALIDATION CODE END
  });

  $('.newbtn').bind("click" , function () {
         $('#pic1').click();
  });

   function readURL1(input) {
     if (input.files && input.files[0]) {
       var reader = new FileReader();

       reader.onload = function (e) {
           $('#blah1').attr('src', e.target.result);
       };

       reader.readAsDataURL(input.files[0]);
     }
   }

   $('.newbtn').bind("click" , function () {
          $('#pic2').click();
   });

   function readURL2(input) {
     if (input.files && input.files[0]) {
       var reader = new FileReader();

       reader.onload = function (e) {
           $('#blah2').attr('src', e.target.result);
       };

       reader.readAsDataURL(input.files[0]);
     }
   }

   $('.newbtn').bind("click" , function () {
          $('#pic3').click();
   });

   function readURL3(input) {
     if (input.files && input.files[0]) {
       var reader = new FileReader();

       reader.onload = function (e) {
           $('#blah3').attr('src', e.target.result);
       };

       reader.readAsDataURL(input.files[0]);
     }
   }

   $('.newbtn').bind("click" , function () {
          $('#pic4').click();
   });

   function readURL4(input) {
     if (input.files && input.files[0]) {
       var reader = new FileReader();

       reader.onload = function (e) {
           $('#blah4').attr('src', e.target.result);
       };

       reader.readAsDataURL(input.files[0]);
     }
   }

   $('.newbtn').bind("click" , function () {
          $('#pic5').click();
   });

   function readURL5(input) {
     if (input.files && input.files[0]) {
       var reader = new FileReader();

       reader.onload = function (e) {
           $('#blah5').attr('src', e.target.result);
       };

       reader.readAsDataURL(input.files[0]);
     }
   }

   $('.newbtn').bind("click" , function () {
          $('#pic6').click();
   });

   function readURL6(input) {
     if (input.files && input.files[0]) {
       var reader = new FileReader();

       reader.onload = function (e) {
           $('#blah6').attr('src', e.target.result);
       };

       reader.readAsDataURL(input.files[0]);
     }
   }
</script>

<div class="wrapper">
    <!-- Sidebar Holder -->
    <nav id="sidebar">
        <div class="sidebar-header">
          <img class="img-thumbnail" src="<?php echo base_url(); ?>assets/images/Logo-website.png" alt="">
        </div>
        <br><br>
        <ul class="list-unstyled components">
            <li>
                <a href="http://Boekjeplekje.nl/locations">Locations</a>
            </li>
            <br>
            <li class="active">
                <a href="http://Boekjeplekje.nl/addlocation">Add Locations</a>
            </li>
            <br>
            <li>
                <a href="http://Boekjeplekje.nl/messages">Messages</a>
            </li>
        </ul>
    </nav>

<!-- Page Content Holder -->
    <div id="content">
      <!-- Welcome ADMIN, LOGOUT BUTTON -->
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <div class="container-fluid">
              <button type="button" id="sidebarCollapse" class="btn btn-dark bg-dark">
                  <i class="fas fa-align-left"></i>
              </button>
              <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <i class="fas fa-align-justify"></i>
              </button>

              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="nav navbar-nav ml-auto">
                  <li>
                    <a class="nav-link">Welcome: <?php echo $this->session->userdata('username'); ?></a>
                  </li>
                  <li class="nav-item active">
                    <form class="" action="<?php echo base_url(); ?>admin/logout" method="post">
                      <input type="submit" class="nav-link" value="Logout" style="background:none;border:none;">
                    </form>
                  </li>
                </ul>
              </div>
          </div>
      </nav>

      <!-- Add Location Code Start -->
      <div class="container">
        <h1 class="BureauEagleFBBook">Add Locations</h1>
        <br>
        <!-- Form Code Start -->
        <?php echo form_open_multipart('admin/addLocation'); ?>
          <div class="row">
            <!-- LOCATION NAME -->
            <div class="col-md-12">
              <input type="text" name="loc_name" id="loc_name" class="form-control col-md-5" value="" placeholder="Name location" required>
            </div>

            <div class="col-md-12">
              <br>
            </div>

            <!-- CATEGORY 1 AND CATEGORY 2 -->
            <div class="col-md-12">
              <div class="input-group">
                <select class="col-md-3 form-control" name="loc_category1" id="loc_category1" required>
                  <option value="">Category 1</option>
                  <option value="Vergaderen">Vergaderen</option>
                  <option value="Feestlocatie">Feestlocatie</option>
                  <option value="Flexwerken">Flexwerken</option>
                  <option value="Werkruimte ">Werkruimte</option>
                  <option value="Opslag">Opslag</option>
                  <option value="Catering">Catering</option>
                </select>
                <span class="col-md-1"></span>
                <select class="col-md-3 form-control" name="loc_category2" id="loc_category2">
                  <option value="">Category 2</option>
                  <option value="Vergaderen">Vergaderen</option>
                  <option value="Feestlocatie">Feestlocatie</option>
                  <option value="Flexwerken">Flexwerken</option>
                  <option value="Werkruimte ">Werkruimte</option>
                  <option value="Opslag">Opslag</option>
                  <option value="Catering">Catering</option>
                </select>
              </div>
            </div>

            <div class="col-md-12">
              <br>
            </div>

            <!-- PACKAGES -->
            <div class="col-md-12">
              <select class="col-md-5 form-control" name="loc_package" id="loc_package" required>
                <option value="">Package</option>
                <option value="Light">Light</option>
                <option value="Premium">Premium</option>
                <option value="Unlimited">Unlimited</option>
                <option value="Catering">Catering</option>
              </select>
            </div>

            <div class="col-md-12">
              <br>
            </div>

            <!-- STREET NAME, HOUSE NUMBER -->
            <div class="col-md-12">
              <div class="input-group">
                <input type="text" name="loc_streetname" id="loc_streetname" class="form-control col-md-5" value="" placeholder="Streetname:" required>
                <span class="col-md-1"></span>
                <input type="text" name="loc_housenumber" id="loc_housenumber" class="form-control col-md-2" value="" placeholder="Housenumber:" required>
              </div>
            </div>

            <div class="col-md-12">
              <br>
            </div>

            <!-- ZIPCODE, CITY, PROVINCIE, COUNTRY -->
            <div class="col-md-12">
              <div class="input-group">
                <input type="text" name="loc_zipcode" id="loc_zipcode" class="form-control col-md-2" value="" placeholder="Zipcode:" required>
                <span class="col-md-1"></span>
                <input type="text" name="loc_city" id="loc_city" class="form-control col-md-2" value="" placeholder="City" required>
                <span class="col-md-1"></span>
                <select class="col-md-2 form-control" name="loc_province" id="loc_province" required>
                  <option value="">Province</option>
                  <option value="Drenthe">Drenthe</option>
                  <option value="Groningen">Groningen</option>
                  <option value="Friesland">Friesland</option>
                  <option value="Overijssel">Overijssel</option>
                  <option value="Flevoland">Flevoland</option>
                  <option value="Gelderland">Gelderland</option>
                  <option value="Utrecht">Utrecht</option>
                  <option value="Noord-Holland">Noord-Holland</option>
                  <option value="Zuid-Holland">Zuid-Holland</option>
                  <option value="Zeeland">Zeeland</option>
                  <option value="Noord-Brabant">Noord-Brabant</option>
                  <option value="Limburg">Limburg</option>
                </select>
                <span class="col-md-1"></span>
                <select class="col-md-2 form-control" name="loc_country" id="loc_country" required>
                  <option value="">Country</option>
                  <option value="Netherlands">Netherland</option>
                </select>
              </div>
            </div>

            <div class="col-md-12">
              <br>
            </div>

            <!-- PHONE NUMBER, EMAIL -->
            <div class="col-md-12">
              <div class="input-group">
                <input type="tel" name="loc_phonenumber" id="loc_phonenumber" class="form-control col-md-5" value="" placeholder="Phonenumber:" required>
                <span class="col-md-1"></span>
                <input type="email" name="loc_emailaddress" id="loc_emailaddress" class="form-control col-md-5" value="" placeholder="Emailaddress:" required>
              </div>
            </div>

            <div class="col-md-12">
              <br>
            </div>

            <!-- WEBSITE URL -->
            <div class="col-md-12">
              <input type="text" name="loc_websiteurl" id="loc_websiteurl" class="form-control col-md-5" value="" placeholder="Website url:">
            </div>

            <div class="col-md-12">
              <br>
            </div>

            <!-- FACEBOOK URL, INSTAGRAM URL -->
            <div class="col-md-12">
              <div class="input-group">
                <input type="text" name="loc_facebookurl" id="loc_facebookurl" class="form-control col-md-5" value="" placeholder="Facebook url:">
                <span class="col-md-1"></span>
                <input type="text" name="loc_instagramurl" id="loc_instagramurl" class="form-control col-md-5" value="" placeholder="Instagram url:">
              </div>
            </div>

            <div class="col-md-12">
              <br>
            </div>

            <!-- LINKEDIN URL -->
            <div class="col-md-12">
              <input type="text" name="loc_linkedinurl" id="loc_linkedinurl" class="form-control col-md-5" value="" placeholder="LinkedIn url:">
            </div>

            <div class="col-md-12">
              <br>
            </div>

            <!-- LOCATION INFORMATION TEXTAREA -->
            <div class="col-md-12">
              <textarea type="text" rows="10" name="loc_information" id="loc_information" class="form-control" value="" placeholder="Information:" maxlength="1000" required></textarea>
            </div>

            <div class="col-md-12">
              <br>
            </div>

            <!-- PRICE 5-25, Persons, Space m2 -->
            <div class="col-md-12">
              <div class="input-group col-md-12">
                <div class="input-group-prepend">
                  <span class="input-group-text">Price: €</span>
                  <input type="number" class="form-control" step='0.01' name="loc_price" id="loc_price" pattern="^\d*(\.\d{0,2})?$" min="5" max="25" required/>
                  <script type="text/javascript">
                    $(document).on('keydown', 'input[pattern]', function(e){
                      var input = $(this);
                      var oldVal = input.val();
                      var regex = new RegExp(input.attr('pattern'), 'g');

                      setTimeout(function(){
                        var newVal = input.val();
                        if(!regex.test(newVal)){
                          input.val(oldVal);
                        }
                      }, 0);
                    });
                  </script>
                  <span class="col-md-1"></span>
                  <select class="col-md-4 input-group-prepend form-control" name="loc_persons" id="loc_persons" required>
                    <option value="">Select Persons</option>
                    <option value="1-5">1-5</option>
                    <option value="1-10">1-10</option>
                    <option value="1-15">1-15</option>
                    <option value="1-20">1-20</option>
                    <option value="1-25">1-25</option>
                    <option value="1-30">1-30</option>
                    <option value="1-35">1-35</option>
                    <option value="1-40">1-40</option>
                    <option value="1-50">1-50</option>
                    <option value="1-60">1-60</option>
                    <option value="1-70">1-70</option>
                    <option value="1-80">1-80</option>
                    <option value="1-90">1-90</option>
                    <option value="1-100">1-100</option>
                    <option value="1-150">1-150</option>
                    <option value="1-200">1-200</option>
                    <option value="1-250">1-250</option>
                    <option value="1-300">1-300</option>
                    <option value="1-500">1-500</option>
                    <option value="1-1000">1-1000</option>
                  </select>
                  <span class="col-md-1"></span>
                  <input type="text" class="form-control col-md-2" name="loc_spacem2" id="loc_spacem2" value="" placeholder="Space m2" required>
                </div>
              </div>
            </div>

            <div class="col-md-12">
              <br>
            </div>

            <!--IMAGES SECTION -->
            <div class="col-md-12">
              <div class="input-group">
                <label class="newbtn col-md-2">
                  <img id="blah1" src="<?php echo base_url(); ?>assets/images/bg-logo.png" width="130px" height="130px">
                  <input name="loc_logo" id="pic1" class='pis' type="file" accept="image/jpg,image/png,image/jpeg,image/gif"
                    data-min-height="100"
                    data-min-width="100"
                    data-max-width="1024"
                    data-max-height="1024"
                    required>
                </label>
                <label class="newbtn col-md-2">
                  <img id="blah2" src="<?php echo base_url(); ?>assets/images/bg-carousel.png" width="130px" height="130px">
                  <input name="loc_img1" id="pic2" class='pis' type="file" accept="image/jpg,image/png,image/jpeg,image/gif"
                    data-min-height="100"
                    data-min-width="100"
                    data-max-width="1024"
                    data-max-height="1024"
                    required>
                </label>
                <label class="newbtn col-md-2">
                  <img id="blah3" src="<?php echo base_url(); ?>assets/images/bg-carousel1.png" width="130px" accept="image/jpg,image/png,image/jpeg,image/gif" height="130px">
                  <input name="loc_img2" id="pic3" class='pis' type="file" accept="image/jpg,image/png,image/jpeg,image/gif"
                    data-min-height="100"
                    data-min-width="100"
                    data-max-width="1024"
                    data-max-height="1024">
                </label>
                <label class="newbtn col-md-2">
                  <img id="blah4" src="<?php echo base_url(); ?>assets/images/bg-carousel1.png" width="130px" height="130px">
                  <input name="loc_img3" id="pic4" class='pis' type="file" accept="image/jpg,image/png,image/jpeg,image/gif"
                    data-min-height="100"
                    data-min-width="100"
                    data-max-width="1024"
                    data-max-height="1024">
                </label>
                <label class="newbtn col-md-2">
                  <img id="blah5" src="<?php echo base_url(); ?>assets/images/bg-carousel1.png" width="130px" height="130px">
                  <input name="loc_img4" id="pic5" class='pis' type="file" accept="image/jpg,image/png,image/jpeg,image/gif"
                    data-min-height="100"
                    data-min-width="100"
                    data-max-width="1024"
                    data-max-height="1024">
                </label>
                <label class="newbtn col-md-2">
                  <img id="blah6" src="<?php echo base_url(); ?>assets/images/bg-carousel1.png" width="130px" height="130px">
                  <input name="loc_img5" id="pic6" class='pis' onchange="readURL6(this);" type="file" accept="image/jpg,image/png,image/jpeg,image/gif"
                    data-min-height="100"
                    data-min-width="100"
                    data-max-width="1024"
                    data-max-height="1024">
                </label>
              </div>
            </div>

            <div class="col-md-12">
              <small class="float-left text-danger">(max-size = 2 MB) (max-dimension = 1024*1024)</small>
              <br><br>
            </div>

            <!-- AVAILIBILITY SECTION -->
            <div class="col-md-12">
              <div class="col-md-12">
                <label for=""><b>Availability</b></label>
              </div>
              <div class="col-md-12">
                <br>
              </div>
              <!-- MONDAY -->
              <div class="col-md-12 input-group">
                <label for="" class="col-md-1">Monday:</label>
                <span class="col-md-1"></span>
                <input class="form-control col-md-2" type="text" name="loc_mon_from" id="loc_mon_from" placeholder="From:" required>
                <span class="col-md-1"></span>
                <input class="form-control col-md-2" type="text" name="loc_mon_till" id="loc_mon_till" placeholder="Till:" required>
                <script type="text/javascript">
                $('#loc_mon_from').timepicker({ 'timeFormat': 'H:i:s','step': 15 });
                $('#loc_mon_till').timepicker({ 'timeFormat': 'H:i:s','step': 15 });
                </script>
              </div>

              <div class="col-md-12">
                <br>
              </div>

              <!-- TUESDAY -->
              <div class="col-md-12 input-group">
                <label for="" class="col-md-1">Tuesday:</label>
                <span class="col-md-1"></span>
                <input class="form-control col-md-2" type="text" name="loc_tue_from" id="loc_tue_from" placeholder="From:" required>
                <span class="col-md-1"></span>
                <input class="form-control col-md-2" type="text" name="loc_tue_till" id="loc_tue_till" placeholder="Till:" required>
                <script type="text/javascript">
                $('#loc_tue_from').timepicker({ 'timeFormat': 'H:i:s','step': 15 });
                $('#loc_tue_till').timepicker({ 'timeFormat': 'H:i:s','step': 15 });
                </script>
              </div>

              <div class="col-md-12">
                <br>
              </div>

              <!-- WEDNESDAY -->
              <div class="col-md-12 input-group">
                <label for="" class="col-md-1">Wednesday:</label>
                <span class="col-md-1"></span>
                <input class="form-control col-md-2" type="text" name="loc_wed_from" id="loc_wed_from" placeholder="From:" required>
                <span class="col-md-1"></span>
                <input class="form-control col-md-2" type="text" name="loc_wed_till" id="loc_wed_till" placeholder="Till:" required>
                <script type="text/javascript">
                $('#loc_wed_from').timepicker({ 'timeFormat': 'H:i:s','step': 15 });
                $('#loc_wed_till').timepicker({ 'timeFormat': 'H:i:s','step': 15 });
                </script>
              </div>

              <div class="col-md-12">
                <br>
              </div>

              <!-- THURSDAY -->
              <div class="col-md-12 input-group">
                <label for="" class="col-md-1">Thursday:</label>
                <span class="col-md-1"></span>
                <input class="form-control col-md-2" type="text" name="loc_thu_from" id="loc_thu_from" placeholder="From:" required>
                <span class="col-md-1"></span>
                <input class="form-control col-md-2" type="text" name="loc_thu_till" id="loc_thu_till" placeholder="Till:" required>
                <script type="text/javascript">
                $('#loc_thu_from').timepicker({ 'timeFormat': 'H:i:s','step': 15 });
                $('#loc_thu_till').timepicker({ 'timeFormat': 'H:i:s','step': 15 });
                </script>
              </div>

              <div class="col-md-12">
                <br>
              </div>

              <!-- FRIDAY -->
              <div class="col-md-12 input-group">
                <label for="" class="col-md-1">Friday:</label>
                <span class="col-md-1"></span>
                <input class="form-control col-md-2" type="text" name="loc_fri_from" id="loc_fri_from" placeholder="From:" required>
                <span class="col-md-1"></span>
                <input class="form-control col-md-2" type="text" name="loc_fri_till" id="loc_fri_till" placeholder="Till:" required>
                <script type="text/javascript">
                $('#loc_fri_from').timepicker({ 'timeFormat': 'H:i:s','step': 15 });
                $('#loc_fri_till').timepicker({ 'timeFormat': 'H:i:s','step': 15 });
                </script>
              </div>

              <div class="col-md-12">
                <br>
              </div>

              <!-- SATURDAY -->
              <div class="col-md-12 input-group">
                <label for="" class="col-md-1">Saturday:</label>
                <span class="col-md-1"></span>
                <input class="form-control col-md-2" type="text" name="loc_sat_from" id="loc_sat_from" placeholder="From:" required>
                <span class="col-md-1"></span>
                <input class="form-control col-md-2" type="text" name="loc_sat_till" id="loc_sat_till" placeholder="Till:" required>
                <script type="text/javascript">
                $('#loc_sat_from').timepicker({ 'timeFormat': 'H:i:s','step': 15 });
                $('#loc_sat_till').timepicker({ 'timeFormat': 'H:i:s','step': 15 });
                </script>
              </div>

              <div class="col-md-12">
                <br>
              </div>

              <!-- SUNDAY -->
              <div class="col-md-12 input-group">
                <label for="" class="col-md-1">Sunday:</label>
                <span class="col-md-1"></span>
                <input class="form-control col-md-2" type="text" name="loc_sun_from" id="loc_sun_from" placeholder="From:" required>
                <span class="col-md-1"></span>
                <input class="form-control col-md-2" type="text" name="loc_sun_till" id="loc_sun_till" placeholder="Till:" required>
                <script type="text/javascript">
                $('#loc_sun_from').timepicker({ 'timeFormat': 'H:i:s','step': 15 });
                $('#loc_sun_till').timepicker({ 'timeFormat': 'H:i:s','step': 15 });
                </script>
              </div>

              <!-- Display Error message -->
              <div class="col-md-12">
                <br>
                <div id="error_msg">
                </div>
                <br>
              </div>


              <!-- SUBMIT BUTTON -->
            </div>


            <div class="col-md-12">
              <br>
            </div>



            <div class="col-md-12">
              <input class="btn btn-success col-md-3" type="submit" name="submit" value="Submit" onclick="validate_form()">
            </div>
          </div>
        </form>
        <!-- Form Code End -->
      </div>
      <!-- Add Location Code End -->
    </div>
<style media="screen">
  .pis{
    display: none;
  }

  .newbtn{
         cursor: pointer;
      }
      #blah{
  max-width:100px;
  height:100px;
  margin-top:20px;
  }
</style>