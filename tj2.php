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
	    <link href="css/tj.css" rel="stylesheet" type="text/css" media="screen and (max-height: 800px)">
	    <link href="css/tj-job.css" rel="stylesheet" media="screen and (min-height: 800px)">
	    <link href="http://fonts.googleapis.com/css?family=Just Me Again Down Here" rel="stylesheet" type="text/css">
	    <link href="http://fonts.googleapis.com/css?family=Mouse Memoirs" rel="stylesheet" type="text/css">
	    <link href="http://fonts.googleapis.com/css?family=The Girl Next Door" rel="stylesheet" type="text/css">
	    <link href="http://fonts.googleapis.com/css?family=Happy Monkey" rel="stylesheet" type="text/css">  
  	</head>
    
  	<? top_site() ?>
    
   	 	<div class = "middle">
            <div class = "form_processo_tj2">
               <p>Cadastro realizado com sucesso!</p>
            </div>
   </body>
</html>
