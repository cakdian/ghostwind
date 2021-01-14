<?php

/**
 * ghostwind's functions and definitions
 *
 * @package ghostwind
 * @since ghostwind 1.0
 */

if (!function_exists('ghostwind_setup')) :
    /**
     * Sets up theme defaults and registers support for various WordPress features
     *
     *  It is important to set up these functions before the init hook so that none of these
     *  features are lost.
     *
     *  @since ghostwind 1.0
     */

    function ghostwind_setup()
    {
        /**
         * Make theme available for translation.
         * Translations can be placed in the /languages/ directory.
         */
        load_theme_textdomain('ghostwind', get_template_directory() . '/languages');

        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');

        /*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
        add_theme_support('title-tag');

        /*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
        add_theme_support('post-thumbnails');
        // set_post_thumbnail_size( 1568, 9999 );

        /**
         * Enable support for the following post formats:
         * aside, gallery, quote, image, and video
         */
        add_theme_support('post-formats', array('aside', 'gallery', 'quote', 'image', 'video'));


        function register_my_menu()
        {
            register_nav_menu('header-menu', __('Header Menu'));
        }
        add_action('init', 'register_my_menu');


        function add_additional_class_on_li($classes, $item, $args)
        {
            if (isset($args->add_li_class)) {
                $classes[] = $args->add_li_class;
            }
            return $classes;
        }
        add_filter('nav_menu_css_class', 'add_additional_class_on_li', 1, 3);
    }
endif;  // ghostwind_setup
add_action('after_setup_theme', 'ghostwind_setup');
