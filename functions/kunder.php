<?

function kunde_post_type()
{
    register_post_type(
        'kunder',
        array(
            'labels' => array(
                'name'              => __('Kunder', 'superegowp'),
                'singular_name'     => __('Kunde', 'superegowp'),
                'all_items'         => __('Alle kunder', 'superegowp'),
                'add_new'           => __('Tilføj ny', 'superegowp'),
                'add_new_item'      => __('Tilføj ny kunde', 'superegowp'),
                'edit'              => __('Redigér', 'superegowp'),
                'edit_item'         => __('Redigér kunde', 'superegowp'),
                'new_item'          => __('Ny kunde', 'superegowp'),
                'view_item'         => __('Vis kunde', 'superegowp'),
                'search_items'      => __('Søg efter kunder', 'superegowp'),
                'not_found'         => __('Der blev ikke fundet nogle resultater.', 'superegowp'),
                'not_found_in_trash' => __('Der blev ikke fundet noget i papirskurven', 'superegowp'),
                'parent_item_colon' => ''
            ),
            'description' => __('Denne posttype indeholder alle virksomhedens kunder', 'superegowp'),
            'public'                => true,
            'publicly_queryable'    => true,
            'exclude_from_search'   => false,
            'show_ui'               => true,
            'query_var'             => true,
            'menu_position'         => 8,
            'menu_icon'             => 'dashicons-groups',
            'rewrite'               => array('slug' => 'kunde', 'with_front' => false),
            'has_archive'           => false,
            'capability_type'       => 'post',
            'hierarchical'          => false,
            'delete_with_user'      => false,
            'show_in_rest'          => true,
            'supports' => array('title', 'thumbnail', 'custom-fields')
        )
    );
}

add_action('init', 'kunde_post_type');
