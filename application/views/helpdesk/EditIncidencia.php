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
                    <a href="#" onclick="CambiaEstado(<?php echo $IdIncidencia; ?>)"><i class="icon-history"></i></a>
                </div>
                <div class="span3" style="background-color: #fff; height: 100%; padding: 3px;">
                    Parte
                    <a href="#" onclick="NewParte(<?php echo $IdIncidencia; ?>)"><i class="icon-plus"></i></a>
                </div>
                <div class="span3" style="background-color: #fff; height: 100%; padding: 3px;">
                    Remedy
                    <a href="#" onclick="NewRemedy(<?php echo $IdIncidencia; ?>)"><i class="icon-plus"></i></a>
                </div>
                <div class="span3" style="background-color: #fff; height: 100%; padding: 3px;">
                    Elemento
                    <a href="#" onclick="NewElemento(<?php echo $IdIncidencia; ?>)"><i class="icon-plus"></i></a>
                </div>
                <div class="span6" style="background-color: #fff; height: 100%; padding: 3px;">
                    Problema
                    <a href="#" onclick="NewComentario(<?php echo $IdIncidencia; ?>)"><i class="icon-plus"></i></a>
                </div>
            </div>
            <div class="row">
                <div class="span1" style="background-color: #fff; height: 100%; padding: 3px;">
                <?php
                    echo $Estado;
                ?>
                </div>
                <div class="span3" style="background-color: #fff; height: 100%; padding: 3px;">
                    <div id="Partes<?php echo $IdIncidencia; ?>" name="Partes<?php echo $IdIncidencia; ?>">
                        <?php
                            echo $Partes;
                        ?>
                    </div>
                </div>
                <div class="span3" style="background-color: #fff; height: 100%; padding: 3px;">
                    <div id="Remedys<?php echo $IdIncidencia; ?>" name="Remedys<?php echo $IdIncidencia; ?>">
                        <?php
                            echo $Remedys;
                        ?>
                    </div>
                </div>
                <div class="span3" style="background-color: #fff; height: 100%; padding: 3px;">
                    <div id="Elementos<?php echo $IdIncidencia; ?>" name="Elementos<?php echo $IdIncidencia; ?>">
                        <?php
                            echo $Elementos;
                        ?>
                    </div>
                </div>
                <div class="span4" style="background-color: #fff; height: 100%; padding: 3px;">
                    <div id="Comentarios<?php echo $IdIncidencia; ?>" name="Comentarios<?php echo $IdIncidencia; ?>">
                        <?php
                            echo $Comentarios;
                        ?>
                    </div>
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
                        <button onclick="BloqueaIncidencia(<?php echo $IdIncidencia; ?>)">
                            <i class="icon-locked"></i>
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