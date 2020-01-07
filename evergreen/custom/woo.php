<?php
/* woocommerce hooks & filters here */
function reach_woo_setup() {
  // flatsome uses it's own actions for ordering & filtering
  // remove "showing all 10 results" & default sorting
  remove_action( 'ux_woocommerce_navigate_products', 'woocommerce_result_count', 20 );
  remove_action( 'ux_woocommerce_navigate_products', 'woocommerce_catalog_ordering', 30 );
  remove_action( 'flatsome_category_title_alt', 'woocommerce_result_count', 20 );
  remove_action( 'flatsome_category_title_alt', 'woocommerce_catalog_ordering', 30 );
  // not using product images....
  remove_action('woocommerce_before_single_product_summary', 'woocommerce_show_product_images', 20);


}
