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
class Service_Section extends Widget_Base
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
		return 'techub-service-section';
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
		return __('TH Services', 'techub-core');
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
		return 'eicon-gallery-grid th-widget-icon';
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
			'techub_heading',
			[
				'label' => esc_html__('Heading', 'techub-core'),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		// sub heading control
		$this->add_control(
			'sub-heading',
			[
				'label' => esc_html__('Sub Heading', 'techub-core'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__('Add Your Sub Heading Text Here', 'techub-core'),
				'placeholder' => esc_html__('Sub title goes here', 'techub-core'),
				'separator' => 'after',
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
				'separator' => 'after',
			]
		);

		$this->add_control(
			'columns',
			[
				'label' => esc_html__('Service Columns', 'textdomain'),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 1,
				'max' => 3,
				'step' => 1,
				'default' => 2,
			]
		);
		// service repeater
		$this->add_control(
			'service_list',
			[
				'label' => esc_html__('Service List', 'textdomain'),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => [
					// image control 
					[
						'name' => 'list_image',
						'label' => esc_html__('Image', 'textdomain'),
						'type' => \Elementor\Controls_Manager::MEDIA,
						'default' => [
							'url' => \Elementor\Utils::get_placeholder_image_src(),
						]
					],
					// title control
					[
						'name' => 'list_title',
						'label' => esc_html__('Title', 'textdomain'),
						'type' => \Elementor\Controls_Manager::TEXT,
						'default' => esc_html__('List Title Here', 'textdomain'),
						'label_block' => true
					],
					// title control
					[
						'name' => 'list_title_color',
						'label' => esc_html__('Color', 'textdomain'),
						'type' => \Elementor\Controls_Manager::COLOR,
						'selectors' => [
							'{{WRAPPER}} {{CURRENT_ITEM}} .tp-service-5-title' => 'color: {{VALUE}}',
						],
					],
					// description control
					[
						'name' => 'list_content',
						'label' => esc_html__('Content', 'textdomain'),
						'type' => \Elementor\Controls_Manager::TEXTAREA,
						'default' => esc_html__('List Content', 'textdomain'),
						'show_label' => true,
					],
					// link control
					[
						'name' => 'list_link',
						'label' => esc_html__('Link', 'textdomain'),
						'type' => \Elementor\Controls_Manager::TEXT,
						'default' => __('#'),
						'label_block' => true,
						'show_label' => true,
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
		echo '<div class="techub-widget-container" >';
		$this->render_raw();
		echo '</div>';
	}
	protected function render_raw()
	{
		$settings = $this->get_settings_for_display();
		$col = '6';
		if ($settings['columns'] == 1) {
			$col = 12;
		} elseif ($settings['columns'] == 2) {
			$col = 6;
		} elseif ($settings['columns'] == 3) {
			$col = 4;
		}
?>

		<!-- Service area start -->
		<section class="tp-service-5-area pt-190 pb-90 p-relative fix">
			<div class="container">
				<div class="row">
					<div class="tp-section-5-title-wrapper mb-50 text-center wow fadeInUp">
						<?php if (!empty($settings['sub-heading'])) : ?>
							<span class="tp-section-5-subtitle"><?php echo esc_html($settings['sub-heading']) ?></span>
						<?php endif; ?>
						<?php if (!empty($settings['sub-heading'])) : ?>
							<h3 class="tp-section-5-title"><?php echo techub_kses($settings['heading']) ?></h3>
						<?php endif; ?>
					</div>
				</div>
				<div class="row">
					<?php if (!empty($settings['service_list'])) : ?>
						<?php foreach ($settings['service_list'] as $item) :
							$img_alt = !empty($item['list_image']['alt']) ? $item['list_image']['alt'] : '';
						?>
							<div class="col-lg-<?php echo $col . " elementor-repeater-item-" . $item['_id'] ?> col-md-<?php echo $col ?>">
								<div class="tp-service-5-wrapper mb-30 wow fadeInUp" data-wow-delay=".3s" data-wow-duration="1s">
									<div class="tp-service-5-item d-flex">
										<?php if (!empty($item['list_image']['url'])) : ?>
											<div class="tp-service-5-thumb">
												<img src="<?php echo esc_url($item['list_image']['url']) ?>" alt="<?php echo esc_attr($img_alt) ?>">
											</div>
										<?php endif; ?>
										<div class="tp-service-5-content">
											<h4 class="tp-service-5-title"><a href="<?php echo esc_url($item['list_link']); ?>"><?php echo esc_html($item['list_title']) ?></a></h4>
											<p class="tp-service-5-paragraph"><?php echo esc_html($item['list_content']) ?></p>
											<div class="tp-service-5-btn">
												<a href="<?php echo esc_url($item['list_link']); ?>"><i class="fa-solid fa-arrow-right"></i></a>
											</div>
										</div>
									</div>
								</div>
							</div>
						<?php endforeach; ?>
					<?php endif; ?>
				</div>
			</div>
			<div class="tp-service-5-bg-shape">
				<img src="<?php echo get_template_directory_uri() ?>/assets/img/service/service-5-bg-shape.png" alt="">
			</div>
		</section>
		<!-- Service area end -->
<?php }
}


$widgets_manager->register(new Service_Section());
