<?php
namespace UTSADDON\Widgets;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\utils;

defined( 'ABSPATH' ) || die();

class UTS_Testimonial extends Widget_Base {

	public function get_name() {
		return 'uts_testim';
	}

	public function get_title() {
		return __( 'UTS Testimonial', 'elementor-awesomesauce' );
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

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
            'quote',
            [
                'type' => Controls_Manager::TEXTAREA,
                'label' => esc_html__('Quote', 'the-pack-addon'),
                'label_block' => true,
            ]
        );

		$repeater->add_control(
            'name',
            [
                'type' => Controls_Manager::TEXT,
                'label' => esc_html__('Name', 'the-pack-addon'),
                'label_block' => true,
            ]
        );

		$repeater->add_control(
            'pos',
            [
                'type' => Controls_Manager::TEXT,
                'label' => esc_html__('Position', 'the-pack-addon'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'tabs',
            [
                'type' => Controls_Manager::REPEATER,
                'prevent_empty' => false,
                'fields' => $repeater->get_controls(),
                'title_field' => '{{{ name }}}',
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
