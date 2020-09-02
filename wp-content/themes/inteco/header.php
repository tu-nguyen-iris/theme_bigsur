<?php
/**
 * The header for our theme
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo THEME_URL ?>/dist/theme.css">
    <link rel="stylesheet" href="<?php echo THEME_URL ?>/dist/vendor.css">
    <?php wp_head(); ?>
</head>
<body <?php body_class() ?>>
<?php wp_body_open() ?>
<header>
    <div class="container container--custom">
        <div class="row">
            <a href="/" class="col-xl-2 col-lg-2 logo col-4">
                <?php if (has_custom_logo()):
                    the_custom_logo();
                else :?>
                    <img class="logo-default" src="<?php echo THEME_URL ?>/assets/logo.png" alt="logo">
                    <div class="line-logo"></div>
                <?php
                endif;
                ?>
            </a>
            <nav class="col-xl-7 col-lg-7 _menu d-none d-lg-block">
                <?php
                wp_nav_menu(array(
                    "container" => "",
                    "theme_location" => "primary"
                ))
                ?>
            </nav>
            <div class="_search col-xl-1 col-lg-1 col-6 d-flex justify-content-lg-start  justify-content-end">
                <a class="nav-search mr-3"> <i class="fas fa-search"></i></a>
                <a><i class="fa fa-shopping-cart"></i></a>
            </div>
            <div class="humbuger col-2 d-lg-none  ">
                <a class="nav-button"><span
                            id="nav-icon3"><span></span><span></span><span></span><span></span></span></a>
            </div>
            <div class="col-xl-2 col-lg-2 d-none d-lg-block _menu_social">
                <?php
                wp_nav_menu(array(
                    "container" => "",
                    "theme_location" => "social"
                ))
                ?>
            </div>
        </div>
    </div>
    <div class="fixed-top-custom dineuron-menu">
        <div class="flex-center p-5">
            <ul class="nav flex-column">
                <?php
                wp_nav_menu(array(
                    "container" => "",
                    "theme_location" => "primary"
                ))
                ?>
            </ul>
        </div>
    </div>
    <div class="fixed-top-custom-1  _search_menu">
        <div class="flex-center p-5">

            <?php get_search_form(); ?>
        </div>
    </div>
</header>
