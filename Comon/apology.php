
<!DOCTYPE html>

<html>

  <head>
        <link href="css/stylesheet.css" rel="stylesheet" type="text/css">
        <title>JP: Erro</title>
  </head>

  <body>

    <div id ='header'>
        <a href="index.php"> <img src="http://www2.tjdft.jus.br/img/cabecaBrasaoPgResp.jpg" alt="TJDFT"> </a>         
    </div>

    <div id="middle">
      <h1>Ixi! Foi Mal!</h1>
      <h2><?= $message ?></h2>
    </div>

    <div id="bottom">
      <a href="javascript:history.go(-1);">Voltar</a>
    </div>

  </body>

</html>
