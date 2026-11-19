<?php
namespace UTSADDON\Widgets;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;

// Security Note: Blocks direct access to the plugin PHP files.
defined( 'ABSPATH' ) || die();

/**
 *  
 * @since 1.0.0
 */
class Lior_Course_Detail extends Widget_Base
{
    /**
     * Retrieve the widget name.
     *
     * @since 1.0.0
     *
     * @access public
     *
     * @return string Widget name.
     */
    public function get_name()
    {
        return 'lio-course-det';
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
    public function get_title()
    {
        return __( 'Course detail', 'elementor-awesomesauce' );
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
    public function get_icon()
    {
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
    public function get_categories()
    {
        return ['general'];
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
    protected function _register_controls()
    {
        $this->start_controls_section(
			'section_content',
			[
			    'label' => __( 'Content', 'elementor-awesomesauce' ),
			]
		);

        $this->add_control(
            'crsdtlspgid',
            [
                'type' => Controls_Manager::SELECT2,
                'options' => $this->select_course(),
                'label' => esc_html__('Select Course', 'the-pack-addon'),
                'label_block' => true,
            ]
        );

        $this->end_controls_section();

    }

	protected function render() {

		$settings = $this->get_settings();
		require dirname(__FILE__) . '/view.php';
	}	

    private function select_course()
    {
        $args = [
            'numberposts' => -1,
            'post_type' => 'course' 
        ];
    
        $posts = get_posts($args);
        $list = [];
        foreach ($posts as $cpost) {
            $list[$cpost->ID] = $cpost->post_title;
        }
    
        return $list;
    }

}