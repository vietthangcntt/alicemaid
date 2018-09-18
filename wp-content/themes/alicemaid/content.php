<article id="post-<?php the_ID() ?>" <?php post_class() ?>>
        <div class="entry-thumbnail">
                <?php alice_thumbnail( 'large' ); ?>
    </div>
    <div class="entry-header">
                <?php entry_header() ?>
                <?php meta() ?>
    </div>
    <div class="entry-content <?php echo(is_single() ? 'single' : '') ?>">
                <?php entry_content() ?>
    </div>
</article>