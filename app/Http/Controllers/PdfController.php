<?php

namespace App\Http\Controllers;
require_once '../vendor/autoload.php';
use App\Certificado;
use Illuminate\Http\Request;

use App\Http\Controllers\MailController;

class PdfController extends Controller
{

    public function generaPDF($datos){

        $mpdf = new \Mpdf\Mpdf();
        $mpdf->WriteHTML('<h1>El Ayuntamiento de la oliva </h1>');
        $mpdf->WriteHTML('<h1>Certifica </h1>');
        $mensaje = 'Que ' .$datos['nombre'] . ' ' . $datos['apellidos'] . ' figura inscrito como residente en el vigente padrón municipal de habitantes de este Ayuntamiento. Y para que conste a los efectos oportunos emite este certificado a fecha ' . '' . $hoy = date("d.m.y") . '.';
        $mpdf->WriteHTML($mensaje);
        //$mpdf->Output();

        $mpdf->Output('pdf/'.$datos['id'].'.pdf', \Mpdf\Output\Destination::FILE);

        //Almacena certificado en la Base de datos

        $certificado = Certificado::find($datos['id']);
        $certificado->certificado = $datos['id'].'.pdf';
        $certificado->save();

        //Enviar por EMAIL
        $mail = new MailController();
        $mail->attachment_email($datos);
    }

}
