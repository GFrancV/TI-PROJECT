<!---Comprobacao de login--->
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
  <!---JavaScript para refresh--->
  <script src="https://code.jquery.com/jquery-3.2.1.js" integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE=" crossorigin="anonymous"></script>

  <!---Icono da pagina e titulo--->
  <link rel="icon" type="image/png" href="Images/entrada.png" />
  <title>Entrada da Cidade</title>

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
      <h1 class="title">Entrada da Cidade</h1>
    </div>
  </div>
  <?php
  if ($estado_servo == 0) {
    echo "<div class='container'>
        <h3 class='subtitle' style='text-align: center;'>Nenhum carro foi detectado! </h3>
        </div>    
        <br>";
  }
  ?>
  <!--Sensores-->
  <div class="container">
    <div class="card-group">
      <!--Servo Motor-->
      <div class="card">
        <h4 class="card-title" style="margin: 10px;">Servo motor</h4>
        <!---Impresao de estado do servo (img)--->
        <div id="imgServo"></div>
        <div class="card-body">
          <p class="card-text">
            Estado:
          </p>
          <!---Impresao estado do servo--->
          <div id="estadoServo"></div>
        </div>
        <div class="card-footer">
          <!---imprimindo a hora da atualização--->
          <small class="text-muted" style="font-size:large"><div id="horaServo"></div> </small>
        </div>
      </div>

      <!--Display-->
      <div class="card">
        <h4 class="card-title" style="margin: 10px;">Ecrã LCD</h4>
        <!---Atualização lcd--->
        <div id="imgLCD"></div>
        <div class="card-footer">
          <!---imprimindo a hora da atualização do LCD--->
          <small class="text-muted" style="font-size:large"><div id="horaLCD"></div></small>
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

<!---aplicativo de atualização automática--->
<script type="text/javascript">
    $(document).ready(function(){
        setInterval(
            function(){
                validar("imgServo");
                validar("estadoServo");
                validar("horaServo");
                validar("imgLCD");
                validar("horaLCD");
            },1000
        );

        function validar(deque){
            $.ajax({
                type: "POST",
                url: "refresh.php?op1="+deque,
                dataType: 'json',
                success: function (respuesta) {
                    if (deque=='imgServo')
                        $("#imgServo").html("<img class='responsive' src='"+respuesta.imagen+"' alt ='servo'>");
                    
                    if (deque =='estadoServo')
                        $("#estadoServo").html(respuesta.imagen);

                    if(deque == 'horaServo')
                       $("#horaServo").html(respuesta.imagen);

                    if (deque=='imgLCD')
                        $("#imgLCD").html("<img class='responsive' src='"+respuesta.imagen+"' alt ='lcd'>");

                    if (deque=='horaLCD')
                        $("#horaLCD").html(respuesta.imagen);
                }
            });
        }

    });    
</script>