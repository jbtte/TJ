<?
    
    // require common code
    require_once("Comon/common.php"); 
    
    $id = $_SESSION["id"];
	   
    
    // Index of the last entry 
    $result = mysql_query("SELECT MAX(`index`) FROM `processos`");
    $array = mysql_fetch_row($result);
    $index = $array[0];
    
    // Retriving current month and year
    $month = date("m");
    $pmonth = $month - 1;
    $amonth = $month + 1;
    $year = date("Y");
    
    
    // Counting the total number of entries current month and year
    $query = mysql_query("SELECT * FROM `processos` WHERE  `data`> '$year-$pmonth-31' AND `data` < '$year-$amonth-01'");
    $total = array();
    
    while($row = mysql_fetch_row($query)){
        array_push($total, $row["tipo"]);
    
    }
        
    
     
    // Counting the total number of entries RSE current month and year
    $query = mysql_query("SELECT `index` FROM `processos` WHERE  `data`> '$year-$pmonth-31' AND `Data` < '$year-$amonth-01' AND `tipo` = 'RSE'");
    $RSE = array();
    while($row = mysql_fetch_row($query)){
        array_push($RSE, $row["index"]);
        
    }
    
    // Counting the total number of entries APELACAO' current month and year
    $query = mysql_query("SELECT `index` FROM `processos` WHERE  `data`> '$year-$pmonth-31' AND `Data` < '$year-$amonth-01' AND `tipo` = 'APR'");
    $APR = array();
    
    while($row = mysql_fetch_row($query)){
        array_push($APR, $row["index"]);
        
    }
    
  
?>

<!DOCTYPE html>

<html>

  <head>
  	<title>JP: Processos</title>
    <link href="css/index.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Just Me Again Down Here" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Mouse Memoirs" rel="stylesheet" type="text/css">
    
    
  </head>

  <body>

    <div id ='header'>
               
    </div>
    
    <div>
        
        <ul class= "menu">
            <li class= "menu_list"><a class= "link" href="tj.php">Cadastrar</a></li>
            <li class= "menu_list"><a class= "link" href="pesquisar.php">Pesquisar</a></li>
            <li class= "menu_list"><a class= "link" href="estatistica.php">Estatistica</a></li>
            
            
            
            
    </div>
       
        
    <div>
        <table class = "tab_total">
            <tbody>
            	
        
                <tr class = "tab_tr" >
                    <td class = "tab_total_titulo">Total: </td>
                    <td class = "tab_total_valor"><? print(count($total));  ?></td></tr>
                    <tr class = "tab_tr" >
                    <td class = "tab_total_titulo">RSE: </td>
                    <td class = "tab_total_valor"><? print(count($RSE));  ?></td></tr>
                    <tr class = "tab_tr" >
                    <td class = "tab_total_titulo">APR: 	</td>
                    <td class = "tab_total_valor"><? print(count($APR));  ?></td></tr>
                
                </tr>
            </tbody>
        </table>
        
          
    
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
                
                    
                    <?
                
                        for ($i = 0; $i<5; $i++){
                        
                        
                        
                        $result = mysql_query("SELECT tipo, processo, relator, reu, crime, Data FROM processos WHERE `index` = $index");
                        $row = mysql_fetch_array($result);
                        
                        print('<tr class = index_tj_body>');                                        
                        print('<td>'. $row["Data"] . '</td>');
                        print('<td>'. $row["tipo"] . '</td>');
                        print('<td>'. $row["processo"] . '</td>');
                        print('<td>'. $row["relator"] . '</td>');
                        print('<td>'. $row["reu"] . '</td>');
                        print('<td>'. $row["crime"] . '</td>');
                        print('</tr>'); 
                        
                        --$index;
                        
                        }
                        
                
                    ?>
                
                
                </tr>
            
            
            
             
        </table>
    
    </div>
    
 
  </body>

</html>