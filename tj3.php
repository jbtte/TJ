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
	                    <td class = "tab_total_titulo">REL: </td>
	                    <td class = "tab_total_valor"><? print($_SESSION["RELATOR"]);  ?></td></tr>
	                    <tr class = "tab_tr" >
	                    <td class = "tab_total_titulo">REV: 	</td>
	                    <td class = "tab_total_valor"><? print($_SESSION["REVISOR"]);  ?></td></tr>       
                	</tr>
            	</tbody>
        	</table> 
    	</div>    
        <div class = "middle">
  	    	<form action="tj2.php" method="post" id = "form_tj3">
	    	    <table class = "form_processo_tj3">
	        		<tr><td>Processo: </td><td class = "campo"> <input class = "processo" type="text"  name="processo" value = <?php print($dados[1])?>></td>
	        			<td class = "campo"> <input class = "processo" type="text"  name="tipo" value = <?php print($dados[3])?>></td></tr>
	          		<tr><td>Reu:</td><td class = "campo"><input  class = "processo" type="text"  name="reu" value = '<?php print ($dados[0])?>'></td></tr>
	          		<tr><td>Crime:</td><td class = "campo"><input class = "processo" type="text"  name="crime" value = '<?php print($dados[2])?>'></td></tr>
	          		<tr><td>Gabinete:</td><td class = "campo"><input class = "processo" type="text" name="relator"  value = <?php print($dados[4])?>></tr>
	          
	          		<tr><td colspan="2"><input id='botao-conferir' type="submit" value="Gravar"></td></tr> 
		        </table>
      		</form>
    	</div>
	</body>
</html>