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
class Techub_Testimonial extends Widget_Base
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
		return 'techub-testimonial-section';
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
		return __('TH Testimonial', 'techub-core');
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
			'techub_testimonial_section',
			[
				'label' => esc_html__('Testimonial', 'techub-core'),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		// service repeater
		$this->add_control(
			'testimonial_list',
			[
				'label' => esc_html__('Testimonial List', 'textdomain'),
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
						'label' => esc_html__('Name', 'textdomain'),
						'type' => \Elementor\Controls_Manager::TEXT,
						'default' => esc_html__('List Title Here', 'textdomain'),
						'label_block' => true
					],
					// title control
					[
						'name' => 'list_designation',
						'label' => esc_html__('Designation', 'textdomain'),
						'type' => \Elementor\Controls_Manager::TEXT,
						'default' => esc_html__('List Title Here', 'textdomain'),
						'label_block' => true
					],
					// description control
					[
						'name' => 'list_content',
						'label' => esc_html__('Content', 'textdomain'),
						'type' => \Elementor\Controls_Manager::TEXTAREA,
						'default' => esc_html__('List Content', 'textdomain'),
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
?>


		<div class="tp-testimonial-insu-tab-wrapper mt-20">
			<div class="row">
				<div class="col-xl-9 col-lg-9 col-md-9 col-sm-9 col-12">
					<div class="tp-testimonial-content wow fadeInUp">
						<div class="tp-testimonial-tab-wrapper  tab-content" id="v-pills-tabContent2">
							<?php foreach ($settings['testimonial_list'] as $key => $item) :
								$show = $key == 0 ? 'show active' : '';
							?>
								<div class="tab-pane fade <?php echo esc_attr($show) ?>" id="v-pills-man<?php echo $key + 1 ?>" role="tabpanel" aria-labelledby="v-pills-man<?php echo $key + 1 ?>-tab">
									<div class="tp-client-review p-relative">
										<div class="tp-client-caption">
											<img src="<?php echo get_template_directory_uri(); ?>/assets/img/testimonial/testi-star.png" alt="">
											<p><?php echo esc_html($item['list_content']) ?></p>
										</div>
										<div class="tp-client-inner d-flex">
											<div class="tp-client-image">
												<img src="<?php echo esc_url($item['list_image']['url']) ?>" alt="client">
											</div>
											<div class="tp-client-nav-info">
												<h5 class="tp-client-nav-title"><?php echo esc_html($item['list_title']) ?></h5>
												<span class="tp-client-nav-designation"><?php echo esc_html($item['list_designation']) ?></span>
											</div>
										</div>
										<div class="tp-testimonial-box-shape">
											<img src="<?php echo get_template_directory_uri(); ?>/assets/img/testimonial/testi-box-shape.png" alt="">
										</div>
									</div>
								</div>

							<?php endforeach; ?>

						</div>
					</div>
				</div>
				<div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-12">
					<div class="nav tp-testimonial-list wow fadeInRight" id="v-pills-tab2" role="tablist" aria-orientation="vertical">
						<?php foreach ($settings['testimonial_list'] as $key => $item) :
							$active = $key == 0 ? 'active' : '';
						?>
							<button class="tp-testimonial-btn tp-testimonial-item d-flex nav-link <?php echo esc_attr($active) ?>" id="v-pills-man<?php echo $key + 1 ?>-tab" data-bs-toggle="pill" data-bs-target="#v-pills-man<?php echo $key + 1 ?>" type="button" role="tab" aria-controls="v-pills-man<?php echo $key + 1 ?>" aria-selected="true">
								<span class="tp-testimonial-tab-btn">
									<img src="<?php echo esc_url($item['list_image']['url']) ?>" alt="client">
								</span>
							</button>
						<?php endforeach; ?>
					</div>
				</div>
			</div>
		</div>






<?php }
}


$widgets_manager->register(new Techub_Testimonial());
