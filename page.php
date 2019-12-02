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
                <?php 
                    // check if the flexible content field has rows of data
                    if ( have_rows('content_blocks') ):
                        // loop through the rows of data
                        while ( have_rows('content_blocks') ) : the_row();
                            // check current row layout
                            if ( get_row_layout() == 'image_with_rich_content' ):
                                include 'components/_image_with_rich_content.php';
                            endif;

                            if ( get_row_layout() == 'rich_content' ):
                                include 'components/_rich_content.php';
                            endif;
                        endwhile;
                    endif;
                ?>
            </div>
        </article>
        <!-- Sidebar -->
        <?php get_sidebar(); ?>
    <?php endwhile; endif; ?>
</main>

<?php get_footer(); ?>