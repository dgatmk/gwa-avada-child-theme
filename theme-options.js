<script>
jQuery( document ).ready( function ( $ ) {

/*  Lake Michigan page
 *    Show/hide containers on this page.
 */
    // Hide certain containers on page load
	$( ".lm-show-hide" ).hide();

    // 14 Alternative Facts - onclick of the trigger (image)
    // then show/hide container and switch the trigger image
	$( "#lm-14alt-trigger" ).click(function() {
	    $( "#lm-14-alternatives" ).slideToggle( "slow" );

	    if( $( this ).hasClass( "gwa-alt-more" ) ) {
	        $( this ).removeClass( "gwa-alt-more" );
	        $( this ).addClass( "gwa-alt-less" );
	    } else {
	        $( this ).removeClass( "gwa-alt-less" );
	        $( this ).addClass( "gwa-alt-more" );
	    }
	});

    // Let's Be Clear video - onclick of the trigger (image)
    // then show/hide container and switch the trigger image
	$( "#lm-lbc-trigger" ).click(function() {
	    $( "#lm-lets-be-clear" ).slideToggle( "slow" );

	    if( $( this ).hasClass( "gwa-lbc-more" ) ) {
	        $( this ).removeClass( "gwa-lbc-more" );
	        $( this ).addClass( "gwa-lbc-less" );
	    } else {
	        $( this ).removeClass( "gwa-lbc-less" );
	        $( this ).addClass( "gwa-lbc-more" );
	    }

		// Slider Revolution - restart the slider
		revapi1.revpause();
		revapi1.revshowslide(0);
		revapi1.revresume();
	});
/* END: Lake Michigan page */


/*  Partner Communities - Waukesha page
 *    Show/hide containers on this page.
 */
    // Hide certain containers on page load
	$( ".pcw-show-hide" ).hide();

    // Bill information - onclick of the trigger (image)
    // then show/hide container and switch the trigger image
	$( "#pcw-trigger" ).click(function() {
	    $( ".pcw-show-hide" ).slideToggle( "slow" );

	    if( $( this ).hasClass( "gwa-pcw-more" ) ) {
	        $( this ).removeClass( "gwa-pcw-more" );
	        $( this ).addClass( "gwa-pcw-less" );
	    } else {
	        $( this ).removeClass( "gwa-pcw-less" );
	        $( this ).addClass( "gwa-pcw-more" );
	    }
	});
/* END: Partner Communities - Waukesha page */

/*  Individual Posts - remove author link
 *    We don't want to link to the author pages. Nor
 *    do we want to show the author link which shows the
 *    login name. We're doing three things:
 *    1. Using this JavaScript to remove the links and replace it with the display name.
 *    2. Using Yoast SEO to disable author pages.
 *    3. Using a function in the 'functions.php' to rewrite the author link to the site's URL.
 */
	$( '.vcard .fn' ).html( function(){
          return  $( this ).find( 'a' ).text();
 	});
/* END: Individual Posts - remove author link */

});
</script>