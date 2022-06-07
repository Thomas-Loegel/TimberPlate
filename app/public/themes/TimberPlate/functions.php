<?php

/**
 * Pour les install/update de plugin via le back-office
 */
define('FS_METHOD', 'direct');


/**
 * Initialisation de Timber
 */
$timber = new Timber\Timber();


/**
 * Localisation des vues .twig
 */
Timber::$dirname = [
    'views'
];


/**
 * Autoescape
 */
Timber::$autoescape = false;


/**
 * Kiwiplate
 */
class Kiwiplate extends TimberSite
{
    /**
     * __construct
     */
    public function __construct()
    {
        // Action
        add_action('init', [$this, 'register_taxonomy']);
        add_action('init', [$this, 'register_post_types']);
        add_action('wp_enqueue_scripts', [$this, 'register_custom_styles']);
        add_action('wp_enqueue_scripts', [$this, 'register_custom_scripts']);
        add_action('after_setup_theme', [$this, 'register_custom_theme_support']);

        // Filter
        add_filter('timber_context', [$this, 'add_to_context']);

        parent::__construct();
    }


    /**
     * register_taxonomy
     *
     * @return void
     */
    public function register_taxonomy()
    {
    }


    /**
     * register_post_types
     *
     * @return void
     */
    public function register_post_types()
    {
    }


    /**
     * register_custom_styles
     *
     * @return void
     */
    public function register_custom_styles()
    {
        // wp_register_style('custom_styles', get_stylesheet_directory_uri() . '/assets/styles/app.css');
        // wp_enqueue_style('custom_styles');
    }


    /**
     * register_custom_scripts
     *
     * @return void
     */
    public function register_custom_scripts()
    {
        wp_deregister_script('jquery');
        // wp_register_script('jquery', 'https://code.jquery.com/jquery-3.6.0.min.js');
        // wp_enqueue_script('jquery');

        // wp_register_script('custom_scripts', get_stylesheet_directory_uri() . '/assets/scripts/app.js');
    }


    /**
     * register_custom_theme
     *
     * @return void
     *
     * @link https://developer.wordpress.org/reference/functions/add_theme_support
     */
    public function register_custom_theme_support()
    {
        // Menu
        add_theme_support('menus');

        // Menu location
        register_nav_menus([
            'header' => __("header", "textdomain"),
            'footer' => __("footer", "textdomain")
        ]);


        // Custom logo
        add_theme_support('custom-logo');

        // Translation
        load_theme_textdomain("textdomain", get_template_directory() . '/lang');

        // Tilte
        add_theme_support('title-tag');

        // Featured image
        // https://raidboxes.io/fr/blog/wordpress/wordpress-images-sizes/
        add_theme_support('post-thumbnails');


        //
        add_theme_support('html5', [
            'comment-list',
            'comment-form',
            'search-form',
            'gallery',
            'caption',
            'style',
            'script'
        ]);

        //
        add_theme_support('post-formats', [
            'aside',
            'image',
            'video',
            'quote',
            'link',
            'gallery',
            'audio',
        ]);

        // Image quality for thumbnails to be at the highest ratio possible
        add_filter('jpeg_quality', function () {
            return 100;
        }, 10, 2);

        // add_post_type_support('page', 'excerpt');

        // Remove patterns gutenberg
        // remove_theme_support('core-block-patterns');
        // remove_theme_support('core-embed');
    }


    /**
     * add_to_context
     *
     * @param mixed $context
     * @return void
     */
    public function add_to_context($context)
    {
        $custom_logo_url = wp_get_attachment_image_url(get_theme_mod('custom_logo'), 'full');
        $context['custom_logo_url'] = $custom_logo_url;
        $context['header']          = new Timber\Menu('Header', ['depth' => 1]);
        $context['footer']          = new Timber\Menu('Footer');
        $context['site']            = $this;

        return $context;
    }
}
new Kiwiplate();
