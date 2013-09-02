<?php
     // require common code
    require_once("Comon/common.php"); 
	  
    // check if any field was filled in
    if ($_POST["processo"] == null && $_POST["tipo"] == null && $_POST["reu"] == null && $_POST["crime"] == null && $_POST["data0"] == null && $_POST["dataf"] == null)
    {
        apologize("Tem que preencher algum campo para a pesquisa ser realizada");    
    
    };
	
	//if date is filled out, redirect to specific file
	if ($_POST["data0"] != null || $_POST["dataf"] != null){
		
		header("Location:pesquisar3.php?data0=".$_POST["data0"]."&dataf=".$_POST["dataf"]."&tipo=".$_POST["tipo"]);
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
        	<table class="form_pesquisar_p2">
	            <thead>
	                <tr class = 'index_tj_head'>
	                    <th class = 'index_tj'>Data</th>
	                    <th class = 'index_tj'>Processo</th>
	                    <th class = 'index_tj'>Gabinete</th>
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
				        print('<td class = "sNum">'. mascara($row["processo"]) . " ". $row["tipo"] . '<span class = "Num">'.$row["processo"]. '</span></td>');
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