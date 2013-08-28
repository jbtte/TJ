<?php
     // require common code
    require_once("Comon/common.php");
	
	// include library simple HTML DOM
	include('simple_html_dom.php');
	
	//enconding in UTF-8 so carachters with accent are shown correctly
	header('Content-Type: text/html; charset=utf-8');
	
	// calling function to fetch information from process
	$num_processo = $_GET["id"];
		
    //Establishing the correct url to be called
    $url = call_url($num_processo); 
   
    // Create DOM from URL or file
	$html = file_get_html($url);
	
	//quando ha mais de um processo com o mesmo numero
	//classe do segundo processo
	$dados[7] = $html->find('#classeProcessual_1_1_2', 0)->value;
	
	if ($dados[7]!=NULL){
		
		//classe do primeiro processo
		$dados[5] = $html->find('#classeProcessual_1_1_1', 0)->value;
		//numero do primeiro processo
		$dados[6] = $html->find('#processo_1_1_1', 0)->value;
		//numero do segundo processo
		$dados[8] = $html->find('#processo_1_1_2', 0)->value;
		
	}
	
	else{
		
		//Nome do reu do primeiro processo
		$dados[5] = $html->find('#autor_1_1_1', 0)->value;
		//numero do primeiro processo
		$dados[6] = $html->find('#processo_1_1_1', 0)->value;
		//Nome da reu do segundo processo
		$dados[7] = $html->find('#autor_1_2_1', 0)->value;
		//numero do segundo processo
		$dados[8] = $html->find('#processo_1_2_1', 0)->value;
		
	}
	

?>
<!DOCTYPE html>
<html>
	<head>
	  	<title>JP: Processos</title>
	    <link href="css/tj.css" rel="stylesheet" type="text/css">
	    <link href="http://fonts.googleapis.com/css?family=Just Me Again Down Here" rel="stylesheet" type="text/css">
	    <link href="http://fonts.googleapis.com/css?family=Mouse Memoirs" rel="stylesheet" type="text/css">
	    <link href="http://fonts.googleapis.com/css?family=The Girl Next Door" rel="stylesheet" type="text/css">
	    <link href="http://fonts.googleapis.com/css?family=Happy Monkey" rel="stylesheet" type="text/css">  
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
	                    <td class = "tab_total_titulo">RSE: </td>
	                    <td class = "tab_total_valor"><? print($_SESSION["RSE"]);  ?></td></tr>
	                    <tr class = "tab_tr" >
	                    <td class = "tab_total_titulo">APR: 	</td>
	                    <td class = "tab_total_valor"><? print($_SESSION["APR"]);  ?></td></tr>       
                	</tr>
            	</tbody>
        	</table> 
    	</div>       
		<div id='middle' class = "table_tj4">
	    	<form action="tj3.php" method="post">
	        	<table class = "table_tj4">
	        		<tr><td><input type="radio" name="processo" value="<?echo $dados[6]?>">  <?echo($dados[5])?></td></tr>
	            	<tr><td><input type="radio" name="processo" value="<?echo $dados[8]?>">  <?echo($dados[7])?></td></tr>
	           		
	           		<tr><td colspan="2"><input id='botao-conferir' type="submit" value="Buscar"></td></tr>
	           		
	        	</table>
			</form>
	    </div>
	  </body>
	</html>        
