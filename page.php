<?php get_header(); ?>

<?php get_template_part('template-parts/head'); ?>

<?php get_template_part('template-parts/nav','header'); ?>

    <div class="container dmbs-content-wrapper">
        <div class="row">

            <?php get_template_part( 'template-parts/sidebar', 'left' ); ?>

            <div class="col-md-<?php echo devdmbootstrap_column_size('main'); ?> dmbs-main">

                <?php if ( have_posts() ) : ?>

                    <?php
                    // Start the loop.
                    while ( have_posts() ) : the_post(); ?>

                        <article id="post-<?php the_ID(); ?>" <?php post_class('dmbs-page'); ?>>

                            <header class="dmbs-page-header">
                                <h1 class="dmbs-page-title"><?php the_title(); ?></h1>
                            </header>

                            <div class="dmbs-page-content">

                                <?php
                                the_content( sprintf(
                                    wp_kses( esc_html__( 'Continue reading %s', 'devdmbootstrap4' ), array( 'span' => array( 'class' => array() ) ) ),
                                    the_title( '<span class="screen-reader-text">"', '"</span>', false )
                                ) );
                                ?>

                            </div>

                        </article>

                        <?php comments_template( '/template-parts/comments.php'); ?>

                    <?php
                        // End the loop.
                    endwhile;
                    ?>

                <?php endif; ?>
            </div>

            <?php get_template_part( 'template-parts/sidebar', 'right' ); ?>

        </div>
    </div>

<?php get_template_part('template-parts/nav','footer'); ?>

<?php get_footer(); ?>