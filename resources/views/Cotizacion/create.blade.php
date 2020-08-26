@extends('layouts.app')

@section('body')
<div class="container">
    <div class="card">
        <div class="card-header">
            <strong>Crear Cotización</strong>
        </div>
        <div class="card-body">
        @include('flash::message')
            <form class="form-signin col-md-12" action="/cotizacion/guardar" method="POST" name="FrmCrearCotizacion">
            @csrf
                <div class="form-row" >
                    <div class="form-group col-md-3">
                        <label for="">Empresa</label>
                            <select id="IdEmpresa"  name= "IdEmpresa" class="form-control @error('IdEmpresa') is-invalid @enderror" >
                            <option selected>Seleccione una Empresa</option>
                            @foreach($empresa as $key =>$value)
                                <option value="{{ $value->id }}">{{ $value->nombre}}</option>
                            @endforeach

                        </select>
                        @error('IdEmpresa')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-3">
                        <label for="">Estado</label>
                        <select id="IdEstado"  name= "IdEstado" class="form-control @error('IdEstado') is-invalid @enderror">
                            {{-- <option value="0" >Seleccione un Estado</option> --}}
                            <option selected>Seleccione un Estado</option>
                            <option value="1">En Proceso</option>
                            <option value="2">Aceptada</option>
                            <option value="3">Perdida</option>
                        </select>
                        @error('IdEstado')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-3">
                        <label for="">Modalidad</label>
                        <select id="IdModalidad"  name= "IdModalidad" class="form-control @error('IdModalidad') is-invalid @enderror">
                            <option selected >Seleccione un Modalidad</option>
                            <option value="1">Semanal</option>
                            <option value="2">Mensual</option>
                        </select>
                        @error('IdModalidad')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-3">
                        <label for="">Etapa</label>
                        <select id="IdEtapa"  name= "IdEtapa" class="form-control @error('IdEtapa') is-invalid @enderror">
                                <option selected >Seleccione una Etapa</option>
                                <option value="1">Pilas</option>
                                <option value="2">Cimientos</option>

                        </select>
                        @error('IdEtapa')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-row" >
                    <div class="form-group col-md-3">
                        <label for="">Jornada</label>
                        <select id="IdJornada"  name= "IdJornada" class="form-control @error('IdJornada') is-invalid @enderror">
                                <option selected >Seleccione un Jornada</option>
                                <option value="1">Diurna</option>
                                <option value="2">Nocturna</option>

                        </select>
                        @error('IdJornada')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-3">
                        <label for="">Tipo de Concreto</label>
                        <select id="IdTipo_Concreto"  name= "IdTipo_Concreto" class="form-control @error('IdTipo_Concreto') is-invalid @enderror">
                            <option selected >Seleccione un tipo de concreto</option>
                            <option value="1">Arena</option>
                            <option value="2">Triturado</option>

                        </select>
                        @error('IdTipo_Concreto')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-3">
                        <label for="">Obra</label>
                        <select id="IdObra"  name= "IdObra" class="form-control @error('IdObra') is-invalid @enderror">
                                <option selected >Seleccione una Obra</option>
                                @foreach($obra as $key =>$value)
                                <option value="{{ $value->id }}">{{ $value->nombre}}</option>
                            @endforeach
                        </select>
                        @error('IdObra')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-3">
                        <label for="">Maquinaria</label>
                        <select id="IdMaquinaria"  name= "IdMaquinaria" class="form-control @error('IdMaquinaria') is-invalid @enderror">
                                <option selected >Seleccione una maquina</option>
                                <option value="1">Maquina 1</option>
                                <option value="2">Maquina 2</option>

                        </select>
                        @error('IdMaquinaria')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="">Operario</label>
                        <select id="IdOperario"  name= "IdOperario" class="form-control @error('IdOperario') is-invalid @enderror">
                                <option selected >Seleccione un Operario</option>
                                <option value="1">Operario 1</option>
                                <option value="2">Operario 2</option>

                        </select>
                        @error('IdOperario')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-3">
                        <label for="">Fecha de Cotización</label>
                        <input type="date" class="form-control @error('FechaCotizacion') is-invalid @enderror" id="FechaCotizacion" name="FechaCotizacion">
                        @error('FechaCotizacion')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-3">
                        <label for="">Fecha de Inicio Bombeo</label>
                        <input type="date" class="form-control @error('InicioBombeo') is-invalid @enderror" id="InicioBombeo" name="InicioBombeo" >
                        @error('InicioBombeo')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-3">
                        <label for="">Ciudad</label>
                        <input type="text" class="form-control @error('Ciudad') is-invalid @enderror" id="Ciudad" name="Ciudad">
                        @error('Ciudad')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="">Cantidad de losas</label>
                        <input type="text" class="form-control @error('Losas') is-invalid @enderror" id="Losas" name="Losas">
                        @error('Losas')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-3">
                        <label for="">Cantidad de tuberia</label>
                        <input type="text" class="form-control @error('Tuberia') is-invalid @enderror" id="Tuberia" name="Tuberia">
                        @error('Tuberia')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-3">
                        <label for="">Cantidad de metros<sup>3</sup></label>
                        <input type="text" class="form-control @error('MetrosCubicos') is-invalid @enderror" id="MetrosCubicos" name="MetrosCubicos">
                        @error('MetrosCubicos')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-3">
                        <label for="">Valor Metro <sup>3</sup></label>
                        <input type="text" class="form-control @error('ValorMetro') is-invalid @enderror  solo_numeros" id="ValorMetro" name="ValorMetro" >
                        @error('ValorMetro')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="">AIU</label>
                        <input type="text" class="form-control @error('AIU') is-invalid @enderror solo_numeros" id="AIU" name="AIU" >
                        @error('AIU')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-3">
                        <label for="">SubTotal</label>
                        <input type="text" class="form-control @error('Subtotal') is-invalid @enderror solo_numeros" id="Subtotal" name="Subtotal">
                        @error('Subtotal')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-3">
                        <label for="">IVA al AIU</label>
                        <input type="text" class="form-control @error('IvaAIU') is-invalid @enderror  solo_numeros" id="IvaAIU" name="IvaAIU">
                        @error('IvaAIU')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-3">
                        <label for="">Valor Total</label>
                        <input type="text" class="form-control @error('ValorTotal') is-invalid @enderror solo_numeros" id="ValorTotal" name="ValorTotal">
                        @error('ValorTotal')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                </div>

                <div class="mb-3">
                    <label for="validationTextarea">Observaciones</label>
                    <textarea class="form-control @error('Observaciones') is-invalid @enderror " id="Observaciones" name="Observaciones" placeholder="Ingresa las observaciones" ></textarea>
                    @error('Observaciones')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                </div>
                <button type="submit" class="btn btn-success float-left">Crear Cotizacion</button>
                <a href="/cotizacion" class="btn btn-outline-primary float-right" >Volver</a>
            </form>
        </div>
    </div>
</div>
<br>

</body>
@endsection
