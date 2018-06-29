<div class="form-panel bid-panel">
  <div class="container">
    <form action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" method="post" id="bid_form">
      <input type="hidden" name="action" value="bid_form_submission">
      <input type="hidden" name="bid_form_nonce" value="<?php echo $bid_form_nonce = wp_create_nonce( 'bid_form_nonce' ); ?>">
    <div class="row align-items-center">

        <div class="col-sm-4">
          <h2><?php _e('Bid Request', 'davinci'); ?></h2>
          <p><?php _e('DaVinci advisors are ready: ', 'davinci'); ?><strong><?php _e('800.654.1177', 'davinci'); ?></strong></p>

        </div>
        <div class="col-sm-8">
          <div class="row">
            <div class="col-sm">
              <div class="form-group">
                <input type="text" class="form-control" id="first-name" name="bid[first_name]" placeholder="First name">
              </div>
            </div>
            <div class="col-sm">
              <div class="form-group">
                <input type="text" class="form-control" id="last-name" name="bid[last_name]" placeholder="Last name">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm">
              <div class="form-group">
                <input type="text" class="form-control" id="business-name" name="bid[business_name]" placeholder="Business Name">
              </div>
            </div>
            <div class="col-sm">
              <div class="form-group">
                <input type="email" class="form-control" id="email" name="bid[email]" placeholder="Email">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm">
              <div class="form-group">
                <input type="text" class="form-control" id="phone" name="bid[phone]" placeholder="Telephone">
              </div>
            </div>
            <div class="col-sm">
              <div class="row">
                <div class="col">
                  <div class="form-group">
                    <input type="text" class="form-control" id="city" name="bid[city]"placeholder="City">
                  </div>
                </div>
                <div class="col">
                  <div class="form-group">
                    <input type="text" class="form-control" id="state" name="bid[state]" placeholder="State">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div><!-- .col-sm-8 -->

      </div><!-- .row -->

      <div class="row">

        <div class="col-sm-4">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
        <div class="col-sm-8">&nbsp;</div>

      </div><!-- .row -->

    </form>
  </div>
</div>
