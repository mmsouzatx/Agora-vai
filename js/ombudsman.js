/* Limpeza dos campos */

var text;

/* Client Side Validation */
function whatIsThis( text ) {

  /* Credits: http://emailregex.com/ */
  var mail = new RegExp(/^[-a-z0-9~!$%^&*_=+}{\'?]+(\.[-a-z0-9~!$%^&*_=+}{\'?]+)*@([a-z0-9_][-a-z0-9_]*(\.[-a-z0-9_]+)*\.(aero|arpa|biz|com|coop|edu|gov|info|int|mil|museum|name|net|org|pro|travel|mobi|[a-z][a-z])|([0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}))(:[0-9]{1,5})?$/i);
  /* Credits: https://mathiasbynens.be/demo/url-regex */
  var link = new RegExp(/^(?:(?:https?|ftp):\/\/)?(?:\S+(?::\S*)?@)?(?:(?!(?:10|127)(?:\.\d{1,3}){3})(?!(?:169\.254|192\.168)(?:\.\d{1,3}){2})(?!172\.(?:1[6-9]|2\d|3[0-1])(?:\.\d{1,3}){2})(?:[1-9]\d?|1\d\d|2[01]\d|22[0-3])(?:\.(?:1?\d{1,2}|2[0-4]\d|25[0-5])){2}(?:\.(?:[1-9]\d?|1\d\d|2[0-4]\d|25[0-4]))|(?:(?:[a-z\u00a1-\uffff0-9]-*)*[a-z\u00a1-\uffff0-9]+)(?:\.(?:[a-z\u00a1-\uffff0-9]-*)*[a-z\u00a1-\uffff0-9]+)*(?:\.(?:[a-z\u00a1-\uffff]{2,}))\.?)(?::\d{2,5})?(?:[/?#]\S*)?$/i);
  var message = new RegExp(/\s/);

  if      ( mail.test( text ) ) { return 'mail'; } 
  else if ( link.test( text ) ) { return 'link'; }
  else if ( message.test( text ) ) { return 'message'; }
  else {  return false;  }
}

/* Bind Click on Arrow */
$( '#ombudsman_send' ).bind( 'click', ( function( event ) {

  text = $( "#ombudsman_text" ).val(); // Grab de input value */
  var msg = {
    'error' : 'Digite um e-mail ou link!'
  }

  /* Determinando o campo */
  switch( whatIsThis( text ) ) {
    case 'mail':
      data = { mail: text }; 
      break;
    case 'link':
      data = { link: text };
      break;
    case 'message':
      data = { message: text };
  default:
      text = null;
  }

  if ( !data.message ) {}
    //on modal


  /* Ajax Call */
    if ( data.mail || data.link ) {
      $.ajax({
        method: 'post',
           url: '/wp-content/themes/tnfp-backup/ombudsman.php',
      dataType: 'json',
          data:  data
      })

      /* Resultado */
      .done( function( res ) {


        $( '#resposta' ).modal( 'toggle' ); /* Abre a modal */

        $('#respostaTitulo').replaceWith('<h2 id="respostaTitulo">'+res+'</h2>');

        //console.log(res);

      });      
    }
    /* Erro */
    else {
      //console.log(msg);
      $('#respostaTitulo').replaceWith('<h2 id="respostaTitulo">'+msg.error+'</h2>');
      $( '#resposta' ).modal( 'toggle' ); /* Abre a modal */
    }

}));

/* Bind Enter and Space Key */
$( '#ombudsman_text' ).keypress( function( event ) {
//    if ( event.which == 32 ) { //Espaço
//      $( '#exampleModal' ).modal( 'toggle' ); /* Abre a modal */
//      $( '#message-text' ).val( text ); /* Copia o Texto Original */
//    }
     if ( event.which == 13 ) { //Enter
      $( '#ombudsman_send' ).trigger( 'click' );
    }

});