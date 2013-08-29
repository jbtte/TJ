<?php
    
    
	
	//hard code number of file
	$num_processo = "2000.03.1.010173-4";
	
	//function to show only relevant numbers
	
	function mascara($num)
	{
			
		if (strlen($num)<17)
		{
			
			return $num;
			
		}
		
		
		else{
			
		$j = ltrim(substr($num, 5, 2), '0');
		
		
		$i = ltrim(substr($num, 10, 6), '0');
		
		
		return $j."-".$i.$num[17];
		
		}
		
		
	}
		
	
	
	$novo_num = mascara($num_processo);
	
	
	echo $novo_num;
	
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