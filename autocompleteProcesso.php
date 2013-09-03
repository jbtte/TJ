<?php
     // require common code
    require_once("Comon/common.php"); 
	
	
	$term = $_REQUEST['term'];
	
	$req = "SELECT processo FROM processos WHERE processo LIKE '%". $term ."%' "; 

	$query = mysql_query($req);
	
	while($row = mysql_fetch_array($query))
	{
		$results[] = array('label' => $row['processo']);
	}
	
	echo json_encode($results);
?>