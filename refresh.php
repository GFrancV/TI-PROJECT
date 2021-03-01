<?php
//Variáveis ​​de todas as páginas

//Entrada da cidade
$estado_servo = file_get_contents("api/files/entrada_cidade/servo/valor.txt");
$hora_servo = file_get_contents("api/files/entrada_cidade/servo/hora.txt");
$valor_ecra = file_get_contents("api/files/entrada_cidade/ecra/valor.txt");
$hora_ecra = file_get_contents("api/files/entrada_cidade/ecra/hora.txt");
//Clima da cidade
$valor_temp = file_get_contents("api/files/clima_cidade/temp/valor.txt");
$hora_temp = file_get_contents("api/files/clima_cidade/temp/hora.txt");
$valor_hume = file_get_contents("api/files/clima_cidade/hume/valor.txt");
$hora_hume = file_get_contents("api/files/clima_cidade/hume/hora.txt");
$valor_wat = file_get_contents("api/files/clima_cidade/wat/valor.txt");
$hora_wat = file_get_contents("api/files/clima_cidade/wat/hora.txt");
//Seguranca da cidade
$estado_smoke = file_get_contents("api/files/seguranca_cidade/smoke/valor.txt");
$estado_metal = file_get_contents("api/files/seguranca_cidade/metal/valor.txt");
$hora_smoke = file_get_contents("api/files/seguranca_cidade/smoke/hora.txt");
$hora_metal = file_get_contents("api/files/seguranca_cidade/metal/hora.txt");
$hora_camera = file_get_contents("api/files/seguranca_cidade/camera/hora.txt");

//Entrada da cidade
function imgServo($estado_servo){
  //Impresao img fechada ou aberta dependendo do estado de valor.txt
  if ($estado_servo == 1) {
    $ref = "Images/Entrada/Peaje/open.png";
  } 
  else {
    $ref = "Images/Entrada/Peaje/close.png";
  }

  $arreglo['imagen']=$ref;
  echo json_encode($arreglo);
}

function estadoServo($estado_servo){
  //Impresao do estado fechado ou aberto dependendo do estado de valor.txt
  if ($estado_servo == 1) {
    $ref =  "<span class='badge badge-success'>Emtrada aberta</span>";
  } 
  else {
    $ref = "<span class='badge badge-danger'>Entrada fechada</span>";
}

  $arreglo['imagen']=$ref;
  echo json_encode($arreglo);
}

function imgLCD($valor_ecra){
  //Impresao do estado do LCD
  if ($valor_ecra == 1) {
  $ref = "Images/Entrada/Display/on.png";
  } 
  else {
    $ref = "Images/Entrada/Display/off.png";
  }

  $arreglo['imagen']=$ref;
  echo json_encode($arreglo);
}

//Clima da cidade
function imgTemp($valor_temp){
  if ($valor_temp <= 10) {
    $ref = "Images/Clima/Temperatura/temp-low.jpg";
  } 
  else {
    if ($valor_temp <= 30) {
      $ref = "Images/Clima/Temperatura/temp-med.jpg";
    } 
    else {
        $ref = "Images/Clima/Temperatura/temp-max.jpg";
    }
  }

  $arreglo['imagen']=$ref;
  echo json_encode($arreglo);
}

function valorTemp($valor_temp){
  $ref = "$valor_temp °C";

  $arreglo['imagen']=$ref;
  echo json_encode($arreglo);
}

function valorHume($valor_hume){
  $ref = "$valor_hume %";

  $arreglo['imagen']=$ref;
  echo json_encode($arreglo);
}

function imgWat($valor_wat){
  if ($valor_wat >= 20) {
    $ref = "Images/Clima/Chuva/com-chuva.png";
  } 
  else {
    $ref = "Images/Clima/Chuva/sem-chuva.png";
  }

  $arreglo['imagen']=$ref;
  echo json_encode($arreglo);
}

function valorWat($valor_wat){
  $ref = $valor_wat;

  $arreglo['imagen']=$ref;
  echo json_encode($arreglo);
}

//Seguranca da cidade
function imgSmoke($estado_smoke){
  //Impresao img dependendo do estado de valor.txt
    if ($estado_smoke >= 50) {
        $ref = "Images/Seguranca/smoke/on.png";
    } else {
        $ref = "Images/Seguranca/smoke/off.png";
    }

    $arreglo['imagen']=$ref;
    echo json_encode($arreglo);
  }

  function btSmoke($estado_smoke){
    //Impresao do estado otimo ou nao dependendo do estado de valor.txt
    if ($estado_smoke >= 50) {
      $ref = "<span class='badge badge-danger'>Fumaça detectada</span>
      <u><p style='color: red; font-size:large;'>Liberando água de emergência!</p></u>";
    } 
    else {
      $ref = "<span class='badge badge-success'>Tudo está seguro :)</span>";
    }

    $arreglo['imagen']=$ref;
    echo json_encode($arreglo);
  }

  function valorSmoke($estado_smoke){
    $ref = $estado_smoke;

    $arreglo['imagen']=$ref;
    echo json_encode($arreglo);
  }

  function btMetal($estado_metal){
    //Impresao do estado otimo ou nao dependendo do estado de valor.txt
    if ($estado_metal >= 19) {
        $ref = "<span class='badge badge-danger'>Metal detectado</span>
                <u><p style='color: red; font-size:large;'>Por favor pare!</p></u>";
    } else {
        $ref = "<span class='badge badge-success'>Tudo está seguro :)</span>";
    }

    $arreglo['imagen']=$ref;
    echo json_encode($arreglo);
  }

  function camera(){
    $ref = "Images/Seguranca/camera/webcam.jpg";

    $arreglo['imagen']=$ref;
    echo json_encode($arreglo);
  }

  //Mostra hora de actualizacao de cada um dos dados dependendo dos datos enviados pelo switch
  function data($data){
    $ref = "Actualizaçao: $data";
  
    $arreglo['imagen']=$ref;
    echo json_encode($arreglo);
  }

  $op1 = $_GET["op1"];

  switch ($op1) {
    //Entrada da cidade
    case 'imgServo':
      imgServo($estado_servo);
    break;
    case 'estadoServo':
      estadoServo($estado_servo);
    break;
    case 'horaServo';
      data($hora_servo);
    break;
    case 'imgLCD':
      imgLCD($valor_ecra);
    break;
    case 'horaLCD':
      data($hora_ecra);
    break;

    //Clima da cidade
    case 'imgTemp':
      imgTemp($valor_temp);
      break;
    case 'valorTemp':
      valorTemp($valor_temp);
    break;
    case 'horaTemp':
      data($hora_temp);
    break;
    case 'valorHume':
      valorHume($valor_hume);
    break;
    case 'horaHume':
      data($hora_hume);
    break;
    case 'imgWat':
      imgWat($valor_wat);
    break;
    case 'valorWat':
      valorWat($valor_wat);
    break;
    case 'horaWat':
      data($hora_wat);
    break;

    //Seguranca da cidade
    case 'imgSmoke':
      imgSmoke($estado_smoke);
      break;      
    case 'btMetal':
      btMetal($estado_metal);
      break;
    case 'horaSmoke':
      data($hora_smoke);
      break;
    case 'valor-smoke':
      valorSmoke($estado_smoke);
    break;
    case 'btSmoke':
      btSmoke($estado_smoke);
      break;
    case 'horaMetal':
      data($hora_metal);
      break;
    case 'camera':
      camera();
    break;
    case 'horaCamera':
      data($hora_camera);
    break;
  }

?>