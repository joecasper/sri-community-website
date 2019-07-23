<?php get_header(); ?>

<main id="content">
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <section id="featured-slider">
                <div class="slide">
                    <a href="" title="">
                        <img src="http://communitywebsite.com/wp-content/uploads/homebanner-slide1.jpg" alt="">
                    </a>
                </div>
                <div class="slide">
                    <a href="" title="">
                        <img src="http://communitywebsite.com/wp-content/uploads/artful-dining-slide.jpg" alt="">
                    </a>
                </div>
                <div class="slide">
                    <a href="" title="">
                        <img src="http://communitywebsite.com/wp-content/uploads/zestful-activities-slide.jpg" alt="">
                    </a>
                </div>
                <div class="slide">
                    <a href="" title="">
                        <img src="http://communitywebsite.com/wp-content/uploads/heartful-care-slide.jpg" alt="">
                    </a>
                </div>
            </section>
            <section id="introduction">
                <div class="wrapper">
                    <h1><?php the_field('heading'); ?></h1> 
                    <p><?php the_field('content'); ?></p> 
                </div>
            </section>
            <section id="featured-links">
                <div class="wrapper">
                    <?php if( have_rows('featured_link') ): ?>
                        <?php while( have_rows('featured_link') ): the_row(); 
                            $image_url = get_sub_field('bg_image');
                            $caption_text = get_sub_field('image_caption');
                            $link_url = get_sub_field('featured_link_url');
                            $button_text = get_sub_field('cta_button_display_text');
                        ?>
                            <a class="featured-link" href="<?php echo $link_url; ?>" style="background-image: url(<?php echo $image_url; ?>);">
                                <span class="caption"><?php echo $caption_text; ?></span>
                                <span class="cta-button"><?php echo $button_text; ?></span>
                            </a>
                        <?php endwhile; ?>
                    <?php endif; ?> 
                </div>
            </section>
        </article>
    <?php endwhile; endif; ?>
</main>

<?php get_footer(); ?>