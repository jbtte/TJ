<?php
     // require common code
    require_once("Comon/common.php"); 
	
    
	//checking if initial date was given and if not establishing 30 days prior
	if ($_SESSION["data0"] == NULL){
		
		$data0 = date("Y-m-d", strtotime("-1 month"));
		
		
	}
	else{
		$data0 = $_SESSION["data0"];
	}
	
	
	
	//checking if final date was given and if not establishing today as final date
	if ($_SESSION["dataf"] == NULL){
		
		$dataf = date("Y-m-d");
		
	}
	else{
		$dataf = $_SESSION["dataf"];
	}

	$newdate0 = date("d-m-Y", strtotime($data0));
	$newdatef = date("d-m-Y", strtotime($dataf));
	
	
	
	//Checking if the dates are not to far apart
	$interval = date_diff(date_create($data0), date_create($dataf)); 
	$interval = $interval -> format('%a');
	
	
	
	if ($interval > 60){
		
		apologize("Periodo muito longo. Por favor, reduzir!"); 
	}



   
    
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
            <br>
        	<div><p class = "data_processo"> Processos cadastrados de <?print $newdate0?> a <?print $newdatef?></p></div>
        	<br>
            <div>
            	
            	
            	<table class="table-striped">
		            <thead>
		                <tr class = 'index_tj_head'>
		                    <th class = 'index_tj'>Data</th>
		                    <th class = 'index_tj'>Tipo</th>
		                    <th class = 'index_tj'>Numero</th>
		                    <th class = 'index_tj'>Relator</th>
		                    <th class = 'index_tj'>Reu</th>
		                    <th class = 'index_tj'>Crime</th>
		                    
		                    
		                </tr>
		            
		            </thead>
		            <tbody>
            	
            	
            	<?php
           		
					if($_SESSION["tipo"] != NULL){
						
						$tipo = $_SESSION["tipo"];
						
						$result = mysql_query("SELECT * FROM `processos` WHERE  `data` > '$data0' AND `data` < '$dataf' AND `tipo` = '$tipo'");
						
						
					}

					else{
							
						$result = mysql_query("SELECT * FROM `processos` WHERE  `data` > '$data0' AND `data` < '$dataf'");
					}		
							
			        while($row = mysql_fetch_array($result)){
			        
			        print('<tr class = index_tj_body>');                                        
			        print('<td>'. $row["data"] . '</td>');
			        print('<td>'. $row["tipo"] . '</td>');
			        print('<td>'. $row["processo"] . '</td>');
			        print('<td>'. $row["relator"] . '</td>');
			        print('<td>'. $row["reu"] . '</td>');
			        print('<td>'. $row["crime"] . '</td>');
			        print('</tr>'); 
					
					};
            	            	
            	?>
            	
            </tbody>
            
            </table>
            
            	

		</body>
</html>