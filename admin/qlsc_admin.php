<?php
namespace NMole\QLSC;

use NMole\QLSC\Helpers;

/**

 * @package qlsc
 * @subpackage qlsc/admin
 * @author Nicholas Mole <nickmole@xzito.com>
 */ 
class qlsc_admin {
  /**
   * @since    1.0.0
   * @access   private
   * @var      string    $plugin_name    The name  of this plugin.
   */
  private $plugin_name = 'qlsc'; 
  /**
   * The version of this plugin.
   *
   * @since    1.0.0
   * @access   private
   * @var      string    $version    The current version of this plugin.
   */
  private $version = '1.1.0'; 
  /**
   * Initialize the class and set its properties.
   *
   * @since    1.0.0
   */

	/**
	 * 
	 * Display quick links admin page
	 * 
	 * @return template for admin page
	 */
	function quick_links_sc_index() {

		if ( !current_user_can( 'manage_options' ) )  {
			wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
		}

		$qlsc_loaded_options = get_option('plugin_nmole_qlsc_options');

		$includes = Helpers::get_template_path('admin/settings/settings.php', 'includes');

		include $includes;

		$template = Helpers::get_template_path('admin/settings/settings.php', 'templates');

		include $template;

	}

	/**
	 * 
	 * Display quick links admin edit page
	 * 
	 * @return template for admin edit page
	 */
	function quick_links_sc_edit_page() {

		if ( !current_user_can( 'manage_options' ) )  {
			wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
		}

		$qlsc_loaded_options = get_option('plugin_nmole_qlsc_options');

		$includes = Helpers::get_template_path('admin/edit/edit.php', 'includes');

		include $includes;

		$template = Helpers::get_template_path('admin/edit/edit.php', 'templates');

		include $template;
		
	}

	/**
	 * 
	 * Enqueue Scripts for admin page
	 * 
	 */
	function enqueue_admin_js() {
		wp_enqueue_script( 
			'my-script',
			plugins_url('/admin/js/settings.js', dirname(__FILE__)) 
		);
	}
	
	/**
	 * 
	 * Use wordpress hooks to add content to the 
	 * admin pages 
	 * 
	 * @return functions quick_links_sc_edit_page, quick_links_sc_index
	 */
	function admin_settings_page() {
		add_menu_page( 
			'Quick Links SC - Links Page',
			'Quick Links SC',
			'manage_options',
			'quick_links_sc_index',
			array($this, 'quick_links_sc_index') 
		);
		add_submenu_page( 
			'quick_links_sc_index',
			'Quick Links SC',
			'Add New',
			'manage_options',
			'quick_links_sc_edit_page',
			array($this, 'quick_links_sc_edit_page') 
		);

		add_action( 
			'admin_enqueue_scripts',
			array($this, 'enqueue_admin_js')
		);
	}

	/**
	 * 
	 * Saves the post meta data for the quick 
	 * links when the page is saved
	 * 
	 * @param object $post_id post id for the current page generated by wordpress 
	 */
	function save_post_meta_data($post_id) {

		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
            return;

        if ( ! current_user_can( 'edit_post', $post_id ) )
            return;

        $keys_to_save = array(
					'qlsc_quick_link_title',
					'qlsc_quick_link_contact_number',
					'qlsc_quick_link_link_0',
					'qlsc_quick_link_link_1',
					'qlsc_quick_link_link_2',
					'qlsc_quick_link_link_3',
				);

				foreach ($keys_to_save as $key ) {
					if ( isset($_POST[ $key ]) ) {
						update_post_meta( $post_id, $key, $_POST[ $key ] );
					}
				}
       


	}

	/**
	 * 
	 * Display meta boxes on admin page
	 * 
	 * @return template for meta boxes
	 */
	function quick_links_sc_index_meta_box() {

		$includes = Helpers::get_template_path('admin/post/post.php', 'includes');

		include_once $includes;

		$template = Helpers::get_template_path('admin/post/post.php', 'templates');

		include_once $template;

	}

	/**
	 * 
	 * Action using wordpress add_meta_box for
	 * the post/page meta boxes to be added
	 * 
	 * @return function quick_links_sc_index_meta_box
	 */
	function post_page_meta_box() {

		$content_page_type = array( 'post', 'page' );
	
		foreach ( $content_page_type as $screen ) {
			add_meta_box(
						'quick_links_sc_index_meta_box', // $id
						'Quick Links Section', // $title
						array($this, 'quick_links_sc_index_meta_box'), // $callback
						$screen, // $page
						'normal', // $context
						'high' // $priority
			); 
		}

		wp_enqueue_script( 
			'qlsc_post',
			plugins_url('/admin/js/post.js', dirname(__FILE__)) 
		);
		
	}

	/**
	 * 
	 * Display content on front page
	 * 
	 * @return template for front end display
	 */
	function display_on_front_page() {

		$includes_content = Helpers::get_template_path('user/post/post.php', 'includes');

		include $includes_content;

		$template_content = Helpers::get_template_path('user/post/post.php', 'templates');

		include $template_content;

		wp_enqueue_style( 
			'qlsc_front_page_style',
			plugins_url('/styles/qlsc_front_page_style.css', dirname(__FILE__)) 
		);
	}
	
  public function __construct() {

		/**
		 * Add index view page for 'Quick Links'
		 */
		add_action( 'admin_menu', array($this, 'admin_settings_page' ));

		/**
		 * Add Meta Boxes for posts pages  
		 */
		add_action( 'add_meta_boxes', array($this, 'post_page_meta_box' ));

		/**
		 * On Post save page
		 */
		add_action( 'save_post',  array($this, 'save_post_meta_data') );

		/**
		 * On Front end post page with the 'quick-links-sc' shortcode
		 */
		add_shortcode( 'quick-links-sc', array($this, 'display_on_front_page') );
  }
}