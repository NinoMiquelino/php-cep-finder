<?php

class CepService {
    private const API_URL = "https://viacep.com.br/ws/";

    private function cleanAndValidateCep(string $cep): string {
        $cleanCep = preg_replace('/[^0-9]/', '', $cep);
        
        if (strlen($cleanCep) !== 8) {
            throw new Exception("O CEP deve ter exatamente 8 dígitos numéricos.", 400);
        }
        
        return $cleanCep;
    }

    public function getAddress(string $cep): array {
        $cleanCep = $this->cleanAndValidateCep($cep);
        
        $url = self::API_URL . $cleanCep . "/json/";

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        
        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $error = curl_error($ch);
        curl_close($ch);

        if ($response === false) {
            throw new Exception("Erro de rede cURL: " . $error, 503);
        }
        
        $data = json_decode($response, true);

        // --- PONTO CRÍTICO DE CORREÇÃO ---
        
        // 1. Verifica se houve falha de comunicação HTTP
        if ($httpCode !== 200) {
            // Em caso de HTTP não 200, lançamos uma exceção.
            throw new Exception("A API retornou um status HTTP não esperado: {$httpCode}", $httpCode);
        }
        
        // 2. Verifica a flag 'erro' da ViaCEP (CEP não encontrado)       
        if (isset($data['erro']) && $data['erro'] === true || $data['erro'] === "true" || $data === null) {	
            // Se a ViaCEP reporta erro, lançamos 404.
            throw new Exception("CEP não encontrado ou inválido na base de dados.", 404);
        }
        
        // 3. Se passou pelas verificações, o endereço é válido
        // --- FIM DO PONTO CRÍTICO DE CORREÇÃO ---

        // Retorna apenas os campos que nos interessam
        return [
            'cep' => $data['cep'] ?? '',
            'logradouro' => $data['logradouro'] ?? '',
            'bairro' => $data['bairro'] ?? '',
            'localidade' => $data['localidade'] ?? '',
            'uf' => $data['uf'] ?? ''
        ];
    }
}
