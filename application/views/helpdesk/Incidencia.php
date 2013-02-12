<div id="Incidencia<?php echo $IdIncidencia; ?>" name="Incidencia<?php echo $IdIncidencia; ?>">
    <div class="border-color-blue">
        <div class="grid">
            <div class="row">
                <div class="span12" style="background-color: #aaa; height: 100%; padding: 3px;">
                    <?php
                        echo $Area . ' > ' . $Servicio . ' > ' . $Aplicacion . '';
                    ?>
                </div>					
                <div class="ofset1" style="background-color: #ccc; height: 100%; padding: 3px;">
                    <?php
                        echo $FechaApertura;
                    ?>
                </div>
            </div>
            <div class="row">
                <div class="span1" style="background-color: #fff; height: 100%; padding: 3px;">                            
                    Estado                            
                </div>
                <div class="span3" style="background-color: #fff; height: 100%; padding: 3px;">
                    Parte
                </div>
                <div class="span3" style="background-color: #fff; height: 100%; padding: 3px;">
                    Remedy
                </div>
                <div class="span3" style="background-color: #fff; height: 100%; padding: 3px;">
                    Elemento
                </div>
                <div class="span6" style="background-color: #fff; height: 100%; padding: 3px;">
                    Problema
                </div>
            </div>
            <div class="row">
                <div class="span1" style="background-color: #fff; height: 100%; padding: 3px;">
                    <?php
                        echo $Estado;
                    ?>
                </div>
                <div class="span3" style="background-color: #fff; height: 100%; padding: 3px;">
                    <?php
                        echo $Partes;
                    ?>
                </div>
                <div class="span3" style="background-color: #fff; height: 100%; padding: 3px;">
                    <?php
                        echo $Remedys;
                    ?>
                </div>
                <div class="span3" style="background-color: #fff; height: 100%; padding: 3px;">
                    <?php
                        echo $Elementos;
                    ?>
                </div>
                <div class="span4" style="background-color: #fff; height: 100%; padding: 3px;">
                    <?php
                        echo $Comentarios;
                    ?>
                </div>                    
            </div>
            <div class="row">
                <div class="span12" style="left: 20px; border-top: 3px #aaa dotted;">
                    <?php
                        echo $debug;
                    ?>
                </div>
                <div class="ofset1" style="left: 20px; border-top: 3px #aaa dotted;">
                    <div class="toolbar" style="padding: 3px;">
                        <button onclick="EditaIncidencia(<?php echo $IdIncidencia; ?>)">
                            <i class="icon-pencil"></i>
                        </button>
                        <button onclick="DelIncidencia(<?php echo $IdIncidencia; ?>)">
                            <i class="icon-remove"></i>
                        </button>
                        <button>
                            <i class="icon-phone"></i>
                        </button>
                        <button>
                            <i class="icon-compass"></i>
                        </button>
                        <button>
                            <i class="icon-mail"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br>