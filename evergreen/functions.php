<?php


	require_once('inc/reach_functions.php');
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

/*****  change the login screen logo ****/
	function my_login_logo() { ?>
		<style type="text/css">
			body.login div#login h1 a {
				background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/images/eg.png);
				padding-bottom: 30px;
				background-size: cover;
				margin-left: 0px;
				margin-bottom: 0px;
				margin-right: 0px;
				height: 60px;
				width: 100%;
			}
		</style>
	<?php }
	add_action( 'login_enqueue_scripts', 'my_login_logo' );
	/*****  end custom login screen logo ****/

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

	function reach_catalog_mode_product() {
		/* global $flatsome_opt; */
        echo '<div class="catalog-product-text zig">';
        global $post;
        if (has_term("services", "product_cat")) { // if in product in services category... dont put form in accordian
        	echo do_shortcode('<div style="border:groove; border-color:#206d12; padding:30px 30px 10px">[ninja_forms_display_form id=2]</div>');
        } else {
        	echo do_shortcode('<div style="border:groove; border-color:#206d12">[accordion][accordion-item title="I&#39;m Interested"][ninja_forms_display_form id=2][/accordion-item][/accordion]</div>');
        }
        echo '</div>';
	}
