<?php
namespace UTSADDON\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

// Security Note: Blocks direct access to the plugin PHP files.
defined( 'ABSPATH' ) || die();

class LIO_Course_Grid extends Widget_Base {

	public function get_name() {
		return 'lio-c-grid';
	}

	public function get_title() {
		return __( 'Course grid', 'elementor-awesomesauce' );
	}

	public function get_icon() {
		return 'fa fa-pencil';
	}

	public function get_categories() {
		return array( 'general' );
	}

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
                ],
				'default' =>'style-1'
            ]
        );
 
		$this->add_control(
            'exclude',
            [
                'label' => esc_html__( 'Exclude posts', 'the-pack-addon' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => 'true',
            ]
        );

        $this->add_control(
            'posts',
            [
                'label' => esc_html__('Posts Per Page', 'the-pack-addon'),
                'type' => Controls_Manager::SLIDER,
            ]
        );

		$this->add_control(
            'show_more',
            [
                'label' => esc_html__( 'Show more button', 'the-pack-addon' ),
                'type' => Controls_Manager::SWITCHER,
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

	protected function render() {

		$settings = $this->get_settings_for_display();
		require dirname(__FILE__) . '/' . $settings['tmpl'] . '.php';
	}
	
}
