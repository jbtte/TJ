<?php
     // require common code
    require_once("Comon/common.php");
	
	// calling function to fetch information from process
	$num_processo = $_GET['id'];
	
	$dados = lookup($num_processo);
	
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
	<div id='middle'>
    	<form action="tj3.php" method="post">
        	<table>
        		<tr>
            		<td><input input type="radio" name="processo" value="<?echo $dados[6]?>"><?echo $dados[5]?></td>
            	</tr>
            	<tr>
            		<td><input input type="radio" name="processo" value="<?echo $dados[8]?>"><?echo $dados[7]?></td>
          		</tr>
           		<tr>
             		<td id='botao-gravar' colspan="2"><input type="submit" value="Pesquisar"></td>
          		</tr> 
        	</table>
		</form>
    </div>
  </body>
</html>        
