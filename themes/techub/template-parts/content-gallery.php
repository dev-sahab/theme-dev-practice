<?php
$gallery = function_exists('get_field') ? get_field('gallery') : null;
$thumbnail_url = has_post_thumbnail() ? get_the_post_thumbnail_url() : '';
$hasTag = has_tag() ? "text-lg-end" : "";

if (is_single()) : ?>

    <article id="post-<?php the_ID() ?>" <?php post_class("tp-postbox-item") ?>>




        <?php if (!empty($gallery) || $thumbnail_url) : ?>
            <div class="tp-postbox-thumb p-relative">
                <div class="swiper blogCardSlider fix">
                    <div class="swiper-wrapper ">

                        <?php if ($thumbnail_url) : ?>
                            <div class="swiper-slide">
                                <img src="<?php echo $thumbnail_url ?>" alt="<?php echo the_title_attribute(); ?>">
                            </div>

                        <?php endif; ?>


                        <?php foreach ($gallery as $key => $gal) : ?>
                            <div class="swiper-slide">
                                <img src="<?php echo $gal['url'] ?>" alt="<?php echo $gal['alt'] ?>">
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
            </div>
        <?php endif; ?>



        <div class="tp-postbox-content">
            <?php echo get_template_part('template-parts/blog/meta') ?>
            <h1 class="tp-postbox-title">
                <?php the_title(); ?>
            </h1>
            <div class="tp-postbox-details-text">
                <?php the_content() ?>
            </div>
        </div>
    </article>
    <div class="tp-postbox-details-share-wrapper">
        <div class="row">
            <?php if(has_tag()) : ?>
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="tp-postbox-details-tag d-flex align-items-center">
                    <span><?php echo esc_html__('Tag', 'techub') ?>:</span>
                    <?php echo techub_get_tags() ?>
                </div>
            </div>
            <?php endif; ?>
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="tp-postbox-details-share <?php esc_attr($hasTag) ?>">
                    <span><?php echo esc_html__('Share', 'techub') ?>:</span>
                    <?php get_template_part('/template-parts/blog/share') ?>
                </div>
            </div>
        </div>
    </div>


<?php else : ?>
    <article id="post-<?php the_ID() ?>" <?php post_class("tp-postbox-item mb-50") ?>>
        <? if (!empty($gallery)) : ?>
            <div class="tp-postbox-thumb p-relative">
                <div class="swiper blogCardSlider fix">
                    <div class="swiper-wrapper ">
                        <?php foreach ($gallery as $key => $gal) : ?>
                            <div class="swiper-slide">
                                <img src="<?php echo $gal['url'] ?>" alt="<?php echo $gal['alt'] ?>">
                            </div>

                        <?php endforeach; ?>
                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>

                <div class="tp-postbox-date-text">
                    <span><?php the_time("d") ?><br><?php the_time("M") ?></span>
                </div>
            </div>
        <? endif; ?>
        <div class="tp-postbox-content">
            <?php echo get_template_part('template-parts/blog/meta') ?>
            <h3 class="tp-postbox-title">
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </h3>
            <div class="tp-postbox-text">
                <?php the_excerpt() ?>
            </div>
            <?php echo get_template_part("template-parts/blog/button"); ?>
        </div>
    </article>

<?php endif; ?>