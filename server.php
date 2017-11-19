<?php

header('Content-Type: application/json');

/**
 * Como crear un cargo a una tarjeta usando Culqi PHP.
 */

// Usando Composer (o puedes incluir las dependencias manualmente)
require 'vendor/autoload.php';

// Cargar Culqi-PHP de forma manual
require 'vendor/culqi/culqi-php/lib/culqi.php';

use Culqi\Culqi;

// Configurar tu API Key y autenticación
$SECRET_API_KEY = 'sk_test_UdpROVuDJkNOSXbU';
$culqi = new Culqi(array('api_key' => $SECRET_API_KEY));

try {

  // Creando Cargo a una tarjeta
  $charge = $culqi->Charges->create(
      array(
          "amount" => 1000,
          "capture" => true,
          "currency_code" => "PEN",
          "description" => "Venta de prueba",
          "email" => "test777@culqi.com",
          "installments" => (int)$_POST["installments"],
          "source_id" => $_POST["token"]
      )
  );
  // Response
  echo json_encode($charge);

} catch (Exception $e) {

  echo json_encode($e->getMessage());

}
