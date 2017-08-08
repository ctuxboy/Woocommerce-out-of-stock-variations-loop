<?php
add_action( 'woocommerce_after_shop_loop_item', 'wk_out_of_stock_variations_loop' );

function wk_out_of_stock_variations_loop(){
    global $product;
    if ( $product->product_type == 'variable' ) {

        $available = $product->get_available_variations();
        if ( $available )foreach ( $available as $instockitem ) {
            if ( isset($instockitem['attributes']['attribute_pa_kleur'] ) ) {
				if ( ( $instockitem['attributes']['attribute_pa_kleur'] == $_GET['filter_kleur'] ) && ( !$instockitem['max_qty']>0 ) ) {
                    echo  '<p>NIET OP VOORRAAD<p>';
                }
            
            }
        }
    }
}
