<section class="homeSloganSlider marginTop" data-scroll-section>
    <div class="swiper mySwiperHome">
        <div class="swiper-wrapper">
            <?php while(have_rows('slider')):the_row();
            $left_img = get_sub_field('left_img');
            $right_img = get_sub_field('right_img');?>
            <div class="swiper-slide">
                <div class="home-slide-wrap" data-scroll>
                    <div class="home-slider-item">
                        <img src="<?php echo $left_img['sizes']['large'];?>" alt="">
                    </div>
                    <div class="home-slider-item">
                        <img src="<?php echo $right_img['sizes']['large'];?>" alt="">
                    </div>
                </div>
            </div>
            <?php endwhile;?>
        </div>
        <div class="swiper-pagination"></div>
    </div>
    <div class="slogan-info" data-scroll data-scroll-speed="3" data-scroll-position="top" data-scroll-delay="0.05">
        <span data-scroll><?php echo get_field('main_title');?></span>
    </div>
</section>