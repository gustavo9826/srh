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
        $baseUrl = 'http://172.16.17.12:8080/alfresco/api/-default-/public/authentication/versions/1/tickets';
        $userId = 'admin'; // Aquí usas 'userId' en lugar de 'username'
        $password = 'admin';

        // Crear una instancia de Guzzle
        $client = new Client();

        try {
            $authUrl = $baseUrl; // URL para obtener el ticket de autenticación

            $data = [ // Datos de autenticación en formato JSON (usando 'userId' en lugar de 'username')
                "userId" => $userId,  // Cambié 'username' por 'userId'
                "password" => $password,
            ];

            // Realizar la solicitud POST a la API de Alfresco
            $response = $client->post($authUrl, [
                'json' => $data,
                'headers' => [
                    'Content-Type' => 'application/json',
                ],
            ]);

            // Obtener el código de estado y el cuerpo de la respuesta
            $statusCode = $response->getStatusCode();  // 200
            $responseBody = json_decode($response->getBody()->getContents(), true);
            $id = $responseBody['entry']['id'];  // El ID del ticket de autenticación
            $userId_ = $responseBody['entry']['userId'];

            // Depurar la respuesta
            Log::info('Respuesta de Alfresco:', $responseBody);  // Esto es correcto, pasa el arreglo completo
            Log::info('ID de ticket:', ['id' => $id]);           // Usar un arreglo para los valores
            Log::info('UserId de ticket:', ['userId' => $userId_]); // Usar un arreglo para los valores

            return response()->json(['message' => 'Archivo eliminado exitosamente. $id']);

            /*
            // CODIGO PARA ELIMINAR UN ARCHIVO CON ID
            // Paso 1: Obtener el nodeId del archivo que deseas eliminar
            $nodeId = '1b7badaf-5558-4b2a-a4c8-76567e1ca0ba';  // Reemplaza esto por el nodeId real del archivo

            // Paso 2: Crear la URL para eliminar el archivo en Alfresco
            $deleteUrl = "http://172.16.17.12:8080/alfresco/api/-default-/public/alfresco/versions/1/nodes/$nodeId";

            // Paso 3: Realizar la solicitud DELETE a la API de Alfresco
            $deleteResponse = $client->delete($deleteUrl, [
                'headers' => [
                    'Authorization' => "Bearer $id",  // Usar el ticket de autenticación obtenido previamente (con 'Bearer' seguido del ticket)
                    'Content-Type' => 'application/json',
                ],
            ]);

            // Verificar si el archivo fue eliminado con éxito
            $deleteStatusCode = $deleteResponse->getStatusCode();  // 200 o 204
            if ($deleteStatusCode == 200 || $deleteStatusCode == 204) {
                Log::info('Archivo eliminado exitosamente.');
                return response()->json(['message' => 'Archivo eliminado exitosamente.'], 200);
            } else {
                Log::error('Error al eliminar el archivo. Código de respuesta: ' . $deleteStatusCode);
                return response()->json(['error' => 'No se pudo eliminar el archivo'], 400);
            }
                */

        } catch (\Exception $e) {
            Log::error('Error al autenticar con Alfresco: ' . $e->getMessage());
            return response()->json(['error' => 'Error al autenticar con Alfresco: ' . $e->getMessage()], 500);
        }
    }
}