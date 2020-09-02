<?php get_header() ?>
<?php
echo do_shortcode('[smartslider3 slider="7"]');
?>
    <section class="_blog">
        <div class="container">
            <div class="row">
                <div class="col-xl-7 col-lg-7 col-12">
                    <?php
                    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                    $query = new WP_Query(array("post_type" => "post", 'paged' => $paged,
                        "posts_per_page" => 2));
                    if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post();
                        ?>
                        <div class="card-post">
                            <a href="<?php the_permalink() ?>">  <?php if (has_post_thumbnail()) {
                                    echo "<img src='" . get_the_post_thumbnail_url() . "'>";
                                } else { ?>
                                    <img src="<?php echo THEME_URL ?>/assets/blog-item-1-1400x889.jpg"><?php
                                } ?></a>
                            <div class="content">
                                <h2 class="title"><?php the_title() ?></h2>
                                <div class="description">
                                    <p><?php echo get_the_date() ?></p>
                                    <p><?php echo get_the_author() ?></p>
                                    <?php echo '<p>' . get_the_category($id)[0]->name . '</p>'; ?>
                                </div>
                                <?php the_excerpt() ?>
                                <a href="<?php the_permalink() ?>" class="btn">READ MORE</a>
                            </div>
                        </div>
                    <?php
                    endwhile;
                        wp_reset_postdata();
                    endif;
                    ?>
                    <div class="_panigation">
                        <?php $total_pages = $query->max_num_pages;
                        if ($total_pages > 1) {
                            $current_page = max(1, get_query_var('paged'));
                            echo paginate_links(array(
                                'base' => get_pagenum_link(1) . '%_%',
                                'format' => '/page/%#%',
                                'current' => $current_page,
                                'total' => $total_pages,
                                'prev_text' => ('« prev'),
                                'next_text' => ('next »'),
                            ));
                        } ?>
                    </div>
                </div>
                <div class="col-xl-5 col-lg-5 col-12 _slidebar ">
                    <?php dynamic_sidebar('custom-side-bar'); ?>                </div>
            </div>
        </div>
    </section>

<?php get_footer() ?>