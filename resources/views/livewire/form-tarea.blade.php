<div>
    <link rel="stylesheet" href="css/menu_rigth.css" type="text/css" media="screen" title="no title" charset="utf-8">
<div class="contenido_form tarea_form">
        <div class="formulario">
            <div class="encabezado">
                <span>Tarea ID: {{$this->tarea_id}}</span>
                <span>Proyecto ID: {{$this->proyecto_id}}</span>
            </div>
            <label>Tiempo proyectado: <input type="number" value="" class="text" wire:model="tiempo_proyectado" name="tiempo_proyectado" id=""/> </label>
            <label>Detalle:<textarea wire:model="detalle" class="text" name="detalle" id=""></textarea> </label>
            <label>Usuario:
            <div><select name="usuario" wire:model="user_id" id="usuario">
                <option value=""></option>
                @foreach($usuarios as $user)
                    <option value="{{$user->idU}}">{{$user->email}}</option>
                @endforeach
            </select></div>

            </label>
            <button class="btn" wire:click="registrar_tarea">Ingresar</button>
            <button class="btn" wire:click="limpiar_form_tarea()">cancelar</button>

            <div class="mje_error">
               @error('tiempo_proyectado')
                    <span>{{$message}}</span>
               @enderror
               @error('detalle')
                    <span>{{$message}}</span>
               @enderror
            </div>

        </div>
    </div>

    <img src="img/list.png" onclick="ver_lista()" class="btn_ver_tareas" alt="">
    <img onclick="quitar_right()" src="img/arrow_back.png" alt="" class="btn_ocultar">
    <script src="js/app_run.js" charset="utf-8"></script>
</div>
