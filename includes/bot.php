<?php 



function botHtml() 
{
  
  $title = get_option('title');
  $colorSwitchBot = get_option('colorSwitchBot');
  $colorCabecera = get_option('colorCabecera');
  $colorGloboTextoBot = get_option('colorGloboTextoBot');
  $colorTextoBot = get_option('colorTextoBot');
  $colorGloboTextoUser = get_option('colorGloboTextoUser');
  $colorTextoUser = get_option('colorTextoUser');
  $colorTextoCabecera = get_option('colorTextoCabecera');
  $imgPerfil = get_option('imgPerfil');
  $imgSwitch = get_option('imgSwitch');
  $key = get_option('keyBot');

  
  $colorDefaultAzul = "#102647";
  $colorDefaultBlanco = "#FFFFFF";
  $colorDefaultNegro = "#000000";
  


  if( !$title )
  {
    $title = "My Bot";
  };


  if( !$colorSwitchBot )
  {
    $colorSwitchBot = $colorDefaultAzul;
  };


  if( !$colorCabecera )
  {
    $colorCabecera = $colorDefaultAzul;
  };


  if( !$colorGloboTextoBot )
  {
    $colorGloboTextoBot = $colorDefaultAzul;
  };


  if( !$colorTextoBot )
  {
    $colorTextoBot = $colorDefaultBlanco;
  };


  if( !$colorGloboTextoUser )
  {
    $colorGloboTextoUser = $colorDefaultBlanco;
  }


  if( !$colorTextoUser )
  {
    $colorTextoUser = $colorDefaultNegro;
  }


  if( !$colorTextoCabecera )
  {
    $colorTextoCabecera = $colorDefaultBlanco;
  }

  if( !$imgPerfil )
  {
    $imgPerfil = "https://diagnosemlpdf.s3.us-east-2.amazonaws.com/chatBot/botDemo.png";
  }

  if( !$imgSwitch )
  {
    $imgSwitch = "https://diagnosemlpdf.s3.us-east-2.amazonaws.com/chatBot/chatSwitch.png";
  }


  ?>

  <style>
  
  .colorGloboTextoBot
  {
    background-color : <?php echo $colorGloboTextoBot?>
  }


  .colorTextoBot
  {
    color : <?php echo $colorTextoBot?> !important
  }


  .colorGloboTextoUser
  {
    background-color : <?php echo $colorGloboTextoUser?>
  }


  .colorTextoUser
  {
    color : <?php echo $colorTextoUser?> !important
  }


  .coloresCabecera
  {
    background-color: <?php echo $colorCabecera?>;
    color : <?php echo $colorTextoCabecera?>;
  }


  
  </style>

  <div id="botSwitch" class="botSwitch base__alingCenter" style="background-color: <?php echo $colorSwitchBot?>;">
  
    <img src=<?php echo $imgSwitch?> />
  
  </div>
  

  <div class="closeSpace"  id="closeSpace"></div>
  

  <div id="botPanel" class="botPanel" hidden>
    
    <p id="sk" style="display: none;">Afr234edfgT4324Ethsd∈<?php echo $key?></p>
    
    <div id="headerBot" class="headerBot coloresCabecera">
      
    
      <div class="perfilBot base__alingCenter">
        
        <img src=<?php echo $imgPerfil?> />
        
      </div>
      
      <div class="online"></div>
      
      <div class="nameBot"><?php echo $title?></div>
    
    </div>
    

    <div id="bodyBot" class="bodyBot">
      
      <div class="rowBot base__alingLeft">
          
        <div class="chatTagBot colorGloboTextoBot colorTextoBot">
          
          <p>¡Hola!, ¿en qué te puedo ayudar?</p>

        </div>

      </div>

    </div>
    
    
    <div id="footerBot" class="footerBot">
      
      <div class="inputBox">
    
        <div className="input-group">                                
          
          <input id="inputBot" class="inputBot" type="text" />
          
          <div className="input-group-append">
            
            <span id="btnBot" class="btnBot base__pointer noClick">
              
              <img src="https://diagnosemlpdf.s3.us-east-2.amazonaws.com/chatBot/send.png" />
            
            </span>

          </div>
          
        </div>
      
      </div>
      
      
      <div class="signatureBox base__alingCenter">
         
         <center><p><small><a href="https://mybot.myfuture.ai/" target="_blank">Powered by My Bot</a></small></p></center>
      
      </div>
    
    </div>
    
  </div>
  
  <?php
  
  //HTML;


};

add_action('wp_body_open', 'botHtml');


?>