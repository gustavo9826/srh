<?php

/*
CONFIGURACION DE ROLES PARA APP
Las configuraciones deben estar como lo establece la base -> administration.cat_modulo_rol
donde 
    @var => @valor
    ADM_TOTAL => 1
*/

return [
    /* ROLES_TABLA_DATABASE*/
    'ADM_TOTAL' => 1, //PERMITE EL ACCESO TOTAL A LOS MODULOS DEL SISTEMA
    'COR_TOTAL' => 2, //PERMITE EL ACCESO TOTAL A LOS MODULOS DE CORRESPONDENCIA
    'COR_USUARIO' => 3, //PERMITE EL ACCESO A ACCIONES COMO AGREGAR/MODIFICAR/ELIMINAR FILTRADO POR AREA DE LOS MODULOS DE CORRESPONDENCIA
    'COR_ENLACE' => 4, //PERMITE EL ACCESO A INFORMACION SOLO PARA ENLACE Y ACCIONES COMO MODIFICAR

    /* VARIABLES PARA LA IDENTIFICACION DE TABLAS DE <CORRESPONDENCIA></CORRESPONDENCIA*/
    'CP_TABLE_CORRESPONDENCIA' => 1, //Hace referencia a la tabla principal de correspondencia para identificar su id en la tabla de consecutivo asi como la tabla correspondencia.cat_tipo_docuemnto
];