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

function prozheiko_add_li_class_to_header_menu($classes, $item, $args) {
    if (isset($args->theme_location) && $args->theme_location === 'header-menu') {
        $classes[] = 'header__nav-item';
    }
    return $classes;
}
add_filter('nav_menu_css_class', 'prozheiko_add_li_class_to_header_menu', 10, 3);

function prozheiko_add_li_class_to_footer_menu($classes, $item, $args) {
    if (isset($args->theme_location) && $args->theme_location === 'footer-menu') {
        $classes[] = 'footer__menu-item';
    }
    return $classes;
}
add_filter('nav_menu_css_class', 'prozheiko_add_li_class_to_footer_menu', 10, 3);

function prozheiko_add_class_to_header_menu_links($atts, $item, $args) {
    if (isset($args->theme_location) && $args->theme_location === 'header-menu') {
        $atts['class'] = 'header__nav-link';
    }
    return $atts;
}
add_filter('nav_menu_link_attributes', 'prozheiko_add_class_to_header_menu_links', 10, 3);

function prozheiko_add_class_to_footer_menu_links($atts, $item, $args) {
    if (isset($args->theme_location) && $args->theme_location === 'footer-menu') {
        $atts['class'] = 'footer__menu-link';
    }
    return $atts;
}
add_filter('nav_menu_link_attributes', 'prozheiko_add_class_to_footer_menu_links', 10, 3);

function prozheiko_add_custom_class_to_services_menu($atts, $item, $args) {
    if ($args->theme_location === 'header-menu' && $item->title === 'Послуги та ціни') {
        $atts['class'] = 'header__nav-link header__nav-link--services';
    }
    return $atts;
}
add_filter('nav_menu_link_attributes', 'prozheiko_add_custom_class_to_services_menu', 10, 3);

function prozheiko_add_services_submenu($items, $args) {
    if ($args->theme_location === 'header-menu') {
        $menu_item_title = 'Послуги та ціни';
        $service_categories = get_terms([
            'taxonomy'   => 'service_category',
            'hide_empty' => true,
        ]);

        if (!empty($service_categories) && !is_wp_error($service_categories)) {
            $submenu_html = '<div class="header__nav-subnav"><div class="service-section__list">';

            foreach ($service_categories as $category) {
                $submenu_html .= '<div class="service-section__item">';
                $submenu_html .= '<h3 class="service-section__title">' . esc_html($category->name) . '</h3>';

                $service_posts = new WP_Query([
                    'post_type'      => 'service',
                    'posts_per_page' => -1,
                    'tax_query'      => [
                        [
                            'taxonomy' => 'service_category',
                            'field'    => 'term_id',
                            'terms'    => $category->term_id,
                        ],
                    ],
                ]);

                if ($service_posts->have_posts()) {
                    $submenu_html .= '<ul class="service-section__details">';
                    while ($service_posts->have_posts()) {
                        $service_posts->the_post();
                        $submenu_html .= '<li class="service-section__detail">';
                        $submenu_html .= '<a href="' . get_permalink() . '" class="service-section__link">' . get_the_title() . '</a>';
                        $submenu_html .= '</li>';
                    }
                    $submenu_html .= '</ul>';
                }
                wp_reset_postdata();

                $submenu_html .= '</div>';
            }

            $submenu_html .= '</div></div>';

            $items = str_replace(
                '<a href="#" class="header__nav-link header__nav-link--services">' . $menu_item_title . '</a>',
                '<a href="#" class="header__nav-link header__nav-link--services">' . $menu_item_title . '</a>' . $submenu_html,
                $items
            );
        }
    }

    return $items;
}
add_filter('wp_nav_menu_items', 'prozheiko_add_services_submenu', 10, 2);


