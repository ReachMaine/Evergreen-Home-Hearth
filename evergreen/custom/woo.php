<?php
/* woocommerce hooks & filters here */
function reach_woo_setup() {
  // flatsome uses it's own actions for ordering & filtering
  // remove "showing all 10 results" & default sorting
  remove_action( 'ux_woocommerce_navigate_products', 'woocommerce_result_count', 20 );
  remove_action( 'ux_woocommerce_navigate_products', 'woocommerce_catalog_ordering', 30 );
  remove_action( 'flatsome_category_title_alt', 'woocommerce_result_count', 20 );
  remove_action( 'flatsome_category_title_alt', 'woocommerce_catalog_ordering', 30 );

}

add_action('woocommerce_single_product_summary','reach_catalog_mode_product',30 );

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
