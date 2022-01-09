<?php

/**
 * This snippet has been updated to reflect the official supporting of options pages by CMB2
 * in version 2.2.5.
 *
 * If you are using the old version of the options-page registration,
 * it is recommended you swtich to this method.
 */
add_action('cmb2_admin_init', 'sabastone_register_theme_options_metabox');
/**
 * Hook in and register a metabox to handle a theme options page and adds a menu item.
 */
function sabastone_register_theme_options_metabox()
{

    /**
     * Registers options page menu item and form.
     */
    $cmb_options = new_cmb2_box(array(
        'id' => 'sabastone_option_metabox',
        'title' => esc_html__('Option site', 'sabastone'),
        'object_types' => array('options-page'),

        /*
         * The following parameters are specific to the options-page box
         * Several of these parameters are passed along to add_menu_page()/add_submenu_page().
         */

        'option_key' => 'sabastone_options', // The option key and admin menu page slug.
        // 'icon_url'        => 'dashicons-palmtree', // Menu icon. Only applicable if 'parent_slug' is left empty.
        // 'menu_title'      => esc_html__( 'Options', 'sabastone' ), // Falls back to 'title' (above).
        // 'parent_slug'     => 'themes.php', // Make options page a submenu item of the themes menu.
        // 'capability'      => 'manage_options', // Cap required to view options-page.
        // 'position'        => 1, // Menu position. Only applicable if 'parent_slug' is left empty.
        // 'admin_menu_hook' => 'network_admin_menu', // 'network_admin_menu' to add network-level options page.
        // 'display_cb'      => false, // Override the options-page form output (CMB2_Hookup::options_page_output()).
        // 'save_button'     => esc_html__( 'Save Theme Options', 'sabastone' ), // The text for the options-page save button. Defaults to 'Save'.
    ));
    $header_group = $cmb_options->add_field( array(
        'id'          => 'header_group',
        'type'        => 'group',
        'description' => __( 'Generates reusable form entries', 'cmb2' ),
        // 'repeatable'  => false, // use false if you want non-repeatable group
        'options'     => array(
            'group_title'       => __( 'هدر وب سایت', 'cmb2' ), // since version 1.1.4, {#} gets replaced by row number
            'add_button'        => __( 'Add Another Entry', 'cmb2' ),
            'remove_button'     => __( 'Remove Entry', 'cmb2' ),
            'closed'         => true,

        ),
    ) );

// Id's for group's fields only need to be unique for the group. Prefix is not needed.
    $cmb_options->add_group_field( $header_group, array(
        'name' => 'لوگو وب سایت',
        'id'   => 'title',
        'type' => 'file',
        // 'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
    ) );

    $about_group = $cmb_options->add_field( array(
        'id'          => 'about_group',
        'type'        => 'group',
        'description' => __( 'Generates reusable form entries', 'cmb2' ),
        // 'repeatable'  => false, // use false if you want non-repeatable group
        'options'     => array(
            'group_title'       => __( 'about', 'cmb2' ), // since version 1.1.4, {#} gets replaced by row number
            'add_button'        => __( 'Add Another Entry', 'cmb2' ),
            'remove_button'     => __( 'Remove Entry', 'cmb2' ),
            'closed'         => true,


        ),
    ) );

    $cmb_options->add_group_field( $about_group, array(
        'name' => 'title',
        'id'   => 'title',
        'type' => 'text',
        // 'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
    ) );
    $cmb_options->add_group_field( $about_group, array(
        'name' => 'description',
        'id'   => 'description',
        'type' => 'text',
        // 'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
    ) );

    //section////////////////////////////////////////////////////////
    $about_group_section = $cmb_options->add_field( array(
        'id'          => 'about_group_section',
        'type'        => 'group',
        'description' => __( 'Generates reusable form entries', 'cmb2' ),
        'repeatable'  => false,
        'options'     => array(
            'group_title'       => __( 'about logo', 'cmb2' ), // since version 1.1.4, {#} gets replaced by row number
            'add_button'        => __( 'Add Another Entry', 'cmb2' ),
            'remove_button'     => __( 'Remove Entry', 'cmb2' ),
            'closed'         => true,
        ),
    ) );

    $cmb_options->add_group_field( $about_group_section, array(
        'name' => 'title',
        'id'   => 'title',
        'type' => 'text',
    ) );
    $cmb_options->add_group_field( $about_group_section, array(
        'name' => 'logo',
        'id'   => 'logo',
        'type' => 'file',
    ) );

///////service/////////////////////////////////////////////////////

    $group_services = $cmb_options->add_field( array(
        'id'          => 'group_services',
        'type'        => 'group',
        'description' => __( 'Generates reusable form entries', 'cmb2' ),
        'repeatable'  => true,
        'options'     => array(
            'group_title'       => __( 'services', 'cmb2' ), // since version 1.1.4, {#} gets replaced by row number
            'add_button'        => __( 'Add Another Entry', 'cmb2' ),
            'remove_button'     => __( 'Remove Entry', 'cmb2' ),
            'closed'         => true,


        ),
    ) );

    $cmb_options->add_group_field( $group_services, array(
        'name' => 'logo',
        'id'   => 'logo',
        'type' => 'file',
    ) );
    $cmb_options->add_group_field( $group_services, array(
        'name' => 'title',
        'id'   => 'title',
        'type' => 'text',
    ) );
    $cmb_options->add_group_field( $group_services, array(
        'name' => 'description',
        'id'   => 'description',
        'type' => 'text',
    ) );

    //time////////////////////////////////////////////////////////
    $group_date = $cmb_options->add_field( array(
        'id'          => 'group_date',
        'type'        => 'group',
        'description' => __( 'Generates reusable form entries', 'cmb2' ),
        'repeatable'  => true,
        'options'     => array(
            'group_title'       => __( 'timezone', 'cmb2' ), // since version 1.1.4, {#} gets replaced by row number
            'add_button'        => __( 'Add Another Entry', 'cmb2' ),
            'remove_button'     => __( 'Remove Entry', 'cmb2' ),
            'closed'         => true,
        ),
    ) );

    $cmb_options->add_group_field( $group_date, array(
        'name' => 'date',
        'id'   => 'date',
        'type' => 'text',
    ) );
    $cmb_options->add_group_field( $group_date, array(
        'name' => 'logo',
        'id'   => 'logo',
        'type' => 'file',
    ) );
    $cmb_options->add_group_field( $group_date, array(
        'name' => 'description',
        'id'   => 'description',
        'type' => 'text',
    ) );

     //ceo/////////////////////////////////////////////////////////
    $group_ceo = $cmb_options->add_field( array(
        'id'          => 'group_ceo',
        'type'        => 'group',
        'description' => __( 'Generates reusable form entries', 'cmb2' ),
        'repeatable'  => false,
        'options'     => array(
            'group_title'       => __( 'timezone', 'cmb2' ), // since version 1.1.4, {#} gets replaced by row number
            'add_button'        => __( 'Add Another Entry', 'cmb2' ),
            'remove_button'     => __( 'Remove Entry', 'cmb2' ),
            'closed'         => true,
        ),
    ) );

    $cmb_options->add_group_field( $group_ceo, array(
        'name' => 'title',
        'id'   => 'title',
        'type' => 'text',
    ) );

    $cmb_options->add_group_field( $group_ceo, array(
        'name' => 'logo',
        'id'   => 'logo',
        'type' => 'file',
    ) );
    $cmb_options->add_group_field( $group_ceo, array(
        'name' => 'desc',
        'id'   => 'desc',
        'type' => 'text',
    ) );

    ///our mines/////////////////////////////////////////////////////

    $group_mines = $cmb_options->add_field( array(
        'id'          => 'group_mines',
        'type'        => 'group',
        'description' => __( 'Generates reusable form entries', 'cmb2' ),
        'repeatable'  => true,
        'options'     => array(
            'group_title'       => __( 'our mines', 'cmb2' ), // since version 1.1.4, {#} gets replaced by row number
            'add_button'        => __( 'Add Another Entry', 'cmb2' ),
            'remove_button'     => __( 'Remove Entry', 'cmb2' ),
            'closed'         => true,
        ),
    ) );

    $cmb_options->add_group_field( $group_mines, array(
        'name' => 'desc',
        'id'   => 'desc',
        'type' => 'text',
    ) );

    $cmb_options->add_group_field( $group_mines, array(
        'name' => 'logo',
        'id'   => 'logo',
        'type' => 'file',
    ) );


    //Footer////////////////////////////////////////////////////////

    $group_footer = $cmb_options->add_field( array(
        'id'          => 'group_footer',
        'type'        => 'group',
        'description' => __( 'Generates reusable form entries', 'cmb2' ),
        'repeatable'  => false,
        'options'     => array(
            'group_title'       => __( 'footer', 'cmb2' ), // since version 1.1.4, {#} gets replaced by row number
            'add_button'        => __( 'Add Another Entry', 'cmb2' ),
            'remove_button'     => __( 'Remove Entry', 'cmb2' ),
            'closed'         => true,
        ),
    ) );

    $cmb_options->add_group_field( $group_footer, array(
        'name' => 'desc',
        'id'   => 'desc',
        'type' => 'text',
    ) );

    $cmb_options->add_group_field( $group_footer, array(
        'name' => 'logo',
        'id'   => 'logo',
        'type' => 'file',
    ) );

    //FooterPhone////////////////////////////////////////////////

    $group_footer_phone = $cmb_options->add_field( array(
        'id'          => 'group_footer_phone',
        'type'        => 'group',
        'description' => __( 'Generates reusable form entries', 'cmb2' ),
        'repeatable'  => true,
        'options'     => array(
            'group_title'       => __( 'footer_phone', 'cmb2' ), // since version 1.1.4, {#} gets replaced by row number
            'add_button'        => __( 'Add Another Entry', 'cmb2' ),
            'remove_button'     => __( 'Remove Entry', 'cmb2' ),
            'closed'         => true,
        ),
    ) );

    $cmb_options->add_group_field( $group_footer_phone, array(
        'name' => 'tell',
        'id'   => 'tell',
        'type' => 'text',
    ) );

    $cmb_options->add_group_field( $group_footer_phone, array(
        'name' => 'pic',
        'id'   => 'pic',
        'type' => 'file',
    ) );

    $cmb_options->add_group_field( $group_footer_phone, array(
        'name' => 'desc',
        'id'   => 'desc',
        'type' => 'text',
    ) );

    //PicAbout///////////////////////////////////////////////////////

    $group_pic = $cmb_options->add_field( array(
        'id'          => 'group_pic',
        'type'        => 'group',
        'description' => __( 'Generates reusable form entries', 'cmb2' ),
        'repeatable'  => false,
        'options'     => array(
            'group_title'       => __( 'picAbout', 'cmb2' ), // since version 1.1.4, {#} gets replaced by row number
            'add_button'        => __( 'Add Another Entry', 'cmb2' ),
            'remove_button'     => __( 'Remove Entry', 'cmb2' ),
            'closed'         => true,
        ),
    ) );

    $cmb_options->add_group_field( $group_pic, array(
        'name' => 'pic',
        'id'   => 'pic',
        'type' => 'file',
    ) );
}



/**
 * Wrapper function around cmb2_get_option
 * @param string $key Options array key
 * @param mixed $default Optional default value
 * @return mixed           Option value
 * @since  0.1.0
 */
function sabastone_get_option($key = '', $default = false)
{
    if (function_exists('cmb2_get_option')) {
        // Use cmb2_get_option as it passes through some key filters.
        return cmb2_get_option('sabastone_options', $key, $default);
    }

    // Fallback to get_option if CMB2 is not loaded yet.
    $opts = get_option('sabastone_options', $default);

    $val = $default;

    if ('all' == $key) {
        $val = $opts;
    } elseif (is_array($opts) && array_key_exists($key, $opts) && false !== $opts[$key]) {
        $val = $opts[$key];
    }

    return $val;
}