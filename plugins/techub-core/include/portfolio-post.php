<?php

function portfolio_page_template( $template ) {
    if ( is_singular( 'portfolio' )  ) {
        $new_template = __DIR__ . '/template/portfolio-single.php';
        if ( '' != $new_template ) {
            return $new_template ;
        }
    }
    return $template;
}
add_filter( 'template_include', 'portfolio_page_template', 99 );


/**
 * Register a custom post type called "portfolio".
 *
 * @see get_post_type_labels() for label keys.
 */
function portfolio_post_type_init()
{
    $labels = array(
        'name'                  => _x('Portfolios', 'Post type general name', 'textdomain'),
        'singular_name'         => _x('Portfolio', 'Post type singular name', 'textdomain'),
        'menu_name'             => _x('Portfolios', 'Admin Menu text', 'textdomain'),
        'name_admin_bar'        => _x('Portfolio', 'Add New on Toolbar', 'textdomain'),
        'add_new'               => __('Add New', 'textdomain'),
        'add_new_item'          => __('Add New Portfolio', 'textdomain'),
        'new_item'              => __('New Portfolio', 'textdomain'),
        'edit_item'             => __('Edit Portfolio', 'textdomain'),
        'view_item'             => __('View Portfolio', 'textdomain'),
        'all_items'             => __('All Portfolios', 'textdomain'),
        'search_items'          => __('Search Portfolios', 'textdomain'),
        'parent_item_colon'     => __('Parent Portfolios:', 'textdomain'),
        'not_found'             => __('No portfolios found.', 'textdomain'),
        'not_found_in_trash'    => __('No portfolios found in Trash.', 'textdomain'),
        'featured_image'        => _x('Portfolio Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'textdomain'),
        'set_featured_image'    => _x('Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'textdomain'),
        'remove_featured_image' => _x('Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'textdomain'),
        'use_featured_image'    => _x('Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'textdomain'),
        'archives'              => _x('Portfolio archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'textdomain'),
        'insert_into_item'      => _x('Insert into portfolio', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'textdomain'),
        'uploaded_to_this_item' => _x('Uploaded to this portfolio', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'textdomain'),
        'filter_items_list'     => _x('Filter portfolios list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'textdomain'),
        'items_list_navigation' => _x('Portfolios list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'textdomain'),
        'items_list'            => _x('Portfolios list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'textdomain'),
    );

    $args = array(
        'labels'             => $labels,
        'menu_icon'          => 'dashicons-grid-view',
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'portfolio'),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array('title', 'editor', 'thumbnail'),
    );

    register_post_type('portfolio', $args);

    $labels = array(
        'name'              => _x('Categories', 'taxonomy general name', 'textdomain'),
        'singular_name'     => _x('Category', 'taxonomy singular name', 'textdomain'),
        'search_items'      => __('Search Categories', 'textdomain'),
        'all_items'         => __('All Categories', 'textdomain'),
        'view_item'         => __('View Category', 'textdomain'),
        'parent_item'       => __('Parent Category', 'textdomain'),
        'parent_item_colon' => __('Parent Category:', 'textdomain'),
        'edit_item'         => __('Edit Category', 'textdomain'),
        'update_item'       => __('Update Category', 'textdomain'),
        'add_new_item'      => __('Add New Category', 'textdomain'),
        'new_item_name'     => __('New Category Name', 'textdomain'),
        'not_found'         => __('No Categories Found', 'textdomain'),
        'back_to_items'     => __('Back to Categories', 'textdomain'),
        'menu_name'         => __('Category', 'textdomain'),
    );

    $args = array(
        'labels'            => $labels,
        'hierarchical'      => true,
        'public'            => true,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'portfolio-cat'),
        'show_in_rest'      => true,
    );


    register_taxonomy('portfolio-cat', 'portfolio', $args);


    $labels = array(
        'name'              => _x('Tags', 'taxonomy general name', 'textdomain'),
        'singular_name'     => _x('Tag', 'taxonomy singular name', 'textdomain'),
        'search_items'      => __('Search Tags', 'textdomain'),
        'all_items'         => __('All Tags', 'textdomain'),
        'view_item'         => __('View Tag', 'textdomain'),
        'parent_item'       => __('Parent Tag', 'textdomain'),
        'parent_item_colon' => __('Parent Tag:', 'textdomain'),
        'edit_item'         => __('Edit Tag', 'textdomain'),
        'update_item'       => __('Update Tag', 'textdomain'),
        'add_new_item'      => __('Add New Tag', 'textdomain'),
        'new_item_name'     => __('New Tag Name', 'textdomain'),
        'not_found'         => __('No Tags Found', 'textdomain'),
        'back_to_items'     => __('Back to Tags', 'textdomain'),
        'menu_name'         => __('Tag', 'textdomain'),
    );

    $args = array(
        'labels'            => $labels,
        'hierarchical'      => false,
        'public'            => true,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'portfolio-tag'),
        'show_in_rest'      => true,
    );


    register_taxonomy('portfolio-tag', 'portfolio', $args);
}


add_action('init', 'portfolio_post_type_init');
