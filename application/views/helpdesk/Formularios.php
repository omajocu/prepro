<div id="NuevoParte<?php echo $IdIncidencia; ?>" name="NuevoParte<?php echo $IdIncidencia; ?>" title="Nuevo Parte" style="display: none;">
    <fieldset>
    <legend>Nuevo Parte</legend>
    <div class="row">
        <div class="span3">
            <div id="TipoParte" class="input-control select" style="width: 200px;">
            <?php
                echo $TipoParte;
            ?>
            </div>
        </div>
        <div class="span3">
            <div class="input-control text" style="width: 200px;">
                <input name="Parte<?php echo $IdIncidencia; ?>" id="Parte<?php echo $IdIncidencia; ?>" type="text"  value=""/>
            </div>
        </div>
    </div>
    </fieldset>
</div>

<div id="NuevoRemedy<?php echo $IdIncidencia; ?>" name="NuevoRemedy<?php echo $IdIncidencia; ?>" title="Nuevo Remedy" style="display: none;">
    <fieldset>
    <legend>Remedy</legend>
    <div class="grid">
        <div class="row">
            <div class="span3">
                <div id="Remedy" class="input-control select" style="width: 200px;">
                    <?php
                        echo $TipoRemedy;
                    ?>
                </div>
            </div>
            <div class="span3">
                <div class="input-control text" style="width: 200px;">
                    <input name="Remedy<?php echo $IdIncidencia; ?>" id="Remedy<?php echo $IdIncidencia; ?>" type="text"  />
                </div>
            </div>
        </div>
    </div>
    </fieldset> 
    <br/>
</div>

<div id="NuevoElemento<?php echo $IdIncidencia; ?>" name="NuevoElemento<?php echo $IdIncidencia; ?>" title="Nuevo Elemento" style="display: none;">
    <fieldset>
    <legend>Servicio Afectado</legend>
    <div class="grid">
        <div class="row">    
            <div class="span3">
                <div id="NuevoTipoElemento" class="input-control select" style="width: 200px;">
                    <?php
                        echo $TipoElemento;
                    ?>
                </div>
            </div>
            <div class="span3">
                <div class="input-control text" style="width: 200px;">
                    <input name="Elemento<?php echo $IdIncidencia; ?>" id="Elemento<?php echo $IdIncidencia; ?>" type="text"  />
                </div>
            </div>
        </div>
    </div>
    </fieldset> 
    <br/>
</div>

<div id="NuevoComentario<?php echo $IdIncidencia; ?>" name="NuevoComentario<?php echo $IdIncidencia; ?>" title="Nuevo Comentario" style="display: none;">
    <fieldset>
    <legend>Descripcin del Problema</legend>
    <div class="span13">
        <div class="input-control textarea">
            <textarea id="Comentario<?php echo $IdIncidencia; ?>" name="Comentario<?php echo $IdIncidencia; ?>"></textarea>
        </div>
    </div>
    </fieldset>
</div>