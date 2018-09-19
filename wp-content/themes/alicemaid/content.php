<article id="post-<?php the_ID() ?>" <?php post_class() ?>>
        <div class="entry-thumbnail">
                <?php alice_thumbnail( 'large' ); ?>
    </div>
    <div class="entry-header">
                <?php alicemaid_entry_header() ?>
                <?php alicemaid_meta() ?>
    </div>
    <div class="entry-content <?php echo(is_single() ? 'single' : '') ?>">
                <?php alicemaid_entry_content() ?>
    </div>
</article>