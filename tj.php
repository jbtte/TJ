<?

    // require common code
    require_once("Comon/common.php"); 
    
    $id = $_SESSION["id"];


?>

<!DOCTYPE html>

<html>

  <head>
    <link href="css/tj.css" rel="stylesheet" type="text/css">
    <title>JP: Processos</title>
  </head>
  
  
  <body>
  
    

   

    <div id='middle'>
      <form action="tj3.php" method="post">
        <table>
          <tr>
            <td>Processo: </td><td> <input input type="text" placeholder="processo" name="processo" autofocus=""></td>
          </tr>
    
            <td id='botao-gravar' colspan="2"><input type="submit" value="Pesquisar"></td>
          </tr> 
        </table>
      </form>
    </div>

  

  </body>

</html>
