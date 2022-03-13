<?

function wall_of_fame_post_type()
{
    register_post_type(
        'wall_of_fame',
        array(
            'labels' => array(
                'name'              => __('Wall of Fame', 'superegowp'),
                'singular_name'     => __('Wall of Fame', 'superegowp'),
                'all_items'         => __('Alle Wall of Fames', 'superegowp'),
                'add_new'           => __('Tilføj ny Wall of Fame', 'superegowp'),
                'add_new_item'      => __('Tilføj ny Wall of Fame', 'superegowp'),
                'edit'              => __('Redigér Wall of Fame', 'superegowp'),
                'edit_item'         => __('Redigér Wall of Fame', 'superegowp'),
                'new_item'          => __('Ny Wall of Fame', 'superegowp'),
                'view_item'         => __('Vis Wall of Fame', 'superegowp'),
                'search_items'      => __('Søg efter Wall of Fame', 'superegowp'),
                'not_found'         => __('Der blev ikke fundet nogle resultater.', 'superegowp'),
                'not_found_in_trash' => __('Der blev ikke fundet noget i papirskurven', 'superegowp'),
                'parent_item_colon' => ''
            ),
            'description' => __('Denne posttype indeholder alle elementer i Wall of Fame', 'superegowp'),
            'public'                => true,
            'publicly_queryable'    => true,
            'exclude_from_search'   => false,
            'show_ui'               => true,
            'query_var'             => true,
            'menu_position'         => 8,
            'menu_icon'             => 'dashicons-superhero-alt',
            'rewrite'               => array('slug' => 'wall_of_fame', 'with_front' => false),
            'has_archive'           => false,
            'capability_type'       => 'post',
            'hierarchical'          => false,
            'delete_with_user'      => false,
            'show_in_rest'          => true,
            'supports' => array('title', 'thumbnail', 'custom-fields')
        )
    );

    // register_taxonomy_for_object_type('category', 'medarbejdere');
    // register_taxonomy_for_object_type('post_tag', 'medarbejdere');
}

add_action('init', 'wall_of_fame_post_type');

// register_taxonomy(
//     'kunde',
//     array('cases'),
//     array(
//         'hierarchical' => false,
//         'labels' => array(
//             'name'              => __('Kunder', 'superegowp'),
//             'singular_name'     => __('Kunde', 'superegowp'),
//             'search_items'      => __('Søg i kunder', 'superegowp'),
//             'all_items'         => __('Alle Kunder', 'superegowp'),
//             'parent_item'       => __('Forældre afdeling', 'superegowp'),
//             'parent_item_colon' => __('Forældre afdeling:', 'superegowp'),
//             'edit_item'         => __('Redigér kunde', 'superegowp'),
//             'update_item'       => __('Opdatér kunde', 'superegowp'),
//             'add_new_item'      => __('Tilføj ny kunde', 'superegowp'),
//             'new_item_name'     => __('Ny kunde navn', 'superegowp')
//         ),
//         'show_admin_column'     => true,
//         'show_ui'               => true,
//         'query_var'             => true,
//         'show_in_rest'          => true,
//         'rewrite' => array('slug' => 'afdeling'),
//     )
// );
