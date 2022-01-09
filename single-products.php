<?php get_header(); ?>

<div class="o-scroll" id="js-scroll" data-scroll-container>
    <main class="wrapper singleProductWrapper" data-scroll-container>
         <?php while (have_posts()) : the_post();
        $pageID = get_the_ID();?>
        <div class="container-fluid p-0">
            <div class="row g-0">
                <div class="col-12">
                    <section class="single-product-slogan big-padding marginTop" data-scroll-section>
                        <div class="row">

                             <div class="col-12 col-lg-6 col-xl-4">
                                <div class="sP-info">
                                    <h1 data-scroll data-scroll-repeat="true"><?php the_title();?></h1>
                                    <div class="content" data-scroll data-scroll-repeat="true">
                                        <p>
                                            <?php the_content();?>
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-lg-6 col-xl-8">
                                <div class="sP-slider-container">
                                    <div class="swiper singleProductSwiper">

                                        <div class="swiper-wrapper">
                                            <?php while (have_rows('slider_image')):the_row(); ?>
                                            <div class="swiper-slide">
                                                <div class="media-box">
                                                    <img src="<?php echo get_sub_field('image')['sizes']['large'];?>" alt="">
                                                </div>
                                            </div>
                                            <?php endwhile; ?>
                                        </div>
                                        <div class="swiper-pagination"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <section class="sP-technical-detail big-padding" data-scroll-section>
                        <div class="tD-title">
                            <span>Technical Details</span>
                        </div>
                        <div class="row technical-detail-wrap justify-content-xl-between">
                            <div class="col-12 col-lg-6 col-xl-5">
                                <h2 data-scroll="" data-scroll-repeat="true" class="is-inview"><?php echo get_field('titleMain');?></h2>
                                <div class="content" data-scroll data-scroll-repeat="true">
                                    <p><?php echo get_field('description');?></p>
                                </div>
                                <div class="material-media" data-scroll data-scroll-repeat="true">
                                    <img src="<?php echo get_field('image')['sizes']['large'];?>" alt="">
                                </div>
                            </div>
                            <div class="col-12 col-lg-6 col-xl-6">
                                <h2 data-scroll data-scroll-repeat="true"><?php echo get_field('titledimesion');?></h2>
                                <div class="isometrics-boxes" data-scroll data-scroll-repeat="true">
                                    <div class="isometrics-image">
                                        <img src="<?php echo get_field('imagedimesion')['sizes']['large'];?>" alt="">
                                    </div>
                                    <div class="dimensions-box">
                                        <span class="depth"><?php echo get_field('dimensions-box');?></span>
                                        <span class="width">~ <?php echo get_field('dimensions-box_two');?></span>
                                        <span class="height"><?php echo get_field('dimensions-box_three');?></span>
                                    </div>
                                </div>
                                <div class="dimension-products" data-scroll data-scroll-repeat="true">
                                    <div class="dP-box">
                                        <div class="box">
                                            <div class="dp-number">

                                                <span class="height"><?php echo get_field('box_one');?></span>
                                                <span class="width">  <?php echo get_field('box_two');?></span>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="dP-box">
                                        <div class="box two">
                                            <div class="dp-number">

                                                <span class="height"><?php echo get_field('box_one');?></span>
                                                <span class="width"><?php echo get_field('box_one');?></span>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <section class="color-range-container" data-scroll-section>
                        <div class="title-wrap master-padding">
                            <span><?php echo get_field('titlecolor');?></span>
                        </div>
                        <ul class="color-range-list-items big-padding">
                            <?php if (have_rows('colorblock')):?>
                            <?php while (have_rows('colorblock')):the_row()?>
                                <li class="color-range-list-item" data-scroll data-scroll-repeat="true">
                                    <span style="background-color: <?php echo get_sub_field('color')?>"></span>
                                </li>
                            <?php endwhile;?>
                           <?php endif;?>

                        </ul>
                    </section>
                    <section class="s-p-features-container big-padding" data-scroll-section>
                        <ul class="s-p-features-items">
                            <?php if (have_rows('bankimage')): ?>
                            <?php while (have_rows('bankimage')): the_row()?>
                            <li class="s-p-features-item" data-scroll data-scroll-repeat="true">
                                <div class="img">
                                    <img src="<?php echo get_sub_field('imagebank')['sizes']['thumbnail'];?>" alt="">
                                </div>
                                <span><?php echo get_sub_field('titlebank');?></span>
                            </li>
                            <?php endwhile;?>
                            <?php endif;?>

                        </ul>
                    </section>
                    <section class="home-projects-container" data-scroll-section>
                        <div class="title-wrap master-padding">
                            <span><?php _e('related projects','dokmeh')?></span>
                        </div>
                        <div class="home-projects-wrap big-padding">
                            <div class="row mini-project-list">
                                  <?php
                                        $args = array(
                                            'post_type' => 'project',
                                            'post_status' => 'publish',
                                            'posts_per_page' => 3,
                                            'orderby' => 'rand',
                                        );?>
                                            <?php
                                            $relatedPosts = new WP_Query( $args );
                                            if($relatedPosts->have_posts()){
                                            while($relatedPosts->have_posts()): $relatedPosts->the_post(); ?>
                                    <div class="col-12 col-lg-4" data-scroll data-scroll-repeat="true">
                                        <a href="<?php echo get_post_type_archive_link('project');?>" class="mini-project-item" data-cursor-text="View THIS PROJECT" data-cursor-text-repeat="2">
                                            <div class="mini-project-media">
                                                <img src="<?php the_post_thumbnail();?>" alt="">
                                            </div>
                                            <div class="mini-project-content">
                                                <span><?php the_title();?></span>
                                                <img src="<?php bloginfo('template_url');?>/assets/img/right-arrow.svg" alt="">
                                            </div>
                                        </a>
                                </div>
                                <?php endwhile; } wp_reset_postdata();?>

                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
        <?php endwhile;?>
    </main>
    <?php get_footer();?>
</div>

