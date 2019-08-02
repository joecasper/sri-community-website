<?php get_header(); ?>

<main id="content" class="has-sidebar">
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <header class="header">
                <?php if ( has_post_thumbnail() ) { the_post_thumbnail(); } ?>
                <h1 class="entry-title"><?php the_title(); ?></h1>
            </header>
            <div class="entry-content">
                <div class="modular-block">
                    <?php the_content(); ?>
                </div>
                
                <div class="modular-block columns">
                    <div class="form-container column span-7">
                        <?php echo do_shortcode( '[contact-form-7 id="6" title="Contact Us Form"]' ); ?>
                    </div>
                    <div class="job-openings-callout column span-3">
                        <h3>Job Openings</h3>
                        <p>If you are interested in viewing our current job openings, please visit our Careers page by clicking the button below.</p>
                        <a class="button" href="/careers/">View Now</a>
                    </div>
                </div>
            </div>
        </article>
        <!-- Sidebar -->
        <?php get_sidebar(); ?>
    <?php endwhile; endif; ?>
</main>

<?php get_footer(); ?>