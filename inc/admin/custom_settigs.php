<?php
// add the admin options page
add_action('admin_menu', 'cbrne_plugin_admin_add_page');
function cbrne_plugin_admin_add_page()
{
    $menu_name = __('Custom Options');
    $page_name = __('Custom Options Page');
    add_options_page($page_name, $menu_name, 'manage_options', 'cbrne_custom_options', 'cbrne_custom_options_page');
}

// display the admin options page
function cbrne_custom_options_page()
{
    $title = __('Custom Options');
    $descr = __('Use this to change settings on page');
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
        '&nbsp;',
        'cbrne_custom_options_section_callback',
        'cbrne_custom_options_page'
    );
    add_settings_field(
        'cbrne_change_theme_colors',
        esc_attr__('Change theme color mode'),
        'cbrne_change_theme_colors_callback',
        'cbrne_custom_options_page',
        'cbrne_custom_options_main_section',
        array(
            'type'         => 'checkbox',
            'option_group' => 'cbrne_custom_option_group',
            'name'         => 'cbrne_change_theme_colors',
            'label_for'    => 'cbrne_change_theme_colors',
            'value'        => (empty(get_option('cbrne_custom_option_group')['cbrne_change_theme_colors'])),
            'description'  => __('Check to change theme color settings'),
            'checked'      => (!isset(get_option('cbrne_custom_option_group')['cbrne_change_theme_colors'])),
            'tip'          => esc_attr__('Change theme colors mode')
            )
    );
}

function cbrne_custom_options_section_callback()
{
    _e('Change theme colors');
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
        $html .= '<input id="' . esc_attr($args['name']) . '" 
        name="' . esc_attr($args['option_group'] . '['.$args['name'].']') .'" 
        type="checkbox" ' . $checked . '/>';
        $html .= '<span class="wndspan">' . esc_html($args['description']) .'</span>';

        echo $html;
}
  
// validate our options
function cbrne_theme_color_mode_validate($args)
{
    return $args;
}