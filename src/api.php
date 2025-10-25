<?php
require_once 'CepService.php';

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *'); 
header('Access-Control-Allow-Methods: GET, OPTIONS');

$method = $_SERVER['REQUEST_METHOD'] ?? 'GET';
$response = ['success' => false, 'data' => null, 'error' => ''];

if ($method === 'OPTIONS') {
    http_response_code(200);
    exit;
}

if ($method !== 'GET') {
    http_response_code(405);
    $response['error'] = 'Método não permitido. Esperado GET.';
    echo json_encode($response);
    exit;
}

$cep = $_GET['cep'] ?? null;

if (empty($cep)) {
    http_response_code(400);
    $response['error'] = 'O parâmetro "cep" é obrigatório.';
    echo json_encode($response);
    exit;
}

try {
    $service = new CepService();
    // Delega a busca ao serviço
    $addressData = $service->getAddress($cep);
    
    $response['success'] = true;
    $response['data'] = $addressData;

} catch (Exception $e) {
    $code = $e->getCode() ?: 500;
    http_response_code($code);
    $response['success'] = false;
    $response['error'] = $e->getMessage();
}

echo json_encode($response);
