<x-app-layout>

    <style>
        /* Card que se extiende a lo largo de la pantalla */
        .card {
            width: 100%;
            /* Tamaño del ancho, puede ser ajustado */
            max-width: 1200px;
            /* Ancho máximo para evitar que sea demasiado grande en pantallas grandes */
            background-color: #fff;
            border-radius: 10px;
            /* Bordes redondeados */
            box-shadow: 0 4px 8px rgba(0.3, 0.3, 0, 0.2), 0 6px 20px rgba(0, 0, 0, 0.3);
            /* Sombra en los bordes */
            overflow: hidden;
            margin: 10px;
            transition: box-shadow 0.3s ease-in-out;
        }

        /* Sombra más intensa cuando la card está en hover */
        .card:hover {
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2), 0 8px 30px rgba(0, 0, 0, 0.1);
        }

        /* Estilo del encabezado de la card */
        .card-header {
            background-color: #fff;
            /* Color azul */
            color: white;
            padding: 15px;
            text-align: center;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }

        /* Estilo del cuerpo de la card */
        .card-body {
            padding: 20px;
            text-align: left;
            font-size: 16px;
            color: #333;
        }

        /* Estilo del pie de la card */
        .card-footer {
            padding: 10px;
            text-align: center;
            background-color: #f8f9fa;
            border-bottom-left-radius: 10px;
            border-bottom-right-radius: 10px;
        }

        /* Estilo del botón */
        .btn {
            background-color: #28a745;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
            transition: background-color 0.3s;
        }

        .btn:hover {
            background-color: #218838;
        }
    </style>


    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-12 grid-margin">
                    <div class="row">
                        <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                            <h3 class="font-weight-bold">Sistema Integral para Recursos Humanos</h3>
                            <h5 class="font-weight-normal mb-0">Usuarios</h5>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="card">
                    <div class="card-header">
                        <h3>Título de la Card</h3>
                    </div>
                    <div class="card-body">
                        <p>Este es el contenido de la card. Puedes cambiar el tamaño de la card mediante las
                            propiedades CSS.</p>
                    </div>
                </div>
            </div>

        </div>
    </div>


</x-app-layout>