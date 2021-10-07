<?php 


    /*
        Load Styles
    */
    function bot_register_styles() 
    {
        $css_dir = BOT_PLUGIN_URL . 'assets/style/';

        wp_register_style( 'botstyle', $css_dir . 'frontend.css', array(), BOT_VERSION, 'all' );
        wp_enqueue_style( 'botstyle' );

    }

    add_action( 'wp_enqueue_scripts', 'bot_register_styles' );


    /*
        Load Scripts
    */
    function bot_load_scripts() 
    {
        $js_dir = BOT_PLUGIN_URL . 'assets/js/';

        wp_register_script( 'botAction-script', $js_dir . 'botActions.js', array( 'jquery' ), BOT_VERSION );
	    wp_enqueue_script( 'botAction-script' );


        wp_register_script( 'test-script', $js_dir . 'test.js', array( 'jquery' ), BOT_VERSION );
	    wp_enqueue_script( 'test-script' );
        
        $session_id = null;
        
        if ( isset( $_COOKIE['mybot_session_id'] ) && strlen( $_COOKIE['mybot_session_id'] ) > 0 ) 
        {
            $session_id = $_COOKIE['mybot_session_id'];
        } 
        else 
        {
            $session_id = md5( uniqid( 'mybot-' ) ); // do not set cookie here as headers have already been set
        }


        $mybot_script_vars = array(
			'session_id' => apply_filters( 'mybot_script_session_id', $session_id ) 
        );
        
        
        wp_localize_script( 'mybot-script', 'mybot_script_vars', apply_filters( 'mybot_script_vars', $mybot_script_vars ) );
        
        
    };

    add_action( 'wp_enqueue_scripts', 'bot_load_scripts' );



    

?>



