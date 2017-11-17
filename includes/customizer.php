<?php
/**
 * devdmbootstrap_Customize
 * Our main class for working with the WordPress Customizer
 */
if (!class_exists('devdmbootstrap_Customize')) {

    add_action( 'customize_register' , array( 'devdmbootstrap_Customize' , 'register' ) );

    class devdmbootstrap_Customize {

        public function register ( $wp_customize ) {

            $wp_customize->add_section( 'devdmbootstrap_options',
                array(
                    'title' => __( 'DevDmBootstrap4 Options', 'devdmbootstrap4' ),
                    'priority' => 35,
                    'capability' => 'edit_theme_options',
                    'description' => __('Customize DevDmBootstrap4 Specific Theme Options.', 'devdmbootstrap4' )
                )
            );

            // Show the Header
            $wp_customize->add_setting( 'devdmbootstrap4_show_header_setting',
                array(
                    'default' => 1,
                    'type' => 'theme_mod',
                    'capability' => 'edit_theme_options',
                    'transport' => 'refresh',
                    'sanitize_callback' => array( 'devdmbootstrap_Customize' , 'devdmbootstrap_sanitize_checkbox' )
                )
            );

            $wp_customize->add_control( 'devdmbootstrap4_show_header',
                array(
                    'label'    => __( 'Show the Header?', 'devdmbootstrap4' ),
                    'section'  => 'devdmbootstrap_options',
                    'settings' => 'devdmbootstrap4_show_header_setting',
                    'type'     => 'checkbox'
                )
            );

            // Right Side Bar Size
            $wp_customize->add_setting( 'devdmbootstrap4_rightsidebar',
                array(
                    'default' => 3,
                    'type' => 'theme_mod',
                    'capability' => 'edit_theme_options',
                    'transport' => 'refresh',
                    'sanitize_callback' => array('devdmbootstrap_Customize' , 'devdmbootstrap_sanitize_select' )
                )
            );

            $wp_customize->add_control( 'devdmbootstrap4_rightsidebar',
                array(
                    'label'    => __( 'Right Sidebar Size', 'devdmbootstrap4'),
                    'section'  => 'devdmbootstrap_options',
                    'settings' => 'devdmbootstrap4_rightsidebar',
                    'type'     => 'select',
                    'choices'  => array(
                        '0' => '0 - '. __('Hidden','devdmbootstrap4'),
                        '1' => '1',
                        '2' => '2',
                        '3' => '3',
                        '4' => '4'
                    )

                )
            );

            // Left Side Bar Size
            $wp_customize->add_setting( 'devdmbootstrap4_leftsidebar',
                array(
                    'default' => 0,
                    'type' => 'theme_mod',
                    'capability' => 'edit_theme_options',
                    'transport' => 'refresh',
                    'sanitize_callback' => array('devdmbootstrap_Customize' , 'devdmbootstrap_sanitize_select')
                )
            );

            $wp_customize->add_control( 'devdmbootstrap4_leftsidebar',
                array(
                    'label'    => __( 'Left Sidebar Size', 'devdmbootstrap4' ),
                    'section'  => 'devdmbootstrap_options',
                    'settings' => 'devdmbootstrap4_leftsidebar',
                    'type'     => 'select',
                    'choices'  => array(
                        '0' => '0 - '. __('Hidden','devdmbootstrap4'),
                        '1' => '1',
                        '2' => '2',
                        '3' => '3',
                        '4' => '4'
                    )

                )
            );

            // Use Font Awesome?
            $wp_customize->add_setting( 'devdmbootstrap4_fontawesome_setting',
                array(
                    'default' => 1,
                    'type' => 'theme_mod',
                    'capability' => 'edit_theme_options',
                    'transport' => 'refresh',
                    'sanitize_callback' => array( 'devdmbootstrap_Customize' , 'devdmbootstrap_sanitize_checkbox' )
                )
            );

            $wp_customize->add_control( 'devdmbootstrap4_fontawesome',
                array(
                    'label'    => __( 'Load Font Awesome Icon Library (v4.4.0)?', 'devdmbootstrap4' ),
                    'section'  => 'devdmbootstrap_options',
                    'settings' => 'devdmbootstrap4_fontawesome_setting',
                    'type'     => 'checkbox'
                )
            );

            // Enable Enhanced Menu?
            $wp_customize->add_setting( 'devdmbootstrap4_enhanced_menu_setting',
                array(
                    'default' => 1,
                    'type' => 'theme_mod',
                    'capability' => 'edit_theme_options',
                    'transport' => 'refresh',
                    'sanitize_callback' => array( 'devdmbootstrap_Customize' , 'devdmbootstrap_sanitize_checkbox' )
                )
            );

            $wp_customize->add_control( 'devdmbootstrap4_enhanced_menu',
                array(
                    'label'    => __( 'Use the Enhanced menu system?', 'devdmbootstrap4' ),
                    'section'  => 'devdmbootstrap_options',
                    'settings' => 'devdmbootstrap4_enhanced_menu_setting',
                    'type'     => 'checkbox'
                )
            );

            // Give Danny his Credit?
            $wp_customize->add_setting( 'devdmbootstrap4_show_credit_setting',
                array(
                    'default' => 1,
                    'type' => 'theme_mod',
                    'capability' => 'edit_theme_options',
                    'transport' => 'refresh',
                    'sanitize_callback' => array( 'devdmbootstrap_Customize' , 'devdmbootstrap_sanitize_checkbox' )
                )
            );

            $wp_customize->add_control( 'devdmbootstrap4_show_credit',
                array(
                    'label'    => __( 'Show Danny some love in the footer?', 'devdmbootstrap4' ),
                    'section'  => 'devdmbootstrap_options',
                    'settings' => 'devdmbootstrap4_show_credit_setting',
                    'type'     => 'checkbox'
                )
            );

            $wp_customize->get_setting( 'blogname' )->transport = 'refresh';
            $wp_customize->get_setting( 'blogdescription' )->transport = 'refresh';

        }

        public function devdmbootstrap_sanitize_checkbox($value) {
            return ($value == 1 ? $value : '');
        }

        public function devdmbootstrap_sanitize_select( $input, $setting ) {
            $input = sanitize_key($input);
            $control = $setting->manager->get_control($setting->id);
            $choices = $control->choices;

            return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
        }

    }

    /**
     * devdmbootstrap_customizer_js
     * Hook in our Live Preview jQuery file for customizer controls
     */
    add_action( 'customize_preview_init', 'devdmbootstrap_customizer_js' );
    function devdmbootstrap_customizer_js() {
        wp_enqueue_script(
            'devdmbootstrap_customizer_js',
            get_template_directory_uri() . '/assets/js/customizer.js',
            array( 'jquery','customize-preview' ),
            '',
            true
        );
    }

}


