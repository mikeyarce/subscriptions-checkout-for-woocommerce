<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://mikeyarce.com/subscriptions-checkout-for-woocommerce
 * @since             1.0.0
 * @package           subscriptions-checkout-for-woocommerce
 *
 * @wordpress-plugin
 * Plugin Name:       Subscriptions Checkout for WooCommerce
 * Plugin URI:        http://mikeyarce.com/subscriptions-checkout-for-woocommerce
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Justin Shreve, Mikey Arce
 * Author URI:        http://mikeyarce.com/contact
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       subscriptions-checkout-for-woocommerce
 * Domain Path:       /languages
 */
 /**
  * Add the field to the checkout
  */
  if ( class_exists( 'Jetpack', false ) ) {
    $jetpack_active_modules = get_option('jetpack_active_modules');
    if ( $jetpack_active_modules && in_array( 'subscriptions', $jetpack_active_modules ) ) {
      add_action( 'woocommerce_after_order_notes', 'scfw_checkout_field' );
    }
  }

 function scfw_checkout_field( $checkout ) {

     woocommerce_form_field( 'scfw_field', array(
         'type'          => 'checkbox',
         'class'         => array('scfw_class form-row-wide'),
         'label'         => __('Send me updates', 'subscriptions-checkout-for-woocommerce'),
         ), $checkout->get_value( 'scfw_field' ));

 }

add_action( 'woocommerce_checkout_order_processed', 'scfw_process_checkout', 10, 2 );

function scfw_process_checkout( $order_id, $posted ) {

   error_log( print_r( $posted, 1 ) );

  }
