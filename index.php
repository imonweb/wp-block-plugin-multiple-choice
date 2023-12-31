<?php
/**
 * Plugin Name: Are You Paying Attention Quiz
 * Plugin URI: https://github.com/imonweb/url
 * Description: Give your readers a multiple choice question.
 * Author: Imon
 * Author URI: https://www.imonweb.co.uk
 * Text-Domain: are you paying Attention
 * Version: 0.1.0
 * License: GPL2
 * License URL: https://www.gnu.org/licenses/gpl-2.0.txt
 * text-domain: are you paying Attention
 **/

 if( ! defined( 'ABSPATH' )) exit; // Exit if accessed directly 

 class AreYouPayingAttention {
  function __construct() {
    // add_action('enqueue_block_editor_assets', array($this, 'adminAssets'));
    add_action('init', array($this, 'adminAssets'));
  }

  function adminAssets(){
    // wp_enqueue_script('ournewblocktype', plugin_dir_url(__FILE__) . 'build/index.js', array('wp-blocks', 'wp-element'));
    wp_register_script('ournewblocktype', plugin_dir_url(__FILE__) . 'build/index.js', array('wp-blocks', 'wp-element', 'wp-editor'));
    register_block_type('ourplugin/are-you-paying-attention', array(
      'editor_script' => 'ournewblocktype',
      'render_callback' => array($this, 'theHTML')
    ));
  }

  function theHTML($attributes) {
  // return '<p>Today the sky is completely ' . $attributes['skyColor']  . ' and the grass is ' . $attributes['grassColor']  . '!!!'.'</p>'; 
  ob_start(); ?>
    <h3>Today the sky is <?php echo esc_html($attributes['skyColor']); ?> and the grass is <?php echo esc_html($attributes['grassColor']); ?></h3>
  <?php return ob_get_clean();
  }

 } // class AreYouPayingAttention


 $areyoupayingattention = new AreYouPayingAttention();