
    <!-- HOST MODAL START -->
    <div class="modal fade bd-example-modal-lg" id="hostSubscribeModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content" style="border-radius:20px;">
          <div class="modal-body bg-light" style="border-radius:20px;">

            <button type="button" class="close float-right" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <br>
            <div class="text-center">
              <img src="<?php echo base_url(); ?>assets/images/header_host.png" alt="" class="modal-title text-center" id="popup-title">
            </div>
            <br><br>
            <div class="container">
              <div class="row">
                <div class="col-md-5 text-center">
                  <img src="<?php echo base_url(); ?>assets/images/popup-logo.png" alt="" id="popup-logo">
                </div>
                <div class="col-md-7">
                  <br>
                  <?php echo form_open('subscription'); ?>
                  <?php echo '<div class="text-danger" id="popup_host_error" style="color:red;">' . form_error('popup_host_name') . '</div>'; ?>
                    <input type="text" class="form-control" name="popup_host_name" value="" placeholder="Naam:" id="popup_host_name" value="<?php echo set_value('popup_host_name'); ?>">
                    <?php echo '<div class="text-danger" id="popup_host_name_error" style="color:red;">' . form_error('popup_host_name') . '</div>'; ?>
                    <br>
                    <input type="email" class="form-control" name="popup_host_email" value="" placeholder="E-mailadres:" id="popup_host_email" value="<?php echo set_value('popup_host_email'); ?>" >
                    <?php echo '<div class="text-danger" id="popup_host_email_error" style="color:red;">' . form_error('popup_host_email') . '</div>'; ?>
                    <br>
                    <button type="button" class="BureauEagleFBBook form-control popup-guest-btn" name="popup_host_btn" id="popup_host_btn" onclick="host_subscription_form()">MELD JE NU AAN!</button>
                  </form>
                </div>
              </div>
            </div><br>
          </div>
        </div>
      </div>
    </div>
    <!-- HOST MODAL END -->

    <!-- GUEST MODAL START -->
    <div class="modal fade bd-example-modal-lg" id="guestSubscribeModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content" style="border-radius:20px;">
          <div class="modal-body bg-light" style="border-radius:20px;">

            <button type="button" class="close float-right" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <br>
            <div class="text-center">
              <img src="<?php echo base_url(); ?>assets/images/header_guest.png" alt="" class="modal-title text-center" id="popup-title">
            </div>
            <br><br>
            <div class="container">
              <div class="row">
                <div class="col-md-5 text-center">
                  <img src="<?php echo base_url(); ?>assets/images/popup-logo.png" alt="" id="popup-logo">
                </div>
                <div class="col-md-7">
                  <br>
                  <?php echo form_open('subscription'); ?>
                  <?php echo '<div class="text-danger" id="popup_guest_error" style="color:red;">' . form_error('popup_guest_name') . '</div>'; ?>
                    <input type="text" class="form-control" name="popup_guest_name" value="" placeholder="Naam:" id="popup_guest_name" value="<?php echo set_value('popup_guest_name'); ?>">
                    <?php echo '<div class="text-danger" id="popup_guest_name_error" style="color:red;">' . form_error('popup_guest_name') . '</div>'; ?>
                    <br>
                    <input type="email" class="form-control" name="popup_guest_email" value="" placeholder="E-mailadres:" id="popup_guest_email" value="<?php echo set_value('popup_guest_email'); ?>" >
                    <?php echo '<div class="text-danger" id="popup_guest_email_error" style="color:red;">' . form_error('popup_guest_email') . '</div>'; ?>
                    <br>
                    <button type="button" class="BureauEagleFBBook form-control popup-guest-btn" name="popup_guest_btn" id="popup_guest_btn" onclick="guest_subscription_form()">MELD JE NU AAN!</button>
                  </form>
                </div>
              </div>
            </div><br>
          </div>
        </div>
      </div>
    </div>
    <!-- GUEST MODAL END -->

  </body>
</html>
