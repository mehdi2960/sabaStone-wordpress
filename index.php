<?php
get_header();
$pageID=get_option( 'page_for_posts' );
?>

<main class="wrapper blogWrapper">
    <div class="container-fluid p-0">
        <div class="row g-0">
            <div class="col-12">
                <section class="single-product-slogan big-padding marginTop">
                    <div class="row">
                        <div class="col-12 col-lg-6 col-xl-4">
                            <div class="sP-info">
                                <h1 data-aos="fade-up" data-aos-duration="300"><?php echo get_the_title($pageID);?></h1>
                                <div class="content" data-aos="fade-up" data-aos-duration="300" data-aos-delay="300">
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
                <?php
                $terms = array([
                   'hide_empty'=>false,
                ]);
                $types = get_categories($terms);
                ?>
                <?php if ($types):?>
                <section class="filter-container blog big-padding">
                    <div id="filter">
                        <span>filter</span>
                        <span>close</span>
                    </div>
                    <div id="filter-wrapper">
                        <div class="filter-boxes">
                            <?php
                            foreach($types as $item):
                                $CatID = $item->term_id;
                                $children = get_categories([
                                    'hide_empty' => false,
                                    'parent' => $CatID
                                ]);

//                                var_dump($children);
                                if($children):?>
                            <div class="filter-box">
                                <h2><?php echo $item->name;?></h2>
                                <ul>
                                    <?php foreach ($children as $child):?>
                                        <li> <p class="page-filter" data_id = "<?php echo $child->term_id;?>"><?php echo $child->name;?></p></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                                <?php endif;
                            endforeach; ?>
                        </div>
                    </div>
                </section>
                <?php endif; ?>
                    <?php
                        $blog = new WP_Query( array(
                            'post_type' => 'post',
                            'posts_per_page' => -1
                        ));
                        if ($blog->have_posts()) :
                     ?>
                <section class="blog-container big-padding" data-scroll-section>
                    <div class="row filter-content">
                     <?php while ($blog->have_posts()) : $blog->the_post();
                     $post_ID = get_the_ID();?>
                            <div class="col-12 col-md-6 col-lg-4">
                                <a href="<?php the_permalink();?>" class="blog-box">
                                    <div class="blog-media" data-aos="zoom-in">
                                       <?php echo get_the_post_thumbnail($post_ID,'large');?>
                                    </div>
                                    <div class="blog-content" data-aos="fade-up" data-aos-duration="500" data-aos-delay="200">
                                        <h2><?php the_title();?></h2>
                                        <p>
                                         <?php the_content();?>
                                        </p>
                                    </div>
                                </a>
                            </div>
                     <?php endwhile;?>
                    </div>
                </section>
                    <?php endif;?>
            </div>
        </div>
    </div>
</main>
<?php get_footer();?>