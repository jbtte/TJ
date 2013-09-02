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

  	<? top_site() ?>
    
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