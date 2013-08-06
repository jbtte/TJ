<?

    // require common code
    require_once("Comon/common.php"); 
    
    $id = $_SESSION["id"];


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

   

    <div id='middle'>
      <form action="tj2.php" method="post">
        <table>
          <tr>
            <td>Processo: </td><td> <input input type="text" placeholder="processo" name="processo" autofocus=""></td>
          </tr>
          
          <tr>
            <td>Tipo: </td><td><input input type="text" placeholder="tipo" name="tipo" autofocus=""></td>
          </tr>
          <tr>
            <td>Reu:</td><td><input input type="text" placeholder="reu" name="reu" autofocus=""></td>
          </tr>
          <tr>
            <td>Crime:</td><td><input input type="text" placeholder="crime" name="crime" autofocus=""></td>
          </tr>
          <tr>
            <td></td><td><input input type="radio" name="relator" value="relator">Relator<input input type="radio" name="revisor" value="revisor">Revisor</td>
          </tr>
          
          <tr>
            <td></td>
            
            <td id='botao-gravar' colspan="2"><input type="submit" value="Gravar"></td>
          </tr>
        </table>
      </form>
    </div>

  

  </body>

</html>
