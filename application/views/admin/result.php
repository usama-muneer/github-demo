<!DOCTYPE html>
<html>
  <head>
    <!-- Global Site Tag (gtag.js) - Google Analytics Code Start >
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-132203788-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-132203788-1');
    </script>
    < Global Site Tag (gtag.js) - Google Analytics Code End -->
    <title> Boekjeplekje</title>
    <link rel="pictogram icon" href="<?php echo base_url(); ?>assets/images/pictogram.png" />
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">

    <link rel="stylesheet" type="text/css" href="https://unpkg.com/file-upload-with-preview/dist/file-upload-with-preview.min.css">

    <!-- BOOTSTRAP CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
    <!-- JQUERY JS -->
    <script src="<?php echo base_url(); ?>assets/js/jquery.validate.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"
        integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ"
        crossorigin="anonymous">
    </script>
    <!-- POPPER JS -->
    <script src="<?php echo base_url(); ?>assets/js/popper.min.js"></script>
    <!-- BOOTSTRAP JS -->
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
    <!-- FONT AWESOME JS -->
    <script src="<?php echo base_url(); ?>assets/js/all.js"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
    <!-- JAVASCRIPT CDN -->
    <script src="<?php echo base_url(); ?>assets/js/jquery-1.12.4.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery-ui.js"></script>
    <!-- DATADROPPER -->
    <link href="<?php echo base_url(); ?>assets/css/datedropper.css" rel="stylesheet">

    <script src="<?php echo base_url(); ?>assets/js/datedropper.js"></script>
    <!-- FONT AWESOME JS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <!-- custom css -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/adminHome.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/hr.timePicker.min.css">
    <!-- cUSTOM JAVASCRIPT -->
    <script src="<?php echo base_url(); ?>assets/js/hr.timePicker.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery.checkImageSize.js"></script>
  </head>
  <body>
    <div class="wrapper">
        <!-- Sidebar Holder -->
        <nav id="sidebar">
            <div class="sidebar-header">
              <img class="img-thumbnail" src="<?php echo base_url(); ?>assets/images/Logo-website.png" alt="">
            </div>
            <br><br>
            <ul class="list-unstyled components">
                <li class="">
                    <a href="http://localhost/Boekjeplekje-backup/locations">Locations</a>
                </li>
                <br>
                <li>
                    <a href="http://localhost/Boekjeplekje-backup/addlocation">Add Locations</a>
                </li>
                <br>
                <li>
                    <a href="http://localhost/Boekjeplekje-backup/messages">Messages</a>
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
        <div class="jumbotron text-left BureauEagleFBBook">

          <?php
            if(isset($error)){
              echo '<div class="text-danger">' . $error . "</div>";
            }
            if(isset($location)){
              if(isset($address)){
                if(isset($links)){
                  if(isset($images)){
                    if(isset($availability)){
                      echo '<h3 class="text-success">Location successfully inserted into database</h3><br><br>';
                      echo '<a href="'.base_url("addlocation").'" class="btn btn-info"> Add another Location </a>';
                    }
                  }
                }
              }
            }
            if(isset($updatelocation)){
              if(isset($updateaddress)){
                echo '<h3 class="text-success">Location successfully updated</h3><br><br>';
                echo '<a href="'.base_url("locations").'" class="btn btn-info"> View Locations </a>';
              }
            }
          ?>
          <?php echo '<div class="text-danger"><b>' . validation_errors() . "</b><br></div>"; ?>
          <?php echo '<div class="text-danger">' . form_open_multipart('admin/error_upload') . "</div>"; ?>
        </div>

      </div>
    </div>
  </body>
</html>

<script type="text/javascript">
$(document).ready(function () {
    $('#sidebarCollapse').on('click', function () {
        $('#sidebar').toggleClass('active');
    });
});
</script>
