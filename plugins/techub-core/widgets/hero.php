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
class Hero extends Widget_Base
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
		return 'techub-hero';
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
		return __('TH Hero', 'techub-core');
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
		return 'eicon-ehp-hero th-widget-icon';
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
			'hero-content',
			[
				'label' => esc_html__('Hero Content', 'techub-core'),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		// image control
		$this->add_control(
			'hero_image',
			[
				'label' => esc_html__('Choose Image', 'textdomain'),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
				'separator' => "after"
			]
		);
		// sub heading control
		$this->add_control(
			'sub-heading',
			[
				'label' => esc_html__('Sub Heading', 'techub-core'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__('Sub title', 'techub-core'),
				'placeholder' => esc_html__('Sub title goes here', 'techub-core'),
			]
		);
		// heading control 
		$this->add_control(
			'heading',
			[
				'label' => esc_html__('Heading', 'techub-core'),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'rows' => 2,
				'default' => esc_html__('Add Your Heading Text Here', 'techub-core'),
				'placeholder' => esc_html__('Title goes here', 'techub-core'),

			]
		);
		$this->add_control(
			'hero_description',
			[
				'label' => esc_html__('Description', 'textdomain'),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'rows' => 3,
				'default' => esc_html__('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.', 'textdomain'),
				'placeholder' => esc_html__('Type your description here', 'textdomain'),
				"separator" => "after"
			]
		);
		$this->end_controls_section();
		// Hero control control section
		$this->start_controls_section(
			'hero-button',
			[
				'label' => esc_html__('Hero Buttons', 'techub-core'),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		// button 1
		$this->add_control(
			'hero_button_1',
			[
				'label' => esc_html__('Button 1', 'techub-core'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__('Click here', 'techub-core'),
				'placeholder' => esc_html__('Click here', 'techub-core'),
			]
		);
		$this->add_control(
			'hero_button_1_link',
			[
				'label' => esc_html__('Link', 'textdomain'),
				'type' => \Elementor\Controls_Manager::URL,
				'options' => ['url', 'is_external', 'nofollow'],
				'default' => [
					'url' => '#',
					'is_external' => false,
					'nofollow' => false,
					// 'custom_attributes' => '',
				],
				'label_block' => true,
				"separator" => "after"
			]
		);
		// button 2
		$this->add_control(
			'hero_button_2',
			[
				'label' => esc_html__('Button 2', 'techub-core'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__('Click here', 'techub-core'),
				'placeholder' => esc_html__('Click here', 'techub-core'),
			]
		);
		$this->add_control(
			'hero_button_2_link',
			[
				'label' => esc_html__('Link', 'textdomain'),
				'type' => \Elementor\Controls_Manager::URL,
				'options' => ['url', 'is_external', 'nofollow'],
				'default' => [
					'url' => '#',
					'is_external' => false,
					'nofollow' => false,
					// 'custom_attributes' => '',
				],
				'label_block' => true,
			]
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'background_style',
			[
				'label' => esc_html__('Background Images', 'techub-core'),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'background',
				'types' => ['classic', 'gradient', 'video'],
				'selector' => '{{WRAPPER}} .tp-el-bg',
			]
		);
		// background image control
		// $this->add_control(
		// 	'hero_bg_image',
		// 	[
		// 		'label' => esc_html__('Choose Background Image', 'textdomain'),
		// 		'type' => \Elementor\Controls_Manager::MEDIA,
		// 		'default' => [
		// 			'url' => \Elementor\Utils::get_placeholder_image_src(),
		// 		],
		// 		'separator' => 'after'
		// 	]
		// );

		// background image control
		$this->add_control(
			'hero_bg_shape_image',
			[
				'label' => esc_html__('Choose Shape Image', 'textdomain'),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				]
			]
		);
		$this->end_controls_section();
	}
	private function th_style_controls()
	{
		$this->start_controls_section(
			'subheading_style',
			[
				'label' => __('Content', 'techub-core'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'subheading',
			[
				'label' => esc_html__( 'Sub Heading', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::HEADING,
			]
		);
		// subheading typography control
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'subheading_typography',
				'selector' => '{{WRAPPER}} .tp-slider-sub-title',
			]
		);
		// subheading color control
		$this->add_control(
			'subheading_color',
			[
				'label' => esc_html__('Text Color', 'textdomain'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .tp-slider-sub-title' => 'color: {{VALUE}}',
				]
			]
		);
		$this->add_control(
			'heading',
			[
				'label' => esc_html__( 'Heading', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		// heading typography control
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'heading_typography',
				'selector' => '{{WRAPPER}} .tp-slider-title',
			]
		);
		// heading color control
		$this->add_control(
			'heading_color',
			[
				'label' => esc_html__('Text Color', 'textdomain'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .tp-slider-title' => 'color: {{VALUE}}',
				],
			]
		);
		// heading color control
		$this->add_control(
			'sep_color',
			[
				'label' => esc_html__('Title Separator Color', 'textdomain'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .tp-slider-title-5 span::after' => 'background: {{VALUE}}',
				],
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
		echo '<div class="techub-widget-container">';
		$this->render_raw();
		echo '</div>';
	}
	protected function render_raw()
	{
		$settings = $this->get_settings_for_display();

		// button 1
		if (! empty($settings['hero_button_1'])) {
			$this->add_link_attributes('hero_button_1', $settings['hero_button_1_link']);
			$this->add_render_attribute('hero_button_1', 'class', 'tp-btn');
		}
		// button 2
		if (! empty($settings['hero_button_2'])) {
			$this->add_link_attributes('hero_button_2', $settings['hero_button_2_link']);
			$this->add_render_attribute('hero_button_2', 'class', 'tp-btn tp-btn-white');
		}
?>

		<!-- slider area start -->
		<section class="tp-slider-5-area p-relative z-index-1 fix">
			<div class="tp-slider-5-height">
				<div class="tp-slider-5-bg tp-el-bg" ></div>
				<div class="container">
					<div class="row align-items-end">
						<div class="col-xl-6 col-lg-6">
							<div class="tp-slider-5-content p-relative z-index-11">
								<div class="tp-slider-5-title-box mb-50 wow fadeInUp" data-wow-delay=".3s" data-wow-duration="1s">
									<span class="tp-slider-sub-title tp-slider-sub-title-5"><?php echo esc_html($settings['sub-heading']); ?></span>
									<h1 class="tp-slider-title tp-slider-title-5"><?php echo techub_kses($settings['heading']); ?></h1>
									<p class="tp-slider-5-paragraph"><?php echo techub_kses($settings['hero_description']); ?></p>
								</div>
								<div class="tp-slider-5-btn-box d-inline-flex wow fadeInUp" data-wow-delay=".5s" data-wow-duration="1s">
									<?php if (!empty($settings['hero_button_1'])) : ?>
										<a <?php $this->print_render_attribute_string('hero_button_1'); ?>><span><?php echo esc_html($settings['hero_button_1']); ?></span></a>
									<?php endif; ?>
									<?php if (!empty($settings['hero_button_2'])) : ?>
										<a <?php $this->print_render_attribute_string('hero_button_2'); ?>><span><?php echo esc_html($settings['hero_button_2']); ?></span></a>
									<?php endif; ?>
								</div>
							</div>
						</div>
						<div class="col-xl-6 col-lg-6">
							<?php
							if (!empty($settings['hero_image']['url'])) : ?>
								<div class="tp-slider-5-thumb p-relative z-index-1">
									<img class="tp-slider-5-main-img" src="<?php echo esc_url($settings['hero_image']['url']); ?>" alt="<?php echo esc_attr($settings['hero_image']['alt']); ?>">
								</div>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
			<?php if (!empty($settings['hero_bg_shape_image']['url'])) : ?>
				<div class="tp-slider-5-bg-shape">
					<img class="tp-slider-5-bg-shape1" src="<?php echo esc_url($settings['hero_bg_shape_image']['url']) ?>" alt="<?php echo esc_attr($settings['hero_bg_shape_image']['alt']) ?>">
				</div>
			<?php endif; ?>
		</section>
		<!-- slider area end -->
<?php }
}


$widgets_manager->register(new Hero());
