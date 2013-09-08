<?php
    
    
	
	$same_path = "SELECT tipo, processo, relator, reu, crime, data FROM processos WHERE";
	$result = ($same_path." reu LIKE '%$reu%' AND tipo LIKE '$tipo'");
	
	
	echo $result;
	
?>

<!DOCTYPE html>
     <html>
     
        <head>
            <link href="css/stylesheet.css" rel="stylesheet" type="text/css">
            <title>JP: Processos</title>
         </head>   
          <body>
            
       </body>

</html>