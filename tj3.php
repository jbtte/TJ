<?php
    
    // require common code
    require_once("Comon/common.php");
	
	// calling function to fetch information from process
	$num_processo = ($_POST["processo"]);
	$dados = lookup($num_processo);
	
	//get date
    $today = date("Y-m-d");
	
	
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
            
            
            <div>
            	
            	<form action="tj2.php" method="post">
        <table>
          <tr>
            <td>Processo: </td><td> <input type="text"  name="processo" value = <?php print($dados[1])?>></td>
          </tr>
    
          <tr>
            <td>Classe: </td><td><input type="text"  name="tipo" value = <?php print($dados[3])?>></td>
          </tr>
          <tr>
            <td>Reu:</td><td><input type="text"  name="reu" value = '<?php print ($dados[0])?>'></td>
          </tr>
          <tr>
            <td>Crime:</td><td><input type="text"  name="crime" value = '<?php print($dados[2])?>'></td>
          </tr>
          <tr>
            <td>Relator:</td><td><input type="text" name="relator"  value = <?php print($dados[4])?>>
          </tr>
          
          <tr>
            <td>Data:</td><td><input type="text" name="relator"  value = <?php print($today)?>>
          </tr>
          
          
            
            <td id='botao-gravar' colspan="2"><input type="submit" value="Gravar"></td>
          </tr> 
        </table>
      </form>
    </div>
            	
            	
            	
            </div>
            
            
       </body>

</html>

