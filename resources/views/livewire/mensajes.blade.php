<div>
  @if ($salida_mensaje != "")
    <div class="informe_accion">
        <span>{{$salida_mensaje}}</span>
        <button class="btn_list" wire:click="quitar_salida_mje">X</button>
    </div>
   @endif
   @if ($salida_error !="")
    <div class="informe_error">
        <span>{{$salida_error}}</span>
        <button class="btn_list" wire:click="quitar_salida_error">X</button>
    </div>
   @endif

</div>
