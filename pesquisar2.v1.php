<?php
     // require common code
    require_once("Comon/common.php"); 
	
    
    // check if any field was filled in
    if ($_POST["processo"] == null && $_POST["tipo"] == null && $_POST["reu"] == null && $_POST["crime"] == null && $_POST["data0"] == null && $_POST["dataf"] == null)
    {
        apologize("Tem que reencher algum campo para a pesquisa ser realizada");    
    
    };
	


   
    
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
            	
            	
            	
            		 // check if any field was filled in
				    if (($_POST["reu"] != null) && ($_POST["tipo"] != null))
					{
							
						
						$reu = $_POST["reu"];
						$tipo = strtoupper($_POST["tipo"]);
						$result = mysql_query("SELECT tipo, processo, relator, reu, crime, data FROM Processos WHERE reu LIKE '%$reu%' AND tipo LIKE '$tipo'");
							
					}
					
					if (($_POST["processo"] != null) && ($_POST["tipo"] != null))
					{
							
						
						$processo = $_POST["processo"];
						$tipo = strtoupper($_POST["tipo"]);
						$result = mysql_query("SELECT tipo, processo, relator, reu, crime, data FROM Processos WHERE processo LIKE '%$processo%' AND tipo LIKE '$tipo'");
							
					}
				    
					else if (($_POST["reu"] != null) && ($_POST["tipo"] == null))
					{
							
						$reu = $_POST["reu"];
						$result = mysql_query("SELECT tipo, processo, relator, reu, crime, data FROM Processos WHERE reu LIKE '%$reu%'");
							
					}
					
					else if ($_POST["processo"] != null)
					{

						$processo = $_POST["processo"];
						$result = mysql_query("SELECT tipo, processo, relator, reu, crime, data FROM Processos WHERE processo LIKE '%$processo%'");
							
					}
					
					
					
					else if ($_POST["data0"] != null || $_POST["dataf"] != null)
					{
							
						//checking if initial date was given and if not establishing 30 days prior
						if ($_POST["data0"] == null){
							$data0 = date("Y-(m-1)-d");
						}
						else {
							$data0 = $_POST["data0"];
						}
						$dataf = $_POST["dataf"];
						
						//checking if final date was given and if not establishing today as final date
						if ($_POST["dataf"] == null){
							$dataf = date("Y-m-d");
						}
						else {
							$dataf = $_POST["dataf"];
						}
						
						//Checking if the dates are not to far apart
						$interval = date_diff(date_create($data0), date_create($dataf)); 
						$interval = $interval -> format('%a');
						
						if ($interval > 60){
							
							apologize("Periodo muito longo. Por favor, reduzir!"); 
						}
						
						
						
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