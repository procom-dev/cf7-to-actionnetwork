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
}

?>

<h2>
    <?php _e( 'Action Network', 'cf7-to-actionnetwork' ) ?>
</h2>

<fieldset>
    <legend>
        <?php _e( 'In these options you can activate or deactivate Action Network integration.', 'cf7-to-actionnetwork' ); ?>
    </legend>

    <table class="form-table">
        <tbody>
            <tr>
                <th scope="row">
                    <label>
                        <?php _e( 'Integrate', 'cf7-to-actionnetwork' ) ?>
                    </label>
                </th>
                <td>
                    <p>
                        <label for="ctz-webhook-activate">
                            <input type="checkbox" id="ctz-webhook-activate" name="ctz-webhook-activate" value="1" <?php checked( $activate, "1" ) ?>>
                            <?php _e( 'Send to Action Network', 'cf7-to-actionnetwork' ) ?>
                        </label>
                    </p>
                </td>
            </tr>
            <tr>
                <th scope="row">
                    <label>
                        <?php _e( 'Action NEtowrk form API Endpoint', 'cf7-to-actionnetwork' ) ?>
                    </label>
                </th>
                <td>
                    <p>
                        <label for="ctz-webhook-hook-url">
                            <input type="text" id="ctz-webhook-hook-url" name="ctz-webhook-hook-url" style="width: 100%;" value="<?php echo esc_attr( implode( PHP_EOL, $hook_url ) ) ?>">
                        </label>
                    </p>
                    <?php if ( $activate && empty( $hook_url ) ): ?>
                        <p class="description" style="color: #D00;">
                            <?php _e( 'You should insert webhook URL here to finish configuration.' ); ?>
                        </p>
                    <?php else: ?>
                        <p class="description" style="font-size: 13px;">
                            <?php
                                _e( 'You can add multiple webhook: one per line' );

                                echo '<br>';

                                printf(
                                    __( 'And use placeholders to be replaced by form data: %s', 'cf7-to-actionnetwork' ),
                                    '<span style="font-family: monospace; font-size: 12px; font-weight: bold;">[your-field]</span>'
                                );
                            ?>
                        </p>
                    <?php endif; ?>
                </td>
            </tr>
            <tr>
                <th scope="row">
                    <label>
                        <?php _e( 'Send CF7 Mail', 'cf7-to-actionnetwork' ) ?>
                    </label>
                </th>
                <td>
                    <p>
                        <label for="ctz-webhook-send-mail">
                            <input type="checkbox" id="ctz-webhook-send-mail" name="ctz-webhook-send-mail" value="1" <?php checked( $send_mail, "1" ) ?>>
                            <?php _e( 'Send CF7 mail as usually', 'cf7-to-actionnetwork' ) ?>
                        </label>
                    </p>
                </td>
            </tr>
        </tbody>
    </table>
</fieldset>
