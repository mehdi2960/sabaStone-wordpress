<?php get_header(); ?>
<main class="wrapper productsWrapper">
    <div class="container-fluid p-0">
        <div class="row g-0">
            <div class="col-12">
                <section class="product-slogan marginTop">
					<?php
					if ( have_posts() ) :
						while ( have_posts() ) : the_post();
                            $pageID = get_the_ID();
						   ?>
							 <div class="product-content">
								<h1 data-aos="fade-up" data-aos-duration="300"><?php echo get_the_title($pageID);?></h1>
								<div class="content" data-aos="fade-up" data-aos-duration="300" data-aos-delay="300">
									<p>
										<?php echo get_the_content();?>
									</p>
								</div>
							</div>
						   <?php
						endwhile;
					endif;
					?>

                    <div class="product-media">
                        <ul class="products-list-items">
                                <?php while (have_rows('imageblock')):the_row();?>
                                    <li class="product-list-item">
                                         <img src="<?php echo get_sub_field('image')['sizes']['large'];?>" alt="">
                                    </li>
                                <?php endwhile;?>
                        </ul>
                    </div>
                </section>
                <?php $cats = get_terms([
                    'taxonomy' => 'product-types',
                    'hide_empty' => false,
                ]);
                if($cats):?>
                <section class="filter-container big-padding">
                    <div id="filter" data-aos="fade-up" data-aos-duration="300">
                        <span>filter</span>
                        <span>close</span>
                    </div>
                    <div id="filter-wrapper">
                        <div class="filter-boxes">
                            <?php foreach($cats as $cat):
                            $CatID = $cat->term_id;
                            $children = get_terms([
                                'taxonomy' => 'product-types',
                                'hide_empty' => false,
                                'parent' => $CatID
                            ]);
                            if($children):?>
                            <div class="filter-box">
                                <h2><?php echo $cat->name;?></h2>
                                <ul>
                                    <?php foreach ($children as $child):?>
                                    <li class="product-filter" data_id = "<?php echo $child->term_id;?>"> <p><?php echo $child->name;?></p></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                            <?php endif;
                            endforeach; ?>
                        </div>
                    </div>
                </section>
                <?php endif; ?>
                <?php $products = new WP_Query( array(
                        'post_type' => 'products',
                        'posts_per_page' => -1
                    )); if ($products->have_posts()) : ?>
                <section class="products-wrapper big-padding">
                    <div class="row g-0 row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4 row-cols-xxl-5">
                         <?php while ($products->have_posts()) : $products->the_post(); ?>
                        <div class="col">
                            <a href="<?php the_permalink();?>" class="product-box">
                                <div class="product-box-img" data-tilt data-tilt-perspective="500">
                                    <img src="<?php the_post_thumbnail_url(); ?>" alt="">
                                </div>
                                <span class="product-name"><?php the_title();?></span>
                            </a>
                        </div>
                      <?php endwhile; ?>
                    </div>
                </section>
                <?php endif; ?>
            </div>
        </div>
    </div>
</main>
<?php get_footer();?>

