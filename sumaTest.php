<?php

use PHPUnit\Framework\TestCase;

class SumaTest extends TestCase
{
    public function testPostRequest()
    {
        // Simula una solicitud POST
        $_SERVER['REQUEST_METHOD'] = 'POST';
        $_POST['valor1'] = 5;
        $_POST['valor2'] = 10;

        // Incluye el código a probar
        ob_start();
        include 'suma.php';
        $output = ob_get_clean();

        // Asegura la respuesta JSON esperada
        $expectedResponse = array('resultado' => 15);
        $this->assertJsonStringEqualsJsonString(json_encode($expectedResponse), $output);
    }

    public function testNonPostRequest()
    {
        // Simula una solicitud no-POST
        $_SERVER['REQUEST_METHOD'] = 'GET';

        // Incluye el código a probar
        ob_start();
        include 'suma.php';
        $output = ob_get_clean();

        // Asegura la respuesta de error JSON esperada
        $expectedResponse = array('erro' => 'Requisição inválida');
        $this->assertJsonStringEqualsJsonString(json_encode($expectedResponse), $output);

        // Asegura el código de respuesta HTTP esperado
        $this->assertEquals(400, http_response_code());
    }
}
?>