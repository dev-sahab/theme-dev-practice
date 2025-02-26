<?php
class Techub_Recent_Posts_Widget extends WP_Widget {
    public function __construct() {
        parent::__construct(
            'techub_recent_posts_widget',
            __('Techub Recent Post', 'techub'),
            array('description' => __('A widget to display recent posts with options.', 'techub'))
        );
    }

    public function form($instance) {
        $defaults = array(
            'title' => __('Recent Posts', 'techub'),
            'post_count' => 3,
            'show_comments' => 1,
            'show_thumbnail' => 1,
            'title_limit' => 50
        );
        $instance = wp_parse_args((array) $instance, $defaults);
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"> <?php _e('Widget Title:', 'techub'); ?> </label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($instance['title']); ?>">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('post_count'); ?>"> <?php _e('Number of posts:', 'techub'); ?> </label>
            <input class="widefat" id="<?php echo $this->get_field_id('post_count'); ?>" name="<?php echo $this->get_field_name('post_count'); ?>" type="number" value="<?php echo esc_attr($instance['post_count']); ?>">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('title_limit'); ?>"> <?php _e('Title Character Limit:', 'techub'); ?> </label>
            <input class="widefat" id="<?php echo $this->get_field_id('title_limit'); ?>" name="<?php echo $this->get_field_name('title_limit'); ?>" type="number" value="<?php echo esc_attr($instance['title_limit']); ?>">
        </p>
        <p>
            <input class="checkbox" type="checkbox" <?php checked($instance['show_comments'], 1); ?> id="<?php echo $this->get_field_id('show_comments'); ?>" name="<?php echo $this->get_field_name('show_comments'); ?>" value="1">
            <label for="<?php echo $this->get_field_id('show_comments'); ?>"> <?php _e('Enable Comments', 'techub'); ?> </label>
        </p>
        <p>
            <input class="checkbox" type="checkbox" <?php checked($instance['show_thumbnail'], 1); ?> id="<?php echo $this->get_field_id('show_thumbnail'); ?>" name="<?php echo $this->get_field_name('show_thumbnail'); ?>" value="1">
            <label for="<?php echo $this->get_field_id('show_thumbnail'); ?>"> <?php _e('Show Thumbnail', 'techub'); ?> </label>
        </p>
        <?php
    }

    public function update($new_instance, $old_instance) {
        $instance = $old_instance;
        $instance['title'] = sanitize_text_field($new_instance['title']);
        $instance['post_count'] = (int) $new_instance['post_count'];
        $instance['title_limit'] = (int) $new_instance['title_limit'];
        $instance['show_comments'] = !empty($new_instance['show_comments']) ? 1 : 0;
        $instance['show_thumbnail'] = !empty($new_instance['show_thumbnail']) ? 1 : 0;
        return $instance;
    }

    public function widget($args, $instance) {
        echo $args['before_widget'];
        if (!empty($instance['title'])) {
            echo $args['before_title'] . apply_filters('widget_title', $instance['title']) . $args['after_title'];
        }
        
        $post_count = isset($instance['post_count']) ? (int) $instance['post_count'] : 3;
        $title_limit = isset($instance['title_limit']) ? (int) $instance['title_limit'] : 50;
        $show_comments = isset($instance['show_comments']) ? (bool) $instance['show_comments'] : true;
        $show_thumbnail = isset($instance['show_thumbnail']) ? (bool) $instance['show_thumbnail'] : true;

        $query = new WP_Query(array('posts_per_page' => $post_count));

        if ($query->have_posts()) {
            echo '<div class="sidebar__post">';
            while ($query->have_posts()) {
                $query->the_post();
                echo '<div class="rc__post mb-5 d-flex align-items-center">';
                if ($show_thumbnail && has_post_thumbnail()) {
                    echo '<div class="rc__post-thumb mr-20">';
                    echo '<a href="' . get_permalink() . '">' . get_the_post_thumbnail(get_the_ID(), 'thumbnail') . '</a>';
                    echo '</div>';
                }
                echo '<div class="rc__post-content">';
                if ($show_comments) {
                    echo '<div class="rc__meta">';
                    echo '<span><i class="fa-thin fa-comments"></i> ' . get_comments_number() . ' ' . __('Comments', 'techub') . '</span>';
                    echo '</div>';
                }
                $title = get_the_title();
                if (strlen($title) > $title_limit) {
                    $title = substr($title, 0, $title_limit) . '...';
                }
                echo '<h3 class="rc__post-title"><a href="' . get_permalink() . '">' . esc_html($title) . '</a></h3>';
                echo '</div></div>';
            }
            echo '</div>';
            wp_reset_postdata();
        }

        echo $args['after_widget'];
    }
}

function register_techub_recent_posts_widget() {
    register_widget('Techub_Recent_Posts_Widget');
}
add_action('widgets_init', 'register_techub_recent_posts_widget');
