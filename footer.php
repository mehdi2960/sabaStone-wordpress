<?php if (!is_404()): ?>
    <footer data-scroll-section
            <?php if (is_home() OR is_post_type_archive('products') OR is_tax('product-types') OR (is_page_template('about-us.php'))){ ?>class="no-lS" <?php } ?>>
        <div class="container-fluid p-0">
            <div class="row g-0">
                <div class="col-12">
                    <div class="footer-inner big-padding">
                        <div class="footer-wrapper">
                            <h2 data-scroll
                                data-scroll-repeat="true"> <?php echo get_field('footertitle', 'option'); ?></h2>
                            <div class="row align-items-lg-center">
                                <div class="col-12 col-md-6 col-xl-4">
                                    <div class="footer-log" data-scroll data-scroll-repeat="true"
                                         <?php if (is_home() OR is_archive('products') OR is_tax('product-types') OR (is_page_template('about-us.php'))){ ?>data-aos="zoom-in"
                                         data-aos-duration="500" data-aos-delay="400"<?php } ?>>
                                        <img src="<?php echo get_field('footerimage', 'option')['sizes']['large']; ?>"
                                             alt="">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-xl-8"
                                     <?php if (is_home() OR is_archive('products') OR is_tax('product-types') OR (is_page_template('about-us.php'))){ ?>data-aos="fade-up"
                                     data-aos-duration="500" data-aos-delay="200"<?php } ?>>
                                    <div class="footer-content" data-scroll data-scroll-repeat="true">
                                        <p>
                                            <?php echo get_field('footerdescripion', 'option'); ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <?php $pages = get_pages(array(
                                'meta_key' => '_wp_page_template',
                                'meta_value' => 'contact.php'
                            ));
                            $contactPageID = $pages[0]->ID;
                            ?>
                            <div class="row footer-columns">
                                <?php if (have_rows('branches', $contactPageID)): ?>
                                    <?php while (have_rows('branches', $contactPageID)):the_row(); ?>
                                        <div class="col-12 col-md-6 col-xl-2"
                                             <?php if (is_home() OR is_archive('products') OR is_tax('product-types') OR (is_page_template('about-us.php'))){ ?>data-aos="fade-up"
                                             data-aos-duration="500" data-aos-delay="200"<?php } ?>>
                                            <div class="footer-box" data-scroll data-soll-repeat="true">
                                                <h3><?php echo get_sub_field('title'); ?></h3>
                                                <?php $phones = get_sub_field('phones');
                                                if ($phones):?>
                                                    <div class="footer-tel-boxes">
                                                        <?php foreach ($phones as $phone):
                                                            $phone = $phone['phone']; ?>
                                                            <a href="tel:<?php echo $phone; ?>">
                                                                <img src="<?php bloginfo('template_url') ?>/assets/img/phone.svg"
                                                                     alt="">
                                                                <span>+<?php echo $phone; ?></span>
                                                            </a>
                                                        <?php endforeach; ?>
                                                    </div>
                                                <?php endif; ?>
                                                <?php $location = get_sub_field('location');
                                                $address = get_sub_field('address'); ?>
                                                <a target="_blank"
                                                   href="https://www.google.com/maps/dir/?api=1&destination=<?php echo $location['lat']; ?>,<?php echo $location['lng']; ?>"
                                                   class="footer-address-box">
                                                    <img src="<?php bloginfo('template_url'); ?>/assets/img/circle.svg"
                                                         alt="">
                                                    <span>
                                           <?php echo $address; ?>
                                        </span>
                                                </a>
                                            </div>
                                        </div>
                                    <?php endwhile; ?>
                                <?php endif; ?>
                                <div class="col-12 col-md-6 col-xl-2"
                                     <?php if (is_home() OR is_archive('products') OR is_tax('product-types') OR (is_page_template('about-us.php'))){ ?>data-aos="fade-up"
                                     data-aos-duration="500" data-aos-delay="200"<?php } ?>>
                                    <div class="footer-box" data-scroll data-scroll-repeat="true">
                                        <a href="#"><h3><?php echo get_field('title_left', 'option'); ?></h3></a>
                                        <ul>
                                            <?php wp_nav_menu(array('theme_location' => 'bottom_menu')); ?>
                                        </ul>
                                    </div>
                                </div>
                                <?php $cats = get_terms([
                                    'taxonomy' => 'product-types',
                                    'hide_empty' => false,
                                    'parent' => 0
                                ]);
                                if ($cats):?>
                                    <div class="col-12 col-md-6 col-xl-2"
                                         <?php if (is_home() OR is_archive('products') OR is_tax('product-types') OR (is_page_template('about-us.php'))){ ?>
                                             data-aos="fade-up" data-aos-duration="500" data-aos-delay="200"<?php } ?>>
                                        <div class="footer-box" data-scroll data-scroll-repeat="true">
                                            <a href="<?php echo get_post_type_archive_link('products'); ?>">
                                                <h3><?php _e('Categories', 'dokmeh'); ?></h3>
                                            </a>
                                            <ul>
                                                <?php foreach ($cats as $cat): ?>
                                                    <li>
                                                        <a href="<?php echo get_term_link($cat->term_id); ?>"><?php echo $cat->name; ?></a>
                                                    </li>
                                                <?php endforeach; ?>
                                            </ul>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="footer-copy-right big-padding" data-scroll data-scroll-repeat="true">
                        <a href="https://hidokmeh.com/">another website by dokmeh</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
<?php endif; ?>
</div>

<?php if (!is_home()): ?>
    <div class="cursor">
        <div class="cursor--small"></div>
        <div class="cursor--large"></div>
        <div class="cursor--text">
            <div class="text">GO HERE! GO HERE! GO HERE! GO HERE!</div>
        </div>
    </div>
<?php endif; ?>
<?php if (is_post_type_archive('project')) { ?>
    <script nomodule
            src="https://polyfill.io/v3/polyfill.min.js?features=Object.assign%2CElement.prototype.append%2CNodeList.prototype.forEach%2CCustomEvent%2Csmoothscroll"
            crossorigin="anonymous"></script>
<?php } ?>
<?php  if (!is_post_type_archive('product') AND !is_home() AND !is_page_template('about-us.php')):?>
    <script nomodule src="https://cdnjs.cloudflare.com/ajax/libs/babel-polyfill/7.6.0/polyfill.min.js" crossorigin="anonymous"></script>
    <script nomodule src="https://polyfill.io/v3/polyfill.min.js?features=Object.assign%2CElement.prototype.append%2CNodeList.prototype.forEach%2CCustomEvent%2Csmoothscroll" crossorigin="anonymous"></script>
<?php endif;?>
<?php if (is_front_page()) {
    $video_file = get_field('video_file', get_the_ID());
    if ($video_file):?>
        <div id="video-gallery">
            <?php $group_video = sabastone_get_option('group_video'); ?>
            <div class="video-box">
                <video playsinline controls preload="auto">
                    <source src="<?php echo $video_file['url']; ?>" type="video/mp4">
                </video>
            </div>
            <div class="close-video-gallery cursor-hover-item">
                <img src="<?php bloginfo('template_url'); ?>/assets/img/close.svg" alt="">
            </div>
        </div>
    <?php endif;
} ?>
<?php wp_footer(); ?>

<?php if (is_page_template('contact.php')): ?>

    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCGSjuazfR5jJ4HLuqJ2DmyGkZR766ayRI"></script>
    <script type="text/javascript">
        var map;
        var infowindow;
        var marker = new Array();
        var i;
        var mapOptions;
        var mapElement;
        var locations = [
            <?php
            foreach ($locationsArray as $location):
            ?>
            ['<h3 class="info-window-header">   <?php echo $location['0'];?>   </h3>', <?php echo $location[1]['lat'];?>, <?php echo $location[1]['lng'];?>, '<h4 class="info-window-content">  <?php echo $location[2];?>   </h4>', '<a href="https://www.google.com/maps/dir/?api=1&destination=<?php echo $location[1]['lat'] . "," . $location[1]['lng'];?>" target="_blank"><?php _e('Get Direction...', 'walmark')?></a>'],
            <?php endforeach; ?>
        ];
        // When the window has finished loading create our google map below

        google.maps.event.addDomListener(window, 'load', init);

        function init() {
            // Basic options for a simple Google Map
            // For more options see: https://developers.google.com/maps/documentation/javascript/reference#MapOptions
            var image = new google.maps.MarkerImage("<?php echo get_template_directory_uri() . '/assets/img/pin.png'?>");
            mapOptions = {
                // How zoomed in you want the map to start at (always required)
                zoom: 13,
                // The latitude and longitude to center the map (always required)
                center: new google.maps.LatLng(locations[0][1], locations[0][2]), // New York
                zoomControl: true,
                mapTypeControl: false,
                scaleControl: false,
                streetViewControl: false,
                rotateControl: false,
                fullscreenControl: false,
                // How you would like to style the map.
                // This is where you would paste any style found on Snazzy Maps.
                styles: [
                    {
                        "featureType": "administrative",
                        "elementType": "labels.text.fill",
                        "stylers": [
                            {
                                "color": "#444444"
                            }
                        ]
                    },
                    {
                        "featureType": "landscape",
                        "elementType": "all",
                        "stylers": [
                            {
                                "color": "#f2f2f2"
                            }
                        ]
                    },
                    {
                        "featureType": "poi",
                        "elementType": "all",
                        "stylers": [
                            {
                                "visibility": "off"
                            }
                        ]
                    },
                    {
                        "featureType": "poi",
                        "elementType": "labels.text",
                        "stylers": [
                            {
                                "visibility": "off"
                            }
                        ]
                    },
                    {
                        "featureType": "road",
                        "elementType": "all",
                        "stylers": [
                            {
                                "saturation": -100
                            },
                            {
                                "lightness": 45
                            }
                        ]
                    },
                    {
                        "featureType": "road.highway",
                        "elementType": "all",
                        "stylers": [
                            {
                                "visibility": "simplified"
                            }
                        ]
                    },
                    {
                        "featureType": "road.arterial",
                        "elementType": "labels.icon",
                        "stylers": [
                            {
                                "visibility": "off"
                            }
                        ]
                    },
                    {
                        "featureType": "transit",
                        "elementType": "all",
                        "stylers": [
                            {
                                "visibility": "off"
                            }
                        ]
                    },
                    {
                        "featureType": "water",
                        "elementType": "all",
                        "stylers": [
                            {
                                "color": "#dbdbdb"
                            },
                            {
                                "visibility": "on"
                            }
                        ]
                    }
                ]
            };

            // Get the HTML DOM element that will contain your map
            // We are using a div with id="map" seen below in the <body>
            mapElement = document.getElementById('map');

            // Create the Google Map using our element and options defined above
            map = new google.maps.Map(mapElement, mapOptions);

            infowindow = new google.maps.InfoWindow();
            // Let's also add a marker while we're at it
            for (i = 0; i < locations.length; i++) {
                var marker = new google.maps.Marker({
                    position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                    map: map,
                    // url: 'https://www.google.com/maps/dir/?api=1&destination='+locations[i][1], locations[i][2],
                    // title: locations[i][0],
                    icon: image
                });
                google.maps.event.addListener(marker, 'click', (function (marker, i) {
                    return function () {
                        infowindow.setContent(locations[i][0] + locations[i][3] + locations[i][4]);
                        infowindow.open(map, marker);
                    }
                })(marker, i));
            }

        }

        function NewLocation(Nlat, Nlng) {

            this.map = map;
            var latLng = new google.maps.LatLng(Nlat, Nlng);
            map.setZoom(15);
            map.panTo(latLng);
        }
    </script>

<?php endif; ?>

</body>
</html>
