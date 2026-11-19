<?php
namespace UTSADDON\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\utils;

// Security Note: Blocks direct access to the plugin PHP files.
defined( 'ABSPATH' ) || die();

/**
 * Awesomesauce widget class.
 *
 * @since 1.0.0
 */
class UTS_Text extends Widget_Base {

	/**
	 * Retrieve the widget name.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'uts_text';
	}

	/**
	 * Retrieve the widget title.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'UTS Text', 'elementor-awesomesauce' );
	}

	/**
	 * Retrieve the widget icon.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'fa fa-pencil';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	 *
	 * Used to determine where to display the widget in the editor.
	 *
	 * Note that currently Elementor supports only one category.
	 * When multiple categories passed, Elementor uses the first one.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return array( 'general' );
	}

	/**
	 * Register the widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function _register_controls() {
		$this->start_controls_section(
			'section_content',
			array(
				'label' => __( 'Content', 'elementor-awesomesauce' ),
			)
		);

		$this->add_control(
            'txt',
            [
                'label' => esc_html__('Text', 'thepack'),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
            ]
        );

		$this->add_control(
            'tag',
            [
                'label' => esc_html__( 'Tag', 'the-pack-addon' ),
                'type' => Controls_Manager::SELECT2,
                'label_block' => 'true',
                'options' => [
                    'h2' => esc_html__( 'H2', 'the-pack-addon' ),
                    'p' => esc_html__( 'p', 'the-pack-addon' ),
					'h3' => esc_html__( 'H3', 'the-pack-addon' ),
                ],
            ]
        );

		$this->add_control(
            'cls',
            [
                'label' => esc_html__( 'Class', 'the-pack-addon' ),
                'type' => Controls_Manager::SELECT2,
                'label_block' => 'true',
                'options' => [
					'' => esc_html__( 'Default', 'the-pack-addon' ),
                    'big-theme' => esc_html__( 'Big theme', 'the-pack-addon' ),
					'big-theme-white' => esc_html__( 'Big theme white', 'the-pack-addon' ),
					'big-p' => esc_html__( 'Big paragraph', 'the-pack-addon' ),
					'big-p-white' => esc_html__( 'Big paragraph white', 'the-pack-addon' ),
					'medium-black' => esc_html__( 'Medium black', 'the-pack-addon' ),
					'academyh3' => esc_html__( 'Academy heading', 'the-pack-addon' ),
					'academyblack' => esc_html__( 'Academy black', 'the-pack-addon' ),
					'medium-white' => esc_html__( 'Medium white', 'the-pack-addon' ),
					'course-title' => esc_html__( 'Course title', 'the-pack-addon' ),
					'course-sub-title' => esc_html__( 'Course sub title', 'the-pack-addon' ),
					'small-white' => esc_html__( 'Small white text', 'the-pack-addon' ),
					'hero-title' => esc_html__( 'Hero title', 'the-pack-addon' ),
					'hero-sub-title' => esc_html__( 'Hero sub title', 'the-pack-addon' ),
                ],
            ]
        );


		$this->add_control(
            'center',
            [
                'label' => esc_html__('Center text', 'the-pack-addon'),
                'type' => Controls_Manager::SWITCHER,
                'return_value' => 'text-center',
            ]
        );

		$this->end_controls_section();

		$this->start_controls_section(
            'section_gstyle',
            [
                'label' => esc_html__('Style', 'thepack'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

		$this->end_controls_section();
	}

	/**
	 * Render the widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function render() {

		$settings = $this->get_settings_for_display();
		require dirname(__FILE__) . '/view.php';
	}

}
