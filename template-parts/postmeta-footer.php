<div class="dmbs-post-meta-footer">

    <div class="dmbs-post-meta-categories">
        <?php _e('Posted In ','devdmbootstrap4'); the_category(', '); ?>
    </div>

    <?php if( has_tag() ) : ?>
        <div class="dmbs-post-meta-tags">
            <span class="fa fa-tags"></span> <?php the_tags(); ?>
        </div>
    <?php endif; ?>

</div>