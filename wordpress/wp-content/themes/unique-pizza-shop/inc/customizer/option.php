<?php
/**
 * Theme Options.
 *
 * @package unique_pizza_shop
 */

$default = unique_pizza_shop_get_default_theme_options();

// Add Panel.
$wp_customize->add_panel( 'theme_option_panel',
	array(
	'title'      => __( 'Theme Options', 'unique-pizza-shop' ),
	'priority'   => 100,
	'capability' => 'edit_theme_options',
	)
);

// General Option.
$wp_customize->add_section( 'section_general_option',
	array(
	'title'      => __( 'General Options', 'unique-pizza-shop' ),
	'priority'   => 100,
	'capability' => 'edit_theme_options',
	'panel'      => 'theme_option_panel',
	)
);

// Setting show scroll to top.
$wp_customize->add_setting( 'theme_options[show_scroll_to_top]',
	array(
	'default'           => $default['show_scroll_to_top'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'unique_pizza_shop_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'theme_options[show_scroll_to_top]',
	array(
	'label'    => __( 'Show Scroll To Top', 'unique-pizza-shop' ),
	'section'  => 'section_general_option',
	'type'     => 'checkbox',
	'priority' => 100,
	)
);

// Setting show Preloader.
$wp_customize->add_setting( 'theme_options[show_preloader_setting]',
	array(
	'default'           => $default['show_preloader_setting'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'unique_pizza_shop_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'theme_options[show_preloader_setting]',
	array(
	'label'    => __( 'Show Preloader', 'unique-pizza-shop' ),
	'section'  => 'section_general_option',
	'type'     => 'checkbox',
	'priority' => 100,
	)
);

// Setting show Sticky Header.
$wp_customize->add_setting( 'theme_options[show_data_sticky_setting]',
	array(
	'default'           => $default['show_data_sticky_setting'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'unique_pizza_shop_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'theme_options[show_data_sticky_setting]',
	array(
	'label'    => __( 'Show Sticky Header', 'unique-pizza-shop' ),
	'section'  => 'section_general_option',
	'type'     => 'checkbox',
	'priority' => 100,
	)
);

// Post Option.
$wp_customize->add_section( 'section_post_option',
	array(
	'title'      => __( 'Post Options', 'unique-pizza-shop' ),
	'priority'   => 100,
	'capability' => 'edit_theme_options',
	'panel'      => 'theme_option_panel',
	)
);

// Setting show Post date.
$wp_customize->add_setting( 'theme_options[show_post_date_setting]',
	array(
	'default'           => $default['show_post_date_setting'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'unique_pizza_shop_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'theme_options[show_post_date_setting]',
	array(
	'label'    => __( 'Show Post Date', 'unique-pizza-shop' ),
	'section'  => 'section_post_option',
	'type'     => 'checkbox',
	'priority' => 100,
	)
);

// Setting show Post Heading.
$wp_customize->add_setting( 'theme_options[show_post_heading_setting]',
	array(
	'default'           => $default['show_post_heading_setting'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'unique_pizza_shop_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'theme_options[show_post_heading_setting]',
	array(
	'label'    => __( 'Show Post Heading', 'unique-pizza-shop' ),
	'section'  => 'section_post_option',
	'type'     => 'checkbox',
	'priority' => 100,
	)
);

// Setting show Post Content.
$wp_customize->add_setting( 'theme_options[show_post_content_setting]',
	array(
	'default'           => $default['show_post_content_setting'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'unique_pizza_shop_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'theme_options[show_post_content_setting]',
	array(
	'label'    => __( 'Show Post Full Content', 'unique-pizza-shop' ),
	'section'  => 'section_post_option',
	'type'     => 'checkbox',
	'priority' => 100,
	)
);

// Header Section.
$wp_customize->add_section( 'section_header',
	array(
	'title'      => __( 'Header Options', 'unique-pizza-shop' ),
	'priority'   => 100,
	'capability' => 'edit_theme_options',
	'panel'      => 'theme_option_panel',
	)
);

// Setting show_title.
$wp_customize->add_setting( 'theme_options[show_title]',
	array(
	'default'           => $default['show_title'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'unique_pizza_shop_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'theme_options[show_title]',
	array(
	'label'    => __( 'Show Site Title', 'unique-pizza-shop' ),
	'section'  => 'section_header',
	'type'     => 'checkbox',
	'priority' => 100,
	)
);
// Setting show_tagline.
$wp_customize->add_setting( 'theme_options[show_tagline]',
	array(
	'default'           => $default['show_tagline'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'unique_pizza_shop_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'theme_options[show_tagline]',
	array(
	'label'    => __( 'Show Tagline', 'unique-pizza-shop' ),
	'section'  => 'section_header',
	'type'     => 'checkbox',
	'priority' => 100,
	)
);

// Setting show_header_top.
$wp_customize->add_setting( 'theme_options[show_header_top]',
	array(
	'default'           => $default['show_header_top'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'unique_pizza_shop_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'theme_options[show_header_top]',
	array(
	'label'    => __( 'Show Header Top', 'unique-pizza-shop' ),
	'section'  => 'section_header',
	'type'     => 'checkbox',
	'priority' => 100,
	)
);

// Setting email_address_title
$wp_customize->add_setting( 'theme_options[email_address_title]',
	array(
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control( 'theme_options[email_address_title]',
	array(
	'label'    => __( 'Add Email Address', 'unique-pizza-shop' ),
	'section'  => 'section_header',
	'type'     => 'text',
	'priority' => 100,
	)
);

// Setting phone_number_title
$wp_customize->add_setting( 'theme_options[phone_number_title]',
	array(
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control( 'theme_options[phone_number_title]',
	array(
	'label'    => __( 'Add Phone Number', 'unique-pizza-shop' ),
	'section'  => 'section_header',
	'type'     => 'text',
	'priority' => 100,
	)
);

// Setting discount_text
$wp_customize->add_setting( 'theme_options[discount_text]',
	array(
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control( 'theme_options[discount_text]',
	array(
	'label'    => __( 'Add Discount Text', 'unique-pizza-shop' ),
	'section'  => 'section_header',
	'type'     => 'text',
	'priority' => 100,
	)
);

// Layout Section.
$wp_customize->add_section( 'section_layout',
	array(
	'title'      => __( 'Layout Options', 'unique-pizza-shop' ),
	'priority'   => 100,
	'capability' => 'edit_theme_options',
	'panel'      => 'theme_option_panel',
	)
);

// Setting global_layout.
$wp_customize->add_setting( 'theme_options[global_layout]',
	array(
	'default'           => $default['global_layout'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'unique_pizza_shop_sanitize_select',
	)
);
$wp_customize->add_control( 'theme_options[global_layout]',
	array(
	'label'    => __( 'Global Layout', 'unique-pizza-shop' ),
	'section'  => 'section_layout',
	'type'     => 'select',
	'choices'  => unique_pizza_shop_get_global_layout_options(),
	'priority' => 100,
	)
);

// Setting archive_layout.
$wp_customize->add_setting( 'theme_options[archive_layout]',
	array(
	'default'           => $default['archive_layout'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'unique_pizza_shop_sanitize_select',
	)
);
$wp_customize->add_control( 'theme_options[archive_layout]',
	array(
	'label'    => __( 'Archive Layout', 'unique-pizza-shop' ),
	'section'  => 'section_layout',
	'type'     => 'select',
	'choices'  => unique_pizza_shop_get_archive_layout_options(),
	'priority' => 100,
	)
);
// Setting archive_image.
$wp_customize->add_setting( 'theme_options[archive_image]',
	array(
	'default'           => $default['archive_image'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'unique_pizza_shop_sanitize_select',
	)
);
$wp_customize->add_control( 'theme_options[archive_image]',
	array(
	'label'    => __( 'Image in Archive', 'unique-pizza-shop' ),
	'section'  => 'section_layout',
	'type'     => 'select',
	'choices'  => unique_pizza_shop_get_image_sizes_options( true, array( 'disable', 'thumbnail', 'medium', 'large' ), false ),
	'priority' => 100,
	)
);
// Setting archive_image_alignment.
$wp_customize->add_setting( 'theme_options[archive_image_alignment]',
	array(
	'default'           => $default['archive_image_alignment'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'unique_pizza_shop_sanitize_select',
	)
);
$wp_customize->add_control( 'theme_options[archive_image_alignment]',
	array(
	'label'           => __( 'Image Alignment in Archive', 'unique-pizza-shop' ),
	'section'         => 'section_layout',
	'type'            => 'select',
	'choices'         => unique_pizza_shop_get_image_alignment_options(),
	'priority'        => 100,
	'active_callback' => 'unique_pizza_shop_is_image_in_archive_active',
	)
);
// Setting single_image.
$wp_customize->add_setting( 'theme_options[single_image]',
	array(
	'default'           => $default['single_image'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'unique_pizza_shop_sanitize_select',
	)
);
$wp_customize->add_control( 'theme_options[single_image]',
	array(
	'label'    => __( 'Image in Single Post/Page', 'unique-pizza-shop' ),
	'section'  => 'section_layout',
	'type'     => 'select',
	'choices'  => unique_pizza_shop_get_image_sizes_options( true, array( 'disable', 'large' ), false ),
	'priority' => 100,
	)
);

// Footer Section.
$wp_customize->add_section( 'section_footer',
	array(
	'title'      => __( 'Footer Options', 'unique-pizza-shop' ),
	'priority'   => 100,
	'capability' => 'edit_theme_options',
	'panel'      => 'theme_option_panel',
	)
);

// Setting copyright_text.
$wp_customize->add_setting( 'theme_options[copyright_text]',
	array(
	'default'           => $default['copyright_text'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'unique_pizza_shop_sanitize_textarea_content',
	'transport'         => 'postMessage',
	)
);
$wp_customize->add_control( 'theme_options[copyright_text]',
	array(
	'label'    => __( 'Copyright Text', 'unique-pizza-shop' ),
	'section'  => 'section_footer',
	'type'     => 'text',
	'priority' => 100,
	)
);