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
 add_action( 'woocommerce_after_order_notes', 'scfw_checkout_field' );

 function scfw_checkout_field( $checkout ) {

     echo '<div id="my_custom_checkout_field"><h2>' . __('My Field') . '</h2>';

     woocommerce_form_field( 'my_field_name', array(
         'type'          => 'checkbox',
         'class'         => array('my-field-class form-row-wide'),
         'label'         => __('Send me updates'),
         'placeholder'   => __('Enter something'),
         ), $checkout->get_value( 'my_field_name' ));

     echo '</div>';

 }
