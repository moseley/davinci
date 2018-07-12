<div class="form-panel contact-panel">
  <div class="container">
    <form action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" method="post" id="contact_form">
      <input type="hidden" name="action" value="contact_form_submission">
      <input type="hidden" name="contact_form_nonce" value="<?php echo $bid_form_nonce = wp_create_nonce( 'contact_form_nonce' ); ?>">
      <div class="row">
        <div class="col text-center">
          <h2><?php _e('Intrigued by what you see?', 'davinci'); ?></h2>
          <p><?php _e('Allow a DaVinci advisor to tell you more.', 'davinci'); ?></p>
          <div id="contact_response"></div>
        </div>
      </div>
      <div class="row form-begin">
        <div class="col-md">
          <div class="form-group">
            <input type="text" class="form-control" id="first-name" name="contact[first_name]" placeholder="First name" required>
          </div>
        </div>
        <div class="col-md">
          <div class="form-group">
            <input type="text" class="form-control" id="last-name" name="contact[last_name]" placeholder="Last name" required>
          </div>
        </div>
      </div><!-- .row -->
      <div class="row">
        <div class="col-md">
          <div class="form-group">
            <input type="text" class="form-control" id="business-name" name="contact[business_name]" placeholder="Business Name" required>
          </div>
        </div>
        <div class="col-md">
          <div class="form-group">
            <input type="email" class="form-control" id="email" name="contact[email]" placeholder="Email" required>
          </div>
        </div>
      </div><!-- .row -->
      <div class="row">
        <div class="col-md">
          <div class="form-group">
            <input type="text" class="form-control" id="phone" name="contact[phone]" placeholder="Telephone" required>
          </div>
        </div>
        <div class="col-md">
          <div class="row">
            <div class="col-sm-9">
              <div class="form-group">
                <input type="text" class="form-control" id="city" name="contact[city]" placeholder="Job location: City" required>
              </div>
            </div>
            <div class="col-sm-3">
              <div class="form-group">
                <input type="text" class="form-control" id="state" name="contact[state]" placeholder="State" required>
              </div>
            </div>
          </div><!-- .row -->
        </div>
      </div><!-- .row -->
      <div class="row">
        <div class="col text-center">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </div>
    </form>
  </div>
</div>
