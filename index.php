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

    /*  not required if using block.json */
    /*
      wp_register_style('quizeditcss', plugin_dir_url(__FILE__) . 'build/index.css');
      wp_register_script('ournewblocktype', plugin_dir_url(__FILE__) . 'build/index.js', array('wp-blocks', 
        'wp-element', 'wp-editor')
      );
    */
    /*  without the block.json */
    // register_block_type('ourplugin/are-you-paying-attention', array(
    //   'editor_script' => 'ournewblocktype',
    //   'editor_style'  =>  'quizeditcss',
    //   'render_callback' => array($this, 'theHTML')
    // ));
    /*  with block.json */
    register_block_type(__DIR__, array(
      'render_callback' => array($this, 'theHTML')
    ));
  }

   
  /* ====== Passing Block Data From PHP into JS/React ====== */
  function theHTML($attributes) {
 
  if(!is_admin()){
    wp_enqueue_script('attentionFrontend', plugin_dir_url(__FILE__) . 'build/frontend.js', array('wp-element'), '1.0', true);
    // wp_enqueue_style('attentionFrontendStyles', plugin_dir_url(__FILE__) . 'build/frontend.css');
  }

  ob_start(); ?>
    <div class="paying-attention-update-me">
      <pre  style="display: none;"><?php echo wp_json_encode($attributes) ?></pre>
    </div>
  <?php return ob_get_clean();
  }

 } // class AreYouPayingAttention


 $areyoupayingattention = new AreYouPayingAttention();