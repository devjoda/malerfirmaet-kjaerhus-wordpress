<?

function stillingsopslag_post_type()
{
    register_post_type(
        'stillingsopslag',
        array(
            'labels' => array(
                'name'              => __('Stillingsopslag', 'superegowp'),
                'singular_name'     => __('Stillingsopslag', 'superegowp'),
                'all_items'         => __('Alle stillingsopslag', 'superegowp'),
                'add_new'           => __('Tilføj ny', 'superegowp'),
                'add_new_item'      => __('Tilføj ny stillingsopslag', 'superegowp'),
                'edit'              => __('Redigér', 'superegowp'),
                'edit_item'         => __('Redigér stillingsopslag', 'superegowp'),
                'new_item'          => __('Ny stillingsopslag', 'superegowp'),
                'view_item'         => __('Vis stillingsopslag', 'superegowp'),
                'search_items'      => __('Søg efter stillingsopslag', 'superegowp'),
                'not_found'         => __('Der blev ikke fundet nogle resultater.', 'superegowp'),
                'not_found_in_trash' => __('Der blev ikke fundet noget i papirskurven', 'superegowp'),
                'parent_item_colon' => ''
            ),
            'description' => __('Denne posttype indeholder alle virksomhedens stillingsopslag', 'superegowp'),
            'public'                => true,
            'publicly_queryable'    => true,
            'exclude_from_search'   => false,
            'show_ui'               => true,
            'query_var'             => true,
            'menu_position'         => 8,
            'menu_icon'             => 'dashicons-megaphone',
            'rewrite'               => array('slug' => 'stillingsopslag', 'with_front' => false),
            'has_archive'           => false,
            'capability_type'       => 'post',
            'hierarchical'          => false,
            'delete_with_user'      => false,
            'show_in_rest'          => true,
            'supports' => array('title', 'thumbnail', 'custom-fields', 'sticky')
        )
    );

    // register_taxonomy_for_object_type('category', 'stillingsopslag');
    // register_taxonomy_for_object_type('post_tag', 'stillingsopslag');
}

add_action('init', 'stillingsopslag_post_type');