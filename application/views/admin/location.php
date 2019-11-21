<div class="wrapper">
    <!-- Sidebar Holder -->
    <nav id="sidebar">
        <div class="sidebar-header">
          <img class="img-thumbnail" src="<?php echo base_url(); ?>assets/images/Logo-website.png" alt="">
        </div>
        <br><br>
        <ul class="list-unstyled components">
            <li class="active">
                <a href="http://Boekjeplekje.nl/locations">Locations</a>
            </li>
            <br>
            <li>
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
      <h1 class="BureauEagleFBBook">Locations</h1>
      <br><br>
      <div class="table-responsive">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name Location</th>
            <th scope="col">Category</th>
            <th scope="col">Package</th>
            <th scope="col" colspan="2">  </th>
          </tr>
        </thead>
        <tbody>
          <?php
          $srno = 1;
            if(isset($location_data)){
              foreach ($location_data as $location_row) {
                if(isset($address_data)){
                  foreach ($address_data as $address_row) {
                    if(isset($image_data)){
                      foreach ($image_data as $image_row) {

                    echo  '<tr>
                              <th scope="row"><?php echo $srno; ?> </th>
                              <td>'.$location_row['name'].'</td>
                              <td>'.$location_row['category1'] . ' , ' . $location_row['category2'].' </td>
                              <td>'.$location_row['package'].'</td>
                              <td>
                                <a href="#modalUpdateLocation' . $location_row['loc_id'] . '" class="btn btn-success" data-toggle="modal" data-target="#modalUpdateLocation'. $location_row['loc_id'] . '">Update</a>
                              </td>
                              <td>
                                <a href="#modalDeleteLocation' . $location_row['loc_id'] . '" class="btn btn-danger" data-toggle="modal" data-target="#modalDeleteLocation'. $location_row['loc_id'] . '">Delete</a>
                              </td>
                          </tr>

                          <!-- Update Category Modal Start-->
                          <div class="modal fade bd-example-modal-lg" id="modalUpdateLocation'.$location_row['loc_id'].'" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLongTitle">Update Service Category</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  <div class="container">
                                      <form method="post" action="'. base_url('Admin/updateLocation') .'">
                                      <div class="row">
                                        <!-- LOCATION NAME -->
                                        <div class="col-md-12">
                                          <input type="hidden" name="loc_id" class="form-control col-md-7" value="' . $location_row['loc_id'] .'" required>
                                          <input type="text" name="loc_name" class="form-control col-md-7" value="' . $location_row['name'] .'" placeholder="Name location" readonly required>
                                        </div>

                                        <div class="col-md-12">
                                          <br>
                                        </div>

                                        <!-- CATEGORY 1 AND CATEGORY 2 -->
                                        <div class="col-md-12">
                                          <div class="input-group">
                                            <select class="col-md-3 form-control" name="loc_category1" id="loc_category1" required>
                                              <option value="'. $location_row['category1'].'">'. $location_row['category1'].'</option>
                                              <option value="Vergaderen">Vergaderen</option>
                                              <option value="Feestlocatie">Feestlocatie</option>
                                              <option value="Flexwerken">Flexwerken</option>
                                              <option value="Werkruimte ">Werkruimte</option>
                                              <option value="Opslag">Opslag</option>
                                              <option value="Catering">Catering</option>
                                            </select>
                                            <span class="col-md-1"></span>
                                            <select class="col-md-3 form-control" name="loc_category2" id="loc_category2" required>
                                              <option value="'. $location_row['category2'].'">'. $location_row['category2'].'</option>
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
                                            <option value="'. $location_row['package'].'">'. $location_row['package'].'</option>
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
                                            <input type="text" name="loc_streetname" id="loc_streetname" class="form-control col-md-5" value="'. $address_row['streetname'].'" placeholder="Streetname:" required>
                                            <span class="col-md-1"></span>
                                            <input type="text" name="loc_housenumber" id="loc_housenumber" class="form-control col-md-2" value="'. $address_row['housenumber'].'" placeholder="Housenumber:" required>
                                          </div>
                                        </div>

                                        <div class="col-md-12">
                                          <br>
                                        </div>

                                        <!-- ZIPCODE, CITY, PROVINCIE, COUNTRY -->
                                        <div class="col-md-12">
                                          <div class="input-group">
                                            <input type="text" name="loc_zipcode" id="loc_zipcode" class="form-control col-md-2" value="'. $address_row['zipcode'].'" placeholder="Zipcode:" required>
                                            <span class="col-md-1"></span>
                                            <input type="text" name="loc_city" id="loc_city" class="form-control col-md-2" value="'. $address_row['city'].'" placeholder="City" required>
                                            <span class="col-md-1"></span>
                                            <select class="col-md-2 form-control" name="loc_province" id="loc_province" required>
                                              <option value="'. $address_row['province'].'">'. $address_row['province'].'</option>
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
                                              <option value="'. $address_row['country'].'">'. $address_row['country'].'</option>
                                              <option value="Netherlands">Netherlands</option>
                                            </select>
                                          </div>
                                        </div>

                                        <div class="col-md-12">
                                          <br>
                                        </div>

                                        <!-- PHONE NUMBER, EMAIL -->
                                        <div class="col-md-12">
                                          <div class="input-group">
                                            <input type="tel" name="loc_phonenumber" id="loc_phonenumber" class="form-control col-md-5" value="'. $location_row['phonenumber'].'" placeholder="Phonenumber:" required>
                                            <span class="col-md-1"></span>
                                            <input type="email" name="loc_emailaddress" id="loc_emailaddress" class="form-control col-md-5" value="'. $location_row['emailaddress'].'" placeholder="Emailaddress:" required>
                                          </div>
                                        </div>

                                        <div class="col-md-12">
                                          <br>
                                        </div>

                                        <!-- LOCATION INFORMATION TEXTAREA -->
                                        <div class="col-md-12">
                                          <textarea type="text" rows="10" name="loc_information" id="loc_information" class="form-control" value="" placeholder="Information:" maxlength="1000" required>'. $location_row['information'].'</textarea>
                                        </div>

                                        <div class="col-md-12">
                                          <br>
                                        </div>

                                        <!-- PRICE 5-25, Persons, Space m2 -->
                                        <div class="col-md-12">
                                          <div class="input-group col-md-12">
                                            <div class="input-group-prepend">
                                              <span class="input-group-text">Price: €</span>
                                              <input type="number" class="form-control" step="0.01" name="loc_price" id="loc_price" value="'. $location_row['price'].'" pattern="^\d*(\.\d{0,2})?$" min="5" max="25" required/>
                                              <script type="text/javascript">
                                                $(document).on("keydown", "input[pattern]", function(e){
                                                  var input = $(this);
                                                  var oldVal = input.val();
                                                  var regex = new RegExp(input.attr("pattern"), "g");

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
                                                <option value="'. $location_row['persons'].'">'. $location_row['persons'].'</option>
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
                                              <input type="text" class="form-control col-md-2" name="loc_spacem2" id="loc_spacem2" value="'. $location_row['spacem2'].'" placeholder="Space m2" required>
                                            </div>
                                          </div>
                                        </div>

                                        <div class="col-md-12">
                                          <br><br>
                                        </div>

                                        <div class="col-md-12">
                                          <input class="btn btn-success col-md-3" type="submit" name="submit" value="Update">
                                        </div>
                                        <div class="col-md-12">
                                          <br><br>
                                        </div>
                                      </div>
                                    </form>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <!-- Update Category Modal End-->

                          <!-- Delete Category Modal Start-->
                          <div class="modal fade" id="modalDeleteLocation'.$location_row['loc_id'].'" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLongTitle">Delete Service Category</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  <div class="container">
                                      <form method="post" action="'. base_url('Admin/deleteLocation') .'">
                                        <input type="hidden" name="loc_id" class="form-control" value="' . $location_row['loc_id'] . '" readonly>
                                        <div class="form-group">
                                          <input type="hidden" readonly class="form-control-plaintext" id="txtUpdCatId" value="">
                                        </div>
                                        <div class="form-group text-center">
                                          <label for="exampleFormControlInput1" class="formheading">Confirm Delete?</label>
                                        </div> <hr/>
                                        <div class="float-right">
                                          <button class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                          <button type="submit" class="btn btn-danger">Delete</button>
                                        </div>
                                      </form>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <!-- Delete Category Modal End-->';

                $srno++;
                          }
                        }
                      }
                    }
                  }
                }
                else{
                  echo '<td colspan="6" class="text-center"><h5>No Location found</h5></td>';
                }
              ?>

        </tbody>
      </table>
      </div>

    </div>
  </div>

<script type="text/javascript">
$(document).ready(function () {
    $('#sidebarCollapse').on('click', function () {
        $('#sidebar').toggleClass('active');
    });
});
</script>
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
<script type="text/javascript">
  $(document).ready(function() {
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
</script>