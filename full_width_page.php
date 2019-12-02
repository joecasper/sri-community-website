<?php /* Template Name: Full-Width Page */ ?>

<?php get_header(); ?>

<main id="content">
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <header class="page-header">
            <div class="page-header-featured_image">
                <?php if ( has_post_thumbnail() ) { the_post_thumbnail(); } ?>
            </div>
            <div class="page-header-info">
                <h1 class="entry-title"><?php the_title(); ?></h1>
                <?php include 'components/_breadcrumbs.php'; ?>
            </div>
        </header> 
    <?php endwhile; endif; ?>
</main>

<?php get_footer(); ?>