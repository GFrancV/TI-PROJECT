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
    <link rel="icon" type="image/png" href="Images/security.png" />
    <title>Segurança da Cidade</title>

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
            <h1 class="title">Segurança da Cidade</h1>
        </div>
    </div>
    <!--Sensores-->
    <div class="container">
        <div class="card-group">
            <!-- Detector de fumaça -->
            <div class="card">
                <h4 class="card-title" style="margin: 10px;">Smoke sensor</h4>
                <!---Nesta parte, a imagem atualizada será colocada -->
                <div id="img-smoke"></div>
                
                <div class="card-body">
                    Estado:
                    <!---Nesta parte, o bt atualizado será colocado -->
                    <div id="bt-smoke"></div>
                    Fumaça no ambiente:  <div id="valor-smoke"></div>
                </div>
                <div class="card-footer">
                    <!---imprimindo a hora da atualização--->
                    <small class="text-muted" style="font-size:large"><div id="hora-smoke"></div> </small>
                </div>
            </div>

            <!--Detector de metais-->
            <div class="card">
                <h4 class="card-title" style="margin: 10px;">Detector de metais</h4>
                <img src="Images/Seguranca/metais.png" alt="metal" class="responsive">
                <!---Comprobacao de estado do sensor--->
                <div class="card-body">
                    <p class="card-text">
                        Estado:
                        <!---Nesta parte, o bt atualizado será colocado -->
                        <div id="bt-Metal"></div>
                    </p>
                </div>
                <div class="card-footer">
                    <!---imprimindo a hora da atualização--->
                    <small class="text-muted" style="font-size:large"><div id="hora-metal"></div> </small>
                </div>
            </div>

            <!--Camera-->
            <div class="card">
                <h4 class="card-title" style="margin: 10px;">Camera</h4>
                <div class="card-body">
                    <!---atualização de imagem ao detectar metal--->
                    <div id="camera"></div>
                </div>
                <div class="card-footer">
                    <small class="text-muted" style="font-size:large"><div id="horaCamera"></div></small>
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
                validar("imgSmoke");
                validar("btSmoke");
                validar("horaSmoke");
                validar("btMetal");
                validar("horaMetal");
                validar("valor-smoke");
                validar("camera");
                validar("horaCamera")
            },1000
        );

        function validar(deque){
            $.ajax({
                type: "POST",
                url: "refresh.php?op1="+deque,
                dataType: 'json',
                success: function (respuesta) {
                    if (deque=='imgSmoke')
                        $("#img-smoke").html("<img class='responsive' src='"+respuesta.imagen+"' alt ='smoke'>");

                    if (deque =='btSmoke')
                        $("#bt-smoke").html(respuesta.imagen);

                    if(deque == 'valor-smoke')
                        $("#valor-smoke").html(respuesta.imagen);

                    if (deque =='horaSmoke')
                        $("#hora-smoke").html(respuesta.imagen);

                    if (deque=='btMetal')
                        $("#bt-Metal").html(respuesta.imagen);

                    if(deque == 'horaMetal')
                        $("#hora-metal").html(respuesta.imagen);
                    
                    if (deque=='camera')
                        $("#camera").html("<img class='responsive' src='"+respuesta.imagen+"' alt ='camera'>");

                     if(deque == 'horaCamera')
                        $("#horaCamera").html(respuesta.imagen);

                }
            });
        }

    });    
</script>


