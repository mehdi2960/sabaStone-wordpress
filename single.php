<?php get_header();?>
<div class="o-scroll" id="js-scroll" data-scroll-container>
    <main class="wrapper singleBlogWrapper" data-scroll-container>
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
                                <div class="blog-slogan-media">
                                    <?php the_post_thumbnail();?>
                                </div>
                            </div>
                        </div>
                    </section>

                    <section class="single-blog-content big-padding" data-scroll-section>
                        <div class="row g-0 justify-content-xl-end">
                            <div class="col-12 col-xl-8">
                                <div class="sB-content" data-scroll data-scroll-repeat="true">
                                    <?php while (have_rows('description')):the_row();?>
                                        <p><?php echo get_sub_field('desc');?></p>
                                    <?php endwhile;?>

                                    <img src="<?php echo get_field('image')['sizes']['large'];?>" alt="" class="my-5">

                                    <?php while (have_rows('description')):the_row();?>
                                        <p><?php echo get_sub_field('desc');?></p>
                                    <?php endwhile;?>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </main>
 <?php get_footer();?>