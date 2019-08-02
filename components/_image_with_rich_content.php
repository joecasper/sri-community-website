<?php
    $content_align = get_sub_field('content_align');
    $image = get_sub_field('image');
    $image_placement = get_sub_field('image_placement');
    $image_size = get_sub_field('image_size');
    $content_heading = get_sub_field('content_heading');
    $rich_content = get_sub_field('rich_content');
    $has_cta_button = get_sub_field('has_cta_button');
?>

<div class="modular-block image-rich-content align-<?php echo $content_align; ?> image-<?php echo $image_placement; ?> image-<?php echo $image_size; ?>">
    <div class="image">
        <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
    </div>
    <div class="content">
        <h3 class="content-heading"><?php echo $content_heading; ?></h3>
        <div class="rich-content">
            <?php echo $rich_content; ?>
        </div>
        <?php if ( $has_cta_button ): ?>
            <a class="button" href="<?php the_sub_field('cta_button_link_url'); ?>"><?php the_sub_field('cta_button_display_text'); ?></a>
        <?php endif; ?>
    </div>
</div>