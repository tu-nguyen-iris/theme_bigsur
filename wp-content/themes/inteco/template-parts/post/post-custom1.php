<section class="cover" style="background-image: url(
<?php if (has_post_thumbnail()) {
    the_post_thumbnail_url();
} else { ?>
    <?php echo THEME_URL ?>/assets/etienn.jpg
<?php } ?>
        )">
    <div class="img-backg"></div>
    <div class="content">
        <div class="container">
            <div class="title">
                <p class="the_time">
                    <?php echo get_the_date('dS M ', $post->ID) ?>
                </p>
                <h1 class="title-tag"><?php the_title() ?></h1>
            </div>
        </div>
    </div>
</section>
<section class="post_content">
    <div class="container">
        <div class="row">
            <div class="col-xl-7 col-lg-7">
                <?php if (have_posts()) : the_post();
                    the_content();
                endif; ?>
            </div>
            <div class="col-xl-5 col-lg-5">
                <?php dynamic_sidebar("custom-side-bar") ?>
            </div>
        </div>
    </div>
</section>



