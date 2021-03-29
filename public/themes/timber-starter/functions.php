<?php

/**
 * Initialisation de Timber
 */
$timber = new \Timber\Timber();


/**
 * Localisation des vues .twig
 */
Timber::$dirname = array( 'views' );


/**
 * Autoescape
 */
Timber::$autoescape = false;


/**
 * Custom Timber theme
 */
class Starter extends Timber\Site
{
    /**
     * Base WordPress & Custom
     */
    function __construct()
    {
        add_action( 'after_setup_theme', array( $this, 'theme_supports' ) );
        add_action( 'wp_enqueue_scripts', array( $this, 'custom_scripts') );
		add_action( 'init', array( $this, 'register_post_types' ) );
		add_action( 'init', array( $this, 'register_taxonomies' ) );
		add_action( 'init', array( $this, 'register_widgets' ) );
		add_action( 'init', array( $this, 'register_menus' ) );

        add_filter( 'timber/context', array( $this, 'add_to_global_context' ) );

		parent::__construct();
	}


    /**
     * Theme supports
     */
    public function theme_supports()
    {
        add_theme_support( 'menus' );
        add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );
        // add_theme_support( 'automatic-feed-links' ); //Flux RSS
        add_theme_support(
			'html5',
			array(
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
			)
		);
        add_theme_support(
			'post-formats',
			array(
				'aside',
				'image',
				'video',
				'quote',
				'link',
				'gallery',
				'audio',
			)
		);
    }


    /**
     * Css & JS
     */
    public function custom_scripts()
    {
        // jQuery
        wp_deregister_script( 'jquery' );
        wp_register_script( 'jquery', '//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js', array(), null, true );

        // Enqueue custom styles
        wp_enqueue_style( 'custom-styles', get_template_directory_uri() . '/assets/css/main.css', 1.0);
        wp_enqueue_script( 'custom-scripts', get_template_directory_uri() . '/assets/js/main.js', array( 'jquery' ), '1.0.0', true );
    }


    /**
     * CPT
     */
    public function register_post_types()
    {
		require( 'inc/custom-types.php' );
	}


    /**
     * Taxonomies
     */
	public function register_taxonomies()
    {
		require( 'inc/taxonomies.php' );
	}


    /**
     * Widget
     */
    public function register_widgets()
    {
        require( 'inc/widgets.php' );
	}


    /**
     * Menus
     */
    public function register_menus()
    {
        require( 'inc/menus.php' );
    }


    /**
     *  Ajoute les données au contexte global du site
     *
     * @param string $context context['this'] Being the Twig's {{ this }}
     */
    public function add_to_global_context( $context )
    {
        // Permet au menu de s'afficher sur toutes les pages du site
		$context['menu'] = new TimberMenu();

		// Permet d'accéder aux informations principales du site comme le titre ou la description du site
		$context['site'] = $this;
		return $context;
	}
}
new Starter();


/**
 * Désactive les emojis
 */
require_once 'inc/emoji.php';
