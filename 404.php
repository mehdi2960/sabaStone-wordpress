<?php get_header();?>
    <div class="o-scroll" id="js-scroll" data-scroll-container>
        <main class="wrapper HomeWrapper" data-scroll-container>
            <div class="container-fluid p-0">
                <div class="row g-0">
                    <div class="col-12">
                        <section class="pageNotFoundWrapper" data-scroll-section>
                            <h1 id="title">404</h1>
                            <p id="sub-title"><?php _e('The page you are looking for does not exist or has changed','dokmeh')?></p>
                            <div class="link-boxes">
                                <a href="<?php bloginfo('url');?>" id="home"><?php _e('Home page','dokmeh');?></a>
                                <a href="<?php echo get_post_type_archive_link('products');?>" id="products"><?php _e('products','dokmeh')?></a>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </main>
    </div>

<?php get_footer();?>

