<a href="javascript:void(0)" onclick="openShareWindow('https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>')" class="facebook">
    <i class="fab fa-facebook-f"></i>
</a>
<a href="javascript:void(0)" onclick="openShareWindow('https://twitter.com/intent/tweet?url=<?php the_permalink(); ?>&text=<?php the_title(); ?>')" class="twitter">
    <i class="fab fa-twitter"></i>
</a>
<a href="javascript:void(0)" onclick="openShareWindow('https://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink(); ?>')" class="linkedin">
    <i class="fab fa-linkedin-in"></i>
</a>
<a href="javascript:void(0)" onclick="openShareWindow('https://www.pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&media=<?php echo get_the_post_thumbnail_url(); ?>&description=<?php the_title(); ?>')" class="pinterest">
    <i class="fab fa-pinterest-p"></i>
</a> 
