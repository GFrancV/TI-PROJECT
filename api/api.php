<?php
    header('Content-Type: text/html; charset=utf-8');
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        echo "Recebido um post";
        print_r($_POST);
        file_put_contents("files/$_POST[area]/$_POST[nome]/valor.txt", $_POST[valor]);
        file_put_contents("files/$_POST[area]/$_POST[nome]/hora.txt", $_POST[hora]);
        file_put_contents("files/$_POST[area]/$_POST[nome]/log.txt", "Hora:$_POST[hora]\nEstado:$_POST[valor]\n", FILE_APPEND);
    }
    else{
        if($_SERVER["REQUEST_METHOD"] == "GET"){
            if(array_key_exists('nome',$_GET)){
                echo file_get_contents("files/$_GET[area]/$_GET[nome]/valor.txt");
            }
            else{
                http_response_code(400);
            }
        }
        else{
            http_response_code(403);
        }
    }
 ?>
