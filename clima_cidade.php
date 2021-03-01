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
    <link rel="icon" type="image/png" href="Images/weather.png" />
    <title>Clima da Cidade</title>

    <!--Pagina de estilo e bootstrap-->
    <link rel="stylesheet" href="css/style.css" />
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
            <h1 class="title">Clima da Cidade</h1>
        </div>
    </div>

    <!--Sensores-->
    <div class="container">
        <div class="card-group">
            <!--Temperatura-->
            <div class="card">
                <h4 class="card-title" style="margin: 10px;">Temperatura</h4>
                <!---Mostra a imagem--->
                <div id="imgTemp"></div>
                <div class="card-body">
                    <!---Mostra a temperatura--->
                    <p class="card-text" style="font-size:large">
                        Temperatura atual: <div id="valorTemp"></div> 
                    </p>
                </div>
                <div class="card-footer">
                    <small class="text-muted" style="font-size:large"> <div id="horaTemp"></div></small>
                </div>
            </div>

            <!--Humedade-->
            <div class="card">
                <h4 class="card-title" style="margin: 10px;">Humedade</h4>
                <img class="responsive" src="Images/Clima/humedade.png" alt="Card image cap" />
                <div class="card-body">
                    <p class="card-text" style="font-size:large">
                        Humedade atual: <div id="valorHume"></div>
                    </p>
                </div>
                <div class="card-footer">
                    <small class="text-muted" style="font-size:large"><div id="horaHume"></div></small>
                </div>
            </div>

            <!--Lluvia-->
            <div class="card">
                <h4 class="card-title" style="margin: 10px;">Temperatura</h4>
                <div id="imgWat"></div>
                <div class="card-body">
                    <p class="card-text" style="font-size:large">
                        Nível de água: <div id="valorWat"></div>
                    </p>
                </div>
                <div class="card-footer">
                    <small class="text-muted" style="font-size:large"><div id="horaWat"></div></small>
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

<!---aplicativo de atualização automática--->
<script type="text/javascript">
    $(document).ready(function(){
        setInterval(
            function(){
                validar("imgTemp");
                validar("valorTemp");
                validar("horaTemp");
                validar("valorHume");
                validar("horaHume");
                validar("imgWat");
                validar("valorWat");
                validar("horaWat")
            },1000
        );

        function validar(deque){
            $.ajax({
                type: "POST",
                url: "refresh.php?op1="+deque,
                dataType: 'json',
                success: function (respuesta) {
                    if (deque=='imgTemp')
                        $("#imgTemp").html("<img class='responsiveT' src='"+respuesta.imagen+"' alt ='temp'>");
                    
                    if (deque =='valorTemp')
                        $("#valorTemp").html(respuesta.imagen);

                    if(deque == 'horaTemp')
                        $("#horaTemp").html(respuesta.imagen);

                    if (deque =='valorHume')
                        $("#valorHume").html(respuesta.imagen);

                    if (deque=='horaHume')
                        $("#horaHume").html(respuesta.imagen);

                    if(deque == 'imgWat')
                        $("#imgWat").html("<img class='responsive' src='"+respuesta.imagen+"' alt ='wat'>");

                    if (deque=='valorWat')
                        $("#valorWat").html(respuesta.imagen);

                    if (deque=='horaWat')
                        $("#horaWat").html(respuesta.imagen);


                }
            });
        }

    });    
</script>