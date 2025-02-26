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
class Techub_Button extends Widget_Base
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
		return 'techub-button';
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
		return __('TH Button', 'techub-core');
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
		return 'eicon-dual-button th-widget-icon';
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
		$this->th_style_controls();
	}

	private function th_content_controls()
	{
		// Hero content control section
		$this->start_controls_section(
			'techub_button',
			[
				'label' => esc_html__('Button', 'techub-core'),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		// button text control 
		$this->add_control(
			'techub_btn',
			[
				'label' => esc_html__('Text', 'techub-core'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__('Click here', 'techub-core'),
				'placeholder' => esc_html__('Click here', 'techub-core'),
				'dynamic' => [
					'active' => true,
				],
			]
		);
		// button link control
		$this->add_control(
			'techub_btn_link',
			[
				'label' => esc_html__('Link', 'textdomain'),
				'type' => \Elementor\Controls_Manager::URL,
				'options' => ['url', 'is_external', 'nofollow'],
				'default' => [
					'url' => '#',
					'is_external' => false,
					'nofollow' => false,
				],
				'label_block' => true,
				'dynamic' => [
					'active' => true,
				],
			]
		);
		// button id control
		$this->add_control(
			'techub_btn_id',
			[
				'label' => esc_html__('Button ID', 'techub-core'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__('', 'techub-core'),
				'placeholder' => esc_html__('Button ID', 'techub-core'),
				'dynamic' => [
					'active' => true,
				],
				'description' => 'Please make sure the ID is unique and not used elsewhere on the page this form is displayed. This field allows A-z 0-9 & underscore chars without spaces.',
			]
		);


		$this->end_controls_section();
	}
	private function th_style_controls()
	{
		// button style section
		$this->start_controls_section(
			'button_style_section',
			[
				'label' => esc_html__('Button', 'textdomain'),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		// button position control
		$this->add_responsive_control(
			'button_position',
			[
				'label' => esc_html__('Position', 'textdomain'),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => esc_html__('Left', 'textdomain'),
						'icon' => 'eicon-h-align-left',
					],
					'center' => [
						'title' => esc_html__('Center', 'textdomain'),
						'icon' => 'eicon-h-align-center',
					],
					'right' => [
						'title' => esc_html__('Right', 'textdomain'),
						'icon' => 'eicon-h-align-right',
					],
					'justify' => [
						'title' => esc_html__('Stretch', 'textdomain'),
						'icon' => 'eicon-h-align-stretch',
					]
				],
				'default' => 'left',
				'toggle' => true,
			]
		);

		// button text alignment position
		$this->add_responsive_control(
			'text_align',
			[
				'label' => esc_html__('Alignment', 'textdomain'),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => esc_html__('Left', 'textdomain'),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__('Center', 'textdomain'),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => esc_html__('Right', 'textdomain'),
						'icon' => 'eicon-text-align-right',
					],
				],
				'default' => 'center',
				'toggle' => true,
				'selectors' => [
					'{{WRAPPER}} .tp-btn' => 'justify-content: {{VALUE}};',
				],
				'condition' => [
					'button_position' => 'justify',
				],
			]
		);

		// button typography control
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'button_typography',
				'selector' => '{{WRAPPER}} .tp-btn',
			]
		);
		// button colors tab control
		$this->start_controls_tabs(
			'button_tabs'
		);
		// button normal tab section
		$this->start_controls_tab(
			'button_normal_tab',
			[
				'label' => esc_html__('Normal', 'textdomain'),
			]
		);
		// button normal color control
		$this->add_control(
			'button_color',
			[
				'label' => esc_html__('Color', 'textdomain'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .tp-btn' => 'color: {{VALUE}}',
				],
			]
		);
		// button normal background color control
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'button_background',
				'types' => ['classic', 'gradient',],
				'exclude' => ['image'],
				'selector' => '{{WRAPPER}} .tp-btn::before',
			]
		);
		$this->end_controls_tab();
		// button hover tab section
		$this->start_controls_tab(
			'button_hover_tab',
			[
				'label' => esc_html__('Hover', 'textdomain'),
			]
		);
		// button hover color control
		$this->add_control(
			'button_hover_color',
			[
				'label' => esc_html__('Color', 'textdomain'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .tp-btn:hover' => 'color: {{VALUE}}',
				],
			]
		);
		// button hover background color control
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'button_hover_background',
				'types' => ['classic', 'gradient',],
				'exclude' => ['image'],
				'selector' => '{{WRAPPER}} .tp-btn:hover::after',
			]
		);

		$this->end_controls_tab();
		$this->end_controls_tabs();

		// button padding control
		$this->add_responsive_control(
			'button_padding',
			[
				'label' => esc_html__('Padding', 'textdomain'),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%', 'em', 'rem', 'custom'],
				'default' => [
					'unit' => 'px',
					'isLinked' => true,
				],
				'selectors' => [
					'{{WRAPPER}} .tp-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator' => 'before',
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
		// button 1
		$justify = $settings['button_position'] == 'justify' ? 'w-100' : '';
		if (! empty($settings['techub_btn'])) {
			$this->add_link_attributes('techub_btn', $settings['techub_btn_link']);
			$this->add_render_attribute('techub_btn', 'class', 'tp-btn ' . $justify);
		}
		$position = '';
		if ($settings['button_position'] == 'left') {
			$position = 'start';
		} elseif ($settings['button_position'] == 'right') {
			$position = 'end';
		} elseif ($settings['button_position'] == 'center') {
			$position = 'center';
		} else {
			$position = 'start';
		}

?>


		<?php if ($settings['techub_btn']) : ?>
			<div class="tp-project-5-top-btn d-flex justify-content-<?php echo $position; ?> wow fadeInUp">
				<a <?php $this->print_render_attribute_string('techub_btn'); ?>><span><?php echo esc_html($settings['techub_btn']); ?></span></a>
			</div>
		<?php endif; ?>
<?php }
}


$widgets_manager->register(new Techub_Button());
