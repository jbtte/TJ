<?php

	// example of how to use advanced selector features
	include('simple_html_dom.php');
    // Create DOM from URL or file
	$html = file_get_html('http://tjdf19.tjdft.jus.br/cgi-bin/tjcgi1?NXTPGM=tjhtml105&ORIGEM=INTER&SELECAO=1&CIRCUN=1&CDNUPROC=20130110285074');
	
	# get an element representing the second paragraph  
	$reu = $html->find('#i_nomeReu', 0);
	$processo = $html->find('#i_numeroProcesso14', 0);
	$assunto = $html->find('#i_assuntoProcessual', 0); 
	
	
	
	//$html = file_get_html('http://tjdf19.tjdft.jus.br/cgi-bin/tjcgi1?NXTPGM=plhtml02&COMMAND=ok&TitCabec=2%AA+Inst%E2ncia+%3E+Consulta+Processual&SELECAO=1&ORIGEM=INTER&CHAVE=2013.01.1.028507-4')
	
	//$tipo = $html->find('#i_classeProcessual', 0);
	
	//if ($tipo == "Apelação Criminal"){
		//$tipo == "APR";
	//}
	
	//$html->clear(); 
	//unset($html);
	
	
	echo ("Nome do reu: " . $reu); 
	echo ("<br>");
	echo ("Numero do processo: " . $processo);
	echo ("<br>");
	echo ("Crime: " . $assunto);
	echo ("<br>");
	echo ("Classe: " . $tipo);
	
	$html->clear(); 
	unset($html);     
	
	
	
?>

<!DOCTYPE html>