<?php 

    function bot_plugin_menu()
    {
        add_menu_page('My Bot',
                    'My Bot',
                    'publish_pages',
                    'mybot_settings',
                    'mybot_settings_page',
                    'dashicons-format-chat');
    };



    function mybot_settings_page()
    {
        ?>
            
            <style>
                
                .row
                {
                    width: 100% !important;
                }


                .col_1
                {
                    width: 25% !important;
                }

                .col_2
                {
                    width: 50% !important;
                }

                .col_3
                {
                    width: 75% !important;
                }

                .col_4
                {
                    width: 100% !important;
                }


                .floatL
                {
                    float: left;
                }


                .mt-10
                {
                    margin-top: 10px;
                }


                .mt-10-less
                {
                    margin-top: -250px !important;
                }


                .backColor
                {
                    background-color: white !important;
                }


                .titleColor
                {
                    color: #102647;
                }


                .panelAdmin
                {
                    padding: 1rem;
                    height: auto;
                }


                .blockAdmin
                {
                    
                    border-radius: 27px 27px 27px 27px;
                    -moz-border-radius: 27px 27px 27px 27px;
                    -webkit-border-radius: 27px 27px 27px 27px;
                    border: 0px solid #000000;
                    -webkit-box-shadow: -3px 2px 14px -8px rgba(0,0,0,0.42);
                    -moz-box-shadow: -3px 2px 14px -8px rgba(0,0,0,0.42);
                    box-shadow: -3px 2px 14px -8px rgba(0,0,0,0.42);
                    width: 250px;
                    padding: 1rem;
                    min-height: 340px;
                    background-color: white !important;
                }


                .blockAdminKey
                {
                    border-radius: 49px 49px 49px 49px;
                    -moz-border-radius: 49px 49px 49px 49px;
                    -webkit-border-radius: 49px 49px 49px 49px;
                    border: 0px solid #000000;
                    -webkit-box-shadow: -3px 2px 14px -8px rgba(0,0,0,0.42);
                    -moz-box-shadow: -3px 2px 14px -8px rgba(0,0,0,0.42);
                    box-shadow: -3px 2px 14px -8px rgba(0,0,0,0.42);
                    width: 500px;
                    padding: 2rem;
                    min-height: 130px;
                    margin-top: 100%;
                    margin-left: 115%;
                    margin-bottom: 20%;
                }

               
                .inputAdmin
                {
                    width: 200px !important;
                    height: 30px !important;
                    text-align: center !important; 
                }


                .inputAdminBtn
                {
                    width: 400px !important;
                    height: 40px !important;
                    text-align: center !important;
                    background-color: #102647;
                    color: white;
                    margin-top: 2rem;
                    border-radius: 55px 55px 55px 55px;
                    -moz-border-radius: 55px 55px 55px 55px;
                    -webkit-border-radius: 55px 55px 55px 55px;
                    border: 0px solid #000000;
                }

                .inputAdminBtnKey
                {
                    margin-top: 1rem !important;
                }


                .baseAdmin__alingCenter
                {
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    flex-direction: column;
                }

                .base__alingRow
                {
                    display: flex;
                    flex-direction: row;

                }

                .base_row_center
                {
                    display: flex;
                    flex-direction: row;
                    justify-content: space-evenly;
                }

                .inputKey
                {
                    width: 400px;
                    height: 40px;
                    text-align: center;
                }

            </style>


            <div class="wrap backColor">
                
                <div class="panelAdmin">
                
                    <div class="row">

                        <div class="col_4">

                            <h2 class="titleColor">My Bot Configuraciones</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent dapibus ex vitae faucibus fringilla. Curabitur turpis ex, auctor at lacinia quis, ornare non orci. Donec ultrices dapibus sapien non consectetur.</p>
                            

                        </div>
                    
                    </div>

                    <br>
                    <hr>
                    <br>
           
                    <div class="row mt-10">

                        <form id="formMyBot" method="POST" action="options.php">
                    
                        <?php 
                            settings_fields( 'mybot-settings-group' );
                            do_settings_sections( 'mybot-settings-group' ); 
                        ?>
                        
                        <div class="col_1 floatL">

                            <div class="blockAdmin">
                                
                                <center>
                                  <h3 class="titleColor">Switch</h3>  
                                </center>
                                
                                <hr>
                                <br>
    
                                <div class="baseAdmin__alingCenter">
                                    
                                    <label><b>Color&nbsp;&nbsp;</b></label>
                                    <input class="inputAdmin" type="color" name="colorSwitchBot" id="colorSwitchBot" value="<?php echo get_option('colorSwitchBot'); ?>" />
                                    
                                    <br/>
                                    
                                    <label><b>Imagen Switch&nbsp;&nbsp;</b></label>
                                    <input class="inputAdmin" name="imgSwitch" id="imgSwitch" value="<?php echo get_option('imgSwitch'); ?>"/>
                    
                                </div>
                            
                            </div>

                        </div>


                        <div class="col_1 floatL">

                            <div class="blockAdmin">
                                
                                <center>
                                    <h3 class="titleColor">Cabecera Bot</h3>
                                </center>
                                
                                <hr>
                                <br>

                                <div class="baseAdmin__alingCenter">

                                    <label><b>Titulo</b></label>
                                    <input class="inputAdmin" type="text" name="title" id="title" value="<?php echo get_option('title'); ?>" />
                                    
                                    <br/>
                                    
                                    <label><b>Imagen Perfil Bot&nbsp;&nbsp;</b></label>
                                    <input class="inputAdmin" name="imgPerfil" id="imgPerfil" value="<?php echo get_option('imgPerfil'); ?>"/>
                    
                                    <br/>

                                    <label><b>Color&nbsp;&nbsp;</b></label>
                                    <input class="inputAdmin" type="color" name="colorCabecera" id="colorCabecera" value="<?php echo get_option('colorCabecera'); ?>"/>

                                    &nbsp;&nbsp;<label><b>Color texto&nbsp;&nbsp;</b></label>
                                    <input class="inputAdmin" type="color" name="colorTextoCabecera" id="colorTextoCabecera" value="<?php echo get_option('colorTextoCabecera'); ?>"/>
                                    
                                </div>
                            
                            </div>

                        </div>


                        <div class="col_1 floatL">

                            <div class="blockAdmin">
                                
                                <center>
                                    <h3 class="titleColor">Mensajes Bot</h3>
                                </center>
                                
                                <hr>
                                <br>

                                <div class="baseAdmin__alingCenter">

                                    <label><b>Color globo texto &nbsp;</b></label>
                                    <input class="inputAdmin" type="color" name="colorGloboTextoBot" id="colorGloboTextoBot" value="<?php echo get_option('colorGloboTextoBot'); ?>"/>
                                    
                                    &nbsp;&nbsp;<label><b>Color texto &nbsp;</b></label>
                                    <input class="inputAdmin" type="color" name="colorTextoBot" id="colorTextoBot" value="<?php echo get_option('colorTextoBot'); ?>"/>

                                </div>
                            
                            </div>
                        
                        </div>


                        <div class="col_1 floatL">

                            <div class="blockAdmin">
                                
                                
                                <center>
                                    <h3 class="titleColor">Mensajes Usuario</h3>
                                </center>
                                
                                <hr>
                                <br>

                                <div class="baseAdmin__alingCenter">
                                
                                    <label><b>Color globo texto &nbsp;</b></label>
                                    <input class="inputAdmin" type="color" name="colorGloboTextoUser" id="colorGloboTextoUser" value="<?php echo get_option('colorGloboTextoUser'); ?>" />

                                    &nbsp;&nbsp;<label><b>Color texto &nbsp;</b></label>
                                    <input class="inputAdmin" type="color" name="colorTextoUser" id="colorTextoUser" value="<?php echo get_option('colorTextoUser'); ?>" />
    
                                </div>
                            
                            </div>
                    
                        </div>

    
                        <center><button class="inputAdminBtn" form="formMyBot" type="submit">Guardar Cambios</button></center>
                                
                      

                        </form>

                    </div>

                    <br>
                    <hr>
      
                    <div class="row mt-10-less">

                        <form id="formMyBot2" method="POST" action="options.php">
                            
                            <?php 
                                settings_fields( 'mybot-settings-group-dos' );
                                do_settings_sections( 'mybot-settings-group-dos' ); 
                            ?>
                            
                            <div class="col_1">

                                <div class="blockAdminKey">
                                    
                                    
                                    <center>
                                        <h3 class="titleColor">Key Bot</h3> 
                                    </center>
                                    
                                    <hr>
                                    <br>
 
                                    <div class="baseAdmin__alingCenter">
                                        
                                        <input class="inputKey" name="keyBot" id="keyBot" value="<?php echo get_option('keyBot'); ?>"/>
                                        <br/>
                                        <button class="inputAdminBtn inputAdminBtnKey" form="formMyBot2" type="submit">Registrar</button>
                                    
                                    </div>

                                </div>

                            </div>

                           
                            
                           
                        
                        </form>
                
                    </div>

                    <br>
                    <hr>
                    <br>
                   
 
                </div>
            
            </div>
        
        <?php
    };

    add_action('admin_menu','bot_plugin_menu');


    
    function mybot_settings()
    {
        register_setting('mybot-settings-group',
        'title');
             
        register_setting('mybot-settings-group',
        'colorSwitchBot');

        register_setting('mybot-settings-group',
        'colorCabecera');

        register_setting('mybot-settings-group',
        'colorTextoCabecera');

        register_setting('mybot-settings-group',
        'colorGloboTextoBot');

        register_setting('mybot-settings-group',
        'colorTextoBot');

        register_setting('mybot-settings-group',
        'colorGloboTextoUser');

        register_setting('mybot-settings-group',
        'colorTextoUser');

        register_setting('mybot-settings-group',
        'imgSwitch');

        register_setting('mybot-settings-group',
        'imgPerfil');

        register_setting('mybot-settings-group-dos',
        'keyBot');
    }

    add_action('admin_init','mybot_settings');


?>