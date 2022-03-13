<?

function custom_post_one()
{
    register_post_type(
        'custom_type',
        array(
            'labels' => array(
                'name'              => __('Custom Post', 'superegowp'),
                'singular_name'     => __('Custom Post', 'superegowp'),
                'all_items'         => __('Alle Custom Posts', 'superegowp'),
                'add_new'           => __('Tilføj ny', 'superegowp'),
                'add_new_item'      => __('Tilføj ny Custom Type', 'superegowp'),
                'edit'              => __('Redigér', 'superegowp'),
                'edit_item'         => __('Redigér Post Types', 'superegowp'),
                'new_item'          => __('Ny Post Type', 'superegowp'),
                'view_item'         => __('Vis Post Type', 'superegowp'),
                'search_items'      => __('Søg efter Post Type', 'superegowp'),
                'not_found'         =>  __('Der blev ikke fundet nogle resultater.', 'superegowp'),
                'not_found_in_trash' => __('Der blev ikke fundet noget i papirskurven', 'superegowp'),
                'parent_item_colon' => ''
            ),
            'description' => __('This is the example custom post type', 'superegowp'),
            'public'                => true,
            'publicly_queryable'    => true,
            'exclude_from_search'   => false,
            'show_ui'               => true,
            'query_var'             => true,
            'menu_position'         => 8,
            'menu_icon'             => 'dashicons-book',
            'rewrite'               => array('slug' => 'custom_type', 'with_front' => false),
            'has_archive'           => 'custom_type',
            'capability_type'       => 'post',
            'hierarchical'          => false,
            'delete_with_user'      => false,
            'show_in_rest'          => true,
            'supports' => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'trackbacks', 'custom-fields', 'comments', 'revisions', 'sticky')
        )
    );

    register_taxonomy_for_object_type('category', 'custom_type');
    register_taxonomy_for_object_type('post_tag', 'custom_type');
}

add_action('init', 'custom_post_one');

// now let's add custom categories (these act like categories)
// register_taxonomy( 'custom_cat',
// 	array('custom_type'), /* if you change the name of register_post_type( 'custom_type', then you have to change this */
// 	array('hierarchical' => true,     /* if this is true, it acts like categories */
// 		'labels' => array(
// 			'name' => __( 'Custom Categories', 'superegowp' ), /* name of the custom taxonomy */
// 			'singular_name' => __( 'Custom Category', 'superegowp' ), /* single taxonomy name */
// 			'search_items' =>  __( 'Search Custom Categories', 'superegowp' ), /* search title for taxomony */
// 			'all_items' => __( 'All Custom Categories', 'superegowp' ), /* all title for taxonomies */
// 			'parent_item' => __( 'Parent Custom Category', 'superegowp' ), /* parent title for taxonomy */
// 			'parent_item_colon' => __( 'Parent Custom Category:', 'superegowp' ), /* parent taxonomy title */
// 			'edit_item' => __( 'Edit Custom Category', 'superegowp' ), /* edit custom taxonomy title */
// 			'update_item' => __( 'Update Custom Category', 'superegowp' ), /* update title for taxonomy */
// 			'add_new_item' => __( 'Add New Custom Category', 'superegowp' ), /* add new title for taxonomy */
// 			'new_item_name' => __( 'New Custom Category Name', 'superegowp' ) /* name title for taxonomy */
// 		),
// 		'show_admin_column' => true,
// 		'show_ui' => true,
// 		'query_var' => true,
// 		'rewrite' => array( 'slug' => 'custom-slug' ),
//      'show_in_rest'      => true,
// 	)
// );

// now let's add custom tags (these act like categories)
// register_taxonomy( 'custom_tag',
// 	array('custom_type'), /* if you change the name of register_post_type( 'custom_type', then you have to change this */
// 	array('hierarchical' => false,    /* if this is false, it acts like tags */
// 		'labels' => array(
// 			'name' => __( 'Custom Tags', 'superegowp' ), /* name of the custom taxonomy */
// 			'singular_name' => __( 'Custom Tag', 'superegowp' ), /* single taxonomy name */
// 			'search_items' =>  __( 'Search Custom Tags', 'superegowp' ), /* search title for taxomony */
// 			'all_items' => __( 'All Custom Tags', 'superegowp' ), /* all title for taxonomies */
// 			'parent_item' => __( 'Parent Custom Tag', 'superegowp' ), /* parent title for taxonomy */
// 			'parent_item_colon' => __( 'Parent Custom Tag:', 'superegowp' ), /* parent taxonomy title */
// 			'edit_item' => __( 'Edit Custom Tag', 'superegowp' ), /* edit custom taxonomy title */
// 			'update_item' => __( 'Update Custom Tag', 'superegowp' ), /* update title for taxonomy */
// 			'add_new_item' => __( 'Add New Custom Tag', 'superegowp' ), /* add new title for taxonomy */
// 			'new_item_name' => __( 'New Custom Tag Name', 'superegowp' ) /* name title for taxonomy */
// 		),
//      'show_in_rest'      => true,
// 		'show_admin_column' => true,
// 		'show_ui' => true,
// 		'query_var' => true,
// 	)
// );
