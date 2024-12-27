<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package prozheiko
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function prozheiko_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'prozheiko_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function prozheiko_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'prozheiko_pingback_header' );

/**
 * Adds SVG to the list of files allowed for uploading.
 */
function prozheiko_svg_upload_allow( $mimes ) {
	$mimes['svg']  = 'image/svg+xml';
	return $mimes;
}
add_filter( 'upload_mimes', 'prozheiko_svg_upload_allow' );


/**
 * Fix MIME type for SVG files.
 */
function prozheiko_fix_svg_mime_type( $data, $file, $filename, $mimes, $real_mime = '' ) {
	if( version_compare( $GLOBALS['wp_version'], '5.1.0', '>=' ) ) {
		$dosvg = in_array( $real_mime, [ 'image/svg', 'image/svg+xml' ] );
	}
	else {
		$dosvg = ( '.svg' === strtolower( substr( $filename, -4 ) ) );
	}

	if( $dosvg ) {
		if( current_user_can('manage_options') ) {
			$data['ext']  = 'svg';
			$data['type'] = 'image/svg+xml';
		}
		else {
			$data['ext']  = false;
			$data['type'] = false;
		}
	}

	return $data;
}
add_filter( 'wp_check_filetype_and_ext', 'prozheiko_fix_svg_mime_type', 10, 5 );

/* Disable auto tag <p> and line breaks in contact form 7 */
add_filter('wpcf7_autop_or_not', '__return_false');

/* Change submit button in contact form 7 */
add_filter('wpcf7_form_elements', function($content) {
    $new_button = '<button type="submit" class="button">
                        <svg class="arrow-right arrow-right--left" aria-hidden="true">
                            <use href="/wp-content/themes/prozheiko/assets/icons/icons.svg#arrow-right"></use>
                        </svg>
                        <span class="button-text">ЗАПИСАТИСЬ НА ВІЗИТ</span>
                        <svg class="arrow-right" aria-hidden="true">
                            <use href="/wp-content/themes/prozheiko/assets/icons/icons.svg#arrow-right"></use>
                        </svg>
                </button>';
    
    $pattern = '/<input[^>]*type=["\']submit[\'"](.*?)>/';
    $content = preg_replace($pattern, $new_button, $content);
    
    return $content;
});
