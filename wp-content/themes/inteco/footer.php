<?php
$q = new WP_Query(array('post_type' => 'footer'));
if ($q->have_posts()) : while ($q->have_posts()) : $q->the_post();
    the_content();
endwhile;
endif;
?>
<script src="<?php echo THEME_URL?>/dist/vendors.js"></script>
<script src="<?php echo THEME_URL?>/dist/app.js"></script>
<?php wp_footer(); ?>
</body>
</html>
