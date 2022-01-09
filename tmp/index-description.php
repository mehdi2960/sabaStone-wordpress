<?php $group_description_index=sabastone_get_option('group_description_index');?>
<section class="homeIntroduction" data-scroll-section>
    <h1 data-scroll data-scroll-repeat="true">
        <?php echo get_field('description_title');?>
    </h1>
    <div class="content" data-scroll data-scroll-repeat="true">
        <p>
            <?php echo get_field('description_text');?>
        </p>
    </div>
</section>