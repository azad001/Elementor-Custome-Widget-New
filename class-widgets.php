<?php
namespace UTSADDON;

// Security Note: Blocks direct access to the plugin PHP files.
defined( 'ABSPATH' ) || die();

/**
 * Class Plugin
 *
 * Main Plugin class
 *
 * @since 1.0.0
 */
class Widgets {

	/**
	 * Instance
	 *
	 * @since 1.0.0
	 * @access private
	 * @static
	 *
	 * @var Plugin The single instance of the class.
	 */
	private static $instance = null;

	/**
	 * Instance
	 *
	 * Ensures only one instance of the class is loaded or can be loaded.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return Plugin An instance of the class.
	 */
	public static function instance() {
		if ( is_null( self::$instance ) ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	/**
	 * Include Widgets files
	 *
	 * Load widgets files
	 *
	 * @since 1.0.0
	 * @access private
	 */
	private function include_widgets_files() {
		require_once 'widgets/course-grid/index.php';
		require_once 'widgets/text/index.php';
		require_once 'widgets/video-pop/index.php';
		require_once 'widgets/iconbox/index.php';
		require_once 'widgets/button/index.php';
		require_once 'widgets/testimonial/index.php';
		require_once 'widgets/list/index.php';
		require_once 'widgets/bundle-text/index.php';
		require_once 'widgets/course-detail/index.php';
		require_once 'widgets/client-logo/index.php';
	}

	/**
	 * Register Widgets
	 *
	 * Register new Elementor widgets.
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function register_widgets() {
		// It's now safe to include Widgets files.
		$this->include_widgets_files();

		// Register the plugin widget classes. 
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\LIO_Course_Grid() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\UTS_Text() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\UTS_Video_Pop() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\UTS_Iconbox() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\UTS_Button() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\UTS_Testimonial() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\UTS_List() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\UTS_Bundle_Text() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Lior_Course_Detail() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\UTS_Client() );
	}

	/**
	 *  Plugin class constructor
	 *
	 * Register plugin action hooks and filters
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function __construct() {
		// Register the widgets.
		add_action( 'elementor/widgets/widgets_registered', array( $this, 'register_widgets' ) );
	}
}

// Instantiate the Widgets class.
Widgets::instance();
