<?php
session_start();
$username = "admin";
$password = "admin";

if (isset($_POST['username']) && isset($_POST['password'])) {
    if ($_POST['username'] == $username && $_POST['password'] == $password) {
        $_SESSION["username"] = $_POST['username'];
        header("Location: /inicio.php");
    } else {
        echo '<script language="javascript">alert("Os dados nao sao correctos!");</script>';
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <!---Icono da pagina e titulo--->
    <link rel="icon" href="Images/icon.png" type="image/png" />
    <title>Cidade Inteligente - Login</title>

    <!--Pagina de estilo e bootstrap-->
    <link rel="stylesheet" href="styles/style.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>
<br>

<body style="background-color: #DDDEDF">
    <div class="text-center">
        <img src="Images/icon.png" alt="Icon" width="150px" height="150px" style="border-radius:150px;border:5px solid black; background-color:white;">
    </div>
    <br>
    <div class="container">
        <div class="jumbotron bg-white">
            <h3 class="title">Login</h3>
            <br>
            <form method="POST" class="was-validated">
                <div class="form-group">
                    <label for="usr">Name:</label>
                    <input type="text" class="form-control" id="usr" name="username" placeholder="Username" required>
                    <div class="valid-feedback">Valido.</div>
                    <div class="invalid-feedback">Por favor digite seu username.</div>
                </div>
                <div class="form-group">
                    <label for="pwd">Password:</label>
                    <input type="password" class="form-control" id="pwd" name="password" placeholder="password" required>
                    <div class="valid-feedback">Valido.</div>
                    <div class="invalid-feedback">Por favor digite sua password.</div>
                </div>
                <input type="submit" class="btn btn-info" value="Submit">
            </form>
        </div>
    </div>


</body>

</html>