<?php
/**
 * The template for displaying product title within loops.
 *
 * Override this template by copying it to yourtheme/woocommerce/content-product.php
 *
 * @author 		zig
 * @version     1.6.4
 */

global $product, $woocommerce_loop;

$attachment_ids = $product->get_gallery_attachment_ids();

?>         
	
<li class="product small-title">
<a href="<?php the_permalink(); ?>" style="display:block" >
      <div class="product-title">
       <?php the_title(); ?> 
      </div><!-- end product-title -->
</a>
       <?php woocommerce_get_template( 'loop/sale-flash.php' ); ?>
</li><!-- end product -->

