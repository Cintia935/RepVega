@extends('plantilla')
@section('content')
<style>
.uper {
    margin-top: 40px;
}
</style>
<div class="card uper animated fadeInUp">
    <div class="card-header">
        Agregar Voto
    </div>
    <div class="card-body">
        
        <form method="post" action="{{ route('voto.store') }} " enctype="multipart/form-data">
            {{ csrf_field() }}

            <div class="form-group">
                @csrf
                <label for="eleccion_id">Elige el periodo de la eleccion:</label>
                <select id="eleccion_id" class="form-group" name="eleccion_id" >
                    <optgroup label="Periodos">
                    @foreach($elecciones as $eleccion)
                        <option for="eleccion_id" class="form-group" label="{{$eleccion->periodo}}" name="eleccion_id">{{$eleccion->id}}</option>
                    @endforeach
                    </optgroup>
                </select>
            </div>
            


            <div class="form-group">
                @csrf
                <label for="casilla_id">Elige la casilla:</label>
                <select id="casilla_id" class="form-group" name="casilla_id" >
                    <optgroup label="Casillas">
                    @foreach($casillas as $casilla)
                        <option for="casilla_id" class="form-group" label="{{$casilla->ubicacion}}" name="casilla_id">{{$casilla->id}}</option>
                    @endforeach
                    </optgroup>
                </select>
            </div>

            {{ csrf_field() }}
            <div class="form-group">
                @csrf
                <label for="evidencia">Evidencia:</label>
                <input type="text" class="form-control" name="evidencia" />
            </div>

            <button type="submit" class="btn btn-info">Guardar</button>
        </form>
    </div>
</div>
@endsection
