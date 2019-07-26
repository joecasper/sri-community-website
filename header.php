<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>" />
        <meta name="viewport" content="width=device-width" />
        <link href="https://fonts.googleapis.com/css?family=Cormorant:600|Open+Sans:400,400i,600,600i|Raleway:600,800&display=swap" rel="stylesheet">
        <?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?>>
        <div id="wrapper" class="hfeed">
            <header id="header">
                <div class="wrapper columns">
                    <div id="site-logo" class="column">                        
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                            <img src="<?php the_field('community_logo', 'option'); ?>" alt="<?php echo esc_html( get_bloginfo( 'name' ) ); ?>" />
                        </a>                        
                    </div>
                    <nav id="main-navigation" class="column" role="navigation">
                        <!-- <div id="search"><?php get_search_form(); ?></div> -->
                        <?php wp_nav_menu( array( 'theme_location' => 'main-menu' ) ); ?>
                    </nav>
                </div>
            </header>
            <div id="container" class="wrapper">