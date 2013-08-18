<?php

     // require common code
    require_once("Comon/common.php"); 
    
    $id = $_SESSION["id"];
	$_SESSION["data0"] = NULL;
	$_SESSION["dataf"] = NULL;
	$_SESSION["tipo"] = NULL;
	
	
	
	
?>
<!DOCTYPE html>

<html>

  <head>
    <link href="css/stylesheet.css" rel="stylesheet" type="text/css">
    <title>Processos TJ: Pesquisa</title>
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
	  <script src="http://code.jquery.com/ui/1.10.1/jquery-ui.min.js"></script>
	  <link rel="stylesheet" href="/resources/demos/style.css" />
	  <script>
	  $(function() {
	    
	    $("#nome_reu").autocomplete({
	      source: 'autocomplete.php',
	      minLength: 1
	    });
	  });
	  </script>
  </head>
  
  
  <body>
  
    <div id ='header'>
        <a href="index.php"> <img src="http://www2.tjdft.jus.br/img/cabecaBrasaoPgResp.jpg" alt="TJDFT"> </a>        
    </div>


	<div id='middle'>
	      <form action="pesquisar2.php" method="post" autocomplete="off">
	        <table>
	          <tr>
	            <td>Processo: </td><td> <input input type="text" placeholder="processo" name="processo" autofocus=""></td>
	          </tr>
	          
	          <tr>
	            <td>Tipo: </td><td><input input type="text" placeholder="tipo" name="tipo" autofocus=""></td>
	          </tr>
	          <tr >
	            <td >Reu:</td><td><input id = "nome_reu" type="text" placeholder="reu" name="reu" autofocus=""></td>
	          </tr>
	        
	          <tr>
	            <td>Data:</td><td><input input type="date" placeholder="Data inicio" name="data0" autofocus=""></td>
	           
	            <td><input input type="date" placeholder="Data final" name="dataf" autofocus=""></td>
	          </tr>
	          
	          
	          
	          
	          <tr>
	            <td></td>
	            
	            <td id='botao-gravar' colspan="2"><input type="submit" value="Pesquisar"></td>
	          </tr>
	        </table>
	      </form>
	    </div>
	
	  
	
	  </body>
	
</html>