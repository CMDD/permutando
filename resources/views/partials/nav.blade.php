<nav class="navbar navbar-expand-lg navbar-dark">
                <a class="navbar-brand mx-3" href="#">Permutado</a>
                <button
                    class="navbar-toggler"
                    type="button"
                    data-toggle="collapse"
                    data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent"
                    aria-expanded="false"
                    aria-label="Toggle navigation"
                >
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div
                    id="navbarSupportedContent"
                    class="collapse navbar-collapse justify-content-end"
                >
                    <ul class="navbar-nav align-items-center">
                        <li class="nav-item">
                            <a class="nav-link" href="/">PRODUCTOS</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/">CLIENTES</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/">PARTNER Y SERVICIOS</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/contacto">CONTACTO</a>
                        </li>
                        @if(Auth::user())
                        <li class="nav-item dropdown">
                            <input
                                type="hidden"
                                id="userId"
                                value="{{Auth::User()->id}}"
                            />
                            <button
                                type="button"
                                class="btn nav-link mx-3 dropdown-toggle"
                                id="navbarDropdown"
                                role="button"
                                data-toggle="dropdown"
                                aria-haspopup="true"
                                aria-expanded="false"
                            >
                                {{Auth::User()->name}}
                            </button>
                            <div
                                class="dropdown-menu dropdown-menu-right mx-3"
                                aria-labelledby="navbarDropdown"
                            >
                                <a
                                    class="dropdown-item"
                                    href="/perfil-mis-publicaciones"
                                    >Perfil</a
                                >
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="/logout"
                                    >Cerrar sesión</a
                                >
                            </div>
                        </li>
                        @else
                        <li class="nav-item">
                            <button
                                type="button"
                                class="btn nav-link mx-3"
                                data-toggle="modal"
                                data-target="#loginModal2"
                            >
                                Iniciar sesión
                            </button>
                        </li>
                        @endif
                    </ul>
                </div>
            </nav>