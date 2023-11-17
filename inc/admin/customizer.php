<?php
/*
 * Add customizer Options panel
 */
add_action('customize_register', 'air_helper_customizer_add_settings_section', 10);
function air_helper_customizer_add_settings_section($wp_customize)
{
    $wp_customize->add_section('custom_settings', array(
        'title' => __('Custom Settings'),
        'description' => __('Change custom settings here'),
        'priority' => 160,
        'capability' => 'edit_theme_options',
    ));
    $wp_customize->add_setting('cbrne_radio_setting_id', array(
        'default' => 'blue',
    ));
    $wp_customize->add_control('cbrne_radio_setting_id', array(
        'type' => 'radio',
        'section' => 'custom_settings',
        'label' => __('Custom Radio Selection'),
        'description' => __('This is a custom radio input.'),
        'choices' => array(
            'red' => __('Red'),
            'blue' => __('Blue'),
            'green' => __('Green'),
        ),
    ));
    $wp_customize->add_setting( 'setting' );
    $wp_customize->add_control( 'setting', array(
        'id'=> 'id',
        'label' => __( 'First Name:', 'TextDomain' ),
        'section' => 'custom_settings'
    ) );    
}
function cbrne_customizer_sanitize_radio($input, $setting)
{
    // Ensure input is a slug
    $input = sanitize_key($input);
    
    // Get a list of choices from the control associated with the setting.
    $choices = $setting->manager->get_control($setting->id)->choices;
    
    // If the input is a valid key, return it; otherwise, return the default.
    return ( array_key_exists($input, $choices) ? $input : $setting->default );
}
