<?php
/*Template Name: About*/
?>
<?php get_header(); ?>
<div class="o-scroll" id="js-scroll" data-scroll-container>
    <main class="wrapper aboutWrapper" data-scroll-container>
        <?php while (have_posts()) : the_post();
            $pageID = get_the_ID(); ?>
            <div class="container-fluid p-0">
                <div class="row g-0">
                    <div class="col-12">
                        <section class="aboutSloganContainer marginTop" data-scroll-section>
                            <div class="c-fixed_wrapper" data-scroll data-scroll-call="dynamicBackground"
                                 data-scroll-repeat>
                                <div class="c-fixed_target" id="fixed-target"></div>
                                <div class="c-fixed" data-scroll data-scroll-sticky data-scroll-target="#fixed-target"
                                     style="background-image:url(<?php echo get_the_post_thumbnail_url($pageID, 'full'); ?>)">

                                </div>
                            </div>
                            <div class="slogan-info">
                                <h1 data-scroll data-scroll-speed="3"
                                    data-scroll-position="top"><?php the_title(); ?></h1>
                            </div>
                        </section>
                        <?php $Description = get_field('caption');
                        if ($Description):?>
                            <section class="homeIntroduction about" data-scroll-section>
                                <h2 data-scroll data-scroll-repeat="true">
                                    <?php echo get_field('title'); ?>
                                </h2>
                                <div class="content" data-scroll data-scroll-repeat="true">
                                    <p>
                                        <?php echo $Description; ?>
                                    </p>
                                </div>
                            </section>
                        <?php endif; ?>
                        <?php if(have_rows('block')):?>
                        <section class="sS-list-container big-padding" data-scroll-section>
                            <h2 data-scroll data-scroll-repeat="true">
                                <?php echo get_field('block_title'); ?>
                            </h2>
                            <ul class="row ss-list-items">
                               <?php while(have_rows('block')):the_row();?>
                                    <li class="col-6 col-lg-4" data-scroll data-scroll-repeat="true">
                                        <div class="ss-list-item">
                                            <div class="logo-box">
                                                <img src="<?php echo get_sub_field('mainimage')['sizes']['thumbnail']; ?>" alt="">
                                            </div>
                                            <span><?php echo get_sub_field('maintitle'); ?></span>
                                        </div>
                                    </li>
                                    <?php endwhile; ?>
                            </ul>
                        </section>
                        <?php endif; ?>

                       <?php if(have_rows('services')):?>
                        <section class="home-services-container about big-padding" data-scroll-section>

                            <h2 data-scroll data-scroll-repeat="true"><?php echo get_field('services_title');?></h2>
                            <div class="home-services-wrap">
                                <div class="row home-services-list">
                                    <?php while(have_rows('services')):the_row();?>
                                        <div class="col-12 col-md-6 col-lg-4">
                                            <div class="home-services-item" data-scroll data-scroll-repeat="true">
                                                <div class="services-media">
                                                    <img src="<?php echo get_sub_field('mainimage')['sizes']['thumbnail']; ?>" <?php echo get_sub_field('mainimage')['sizes']['thumbnail']; ?> alt="">
                                                </div>
                                                <div class="services-content">
                                                    <h3><?php echo get_sub_field('maintitle'); ?></h3>
                                                    <p>
                                                        <?php echo get_sub_field('description'); ?>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endwhile; ?>
                                </div>
                            </div>
                        </section>
                       <?php endif; ?>
                         <?php if(have_rows('historical_block')):?>
                        <section class="timeline-container big-padding" data-scroll-section>
                            <ul class="time-line-list">
                                <?php while(have_rows('historical_block')):the_row();?>
                                    <li class="time-line-item" data-scroll data-scroll-repeat="true">
                                    <div class="year">
                                         <span>
                                            <?php echo get_sub_field('year'); ?>
                                        </span>
                                    </div>
                                        <div class="tL-media">
                                            <img src="<?php echo get_sub_field('image')['sizes']['thumbnail']; ?>" alt="">
                                        </div>
                                        <div class="tL-content">
                                            <p>
                                                <?php echo get_sub_field('text'); ?>
                                            </p>
                                        </div>
                                    </li>
                                <?php endwhile;?>
                            </ul>
                        </section>
                          <?php endif;?>

                        <section class="about-ceo-container big-padding" data-scroll-section>
                            <h2 data-scroll data-scroll-repeat="true">
                                <?php echo get_field('ceo_title');?>
                            </h2>
                            <div class="row justify-content-lg-between">

                                <div class="col-12 col-md-6 col-xl-5">
                                    <div class="ceo-media" data-scroll data-scroll-repeat="true">
                                        <div class="media-box">
                                            <img src="<?php echo get_field('ceo_image')['sizes']['large'];?>" alt="">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 col-md-6 col-xl-5">
                                    <div class="ceo-content">
                                        <p data-scroll data-scroll-repeat="true">
                                            <?php echo get_field('ceo_text');?>
                                        </p>
                                    </div>
                                </div>
                            </div>

                        </section>

                        <?php if (have_rows('mines_block')):?>
                        <section class="about-mines-container big-padding" data-scroll-section>
                            <h2 data-scroll data-scroll-repeat="true">our mines</h2>
                            <div class="row mines-list-items">
                                <?php while(have_rows('mines_block')):the_row();?>
                                        <div class="col-12 col-md-6 col-lg-4">
                                            <div class="mine-list-item" data-scroll data-scroll-repeat="true">
                                                <div class="media-box">
                                                    <img src="<?php echo get_sub_field('image')['sizes']['large']; ?>" alt="">
                                                </div>
                                                <div class="content-box">
                                                    <p>
                                                        <?php echo get_sub_field('text'); ?>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                <?php endwhile;?>
                            </div>
                        </section>
                        <?php endif;?>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
    </main>


<?php get_footer(); ?>
