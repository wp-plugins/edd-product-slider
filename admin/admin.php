<?php 

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly 

// EDD Plugin Dependency Admin Notice
function wpb_esp_admin_notice() {
    ?>
    <div class="error">
        <p><?php _e( '<b>Easy Digital Download Slider Plugin</b> needs <b>Easy Digital Download Plugin</b> installed and activated.', 'wpbean' ); ?></p>
    </div>
    <?php
}

include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
if ( !is_plugin_active( 'easy-digital-downloads/easy-digital-downloads.php' ) ) {
  add_action( 'admin_notices', 'wpb_esp_admin_notice' );
} 
