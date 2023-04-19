<div>
<!-- Formulario ingreso -->
<div class="contenido_form">
        <div class="formulario">
            <span>Proyecto ID: {{$id_proyecto}}</span>
            <input type="text" wire:model="detalle" class="text" placeholder="Indique nombre proyecto" value="" name="detalle" id=""/>
            <button class="btn" wire:click="registrar_proyecto">Ingresar</button>
            <button class="btn" wire:click="limpiar_form_proyecto()">Cancelar</button>
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
<div>
    <table class="tabla">
        <tr>
            <th>Nombre proyecto</th>
            <th></th>
        </tr>
        @foreach($lista_proyectos as $lista)
         <tr class="tr_list">
             <td>{{$lista->detalle}}</td>
             <td>
                 <button class="btn_list" wire:click="editar('{{$lista->proyecto_id}}','{{$lista->detalle}}')">E</button>
                 <button class="btn_list" wire:click="eliminar('{{$lista->proyecto_id}}','{{$lista->detalle}}')">D</button>
             </td>

         </tr>
        @endforeach
    </table>
</div>

@if ($id_proyecto != "")
    <img onclick="ver_right()" src="img/list.png" alt="" class="btn_ver_tareas">
    <img onclick="ver_left()" src="img/user.png" alt="" class="btn_ver">
@endif
<!-- Modal carga usuario -->
</div>
