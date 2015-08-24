<?php 

  /* Conexão */ 
  $server = 'localhost';
  $user = 'thene538_dev';
  $pass = 'Zim9V8s29u';
  $bd = 'thene538_dev';
  $tables = array(
    'mail' => array('`email`', '`tnfp_mailing`',    'msg' => array('sucesso' => 'E-mail cadastrado com sucesso!', 'erro' => 'E-mail já cadastrado!')),
    'link' => array('`link`', '`tnfp_usergallery`', 'msg' => array('sucesso' => 'Link cadastrado com sucesso!', 'erro' => 'Link já cadastrado!'))
  ); 
  $type = null;

  $mysqli = new mysqli($server, $user, $pass, $bd);

  /* check connection */
  if ($mysqli->connect_error) {
    //die('Connect Error (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
	  echo json_encode(array('msg' => 'Erro inesperado!'));
  }  

  /* Converte POST para variável e tipo */
  if (isset($_POST['mail']) && !empty($_POST['mail'])){
    $data = $_POST['mail']; 
    $type = 'mail';   
  } elseif (isset($_POST['link']) && !empty($_POST['link'])){
    $data = $_POST['link'];
    $type = 'link';
  } else echo json_encode(array('msg' => 'Digite um e-mail ou link válido!'));
  
  //echo $type . '  ' . $data;
  /* Segurança de dados */
  $data  = $mysqli->real_escape_string($data);

  /* Validação Server Side */
	
  include('validation.php');

  
  if (!validation($data)) {
	//echo $data . ' false';
    echo json_encode(array('msg' => 'Por favor digite um e-mail ou um link válido.'));
  } else  {
	  //  echo $data . ' true';
    /* Input Banco de dados */
    function typeSwitch($type) {

      global $tables, $data, $mysqli;

      if ($type == 'mail')    {
        $query = $mysqli->query("INSERT INTO " . $tables[$type][1] . " (`id`, `email`, `enviar`) VALUES (NULL, '{$data}', '1')");
        return true;
      }
      elseif ($type == 'link') {
		  $query = $mysqli->query("INSERT INTO " . $tables[$type][1] . " (`id`, `link`) VALUES (NULL, '{$data}')");
		  if ($mysqli->affected_rows >= 1) {            
			  return true;
		  } else return false;//$mysqli->error;
      }
      else return false;
    }
    
    

    /* Teste Cadastro Banco de dados */
    if ( $mysqli->query("SELECT " . $tables[$type][0] . " FROM " . $tables[$type][1] . " WHERE " . $tables[$type][0] . " = ('" . $data . "')") ) { 
       //echo $type . '  ' . $data;

      if ( $mysqli->affected_rows >= 1 ) {
        /* Erro */
        
        echo json_encode($tables[$type]['msg']['erro']);
        
      } else {
        /* Input de dados */
        
        if ( typeSwitch($type) ){
          echo json_encode($tables[$type]['msg']['sucesso']);
          /* Sucesso */

        } else {
			echo json_encode($tables[$type]['msg']['erro']);
		} /* end: Input de dados */

      }/* end: Teste Cadastro */
    } else { 
      /* end: Query Error */
      //echo $mysqli->error;
		
    }

    $mysqli->close();
  }
?>  
