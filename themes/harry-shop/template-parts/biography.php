<?php
$facebook_url = get_the_author_meta('facebook');
$twitter_url = get_the_author_meta('twitter');
$linkedin_url = get_the_author_meta('linkedin');
$pinterest_url = get_the_author_meta('pinterest');
?>

<div class="border border-1 border-warning rounded p-3 mb-50 bg-info bg-opacity-75">

    <div class="row">
        <div class="col-xl-4">
            <?php echo get_avatar(get_the_author_meta("ID"), 180, "", get_the_author_meta('display_name'), ['class' => 'border border-2 border-warning rounded-circle']) ?>

        </div>
        <div class="col-xl-8">
            <h4><?php echo get_the_author_meta('display_name') ?></h4>
            <p><?php echo get_the_author_meta('description') ?></p>
            <div class="socials tp-postbox-details-share">
                <?php if (!empty($facebook_url)) : ?>
                    <a target="_blank" href="<?php echo esc_url($facebook_url); ?>"><i class="fa-brands fa-facebook-f"></i></a>
                <?php endif; ?>
                <?php if (!empty($twitter_url)) : ?>
                    <a target="_blank" href="<?php echo esc_url($twitter_url); ?>"><i class="fa-brands fa-twitter"></i></a>
                <?php endif; ?>
                <?php if (!empty($linkedin_url)) : ?>
                    <a target="_blank" href="<?php echo esc_url($linkedin_url); ?>"><i class="fa-brands fa-linkedin-in"></i></a>
                <?php endif; ?>
                <?php if (!empty($pinterest_url)) : ?>
                    <a target="_blank" href="<?php echo esc_url($pinterest_url); ?>"><i class="fa-brands fa-pinterest"></i></a>
                <?php endif; ?>

            </div>
        </div>
    </div>
</div>