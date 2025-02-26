<?php

/**
 * Single Product Meta
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/meta.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     3.0.0
 */

if (! defined('ABSPATH')) {
	exit;
}

global $product;
?>
<div class="product_meta">

	<?php do_action('woocommerce_product_meta_start'); ?>

	<?php if (wc_product_sku_enabled() && ($product->get_sku() || $product->is_type('variable'))) : ?>
		<div class="product__details-sku product__details-more sku_wrapper">
			<p><?php esc_html_e('SKU:', 'woocommerce'); ?></p>
			<span class="sku"><?php echo ($sku = $product->get_sku()) ? $sku : esc_html__('N/A', 'woocommerce'); ?></span>
		</div>

	<?php endif; ?>
	<div class="product__details-categories product__details-more">

		<?php echo wc_get_product_category_list($product->get_id(), ', ', '<span class="posted_in">' . _n('<p>Category:</p>', '<p>Categories:</p>', count($product->get_category_ids()), 'woocommerce') . ' ', '</span>'); ?>
	</div>

	<?php
	// get_the_terms for specific post cat or tag data
	// get_terms for all post tag or cat data
	$terms = get_terms(array('taxonomy' => 'product_tag', 'hide_empty' => false));
	?>
	<div class="product__details-tags">
		<span>Tags:</span>

		<?php foreach ($terms as $term) { ?>
			<a href="<?php echo get_term_link($term->term_id, 'product_tag'); ?> " rel="tag"><?php echo $term->name; ?></a>
		<?php } ?>

	</div>
	<?php do_action('woocommerce_product_meta_end'); ?>
</div>