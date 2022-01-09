<?php /*Template Name:Contact*/?>
<?php get_header();?>
<div class="o-scroll" id="js-scroll" data-scroll-container>
    <main class="wrapper contactWrapper" data-scroll-container>
        <div class="container-fluid p-0">
            <div class="row g-0">
                <div class="col-12">
                      <?php $location = get_field('map'); ?>
                    <section class="contact-map-container marginTop big-padding" data-scroll-section>
                        <div id="map" data-scroll data-scroll-repeat="true">
                            <img src="<?php bloginfo('template_url');?>/assets/img/sample/contact-map.png" alt="">
                        </div>
                    </section>

                    <section class="contact-wrap big-padding" data-scroll-section>
                        <div class="row">
                          <?php if (have_rows('block_left')):?>
                                <?php while (have_rows('block_left')):the_row();?>
                            <div class="col-12 col-md-6 col-lg-3">
                                <div class="contact-box" data-scroll data-scroll-repeat="true">
                                    <h3><?php echo get_sub_field('title');?></h3>
                                    <div class="footer-tel-boxes">
                                        <?php while (have_rows('tell')):the_row();?>
                                        <a href="tel:<?php echo get_sub_field('number');?>">
                                            <img src="<?php bloginfo('template_url');?>/assets/img/phone.svg" alt="">
                                            <span>+<?php echo get_sub_field('number');?></span>
                                        </a>
                                        <?php endwhile;?>
                                    </div>
                                    <a href="#" class="footer-address-box">
                                        <img src="<?php bloginfo('template_url');?>/assets/img/circle.svg" alt="">
                                        <span>
                                            <?php echo get_sub_field('description');?>
                                        </span>
                                    </a>
                                </div>
                            </div>
                                <?php endwhile;?>
                                <?php endif;?>
                             <?php if (have_rows('block_right')):?>
                                <?php while(have_rows('block_right')):the_row();?>
                                <div class="col-12 col-md-6 col-lg-3">
                                    <div class="contact-box text" data-scroll data-scroll-repeat="true">
                                        <p>
                                            <?php echo get_sub_field('text');?>
                                        </p>
                                    </div>
                                </div>
                            <?php endwhile;?>
                            <?php endif;?>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </main>
<?php include get_template_directory() . '/footer.php'; ?>


