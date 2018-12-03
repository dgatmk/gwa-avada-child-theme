<script>
jQuery(document).ready(function ($) {

	/*  Lake Michigan page
	 *    Show/hide containers on this page.
	 */

	/* Variables needed to handle the re-sizing of the colum heights.
	 *   We basically need to match the heights of the two columns.
	 *   When we hide the rows - the script in Avada which sets the heights
	 *   equal and centers the text vertically won't work. So like the
	 *   good little developers we are - we handle it ourselves.
	 */	
	var colArray = [ "#lm-cols-1", "#lm-cols-2", "#lm-cols-3", "#lm-cols-4", "#lm-cols-5" ];
	var finalHeight = 0;
	var tempHeight = 0;
	var ourColumns = '';

	// Hide certain containers on page load
	$(".lm-show-hide").hide();

	// 14 Alternative Facts - onclick of the trigger (image)
	// then show/hide container and switch the trigger image
	$("#lm-14alt-trigger").click(function () {
		$(".lm-14-alternatives").slideToggle("slow");

		// This adds/removes classes in order to change the trigger image.
		if ($(this).hasClass("gwa-alt-more")) {
			$(this).removeClass("gwa-alt-more");
			$(this).addClass("gwa-alt-less");
		} else {
			$(this).removeClass("gwa-alt-less");
			$(this).addClass("gwa-alt-more");
		}

		// This is out loop to handle setting the column heights the same.
		$.each(colArray, function (index, value) {  // Loop through our array (var set at top)
			ourColumns = value + " .fusion-column-content-centered";
			tempHeight = 0;
			$(ourColumns).each(function () {  // Loop through our two columns
				tempHeight = $(this).height();
				if (finalHeight <= 0 || tempHeight > finalHeight) {
					finalHeight = tempHeight;
				}
			});
			$(ourColumns).each(function () {
				$(this).height(finalHeight); // Set the height
			});
		});
	});
	// Let's Be Clear video - onclick of the trigger (image)
	// then show/hide container and switch the trigger image
	$("#lm-lbc-trigger").click(function () {
		$("#lm-lets-be-clear").slideToggle("slow");

		if ($(this).hasClass("gwa-lbc-more")) {
			$(this).removeClass("gwa-lbc-more");
			$(this).addClass("gwa-lbc-less");
		} else {
			$(this).removeClass("gwa-lbc-less");
			$(this).addClass("gwa-lbc-more");
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
	$(".pcw-show-hide").hide();

	// Bill information - onclick of the trigger (image)
	// then show/hide container and switch the trigger image
	$("#pcw-trigger").click(function () {
		$(".pcw-show-hide").slideToggle("slow");

		if ($(this).hasClass("gwa-pcw-more")) {
			$(this).removeClass("gwa-pcw-more");
			$(this).addClass("gwa-pcw-less");
		} else {
			$(this).removeClass("gwa-pcw-less");
			$(this).addClass("gwa-pcw-more");
		}
		
		// Need to reset two of the columns to equal height in
		// order to vertically center the content. 
		pcwColOne = $(".gwa-pcw-col1").height();
		console.log(pcwColOne);
		pcwColTwo = $(".gwa-pcw-col2").height();
		console.log(pcwColOne);
		if( pcwColOne > pcwColTwo ){
		    $(".gwa-pcw-cols .fusion-column-content-centered").height(pcwColOne);
		}else{
		    $(".gwa-pcw-cols .fusion-column-content-centered").height(pcwColTwo);
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
	$('.vcard .fn').html(function () {
		return $(this).find('a').text();
	});
	/* END: Individual Posts - remove author link */

});
</script>