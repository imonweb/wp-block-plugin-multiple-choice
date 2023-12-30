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
    add_action('enqueue_block_editor_assets', array($this, 'adminAssetsBlock'));
  }

  function adminAssetsBlock(){
    wp_enqueue_script('ournewblocktype', plugin_dir_url(__FILE__) . 'test.js', array('wp-blocks'));
  }
 }


 $areyoupayingattention = new AreYouPayingAttention();