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
    <?php settings_fields('cbrne_custom_option_group'); ?>
    <?php do_settings_sections('cbrne_custom_options_page'); ?>
     
    <input name="Submit" type="submit" value="<?php esc_attr_e('Save Changes'); ?>" />
    </form></div>
     
    <?php
}

// add the admin settings
add_action('admin_init', 'cbrne_custom_options_admin_init');
function cbrne_custom_options_admin_init()
{
    register_setting(
        'cbrne_custom_option_group',
        'cbrne_custom_option_group',
        array(
            'sanitize_callback' => 'cbrne_theme_color_mode_validate',
        )
    );
    add_settings_section(
        'cbrne_custom_options_main_section',
        esc_attr__('Theme colors'),
        'cbrne_custom_options_section_callback',
        'cbrne_custom_options_page'
    );
    add_settings_field(
        'cbrne_change_theme_colors',
        esc_attr__('No color mode'),
        'cbrne_change_theme_colors_callback',
        'cbrne_custom_options_page',
        'cbrne_custom_options_main_section',
        array(
            'type'         => 'checkbox',
            'option_group' => 'cbrne_custom_option_group',
            'name'         => 'cbrne_change_theme_colors',
            'label_for'    => 'cbrne_change_theme_colors',
            'value'        => (empty(get_option('cbrne_custom_option_group')['cbrne_change_theme_colors'])),
            'description'  => esc_attr__('Check to change theme color mode to monochrome'),
            'checked'      => (!isset(get_option('cbrne_custom_option_group')['cbrne_change_theme_colors'])),
            'tip'          => esc_attr__('Change theme color mode')
            )
    );
}

function cbrne_custom_options_section_callback()
{
    esc_attr_e('Change theme color mode') ;
}

function cbrne_change_theme_colors_callback($args)
{
    $checked = '';
    $options = get_option($args['option_group']);
    $value   = ( !isset($options[$args['name']]) )
                ? null : $options[$args['name']];
    if ($value) {
        $checked = ' checked="checked" ';
    }
        // Could use ob_start.
        $html  = '';
        $html .= '
        <style type="text/css">
        /* Toggle Button */
        input[type="checkbox"].cb-toggle {
            position: relative;
            border: 0;
            outline: 0;
            cursor: pointer;
            margin: 0 4rem 0 -1rem;
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
        $html .= '<input id="' . esc_attr($args['name']) . '" 
        class="cb-toggle" name="' . esc_attr($args['option_group'] . '['.$args['name'].']') .'" 
        type="checkbox" ' . $checked . '/>';
        $html .= '<span class="wndspan">' . esc_html($args['description']) .'</span>';

        echo $html;
}
  
// validate our options
function cbrne_theme_color_mode_validate($args)
{
    return $args;
}