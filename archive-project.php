<?php get_header();?>
<div class="o-scroll" id="js-scroll" data-scroll-container>
    <main class="wrapper projectsWrapper" data-scroll-container>
        <div class="container-fluid p-0">
            <div class="row g-0">
                <div class="col-12">
                    <section class="single-product-slogan big-padding marginTop" data-scroll-section>
                        <div class="row">
                            <div class="col-12 col-lg-6 col-xl-4">
								   <div class="sP-info">
										<h1 data-scroll data-scroll-repeat="true"><?php echo get_the_title();?></h1>
										<div class="content" data-scroll data-scroll-repeat="true">
											<p>
											 <?php the_content();?>
											</p>
										</div>
									</div>
                            </div>

                            <div class="col-12 col-lg-6 col-xl-8">
                                <div class="sP-slider-container" data-scroll data-scroll-repeat="true">
                                    <div class="swiper projectsSwiper">
                                        <div class="swiper-wrapper">
                                            <?php while(have_rows('sliderimage')):the_row();?>
                                            <div class="swiper-slide">
                                                <a href="<?php the_permalink();?>" class="feature-project-box" data-cursor-text="View THIS PROJECT" data-cursor-text-repeat="2">
                                                    <div class="feature-media">
                                                        <img src="<?php echo get_sub_field('images')['sizes']['large'];?>" alt="">
                                                    </div>
                                                    <div class="feature-project-name">
                                                        <span><?php echo get_sub_field('title');?></span>
                                                    </div>
                                                </a>
                                            </div>
                                                <?php endwhile;?>
                                        </div>
                                        <div class="swiper-pagination"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <?php
                    $the_query = new WP_Query([
                            'post_type'=>'project',
                            'posts_per_page'=>9
                    ]); ?>

                    <?php if ( $the_query->have_posts() ) : ?>
                    <section class="projects-container big-padding" data-scroll-section>
                        <ul class="projects-wrap">
                        <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                            <li class="project-boxes" data-scroll data-scroll-repeat="true">
                                <a href="<?php the_permalink();?>" class="project-box" data-cursor-text="View THIS PROJECT" data-cursor-text-repeat="2">
                                    <div class="project-media">
                                        <div class="c-glitch" style="background-image: url(<?php echo get_the_post_thumbnail();?>)">
                                            <div class="c-glitch__img">
                                                <img src="<?php echo get_the_post_thumbnail();?>" alt="">
                                            </div>
                                            <div class="c-glitch__img">
                                                <img src="<?php echo get_the_post_thumbnail();?>" alt="">
                                            </div>
                                            <div class="c-glitch__img">
                                                <img src="<?php echo get_the_post_thumbnail();?>" alt="">
                                            </div>
                                            <div class="c-glitch__img">
                                                <img src="<?php echo get_the_post_thumbnail();?>" alt="">
                                            </div>
                                            <div class="c-glitch__img">
                                                <img src="<?php echo get_the_post_thumbnail();?>" alt="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="project-name">
                                        <span><?php echo get_the_title();?></span>
                                    </div>
                                </a>
                            </li>
                        <?php endwhile; ?>
                        <?php wp_reset_postdata(); ?>
                        </ul>
                    </section>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </main>
<!--    --><?php //if (is_archive('project')):?>
<!--<script nomodule src="https://cdnjs.cloudflare.com/ajax/libs/babel-polyfill/7.6.0/polyfill.min.js" crossorigin="anonymous"></script>-->
<!--<script nomodule src="https://polyfill.io/v3/polyfill.min.js?features=Object.assign%2CElement.prototype.append%2CNodeList.prototype.forEach%2CCustomEvent%2Csmoothscroll" crossorigin="anonymous"></script>-->
<?php //endif;?>
<?php get_footer();?>