<?php

	// require common code
    require_once("Comon/common.php"); 
	
	
	// include library simple HTML DOM
	include('simple_html_dom.php');
	
	//enconding in UTF-8 so carachters with accent are shown correctly
	header('Content-Type: text/html; charset=utf-8');
	
    // Create DOM from URL or file
	//$num_processo = "12-0058784";
	$num_processo = "12-21073";
	$url = 'http://tjdf19.tjdft.jus.br/cgi-bin/tjcgi1?SELECAO=1&COMMAND=ok&CHAVE='.$num_processo.'&TitCabec=2%AA+Inst%E2ncia+%3E+Consulta+Processual&NXTPGM=plhtml02&ORIGEM=INTER';
	$html = file_get_html($url);
	
	//instantiate a stock object
	//$dados = array();

	# get the desiered elements  
	$dados1 = $html->find('table', 0)->find('td', 5);
	$dados2 = $html->find('#processo_1_1_1', 0)->value; 
	$dados6 = $html->find('#classeProcessual_1_1_1', 0)->value;
	
	
	
	
	print $dados1;
	print $dados6;
	
	
	//$dados = lookup($num_processo);
	
	
	
	/*
	//Imprimindo os resultados
	echo ("Nome do reu: " . $dados[0]); 
	echo ("<br>");
	echo ("Numero do processo: " . $dados[1]);
	echo ("<br>");
	echo ("Crime: " . $dados[2]);
	echo ("<br>");
	echo ("Classe: " . $dados[3]);
	echo ("<br>");
	echo ("Relator: " . $dados[4]);
	
	  */
		   
	
	
	
?>
