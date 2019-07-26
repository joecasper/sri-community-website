<?php get_header(); ?>

<main id="content">
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <?php the_title(); ?>
            <section class="intro">
                <aside class="featured-text">
                    <p><?php the_field('heading_text'); ?></p>
                    <p><?php the_field('line_1_text'); ?><br><?php the_field('line_2_text'); ?><br><?php the_field('line_3_text'); ?></p>
                </aside>
                <div class="content">
                    <?php the_content(); ?>
                </div>
            </section>
            <!-- Amenities and Floor Plans -->
            <section class="featured-sections">
                <img src="<?php the_field('floor_plans_featured_image'); ?>" width="300" alt="">
                <h3><?php the_field('floor_plans_page_heading'); ?></h3>
                <p><?php the_field('floor_plans_teaser_content'); ?></p>
                <a href="">Learn More</a>
            </section>
        </article>

        <?php get_sidebar(); ?>
    <?php endwhile; endif; ?>
</main>

<?php get_footer(); ?>