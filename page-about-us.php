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

                <?php
                    // Staff Grid
                    $args = array(
                        'post_type'   => 'staff',
                        'post_status' => 'publish',
                    );
                    $staff = new WP_Query( $args );
                    
                    if( $staff->have_posts() ):
                        $sep_heading_text = 'Community Directors';
                        include 'components/_heading_separator.php';
            
                        echo '<div class="modular-block staff-grid">';
                            while( $staff->have_posts() ) :
                                $staff->the_post();
                                include 'components/_staff_grid.php';
                            endwhile;
                        echo '</div>';
                        wp_reset_postdata();
                    endif;
                ?>

                <hr class="modular-block">

                <div class="modular-block image-rich-content align-middle image-left image-small">
                    <div class="image">
                        <img src="/wp-content/uploads/SRI-Final-Logo-Blue-1.png" alt="SRI Management">
                    </div>
                    <div class="content">
                        <h3 class="content-heading">An Experienced Management Team</h3>
                        <div class="rich-content">
                            <p>SRI Management, LLC is a privately held company, established in 2000. Driven by a desire to make a positive impact for today’s seniors and their families, SRI provides residences and experiences that engage residents socially, mentally and spiritually.</p>
                            <p>SRI Management believes in treating others like we would want to be treated ourselves. Managing by the “Golden Rule” philosophy has helped the company expand, adding Independent Living, Assisted Living and Memory Care communities throughout the Southeast.</p>
                        </div>
                        <a class="button" href="https://srimgt.com" target="_blank">Visit SRI Management Website</a>
                    </div>
                </div>
            </div>
        </article>
    <?php endwhile; endif; ?>
</main>

<?php get_footer(); ?>