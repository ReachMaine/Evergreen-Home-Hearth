<?php


	require_once(get_stylesheet_directory().'/custom/reach_functions.php');
	require_once(get_stylesheet_directory().'/custom/woo.php');

	/* change browswer title */
	add_filter( 'wp_title', 'fix_browswer_title', 11, 2 );
	/* hide the category count  */
	add_filter( 'woocommerce_subcategory_count_html', 'jk_hide_category_count' );
	function jk_hide_category_count() {
		// No count
	}
	add_filter ('wc_product_documents_link_target', 'zig_open_doc_blank');
	function zig_open_doc_blank() {
		return '_blank';
	}


		/***** change admin favicon *****/
	/* add favicons for admin */
	add_action('login_head', 'add_favicon');
	add_action('admin_head', 'add_favicon');

	function add_favicon() {
		$favicon_url = get_stylesheet_directory_uri() . '/images/admin-favicon.ico';
		echo '<link rel="shortcut icon" href="' . $favicon_url . '" />';
	}
	/***** end admin favicon *****/

	function fb_change_search_url_rewrite() {
		if ( is_search() && ! empty( $_GET['s'] ) ) {
			wp_redirect( home_url( "/search/" ) . urlencode( get_query_var( 's' ) ) );
			exit();
		}
	}
	add_action( 'template_redirect', 'fb_change_search_url_rewrite' );

	/*****  after theme setup  ****/
	add_action('after_setup_theme', 'reach_setup', 10);
		add_action('after_setup_theme', 'reach_woo_setup', 10);
	function reach_setup() {

	}
