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
      <h1 class="jumbotron text-center BureauEagleFBBook">Welcome to Admin Panel</h1>

    </div>
  </div>

<script type="text/javascript">
$(document).ready(function () {
    $('#sidebarCollapse').on('click', function () {
        $('#sidebar').toggleClass('active');
    });
});
</script>