<?php
//Coletar informações de tempo
$hoy = getdate();

//coloca as informações de luzes e tempo em seus ficheiros
file_put_contents("api/files/luzes_cidade/luzes/valor.txt", $_REQUEST[valor]);
file_put_contents("api/files/luzes_cidade/luzes/hora.txt", "$hoy[mday]/$hoy[mon]/$hoy[year] $hoy[hours]:$hoy[minutes]:$hoy[seconds]");

//Voltamos para luces_cidade.php
header("Location:http://localhost/luzes_cidade.php");
?>