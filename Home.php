<?php /* Template Name: Home TPL*/ ?>
<?php get_header();?>
    <div class="o-scroll" id="js-scroll" data-scroll-container>
    <main class="wrapper HomeWrapper" data-scroll-container>
        <div class="container-fluid p-0">
            <div class="row g-0">
                <div class="col-12">
                   <?php
                    if(have_rows('slider')):?>
                    <?php include_once ('tmp/index-slider.php');?>
                    <?php endif; ?>
                    <?php include_once ('tmp/index-description.php');
                    $video_file = get_field('video_file');
                    if($video_file):?>
                    <?php include_once ('tmp/index-video.php');
                    endif;
                    $main_project = get_field('main_project');
                    if($main_project OR have_rows('project')):?>
                    <?php include_once ('tmp/index-projects.php');
                    endif;
                    if(have_rows('services')):?>
                    <?php include_once ('tmp/index-services.php');
                    endif;?>
                </div>
            </div>
        </div>
    </main>
<?php get_footer();?>