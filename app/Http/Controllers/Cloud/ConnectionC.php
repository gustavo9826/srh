<?php
namespace App\Http\Controllers\Cloud;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;

class ConnectionC extends Controller
{
    public function connection()
    {
        // Obtener las credenciales de Alfresco desde el archivo .env
        $baseUrl = env('ALFRESCO_URL', 'http://172.16.17.12:8080');
        $userId = env('ALFRESCO_USER', 'admin');  // Usuario
        $password = env('ALFRESCO_PASS', 'admin'); // Contraseña

        // Crear una instancia de Guzzle
        $client = new Client();

        try {
            $authUrl = $baseUrl . '/alfresco/api/-default-/public/authentication/versions/1/tickets';

            // Datos de autenticación
            $data = [
                "userId" => $userId,
                "password" => $password,
            ];

            // Realizar la solicitud POST para obtener el ticket de autenticación
            $response = $client->post($authUrl, [
                'json' => $data,
                'headers' => [
                    'Content-Type' => 'application/json',
                ],
            ]);

            // Obtener el ticket de autenticación
            $responseBody = json_decode($response->getBody()->getContents(), true);
            if (!isset($responseBody['entry']['id'])) {
                Log::error('El token de autenticación no se recibió correctamente.');
                return response()->json(['error' => 'Token de autenticación inválido.'], 400);
            }

            $ticket = $responseBody['entry']['id'];

            // Depuración del token
            Log::info('Token de autenticación recibido', ['token' => $ticket]);

            // UUID del archivo que deseas descargar
            $uuid = '1b7badaf-5558-4b2a-a4c8-76567e1ca0ba';
            $downloadUrl = $baseUrl . "/alfresco/api/-default-/public/alfresco/versions/1/nodes/{$uuid}/content";

            // Realizar la solicitud GET para obtener el archivo
            $downloadResponse = $client->get($downloadUrl, [
                'headers' => [
                    'Authorization' => 'Bearer ' . $ticket,  // Usar el ticket de autenticación
                    'Accept' => 'application/octet-stream',  // Especificamos que esperamos un archivo binario
                ],
            ]);

            // Verificar si la respuesta fue exitosa (código 200)
            if ($downloadResponse->getStatusCode() == 200) {
                // Obtener el archivo
                $fileContent = $downloadResponse->getBody()->getContents();

                // Guardar el archivo en el servidor
                $fileName = 'archivo_descargado.ext';  // Nombre del archivo
                $filePath = storage_path('app/' . $fileName);  // Ruta para guardarlo

                // Guardar el archivo en el disco
                file_put_contents($filePath, $fileContent);

                Log::info('Archivo descargado con éxito.', ['filePath' => $filePath]);

                return response()->json([
                    'message' => 'Archivo descargado con éxito.',
                    'filePath' => $filePath,
                ]);
            } else {
                Log::error('Error al descargar el archivo desde Alfresco', [
                    'status_code' => $downloadResponse->getStatusCode(),
                    'body' => $downloadResponse->getBody()->getContents(),
                ]);
                return response()->json([
                    'error' => 'No se pudo descargar el archivo',
                    'status_code' => $downloadResponse->getStatusCode(),
                ], 400);
            }

        } catch (\GuzzleHttp\Exception\RequestException $e) {
            Log::error('Error en la solicitud a Alfresco: ' . $e->getMessage());
            return response()->json(['error' => 'Error en la solicitud a Alfresco: ' . $e->getMessage()], 500);
        } catch (\Exception $e) {
            Log::error('Error general: ' . $e->getMessage());
            return response()->json(['error' => 'Error general: ' . $e->getMessage()], 500);
        }
    }
}