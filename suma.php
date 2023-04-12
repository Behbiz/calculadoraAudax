<?php

// Comprobar si se recibió una request POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtiene los valores enviados via POST
    $valor1 = $_POST['valor1'];
    $valor2 = $_POST['valor2'];

    // Realiza la suma de los valores
    $resultado = $valor1 + $valor2;

    // Pone la respuesta en formato JSON
    $response = array('resultado' => $resultado);

    // Devuelve la respuesta en formato JSON
    header('Content-Type: application/json');
    echo json_encode($response);
} else {
    // Devuelve una respuesta de erro, si no es una solicitud POST
    http_response_code(400);
    echo json_encode(array('erro' => 'Requisição inválida'));
} ?>