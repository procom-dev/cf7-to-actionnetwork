<?php

// If this file is called directly, call the cops.
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

/**
 * $contactform is 'WPCF7_ContactForm' from 'CFTZ_Module_CF7::html_template_panel_html'
 */

$activate = '0';
$hook_url = [];
$send_mail = '0';
$special_mail_tags = '';
$custom_headers = '';
$source = 'ContactForm7';

if ( is_a( $contactform, 'WPCF7_ContactForm' ) ) {
    $properties = $contactform->prop( CFTZ_Module_CF7::METADATA );

    if ( isset( $properties['activate'] ) ) {
        $activate = $properties['activate'];
    }

    if ( isset( $properties['hook_url'] ) ) {
        $hook_url = (array) $properties['hook_url'];
    }

    if ( isset( $properties['send_mail'] ) ) {
        $send_mail = $properties['send_mail'];
    }

    if ( isset( $properties['special_mail_tags'] ) ) {
        $special_mail_tags = $properties['special_mail_tags'];
    }

    if ( isset( $properties['custom_headers'] ) ) {
        $custom_headers = $properties['custom_headers'];
    }

    if ( isset( $properties['source'] ) ) {
        $source = $properties['source'];
    }
}

?>

<h2>
    <?php _e( 'Action Network', 'cf7-to-actionnetwork' ) ?>
</h2>

<fieldset>
    <legend>
        <?php _e( 'Configure the integration with Action Network.', 'cf7-to-actionnetwork' ); ?>
    </legend>

    <table class="form-table">
        <tbody>
            <tr>
                <th scope="row">
                    <label for="ctz-webhook-activate">
                        <?php _e( 'Activate Integration', 'cf7-to-actionnetwork' ) ?>
                    </label>
                </th>
                <td>
                    <input type="checkbox" id="ctz-webhook-activate" name="ctz-webhook-activate" value="1" <?php checked( $activate, "1" ) ?>>
                    <span class="description"><?php _e( 'Enable sending form data to Action Network.', 'cf7-to-actionnetwork' ) ?></span>
                </td>
            </tr>
            <tr>
                <th scope="row">
                    <label for="ctz-webhook-hook-url">
                        <?php _e( 'Action Network API Endpoint', 'cf7-to-actionnetwork' ) ?>
                    </label>
                </th>
                <td>
                    <input type="text" id="ctz-webhook-hook-url" name="ctz-webhook-hook-url" style="width: 100%;" value="<?php echo esc_attr( implode( PHP_EOL, $hook_url ) ) ?>">
                    <p class="description">
                        <?php _e( 'Enter the Action Network API Endpoint URL. You can add multiple URLs, one per line.', 'cf7-to-actionnetwork' ); ?>
                    </p>
                </td>
            </tr>
            <tr>
                <th scope="row">
                    <label for="ctz-webhook-send-mail">
                        <?php _e( 'Send CF7 Mail', 'cf7-to-actionnetwork' ) ?>
                    </label>
                </th>
                <td>
                    <input type="checkbox" id="ctz-webhook-send-mail" name="ctz-webhook-send-mail" value="1" <?php checked( $send_mail, "1" ) ?>>
                    <span class="description"><?php _e( 'Send the Contact Form 7 email as usual.', 'cf7-to-actionnetwork' ) ?></span>
                </td>
            </tr>
            <tr>
                <th scope="row">
                    <label for="ctz-webhook-source">
                        <?php _e( 'Source', 'cf7-to-actionnetwork' ) ?>
                    </label>
                </th>
                <td>
                    <input type="text" id="ctz-webhook-source" name="ctz-webhook-source" style="width: 100%;" value="<?php echo esc_attr( $source ); ?>" placeholder="ContactForm7">
                    <p class="description">
                        <?php _e( 'Enter the source to be used if the URL parameter "source" is not present.', 'cf7-to-actionnetwork' ); ?>
                    </p>
                </td>
            </tr>
        </tbody>
    </table>
</fieldset>
