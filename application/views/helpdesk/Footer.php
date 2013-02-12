          	</div>
            </div>
        </div>
    </div> 
    
    <div id="NuevaIncidencia" name="NuevaIncidencia" title="Nueva Incidencia" style="display: none;">
    <fieldset>
        <legend>Incidencia</legend>
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
                            <input name="numparte" id="numparte" type="text"  />
                        </div>
                    </div>
               	</div>
            </div>
        </fieldset>
        <fieldset>
            <legend>Remedy</legend>
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
                 			    <input name="numremedy" id="numremedy" type="text"  />
                            </div>
                 	</div>
                    </div>
                </div>
        </fieldset> 
        <fieldset>
            <legend>Servicio Afectado</legend>
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
                                <input name="numelemnto" id="numelemento" type="text"  />
                            </div>
                        </div>
                    </div>
                </div>
        </fieldset> 
        <fieldset>
            <legend>Descripcin del Problema</legend>
                <div class="span13">
                    <div class="input-control textarea">
                        <textarea id="nuevocomentario" name="nuevocomentario"></textarea>
                    </div>
                </div>
        </fieldset>
        <div class="span3" style="padding: 10px;">
            <input type="button" value="Guardar" onclick="enviar_nueva()"/>
       	</div> 
    </div>  

</body>
</html>
