<div>
 <div class="contenido_form">
    <div class="formulario">
       <input type="text" class="text" value="" name="nombre" placeholder="Ingrese su nombre y apellido" wire:model="nombre" id="nombre"/>
       <input type="email" autocomplete="new-email" class="text" value="" placeholder="Ingrese el email" wire:model="mail" name="email" id=""/>
       <input type="password" autocomplete="new-password" class="text" value="" placeholder="Ingrese el password" wire:model="pass" name="password" id="password"/>
       <input type="password" class="text" value="" placeholder="ingrese nuevamente el password" name="password_2" wire:model="pass2" id="password"/>
       <button class="btn" wire:click="registro_user">Ingresar</button>
    <div class="mje_error">
        @error('nombre')
            <span>{{$message}}</span>
        @enderror
        @error('mail')
            <span>{{$message}}</span>
        @enderror
        @error('pass')
            <span>{{$message}}</span>
        @enderror
    </div>
    @if($salida !="")
    <div class="mje_alerta">
       <span>{{$salida}}</span>
    </div>
    @endif
    </div>
</div>
</div>
