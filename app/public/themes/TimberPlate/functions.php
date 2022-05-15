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
        add_action('after_setup_theme', [$this, 'theme_supports']);
        add_action('wp_enqueue_scripts', [$this, 'register_custom_styles']);
        add_action('wp_enqueue_scripts', [$this, 'register_custom_scripts']);

        // Filter
        add_filter('timber_context', [$this, 'add_to_context']);

        parent::__construct();
    }


    /**
     * theme_supports
     *
     * @return void
     */
    public function theme_supports()
    {
        // Custom logo
        // https://developer.wordpress.org/reference/functions/add_theme_support/
        add_theme_support('custom-logo');

        // Add theme support for Translation
        load_theme_textdomain('textdomain', get_template_directory() . '/language');

        add_theme_support('menus');

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus([
            'header' => esc_html__('Header', 'textdomain'),
            'footer' => esc_html__('footer', 'textdomain')
        ]);

        add_theme_support('title-tag');

        // https://raidboxes.io/fr/blog/wordpress/wordpress-images-sizes/
        add_theme_support('post-thumbnails');

        add_theme_support('html5', [
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ]);

        add_theme_support('post-formats', [
            'aside',
            'image',
            'video',
            'quote',
            'link',
            'gallery',
            'audio',
        ]);

        add_filter('jpeg_quality', function () {
            return 100;
        }, 10, 2);

        add_post_type_support('page', 'excerpt');

        // Remove patterns gutenberg
        // remove_theme_support('core-block-patterns');
        // remove_theme_support('core-embed');
    }


    /**
     * add_to_context
     *
     * @param  mixed $context
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
     * register_post_types
     *
     * @return void
     */
    public function register_post_types()
    {
    }


    /**
     * register_taxonomy
     *
     * @return void
     */
    public function register_taxonomy()
    {
    }
}
new Kiwiplate();
