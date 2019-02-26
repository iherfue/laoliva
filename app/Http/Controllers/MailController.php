<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Mail;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class MailController extends Controller {

    public function attachment_email($datos) {

        $datos = array('nombre'=>$datos['nombre'], 'id' => $datos['id'], 'email' => $datos['email']);
        $ruta = "/home/vagrant/code/certificados_la_oliva/public/pdf/".$datos['id'].'.pdf';
        $to = $datos['email'];

            Mail::send('certificado/mail', $datos, function($message) use($ruta,$to) {
                $message->to($to, 'Tutorials Point')->subject
                ('Usando laravel pruebas');
                $message->attach($ruta);

                $message->from('iherfuesecundario@gmail.com','Ayuntamiento la Oliva');
            });

            echo('<h2>Certificado generado y envíado correctamente</h2> <b>Pulse <a href="/index">Volver</a> Para regresar</b>');
    }
}