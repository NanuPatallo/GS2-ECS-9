<?php

header('Content-Type:application/json');

require_once 'request/nuevoRequest.php';
require_once 'responses/nuevoResponse.php';


$json = file_get_contents('php://input', true);
// Convertir el body en un objeto
$req = json_decode($json);



$res = new NuevoResponse();
$res->IsOk = true;

if ($req->Edad < 18) {
    $res->IsOk = false;
    $res->Mensajes[] = 'El jugador debe ser mayor de edad';
}

if ($req->Puesto != 'Delantero' && $req->Puesto != 'Defensor' && $req->Puesto != 'Arquero' && $req->Puesto != 'Mediocampista') {
    $res->IsOk = false;
    $res->Mensajes[] = 'El puesto ' . $req->Puesto . ' no existe';
}

echo json_encode($res);
