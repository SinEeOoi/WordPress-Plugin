<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       #
 * @since      1.0.0
 *
 * @package    External_Users
 * @subpackage External_Users/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    External_Users
 * @subpackage External_Users/public
 * @author     sinee <ooishino98@gmail.com>
 */
class External_Users_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in External_Users_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The External_Users_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/external-users-public.css', array(), $this->version, 'all' );
		wp_enqueue_style( $this->plugin_name.'-bootsrap-css', plugin_dir_url( __FILE__ ) . 'css/bootstrap.min.css', array(), $this->version, 'all' );
	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in External_Users_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The External_Users_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/external-users-public.js', array( 'jquery' ), $this->version, false );
		wp_enqueue_script( $this->plugin_name.'-datatables-bootstrap', plugin_dir_url( __FILE__ ) . 'js/jquery.dataTables.min.js', array( 'jquery' ), $this->version, false );
        wp_enqueue_script( $this->plugin_name.'-bootstrap', plugin_dir_url( __FILE__ ) . 'js/bootstrap.min.js', array( 'jquery' ), $this->version, false );

	}

	/**
	 * Shortcode function to render wrapper for user list
	 *
	 * @since  1.0.0
	 */
	public function external_users_list_users_func( $atts ) { 
        return '<div id="ext-usr-list-wrapper"></div>';
	}
	
	/**
	 * Shortcode function to render wrapper for user detail
	 *
	 * @since  1.0.0
	 */
	public function external_users_list_users_detail_func( $atts ) { 
        return '<div id="ext-usr-detail"></div>';
	}
	
	/**
	 * Function to rewrite /users to load custom template
	 *
	 * @since  1.0.0
	 */
	public function users_rewrite() {
		add_rewrite_rule( '^users/?$', 'index.php?external_users_users=1', 'top' );
	}
	public function users_query_vars( $query_vars ) {
		$query_vars[] = 'external_users_users';
    	return $query_vars;
	}
	public function users_parse_request( &$wp ) {
		if ( array_key_exists( 'external_users_users', $wp->query_vars ) ) {
			include 'template/users.php';
			exit();
		}
		return;
	}

}
