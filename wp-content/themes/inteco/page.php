<?php
if (is_page(array("comming-soon","maintenance"))) {
    get_header("comming-soon");
} else {
    get_header();
} ?>
<?php if (have_posts()) : the_post();
    the_content();
endif;
?>
<?php get_footer() ?>
