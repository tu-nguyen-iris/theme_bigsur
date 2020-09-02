<?php if (get_post_type(get_the_ID()) === "footer") {
    ?>
    <?php get_header();
    ?>
    <div class="mt-5 pt-5" style="height: 200px;"></div>
    <?php get_footer(); ?>
    <?php
}else{?>
    <?php get_header();
    ?>

    <?php get_template_part("template-parts/post/post","custom1")?>
<!--    --><?php
//    if (have_posts()) : the_post();
//        the_content();
//    endif;
//    ?>
    <?php get_footer(); ?>
<?php } ?>
