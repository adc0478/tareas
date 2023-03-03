<div>
    <div class="contenido_form">
        <div class="formulario">

            <input type="email" autocomplete="new-email" value=""  placeholder="Ingresar ususario" wire:model="mail" class="text" name="mail" id="email"/>
            <input type="password" autocomplete="new-password" value="" placeholder="Ingresar password"  wire:model="pass" class="text" name="pass" id="password"/>
            <button class="btn" wire:click="logear">Ingresar</button>
        <div class="mje_error">
            @error('mail')
                <span>{{$message}}</span>
            @enderror
            @error('pass')
                <span>{{$message}}</span>
            @enderror
        </div>
            @if($salida != "")
                <div class="mje_alerta">
                    <span>{{$salida}}</span>
                </div>
            @endif
        <a class="linea_a" href="{{ route('registro') }}">Registrar nuevo usuario</a>

        </div>
    </div>
</div>
