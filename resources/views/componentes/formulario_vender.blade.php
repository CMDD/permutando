<form role="form" @submit.prevent="storeInmueble" class="f1">

    <div class="f1-steps">
        <div class="f1-progress">
            <div class="f1-progress-line" data-now-value="16.66" data-number-of-steps="3" style="width: 16.66%;"></div>
        </div>
        <div class="f1-step active">
            <div class="f1-step-icon">1</div>
        </div>
        <div class="f1-step">
            <div class="f1-step-icon">2</div>
        </div>
        <div class="f1-step">
            <div class="f1-step-icon">3</div>
        </div>
    </div>

    <fieldset>
        <h4>Casa en venta</h4>
        <div class="form-group">
            <div class="form-field">
                <div class="my-text">
                    <span>Area mts<sup>2</sup></span>
                    <input v-model="form.area" type="text" name="area">
                </div>
            </div>
            <div class="form-field">
                <div class="my-select">
                    <span>Habitaciones</span>
                    <select v-model="form.habitaciones">
                        <option >--</option>
                        <option value="1" >1</option>
                        <option value="2" >2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </div>
            </div>
            <div class="form-field">
                <div class="my-select">
                    <span>Baños</span>
                    <select v-model="form.banos">
                        <option>--</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </div>
            </div>
            <div class="form-field">
                <div class="my-radio">
                    <span>Balcón</span>
                    <input type="radio" v-model="form.balcon" value="true" id="balcon_1"><label for="balcon_1">Si</label>
                    <input type="radio" v-model="form.balcon" value="false" id="balcon_0" checked><label for="balcon_0" class="no">No</label>
                </div>
            </div>
            <div class="form-field">
                <div class="my-radio">
                    <span>Terraza</span>
                    <input type="radio" v-model="form.terraza" value="true" id="terraza_1"><label for="terraza_1">Si</label>
                    <input type="radio" v-model="form.terraza" value="false" id="terraza_0" checked><label for="terraza_0" class="no">No</label>
                </div>
            </div>
            <div class="form-field">
                <div class="my-radio">
                    <span>Portería</span>
                    <input type="radio" v-model="form.porteria" value="12h" id="porteria_12"><label for="porteria_12">12H</label>
                    <input type="radio" v-model="form.porteria" value="24h"id="porteria_24" checked><label for="porteria_24">24H</label>
                    <input type="radio" v-model="form.porteria" value="no" id="porteria_0" checked><label for="porteria_0" class="no">No</label>
                </div>
            </div>
            <div class="form-field">
                <div class="my-radio">
                    <span>Parqueadero</span>
                    <input type="radio" v-model="form.parqueadero" value="true" id="parqueadero_1"><label for="parqueadero_1">Si</label>
                    <input type="radio" v-model="form.parqueadero" value="false" id="parqueadero_0" checked><label for="parqueadero_0" class="no">No</label>
                </div>
            </div>
            <div class="form-field w2">
                <div class="my-checkbox">
                    <span>Zonas Comunes</span>
                    <div class="form-col">
                        <input type="checkbox" v-model="form.zonas" value="Gimnasio" id="zonas_1"><label for="zonas_1">Gimnasio</label>
                        <input type="checkbox" v-model="form.zonas" value="BBQ" id="zonas_2"><label for="zonas_2">BBQ</label>
                        <input type="checkbox" v-model="form.zonas" value="Salón comunal" id="zonas_3"><label for="zonas_3">Salón comunal</label>
                    </div>
                    <div class="form-col">
                        <input type="checkbox" v-model="form.zonas" value="Zona húmeda" id="zonas_4"><label for="zonas_4">Zona húmeda</label>
                        <input type="checkbox" v-model="form.zonas" value="Parques para niños" id="zonas_5"><label for="zonas_5">Parques para niños</label>
                    </div>
                </div>
            </div>
            <div class="form-field w50">
                <div class="my-select">
                    <span>Departamento</span>
                    <select v-model="form.banos">
                        <option>Cundinamarca</option>
                    </select>
                </div>
            </div>
            <div class="form-field w50">
                <div class="my-select">
                    <span>Ciudad</span>
                    <select v-model="form.banos">
                        <option>--</option>
                    </select>
                </div>
            </div>
            <div class="form-field w50">
                <div class="my-text">
                    <span>Barrio</span>
                    <input v-model="form.area" type="text" name="area">
                </div>
            </div>
            <div class="form-field w50">
                <div class="my-text">
                    <span>Dirección</span>
                    <input v-model="form.area" type="text" name="area">
                </div>
            </div>
            <div class="form-field w50">
                <div class="my-text">
                    <span>Estrato</span>
                    <input v-model="form.area" type="text" name="area">
                </div>
            </div>
            <textarea v-model="form.caracteristica" placeholder="Otras características"></textarea>
            <div class="form-field value">
                <span>Valor: $</span>
                <input type="text" v-model="form.valor">
            </div>
        </div>
        <div class="f1-buttons">
            <button type="button" class="btn btn-next">Siguiente</button>
        </div>
    </fieldset>

    <fieldset>
        <h4>Entorno del inmueble</h4>
        <div class="form-group list">
            <div class="form-field">
                <span>Transporte</span>
                <div class="my-checkbox">
                    <input type="checkbox" v-model="form.transporte" value="Transmilenio" id="transporte_1"><label for="transporte_1">Transmilenio</label>
                    <input type="checkbox" v-model="form.transporte" value="Paradero SITP" id="transporte_2"><label for="transporte_2">Paradero SITP</label>
                    <input type="checkbox" v-model="form.transporte" value="Ciclorutas" id="transporte_3"><label for="transporte_3">Ciclorutas</label>
                    <input type="checkbox" v-model="form.transporte" value="Parqueaderos" id="transporte_4"><label for="transporte_4">Parqueaderos</label>
                    <input type="checkbox" v-model="form.transporte" value="Gasolineras" id="transporte_5"><label for="transporte_5">Gasolineras</label>
                    <input type="checkbox" v-model="form.transporte" value="Alimentadores" id="transporte_6"><label for="transporte_6">Alimentadores</label>
                    <input type="checkbox" v-model="form.transporte" value="Buses intermunicipales" id="transporte_7"><label for="transporte_7">Buses intermunicipales</label>
                </div>
            </div>
            <div class="form-field">
                <span>Víveres</span>
                <div class="my-checkbox">
                    <input type="checkbox" v-model="form.viveres" value="Tienda de barrio" id="viveres_1"><label for="viveres_1">Tienda de barrio</label>
                    <input type="checkbox" v-model="form.viveres" value="Panadería" id="viveres_2"><label for="viveres_2">Panadería</label>
                    <input type="checkbox" v-model="form.viveres" value="Fruterías" id="viveres_3"><label for="viveres_3">Fruterías</label>
                    <input type="checkbox" v-model="form.viveres" value="Plaza de mercado" id="viveres_4"><label for="viveres_4">Plaza de mercado</label>
                    <input type="checkbox" v-model="form.viveres" value="Mercado de frutas y verduras" id="viveres_5"><label for="viveres_5">Mercado de frutas y verduras</label>
                    <input type="checkbox" v-model="form.viveres" value="Supermercados" id="viveres_6"><label for="viveres_6">Supermercados</label>
                </div>
            </div>
            <div class="form-field">
                <span>Bienestar</span>
                <div class="my-checkbox">
                    <input type="checkbox" v-model="form.bienestar" value="Gimnasios" id="bienestar_1"><label for="bienestar_1">Gimnasios</label>
                    <input type="checkbox" v-model="form.bienestar" value="Centro de Yoga" id="bienestar_2"><label for="bienestar_2">Centro de Yoga</label>
                    <input type="checkbox" v-model="form.bienestar" value="Ciclovía" id="bienestar_3"><label for="bienestar_3">Ciclovía</label>
                    <input type="checkbox" v-model="form.bienestar" value="Parques" id="bienestar_4"><label for="bienestar_4">Parques</label>
                    <input type="checkbox" v-model="form.bienestar" value="Hospitales" id="bienestar_5"><label for="bienestar_5">Hospitales</label>
                    <input type="checkbox" v-model="form.bienestar" value="Clínicas" id="bienestar_6"><label for="bienestar_6">Clínicas</label>
                    <input type="checkbox" v-model="form.bienestar" value="Iglesias" id="bienestar_7"><label for="bienestar_7">Iglesias</label>
                </div>
            </div>
            <div class="form-field">
                <span>Entretenimiento</span>
                <div class="my-checkbox">
                    <input type="checkbox" v-model="form.entretenimiento" value="Centros comerciales" id="entrenimiento_1"><label for="entrenimiento_1">Centros comerciales</label>
                    <input type="checkbox" v-model="form.entretenimiento" value="Teatros" id="entrenimiento_2"><label for="entrenimiento_2">Teatros</label>
                    <input type="checkbox" v-model="form.entretenimiento" value="Cines" id="entrenimiento_3"><label for="entrenimiento_3">Cines</label>
                    <input type="checkbox" v-model="form.entretenimiento" value="Bares" id="entrenimiento_4"><label for="entrenimiento_4">Bares</label>
                    <input type="checkbox" v-model="form.entretenimiento" value="Discotecas" id="entrenimiento_5"><label for="entrenimiento_5">Discotecas</label>
                    <input type="checkbox" v-model="form.entretenimiento" value="Museos" id="entrenimiento_6"><label for="entrenimiento_6">Museos</label>
                </div>
            </div>
            <div class="form-field">
                <span>Educativo</span>
                <div class="my-checkbox">
                    <input type="checkbox" v-model="form.educativo" value="Jardines" id="educativo_1"><label for="educativo_1">Jardines</label>
                    <input type="checkbox" v-model="form.educativo" value="Colegios" id="educativo_2"><label for="educativo_2">Colegios</label>
                    <input type="checkbox" v-model="form.educativo" value="Universidades" id="educativo_3"><label for="educativo_3">Universidades</label>
                </div>
            </div>
            <div class="form-field">
                <span>Gastronomía</span>
                <div class="my-checkbox">
                    <input type="checkbox" v-model="form.gastronomia" value="Restaurantes" id="gastronomia_1"><label for="gastronomia_1">Restaurantes</label>
                    <input type="checkbox" v-model="form.gastronomia" value="Cafés" id="gastronomia_2"><label for="gastronomia_2">Cafés</label>
                </div>
            </div>
            <div class="form-field">
                <span>Mascotas</span>
                <div class="my-checkbox">
                    <input type="checkbox" v-model="form.mascotas"  value="Veterinarias" id="mascotas_1"><label for="mascotas_1">Veterinarias</label>
                    <input type="checkbox" v-model="form.mascotas"  value="Guarderias" id="mascotas_2"><label for="mascotas_2">Guarderias</label>
                    <input type="checkbox" v-model="form.mascotas"  value="Paseadores de perros" id="mascotas_3"><label for="mascotas_3">Paseadores de perros</label>
                    <input type="checkbox" v-model="form.mascotas"  value="Tienda para mascotas" id="mascotas_4"><label for="mascotas_4">Tienda para mascotas</label>
                </div>
            </div>
        </div>
        <div class="f1-buttons">
            <button type="button" class="btn btn-prev">Anterior</button>
            <button type="button" class="btn btn-next">Siguiente</button>
        </div>
    </fieldset>

    <fieldset>
        <h4>Más información</h4>
        <div class="form-group more">
            <div class="form-field">
                <span>Más información</span>
                <textarea v-model="form.mas_informacion" placeholder="¿Cúal?"></textarea>
            </div>
            <div class="form-field">
                <span>Imágenes</span>
                <div class="image">
                    <input type="file" id="file" ref="file" @change="img"  class="inputfile" />
                    <label for="file">Subir imagen</label>
                </div>
            </div>
        </div>
        <div class="f1-buttons">
            <button type="button" class="btn btn-prev">Anterior</button>
            <button type="submit" class="btn btn-submit">Finalizar</button>
        </div>
    </fieldset>

</form>