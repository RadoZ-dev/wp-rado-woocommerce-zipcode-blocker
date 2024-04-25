<?php 

namespace WoocommerceZipCodeBlocker\ValueObjects;

use WoocommerceZipCodeBlocker\Helpers\SingletonTrait;

if ( ! defined( 'ABSPATH' ) ) 
{
    exit;
} // Exit if accessed directly

class ZipCodesRetrieve
{
    use SingletonTrait;

    private $zipCodes;

    public function __construct()
    {
        $this->zipCodes = maybe_unserialize( get_option( 'zip_code_blocker_field' ) );
    }

    public function getZipCodes()
    {
        return $this->zipCodes;
    }
}