<?php
    
?>
<!DOCTYPE html>
	<html>
	  <head>
	    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
	    <link href="css/stylesheet.css" rel="stylesheet" type="text/css">
	    <title>
	      JP: Estatistica
	    </title>
	    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
	    <script type="text/javascript">
	      google.load('visualization', '1', {packages: ['corechart']});
	    </script>
	    <script type="text/javascript">
	      function drawVisualization() {
	        // Some raw data (not necessarily accurate)
	        var data = google.visualization.arrayToDataTable([
	          ['Month', 'RSE/RAG',   'APR',      'Total', 'Media'],
	          ['Março',  10,         15,           25,        25],
	          ['Abril',  7,           3,           10,        17.5],
	          ['Maio',  9,           21,           30,        21.7],
	          ['Junho',  5,          13,           18,        20.8],
	          ['Julho',  4,          6,            10,       18.6]
	        ]);
	
	        var options = {
	          title : 'Estatisca de Processos JP',
	          vAxis: {title: "Processos"},
	          hAxis: {title: "Mes"},
	          seriesType: "bars",
	          colors:['#436976','#002d49', '#256438', '#cc7014'],
	         
	          series: {3: {type: "line"}}
	          
	        };
	
	        var chart = new google.visualization.ComboChart(document.getElementById('chart_div'));
	        chart.draw(data, options);
	      }
	      google.setOnLoadCallback(drawVisualization);
	    </script>
	  </head>
	  <body>
	  	<div id ='header'>
                <a href="index.php"> <img src="http://www2.tjdft.jus.br/img/cabecaBrasaoPgResp.jpg" alt="TJDFT"> </a>         
        </div>
	    <div id="chart_div" style="width: 900px; height: 500px;"></div>
	  </body>
	</html>