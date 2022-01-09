
<section class="home-services-container" data-scroll-section>
    <div class="title-wrap master-padding">
        <span><?php echo get_field('service_title');?></span>
    </div>
    <div class="home-services-wrap big-padding">
        <div class="row home-services-list">
            <?php while (have_rows('services')):the_row();?>
            <div class="col-12 col-md-6 col-lg-4">
                <div class="home-services-item" data-scroll data-scroll-repeat="true">
                    <div class="services-media">
                        <img src="<?php echo get_sub_field('image')['sizes']['thumbnail'];?>" alt="">
                    </div>
                    <div class="services-content">
                        <h3><?php echo get_sub_field('title');?></h3>
                        <p><?php echo get_sub_field('text');?></p>
                    </div>
                </div>
            </div>
            <?php endwhile;?>
        </div>
    </div>
</section>
