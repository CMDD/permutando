<div id="loginModal2" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div id="accordionLogin" class="modal-body accordion">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div class="card">
                    <div id="headRegister" class="card-header" data-toggle="collapse" data-target="#register" aria-expanded="true" aria-controls="register">
                        Regístrate para ver y publicar ofertas
                    </div>
                    <div id="register" class="collapse show" aria-labelledby="headRegister" data-parent="#accordionLogin">
                        <div class="card-body">
                            <form method="POST" action="{{url('registro')}}">
                                {!!csrf_field()!!}
                                <a href="#" class="btn fb">Iniciar sesión con Facebook</a>
                                <a href="#" class="btn gl">Iniciar sesión con Google</a>
                                <input type="text" required name="name" class="form-control mb-2" placeholder="Nombre">
                                <!--<input type="text" name="tel" class="form-control mb-3" placeholder="Tel/Cel">-->
                                <input type="email" required  name="email" class="form-control mb-2" placeholder="Correo electrónico">
                                <input type="password" required name="password" class="form-control mb-2" placeholder="Contraseña">
                                <input type="hidden"  name="web" value="si">
                                <div class="tipo">
                                    <span>¿Eres inmobiliario?</span>
                                    <div class="radio-custom">
                                        <label>
                                            <input type="radio" name="inmobiliario" value="Si">
                                            <span class="checkmark">Si</span>
                                        </label>
                                        <label>
                                            <input type="radio" name="inmobiliario" value="No">
                                            <span class="checkmark">No</span>
                                        </label>
                                    </div>
                                </div>
                                <button type="submit" class="btn">Regístrate</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div id="headLogin" class="card-header" data-toggle="collapse" data-target="#login" aria-expanded="true" aria-controls="login">
                        ¿Tienes una cuenta? <span>Entrar</span>
                    </div>
                    <div id="login" class="collapse" aria-labelledby="headLogin" data-parent="#accordionLogin">
                        <div class="card-body">
                            <form action="autenticar" method="POST">
                                {!!csrf_field()!!}
                                <a href="#" class="btn fb">Iniciar sesión con Facebook</a>
                                <a href="#" class="btn gl">Iniciar sesión con Google</a>
                                <input type="email" required name="email" class="form-control mb-2" placeholder="Correo electrónico">
                                <input type="password" required name="password" class="form-control mb-2" placeholder="Contraseña">
                                <input type="hidden"  name="web" value="si">
                                <button type="submit" class="btn">Iniciar sesión</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

