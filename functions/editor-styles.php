<?
// Adds styles to the WordPress editor
add_action('init', 'add_editor_styles');
function add_editor_styles()
{
    add_editor_style(get_template_directory_uri() . '/assets/styles/css/main.css');
    add_editor_style(get_template_directory_uri() . '/style.css');
}

add_action('admin_enqueue_scripts', 'my_enqueue');

add_action('init', 'add_editor_script');
function add_editor_script()
{
    if (is_admin()) {
        wp_enqueue_script('admin-js', THEME . '/assets/scripts/admin.js', array('jquery'), false, false);
    }
}
add_action('enqueue_block_editor_assets', 'add_editor_script');
