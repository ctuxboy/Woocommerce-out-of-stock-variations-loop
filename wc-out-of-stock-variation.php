<?php
add_action( 'woocommerce_before_shop_loop_item_title', 'wk_out_of_stock_variations_loop' );

function wk_out_of_stock_variations_loop(){
    global $product;
    if ( $product->product_type == 'variable' ) { // if variation product is out of stock

        $available = $product->get_available_variations();
        if ( $available )foreach ( $available as $instockvar ) {
            if ( isset($instockvar['attributes']['attribute_pa_kleur'] ) ) {
              
		if ( ( $instockvar['attributes']['attribute_pa_kleur'] == $_GET['filter_kleur'] ) && (!$instockvar['max_qty']>0) ) {
		   global $product;
		   $id = $product->get_id();
	           echo "<style>.post-$id{display: none}</style>";
		   // echo  '<p style="color:red;font-weight: bold;">OUT OF STOCK</p>';
                }
            }
        }
    }	
    if ( !$product->is_in_stock() ) { // if single product is out of stock
        echo  '<p style="color:red;font-weight: bold;">OUT OF STOCK</p>';
    }
}
