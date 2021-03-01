<?php
//Coletar informações de tempo
$hoy = getdate();

function save_file($sourcefile){
    if (move_uploaded_file($sourcefile, "Images/Seguranca/camera/webcam.jpg")) {
        echo "Foi realizado com sucesso o upload do ficheiro!";
    } else {
        echo "Eroo a facer o upload!";
    }   
}

if($_SERVER["REQUEST_METHOD"] == "POST"){
    echo "POST\n";
    if (isset($_FILES["imagem"])) {
        echo ("<br>"."Nome do ficheiro:");
        print_r($_FILES["imagem"]["name"]);
        echo "\nTamanho do ficheiro:";
        print_r($_FILES["imagem"]["size"]);
        echo "\nTipo de ficheiro:";
        print_r($_FILES["imagem"]["tmp_name"]);
        save_file($_FILES['imagem']["tmp_name"]);
        
        file_put_contents("api/files/seguranca_cidade/camera/hora.txt", "$hoy[mday]/$hoy[mon]/$hoy[year] $hoy[hours]:$hoy[minutes]:$hoy[seconds]");
    }
    else {
        echo "ERRO - nao existe elemento imagem";
    } 
}
else{
    http_response_code(403);
    echo "Nao he um metodo POST";
}

?>