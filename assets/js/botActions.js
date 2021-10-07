
jQuery( document ).ready( function($)
{
    ip();
    
    jQuery( "#botSwitch" ).click( () => 
    {
        jQuery( "#botSwitch" ).hide();
        jQuery( "#botPanel" ).show();
        jQuery( "#closeSpace" ).show();
    })


    jQuery( "#headerBot" ).click( () => 
    {

        jQuery( "#botSwitch" ).show();
        jQuery( "#botPanel" ).hide();
        jQuery( "#closeSpace" ).hide();

    })


    jQuery( "#closeSpace" ).click( () => 
    {
        jQuery( "#botSwitch" ).show();
        jQuery( "#botPanel" ).hide();
        jQuery( "#closeSpace" ).hide();
    })


    jQuery( "#btnBot" ).click( () => 
    {
        const msg = "human@"+jQuery( "#inputBot" ).val();
        jQuery( "#inputBot" ).prop( "disabled", true );

        msgChat( msg );
        
    })

});


const msgChat = ( msg ) =>
{
    
    if( msg === "human@" || msg === "bot@" )
    {
        jQuery( "#inputBot" ).prop( "disabled", false );
        return;
    };


    const divRowBot = document.createElement( "div" );
    divRowBot.classList.add( "rowBot" )


    if( msg.includes( "human" ) )
    {
        divRowBot.classList.add( "base__alingRight" );
    }
    else
    {
        divRowBot.classList.add( "base__alingLeft" );
    };
    

    const divChatTagBot = document.createElement( "div" );
    divChatTagBot.classList.add( "chatTagBot" );


    if( msg.includes( "human" ) )
    {
        divChatTagBot.classList.add( "chatTagBotHuman" );
        divChatTagBot.classList.add( "colorGloboTextoUser" );
        divChatTagBot.classList.add( "colorTextoUser" );
        
    };

    if( msg.includes( "bot" ) )
    {
        divChatTagBot.classList.add( "colorGloboTextoBot" );  
        divChatTagBot.classList.add( "colorTextoBot" ); 

    };




    const pMsg = document.createElement( "p" );
    pMsg.innerText = msg.includes( "human" ) ? msg.substr( 6 ) : msg.substr( 4 );


    divRowBot.append( divChatTagBot );
    divChatTagBot.append( pMsg );


    const divBodyBot = document.getElementById( "bodyBot" );
    divBodyBot.append( divRowBot );


    const inputChat = document.getElementById( "inputBot" );
    inputChat.value = "";


    const divLoad = document.createElement( "div" );
    divLoad.setAttribute( "id", "divLoad" );
    divLoad.classList.add( "chatLoadGif" );
    const imgLoad = document.createElement( "img" );
    imgLoad.src = "https://diagnosemlpdf.s3.us-east-2.amazonaws.com/chatBot/load.gif";
    divLoad.append( imgLoad );


    scrollDown( divBodyBot );


    if( msg.includes( "human" ) )
    {
        startAddBotMsg( msg );
        divBodyBot.append( divLoad );
        scrollDown( divBodyBot );
    };


    const divLoadSelec = document.getElementById( "divLoad" );
    if( divLoadSelec )
    {
       if( msg.includes( "bot" ) )
        {
            divLoadSelec.remove();
        }; 
    };
    
    
};


const getcookies = () =>
{
    const Cookies = document.cookie.split(";");
  
    let objCookie = {};

    Cookies.map( ( cookie ) => 
    {
        return objCookie = { ...objCookie, [cookie.substr( 0,cookie.indexOf("=")).replace( /[" "]/g,"" )] : cookie.substr( cookie.indexOf("=")+1 ) };
    });

    return objCookie;
};


const startAddBotMsg = ( msg ) =>
{
   
    const key = jQuery( "#sk" ).text();
    const index = key.indexOf( "∈" );
    const apiKey = key.substr( index + 1 );
    
    console.log( apiKey );

    let cookie = getcookies()._gid;

    if( !cookie )
    {
        cookie = "000001";
    };

    console.log( cookie+" -- "+msg );

    //https://recruitbot.myfuture.ai/webhooks/rest/webhook
    
    return fetch('https://bot.myfuture.ai/webhooks/rest/webhook', 
    {
        method: 'POST',
        headers: { "Content-type" : "application/json" },
        body: JSON.stringify
        ({
            sender: cookie,
            message: msg
        }),
     
    })
    .then( ( response ) => 
    { 
        
        response.json().then( ( result ) => 
        {
          
            console.log( result );
            
            let msgBot;
            if( result[0].text )
            {
                msgBot = "bot@"+result[0].text;
            }
            else if( result[0].custom.text )
            {
                msgBot = "bot@"+result[0].custom.text
            }
            else
            {
                msgBot = "bot@Bot no disponible"
            };

            setTimeout(() => 
            {
                msgChat( msgBot );
                jQuery( "#inputBot" ).prop( "disabled", false ); 
            
            }, 1000);
           

        })
        .catch( ( error ) => 
        {
            console.log( error );
            setTimeout(() => 
            {
                msgChat( "bot@Bot no disponible" );
                jQuery( "#inputBot" ).prop( "disabled", false );
            
            }, 1000);
        }); 
    })
    .catch( ( error ) => 
    {
        console.log( error );
        setTimeout(() => 
        {
            msgChat( "bot@Bot no disponible" );
            jQuery( "#inputBot" ).prop( "disabled", false );
        
        }, 1000);
    });

};


const scrollDown = ( div ) =>
{
   
    if( div )
    { 

        div.scrollTop = div.scrollHeight - div.clientHeight;

    };
         
}


const ip = async () =>
{
   const url = "https://ipapi.co/json";
   const response = await fetch( url );
   
   response.json()
   .then( ( result ) => 
   {
        console.log( result )
   });

};


const chatEnter = ( event ) =>
{
    
    if( event.keyCode === 13 )
    {
        const btnBot = document.getElementById( "btnBot" );

        if( btnBot )
        {
            btnBot.click();
        };
    };
    
};

window.onkeydown = chatEnter;








