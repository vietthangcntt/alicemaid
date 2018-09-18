<?php get_header(); ?>
<div class="content">
    <div class="container">
        <div class="row">
            <div class="col-md-8">                          
                <div id="main-section">
                
                    <?php if (have_posts()) : while (have_posts()) : the_post() ; ?>
                        <?php get_template_part('content',get_post_format()); ?>
                        <?php endwhile; ?>
                        <?php else : ?>
                            <?php get_template_part('content','none'); ?>
                    <?php endif ?>
                </div>
            </div>
            <div class="col-md-4">
                <div id="sidebar">
                        <?php get_sidebar(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>