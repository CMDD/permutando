<div class="col-12 col-md-4 col-lg-3 col-xl-2 sidebar">
    <span class="close-menu">&times;</span>
    <a class="logo" href="/">
        <img src="/img/perfil-logo.png" />
    </a>
    <div class="user">
        <input
            type="hidden"
            id="userId"
            value="{{Auth::User()->id}}"
        />
       {{Auth::User()->name}}
    </div>
    <ul class="menu">
        <!-- <li><a href="#">Perfil</a></li> -->
        <!-- <li><a href="#">Mis inmuebles favoritos</a></li> -->
        <!-- <li><a href="#">Mis inmuebles contactados</a></li> -->
        <li><a href="/perfil-publicar">Publicar Inmueble</a>
            <!-- <ul>
                <li><a href="/perfil-publicar">Casa</a></li>
                <li><a href="/perfil-publicar">Apartamento</a></li>
                <li><a href="/perfil-publicar-oficina">Oficina</a></li>
                <li><a href="#">Bodega</a></li>
            </ul> -->
        </li>
        <li><a href="/perfil-buscar">Buscar Inmueble</a>
            <!-- <ul>
                <li><a href="/perfil-publicar">Casa</a></li>
                <li><a href="/perfil-publicar">Apartamento</a></li>
                <li><a href="/perfil-publicar-oficina">Oficina</a></li>
                <li><a href="#">Bodega</a></li>
            </ul> -->
        </li>
        <li>
                <a href="/perfil-mis-publicaciones" class="">Mis publicaciones</a>
            </li>
        {{-- <li>
            <a href="/perfil-mis-publicaciones" class="">Mis inmuebles contactados</a>
        </li> --}}
        <li><a href="/perfil-mensajes">Mis mensajes</a></li>
        
        <!-- <li><a href="#">Mis alertas</a></li>
        <li><a href="#">Crear Alertas</a></li> -->
        <li>
            <a href="/logout" class="">Cerrar sesión</a>
        </li>
    </ul>
</div>
