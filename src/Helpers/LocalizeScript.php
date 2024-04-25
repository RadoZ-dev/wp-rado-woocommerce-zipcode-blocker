<?php 

namespace WoocommerceZipCodeBlocker\Helpers;

if ( ! defined( 'ABSPATH' ) ) 
{
    exit;
} // Exit if accessed directly

class LocalizeScript
{
    public static function localize( $scriptHandle, $objectName, $data )
    {
        wp_localize_script( $scriptHandle, $objectName, $data );
    }
}