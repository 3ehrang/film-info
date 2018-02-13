<?php

/**
 * create films post type
 */
function create_films_post_type() {

	// Set labels for Films Post Type
	$labels = array(
		'name'                => _x( 'Films', 'Post Type General Name', 'unite-filminfo' ),
		'singular_name'       => _x( 'Film', 'Post Type Singular Name', 'unite-filminfo' ),
		'menu_name'           => __( 'Films', 'unite-filminfo' ),
		'parent_item_colon'   => __( 'Parent Film', 'unite-filminfo' ),
		'all_items'           => __( 'All Films', 'unite-filminfo' ),
		'view_item'           => __( 'View Film', 'unite-filminfo' ),
		'add_new_item'        => __( 'Add New Film', 'unite-filminfo' ),
		'add_new'             => __( 'Add New', 'unite-filminfo' ),
		'edit_item'           => __( 'Edit Film', 'unite-filminfo' ),
		'update_item'         => __( 'Update Film', 'unite-filminfo' ),
		'search_items'        => __( 'Search Film', 'unite-filminfo' ),
		'not_found'           => __( 'Not Found', 'unite-filminfo' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'unite-filminfo' ),
	);
	
	// Set other options for Films Post Type
	$args = array(
		'label'               => __( 'Films', 'unite-filminfo' ),
		'description'         => __( 'Film news and reviews', 'unite-filminfo' ),
		'labels'              => $labels,
		// Features supports in Post Editor
		'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', ),
		// Add taxonomy for films
		'taxonomies'          => array( 'category', 'post_tag', 'genres' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 1,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		//'capability_type'     => 'page',
		'rewrite' => array ('slug' => 'films')
	);
	
	/* IMPORTANT: Only use once if you have too, see important note at the top of the page for details.  */
	//flush_rewrite_rules( false );
	
	// Registering your Custom Post Type
	register_post_type( 'films', $args );
}
add_action ( 'init', 'create_films_post_type' );

/**
 * create film taxonomies, Genre, Country, Year and Actors for the post type "film"
 */
add_action( 'init', 'add_film_taxonomies', 0 );
function add_film_taxonomies() {
	
	// Add new taxonomy Genre, make it hierarchical (like categories)
	$labels = array(
		'name'              => _x( 'Genres', 'taxonomy general name', 'unite-filminfo' ),
		'singular_name'     => _x( 'Genre', 'taxonomy singular name', 'unite-filminfo' ),
		'search_items'      => __( 'Search Genres', 'unite-filminfo' ),
		'all_items'         => __( 'All Genres', 'unite-filminfo' ),
		'parent_item'       => __( 'Parent Genre', 'unite-filminfo' ),
		'parent_item_colon' => __( 'Parent Genre:', 'unite-filminfo' ),
		'edit_item'         => __( 'Edit Genre', 'unite-filminfo' ),
		'update_item'       => __( 'Update Genre', 'unite-filminfo' ),
		'add_new_item'      => __( 'Add New Genre', 'unite-filminfo' ),
		'new_item_name'     => __( 'New Genre Name', 'unite-filminfo' ),
		'menu_name'         => __( 'Genre', 'unite-filminfo' ),
	);
	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'genre' ),
	);
	register_taxonomy( 'genre', array( 'films' ), $args );

	// Add Country taxonomy, NOT hierarchical (like tags)
	$labels = array(
		'name'                       => _x( 'Countries', 'taxonomy general name', 'unite-filminfo' ),
		'singular_name'              => _x( 'Country', 'taxonomy singular name', 'unite-filminfo' ),
		'search_items'               => __( 'Search Countries', 'unite-filminfo' ),
		'popular_items'              => __( 'Popular Countries', 'unite-filminfo' ),
		'all_items'                  => __( 'All Countries', 'unite-filminfo' ),
		'parent_item'                => null,
		'parent_item_colon'          => null,
		'edit_item'                  => __( 'Edit Country', 'unite-filminfo' ),
		'update_item'                => __( 'Update Country', 'unite-filminfo' ),
		'add_new_item'               => __( 'Add New Country', 'unite-filminfo' ),
		'new_item_name'              => __( 'New Country Name', 'unite-filminfo' ),
		'separate_items_with_commas' => __( 'Separate Country with commas', 'unite-filminfo' ),
		'add_or_remove_items'        => __( 'Add or remove Country', 'unite-filminfo' ),
		'choose_from_most_used'      => __( 'Choose from the most used Countries', 'unite-filminfo' ),
		'not_found'                  => __( 'No Countries found.', 'unite-filminfo' ),
		'menu_name'                  => __( 'Countries', 'unite-filminfo' ),
	);
	$args = array(
		'hierarchical'          => false,
		'labels'                => $labels,
		'show_ui'               => true,
		'show_admin_column'     => true,
		'update_count_callback' => '_update_post_term_count',
		'query_var'             => true,
		'rewrite'               => array( 'slug' => 'country' ),
	);
	register_taxonomy( 'country', 'films', $args );
	
	// Add Year taxonomy, NOT hierarchical (like tags)
	$labels = array(
			'name'                       => _x( 'Years', 'taxonomy general name', 'unite-filminfo' ),
			'singular_name'              => _x( 'Year', 'taxonomy singular name', 'unite-filminfo' ),
			'search_items'               => __( 'Search Years', 'unite-filminfo' ),
			'popular_items'              => __( 'Popular Years', 'unite-filminfo' ),
			'all_items'                  => __( 'All Years', 'unite-filminfo' ),
			'parent_item'                => null,
			'parent_item_colon'          => null,
			'edit_item'                  => __( 'Edit Year', 'unite-filminfo' ),
			'update_item'                => __( 'Update Year', 'unite-filminfo' ),
			'add_new_item'               => __( 'Add New Year', 'unite-filminfo' ),
			'new_item_name'              => __( 'New Year Name', 'unite-filminfo' ),
			'separate_items_with_commas' => __( 'Separate Year with commas', 'unite-filminfo' ),
			'add_or_remove_items'        => __( 'Add or remove Year', 'unite-filminfo' ),
			'choose_from_most_used'      => __( 'Choose from the most used Years', 'unite-filminfo' ),
			'not_found'                  => __( 'No Years found.', 'unite-filminfo' ),
			'menu_name'                  => __( 'Years', 'unite-filminfo' ),
	);
	$args = array(
			'hierarchical'          => false,
			'labels'                => $labels,
			'show_ui'               => true,
			'show_admin_column'     => true,
			'update_count_callback' => '_update_post_term_count',
			'query_var'             => true,
			'rewrite'               => array( 'slug' => 'year' ),
	);
	register_taxonomy( 'year', 'films', $args );
	
	// Add Actors taxonomy, NOT hierarchical (like tags)
	$labels = array(
			'name'                       => _x( 'Actors', 'taxonomy general name', 'unite-filminfo' ),
			'singular_name'              => _x( 'Actor', 'taxonomy singular name', 'unite-filminfo' ),
			'search_items'               => __( 'Search Actors', 'unite-filminfo' ),
			'popular_items'              => __( 'Popular Actors', 'unite-filminfo' ),
			'all_items'                  => __( 'All Actors', 'unite-filminfo' ),
			'parent_item'                => null,
			'parent_item_colon'          => null,
			'edit_item'                  => __( 'Edit Actor', 'unite-filminfo' ),
			'update_item'                => __( 'Update Actor', 'unite-filminfo' ),
			'add_new_item'               => __( 'Add New Actor', 'unite-filminfo' ),
			'new_item_name'              => __( 'New Actor Name', 'unite-filminfo' ),
			'separate_items_with_commas' => __( 'Separate Actor with commas', 'unite-filminfo' ),
			'add_or_remove_items'        => __( 'Add or remove Actor', 'unite-filminfo' ),
			'choose_from_most_used'      => __( 'Choose from the most used Years', 'unite-filminfo' ),
			'not_found'                  => __( 'No Actors found.', 'unite-filminfo' ),
			'menu_name'                  => __( 'Actors', 'unite-filminfo' ),
	);
	$args = array(
			'hierarchical'          => false,
			'labels'                => $labels,
			'show_ui'               => true,
			'show_admin_column'     => true,
			'update_count_callback' => '_update_post_term_count',
			'query_var'             => true,
			'rewrite'               => array( 'slug' => 'actor' ),
	);
	register_taxonomy( 'actor', 'films', $args );
}

/**
 * Adds meta box :  "Ticket Price" and "Release Date".
 */
function add_film_meta_box() {
	add_meta_box( 'film-ticket-price', __( 'Ticket Price', 'unite-filminfo' ), 'display_film_ticket_price_box', 'films', 'normal', 'high' );
	add_meta_box( 'film-release-date', __( 'Release Date', 'unite-filminfo' ), 'display_film_release_date_box', 'films', 'normal', 'high' );
}
add_action( 'add_meta_boxes', 'add_film_meta_box' );

// add ticket price custom field
function display_film_ticket_price_box( $post ) {
	// Nonce field to validate form request came from current site
	wp_nonce_field( basename( __FILE__ ), 'film-ticket-price' );
	$value = get_post_meta($post->ID, 'film-ticket-price', true);
	$html .= '<p>';
	$html = '<label id="film-ticket-price-label" for="film-ticket-price">Ticket Price</label>';
	$html .= '<input type="text" id="film-ticket-price" name="film-ticket-price" value="' . $value . '" placeholder="Ticket Price" />';
	$html .= '</p>';
	echo $html;
}

// add film release custom field
function display_film_release_date_box( $post ) {
	// Nonce field to validate form request came from current site
	wp_nonce_field( basename( __FILE__ ), 'film-release-date' );
	$value = get_post_meta($post->ID, 'film-release-date', true);
	$html = '<label id="film-release-date-label" for="film-release-date">Release Date</label>';
	$html .= '<input type="text" id="film_release_date" class="datepicker" name="film-release-date" value="' . $value . '" placeholder="Release Date" />';
	echo $html;
}

// save custom field data
function save_postdata($post_id)
{
	// save film-ticket-price
	if (array_key_exists('film-ticket-price', $_POST)) {
		update_post_meta(
				$post_id,
				'film-ticket-price',
				$_POST['film-ticket-price']
		);
	}
	
	// sece film-release-date
	if (array_key_exists('film-release-date', $_POST)) {
		update_post_meta(
				$post_id,
				'film-release-date',
				$_POST['film-release-date']
				);
	}
}
add_action('save_post', 'save_postdata');

// add jquery datepicker to admin backend
function enqueue_date_picker(){
	wp_enqueue_script(
		'field-date',
		 get_stylesheet_directory_uri() . '/admin/field-date.js',
		array('jquery', 'jquery-ui-core', 'jquery-ui-datepicker'),
		time(),
		true
	);
	
	// You need styling for the datepicker. For simplicity I've linked to Google's hosted jQuery UI CSS.
	wp_register_style( 'jquery-ui', 'http://code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css' );
	wp_enqueue_style( 'jquery-ui' );
}
add_action('admin_enqueue_scripts', 'enqueue_date_picker');

/**
 * 
 * Add hook to films archive page to show some custom taxonomy and meta box
 * @param unknown $content
 * @return string
 */
function add_films_fields_after_post_archive($content){
	if ( is_archive() ) {
		echo '<ul class="post-meta col-md-12">';
		echo '<li>';
		the_terms( $post->ID, 'country', 'Countries: ', ' / ' );
		echo '</li><li>';
		the_terms( $post->ID, 'genre', 'Genres: ', ' / ' );
		echo '</li>';
		echo '<li>Ticket Price:' . get_post_meta(get_the_ID(), 'film-ticket-price', true) . '</li>';
		echo '<li>Release Date:' . get_post_meta(get_the_ID(), 'film-release-date', true) . '</li>';
		echo '</ul>';
	}
	return $content;
}
add_filter( "the_content", "add_films_fields_after_post_archive" );

/**
 * Add short code [recent-films] to show recent 5 films
 * @return string
 */
function films_recent_post()
{
	global $post;
	$html = "";

	$my_query = new WP_Query( array(
			'post_type' => 'films',
			'posts_per_page' => 5
	));

	if( $my_query->have_posts() ) {
		$html .= "<ul>";
		while( $my_query->have_posts() ) {
			$my_query->the_post();
			$html .= "<li>" . get_the_title() . "<br>";
			$html .= "<a href=\"" . get_permalink() . "\" class=\"button\">Read more</a></li>";
		}
		$html .= "</ul>";
		wp_reset_postdata();
	}

	return $html;
}
add_shortcode( 'recent-films', 'films_recent_post' );
