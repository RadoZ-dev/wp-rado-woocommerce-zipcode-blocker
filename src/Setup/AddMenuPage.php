<?php 

namespace WoocommerceZipCodeBlocker\Setup;

use WoocommerceZipCodeBlocker\Helpers\SingletonTrait;

if ( ! defined( 'ABSPATH' ) ) 
{
    exit;
} // Exit if accessed directly

class AddMenuPage 
{
    use SingletonTrait;

    private $options;

    public function __construct()
    {
        add_action( 'admin_menu', [ $this, 'zipCodeBlockerMenu' ] );
    }

    public function zipCodeBlockerMenu() 
    {
        add_menu_page(
            __( 'Zip Code Blocker', 'woocommerce-zip-code-blocker' ),
            __( 'Zip Code Blocker', 'woocommerce-zip-code-blocker' ),
            'manage_options',
            'zip-code-blocker',
            [ $this, 'zipCodeBlockerForm' ]
        );
    }

    function zipCodeBlockerForm() 
    {
        $this->options = get_option( 'zip_code_blocker_field' );
        ?>
        <div class="wrap">
            <h2>
                <?php _e( 'Zip Code Blocker Settings', 'woocommerce-zip-code-blocker' ); ?>
            </h2>

            <form method="post" action="options.php">
                <?php settings_fields( 'zip_codes_blocker_group' ); ?>
                <?php do_settings_sections( 'zip-code-blocker' ); ?>
                <?php submit_button( __( 'Save Settings', 'woocommerce-zip-code-blocker' ) ); ?>
            </form>
        </div>
        <?php
    }
}
