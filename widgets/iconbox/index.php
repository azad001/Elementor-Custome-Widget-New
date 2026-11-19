<?php
namespace UTSADDON\Widgets;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\utils;

defined( 'ABSPATH' ) || die();

class UTS_Iconbox extends Widget_Base {

	public function get_name() {
		return 'uts_ibox';
	}

	public function get_title() {
		return __( 'UTS Iconbox', 'elementor-awesomesauce' );
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
            'tmpl',
            [
                'label' => esc_html__( 'Template', 'the-pack-addon' ),
                'type' => Controls_Manager::SELECT2,
                'label_block' => 'true',
                'options' => [
                    'style-1' => esc_html__( 'Style 1', 'the-pack-addon' ),
                    'style-2' => esc_html__( 'Style 2', 'the-pack-addon' ),
					'style-3' => esc_html__( 'Style 3', 'the-pack-addon' ),
					'style-4' => esc_html__( 'Style 4', 'the-pack-addon' ),
					'style-5' => esc_html__( 'Style 5', 'the-pack-addon' ),
					'style-6' => esc_html__( 'Style 6', 'the-pack-addon' ),
                ],
            ]
        );

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
            'svg',
            [
                'type' => Controls_Manager::TEXTAREA,
                'label' => esc_html__('SVG icon code', 'the-pack-addon'),
                'label_block' => true,
            ]
        );

		$repeater->add_control(
            'title',
            [
                'type' => Controls_Manager::TEXT,
                'label' => esc_html__('Title', 'the-pack-addon'),
                'label_block' => true,
            ]
        );

		$repeater->add_control(
            'desc',
            [
                'type' => Controls_Manager::TEXTAREA,
                'label' => esc_html__('Description', 'the-pack-addon'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'tabs',
            [
                'type' => Controls_Manager::REPEATER,
                'prevent_empty' => false,
                'fields' => $repeater->get_controls(),
                'title_field' => '{{{ title }}}',
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
		require dirname(__FILE__) . '/' . $settings['tmpl'] . '.php';
	}

}
