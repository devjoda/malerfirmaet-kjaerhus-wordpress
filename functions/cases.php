<?

function cases_post_type()
{
    register_post_type(
        'cases',
        array(
            'labels' => array(
                'name'              => __('Cases', 'superegowp'),
                'singular_name'     => __('Case', 'superegowp'),
                'all_items'         => __('Alle cases', 'superegowp'),
                'add_new'           => __('Tilføj ny case', 'superegowp'),
                'add_new_item'      => __('Tilføj ny case', 'superegowp'),
                'edit'              => __('Redigér case', 'superegowp'),
                'edit_item'         => __('Redigér case', 'superegowp'),
                'new_item'          => __('Ny case', 'superegowp'),
                'view_item'         => __('Vis cases', 'superegowp'),
                'search_items'      => __('Søg efter cases', 'superegowp'),
                'not_found'         => __('Der blev ikke fundet nogle resultater.', 'superegowp'),
                'not_found_in_trash' => __('Der blev ikke fundet noget i papirskurven', 'superegowp'),
                'parent_item_colon' => ''
            ),
            'description' => __('Denne posttype indeholder alle virksomhedens cases', 'superegowp'),
            'public'                => true,
            'publicly_queryable'    => true,
            'exclude_from_search'   => false,
            'show_ui'               => true,
            'query_var'             => true,
            'menu_position'         => 8,
            'menu_icon'             => 'dashicons-superhero-alt',
            'rewrite'               => array('slug' => 'case', 'with_front' => false),
            'has_archive'           => false,
            'capability_type'       => 'post',
            'hierarchical'          => false,
            'delete_with_user'      => false,
            'show_in_rest'          => true,
            'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields', 'revisions', 'sticky')
        )
    );

    //  register_taxonomy_for_object_type('category', 'cases');
    // register_taxonomy_for_object_type('post_tag', 'medarbejdere');
}

add_action('init', 'cases_post_type');

register_taxonomy(
    'type',
    array('cases'),
    array(
        'hierarchical' => true,
        'labels' => array(
            'name'              => __('Typer', 'superegowp'),
            'singular_name'     => __('Type', 'superegowp'),
            'search_items'      => __('Søg i typer', 'superegowp'),
            'all_items'         => __('Alle typer', 'superegowp'),
            'edit_item'         => __('Redigér type', 'superegowp'),
            'update_item'       => __('Opdatér type', 'superegowp'),
            'add_new_item'      => __('Tilføj ny type', 'superegowp'),
            'new_item_name'     => __('Ny type navn', 'superegowp'),
            'parent_item'       => __('Forældre afdeling', 'superegowp'),
            'parent_item_colon' => __('Forældre afdeling:', 'superegowp'),
        ),
        'show_admin_column'     => true,
        'show_ui'               => true,
        'query_var'             => true,
        'show_in_rest'          => true,
        'rewrite' => array('slug' => 'type'),
    )
);
