<?php

namespace App\Http\Controllers;

use App\Certificado;
use App\Http\Controllers\PdfController;
use http\Env\Response;
use App\Http\Controllers\MailController;
use Illuminate\Http\Request;


class CertificadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(){

        $this->middleware('auth');
    }

    public function index()
    {
        $certificado = Certificado::all();

        return view('certificado/index', array('certificado' => $certificado));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('certificado/add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
           'nombre' => 'required',
           'apellidos' => 'required',
            'file' => 'required'
        ]);

        $certificado = new Certificado();

        if($request->hasFile('file')) {

            $fichero = $request->file('file');
            $certificado->certificado = $fichero->getClientOriginalName();
            $fichero->storeAs('pdf',$certificado->certificado);
        }

        $certificado->nombre = $request->input('nombre');
        $certificado->apellidos = $request->input('apellidos');
        $certificado->save();

        return redirect('/index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Certificado  $certificado
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $certificado = Certificado::find($id);

        return view('certificado/delete', array('certificado' => $certificado));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Certificado  $certificado
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $certificado = Certificado::find($id);

        return view('certificado/edit',array('certificado' => $certificado));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Certificado  $certificado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Certificado $certificado,$id)
    {
        $certificado = Certificado::find($id);
        $certificado->nombre = $request->nombre;
        $certificado->apellidos = $request->apellidos;
        $certificado->save();

        return redirect('/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Certificado  $certificado
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $certificado = Certificado::findOrFail($id);
        $certificado->delete();

        return redirect('/index');
    }

    public function generateView(){

        return view('certificado/viewGenerate');
    }

    public function generate(Request $request){

        $this->validate($request,[
            'nombre' => 'required',
            'apellidos' => 'required'
        ]);

        $certificado = new Certificado();

        $certificado->nombre = $request->input('nombre');
        $certificado->apellidos = $request->input('apellidos');
        $certificado->email = $request->input('email');
        $nombre = $request->input('nombre');
        $apellidos = $request->input('apellidos');

        $certificado->save();

        //Almacena datos en PDF
      //  $pdf = new PdfController();
//        $pdf->generaPDF($certificado);
     //   return redirect()->action('CertificadoController@pdf', array('id' => $certificado));
          return redirect()->action('CertificadoController@VistaPrevia', array('id' => $certificado));
    }

    public function VistaPrevia($id){

        $c = Certificado::find($id);

        return view('certificado/vistaPrevia', array('certificado' => $c));
    }

    public function pdf($id){

        $c = Certificado::find($id);

        $array = array('nombre' => $c->nombre, 'apellidos' => $c->apellidos,'id' => $c->id, 'email' => $c->email);

        $pdf = new PdfController();
        $pdf->generaPDF($array);
    }
}
