@extends('layouts.master')

@section('content')

    <div class="row" style="margin-top:40px">
        <div class="offset-md-3 col-md-6">
            <div class="card">
                <div class="card-header text-center">
                    Editar Certificado
                </div>
                <div class="card-body" style="padding:30px">

                    <form method="POST"  action="{{action('CertificadoController@update', $certificado->id)}}" enctype="multipart/form-data">
                        @csrf
                        {{ method_field('PUT')}}
                        <div class="form-group">
                            <label for="title">Nombre</label>
                            <input type="text" name="nombre" id="nombre" class="form-control" value="{{$certificado->nombre}}">
                        </div>

                        <div class="form-group">
                            <label for="url">Apellidos</label>
                            <input type="text" name="apellidos" class="form-control" value="{{$certificado->apellidos}}">
                        </div>

                        <div class="form-group">
                            <label for="url">Certificado</label>
                            <input type="file" name="certificado" class="form-control" value="{{$certificado->certificado}}">
                        </div>

                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary" style="padding:8px 100px;margin-top:25px;">
                                Editar Certificado
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@stop
