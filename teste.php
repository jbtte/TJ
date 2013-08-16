<?php

	 // require common code
    require_once("Comon/common.php");
	
	// calling function to fetch information from process
	$num_processo = "12-21073";
	
	// include library simple HTML DOM
	include('simple_html_dom.php');
	
	//enconding in UTF-8 so carachters with accent are shown correctly
	header('Content-Type: text/html; charset=utf-8');
	
    //Establishing the correct url to be called
    $url = call_url($num_processo); 
   
    // Create DOM from URL or file
	$html = file_get_html($url);
	
	//quando ha mais de um processo com o mesmo numero
	//classe do primeiro processo
	$dados[5] = $html->find('#classeProcessual_1_1_1', 0)->value;
	//numero do primeiro processo
	$dados[6] = $html->find('#processo_1_1_1', 0)->value;
	//classe do segundo processo
	$dados[7] = $html->find('#classeProcessual_1_1_2', 0)->value;
	//numero do segundo processo
	$dados[8] = $html->find('#processo_1_1_2', 0)->value;
	
	echo $url;
	//echo $html;
	echo $dados[5];
	echo $dados[6];
	echo $dados[7];
	echo $dados[8];
	

?>

<!DOCTYPE html>
	