<?php

 	 // require common code
    require_once("Comon/common.php"); 
	
	
	$term = $_REQUEST['term'];
	
	$req = "SELECT reu FROM Processos WHERE reu LIKE '%". $term ."%' "; 

	$query = mysql_query($req);
	
	while($row = mysql_fetch_array($query))
	{
		$results[] = array('label' => $row['reu']);
	}
	
	echo json_encode($results);
		

?>