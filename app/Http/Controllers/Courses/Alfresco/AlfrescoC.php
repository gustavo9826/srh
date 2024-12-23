<?php

namespace App\Http\Controllers\Courses\Alfresco;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class AlfrescoC extends Controller
{
    // Método para mostrar el formulario de carga de archivo
    public function showUploadForm()
    {
        return view('courses/alfresco/form');  
    }

    // Método para cargar el archivo a Alfresco
    public function uploadFile(Request $request)
    {
        // Validar que el archivo fue subido
        $request->validate([
            'file' => 'required|file|max:10240', // Máximo 10MB
        ]);

        // Obtener la URL de la API de Alfresco desde el archivo .env
        $alfrescoApiUrl = env('ALFRESCO_API_URL');
        $nodeId = env('ALFRESCO_NODE_ID'); // ID de la carpeta
        $username = env('ALFRESCO_USERNAME'); // Nombre de usuario de Alfresco
        $password = env('ALFRESCO_PASSWORD'); // Contraseña de Alfresco

        // Crear una instancia de Guzzle
        $client = new Client();

        // Abrir el archivo subido
        $file = $request->file('file');

        // Preparar los datos para el archivo
        $multipart = [
            [
                'name' => 'filedata',
                'contents' => fopen($file->getPathname(), 'r'),
                'filename' => $file->getClientOriginalName(),
            ]
        ];

        // Realizar la solicitud POST a la API de Alfresco
        try {
            $response = $client->post(
                str_replace('{nodeId}', $nodeId, $alfrescoApiUrl), 
                [
                    'auth' => [$username, $password],
                    'multipart' => $multipart
                ]
            );

            // Verificar que la carga fue exitosa
            if ($response->getStatusCode() == 201) {
                return response()->json(['message' => 'Archivo subido exitosamente a Alfresco']);
            } else {
                return response()->json(['message' => 'Error al subir el archivo a Alfresco', 'status_code' => $response->getStatusCode()], 500);
            }
        } catch (RequestException $e) {
            return response()->json(['message' => 'Error en la solicitud a Alfresco', 'error' => $e->getMessage()], 500);
        }
    }
}

