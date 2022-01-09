<section class="home-projects-container" data-scroll-section>
    <div class="title-wrap master-padding">
        <span><?php echo get_field('project_title');?></span>
    </div>
    <div class="home-projects-wrap big-padding">
        <?php if($main_project):?>
        <a href="<?php echo get_the_permalink($main_project); ?>" class="row big-project-item">
            <div class="col-12 col-lg-6 col-xl-5">
                <h2 data-scroll data-scroll-repeat="true"><?php echo get_the_title($main_project);?></h2>
                <div class="content" data-scroll data-scroll-repeat="true">
                    <p>
                        <?php echo get_field('project_text');?>
                    </p>
                    <img src="<?php bloginfo('template_url');?>/assets/img/right-arrow.svg" alt="">
                </div>
            </div>
            <div class="col-12 col-lg-6 col-xl-7">
                <div class="big-project-media" data-scroll data-scroll-repeat="true">
                    <?php echo get_the_post_thumbnail($main_project,'large');?>
                </div>
            </div>
        </a>
        <?php endif; ?>
        <?php if (have_rows('projects')):?>
        <div class="row mini-project-list">
            <?php while (have_rows('projects')):the_row();
            $project_Id = get_sub_field('project');?>
                    <div class="col-12 col-lg-4" data-scroll data-scroll-repeat="true">
                        <a href="<?php echo get_the_permalink($project_Id);?>" class="mini-project-item">
                            <div class="mini-project-media">
                                <?php echo get_the_post_thumbnail($project_Id,'large');?>
                            </div>
                            <div class="mini-project-content">
                                <span><?php echo get_the_title($project_Id);?></span>
                                <img src="<?php bloginfo('template_url');?>/assets/img/right-arrow.svg" >
                            </div>
                        </a>
                    </div>
            <?php endwhile;?>
        </div>
        <?php endif;?>
    </div>
</section>
