@extends('layouts.master')

@section('content')

    <div class="row" style="margin-top:40px">
        <div class="offset-md-3 col-md-6">
            <div class="card">
                <div class="card-header text-center">
                    {{__('Crear certificado')}}
                </div>
                <div class="card-body" style="padding:30px">

                    <form method="POST" action="{{url('/certificado/generate')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">{{__('Nombre')}}</label>
                            <input type="text" name="nombre" id="nombre" class="form-control" value="{{ old('nombre' )}}">
                            {!!$errors->first('nombre', '<small>:message</small><br>')!!}
                        </div>

                        <div class="form-group">
                            <label for="name">{{__('Apellidos')}}</label>
                            <input type="text" name="apellidos" id="apellidos" class="form-control" value="{{ old('apellidos' )}}">
                            {!!$errors->first('apellidos', '<small>:message</small><br>')!!}
                        </div>

                        <div class="form-group">
                            <label for="name">{{__('Email')}}</label>
                            <input type="email" name="email" id="email" class="form-control" value="{{ old('email' )}}">
                            {!!$errors->first('email', '<small>:message</small><br>')!!}
                        </div>

                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary" style="padding:8px 100px;margin-top:25px;">
                                {{__('Generar certificado')}}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@stop
