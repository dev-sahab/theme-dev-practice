<?php

namespace TechubCore\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (! defined('ABSPATH')) exit; // Exit if accessed directly

/**
 * Elementor Hello World
 *
 * Elementor widget for hello world.
 *
 * @since 1.0.0
 */
class Contact_Form extends Widget_Base
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
		return 'techub-contact-form';
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
		return __('TH Contact Form', 'techub-core');
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
		return 'eicon-heading th-widget-icon';
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
		return ['techub_widget_cat'];
	}

	/**
	 * Retrieve the list of scripts the widget depended on.
	 *
	 * Used to set scripts dependencies required to run the widget.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return array Widget scripts dependencies.
	 */
	public function get_script_depends()
	{
		return ['techub-core'];
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
	protected function register_controls()
	{
		$this->th_content_controls();
	}

	private function th_content_controls()
	{
		// Hero content control section
		$this->start_controls_section(
			'contact-form-section',
			[
				'label' => esc_html__('Contact Form', 'techub-core'),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		// heading control 
		$this->add_control(
			'techub_heading',
			[
				'label' => esc_html__('Heading', 'techub-core'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'rows' => 2,
				'default' => esc_html__('Add Your Heading Text Here', 'techub-core'),
				'placeholder' => esc_html__('Title goes here', 'techub-core'),
				'label_block' => true,
			]
		);
		// heading control 
		$this->add_control(
			'shortcode',
			[
				'label' => esc_html__('Shortcode', 'techub-core'),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'rows' => 2,
				'default' => esc_html__('Add Your Heading Text Here', 'techub-core'),
				'placeholder' => esc_html__('Title goes here', 'techub-core'),
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

	protected function render()
	{
		echo '<div class="tp-el-widget-container" >';
		$this->render_raw();
		echo '</div>';
	}
	protected function render_raw()
	{
		$settings = $this->get_settings_for_display();
?>

		<div id="contact-form" class="tp-contact-inner-page-wrapper">
			<div class="tp-contact-box tp-contact-inner-page-box mb-120 mt-0">
				<h3 class="tp-contact-title tp-contact-title-inner-page wow fadeInUp"><?php echo esc_html($settings['techub_heading']); ?></h3>
				<div class="tp-contact-form tp-contact-form-inner-page wow fadeInUp">
					<?php echo do_shortcode(techub_kses($settings['shortcode'])) ?>
				</div>
			</div>
		</div>

<?php }
}


$widgets_manager->register(new Contact_Form());
