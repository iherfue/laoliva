@extends('layouts.master')

@section('content')

    {{'Que ' .$certificado->nombre . ' ' . $certificado->apellidos . ' figura inscrito como residente en el vigente padrón municipal de habitantes de este Ayuntamiento. Y para que conste a los efectos oportunos emite este certificado a fecha ' . '' . $hoy = date("d.m.y") . '.'}}
    <br/>
    <a href="{{url('/certificado/pdf/'.$certificado->id)}}"><button class="btn btn-primary" type="button">Generar PDF</button></a>
@endsection