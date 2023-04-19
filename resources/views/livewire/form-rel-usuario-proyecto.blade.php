<div>
    <link rel="stylesheet" href="css/menu_left.css" type="text/css" media="screen" title="no title" charset="utf-8">
    <div class="contenido">
       @if ($info !="")
        <div class="mje_alerta">
           <span>{{$info}}</span>
        </div>
       @endif
       <!--Lista usuarios del sistema -->
       <table class="tabla">
          <tr>
              <th>ID</th>
              <th>Mail</th>
              <th></th>
          </tr>
          @foreach($lista_usuario as $user)
              <tr>
                  <td>{{$user->id}}</td>
                  <td>{{$user->email}}</td>
                  <td> <img src="img/arrow_forward.png" wire:click="ingresar_usuario('{{$user->id}}')" alt="ingresar"> </td>
              </tr>
          @endforeach
       </table>

       <!--Lista usuarios ya ingresados al proyecto -->
       <table class="tabla">
            <tr>
                <th></th>
                <th>Mail</th>
                <th>Tipo</th>
            </tr>
            @foreach($usuarios_activos as $activo)
                 <tr>
                    <td><img src="img/arrow_back.png"  wire:click="quitar_usuario('{{$activo->id}}')" alt="ingresar"> </td>

                    <td>{{$activo->email}}</td>
                    <td>{{$activo->tipo}}</td>
                </tr>

            @endforeach
                   </table>
    </div>
    <img onclick="quitar_left()" src="img/arrow_back.png" alt="" class="btn_ocultar">
    <script src="js/app_run.js" charset="utf-8"></script>
</div>
