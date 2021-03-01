<?php
session_start();

if (!isset($_SESSION['username'])) {
  header("refresh:1;url=index.php");
  die('<script language="javascript">alert("Acesso negado: Deve primeiro fazer login!");</script>');
}
?>

<?php
$valor_luzes = file_get_contents("api/files/luzes_cidade/luzes/valor.txt");
$hora_luzes = file_get_contents("api/files/luzes_cidade/luzes/hora.txt");
?>

<!DOCTYPE html>
<html>

<head>
  <!---Icono da pagina e titulo--->
  <link rel="icon" type="image/png" href="Images/lights.png" />
  <title>Luzes da Cidade</title>

  <!--Pagina de estilo e bootstrap-->
  <link rel="stylesheet" href="styles/style.css" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />

  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

</head>

<body>
  <!---Navbar--->
  <header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-info">
      <a class="navbar-brand" href="inicio.php">
        <img src="Images/icon.png" alt="Icon" width="35" lang="35" />
        Cidade Inteligente
      </a>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          <a class="nav-item nav-link" href="entrada_cidade.php">Entrada da Cidade</a>
          <a class="nav-item nav-link" href="luzes_cidade.php">Luzes da cidade</a>
          <a class="nav-item nav-link" href="clima_cidade.php">Clima da cidade</a>
          <a class="nav-item nav-link" href="seguranca_cidade.php">Segurança da Cidade</a>
        </div>
      </div>
      <form class="form-inline my-2 my-lg-0">
        <a href="logout.php" class="btn btn-success my-2 my-sm-0">Logout</a>
      </form>
    </nav>
  </header>
  <br />

  <!--Banner-->
  <div class="container">
    <div class="jumbotron">
      <h1 class="title">Luzes da Cidade</h1>
    </div>
  </div>

  <!--Sensores-->
  <div class="container">
    <div class="card-group">
      <!--Luz-->
      <div class="card">
        <!---Dependendo do valor das luzes, estam ligadas ou nao--->
        <?php
          if($valor_luzes == 1){
            echo "<img class='responsive2' src='Images/Luzes/on.jpg' alt='Card image cap' />";
          }
          else{
              echo "<img class='responsive2' src='Images/Luzes/off.jpg' alt='Card image cap' />";
          }
        ?>
        <div class="card-body">
          <p class="card-text">Estado:</p>
          <!---Envie informações para o valor.txt do estado das luzes--->
          <form action="luzes_api.php">
            <button type="submit" name="valor" value="1" class="btn btn-success">Ligue as luzes</button>
          </form>
          <br>
          <form action="luzes_api.php">
            <button type="submit" name="valor" value="0" class="btn btn-secondary">Apaga as luzes</button>
          </form>
        </div>
        <div class="card-footer">
          <!---Presenta a hora de actualizacao das luzes--->
          <small class="text-muted" style="font-size:large">Actualizaçao: <?php echo $hora_luzes; ?></small>
        </div>
      </div>
    </div>
  </div>
  <br />
  <br>

  <!--Footer-->
  <nav class="navbar navbar-expand-lg navbar-light bg-secondary">
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="container">
        ©2020 S&F. All rights reserved.
      </div>
    </div>
  </nav>

</body>

</html>