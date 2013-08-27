<?

    // require common code
    require_once("Comon/common.php"); 
	
    
    // check if user placed all parameters
    if ($_POST["processo"] == null || $_POST["tipo"] == null || $_POST["reu"] == null|| $_POST["crime"] == null)
    {
        apologize("Por favor, preencher todos os campos");    
    
    };
    
    //retirar acento e cedilha
	$reu = utf8_decode($_POST["reu"]);
	$crime = utf8_decode($_POST["crime"]);
    
    //putting information to upper case
    $reu = strtoupper($reu);
    $crime = strtoupper($crime);
    $tipo = strtoupper($_POST["tipo"]);
    $relator = strtoupper($_POST["relator"]);
    $processo = ($_POST["processo"]);
	
	
    //get date
    $today = date("Y-m-d");
    
    //if enough money add to user porfolio
    $query = "INSERT INTO `processos` (`processo`, `tipo`, `relator`, `reu`, `crime`, `Data`) VALUES ('$processo', '$tipo', '$relator', '$reu', '$crime', '$today')";
    //echo($query);
    $result = mysql_query($query);
    
     
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
    
   	 	<div class = "middle">
            <div class = "form_processo_tj2">
               <p>Cadastro realizado com sucesso!</p>
            </div>
   </body>
</html>
