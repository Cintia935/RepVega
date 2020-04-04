@extends('plantilla')
@section('content')
<style>
.uper {
    margin-top: 40px;
}


</style>
<div class="uper">
    @if(session()->get('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div><br />
    @endif
    <div class="row">
        <div class="col">
            <h1 class="animated rubberBand">Lista de funcionarios en casilla</h1>
        </div>
        <div class="col ml-5">
            <a href="{{ route('funcionariocasilla.create')}}"
                    class="btn btn-primary btn-block animated rubberBand">NUEVO REGISTRO</a></td>
        </div>
        <hr>
    </div>
    
    <table class="table animated fadeInUp">
        <thead>
            <tr>
            <th scope="col">ID</th>
            <th scope="col">FUNCIONARIO</th>
            <th scope="col">CASILLA</th>
            <th scope="col">ROL</th>
            <th scope="col">ELECCIÓN</th>
            <td colspan="2">Acciones</td>
            </tr>
        </thead>
        <tbody>

            <!-- RECORRIDO DE TABLA funcionariocasilla -->
            @foreach($funcionarioscasilla as $funcionariocasilla)
                <!-- RECORRIDO DE TABLA funcionario para estetica web -->
                @foreach($funcionarios as $funcionario)
                    @if($funcionariocasilla->funcionario_id === $funcionario->id)
                        @php ($nombre = $funcionario->nombrecompleto)
                        @break;
                    @endif
                @endforeach

                <!-- RECORRIDO DE TABLA casilla para estetica web -->
                @foreach($casillas as $casilla)
                    @if($funcionariocasilla->casilla_id === $casilla->id)
                        @php($lacasilla = $casilla->ubicacion)
                        @break;
                    @endif
                @endforeach

                <!-- RECORRIDO DE TABLA rol para estetica web -->
                @foreach($roles as $rol)
                    @if($funcionariocasilla->rol_id === $rol->id)
                        @php($elrol = $rol->descripcion)
                        @break;
                    @endif
                @endforeach

                <!-- RECORRIDO DE TABLA eleccion para estetica web -->
                @foreach($elecciones as $eleccion)
                    @if($funcionariocasilla->eleccion_id === $eleccion->id)
                        @php($laeleccion = $eleccion->periodo)
                        @break;
                    @endif
                @endforeach
            

            <tr>
                <td>{{$funcionariocasilla->id}}</td>
                <td>{{$nombre}}</td>
                <td>{{$lacasilla}}</td>
                <td>{{$elrol}}</td>
                <td>{{$laeleccion}}</td>
                <td><a href="{{ route('funcionariocasilla.edit', $funcionariocasilla->id)}}"
                class="btn btn-primary">Editar</a></td>
                <td>
                    <form action="{{ route('funcionariocasilla.destroy', $funcionariocasilla->id)}}"
                    method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit"
                        onclick="return confirm('Esta seguro de borrar {{$nombre}}')">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div>
    @endsection
