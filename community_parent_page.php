<?php /* Template Name: Community Parent Page */ ?>

<?php get_header(); ?>

<main id="content" class="has-sidebar">
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <header class="header">
                <h1 class="entry-title"><?php the_title(); ?></h1>
            </header>
            <!-- Introduction -->
            <section class="intro">
                <aside class="featured-text">
                    <p><span><?php the_field('intro_heading_text'); ?></span><?php the_field('intro_line_1_text'); ?><br><?php the_field('intro_line_2_text'); ?><br><?php the_field('intro_line_3_text'); ?></p>
                </aside>
                <div class="content">
                    <p><?php the_field('intro_content'); ?></p>
                </div>
            </section>
            <!-- Featured Sections -->
            <?php if( have_rows('featured_sections') ): ?>
                <section class="featured-sections">
                    <?php while( have_rows('featured_sections') ): the_row(); 
                        // sub fields
                        $heading_text = get_sub_field('heading_text');
                        $featured_image = get_sub_field('featured_image');
                        $teaser_content = get_sub_field('teaser_content');
                        $linked_page = get_sub_field('linked_page');
                    ?>
                        <div class="featured-section">
                            <div class="featured-section-image">
                                <img src="<?= $featured_image ?>" alt="">
                            </div>
                            <div class="featured-section-content">
                                <h3><?php echo $heading_text; ?></h3>
                                <div>
                                    <?php echo $teaser_content; ?>
                                </div>
                                <a class="button" href="<?php echo $linked_page; ?>">Learn More</a>
                            </div>                            
                        </div>
                    <?php endwhile; ?>
                </section>
            <?php endif; ?>
        </article>
        <!-- Sidebar -->
        <?php get_sidebar(); ?>
        <!-- Full-width Content -->
        <div class="full-width-three-column">
            <header>
                <?php    
                    $sep_heading_text = get_field('additional_callouts_heading');
                    include 'components/_heading_separator.php';
                ?>
                <div><?php the_field('additional_callouts_content'); ?></div>
            </header>
            <!-- Additional Callouts -->
            <?php if( have_rows('additional_callouts') ): ?>
                <section class="additional-callouts">
                    <?php while( have_rows('additional_callouts') ): the_row(); 
                        // sub fields
                        $featured_image = get_sub_field('featured_image');
                        $heading_text = get_sub_field('heading_text');
                        $linked_page = get_sub_field('linked_page');
                    ?>
                        <a class="callout" href="<?php echo $linked_page; ?>" style="background-image: url(<?php echo $featured_image; ?>);">
                            <span class="caption"><?php echo $heading_text; ?></span>
                            <span class="cta-button">Learn More</span>
                        </a>
                    <?php endwhile; ?>
                </section>
            <?php endif; ?>
        </div>
    <?php endwhile; endif; ?>
</main>

<?php get_footer(); ?>