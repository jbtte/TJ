<?php
     // require common code
    require_once("Comon/common.php"); 
	
    
    // check if any field was filled in
    if ($_POST["processo"] == null && $_POST["tipo"] == null && $_POST["reu"] == null && $_POST["crime"] == null && $_POST["data0"] == null && $_POST["dataf"] == null)
    {
        apologize("Tem que preencher algum campo para a pesquisa ser realizada");    
    
    };
	

	if ($_POST["data0"] != null || $_POST["dataf"] != null){
		$_SESSION["data0"] = $_POST["data0"];
		$_SESSION["dataf"] = $_POST["dataf"];
		
		if ($_POST["tipo"] != null){
			
			$_SESSION["tipo"] = $_POST["tipo"];	
		}
		
		header("Location:pesquisar3.php");
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
						$tipo = $_POST["tipo"];
						$result = mysql_query("SELECT tipo, processo, relator, reu, crime, data FROM processos WHERE reu LIKE '%$reu%' AND tipo LIKE '$tipo'");
							
					}
					
					else if (($_POST["processo"] != null) && ($_POST["tipo"] != null))
					{
							
						
						$processo = $_POST["processo"];
						$tipo = strtoupper($_POST["tipo"]);
						$result = mysql_query("SELECT tipo, processo, relator, reu, crime, data FROM processos WHERE processo LIKE '%$processo%' AND tipo LIKE '$tipo'");
							
					}
				    
					else if (($_POST["reu"] != null) && ($_POST["tipo"] == null))
					{
							
						$reu = $_POST["reu"];
						$result = mysql_query("SELECT tipo, processo, relator, reu, crime, data FROM processos WHERE reu LIKE '%$reu%'");
							
					}
					
					else if ($_POST["processo"] != null && ($_POST["tipo"] == null))
					{

						$processo = $_POST["processo"];
						$result = mysql_query("SELECT tipo, processo, relator, reu, crime, data FROM processos WHERE `processo` LIKE '%$processo%'");
							
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