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
        $pdf->SetFont('Arial', '', 10);

        //AÑO 
        $pdf->SetXY(163.9, 55.3); // Posición X, Y en el PDF
        $pdf->Write(0, $data->anio);

        //FECHA DE INICIO
        $pdf->SetXY(41.5, 54.8); // Posición X, Y en el PDF
        $pdf->Write(0, $data->fecha_inicio);

        //FECHA DE FIN 
        $pdf->SetXY(113, 55); // Posición X, Y en el PDF
        $pdf->Write(0, $data->fecha_fin);

        //DATA NUM TURNO
        $pdf->SetXY(38, 62.3); // Posición X, Y en el PDF
        $pdf->Write(0, $data->num_turno_sistema);

        //DATA NUM DOCUMENTO
        $pdf->SetXY(49, 70.2); // Posición X, Y en el PDF
        $pdf->Write(0, $data->num_documento);





        // Enviar el PDF generado al navegador
        return response($pdf->Output('I'), 200)
            ->header('Content-Type', 'application/pdf')
            ->header('Content-Disposition', 'inline; filename="pdf-modificado.pdf"');
    }
}
