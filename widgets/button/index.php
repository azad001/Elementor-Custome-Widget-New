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
class UTS_Button extends Widget_Base {

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
		return 'uts_btn';
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
		return __( 'UTS Button', 'elementor-awesomesauce' );
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
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );

		$this->add_control(
            'link',
            [
                'label' => esc_html__('URL', 'thepack'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );

		$this->add_control(
            'elink',
            [
                'label' => esc_html__('External URL', 'thepack'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );

		$this->add_control(
            'style',
            [
                'label' => esc_html__( 'Button style', 'the-pack-addon' ),
                'type' => Controls_Manager::SELECT2,
                'label_block' => 'true',
                'options' => [
                    'style-1' => esc_html__( 'Style 1', 'the-pack-addon' ),
                    'style-2' => esc_html__( 'Style 2', 'the-pack-addon' ),
					'style-3' => esc_html__( 'Style 3', 'the-pack-addon' ),
					'style-4' => esc_html__( 'Style 4', 'the-pack-addon' ),
                ],
            ]
        );

		$this->add_control(
            'center',
            [
                'label' => esc_html__('Center button', 'thepack'),
                'type' => Controls_Manager::SWITCHER,
                'return_value' => 'center-txt',
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
