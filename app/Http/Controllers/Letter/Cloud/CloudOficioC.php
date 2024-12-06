<?php

namespace App\Http\Controllers\Letter\Cloud;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CloudOficioC extends Controller
{
    //La funcion es para pruebas con el fin de subir un archivo a cloud
    public function test()
    {
        $uploadUrl = 'http://172.16.17.12:8080/alfresco/webdav/test/test1';
        $deleteUrlBase = 'http://172.16.17.12:8080/alfresco/api/-default-/public/alfresco/versions/1/nodes';
        $username = 'admin';
        $password = 'Jaqu32611';

        
    }

  
}
