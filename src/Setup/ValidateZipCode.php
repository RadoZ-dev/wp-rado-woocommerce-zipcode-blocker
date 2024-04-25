<?php 

namespace WoocommerceZipCodeBlocker\Setup;

use WoocommerceZipCodeBlocker\Helpers\SingletonTrait;
use WoocommerceZipCodeBlocker\ValueObjects\ZipCodesRetrieve;

if ( ! defined( 'ABSPATH' ) ) 
{
    exit;
} // Exit if accessed directly

class ValidateZipCode
{
    use SingletonTrait;

    public function __construct()
    {
        add_action( 'woocommerce_store_api_checkout_order_processed', [ $this, 'displayNotice' ], 10 );     
    }       

     
    public function displayNotice( $order ) {
        $shippingZipCode = $order->get_shipping_postcode();
        $blockedZipCodes = ZipCodesRetrieve::getInstance()->getZipCodes();


        if( in_array( $shippingZipCode, $blockedZipCodes ) )
        {
            wc_add_notice( __( 'Unfortunately, we don\'t ship our products to your city! Contact us for more information.', 'woocommerce-zip-code-blocker' ), 'error' );
        }
    }
}