<?php

function total($classe)
	{
	    
	    // Retriving current month and year
	    $month = date("m");
	    $pmonth = $month - 1;
	    $amonth = $month + 1;
	    $year = date("Y");
	    
	     
	    // Counting the total number of entries RSE current month and year
	    $query = mysql_query("SELECT `index` FROM `processos` WHERE  `data`> '$year-$pmonth-31' AND `Data` < '$year-$amonth-01' AND `tipo` = '$classe'");
	    $Total = array();
	    while($row = mysql_fetch_row($query)){
	        array_push($Total, $row["index"]);
	        
	    }
	    
	 
		return count($Total);	 
	    
	}
?>