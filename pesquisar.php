<?php

     // require common code
    require_once("Comon/common.php"); 
    
    $id = $_SESSION["id"];
	
?>
<!DOCTYPE html>
<html>
	<head>
    	<title>Processos TJ: Pesquisa</title>
    	<link href="css/pesquisar.css" rel="stylesheet" type="text/css" media="screen and (max-height: 800px)">
	    <link href="css/pesquisar-job.css" rel="stylesheet" media="screen and (min-height: 800px)">
	    <link href="http://fonts.googleapis.com/css?family=Just Me Again Down Here" rel="stylesheet" type="text/css">
	    <link href="http://fonts.googleapis.com/css?family=Mouse Memoirs" rel="stylesheet" type="text/css">
	    <link href="http://fonts.googleapis.com/css?family=The Girl Next Door" rel="stylesheet" type="text/css">
	    <link href="http://fonts.googleapis.com/css?family=Happy Monkey" rel="stylesheet" type="text/css">
	    <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
	    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
		<script src="http://code.jquery.com/ui/1.10.1/jquery-ui.min.js"></script>
		<link rel="stylesheet" href="/resources/demos/style.css" />
		<script>
			  $(function() {
			    
			    $("#nome_reu").autocomplete({
			      source: 'autocompleteReu.php',
			      minLength: 1
			    });
			  });
			  
			  $(function() {
			    
			    $("#num_processo").autocomplete({
			      source: 'autocompleteProcesso.php',
			      minLength: 1
			    });
			  });
		</script>
	  </head>
	  
	  <? top_site() ?>
	  
		<div id='middle'>
		      <form action="pesquisar2.php" method="post" autocomplete="off">
		      	<table class = "form_pesquisar">
		       		<tr><td>Processo: </td><td> <input class = "processo" id = "num_processo" type="text" placeholder="processo" name="processo" autofocus="" method="POST"></td></tr>
		            <tr><td>Tipo: </td><td><input class = "processo" type="text" placeholder="tipo" name="tipo" autofocus=""></td></tr>
			        <tr><td >Reu:</td><td><input class = "processo" id = "nome_reu" type="text" placeholder="reu" name="reu" autofocus="" method="POST"></td></tr>
			        <tr ><td>Data:</td><td ><input class = "data_1" type="date" placeholder="Data inicio" name="data0" autofocus=""></td>
			            <td ><input class = "data_1" type="date" placeholder="Data final" name="dataf" autofocus=""></td></tr>
		          
		            <tr><td id='botao-conferir' colspan="2"><input id='botao-conferir' type="submit" value="Buscar"></td></tr>
		        </table>
		      </form>
	    </div>	
	</body>	
</html>