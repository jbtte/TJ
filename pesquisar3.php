<?php
     // require common code
    require_once("Comon/common.php"); 
	
    
	//checking if initial date was given and if not establishing 30 days prior
	if ($_GET["data0"] == NULL){
				
		$data0 = date("Y-m-d", strtotime("-1 month"));
	}
	else{
		
		$data0 = $_GET["data0"];
	}
	
	//checking if final date was given and if not establishing today as final date
	if ($_GET["dataf"] == NULL){
		
		$dataf = date("Y-m-d");
		
	}
	else{
		
		$dataf = $_GET["dataf"];
	}

	//Formating date to be printed in screen
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
    	<title>Processos TJ: Pesquisa</title><link href="css/pesquisar.css" rel="stylesheet" type="text/css">
	    <link href="http://fonts.googleapis.com/css?family=Just Me Again Down Here" rel="stylesheet" type="text/css">
	    <link href="http://fonts.googleapis.com/css?family=Mouse Memoirs" rel="stylesheet" type="text/css">
	    <link href="http://fonts.googleapis.com/css?family=The Girl Next Door" rel="stylesheet" type="text/css">
	    <link href="http://fonts.googleapis.com/css?family=Happy Monkey" rel="stylesheet" type="text/css">
	</head>
    
    <? top_site() ?>
    
		<div id='middle'>
        	<table class="form_pesquisar_p3">
	            <thead>
	                <tr class = 'index_tj_head'>
	                    <th class = 'index_tj'>Data</th>
	                    <th class = 'index_tj'>Numero</th>
	                    <th class = 'index_tj'>Gabinete</th>
	                    <th class = 'index_tj'>Reu</th>
	                    <th class = 'index_tj'>Crime</th>
	                </tr> 
            	</thead>
	            <tbody>
	            	
	            	
	            	<?php
	           		
						if($_GET["tipo"] != NULL){
							
							$tipo = $_GET["tipo"];
							$result = mysql_query("SELECT * FROM `processos` WHERE  `data` > '$data0' AND `data` < '$dataf' AND `tipo` = '$tipo'");
						}
	
						else{
								
							$result = mysql_query("SELECT * FROM `processos` WHERE  `data` > '$data0' AND `data` < '$dataf'");
						}		
								
				        while($row = mysql_fetch_array($result)){
				        
					        print('<tr class = index_tj_body>');                                        
					        print('<td>'. $row["data"] . '</td>');
					        print('<td class = "sNum">'. mascara($row["processo"]) . " ". $row["tipo"] . '<span class = "Num">'.$row["processo"]. '</span></td>');
					        print('<td>'. $row["relator"] . '</td>');
					        print('<td>'. $row["reu"] . '</td>');
					        print('<td>'. $row["crime"] . '</td>');
					        print('</tr>'); 
						
						};
	            	            	
	            	?>
                </tbody>
            </table>
        </div>
	</body>
</html>