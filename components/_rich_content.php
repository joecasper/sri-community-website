<?php
    $content_heading = get_sub_field('content_heading');
    $rich_content = get_sub_field('rich_content');
    $has_cta_button = get_sub_field('has_cta_button');
?>

<div class="modular-block rich-content">
    <h3 class="content-heading"><?php echo $content_heading; ?></h3>
    <div class="content">
        <?php echo $rich_content; ?>
    </div>
    <?php if ( $has_cta_button ): ?>
        <a class="button" href="<?php the_sub_field('cta_button_link_url'); ?>"><?php the_sub_field('cta_button_display_text'); ?></a>
    <?php endif; ?>
</div>