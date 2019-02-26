@extends('layouts.master')

@section('content')
<!---Tabla de Certificados-->
<div class="container"><br/>
    <table id="example" class="table table-striped text-center">
        <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>Certificado</th>
            <th>Acción</th>
            <th>Acción</th>
        </tr>

        @foreach($certificado as $s )
            <tr>
                <td>{{$s->id}}</td>
                <td>{{$s->nombre}}</td>
                <td>{{$s->apellidos}}</td>
                <td><a href="{{url('/pdf/'. $s->certificado)}}">{{$s->certificado}}</a></td>
                <td><a href="{{url('/certificado/edit/'.$s->id)}}">Editar</a></td>
                <td>
                    <a href="{{url('certificado/delete/'. $s->id)}}"><button type="submit" class="btn btn-danger" style="display:inline">
                       Borrar
                    </button>
                    </a>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
</div>

@endsection
