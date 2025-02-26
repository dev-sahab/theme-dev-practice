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
class Techub_Skill extends Widget_Base
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
		return 'techub-skill';
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
		return __('TH Skills', 'techub-core');
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
		return 'eicon-accordion th-widget-icon';
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
			'Techub_Skill_tab',
			[
				'label' => esc_html__('FAQ', 'techub-core'),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		// heading control
		$this->add_control(
			'heading',
			[
				'label' => esc_html__('Title', 'techub-core'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__('Add Your Title Text Here', 'techub-core'),
				'placeholder' => esc_html__('Title goes here', 'techub-core'),
				'label_block' => true,
				'dynamic' => [
					'active' => true,
				],
			]
		);

		$this->add_control(
			'skill_list',
			[
				'label' => esc_html__('Skill List', 'textdomain'),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => [
					[
						'name' => 'skill_title',
						'label' => esc_html__('Title', 'textdomain'),
						'type' => \Elementor\Controls_Manager::TEXT,
						'default' => esc_html__('Skill Title', 'textdomain'),
						'label_block' => true,
					],
					[
						'name' => 'skill_count',
						'label' => esc_html__('Count', 'textdomain'),
						'type' => \Elementor\Controls_Manager::NUMBER,
						'default' => esc_html__('50', 'textdomain'),
					]
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

		<div class="tp-management-progres-skill tp-management-progres-skill-2 mb-35 mr-60">
		<?php foreach ($settings['skill_list'] as $key => $item) : ?>
			<div class="tp-skill fix pb-20">
				<label><?php echo esc_html($item['skill_title']); ?></label>
				<div class="progress progress-2">
					<div class="progress-bar progress-bar-2 wow slideInLeft" data-wow-duration="1s" data-wow-delay=".8s" role="progressbar" aria-label="Example with label" style="width: <?php echo esc_attr($item['skill_count']); ?>%;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"><span class="progresscounter"><?php echo esc_html($item['skill_count']); ?>%</span></div>
				</div>
			</div>
			<?php endforeach; ?>
		</div>
<?php }
}


$widgets_manager->register(new Techub_Skill());
