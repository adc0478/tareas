<div>
<!-- Formulario ingreso -->
<div class="contenido_form">
        <div class="formulario">
            <span>Proyecto ID: {{$id_proyecto}}</span>
            <span>Tipo usuario: {{$tipo}}</span>
            <input type="text" wire:model="detalle" class="text" placeholder="Indique nombre proyecto" value="" name="detalle" id=""/>
            <button class="btn" wire:click="registrar_proyecto">Ingresar</button>
        <div class="mje_error">
            @error('detalle')
                <span>{{$message}}</span>
            @enderror
        </div>
            @if($salida != "")
                <div class="mje_alerta">
                    <span>{{$salida}}</span>
                </div>
            @endif
        </div>
    </div>
<!-- lista proyectos -->

<!-- Modal carga usuario -->

</div>
