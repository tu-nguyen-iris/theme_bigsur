<form role="search" method="get" class="form-search " action="<?php echo home_url('/'); ?>">
    <input type="search" class="_search-field_404" placeholder="<?php echo esc_attr_x('Search', 'placeholder'); ?>"
           value="<?php echo get_search_query(); ?>" name="s"
           title="<?php echo esc_attr_x('Search for:', 'label'); ?>"/>
    <button class="sub-button" type="submit"><i class="fa fa-search"></i></button>
</form>