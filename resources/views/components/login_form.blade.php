<div class="contenido_form">
    <form action="{{ route('login_action') }}" method="post" accept-charset="utf-8">
       <input type="email" autocomplete="new-email" value=""  placeholder="Ingresar ususario" class="text" name="mail" id="email"/>
       <input type="password" autocomplete="new-password" value="" placeholder="Ingresar password"  class="text" name="pass" id="password"/>
       <input class="btn" type="submit" value="Ingresar" />
       @csrf
    </form>
     <div>
        @error('mail')
            <span>{{$message}}</span>
        @enderror
        @error('pass')
            <span>{{$message}}</span>
        @enderror
     </div>
    <a href="{{ route('registro') }}">Registrar nuevo usuario</a>
</div>
