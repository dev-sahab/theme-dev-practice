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
class Techub_Project extends Widget_Base
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
		return 'techub-project';
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
		return __('TH Project', 'techub-core');
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
		return 'eicon-featured-image th-widget-icon';
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
			'techub_project_content',
			[
				'label' => esc_html__('Project', 'techub-core'),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'image',
			[
				'label' => esc_html__('Choose Image', 'textdomain'),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
				'dynamic' => [
					'active' => true,
				],
				'separator' => 'after'
			]
		);
		// sub heading control
		$this->add_control(
			'sub-heading',
			[
				'label' => esc_html__('Sub Title', 'techub-core'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__('Add Your Sub Heading Text Here', 'techub-core'),
				'placeholder' => esc_html__('Sub title goes here', 'techub-core'),
				'label_block' => true,
				'dynamic' => [
					'active' => true,
				],
			]
		);
		// heading control 
		$this->add_control(
			'heading',
			[
				'label' => esc_html__('Title', 'techub-core'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__('Project Tile Here', 'techub-core'),
				'placeholder' => esc_html__('Project title here', 'techub-core'),
				'dynamic' => [
					'active' => true,
				],
				'label_block' => true,
			]
		);
		$this->end_controls_section();
	}
	private function th_style_controls()
	{
		$this->start_controls_section(
			'title_style',
			[
				'label' => esc_html__('Title', 'textdomain'),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		// Title color style control
		$this->add_control(
			'title_color',
			[
				'label' => esc_html__('Color', 'textdomain'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .tp-section-5-title' => 'color: {{VALUE}}',
				],
			]
		);
		// Title typography control
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'selector' => '{{WRAPPER}} .tp-section-5-title',
			]
		);
		// Title spacing control
		$this->add_control(
			'title_spacing',
			[
				'label' => esc_html__('Title Spacing', 'textdomain'),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => ['px'],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
						'step' => 1,
					]
				],
				'selectors' => [
					'{{WRAPPER}} .tp-section-5-title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'subtitle_style',
			[
				'label' => esc_html__('Subtitle', 'textdomain'),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		// SubTitle color style control
		$this->add_control(
			'subtitle_color',
			[
				'label' => esc_html__('Color', 'textdomain'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .tp-section-subtitle' => 'color: {{VALUE}}',
				],
			]
		);
		// SubTitle typography control
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'subtitle_typography',
				'selector' => '{{WRAPPER}} .tp-section-subtitle',
			]
		);
		// SubTitle spacing control
		$this->add_control(
			'subtitle_spacing',
			[
				'label' => esc_html__('Subtitle Spacing', 'textdomain'),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => ['px'],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
						'step' => 1,
					]
				],
				'selectors' => [
					'{{WRAPPER}} .tp-section-subtitle' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
		$this->start_controls_section(
			'description_style',
			[
				'label' => esc_html__('Description', 'textdomain'),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		// description color style control
		$this->add_control(
			'description_color',
			[
				'label' => esc_html__('Color', 'textdomain'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .tp-section-description' => 'color: {{VALUE}}',
				],
			]
		);
		// description typography control
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'description_typography',
				'selector' => '{{WRAPPER}} .tp-section-description',
			]
		);
		// description padding control
		$this->add_control(
			'desc_padding',
			[
				'label' => esc_html__('Padding', 'textdomain'),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%', 'em', 'rem', 'custom'],
				'default' => [
					'unit' => 'px',
					'isLinked' => true,
				],
				'selectors' => [
					'{{WRAPPER}} .tp-section-description' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'margin',
			[
				'label' => esc_html__('Margin', 'textdomain'),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%', 'em', 'rem', 'custom'],
				'default' => [
					'unit' => 'px',
					'isLinked' => true,
				],
				'selectors' => [
					'{{WRAPPER}} .tp-section-description' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
		echo '<div class="tp-el-widget-container" >';
		$this->render_raw();
		echo '</div>';
	}
	protected function render_raw()
	{
		$settings = $this->get_settings_for_display();
?>

		<div class="col-12">
			<div class="tp-project-5-wrapper wow fadeInUp" data-wow-delay=".3s" data-wow-duration="1s">
				<div class="tp-project-5-thumb p-relative mb-0">
					<?php if (!empty($settings['image']['url'])) : ?>
						<img src="<?php echo esc_url($settings['image']['url']); ?>" alt="<?php !empty($settings['image']['alt']) ? esc_url($settings['image']['alt']) : ''; ?>">
					<?php endif; ?>
					<div class="tp-project-5-icon">
						<a href="portfolio-details.html"><i class="fa-thin fa-plus"></i></a>
					</div>
					<div class="tp-project-5-content text-center">
						<?php if (!empty($settings['sub-heading'])) : ?>
							<span><?php echo esc_html($settings['sub-heading']); ?></span>
						<?php endif; ?>
						<?php if (!empty($settings['heading'])) : ?>
							<h4 class="tp-project-5-title"><a href="portfolio-details.html"><?php echo techub_kses($settings['heading']); ?></a></h4>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
<?php }
}


$widgets_manager->register(new Techub_Project());
