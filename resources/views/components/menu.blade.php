<div>
<div class="contenedor_menu">
            <div class="btn_menu">
            <div class="btn" onclick="ver_menu()">
                <div class="up"></div>
                <div class="down"></div>
            </div>
           </div>
       <ul>
           @if (Auth::check())
               <li><a class="linea_a" href="{{ route('login_out') }}">Cerrar session</a></li>
           @else

               <li><a class="linea_a" href="{{ route('login') }}">Ingresar</a></li>
           @endif
           @if (Auth::check())
               <li><a class="linea_a" href="{{route('proyecto')}}">Proyectos</a></li>
           @endif
           <li><a class="linea_a" href="">opt3</a></li>
           <li><a class="linea_a" href="">opt4</a></li>
       </ul>
   </div>


    <style type="text/css" media="screen">
    .btn_menu{
        display:none;
    }
    body{
        margin: 0;
        padding: 0;
    }
    .linea_a:hover::after{
        content: "";
        height: 2px;
        position: absolute;
        bottom: -5px;
        left: 0px;
        background-color: white;
        animation: subrayado;
        animation-fill-mode: forwards;
        animation-duration: 300ms;
    }
    @keyframes subrayado{
     from{
        width: 0px;
    }
    to{
        width: 100%;
    }
    }
    .contenedor_menu{
        width: 100%;
        background-color:rgba(51, 41, 92, 0.51);
        height: 40px;
        position: relative;
    }
    .contenedor_menu ul{
        width: 95%;
        height: 100%;
        margin: 0 auto;
        display: flex;
        flex-direction: row-reverse;
        gap:3%;
        text-align: center;
        list-style: none;
        padding: 0;
    }
    .contenedor_menu ul a{
        text-decoration: none;
        color:white;
        gap:1%;
        position: relative;
    }
    .contenedor_menu ul li{
        display:grid;
        align-items: center;
    }
 .btn{
    width: 30px;
    height: 30px;
    display: grid;
    border: 1px solid white;
    border-radius:5px;
    background-color: rgb(72, 94, 128);
    position: relative;
    justify-items: center;
    align-items: center;
}

.btn div{
    position: absolute;
    margin: 0;
    padding: 0;
    width: 80%;
    height: 80%;
    background-color: white;
    height: 2px;
}
.up{
    animation: up_vertical;
    animation-duration:1s;
    animation-fill-mode: forwards;
}
@keyframes up_vertical {
  to {
    transform: translateY(-5px);
  }
}
.down{
     animation: down_vertical;
    animation-duration:500ms;
    animation-fill-mode: forwards;
}
@keyframes down_vertical {
  to {
    transform: translateY(5px);
  }
}
.up_cross{
    animation: up_cross;
    animation-duration:1s;
    animation-fill-mode: forwards;
}
@keyframes up_cross{
   to{
     transform: rotate(45deg);
    }
}

.down_cross{
    animation: down_cross;
    animation-duration:1s;
    animation-fill-mode: forwards;
}
@keyframes down_cross{
   to{
     transform: rotate(-45deg);
    }
}





    @media screen and (max-width:768px){
        .btn_menu{
            cursor:pointer;
            display:grid;
            align-items: center;
            position: absolute;
            left: 3%;
            height: 40px;
        }
        .contenedor_menu{
            height:auto;
            min-height: 40px;
        }
        .contenedor_menu ul{
            flex-direction:column;
            height: auto;
            padding: 0%;
            display:none;
        }
        .contenedor_menu ul li{
            padding-top: 15px;
        }
        .contenedor_menu ul li a{
            width: auto;
            margin: 0 auto;
        }
    }
    </style>
    <script charset="utf-8">
        var flag_menu = 0;
    </script>
    <script charset="utf-8">
    function ver_menu(){
        if (flag_menu == 0){
            document.querySelector(".contenedor_menu ul").style.display = "block";
            document.querySelector(".up").setAttribute('class','up_cross');
            document.querySelector(".down").setAttribute('class','down_cross');
            flag_menu = 1;
        }else{
            document.querySelector(".contenedor_menu ul").style.display = "none";
            document.querySelector(".up_cross").setAttribute('class','up');
            document.querySelector(".down_cross").setAttribute('class','down');
            flag_menu = 0;
        }
    }
    </script>
</div>
