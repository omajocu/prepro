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
                <input name="Parte<?php echo $IdIncidencia; ?>" id="Parte<?php echo $IdIncidencia; ?>" type="text"  />
            </div>
        </div>
    </div>
    </fieldset>
    <br/>
    <div class="span3" style="padding: 10px;">
        <button id="SaveParte" name="SaveParte" class="bg-color-blue" onclick="GuardaParte(<?php echo $IdIncidencia; ?>)">Crear</button>
    </div>
</div>