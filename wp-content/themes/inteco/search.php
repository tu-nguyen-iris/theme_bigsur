<?php get_header() ?>
<section class="cover" style="background-image: url(<?php echo THEME_URL ?>/assets/port-title.jpg)">
    <div class="img-backg"></div>
    <div class="content content--search">
        <div class="container">
            <div class="title">
                <h1 class="title-tag">Search Results</h1>
                <p> <?php the_search_query(); ?></p>
            </div>
        </div>
    </div>
</section>
<section class="search-page">
    <div class="container">
        <div class="row">
            <div class="col-xl-7 col-lg-7">
                <?php
                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                $s = get_search_query();
                $args = array(
                    's' => $s,
                    'paged' => $paged,
                    "posts_per_page" => 2
                );
                $the_query = new WP_Query($args);
                if ($the_query->have_posts()) {
                    while ($the_query->have_posts()) {
                        $the_query->the_post();
                        ?>
                        <div class="_search-result">
                            <a href="<?php the_permalink() ?>" class="title d-flex">
                                <p class="time"><?php echo get_the_date('dS  ', $post->ID) ?></p>
                                <h2 class="tipsy"><?php the_title() ?></h2>
                            </a>
                            <div class="author d-flex">
                                <p class="date"><?php echo get_the_date() ?></p>
                                <p class="the_author">BY <?php the_author() ?></p>
                            </div>
                            <a href="<?php the_permalink() ?>" class="btn mt-5 ">READ MORE</a>
                        </div>
                        <?php
                    }  ?>
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

                <?php } else {
                    ?>
                    <h2 class="mt-5" style='font-weight:bold;color:#000'>Nothing Found</h2>
                    <div class="alert alert-info">
                        <p>Sorry, but nothing matched your search criteria. Please try again with some different
                            keywords.</p>
                    </div>
                <?php } ?>
            </div>
            <div class="col-lg-5 col-lg-5">
                <?php dynamic_sidebar("custom-side-bar-1")?>
            </div>
        </div>
    </div>
</section>
<?php get_footer() ?>
