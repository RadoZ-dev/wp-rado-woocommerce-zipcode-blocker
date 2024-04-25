<?php 

namespace WoocommerceZipCodeBlocker\Enqueue;

use WoocommerceZipCodeBlocker\Helpers\SingletonTrait;
use WoocommerceZipCodeBlocker\Helpers\LocalizeScript;
use WoocommerceZipCodeBlocker\ValueObjects\ZipCodesRetrieve;

// Exit if accessed directly

if ( ! defined( 'ABSPATH' ) ) 
{
    exit;
} // Exit if accessed directly

class EnqueueJs 
{  
    use SingletonTrait;

    public function __construct()
    {
        add_action( 'wp_enqueue_scripts', [ $this, 'enqueueJsScripts' ] );
    }

    public function enqueueJsScripts()
    {
        $jsScriptVersion = PLUGIN_VERSION . ' . ' . filemtime( PLUGIN_DIR . 'assets/js/zip-code-validation.js' );

        wp_register_script( 'zip-code-validation', PLUGIN_URL . 'assets/js/zip-code-validation.js', array(), $jsScriptVersion, true );

        $zipCodesObject = ZipCodesRetrieve::getInstance();
        $zipCodes = $zipCodesObject->getZipCodes();
        LocalizeScript::localize( 'zip-code-validation', 'zipCodes', $zipCodes );

        wp_enqueue_script( 'zip-code-validation' );
    }
} 