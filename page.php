<?php get_header(); ?>

<main id="content" class="has-sidebar">
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
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <div class="entry-content">
                <div class="modular-block">
                    <?php the_content(); ?>
                </div>
            </div>
        </article>
        <!-- Sidebar -->
        <?php get_sidebar(); ?>
    <?php endwhile; endif; ?>
</main>

<?php get_footer(); ?>