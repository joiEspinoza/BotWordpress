<?php
/*
Plugin Name: My Bot
Description: Bot de interacción con clientes.
Version: 1.0.0
Author: Future AI
Author URI: https://myfuture.ai/
License: GPL2 License
*/

final class myBot
{

  private static $instance ;

  public static function instance()
  {
      
    
    if ( !isset( self::$instance ) && !self::$instance instanceof myBot ) 
    {
      self::$instance = new myBot();
      self::$instance->setup_session();
      self::$instance->setup_constants();

      self::$instance->includes();
      self::$instance->api = new BOT_API();
    }
    
    return self::$instance;
  
  }


  private function setup_constants()
  {
      
    // Plugin version.
    if ( !defined( 'BOT_VERSION' ) ) {
        define( 'BOT_VERSION', '1.1' );
    }
    
    // Plugin slug.
    if ( !defined( 'BOT_SLUG' ) ) {
        define( 'BOT_SLUG', 'futureBot' );
    }
    
    // Plugin Folder Path.
    if ( !defined( 'BOT_PLUGIN_DIR' ) ) {
        define( 'BOT_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
    }
    
    // Plugin Folder URL.
    if ( !defined( 'BOT_PLUGIN_URL' ) ) {
        define( 'BOT_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
    }
    
    // Plugin Root File.
    if ( !defined( 'BOT_PLUGIN_FILE' ) ) {
        define( 'BOT_PLUGIN_FILE', __FILE__ );
    }

  }


  private function includes()
  {
    require_once BOT_PLUGIN_DIR . 'includes/admin.php';
    require_once BOT_PLUGIN_DIR . 'includes/loadScripts.php';
    require_once BOT_PLUGIN_DIR . 'includes/bot.php';
    require_once BOT_PLUGIN_DIR . 'includes/api/class-bot-api.php';
  }


  public function setup_session()
  {
      
    if ( !(isset( $_COOKIE['mybot_session_id'] ) && strlen( $_COOKIE['mybot_session_id'] ) > 0) ) 
    {
        $session_id = md5( uniqid( 'mybot-' ) );
        setcookie(
            'mybot_session_id',
            $session_id,
            time() + 86400,
            '/'
        );
        // 86400 = 1 day
    }
  
    
  }

}


function BOT()
{
  return myBot::instance();
}
  

// Get BOT Running.
BOT();





