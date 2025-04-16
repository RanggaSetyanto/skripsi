<?php
use Dompdf\Dompdf;

function generatePDF($html, $filename = 'document.pdf')
{
    $dompdf = new Dompdf();
    $dompdf->loadHtml($html);
    $dompdf->setPaper('A4', 'portrait');
    $dompdf->render();
    $dompdf->stream($filename, ['Attachment' => false]);
}
