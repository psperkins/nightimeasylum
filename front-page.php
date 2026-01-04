<?php get_header(); ?>

    <div class="container content">
        <div class="row">
            <div class="sidebar-left col-sm-4">
                <?php if ( is_active_sidebar( 'main-page-sidebar' ) ) { ?>
                    <ul id="sidebar">
                        <?php dynamic_sidebar('main-page-sidebar'); ?>
                    </ul>
                <?php } ?>
            </div>
            <div class="main-content col-sm-8">
                    <?php get_template_part('template-parts/front'); ?>
            </div>
        </div>
    </div>

<?php get_footer(); ?>