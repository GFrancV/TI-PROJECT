<?php
session_start();

if (!isset($_SESSION['username'])) {
  header("refresh:1;url=index.php");
  die('<script language="javascript">alert("Acesso negado: Deve primeiro fazer login!");</script>');
}
?>

<!DOCTYPE html>
<html>

<head>
  <!---Icono da pagina e titulo--->
  <link rel="icon" href="Images/icon.png" type="image/png" />
  <title>Cidade Inteligente</title>

  <!--Pagina de estilo e bootstrap-->
  <link rel="stylesheet" href="styles/style.css" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />

  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <!--Atualizacao automatica da pagina-->
  <meta http-equiv="refresh" content="30" />
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
      <h1 class="title">Cidade Inteligente</h1>
    </div>
  </div>

  <!--Informacao da pagina-->
  <div class="container">
    <h2>Informação</h2>
    <p class="paragraph">
      Esta é a página principal de uma cidade inteligente onde todas as
      informações da cidade serão apresentadas. Você poderá consultar o estado
      da cidade e o estado de cada um dos sensores dependendo da area da
      cidade, verificar o funcionamento correto e até supervisionar a cidade
      através de câmeras de segurança.
    </p>
    <h4 class="subtitle">Sensores:</h4>
    <p class="paragraph">Selecione uma area:</p>
  </div>

  <!--Selecionar area da cidade-->
  <div class="container">
    <div class="row">
      <!---Entrada da cidade--->
      <div class="col-sm-3">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Entrada da Cidade</h5>
            <img src="Images/entrada.png" alt="Entrada" class="responsive" />
            <p class="card-text">
              <u>Sensores:</u> Motion sensor.
              <u>Atuadores:</u> Servo motor, ecrã LCD, Led.
            </p>
            <a href="entrada_cidade.php" class="btn btn-info">Ver Sensores</a>
          </div>
        </div>
      </div>
      <!---Luzes da cidade--->
      <div class="col-sm-3">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Luzes da Cidade</h5>
            <img src="Images/lights.png" alt="Luzes" class="responsive" />
            <p class="card-text">
              <u>Sensores:</u> - Sem sensores -
              <u>Atuadores:</u> Atuador para ligar ou desligar as luzes, leds.
            </p>
            <a href="luzes_cidade.php" class="btn btn-info">Ver Sensores</a>
          </div>
        </div>
      </div>
      <!---Clima da cidade--->
      <div class="col-sm-3">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Clima da Cidade</h5>
            <img src="Images/weather.png" alt="Clima" class="responsive" />
            <p class="card-text">
              <u>Sensores:</u> Water detector, humedi sensor, temperature sensor.
              <br>
              <u>Atuadores:</u> Ecrãs LCD, leds.
            </p>
            <a href="clima_cidade.php" class="btn btn-info">Ver Sensores</a>
          </div>
        </div>
      </div>
      <!---segurança da cidade--->
      <div class="col-sm-3">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Segurança da cidade </h5>
            <img src="Images/security.png" alt="Seguranca" class="responsive" />
            <p class="card-text">
              <u>Sensores:</u> Metal sensor, smoke sensor.
              <br>
              <u>Atuadores:</u> Ecrãs LCD, leds, alarmes, ceiling sprinker.
            </p>
            <a href="seguranca_cidade.php" class="btn btn-info">Ver Sensores</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <br />
  <br />

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