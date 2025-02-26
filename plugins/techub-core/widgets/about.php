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
class Techub_About extends Widget_Base
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
		return 'techub-about';
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
		return __('TH About', 'techub-core');
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
		return 'eicon-single-post th-widget-icon';
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
		// About content control section
		$this->start_controls_section(
			'about-content',
			[
				'label' => esc_html__('Content', 'techub-core'),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		// image control
		$this->add_control(
			'about_image',
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
			'sub_heading',
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
			'about_description',
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
		// Author quote control section
		$this->start_controls_section(
			'author_quotes',
			[
				'label' => esc_html__('Quote', 'techub-core'),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		// image control
		$this->add_control(
			'author_image',
			[
				'label' => esc_html__('Choose Image', 'textdomain'),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
				'separator' => "after"
			]
		);		// image control
		$this->add_control(
			'video_url',
			[
				'label' => esc_html__('Video URL', 'techub-core'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__('#', 'techub-core'),
				'placeholder' => esc_html__('Video URL', 'techub-core'),
			]
		);
		// author quote
		$this->add_control(
			'author_quote',
			[
				'label' => esc_html__('Description', 'textdomain'),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'rows' => 3,
				'default' => esc_html__('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.', 'textdomain'),
				'placeholder' => esc_html__('Type your description here', 'textdomain'),
				"separator" => "after"
			]
		);
		// author name control
		$this->add_control(
			'author_name',
			[
				'label' => esc_html__('Name', 'techub-core'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__('Author Name', 'techub-core'),
				'placeholder' => esc_html__('Author name goes here', 'techub-core'),
			]
		);
		// author designation control
		$this->add_control(
			'author_designation',
			[
				'label' => esc_html__('Designation', 'techub-core'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__('Designation', 'techub-core'),
				'placeholder' => esc_html__('Designation here', 'techub-core'),
			]
		);
		$this->end_controls_section();

		// repeater control section
		$this->start_controls_section(
			'repeater_control',
			[
				'label' => esc_html__('Feature', 'techub-core'),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'feature_list',
			[
				'label' => esc_html__('Feature List', 'textdomain'),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => [
					[
						'name' => 'select_type',
						'label' => esc_html__('Select Type', 'textdomain'),
						'type' => \Elementor\Controls_Manager::SELECT,
						'default' => 'icon',
						'options' => [
							'icon' => esc_html__('Icon', 'textdomain'),
							'image'  => esc_html__('Image', 'textdomain'),
						]
					],
					// image control 
					[
						'name' => 'list_image',
						'label' => esc_html__('Image', 'textdomain'),
						'type' => \Elementor\Controls_Manager::MEDIA,
						'default' => [
							'url' => \Elementor\Utils::get_placeholder_image_src(),
						],
						'condition' => [
							'select_type' => 'image',
						],
					],

					[
						'name' => 'list_icon',
						'label' => esc_html__('Social Icons', 'textdomain'),
						'type' => \Elementor\Controls_Manager::ICONS,
						'default' => [
							'value' => 'fas fa-circle',
							'library' => 'fa-solid',
						],
						'condition' => [
							'select_type' => 'icon',
						],
					],
					// title control
					[
						'name' => 'list_title',
						'label' => esc_html__('Title', 'textdomain'),
						'type' => \Elementor\Controls_Manager::TEXT,
						'default' => esc_html__('List Title Here', 'textdomain'),
						'label_block' => true
					],
				],
				'default' => [
					[
						'list_title' => esc_html__('Title #1', 'textdomain'),
						'list_content' => esc_html__('Item content. Click the edit button to change this text.', 'textdomain'),
					],
					[
						'list_title' => esc_html__('Title #2', 'textdomain'),
						'list_content' => esc_html__('Item content. Click the edit button to change this text.', 'textdomain'),
					],
				],
				'title_field' => '{{{ list_title }}}',
			]
		);
		$this->end_controls_section();
		// button control section
		$this->start_controls_section(
			'button',
			[
				'label' => esc_html__('Button & Signature', 'techub-core'),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		// button 1
		$this->add_control(
			'about_btn',
			[
				'label' => esc_html__('Button', 'techub-core'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__('Click here', 'techub-core'),
				'placeholder' => esc_html__('Click here', 'techub-core'),
			]
		);
		$this->add_control(
			'about_btn_link',
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
				'label_block' => true
			]
		);
		// image control
		$this->add_control(
			'sig_image',
			[
				'label' => esc_html__('Choose Signature Image', 'textdomain'),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'shape',
			[
				'label' => esc_html__('Shape Images', 'techub-core'),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		// image control
		$this->add_control(
			'shape_image',
			[
				'label' => esc_html__('Choose Image', 'textdomain'),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);
		$this->end_controls_section();
	}
	private function th_style_controls()
	{
		$this->start_controls_section(
			'heading_style',
			[
				'label' => __('Content', 'techub-core'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'subheading',
			[
				'label' => esc_html__('Sub Heading', 'textdomain'),
				'type' => \Elementor\Controls_Manager::HEADING,
			]
		);
		// subheading typography control
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'subheading_typography',
				'selector' => '{{WRAPPER}} .tp-section-subtitle',
			]
		);
		// subheading color control
		$this->add_control(
			'subheading_color',
			[
				'label' => esc_html__('Text Color', 'textdomain'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .tp-section-subtitle' => 'color: {{VALUE}}',
				]
			]
		);
		$this->add_control(
			'heading',
			[
				'label' => esc_html__('Heading', 'textdomain'),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		// heading typography control
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'heading_typography',
				'selector' => '{{WRAPPER}} .tp-section-5-title',
			]
		);
		// heading color control
		$this->add_control(
			'heading_color',
			[
				'label' => esc_html__('Text Color', 'textdomain'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .tp-section-5-title' => 'color: {{VALUE}}',
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
					'{{WRAPPER}} .tp-section-5-title span::after' => 'background: {{VALUE}}',
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
		if (! empty($settings['about_btn'])) {
			$this->add_link_attributes('about_btn', $settings['about_btn_link']);
			$this->add_render_attribute('about_btn', 'class', 'tp-btn');
		}
?>
		<section class="tp-about-5-area pt-100 pb-120 p-relative fix">
			<div class="container">
				<div class="row">
					<div class="col-xl-6 col-lg-5">
						<div class="tp-about-5-thumb p-relative wow fadeInLeft">
							<img src="<?php echo $settings['about_image']['url'] ?>" alt="">
							<div class="tp-about-5-thumb-shape">
								<img class="tp-about-5-thumb-s1" src="<?php echo get_template_directory_uri(); ?>/assets/img/about/service-5-img-shape1.png" alt="">
								<img class="tp-about-5-thumb-s2" src="<?php echo get_template_directory_uri(); ?>/assets/img/about/service-5-img-shape2.png" alt="">
								<img class="tp-about-5-thumb-s3" src="<?php echo get_template_directory_uri(); ?>/assets/img/about/service-5-img-shape3.png" alt="">
							</div>
						</div>
					</div>
					<div class="col-xl-6 col-lg-7">
						<div class="tp-about-wrapper mt-25 ml-20 wow fadeInRight">
							<div class="tp-section-title-wrapper mb-40">
								<span class="tp-section-subtitle"><?php echo $settings['sub_heading']; ?></span>
								<h3 class="tp-section-5-title"><?php echo $settings['heading']; ?></h3>
								<p class="tp-section-desc"><?php echo $settings['about_description']; ?></p>
							</div>
							<div class="tp-about-top-item d-flex mb-40">
								<div class="tp-about-video-btn">
									<a class="popup-video" href="<?php echo esc_url($settings['video_url']) ?>"><img src="<?php echo $settings['author_image']['url']; ?>" alt=""><i class="fa-sharp fa-solid fa-play"></i></a>
								</div>
								<div class="tp-about-inner-content">
									<div class="tp-about-inner-parag">
										<p><?php echo $settings['author_quote']; ?></p>
									</div>
									<div class="tp-about-inner-heading d-flex">
										<h3><?php echo $settings['author_name']; ?></h3>
										<span><?php echo $settings['author_designation']; ?></span>
									</div>
								</div>
							</div>
							<div class="tp-about-feature-box d-flex mb-50">
								<?php foreach ($settings['feature_list'] as $key => $value) :
									$list_class = $key == 1 ? 'ml-100' : '';
								?>
									<div class="tp-about-feature-item d-flex <?php echo $list_class; ?>">
										<div class="tp-about-feature-icon">
											<span><?php \Elementor\Icons_Manager::render_icon($value['list_icon'], ['aria-hidden' => 'true']); ?></span>
										</div>
										<div class="tp-about-feature-content">
											<h4><?php echo esc_html($value['list_title']) ?></h4>
										</div>
									</div>
								<?php endforeach; ?>
							</div>
							<div class="tp-about-signacer-btn d-flex">
								<a <?php $this->print_render_attribute_string('about_btn'); ?>><span><?php echo esc_html($settings['about_btn']) ?></span></a>
								<div class="tp-about-signaser-img">
									<img src="<?php echo esc_url($settings['sig_image']['url']) ?>" alt="">
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="tp-about-5-bg-shape">
				<img src="<?php echo esc_url($settings['shape_image']['url']) ?>" alt="">
			</div>
		</section>


		<!-- slider area start -->
		<!-- <section class="tp-slider-5-area p-relative z-index-1 fix">
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
		</section> -->
		<!-- slider area end -->
<?php }
}


$widgets_manager->register(new Techub_About());
