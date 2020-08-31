<?php
/**
 * The header for our theme
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
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
            <div class="col-xl-2 col-lg-2 logo">
				<?php if ( has_custom_logo() ):
					the_custom_logo();
				else :?>
                    <img class="logo-default" src="<?php echo THEME_URL ?>/assets/logo.png" alt="logo">
				<?php
				endif;
				?>
                <div class="line-logo"></div>
            </div>
            <nav class="col-xl-7 col-lg-7 _menu">
				<?php
				wp_nav_menu( array(
					"container"      => "",
					"theme_location" => "primary"
				) )
				?>
            </nav>
            <div class="col-xl-3 col-lg-3 _menu_social">
				<?php
				wp_nav_menu( array(
					"container"      => "",
					"theme_location" => "social"
				) )
				?>
            </div>
        </div>
    </div>
</header>
