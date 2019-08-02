<?php
    $headshot_image = get_field('headshot_image');
    $position_title = get_field('position_title');
    $experience = get_field('experience');
    $personal_goal = get_field('personal_goal');
    $inspirational_quote = get_field('inspirational_quote');
?>

<div class="staff-member">
    <div class="image">
        <img src="<?= $headshot_image ?>" alt="<?= the_title() ?>">
    </div>
    <div class="content">
        <h5><?= the_title() ?><br><span><?= $position_title ?></span></h5>
        
        <?php if ( $experience ): ?>
            <p><strong>Experience</strong><br><?= $experience ?></p>
        <?php endif; ?>
        
        <?php if ( $personal_goal ): ?>
            <p><strong>Personal Goal</strong><br><?= $personal_goal ?></p>
        <?php endif; ?>

        <?php if ( $inspirational_quote ): ?>
            <p><strong>Inspirational Quote</strong><br><?= $inspirational_quote ?></p>
        <?php endif; ?>
    </div>
</div>

