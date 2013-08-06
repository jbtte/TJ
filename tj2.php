<?

    // require common code
    require_once("Comon/common.php"); 
	
    
    // check if user placed all parameters
    if ($_POST["processo"] == null || $_POST["tipo"] == null || $_POST["reu"] == null|| $_POST["crime"] == null)
    {
        apologize("Por favor, preencher todos os campos");    
    
    };
    
    //putting information to upper case
    $reu = strtoupper($_POST["reu"]);
    $crime = strtoupper($_POST["crime"]);
    $tipo = strtoupper($_POST["tipo"]);
    $relator = strtoupper($_POST["relator"]);
    $processo = ($_POST["processo"]);
    
    
    //get date
    $today = date("Y-m-d");
    
    //if enough money add to user porfolio
    $query = "INSERT INTO `processos` (`processo`, `tipo`, `relator`, `reu`, `crime`, `Data`) VALUES ('$processo', '$tipo', '$relator', '$reu', '$crime', '$today')";
    //echo($query);
    $result = mysql_query($query);
    
       
    //redirect back to main menu
    //redirect("tj.php"); 
     
 ?>
 
 <!DOCTYPE html>
     <html>
     
        <head>
            <link href="css/stylesheet.css" rel="stylesheet" type="text/css">
            <title>JP: Processos</title>
        </head>
        
        
        <body>
        
            <div id ='header'>
                <a href="index.php"> <img src="http://www2.tjdft.jus.br/img/cabecaBrasaoPgResp.jpg" alt="TJDFT"> </a>         
            </div>
        
            <div id='middle_cad'>
                
                <p>Cadastro realizado com sucesso!</p>
            
                  
                <table >
                    <tbody>
                    	
                        <tr>
                        	
                           <FORM id='botao-menu' METHOD="LINK" ACTION="index.php"> <INPUT TYPE="submit" VALUE="Menu"></FORM>
                           <FORM id='botao-novo' METHOD="LINK" ACTION="tj.php"> <INPUT TYPE="submit" VALUE="Novo Cadastro"></FORM> 	   
                            
                            
                        </tr>
                    </tbody>
                </table>


                
            </div>
        
        </body>
     
     
     
     </html>
