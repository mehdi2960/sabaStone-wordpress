<!DOCTYPE html>
<html lang="<?php language_attributes();?>" <?php if(!is_home()):?>class="is-smooth-scroll-compatible is-loading <?php endif;?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <?php wp_head();?>

</head>
<body data-pageType="<?php if(is_front_page()){ echo 'home';}elseif (is_home()){echo 'blog';}elseif (is_page_template('about-us.php')){echo 'aboutUs" class="about-us';}elseif (is_post_type_archive('products')){echo 'products';}elseif (is_archive('project')){echo 'projects';}elseif (is_singular('project')){echo 'singleProjects';}elseif (is_singular('products')){echo 'singleProducts';}elseif (is_archive('products')){echo 'products';}elseif (is_singular()){echo 'products';}
elseif (is_404()) {echo 'notFound';} ?>">

<?php if (is_404()):?>
<canvas id="can"></canvas>
<?php endif;?>
<header>
    <a href="<?php bloginfo('url');?>" class="identity">
        <?php $header_group = sabastone_get_option('header_group')?>
        <img src="<?php echo $header_group[0]['title'];?>" alt="">
    </a>
    <div id="menu" class="cursor-hover-item">
        <div class="menu-box">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
</header>
<nav id="menu-container">
    <?php wp_nav_menu( array( 'theme_location' => 'top_menu' ) ); ?>
    <?php do_action('wpml_add_language_selector'); ?>
</nav>