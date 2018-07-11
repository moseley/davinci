<?php
function davinci_setup() {
  load_theme_textdomain( 'davinci' );
  add_theme_support( 'automatic-feed-links' );
  add_theme_support( 'title-tag' );
  add_theme_support( 'post-thumbnails' );

  register_nav_menus( array(
		'header'    => __( 'Header Menu', 'davinci' )
	) );
}
add_action( 'after_setup_theme', 'davinci_setup' );

function davinci_widgets_init() {
  register_sidebar( array(
    'name'          => __( 'Footer One', 'davinci' ),
    'id'            => 'footer-one',
    'description'   => __( 'Add widgets here to appear in your footer.', 'davinci' ),
    'before_widget' => '<section id="%1$s" class="widget %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<h2 class="widget-title">',
    'after_title'   => '</h2>',
  ) );

  register_sidebar( array(
    'name'          => __( 'Footer Two', 'davinci' ),
    'id'            => 'footer-two',
    'description'   => __( 'Add widgets here to appear in your footer.', 'davinci' ),
    'before_widget' => '<section id="%1$s" class="widget %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<h2 class="widget-title">',
    'after_title'   => '</h2>',
  ) );

  register_sidebar( array(
    'name'          => __( 'Footer Three', 'davinci' ),
    'id'            => 'footer-three',
    'description'   => __( 'Add widgets here to appear in your footer.', 'davinci' ),
    'before_widget' => '<section id="%1$s" class="widget %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<h2 class="widget-title">',
    'after_title'   => '</h2>',
  ) );
}
add_action( 'widgets_init', 'davinci_widgets_init' );


function davinci_scripts() {
  $theme_data = wp_get_theme();
  define( 'THEME_VERSION', $theme_data->Version );
  wp_enqueue_style( 'typekit', 'https://use.typekit.net/sgy4oeq.css' );
	wp_enqueue_style( 'davinci-style', get_template_directory_uri() . '/assets/css/davinci.css', array( 'typekit' ), THEME_VERSION );

  wp_enqueue_script( 'slick', get_template_directory_uri() . '/node_modules/slick-carousel/slick/slick.min.js', array( 'jquery' ), null, true );
  wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/node_modules/bootstrap/dist/js/bootstrap.min.js', array( 'jquery' ), null, true );
  $params = array( 'ajax_url' => admin_url('admin-ajax.php') );
  wp_enqueue_script( 'addthis', '//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5b45e882cb144bba', array(), null, true );
  wp_enqueue_script( 'davinci-script', get_template_directory_uri() . '/assets/js/davinci.min.js', array('bootstrap', 'slick', 'addthis'), THEME_VERSION, true );
  wp_localize_script( 'davinci-script', 'params', $params );
}
add_action( 'wp_enqueue_scripts', 'davinci_scripts' );

function davinci_anchor_link( $atts, $item, $args ) {
    $atts['href'] .= ( !empty( $item->xfn ) ? '#' . $item->xfn : '' );
    return $atts;
}

add_filter( 'nav_menu_link_attributes', 'davinci_anchor_link', 10, 3 );

function davinci_include_svg_icons() {
	// Define SVG sprite file.
	$svg_icons = get_parent_theme_file_path( '/assets/svg/icons.svg' );

	// If it exists, include it.
	if ( file_exists( $svg_icons ) ) {
		require_once( $svg_icons );
	}
}
add_action( 'wp_footer', 'davinci_include_svg_icons', 9999 );

function davinci_process_bid_form() {
  if ( isset( $_POST['bid_form_nonce'] ) && wp_verify_nonce( $_POST['bid_form_nonce'], 'bid_form_nonce' ) ) {
    $first_name = sanitize_text_field( $_POST['bid']['first_name'] );
    $last_name = sanitize_text_field( $_POST['bid']['last_name'] );
    $business_name = sanitize_text_field( $_POST['bid']['business_name'] );
    $email = sanitize_text_field( $_POST['bid']['email'] );
    $phone = sanitize_text_field( $_POST['bid']['phone'] );
    $city = sanitize_text_field( $_POST['bid']['city'] );
    $state = sanitize_text_field( $_POST['bid']['state'] );
    $message = 'Name: ' . $first_name . ' ' . $last_name . "\r\n" .
      'Business: ' . $business_name . "\r\n" .
      'Email: ' . $email . "\r\n" .
      'Phone: ' . $phone . "\r\n" .
      'Location: ' . $city . ', ' . $state . "\r\n";
    $to = get_field( 'bid_form_email', 'option' );
    if ( ! $to ) {
      $to = get_bloginfo( 'admin_email' );
    }
    $subject = 'New Bid Request from website';
    wp_mail( $to, $subject, $message );
    if ( wp_get_referer() ) {
      wp_safe_redirect( wp_get_referer() );
    }
    else {
      wp_safe_redirect( get_home_url() );
    }
  }
}
add_action( 'admin_post_bid_form_submission', 'davinci_process_bid_form' );
add_action( 'admin_post_nopriv_bid_form_submission', 'davinci_process_bid_form' );

function davinci_process_bid_form_ajax() {
  $data = array();
  parse_str( $_POST['data'], $data );

  if ( isset( $data['bid_form_nonce'] ) && wp_verify_nonce( $data['bid_form_nonce'], 'bid_form_nonce' ) ) {
    $first_name = sanitize_text_field( $data['bid']['first_name'] );
    $last_name = sanitize_text_field( $data['bid']['last_name'] );
    $business_name = sanitize_text_field( $data['bid']['business_name'] );
    $email = sanitize_text_field( $data['bid']['email'] );
    $phone = sanitize_text_field( $data['bid']['phone'] );
    $city = sanitize_text_field( $data['bid']['city'] );
    $state = sanitize_text_field( $data['bid']['state'] );
    $message = 'Name: ' . $first_name . ' ' . $last_name . "\r\n" .
      'Business: ' . $business_name . "\r\n" .
      'Email: ' . $email . "\r\n" .
      'Phone: ' . $phone . "\r\n" .
      'Location: ' . $city . ', ' . $state . "\r\n";
    $to = get_field( 'bid_form_email', 'option' );
    if ( ! $to ) {
      $to = get_bloginfo( 'admin_email' );
    }
    $subject = 'New Bid Request from website';
    wp_mail( $to, $subject, $message );
  }
  die();
}
add_action( 'wp_ajax_bid_form_ajax', 'davinci_process_bid_form_ajax' );
add_action( 'wp_ajax_nopriv_bid_form_ajax', 'davinci_process_bid_form_ajax' );

function davinci_process_contact_form() {
  if ( isset( $_POST['contact_form_nonce'] ) && wp_verify_nonce( $_POST['contact_form_nonce'], 'contact_form_nonce' ) ) {
    $first_name = sanitize_text_field( $_POST['contact']['first_name'] );
    $last_name = sanitize_text_field( $_POST['contact']['last_name'] );
    $business_name = sanitize_text_field( $_POST['contact']['business_name'] );
    $email = sanitize_text_field( $_POST['contact']['email'] );
    $phone = sanitize_text_field( $_POST['contact']['phone'] );
    $city = sanitize_text_field( $_POST['contact']['city'] );
    $state = sanitize_text_field( $_POST['contact']['state'] );
    $message = 'Name: ' . $first_name . ' ' . $last_name . "\r\n" .
      'Business: ' . $business_name . "\r\n" .
      'Email: ' . $email . "\r\n" .
      'Phone: ' . $phone . "\r\n" .
      'Location: ' . $city . ', ' . $state . "\r\n";
    $to = get_field( 'contact_form_email', 'option' );
    if ( ! $to ) {
      $to = get_bloginfo( 'admin_email' );
    }
    $subject = 'New Contact Request from website';
    wp_mail( $to, $subject, $message );
    if ( wp_get_referer() ) {
      wp_safe_redirect( wp_get_referer() );
    }
    else {
      wp_safe_redirect( get_home_url() );
    }
  }
}
add_action( 'admin_post_contact_form_submission', 'davinci_process_contact_form' );
add_action( 'admin_post_nopriv_contact_form_submission', 'davinci_process_contact_form' );

function davinci_process_contact_form_ajax() {
  $data = array();
  parse_str( $_POST['data'], $data );

  if ( isset( $data['contact_form_nonce'] ) && wp_verify_nonce( $data['contact_form_nonce'], 'contact_form_nonce' ) ) {
    $first_name = sanitize_text_field( $data['contact']['first_name'] );
    $last_name = sanitize_text_field( $data['contact']['last_name'] );
    $business_name = sanitize_text_field( $data['contact']['business_name'] );
    $email = sanitize_text_field( $data['contact']['email'] );
    $phone = sanitize_text_field( $data['contact']['phone'] );
    $city = sanitize_text_field( $data['contact']['city'] );
    $state = sanitize_text_field( $data['contact']['state'] );
    $message = 'Name: ' . $first_name . ' ' . $last_name . "\r\n" .
      'Business: ' . $business_name . "\r\n" .
      'Email: ' . $email . "\r\n" .
      'Phone: ' . $phone . "\r\n" .
      'Location: ' . $city . ', ' . $state . "\r\n";
    $to = get_field( 'contact_form_email', 'option' );
    if ( ! $to ) {
      $to = get_bloginfo( 'admin_email' );
    }
    $subject = 'New Contact Request from website';
    wp_mail( $to, $subject, $message );
  }
  die();
}
add_action( 'wp_ajax_contact_form_ajax', 'davinci_process_contact_form_ajax' );
add_action( 'wp_ajax_nopriv_contact_form_ajax', 'davinci_process_contact_form_ajax' );

function davinci_get_svg( $args = array() ) {
	// Make sure $args are an array.
	if ( empty( $args ) ) {
		return __( 'Please define default parameters in the form of an array.', 'davinci' );
	}

	// Define an icon.
	if ( false === array_key_exists( 'icon', $args ) ) {
		return __( 'Please define an SVG icon filename.', 'davinci' );
	}

	// Set defaults.
	$defaults = array(
		'icon'        => '',
		'title'       => '',
		'desc'        => '',
		'fallback'    => false,
	);

	// Parse args.
	$args = wp_parse_args( $args, $defaults );

	// Set aria hidden.
	$aria_hidden = ' aria-hidden="true"';

	// Set ARIA.
	$aria_labelledby = '';

	/*
	 * DaVinci doesn't use the SVG title or description attributes; non-decorative icons are described with .screen-reader-text.
	 *
	 * However, child themes can use the title and description to add information to non-decorative SVG icons to improve accessibility.
	 *
	 * Example 1 with title: <?php echo davinci_get_svg( array( 'icon' => 'arrow-right', 'title' => __( 'This is the title', 'textdomain' ) ) ); ?>
	 *
	 * Example 2 with title and description: <?php echo davinci_get_svg( array( 'icon' => 'arrow-right', 'title' => __( 'This is the title', 'textdomain' ), 'desc' => __( 'This is the description', 'textdomain' ) ) ); ?>
	 *
	 * See https://www.paciellogroup.com/blog/2013/12/using-aria-enhance-svg-accessibility/.
	 */
	if ( $args['title'] ) {
		$aria_hidden     = '';
		$unique_id       = uniqid();
		$aria_labelledby = ' aria-labelledby="title-' . $unique_id . '"';

		if ( $args['desc'] ) {
			$aria_labelledby = ' aria-labelledby="title-' . $unique_id . ' desc-' . $unique_id . '"';
		}
	}

	// Begin SVG markup.
	$svg = '<svg class="icon icon-' . esc_attr( $args['icon'] ) . '"' . $aria_hidden . $aria_labelledby . ' role="img">';

	// Display the title.
	if ( $args['title'] ) {
		$svg .= '<title id="title-' . $unique_id . '">' . esc_html( $args['title'] ) . '</title>';

		// Display the desc only if the title is already set.
		if ( $args['desc'] ) {
			$svg .= '<desc id="desc-' . $unique_id . '">' . esc_html( $args['desc'] ) . '</desc>';
		}
	}

	/*
	 * Display the icon.
	 *
	 * The whitespace around `<use>` is intentional - it is a work around to a keyboard navigation bug in Safari 10.
	 *
	 * See https://core.trac.wordpress.org/ticket/38387.
	 */
	$svg .= ' <use href="#icon-' . esc_html( $args['icon'] ) . '" xlink:href="#icon-' . esc_html( $args['icon'] ) . '"></use> ';

	// Add some markup to use as a fallback for browsers that do not support SVGs.
	if ( $args['fallback'] ) {
		$svg .= '<span class="svg-fallback icon-' . esc_attr( $args['icon'] ) . '"></span>';
	}

	$svg .= '</svg>';

	return $svg;
}

require get_parent_theme_file_path( '/inc/nav-walker.php' );

if( function_exists('acf_add_options_page') ) {
	acf_add_options_page();
}
