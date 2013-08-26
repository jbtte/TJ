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
  	    	<form action="tj2.php" method="post">
	    	    <table>
	        		<tr><td>Processo: </td><td> <input type="text"  name="processo" value = <?php print($dados[1])?>></td></tr>
	    			<tr><td>Classe: </td><td><input type="text"  name="tipo" value = <?php print($dados[3])?>></td></tr>
	          		<tr><td>Reu:</td><td><input type="text"  name="reu" value = '<?php print ($dados[0])?>'></td></tr>
	          		<tr><td>Crime:</td><td><input type="text"  name="crime" value = '<?php print($dados[2])?>'></td></tr>
	          		<tr><td>Relator:</td><td><input type="text" name="relator"  value = <?php print($dados[4])?>></tr>
	          		<tr><td>Data:</td><td><input type="text" name="relator"  value = <?php print($today)?>></tr>
	          
	          		<tr><td id='botao-gravar' colspan="2"><input type="submit" value="Gravar"></td></tr> 
		        </table>
      		</form>
    	</div>
	</body>
</html>