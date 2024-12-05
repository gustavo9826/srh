<?php

namespace App\Http\Controllers\Letter\Report;
use App\Models\Letter\Letter\LetterM;
use setasign\Fpdi\Fpdi;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class ReporteCorrespondenciaC extends Controller
{
    public function generatePdf($id)
    {
        $LetterM = new LetterM();
        $data = $LetterM->getDataReport($id);

        $pdfPath = public_path('assets/documents/template-pdf/templateCorrespondencia.pdf'); // Ruta del archivo PDF existenteF
        $pdf = new Fpdi(); // Instancia de FPDI (requiere TCPDF)
        $pdf->setSourceFile($pdfPath); // Cargar la plantilla PDF existente
        $template = $pdf->importPage(1); // Importar la primera página del PDF existente
        $pdf->addPage(); // Agregar una página en blanco
        $pdf->useTemplate($template); // Usar la plantilla importada

        // Configurar la fuente para el texto
        $pdf->SetFont('Arial', '', 9);

        //DATA CODIGO
        $pdf->SetXY(31.9, 114.6); // Posición X, Y en el PDF
        $pdf->Write(0, $data->codigo);

        //DATA TRAMITE
        $pdf->SetXY(31.5, 109.2); // Posición X, Y en el PDF
        $pdf->Write(0, $data->tramite);

        //DATA AREA
        $pdf->SetXY(35, 95); // Posición X, Y en el PDF
        $pdf->Write(0, $data->area);

        //DATA COORDINACION
        $pdf->SetXY(35, 90); // Posición X, Y en el PDF
        $pdf->Write(0, $data->coordinacion);

        //DATA UNIDAD
        $pdf->SetXY(35, 85); // Posición X, Y en el PDF
        $pdf->Write(0, $data->unidad);

        //AÑO 
        $pdf->SetXY(147, 65); // Posición X, Y en el PDF
        $pdf->Write(0, $data->anio);

        //FECHA DE INICIO
        $pdf->SetXY(42, 59); // Posición X, Y en el PDF
        $pdf->Write(0, $data->fecha_inicio);

        //FECHA DE FIN 
        $pdf->SetXY(147, 59); // Posición X, Y en el PDF
        $pdf->Write(0, $data->fecha_fin);

        //DATA NUM TURNO
        $pdf->SetXY(42, 65); // Posición X, Y en el PDF
        $pdf->Write(0, $data->num_turno_sistema);

        //DATA NUM DOCUMENTO
        $pdf->SetXY(42, 71); // Posición X, Y en el PDF
        $pdf->Write(0, $data->num_documento);





        // Enviar el PDF generado al navegador
        return response($pdf->Output('I'), 200)
            ->header('Content-Type', 'application/pdf')
            ->header('Content-Disposition', 'inline; filename="pdf-modificado.pdf"');
    }
}
