<?php

	// require common code
    require_once("Comon/common.php"); 
	
	
	$num_processo = "12-0058784";
	
	$dados = lookup($num_processo);
	
	
	
	
	
	
	
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
	
	  
		   
	
	
	
?>
