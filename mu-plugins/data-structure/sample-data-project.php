<?php

namespace Motto\DataStructure\Project;

// Create a new post type
add_action( 'init', function() {
    $label = array(
        'name'                => 'Projects',
        'singular_name' => 'Project',
    );

    $args = array(
        'labels'               => $label,
        'description'       => 'Post type Project',
        'supports'          => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments', 'revisions' ),
        'rewrite'           => array(
            'slug'           => 'project',
            'with_front'  => false,
            'feeds'         => true,
            'pages'         => true,
        ),
        'public'                          => true,
        'show_ui'                      => true,
        'menu_position'            => 20,
        'capability_type'           => 'page',
        'map_meta_cap'          => true,
        'has_archive'                => true,
        'query_var'                   => 'project',
        'show_in_rest'              => true,
        'show_in_menu'           => true,
        'show_in_nav_menus' => true,
    );
    register_post_type( 'project', $args );
});

// Add custom fields for the Project post type
add_filter( 'rwmb_meta_boxes', function( $meta_boxes ) {
	$meta_boxes[] = [
		'title'           => 'Hero Content',
        'id'              => 'hero-content',
        'post_types' => 'project',
		'description'     => 'A custom hero content block',
		'type'            => 'block',
		'icon'            => 'awards',
		'category'        => 'layout',
		'context'         => 'side',
		'render_template' => MOTTO_DATA_STRUCTURE_PLUGIN_DIR . '/admin/blocks/hero/template.php',
		// 'enqueue_style'   => get_template_directory_uri() . '/blocks/hero/style.css',
		'supports' => [
			'align' => ['wide', 'full'],
		],

		// Block fields.
		'fields'          => [
			[
				'type' => 'single_image',
				'id'   => 'image',
				'name' => 'Image',
			],
			[
				'type' => 'text',
				'id'   => 'title',
				'name' => 'Title',
			],
			[
				'type' => 'text',
				'id'   => 'subtitle',
				'name' => 'Subtitle',
			],
			[
				'type' => 'textarea',
				'id'   => 'content',
				'name' => 'Content',
			],
			[
				'type' => 'single_image',
				'id'   => 'signature',
				'name' => 'Signature',
			],
			[
				'type' => 'text',
				'id'   => 'button_text',
				'name' => 'Button Text',
			],
			[
				'type' => 'text',
				'id'   => 'button_url',
				'name' => 'Button URL',
			],
			[
				'type' => 'color',
				'id'   => 'background_color',
				'name' => 'Background Color',
			],
		],
	];
	return $meta_boxes;
} );
