<?php 

namespace WoocommerceZipCodeBlocker\Setup;

use WoocommerceZipCodeBlocker\Helpers\SingletonTrait;

if ( ! defined( 'ABSPATH' ) ) 
{
    exit;
} // Exit if accessed directly

class RegisterSettings 
{
    use SingletonTrait;

    public function __construct()
    {
        add_action( 'admin_init', [ $this, 'zipCodeBlockerRegisterSettings' ] );
    }

    public function zipCodeBlockerRegisterSettings() 
    {
        register_setting(
            'zip_codes_blocker_group', 
            'zip_code_blocker_field',
            [ $this, 'sanitize_zip_codes_field' ]
        );
        
        add_settings_section(
            'zip_code_blocker_settings',
            __( 'Add Zip Codes', 'woocommerce-zip-code-blocker' ),
            [ $this, 'zip_code_blocker_section_callback' ],
            'zip-code-blocker'
        );

        add_settings_field(
            'zip_code_blocker_field',
            __( 'Insert zip codes here:', 'woocommerce-zip-code-blocker' ),
            [ $this, 'zip_code_blocker_field_callback' ],
            'zip-code-blocker',
            'zip_code_blocker_settings'
        );
    }

    public function zip_code_blocker_section_callback() 
    {
        echo '<p>' .  __( 'Please, enter the zip codes for the cities you want to block, delimited by comma.', 'woocommerce-zip-code-blocker' ) . '</p>';
    }

    public function zip_code_blocker_field_callback() 
    {
        $values = get_option( 'zip_code_blocker_field' );
        $values = maybe_unserialize( $values );

        if( is_array( $values ) )
        {
            $values  = implode( ', ', $values );
        }

        echo '<input type="text" id="zip_code_blocker_field" name="zip_code_blocker_field" value="' . esc_attr( $values ) . '" />';
    }

    public function sanitize_zip_codes_field( $values ) 
    {
        $values = sanitize_text_field( $values );
        $values = preg_replace( '/\s+/', '', $values );
        $values = explode( ',', $values );
        $values = serialize( $values );
        
        return $values;
    }
}
