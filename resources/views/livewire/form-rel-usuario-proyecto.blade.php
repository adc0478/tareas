<div>
    <div class="contenido">
       <!--Lista usuarios del sistema -->
       <table class="tabla">
          <tr>
              <th>ID</th>
              <th>Mail</th>
              <th></th>
          </tr>
          <tr>
                @foreach($lista_usuario as $user)
                  <td>{{$user->id}}</td>
                  <td>{{$user->email}}</td>
                  <td> <button class="btn_list" wire:click="ingresar_usuario('{{$user->id}}')">-></button> </td>
                @endforeach
          </tr>
       </table>

       <!--Lista usuarios ya ingresados al proyecto -->
       <table class="tabla">
            <tr>
                <th></th>
                <th>ID</th>
                <th>Usuario</th>
                <th>Mail</th>
                <th>Tipo</th>
            </tr>
            @foreach($usuarios_activos as $activo)
                 <tr>
                    <td> <button class="btn_list" wire:click="quitar_usuario('{{$activo->id}}')"><-</button> </td>
                    <td>{{$activo->id}}</td>
                    <td>{{$activo->idU}}</td>
                    <td>{{$activo->Mail}}</td>
                    <td>{{$activo->tipo}}</td>
                </tr>

            @endforeach
                   </table>
    </div>
</div>
