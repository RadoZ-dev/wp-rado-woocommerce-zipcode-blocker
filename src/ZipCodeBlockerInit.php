<?php 

namespace WoocommerceZipCodeBlocker;

use WoocommerceZipCodeBlocker\Helpers\SingletonTrait;
use WoocommerceZipCodeBlocker\Setup\AddMenuPage;
use WoocommerceZipCodeBlocker\Setup\RegisterSettings;
use WoocommerceZipCodeBlocker\Setup\ValidateZipCode;
use WoocommerceZipCodeBlocker\Enqueue\EnqueueJs;

if ( ! defined( 'ABSPATH' ) ) 
{
    exit;
} // Exit if accessed directly

class ZipCodeBlockerInit 
{
    use SingletonTrait;

    public function __construct()
    {
        $this->init();
    }

    public function init()
    {
        AddMenuPage::getInstance();
        RegisterSettings::getInstance();
        ValidateZipCode::getInstance();
        EnqueueJs::getInstance();
    }
}
