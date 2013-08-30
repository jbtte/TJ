<?php

     // require common code
    require_once("Comon/common.php"); 
    
    $id = $_SESSION["id"];
	
?>
<!DOCTYPE html>
<html>
	<head>
    	<title>Processos TJ: Pesquisa</title><link href="css/pesquisar.css" rel="stylesheet" type="text/css">
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
	  <body>
    	<div id ='menu_bar'>
       		<div>        
	        	<ul class= "menu">
	            	<li class= "menu_list"><a class= "link" href="index.php">Home</a></li>
	            	<li class= "menu_list"><a class= "link" href="tj.php">Cadastrar</a></li>
		            <li class= "menu_list"><a class= "link" href="pesquisar.php">Pesquisar</a></li>
		            <li class= "menu_list"><a class= "link" href="estatistica.php">Estatistica</a></li>
		        </ul>
	    	</div>      
        </div>
        
    	<div class = "top" >
        	<table class = "tab_total">
            	<tbody>
            		<tr class = "tab_tr" >
                    	<td class = "tab_total_titulo">Total: </td>
	                    <td class = "tab_total_valor"><? print($_SESSION["TOTAL"]);  ?></td></tr>
	                    <tr class = "tab_tr" >
	                    <td class = "tab_total_titulo">REL: </td>
	                    <td class = "tab_total_valor"><? print($_SESSION["RELATOR"]);  ?></td></tr>
	                    <tr class = "tab_tr" >
	                    <td class = "tab_total_titulo">REV: 	</td>
	                    <td class = "tab_total_valor"><? print($_SESSION["REVISOR"]);  ?></td></tr>       
                	</tr>
            	</tbody>
        	</table> 
    	</div> 
		<div id='middle'>
		      <form action="pesquisar2.php" method="post" autocomplete="off">
		      	<table class = "form_pesquisar">
		       		<tr><td>Processo: </td><td> <input class = "processo" id = "num_processo" type="text" placeholder="processo" name="processo" autofocus=""></td></tr>
		            <tr><td>Tipo: </td><td><input class = "processo" type="text" placeholder="tipo" name="tipo" autofocus=""></td></tr>
			        <tr><td >Reu:</td><td><input class = "processo" id = "nome_reu" type="text" placeholder="reu" name="reu" autofocus=""></td></tr>
			        <tr ><td>Data:</td><td ><input class = "data_1" type="date" placeholder="Data inicio" name="data0" autofocus=""></td>
			            <td ><input class = "data_1" type="date" placeholder="Data final" name="dataf" autofocus=""></td></tr>
		          
		            <tr><td id='botao-conferir' colspan="2"><input id='botao-conferir' type="submit" value="Buscar"></td></tr>
		        </table>
		      </form>
	    </div>	
	</body>	
</html>