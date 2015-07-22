<?php
/**
 * Addon example class
 *
 * This example shows how to extend basic APP_Listing class and which methods
 * should be used.
 *
 * Property 'essentials' contains all Listing submodules instances - what
 * provides basic functionality. These submodules might be replaced by Addon by
 * setting extended submodule objects.
 * 
 * Read access to the submodules is provided by the magic __get() method, for ex.:
 * 
 *     $fields = $listing->form->get_form_fields();
 *     $price  = $listing->options->price;
 * 
 * Where the '$listing' is the APP_Listing instance and 'form' is the object 
 * stored in $essentials['form'].
 *
 * Use methods '_register_listing_type()' and '_register_taxonomies()' for
 * registering post types and taxonomies, or do it externally on the 'init'
 * action with default priority.
 *
 * Number or registered post types is not limited, but with single Listing
 * instance might be assigned only one post type.
 */
final class My_Pay2Post_Addon extends APP_Listing {

	/**
	 * Listing type constructor
	 *
	 * Here might be replaced default submodules
	 */
	public function __construct() {

		// Override submodules example.
		// New class should be an ancestor of the overridden one.
		//
		// In example My_Addon_Forms extends APP_Listing_Forms.
		// $this->essentials['form'] = new My_Addon_Forms( $this );
		//
		// In example My_Addon_Form_Settings extends APP_Listing_Form_Settings.
		//if ( is_admin() ) {
		//	$this->essentials['form_settings'] = new My_Addon_Form_Settings( $this );
		//}

		// Construct parent and set listing type (post type to be assigned with).
		parent::__construct( 'mytype' );
	}

	/**
	 * Registers "Mytype" post type
	 */
	protected function _register_listing_type() {

		$labels = array(
			'name'               => __( 'Mytype Items', APP_TD ),
			'singular_name'      => __( 'Mytype Item', APP_TD ),
			'add_new'            => __( 'Add New', APP_TD ),
			'add_new_item'       => __( 'Add New Mytype Item', APP_TD ),
			'edit_item'          => __( 'Edit Mytype Item', APP_TD ),
			'new_item'           => __( 'New Mytype Item', APP_TD ),
			'view_item'          => __( 'View Mytype Item', APP_TD ),
			'search_items'       => __( 'Search Mytype Items', APP_TD ),
			'not_found'          => __( 'No mytype items found', APP_TD ),
			'not_found_in_trash' => __( 'No mytype items found in Trash', APP_TD ),
			'parent_item_colon'  => __( 'Parent Mytype Items:', APP_TD ),
			'menu_name'          => __( 'Mytype Items', APP_TD ),
		);

		$args = array(
			'labels'              => $labels,
			'hierarchial'         => false,
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'menu_position'       => 6,
			'show_in_nav_menus'   => false,
			'publicly_queryable'  => true,
			'exclude_from_search' => false,
			'has_archive'         => true,
			'query_var'           => true,
			'can_export'          => true,
		);

		register_post_type( 'mytype', $args );
	}

	/**
	 * Registers taxonomies (optional)
	 */
	protected function _register_taxonomies() {

		$category_labels = array(
			'name'                => __( 'Mytype Categories', APP_TD ),
			'singular_name'       => __( 'Mytype Category', APP_TD ),
			'search_items'        => __( 'Search Mytype Categories', APP_TD ),
			'all_items'           => __( 'All Mytype Categories', APP_TD ),
			'parent_item'         => __( 'Parent Listing Category', APP_TD ),
			'parent_item_colon'   => __( 'Parent Listing Category:', APP_TD ),
			'edit_item'           => __( 'Edit Mytype Category', APP_TD ),
			'update_item'         => __( 'Update Mytype Category', APP_TD ),
			'add_new_item'        => __( 'Add New Mytype Category', APP_TD ),
			'new_item_name'       => __( 'New Mytype Category Name', APP_TD ),
			'add_or_remove_items' => __( 'Add or remove mytype categories', APP_TD ),
			'menu_name'           => __( 'Categories', APP_TD ),
		);
		$category_args = array(
			'labels'            => $category_labels,
			'public'            => true,
			'show_ui'           => true,
			'show_admin_column' => true,
			'show_in_nav_menus' => true,
			'show_tagcloud'     => false,
			'hierarchical'      => true,
			'query_var'         => true,
		);

		register_taxonomy( 'mytype_cat', 'mytype', $category_args );

		$tag_labels = array(
			'name'                => __( 'Mytype Tags', APP_TD ),
			'singular_name'       => __( 'Mytype Tag', APP_TD ),
			'search_items'        => __( 'Search Mytype Tags', APP_TD ),
			'all_items'           => __( 'All Mytype Tags', APP_TD ),
			'parent_item'         => __( 'Parent Listing Tag', APP_TD ),
			'parent_item_colon'   => __( 'Parent Listing Tag:', APP_TD ),
			'edit_item'           => __( 'Edit Mytype Tag', APP_TD ),
			'update_item'         => __( 'Update Mytype Tag', APP_TD ),
			'add_new_item'        => __( 'Add New Mytype Tag', APP_TD ),
			'new_item_name'       => __( 'New Mytype Tag Name', APP_TD ),
			'add_or_remove_items' => __( 'Add or remove mytype tags', APP_TD ),
			'menu_name'           => __( 'Tags', APP_TD ),
		);

		$tag_args = array(
			'labels'            => $tag_labels,
			'public'            => true,
			'show_ui'           => true,
			'show_admin_column' => true,
			'show_in_nav_menus' => true,
			'show_tagcloud'     => true,
			'hierarchical'      => false,
			'query_var'         => true,
		);

		register_taxonomy( 'mytype_tag', 'mytype', $tag_args );
	}

}
