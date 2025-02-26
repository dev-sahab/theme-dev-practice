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
class Techub_Post_Grid extends Widget_Base
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
		return 'techub-post-grid';
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
		return __('TH Post Grid', 'techub-core');
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
		return 'eicon-apps th-widget-icon';
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
		// techub post grid control section
		$this->start_controls_section(
			'techub_post_grid_option',
			[
				'label' => esc_html__('Post Grid', 'techub-core'),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		// style control section
		$this->add_control(
			'grid_style',
			[
				'label' => esc_html__('Style', 'textdomain'),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'one',
				'options' => [
					'one' => esc_html__('Style 1', 'textdomain'),
					'two' => esc_html__('Style 2', 'textdomain'),
				]
			]
		);
		// thumbnail control
		$this->add_control(
			'show_thumb',
			[
				'label' => esc_html__('Show Feature Image', 'textdomain'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__('Show', 'textdomain'),
				'label_off' => esc_html__('Hide', 'textdomain'),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);
		// thumb size control section
		$this->add_group_control(
			\Elementor\Group_Control_Image_Size::get_type(),
			[
				'name' => 'post_feature_size', // Usage: `{name}_size` and `{name}_custom_dimension`, in this case `thumbnail_size` and `thumbnail_custom_dimension`.
				'fields_options'    => [
					'size'  => [
						'label' => esc_html__('Featured Image Size', 'textdomain'),
					],
				],
				'exclude' => ['custom'],
				'include' => [],
				'default' => 'large',
			]
		);
		// thumb hight control
		$this->add_control(
			'thumb_hight',
			[
				'label' => esc_html__('Equal Height Image', 'textdomain'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__('Show', 'textdomain'),
				'label_off' => esc_html__('Hide', 'textdomain'),
				'return_value' => 'yes',
				'default' => 'no',
			],
		);
		$this->add_control(
			'height',
			[
				'label' => esc_html__('Height', 'textdomain'),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => ['px', '%'],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 500,
						'step' => 1,
					]
				],
				'default' => [
					'unit' => 'px',
					'size' => 250,
				],
				'selectors' => [
					'{{WRAPPER}} .tp-posts-thumb a img' => 'height: {{SIZE}}{{UNIT}}; object-fit: cover',
				],
				'condition' => [
					'thumb_hight' => 'yes'
				],
			]
		);

		// post column control section
		$this->add_control(
			'post_column',
			[
				'label' => esc_html__('Post Column', 'textdomain'),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => '3',
				'options' => [
					'1' => esc_html__('1', 'textdomain'),
					'2' => esc_html__('2', 'textdomain'),
					'3' => esc_html__('3', 'textdomain'),
					'4' => esc_html__('4', 'textdomain'),
				]
			]
		);

		// post content control
		$this->add_control(
			'post_content_switch',
			[
				'label' => esc_html__('Show excerpt', 'textdomain'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__('Show', 'textdomain'),
				'label_off' => esc_html__('Hide', 'textdomain'),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);
		// excerpt word limit
		$this->add_control(
			'excerpt_limit',
			[
				'label' => esc_html__('Excerpt word limit', 'textdomain'),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 1,
				'max' => 100,
				'step' => 1,
			]
		);

		// show read more button control
		$this->add_control(
			'readmore_btn_switch',
			[
				'label' => esc_html__('Show Read More', 'textdomain'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__('Show', 'textdomain'),
				'label_off' => esc_html__('Hide', 'textdomain'),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);
		$this->end_controls_section();

		/**
		 * query control section
		 */
		$this->start_controls_section(
			'techub_post_query_control',
			[
				'label' => esc_html__('Query', 'techub-core'),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		// post show
		$this->add_control(
			'post_show',
			[
				'label' => esc_html__('Posts Count', 'textdomain'),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 1,
				'default' => 3,
				'description' => 'How many posts you want to show'
			]
		);
		// show posts by
		$this->add_control(
			'post_show_by',
			[
				'label' => esc_html__('Show posts by', 'textdomain'),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => '',
				'options' => [
					'' => esc_html__('Recent Post', 'textdomain'),
					'category' => esc_html__('Category Post', 'textdomain'),
					'post' => esc_html__('Selected Post', 'textdomain'),
				]
			]
		);
		// select post by category for include
		$this->add_control(
			'post_category_list_include',
			[
				'label' => esc_html__('Include Category', 'textdomain'),
				'description' => esc_html__('Search & Select Categories'),
				'type' => \Elementor\Controls_Manager::SELECT2,
				'label_block' => true,
				'multiple' => true,
				'options' => get_all_post_cat(),
				'condition' => [
					'post_show_by' => 'category'
				]
			]
		);
		// select post by category for exclude
		$this->add_control(
			'post_category_list_exclude',
			[
				'label' => esc_html__('Exclude Category', 'textdomain'),
				'description' => esc_html__('Search & Select Categories'),
				'type' => \Elementor\Controls_Manager::SELECT2,
				'label_block' => true,
				'multiple' => true,
				'options' => get_all_post_cat(),
				'condition' => [
					'post_show_by' => 'category'
				]
			]
		);

		// select post by title for include
		$this->add_control(
			'post_include',
			[
				'label' => esc_html__('Include Post', 'textdomain'),
				'description' => esc_html__('Search & Select Post'),
				'type' => \Elementor\Controls_Manager::SELECT2,
				'label_block' => true,
				'multiple' => true,
				'options' => get_all_post(),
				'condition' => [
					'post_show_by' => 'post'
				]
			]
		);
		// select post by title for exclude
		$this->add_control(
			'post_exclude',
			[
				'label' => esc_html__('Exclude Category', 'textdomain'),
				'description' => esc_html__('Search & Select Post'),
				'type' => \Elementor\Controls_Manager::SELECT2,
				'label_block' => true,
				'multiple' => true,
				'options' => get_all_post(),
				'condition' => [
					'post_show_by' => 'post'
				]
			]
		);


		// post offset
		$this->add_control(
			'post_offset',
			[
				'label' => esc_html__('Posts Offset', 'textdomain'),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 1,
				'default' => '',
			]
		);

		// post order by control section
		$this->add_control(
			'order_by',
			[
				'label' => esc_html__('Order By', 'textdomain'),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'date',
				'options' => [
					'date' => esc_html__('Date', 'textdomain'),
					'title' => esc_html__('Title', 'textdomain')
				]
			]
		);
		// post order control section
		$this->add_control(
			'order',
			[
				'label' => esc_html__('Order', 'textdomain'),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'DESC',
				'options' => [
					'ASC' => esc_html__('ASC', 'textdomain'),
					'DESC' => esc_html__('DESC', 'textdomain')
				]
			]
		);
		$this->end_controls_section();

		// read more button control section
		$this->start_controls_section(
			'techub_post_readmore_control',
			[
				'label' => esc_html__('Read More Button', 'techub-core'),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
				'condition' => [
					'readmore_btn_switch' => 'yes',
				],
			]
		);
		// button label
		$this->add_control(
			'button_label',
			[
				'label' => esc_html__('Label', 'textdomain'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__('Read More', 'textdomain'),
				'placeholder' => esc_html__('Read More', 'textdomain'),
			]
		);

		// button alignment
		$this->add_control(
			'button_align',
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
					'{{WRAPPER}} .tp-blog-btn-wrapper' => 'text-align: {{VALUE}};',
				],
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

		$args = array(
			'post_type' => 'post',
			'posts_per_page' => $settings['post_show'],
			'orderby' =>  $settings['order_by'],
			'order' => $settings['order'],
			'post__not_in' => $settings['post_exclude'],
			'post__in' => $settings['post_include'],
			'offset' => $settings['post_offset'],
		);
		if (!empty($settings['post_category_list_include']) && !empty($settings['post_category_list_exclude'])) {
			$args['tax_query'] = array(
				'relation' => 'AND',
				array(
					'taxonomy' => 'category',
					'field' => 'slug',
					'terms' => $settings['post_category_list_include'],
					'operator' => 'IN',
				),
				array(
					'taxonomy' => 'category',
					'field' => 'slug',
					'terms' => $settings['post_category_list_exclude'],
					'operator' => 'NOT IN',
				),
			);
		} elseif (!empty($settings['post_category_list_include'] || !empty($settings['post_category_list_exclude']))) {
			$args['tax_query'] = array(
				array(
					'taxonomy' => 'category',
					'field' => 'slug',
					'terms' => !empty($settings['post_category_list_exclude']) ?  $settings['post_category_list_exclude'] : $settings['post_category_list_include'],
					'operator' => !empty($settings['post_category_list_exclude']) ? 'NOT IN' : 'IN',
				),
			);
		}


		$query = new \WP_Query($args);

		$post_col = 4;
		if ($settings['post_column']  == 1) $post_col = 12;
		if ($settings['post_column']  == 2) $post_col = 6;
		if ($settings['post_column']  == 3) $post_col = 4;
		if ($settings['post_column']  == 4) $post_col = 3;
		$delay = 1;
?>
		<div class="row">
			<?php
			if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post();
					$cat = get_the_category(get_the_ID());
			?>
					<?php if ($settings['grid_style'] == "one") : ?>
						<div class="col-xl-<?php echo $post_col; ?> col-lg-<?php echo $post_col; ?> col-md-6">
							<div id="post-<?php the_ID() ?>" <?php post_class("tp-blog-wrapper mb-30 wow fadeInUp") ?> data-wow-delay=".<?php echo $delay = $delay + 2 ?>s" data-wow-duration="1s">
								<?php if (!empty($settings['show_thumb'])) : ?>
									<div class="tp-blog-thumb tp-posts-thumb">
										<a href="<?php the_permalink(); ?>">
											<?php
											the_post_thumbnail($settings['post_feature_size_size']);
											?></a>
									</div>
								<?php endif; ?>
								<div class="tp-blog-content">
									<div class="tp-blog-date d-flex">
										<p><?php echo $cat[0]->name ?></p>
										<span><?php echo get_the_date('d M, Y'); ?></span>
									</div>
									<div class="tp-blog-content-inner">
										<h4 class="tp-blog-content-inner-heading"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
										<?php if (!empty($settings['post_content_switch'])) : ?>
											<p><?php
												$settings['excerpt_limit'];
												if (!empty($settings['excerpt_limit']) || $settings['excerpt_limit'] > 0) {
													echo esc_html(wp_trim_words(get_the_excerpt(), $settings['excerpt_limit']));
												} else {
													echo get_the_excerpt();
												} ?></p>
										<?php endif; ?>
										<?php if (!empty($settings['readmore_btn_switch'])) : ?>
											<div class="tp-blog-btn-wrapper">
												<a class="tp-blog-btn" href="<?php the_permalink(); ?>"><?php echo esc_html($settings['button_label']) ?><span><i class="flaticon-right-arrow"></i></span></a>
											</div>
										<?php endif; ?>
									</div>
								</div>
							</div>
						</div>
					<?php elseif ($settings['grid_style'] == 'two'): ?>
						<div class="col-xl-<?php echo $post_col; ?> col-lg-<?php echo $post_col; ?> col-md-6">
							<article id="post-<?php the_ID() ?>" <?php post_class("tp-postbox-item mb-50") ?>>
								<? if (has_post_thumbnail()) : ?>
									<div class="tp-postbox-thumb p-relative tp-posts-thumb">
										<a href="<?php the_permalink(); ?>">
											<?php the_post_thumbnail($settings['post_feature_size_size']); ?>
										</a>
										<div class="tp-postbox-date-text">
											<span><?php the_time("d") ?><br><?php the_time("M") ?></span>
										</div>
									</div>
								<? endif; ?>
								<div class="tp-postbox-content">
									<?php echo get_template_part('template-parts/blog/meta') ?>
									<h3 class="tp-postbox-title">
										<a href="<?php the_permalink(); ?>"> <?php the_title(); ?></a>
									</h3>
									<div class="tp-postbox-text">
										<?php if (!empty($settings['post_content_switch'])) :
											$settings['excerpt_limit'];
											if (!empty($settings['excerpt_limit']) || $settings['excerpt_limit'] > 0) {
												echo esc_html(wp_trim_words(get_the_excerpt(), $settings['excerpt_limit']));
											} else {
												echo get_the_excerpt();
											}
										endif; ?>
									</div>
									<?php if (!empty($settings['readmore_btn_switch'])) : ?>
										<div class="tp-postbox-read tp-blog-btn-wrapper">
											<a class="tp-btn" rel="noreferrer" href="<?php the_permalink(); ?>"><span><?php echo esc_html($settings['button_label']) ?></span></a>
										</div>
									<?php endif; ?>
								</div>
							</article>
						</div>
					<?php endif; ?>

			<?php endwhile;
			endif; ?>
		</div>
<?php }
}


$widgets_manager->register(new Techub_Post_Grid());
