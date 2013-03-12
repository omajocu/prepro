        <div id="tabs">
            <ul>
                <li><a href="#tabs-1">Busqueda por datos</a></li>
                <li><a href="#tabs-2">Busqueda por palabra</a></li>
                <li><a href="#tabs-3">Aenean lacin</a></li>
            </ul>
            <div id="tabs-1">
                <div class="border-color-blue">
                    <fieldset>
                        <legend>Por Fecha</legend>
                        <div class="grid">
                            <div class="row">
                                <div class="span7">
                                    <div class="input-control text">
                                        <label for="FechaInicio"> Fecha Inicio </label>
                                        <input type="text" class="with-helper" name="FechaInicio" id="FechaInicio"/>
                                    </div>
                                </div>
                                <div class="span7">
                                    <div class="input-control text">
                                        <label for="FechaFin"> Fecha Fin </label>
                                        <input type="text" class="with-helper" name="FechaFin" id="FechaFin"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <br />
                    <fieldset>
                        <legend>Por Tipificado</legend>
                        <div class="grid">
                            <div class="row">
                                <div class="span3">
                                    <div id="area" class="input-control select" style="width: 200px;">
                                        <?php
                                            echo $ListadoAreas;
                                        ?>
                                    </div>
                                </div>
                                <div class="span3">
                                    <div id="ListaServicios" class="input-control select" style="width: 200px;">
                                        <select id="Servicios" name="Servicios" size="1">
                                            <option value="999">Servicios</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="span3">
                                    <div id="ListaAplicaciones" class="input-control select" style="width: 200px;">
                                        <select id="Aplicaciones" name="Aplicaciones" size="1">
                                            <option value="999">Aplicacion</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="grid">
                            <div class="row">
                                <div class="span3">
                                    <div id="ListadoTipoParte" class="input-control select" style="width: 200px;">
                                        <select id="TipoParte" name="TipoParte" size="1">
                                            <option value="999">Tipo de Parte</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="span3">
                                    <div class="input-control text" style="width: 200px;">
                                        <input name="NuemeroParte" id="NumeroParte" type="text"  title="Puede introducir un número parcial o completo de un parte. Si desea buscar todos los partes, utilice * ."/>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <br />
                    <fieldset>
                        <legend>Por Remedy</legend>
                        <div class="grid">
                            <div class="row">
                                <div class="span3">
                                    <div id="remedy" class="input-control select" style="width: 200px;">
                                        <?php
                                            echo $TipoRemedy;
                                        ?>
                                    </div>
                                </div>
                                <div class="span3">
                                    <div class="input-control text" style="width: 200px;">
                                        <input name="NumeroRemedy" id="NumeroRemedy" type="text"  title="Puede introducir un número parcial o completo de un remedy. Si desea buscar todos los remedys, utilice * ."/>
                                    </div>
                                </div>
                            </div>
                        </div>            
                    </fieldset>
                    <br />
                    <fieldset>
                        <legend>Por elemento afectado</legend>
                        <div class="grid">
                            <div class="row">    
                                <div class="span3">
                                    <div id="elemento" class="input-control select" style="width: 200px;">
                                        <?php
                                            echo $TipoElemento;
                                        ?>
                                    </div>
                                </div>
                                <div class="span3">
                                    <div class="input-control text" style="width: 200px;">
                                        <input name="NumeroElemento" id="NumeroElemento" type="text" title="Puede introducir un número parcial o completo de un elemento. Si desea buscar todos los elementos, utilice * ." />
                                    </div>
                                </div>
                            </div>
                        </div>         
                    </fieldset>
                    <br />
                    <div class="offset1">   
                        <button class="bg-color-blue" onclick="BuscarDatos()" >Buscar</button>  
                    </div>
                </div>
            </div>
            <div id="tabs-2">
                <div class="border-color-blue">
                    <fieldset>
                        <legend>Por palabra en un comentario</legend>
                        <div class="span6">
                            <div class="input-control text" style="width: 400px;">
                                <input name="BuscarPalabra" id="BuscarPalabra" type="text" title="Introduzca la palabra a buscar en los comentarios." />
                            </div>
                        </div>
                    </fieldset>
                    <br />
                    <div class="offset1">   
                        <button class="bg-color-blue" onclick="BuscarDatos()" >Buscar</button>  
                    </div>
                </div>
            </div>
            <div id="tabs-3">
                <div class="border-color-blue">
                    <fieldset>
                        <legend>Por palabra en un comentario</legend>
                        <p>Mauris eleifend est et turpis. Duis id erat. Suspendisse potenti. Aliquam vulputate, pede vel vehicula accumsan, mi neque rutrum erat, eu congue orci lorem eget lorem. Vestibulum non ante. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Fusce sodales. Quisque eu urna vel enim commodo pellentesque. Praesent eu risus hendrerit ligula tempus pretium. Curabitur lorem enim, pretium nec, feugiat nec, luctus a, lacus.</p>
                        <p>Duis cursus. Maecenas ligula eros, blandit nec, pharetra at, semper at, magna. Nullam ac lacus. Nulla facilisi. Praesent viverra justo vitae neque. Praesent blandit adipiscing velit. Suspendisse potenti. Donec mattis, pede vel pharetra blandit, magna ligula faucibus eros, id euismod lacus dolor eget odio. Nam scelerisque. Donec non libero sed nulla mattis commodo. Ut sagittis. Donec nisi lectus, feugiat porttitor, tempor ac, tempor vitae, pede. Aenean vehicula velit eu tellus interdum rutrum. Maecenas commodo. Pellentesque nec elit. Fusce in lacus. Vivamus a libero vitae lectus hendrerit hendrerit.</p>
                    </fieldset>
                </div>
            </div>     
            <br />
        </div>
    </div>
</div>