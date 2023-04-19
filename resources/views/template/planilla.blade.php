<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width" />
        <title>@yield('titulo')</title>
        <link rel="stylesheet" href="css/formularios.css" type="text/css" media="screen" title="no title" charset="utf-8">
        <link rel="stylesheet" href="css/mensaje.css" type="text/css" media="screen" title="no title" charset="utf-8">
        @livewireStyles
    </head>
    <body>
        <x-menu/>
        @yield('contenido')

    </body>
    @livewireScripts
</html>
