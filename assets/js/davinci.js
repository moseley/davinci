
// Debug overflow adding horizontal scrollbar

/*var docWidth = document.documentElement.offsetWidth;

[].forEach.call(
  document.querySelectorAll('*'),
  function(el) {
    if (el.offsetWidth > docWidth) {
      console.log(el);
    }
  }
);*/

jQuery('.slick').slick();

// Bootstrap Hover Dropdown Menu
jQuery('body').on('mouseenter mouseleave','.dropdown',function(e){
  var _d=jQuery(e.target).closest('.dropdown');_d.addClass('show');
  setTimeout(function(){
    _d[_d.is(':hover')?'addClass':'removeClass']('show');
    jQuery('[data-toggle="dropdown"]', _d).attr('aria-expanded',_d.is(':hover'));
  },300);
});

/*!
 * Bootstrap 4 multi dropdown navbar ( https://bootstrapthemes.co/demo/resource/bootstrap-4-multi-dropdown-navbar/ )
 * Copyright 2017.
 * Licensed under the GPL license
 */


jQuery( document ).ready( function ($) {
    $( '.dropdown-menu a.dropdown-toggle' ).on( 'click', function () {
        var $el = $( this );
        var $parent = $( this ).offsetParent( ".dropdown-menu" );
        if ( !$( this ).next().hasClass( 'show' ) ) {
            $( this ).parents( '.dropdown-menu' ).first().find( '.show' ).removeClass( "show" );
        }
        var $subMenu = $( this ).next( ".dropdown-menu" );
        $subMenu.toggleClass( 'show' );

        $( this ).parent( "li" ).toggleClass( 'show' );

        $( this ).parents( 'li.nav-item.dropdown.show' ).on( 'hidden.bs.dropdown', function () {
            $( '.dropdown-menu .show' ).removeClass( "show" );
        } );

         if ( !$parent.parent().hasClass( 'navbar-nav' ) ) {
            $el.next().css( { "top": $el[0].offsetTop, "left": $parent.outerWidth() - 4 } );
        }

        return false;
    } );

    $('#contact_form').submit( function( event ) {
      event.preventDefault();
      $.post(
    		params.ajax_url,
    		{
    			action: 'contact_form_ajax',
    			data: $('#contact_form').serialize()
    		},
    		function(response){
    			if (response) {
            $('#contact_response').html('<h2>Form submitted successfully.</h2>');
          }
    		}
    	);
    });

    $('#bid_form').submit( function( event ) {
      event.preventDefault();
      $.post(
    		params.ajax_url,
    		{
    			action: 'bid_form_ajax',
    			data: $('#bid_form').serialize()
    		},
    		function(response){
    			if (response) {
            $('#bid_response').html('<h2>Form submitted successfully.</h2>');
          }
    		}
    	);
    });
} );
