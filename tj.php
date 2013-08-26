<?
    // require common code
    require_once("Comon/common.php");   
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
	       	<form action="tj3.php" method="post" >
	        	<table class = "form_processo">
	          		<tr>
	            		<td>Processo: </td><td class = "campo"> <input type="text" placeholder="Numero do Processo" name="processo" class = "processo"></td>
	          		</tr>
	    			<tr>
	            		<td colspan="2"><input id='botao-conferir' type="submit" value="Buscar"></td><td></td>
	          		</tr>
	        	</table>
	      	</form>
		</div>
	</body>
</html>