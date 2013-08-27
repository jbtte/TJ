<?

    /***********************************************************************
     * helpers.php
     *
     * 
     *
     * Helper functions.
     **********************************************************************/


    /*
     * void
     * apologize($message)
     *
     * Apologizes to user by displaying a page with message.
     */

    function apologize($message)
    {
        // require template
        require_once("apology.php");

        // exit immediately since we're apologizing
        exit;
    }


    /*
     * void
     * dump($variable)
     *
     * Facilitates debugging by dumping contents of variable
     * to browser.
     */

    function dump($variable)
    {
        // dump variable with some quick and dirty HTML
        require("dump.php");

        // exit immediately so that we can see what we printed
        exit;
    }


    /*
     * void
     * logout()
     *
     * Logs out current user, if any.  Based on Example #1 at
     * http://us.php.net/manual/en/function.session-destroy.php.
     */

    function logout()
    {
        // unset any session variables
        $_SESSION = array();

        // expire cookie
        if (isset($_COOKIE[session_name()]))
        {
            if (preg_match("{^(/~[^/]+/pset7/)}", $_SERVER["REQUEST_URI"], $matches))
                setcookie(session_name(), "", time() - 42000, $matches[1]);
            else
                setcookie(session_name(), "", time() - 42000);
        }

        // destroy session
        session_destroy();
    }


    
    /*
     * void
     * redirect($destination)
     * 
     * Redirects user to destination, which can be
     * a URL or a relative path on the local host.
     *
     * Because this function outputs an HTTP header, it
     * must be called before caller outputs any HTML.
     */

    function redirect($destination)
    {
        // handle URL
        if (preg_match("/^http:\/\//", $destination))
            header("Location: " . $destination);

        // handle absolute path
        else if (preg_match("/^\//", $destination))
        {
            $protocol = (@$_SERVER["HTTPS"]) ? "https" : "http";
            $host = $_SERVER["HTTP_HOST"];
            header("Location: $protocol://$host$destination");
        }

        // handle relative path
        else
        {
            // adapted from http://www.php.net/header
            $protocol = (@$_SERVER["HTTPS"]) ? "https" : "http";
            $host = $_SERVER["HTTP_HOST"];
            $path = rtrim(dirname($_SERVER["PHP_SELF"]), "/\\");
            header("Location: $protocol://$host$path/$destination");
        }

        // exit immediately since we're redirecting anyway
        exit;
    }
	
	
	//criando uma mascara para formatar o numero do processo
	
	function mascara_string($mascara,$string)
	{
	   //$string = str_replace(" ","",$string);
	   for($i=0;$i<(strlen($string)-3);$i++)
	   {
	      $mascara[strpos($mascara,"#")] = $string[$i];
	   }
	   return $mascara;
	}
	




	/*
     * 
     * lookup($num_processo)
     *
     * Returns the case info  
	 * 
	 */
  

function lookup($num_processo)
	{
		
		// include library simple HTML DOM
		include('simple_html_dom.php');
		
		//enconding in UTF-8 so carachters with accent are shown correctly
		header('Content-Type: text/html; charset=utf-8');
		
	    //Establishing the correct url to be called
	    $url = call_url($num_processo); 
	   
	    // Create DOM from URL or file
		$html = file_get_html($url);
		
		//creating array with desired info
		$dados = call_dados($html, $num_processo);
	
		// exiting Simple HTML DOM PHP
		$html->clear(); 
		unset($html);
		
		// return dados
        return $dados;
		
		
	}
	
/*
 * Inputs the correct URL to the function lookup
 * 
 * 
 */	
 
 
function call_url($num_processo){
				
			
		if (strlen($num_process) > 9){
	    	$url = "http://tjdf19.tjdft.jus.br/cgi-bin/tjcgi1?NXTPGM=plhtml06&ORIGEM=INTER&CDNUPROC='.$num_processo'";
			
	    }
		
		else{
			$url = 'http://tjdf19.tjdft.jus.br/cgi-bin/tjcgi1?SELECAO=1&COMMAND=ok&CHAVE='.$num_processo.'&TitCabec=2%AA+Inst%E2ncia+%3E+Consulta+Processual&NXTPGM=plhtml02&ORIGEM=INTER';
		}
	
		return $url;
		
}
	
/*
 * Returns the information obtained at the website
 * 
 * 
 * 
 */
 
function call_dados($html, $num_processo){
	
	
	//instantiate a stock object
	$dados = array();

	# get the desiered elements  
	//Nome do reu
	$dados[0] = $html->find('#i_nomeReu',0)->value; 
	
	if ($dados[0] == NULL){
		
		// redirect to TJ4 to choose which case it is
        header("Location:tj4.php?id=".$num_processo);
		
	}
	
	//numero do processo
	$dados[1] = $html->find('#i_numeroProcesso14', 0)->value;
	//crime
	$dados[2] = $html->find('table', 0)->find('td', 5);
	$dados[2] = strip_tags($dados[2]); //retira o <p> e <td>
	//classe processual
	$dados[3] = $html->find('#i_classeProcessual', 0)->value;
	//nome do relator
	$dados[4] = $html->find('table', 0)->find('td', 18);
	$dados[4] = strip_tags($dados[4]); //retira o <p> e <td>
	
	
	
	//verifing if autor do recurso is MP
	if ($dados[0] == "MINISTÉRIO PÚBLICO DO DISTRITO FEDERAL E TERRITÓRIOS"){
		
		$dados[0] = $html->find('#i_nomeAutor',0)->value; 
		
	}
	
	//transformando classe em sigla
	$dados[3] = para_Sigla($dados[3]);
	
	// Colocando o numero do processo no formato correto
	$dados[1] = mascara_string('####.##.#.######-#',$dados[1]);
	
	//Verificar se e relator ou revisor
	$dados[4] = e_relator($dados[4]);
	
	return $dados;
	
}	

/*
 * Transformando o nome por extenso na sigla: APR, RSE e RAG
 * 
 * 
 */	
 
 function para_Sigla($dados){
		
	switch($dados){
		
		case "Apelação Criminal":
			$dados = "APR";
			break;
			
		case "Recurso em Sentido Estrito":
			$dados = "RSE";
			break;
			
		case "Recurso de Agravo":
			$dados = "RAG";
			break;
		
		default:
			$dados = $dados;
	}

	return $dados;

}
 
 
 /*
  * Verificando se o processo e de relator ou revisor
  */
		
function e_relator($dados){


	switch($dados){
		
		case "Desª. NILSONI DE FREITAS":
			$dados = "RELATOR";
			break;
		
		default:
			$dados = "REVISOR";
		
	}
	
	return $dados;
 	
}	

/*
 * Function calculates the number of entries of class $classe
 * in the current month
 * 
 * 
 */

function total($classe)
	{
	    
	    // Retriving current month and year
	    $month = date("m");
	    $pmonth = $month - 1;
	    $amonth = $month + 1;
	    $year = date("Y");
	    
	     
	    // Counting the total number of entries RSE current month and year
	    $query = mysql_query("SELECT `index` FROM `processos` WHERE  `data`> '$year-$pmonth-31' AND `Data` < '$year-$amonth-01' AND `tipo` = '$classe'");
	    $Total = array();
	    while($row = mysql_fetch_row($query)){
	        array_push($Total, $row["index"]);
	        
	    }
	   
		return count($Total);	 
	    
	}

/*
 * retira acento e cedilha
 */
 
function retira_acentos($texto){
	
 return strtr($texto, "áàãâéêíóôõúüçÁÀÃÂÉÊÍÓÔÕÚÜÇ", "aaaaeeiooouucAAAAEEIOOOUUC");
 
}



?>


 

