<?
    
    // require common code
    require_once("Comon/common.php"); 
    
   
    // Index of the last entry 
    $result = mysql_query("SELECT MAX(`index`) FROM `processos`");
    $array = mysql_fetch_row($result);
    $index = $array[0];
	
	//Retrinving number of files in each class from current month and 
	// atribuiting it to a given session variable 
	$_SESSION["RELATOR"] = total('RELATOR');
	$_SESSION["REVISOR"] = total('REVISOR');
	$_SESSION["TOTAL"] = $_SESSION["RELATOR"] + $_SESSION["REVISOR"];
    
?>

<!DOCTYPE html>

<html>

	<head>
	  	<title>JP: Processos</title>
	    <link href="css/index.css" rel="stylesheet" type="text/css">
	    <link href="http://fonts.googleapis.com/css?family=Just Me Again Down Here" rel="stylesheet" type="text/css">
	    <link href="http://fonts.googleapis.com/css?family=Mouse Memoirs" rel="stylesheet" type="text/css">
	</head>

  		<? top_site() ?>
    
    	<div class = 'middle'>
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
	            	<?
		            	for ($i = 0; $i<5; $i++){
	                        $result = mysql_query("SELECT tipo, processo, relator, reu, crime, Data FROM processos WHERE `index` = $index");
	                        $row = mysql_fetch_array($result);
	                        
	                        print('<tr class = index_tj_body>');                                        
	                        print('<td>'. $row["Data"] . '</td>');
	                        print('<td>'. $row["tipo"] . '</td>');
	                        print('<td class = "sNum">'. mascara($row["processo"]) . '<span class = "Num">'.$row["processo"]. '</span></td>');
	                        print('<td>'. $row["relator"] . '</td>');
	                        print('<td>'. $row["reu"] . '</td>');
	                        print('<td>'. $row["crime"] . '</td>');
	                        print('</tr>'); 
	                        
	                        --$index;
	   
	                        }
					?>
 	          	</tbody>
 			</table>
    	</div>
	 </body>
</html>