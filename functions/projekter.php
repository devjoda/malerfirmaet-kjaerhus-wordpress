<?

function projekter_post_type()
{
    register_post_type(
        'projekter',
        array(
            'labels' => array(
                'name'              => __('Projekter', 'superegowp'),
                'singular_name'     => __('Projekt', 'superegowp'),
                'all_items'         => __('Alle projekter', 'superegowp'),
                'add_new'           => __('Tilføj nyt projekt', 'superegowp'),
                'add_new_item'      => __('Tilføj nyt projekt', 'superegowp'),
                'edit'              => __('Redigér projekt', 'superegowp'),
                'edit_item'         => __('Redigér projekt', 'superegowp'),
                'new_item'          => __('Ny projekt', 'superegowp'),
                'view_item'         => __('Vis projekter', 'superegowp'),
                'search_items'      => __('Søg efter projekter', 'superegowp'),
                'not_found'         => __('Der blev ikke fundet nogle resultater.', 'superegowp'),
                'not_found_in_trash' => __('Der blev ikke fundet noget i papirskurven', 'superegowp'),
                'parent_item_colon' => ''
            ),
            'description' => __('Denne posttype indeholder alle elementer i projekter', 'superegowp'),
            'public'                => true,
            'publicly_queryable'    => true,
            'exclude_from_search'   => false,
            'show_ui'               => true,
            'query_var'             => true,
            'menu_position'         => 8,
            'menu_icon'             => 'dashicons-open-folder',
            'rewrite'               => array('slug' => 'projekter', 'with_front' => false),
            'has_archive'           => false,
            'capability_type'       => 'post',
            'hierarchical'          => false,
            'delete_with_user'      => false,
            'show_in_rest'          => true,
            'supports' => array('title', 'editor', 'thumbnail', 'custom-fields', 'revisions', 'sticky')
        )
    );

}

add_action('init', 'projekter_post_type');

register_taxonomy(
    'type',
    array('projekter'),
    array(
        'hierarchical' => true,
        'labels' => array(
            'name'              => __('Typer', 'superegowp'),
            'singular_name'     => __('Type', 'superegowp'),
            'search_items'      => __('Søg i typer', 'superegowp'),
            'all_items'         => __('Alle Typer', 'superegowp'),
            'parent_item'       => __('Forældre type', 'superegowp'),
            'parent_item_colon' => __('Forældre type:', 'superegowp'),
            'edit_item'         => __('Redigér type', 'superegowp'),
            'update_item'       => __('Opdatér type', 'superegowp'),
            'add_new_item'      => __('Tilføj ny type', 'superegowp'),
            'new_item_name'     => __('Ny type navn', 'superegowp')
        ),
        'show_admin_column'     => true,
        'show_ui'               => true,
        'query_var'             => true,
        'show_in_rest'          => true,
        'rewrite' => array('slug' => 'type'),
    )
);