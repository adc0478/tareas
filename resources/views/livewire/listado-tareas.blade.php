<div>
    <link rel="stylesheet" href="css/lista_tarea.css" type="text/css" media="screen" title="no title" charset="utf-8">
 <table class="tabla tabla_grande">
    <tr>
        <th>id</th>
        <th>usuario</th>
        <th>Tarea</th>
        <th>Acciones</th>
    </tr>
    @foreach($this->lista as $lista)
        <tr class="tr_list">
            <td>{{$lista['id']}}</td>
            <td>{{$lista['email']}}</td>
            <td>{{$lista['descripcion']}}</td>
            <td>
                <div class="grupo">
                   @if($lista['accu'])
                      <img src="img/alarm.png" alt="">
                      <img src="img/stop.png" wire:click="contador({{$lista['id']}},{{$lista['proyecto_id']}})">
                    @else
                      <img src="img/play.png" wire:click="contador({{$lista['id']}},{{$lista['proyecto_id']}})">
                      <img src="img/delete.png" wire:click="eliminar({{$lista['id']}},{{$lista['proyecto_id']}})">
                      <img src="img/edit.png" wire:click="editar({{$lista['id']}},{{$lista['proyecto_id']}})">
                    @endif
                </div>
            </td>
        </tr>
    @endforeach
 </table>
</div>
    <img onclick="quitar_lista()" src="img/arrow_back.png" alt="" class="btn_ocultar">
