<?php

namespace App\Http\Controllers\Report;
use setasign\Fpdi\Fpdi;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GeneratePdfC extends Controller
{
    public function generatePdf()
    {
        // Ruta del archivo PDF existente
        $pdfPath = public_path('assets/documents/template-pdf/templateCorrespondencia.pdf');

        // Instancia de FPDI (requiere TCPDF)
        $pdf = new Fpdi();

        // Cargar la plantilla PDF existente
        $pdf->setSourceFile($pdfPath);

        // Importar la primera página del PDF existente
        $template = $pdf->importPage(1);

        // Agregar una página en blanco
        $pdf->addPage();

        // Usar la plantilla importada
        $pdf->useTemplate($template);

        // Configurar la fuente para el texto
        $pdf->SetFont('Arial', 'B', 12);

        // Agregar texto a las posiciones deseadas en el PDF
        $pdf->SetXY(10, 100); // Posición X, Y en el PDF
        $pdf->Write(0, 'Texto agregado al PDF');

        $pdf->SetXY(50, 120);
        $pdf->Write(0, 'Otro texto dinamico');

        // Puedes seguir agregando más texto o contenido según lo necesites

        // Enviar el PDF generado al navegador
        return response($pdf->Output('I'), 200)
            ->header('Content-Type', 'application/pdf')
            ->header('Content-Disposition', 'inline; filename="pdf-modificado.pdf"');
    }
}
