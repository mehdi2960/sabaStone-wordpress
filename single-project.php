<?php get_header(); ?>
    <div class="o-scroll" id="js-scroll" data-scroll-container>
        <main class="wrapper singleProjectsWrapper" data-scroll-container>
            <div class="container-fluid p-0">
                <div class="row g-0">
                    <div class="col-12">
                            <section class="single-product-slogan big-padding marginTop" data-scroll-section>
                                <div class="row">
                                    <?php
                                    if (have_posts()) :
                                        while (have_posts()) : the_post();
                                            ?>
                                            <div class="col-12 col-lg-6 col-xl-4">
                                                <div class="sP-info">
                                                    <h1 data-scroll data-scroll-repeat="true"><?php the_title(); ?></h1>
                                                    <div class="content" data-scroll data-scroll-repeat="true">
                                                        <p>
                                                            <?php the_content(); ?>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                     <?php endwhile; endif; ?>

                                    <div class="col-12 col-lg-6 col-xl-8">
                                        <div class="sP-slider-container">
                                            <div class="swiper singleProjectSwiper">
                                                <div class="swiper-wrapper">
                                                    <?php while (have_rows('Singleimage')):the_row(); ?>
                                                        <div class="swiper-slide">
                                                            <a href="<?php echo get_post_type_archive_link('project')?>">
                                                            <div class="media-box" data-scroll data-scroll-repeat="true">
                                                                <img src="<?php echo get_sub_field('image')['sizes']['large'];?>" alt="">
                                                            </div>
                                                            </a>
                                                        </div>
                                                    <?php endwhile; ?>
                                                </div>
                                                <div class="swiper-pagination"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>

                                <section class="single-project-content big-padding" data-scroll-section>
                                    <?php $titlePlan=get_field('title');?>
                                <div class="sPContent" data-scroll data-scroll-repeat="true">
                                    <h2 class="mb-4"><?php echo $titlePlan;?></h2>
                                    <a href="<?php echo get_post_type_archive_link('project')?>">
                                        <?php while(have_rows('imagePlan')):the_row();?>
                                        <div class="img mb-5">
                                            <img src="<?php echo get_sub_field('image')['sizes']['large']; ?>" alt="">
                                        </div>
                                        <?php endwhile;?>
                                    </a>

                                    <?php $description=get_field('description');?>
                                    <p class="w-50 ">
                                        <?php echo $description; ?>
                                    </p>
                                </div>
                            </section>
                    </div>
                </div>
            </div>
        </main>
    <script nomodule src="https://cdnjs.cloudflare.com/ajax/libs/babel-polyfill/7.6.0/polyfill.min.js" crossorigin="anonymous"></script>
    <script nomodule src="https://polyfill.io/v3/polyfill.min.js?features=Object.assign%2CElement.prototype.append%2CNodeList.prototype.forEach%2CCustomEvent%2Csmoothscroll" crossorigin="anonymous"></script>
<?php get_footer(); ?>