<?php
 /**
 * Plugin Name: Quick Links SC
 * Description: Quick Links Component created using shortcodes
 * Version: 0.1.0
 * Author: Nick Mole
 * Text Domain: Quick-Links-Sc
 */

require_once plugin_dir_path(__FILE__) . 'includes/helpers.php';

require_once plugin_dir_path(__FILE__) . 'admin/qlsc_admin.php';
  
use NMole\QLSC;
use NMole\QLSC\Helpers;
use NMole\QLSC\qlsc_admin;

new qlsc_admin();
