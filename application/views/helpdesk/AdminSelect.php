        <div id="tabsadmin">
            <ul>
                <li><a href="#tabs-1">Edita Areas</a></li>
                <li><a href="#tabs-2">Edita Servicios</a></li>
                <li><a href="#tabs-3">Edita Aplicaciones</a></li>
                <li><a href="#tabs-4">Edita Partes</a></li>
                <li><a href="#tabs-5">Edita Remedy</a></li>
                <li><a href="#tabs-6">Edita Elementos</a></li>
            </ul>
            <div id="tabs-1">
                <div class="border-color-blue">
                    <fieldset>
                        <legend>Edita Areas</legend>
                        <label for="AddArea"> Nueva Area </label>
                        <div class="grid">
                            <div class="row">
                                <div class="span5">
                                    <div class="input-control text">
                                        <input type="text" class="with-helper" name="AddArea" id="AddArea"/>
                                    </div>
                                </div>
                                <div class="span5">
                                    <button class="mini" onclick="AddArea()" title="Crea un nuevo area"><i class="icon-plus-2"></i> Crear</button>
                                </div>
                            </div>
                        </div>
                        <div class="grid">
                            <div class="row">
                                <div class="span3">
                                    <div class="input-control select" style="width: 200px;">
                                        <?php
                                            echo $ListadoAreas;
                                        ?>
                                    </div>
                                </div>
                                <div class="span3">                                
                                    <button class="mini" onclick="DelArea()" title="Borra el area seleccionado"><i class="icon-cancel-2"></i> Eliminar</button>
                                </div>
                            </div>
                        </div>
                        <div class="span3">
                            <div class="input-control select" style="width: 200px;">
                                <select multiple size="6" id="ListServicios" name="ListServicios">
                                    <option value="999">Seleccione un Area</option>
                                </select>                                
                            </div>
                        </div>
                        <div class="span3">
                            <button class="mini" onclick="RefreshParmisoArea()" title="Actualiza los permisos"><i class="icon-enter" ></i> Actualiza Permisos</button>
                        </div>
                        <div class="span3">
                            <div id="prueba" name="prueba">
                                
                            </div>
                        </div>
                    </fieldset>
                </div>
            </div>
            <div id="tabs-2">
                <div class="border-color-blue">
                    <fieldset>
                        <legend>Edita Servicios</legend>
                        <label for="AddServicio"> Nuevo Servicio </label>
                        <div class="grid">
                            <div class="row">
                                <div class="span5">
                                    <div class="input-control text">
                                        <input type="text" class="with-helper" name="AddServicio" id="AddServicio"/>
                                    </div>
                                </div>
                                <div class="span5">
                                    <button class="mini" onclick="AddServicio()" title="Crea un nuevo servicio"><i class="icon-plus-2"></i> Crear</button>
                                </div>
                            </div>
                        </div>
                        <div class="grid">
                            <div class="row">
                                <div class="span3">
                                    <div class="input-control select" style="width: 200px;">
                                        <?php
                                            echo $ListadoServicios;
                                        ?>
                                    </div>
                                </div>
                                <div class="span3">                                
                                    <button class="mini" onclick="DelServicio()" title="Borra el servico seleccionado"><i class="icon-cancel-2"></i> Eliminar</button>
                                </div>
                            </div>
                        </div>
                        <div class="span3">
                            <div class="input-control select" style="width: 200px;">
                                <select multiple size="6" id="ListAplicaciones" name="ListAplicaciones">
                                    <option value="999">Seleccione un Servicio</option>
                                </select>                                
                            </div>
                        </div>
                        <div class="span3">
                            <button class="mini" onclick="RefreshPermisoServicio()"><i class="icon-enter"></i> Actualiza Permisos</button>
                        </div>
                    </fieldset>
                </div>
            </div>
            <div id="tabs-3">
                <div class="border-color-blue">
                    <fieldset>
                        <legend>Edita Aplicaciones</legend>
                        <label for="AddAplicacion"> Nueva Aplicacion </label>
                        <div class="grid">
                            <div class="row">
                                <div class="span5">
                                    <div class="input-control text">
                                        <input type="text" class="with-helper" name="AddAplicacion" id="AddAplicacion"/>
                                    </div>
                                </div>
                                <div class="span5">
                                    <button class="mini" onclick="AddAplicacion()" title="Crea un nueva Aplicacion"><i class="icon-plus-2"></i> Crear</button>
                                </div>
                            </div>
                        </div>
                        <div class="grid">
                            <div class="row">
                                <div class="span3">
                                    <div class="input-control select" style="width: 200px;">
                                        <?php
                                            echo $ListadoAplicaciones;
                                        ?>
                                    </div>
                                </div>
                                <div class="span3">                                
                                    <button class="mini" onclick="DelAplicacion()" title="Borra Aplicacion"><i class="icon-cancel-2"></i> Eliminar</button>
                                </div>
                            </div>
                        </div>
                        <div class="span3">
                            <div class="input-control select" style="width: 200px;">
                                <select multiple size="6" id="ListPartes" name="ListPartes">
                                    <option value="999">Seleccione una Aplicacion</option>
                                </select> 
                            </div>
                        </div>
                        <div class="span3">
                            <button class="mini" onclick="RefreshPermisoApp()" title="Actualiza Permisos"><i class="icon-enter" ></i> Actualiza Permisos</button>
                        </div>
                    </fieldset>
                </div>
            </div>
            <div id="tabs-4">
                <div class="border-color-blue">
                    <fieldset>
                        <legend>Edita Tipo de Partes</legend>
                        <label for="AddParte"> Nueva Tipo de Parte </label>
                        <div class="grid">
                            <div class="row">
                                <div class="span5">
                                    <div class="input-control text">
                                        <input type="text" class="with-helper" name="AddParte" id="AddParte"/>
                                    </div>
                                </div>
                                <div class="span5">
                                    <button class="mini" onclick="AddTipoParte()" title="Añade nuevo tipo de parte"><i class="icon-plus-2"></i> Crear</button>
                                </div>
                            </div>
                        </div>
                        <div class="grid">
                            <div class="row">
                                <div class="span3">
                                    <div class="input-control select" style="width: 200px;">
                                        <?php
                                            echo $ListadoPartes;
                                        ?>
                                    </div>
                                </div>
                                <div class="span3">                                
                                    <button class="mini" onclick="DelTipoParte()" title="Borra los tipos de partes seleccionados."><i class="icon-cancel-2"></i> Eliminar</button>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </div>
            </div>
            <div id="tabs-5">
                <div class="border-color-blue">
                    <fieldset>
                        <legend>Edita Tipo de Remedy</legend>
                        <label for="AddRemedy"> Nueva Tipo de Remedy </label>
                        <div class="grid">
                            <div class="row">
                                <div class="span5">
                                    <div class="input-control text">
                                        <input type="text" class="with-helper" name="AddRemedy" id="AddRemedy"/>
                                    </div>
                                </div>
                                <div class="span5">
                                    <button class="mini" onclick="AddTipoRemedy()" title="Añade nuevo tipo de remedy"><i class="icon-plus-2"></i> Crear</button>
                                </div>
                            </div>
                        </div>
                        <div class="grid">
                            <div class="row">
                                <div class="span3">
                                    <div class="input-control select" style="width: 200px;">
                                        <?php
                                            echo $ListadoRemedy;
                                        ?>
                                    </div>
                                </div>
                                <div class="span3">                                
                                    <button class="mini"  onclick="DelTipoRemedy()" title="Borra los tipos de remedys seleccionados."><i class="icon-cancel-2"></i> Eliminar</button>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </div>
            </div>
            <div id="tabs-6">
                <div class="border-color-blue">
                    <fieldset>
                        <legend>Edita Tipo de Elemento</legend>
                        <label for="AddElemento"> Nuevo Tipo de Elemento </label>
                        <div class="grid">
                            <div class="row">
                                <div class="span5">
                                    <div class="input-control text">
                                        <input type="text" class="with-helper" name="AddElemento" id="AddElemento"/>
                                    </div>
                                </div>
                                <div class="span5">
                                    <button class="mini" onclick="AddTipoElemento()" title="Añade nuevo tipo de elemento"><i class="icon-plus-2" ></i> Crear</button>
                                </div>
                            </div>
                        </div>
                        <div class="grid">
                            <div class="row">
                                <div class="span3">
                                    <div class="input-control select" style="width: 200px;">
                                        <?php
                                            echo $ListadoElementos;
                                        ?>
                                    </div>
                                </div>
                                <div class="span3">                                
                                    <button class="mini" onclick="DelTipoElemento()" title="Borra los tipos de remedys seleccionados."><i class="icon-cancel-2" ></i> Eliminar</button>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </div>
            </div>
        </div>
    </div>
</div>