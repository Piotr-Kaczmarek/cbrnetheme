<?php
// add the admin options page
add_action('admin_menu', 'cbrne_plugin_admin_add_page');
function cbrne_plugin_admin_add_page()
{
    $menu_name = esc_attr__('Custom Options');
    $page_name = esc_attr__('Custom Options Page');
    add_options_page($page_name, $menu_name, 'manage_options', 'cbrne_custom_options', 'cbrne_custom_options_page');
}

// display the admin options page
function cbrne_custom_options_page()
{
    $title = esc_attr__('Custom Options');
    $descr = esc_attr__('Use this to change settings on page');
    ?>
    <div>
    <h2><?=$title?></h2>
    <?=$descr?>
    <form action="options.php" method="post">
    <?php
        settings_fields('cbrne_custom_options_page');
        do_settings_sections('cbrne_custom_options_page');
        submit_button();
    ?>
    </form></div>
     
    <?php
}

// add the admin settings
add_action('admin_init', 'cbrne_custom_options_admin_init');
function cbrne_custom_options_admin_init()
{
    // color mode change
    add_settings_section(
        'cbrne_custom_options_first_section',
        esc_attr__('Theme colors'),
        'cbrne_custom_options_section_callback',
        'cbrne_custom_options_page'
    );
    add_settings_field(
        'cbrne_change_theme_colors',
        esc_attr__('Change theme color mode'),
        'cbrne_custom_settings_checkbox_callback',
        'cbrne_custom_options_page',
        'cbrne_custom_options_first_section',
        array(
            'type'         => 'checkbox',
            'option_group' => 'cbrne_custom_options_page',
            'name'         => 'cbrne_change_theme_colors',
            'label_for'    => 'cbrne_change_theme_colors',
            'value'        => empty(get_option('cbrne_change_theme_colors')) ? 0 : get_option('cbrne_change_theme_colors'),
            'description'  => esc_attr__('Check to change theme color mode to monochrome'),
            'tip'          => esc_attr__('Change theme color mode')
            )
    );
    register_setting(
        'cbrne_custom_options_page',
        'cbrne_change_theme_colors',
        array(
            'type'  => 'string',
            'default'   => null
        )
    );

    // alert mode settings
    // new section
    add_settings_section(
        'cbrne_custom_options_second_section',
        esc_attr__('Alert bar options'),
        'cbrne_alert_bar_options_section_callback',
        'cbrne_custom_options_page'
    );
    // title field
    add_settings_field(
        'cbrne_alert_bar_title',
        esc_attr__('Define alert bar title'),
        'cbrne_custoom_settings_input_callback',
        'cbrne_custom_options_page',
        'cbrne_custom_options_second_section',
        array(
            'type'         => 'text',
            'option_group' => 'cbrne_custom_options_page',
            'name'         => 'cbrne_alert_bar_title',
            'label_for'    => 'cbrne_alert_bar_title',
            'value'        => get_option('cbrne_alert_bar_title'),
            'size'         => 40
            )
    );
    register_setting(
        'cbrne_custom_options_page',
        'cbrne_alert_bar_title',
        array(
            'type' => 'string',
            'sanitize_callback' => 'sanitize_text_field'
        )
    );
    // subtitle field
    add_settings_field(
        'cbrne_alert_bar_subtitle',
        esc_attr__('Define alert bar subtitle'),
        'cbrne_custoom_settings_input_callback',
        'cbrne_custom_options_page',
        'cbrne_custom_options_second_section',
        array(
            'type'         => 'text',
            'option_group' => 'cbrne_custom_options_page',
            'name'         => 'cbrne_alert_bar_subtitle',
            'label_for'    => 'cbrne_alert_bar_subtitle',
            'value'        => get_option('cbrne_alert_bar_subtitle'),
            'size'         => 40
            )
    );
    register_setting(
        'cbrne_custom_options_page',
        'cbrne_alert_bar_subtitle',
        array(
            'type' => 'string',
            'sanitize_callback' => 'sanitize_text_field'
        )
    );
    // text area
    add_settings_field(
        'cbrne_alert_bar_message',
        esc_attr__('Define alert bar message'),
        'cbrne_custoom_settings_textarea_callback',
        'cbrne_custom_options_page',
        'cbrne_custom_options_second_section',
        array(
            'type'         => 'textarea',
            'option_group' => 'cbrne_custom_options_page',
            'name'         => 'cbrne_alert_bar_message',
            'label_for'    => 'cbrne_alert_bar_message',
            'value'        => get_option('cbrne_alert_bar_message'),
            'rows'         => 5,
            'cols'         => 40,
            )
    );
    register_setting(
        'cbrne_custom_options_page',
        'cbrne_alert_bar_message',
        array(
            'type' => 'string',
            'sanitize_callback' => 'sanitize_text_field'
        )
    );
    // alert bar on/off checkbox
    add_settings_field(
        'cbrne_alert_bar_onoff',
        esc_attr__('Set alert bar on/off'),
        'cbrne_custom_settings_checkbox_callback',
        'cbrne_custom_options_page',
        'cbrne_custom_options_second_section',
        array(
            'type'         => 'checkbox',
            'option_group' => 'cbrne_custom_options_page',
            'name'         => 'cbrne_alert_bar_onoff',
            'label_for'    => 'cbrne_alert_bar_onoff',
            'value'        => empty(get_option('cbrne_alert_bar_onoff')) ? 0 : get_option('cbrne_alert_bar_onoff'),
            'description'  => esc_attr__('Check to turn on/off the bar'),
            'tip'          => esc_attr__('Alert bar on/off')
            )
    );
    register_setting(
        'cbrne_custom_options_page',
        'cbrne_alert_bar_onoff',
        array(
            'type'  => 'string',
            'default'   => null
        )
    );
    // footer settings
    // new section
    add_settings_section(
        'cbrne_custom_options_third_section',
        esc_attr__('Footer settings'),
        'cbrne_footer_settings_options_section_callback',
        'cbrne_custom_options_page'
    );
    // text area
    // cbrne_footer_settings_section_one
    add_settings_field(
        'cbrne_footer_settings_section_one',
        esc_attr__('Define footer addres field'),
        'cbrne_custoom_settings_textarea_callback',
        'cbrne_custom_options_page',
        'cbrne_custom_options_third_section',
        array(
            'type'         => 'textarea',
            'option_group' => 'cbrne_custom_options_page',
            'name'         => 'cbrne_footer_settings_section_one',
            'label_for'    => 'cbrne_footer_settings_section_one',
            'value'        => get_option('cbrne_footer_settings_section_one'),
            'rows'         => 5,
            'cols'         => 40,
            )
    );
    register_setting(
        'cbrne_custom_options_page',
        'cbrne_footer_settings_section_one',
        array(
            'type' => 'string',
            'sanitize_callback' => 'wp_kses_post'
        )
    );
    // text area 2
    // cbrne_footer_settings_section_two
    add_settings_field(
        'cbrne_footer_settings_section_two',
        esc_attr__('Define footer contact field'),
        'cbrne_custoom_settings_textarea_callback',
        'cbrne_custom_options_page',
        'cbrne_custom_options_third_section',
        array(
            'type'         => 'textarea',
            'option_group' => 'cbrne_custom_options_page',
            'name'         => 'cbrne_footer_settings_section_two',
            'label_for'    => 'cbrne_footer_settings_section_two',
            'value'        => get_option('cbrne_footer_settings_section_two'),
            'rows'         => 5,
            'cols'         => 40,
            )
    );
    register_setting(
        'cbrne_custom_options_page',
        'cbrne_footer_settings_section_two',
        array(
            'type' => 'string',
            'sanitize_callback' => 'wp_kses_post'
        )
    );
}

function cbrne_custom_options_section_callback()
{
    esc_attr_e('Change theme color mode') ;
}

function cbrne_custom_settings_checkbox_callback($args)
{

    isset($args['value'])&&($args['value'] == 'on') ? $checked = 'checked' : $checked = null;

        $html  = '';
        $html .= '<input id="' . esc_attr($args['name']) . '" class="cb-toggle ' . esc_attr($args['class']) .'" name="' . esc_attr($args['name']) .'" type="checkbox" '.$checked.' />';
        $html .= '<span class="wndspan">' . esc_html($args['description']) .'</span>';

        echo $html;
}
  
// validate our options

function cbrne_text_box_validate($args)
{
    sanitize_text_field($args);
}

function cbrne_alert_bar_options_section_callback()
{
    esc_attr_e('Change alert bar settings') ;
}

function cbrne_footer_settings_options_section_callback()
{
    esc_attr_e('Change footer data');
}

function cbrne_custoom_settings_input_callback($args)
{
    $html = '<input  type="' . esc_attr($args['type']) . '" name="' . esc_attr($args['name']) . '" id="' . esc_attr($args['name']) . '" value="' . esc_attr($args['value']) . '" size="' . esc_attr($args['size']) . '" />';
    echo $html;
}
function cbrne_custoom_settings_textarea_callback($args)
{
    $html = '<textarea name="' . esc_attr($args['name']) . '" id="' . esc_attr($args['name']) . '" rows="' . esc_attr($args['rows']) . '" cols="' . esc_attr($args['cols']) . '">' . esc_attr($args['value']) . '</textarea>';
    echo $html;
}

// add styles to admin
add_action('admin_head', 'my_custom_fonts');

function my_custom_fonts()
{
    echo '
        <style type="text/css">
        /* disable nags */
        #tmpl-acf-field-group-pro-features{
            display: none !important;
        }
        /* Toggle Button */
        input[type="checkbox"].cb-toggle {
            position: relative;
            border: 0;
            outline: 0;
            cursor: pointer;
            margin: 0 4rem 0 1rem;
        }
        input[type="checkbox"].cb-toggle:focus{
            border: 0 !important;
            border-color: transparent;
            background-color: transparent;
        }
        
        /* To create surface of toggle button */
        input[type="checkbox"].cb-toggle:after {
            content: " ";
            width: 60px;
            height: 28px;
            display: inline-block;
            background: rgba(196, 195, 195, 1);
            border-radius: 18px;
            clear: both;
            position: relative;
            top: -7px;
            left: -20px;
        }
        
        
        /* Contents before checkbox to create toggle handle */
        input[type="checkbox"].cb-toggle:before {
            content: " ";
            width: 32px;
            height: 32px;
            display: block;
            position: absolute;
            left: -20px;
            top: -10px;
            border-radius: 50%;
            background: rgb(255, 255, 255);
            box-shadow: 1px 1px 3px rgba(0, 0, 0, 0.6);
            z-index: 1;
        }
        
        
        /* Shift the handle to left on check event */
        input[type="checkbox"].cb-toggle:checked:before {
            left: 12px;
            top: -7px;
            box-shadow: -1px 1px 3px rgba(0, 0, 0, 0.6);
        }
        /* Background color when toggle button will be active */
        input[type="checkbox"].cb-toggle:checked:after {
            background: #16a085;
        }
        /* Transition for smoothness */
        input[type="checkbox"].cb-toggle,
        input[type="checkbox"].cb-toggle:before,
        input[type="checkbox"].cb-toggle:after,
        input[type="checkbox"].cb-toggle:checked:before,
        input[type="checkbox"].cb-toggle:checked:after {
            transition: ease .3s;
            -webkit-transition: ease .3s;
            -moz-transition: ease .3s;
            -o-transition: ease .3s;
        }
        </style>';
}
