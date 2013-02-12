<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <title>Nueva Incidencia</title>

    <link href="<?php echo base_url(); ?>css/modern.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/jquery.cleditor.css" />
    

    <script type="text/javascript" src="<?php echo base_url(); ?>js/assets/jquery-1.8.2.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>js/modern/dropdown.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>js/nueva_incidencia.js" ></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>js/cleditor/jquery.cleditor.min.js"></script>
    
    <script type="text/javascript">
        $(document).ready
        (
            function() 
            {
                $.cleditor.defaultOptions.width = 800;
                $.cleditor.defaultOptions.heiht = 500;
                $("#comentario").cleditor();
            }
        );
    </script>
    
    
</head>

<body class="modern-ui">

<form action="http://localhost/prepro/index.php/incidencias/new_incidencia" method="post" name="nuevainc" id="nuevainc">


    <fieldset>
        <legend>Incidencia</legend>
       	    <div class="grid">
           	    <div class="row">
				    <div class="span3">
     			        <div id="area" class="input-control select" style="width: 200px;">
				            <?php
                                echo $contenido;
                            ?>
                        </div>
                    </div>
                   	<div class="span3">
                        <div id="servicios" class="input-control select" style="width: 200px;">
                            <select size="1">
                                <option value="999">Servicios</option>
                            </select>
                        </div>
                   	</div>
                   	<div class="span3">
                        <div id="aplicaciones" class="input-control select" style="width: 200px;">
                            <select size="1">
                                <option value="999">Aplicacion</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="span3">
                        <div id="tipoparte" class="input-control select" style="width: 200px;">
                            <select size="1">
                                <option value="999">Tipo de Parte</option>
                            </select>
                        </div>
                    </div>
              		<div class="span3">
                        <div class="input-control text" style="width: 200px;">
                            <input name="parte" id="parte" type="text"  />
                            <button class="helper" onclick="return false"></button>
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
                                    echo $tipo_remedy;
                                ?>
                            </div>
                        </div>
                        <div class="span3">
                            <div class="input-control text" style="width: 200px;">
                 			    <input name="remedy" id="remedy" type="text"  />
                     			<button class="helper" onclick="return false"></button>
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
                                    echo $tipo_elemento;
                                ?>
                            </div>
                        </div>
                        <div class="span3">
             			    <div class="input-control text" style="width: 200px;">
                 			    <input name="elemento" id="elemento" type="text"  />
                     			<button class="helper" onclick="return false"></button>
                    		</div>
                        </div>
                    </div>
                </div>
        </fieldset> 
        <fieldset>
            <legend>Descripcin del Problema</legend>
                <div class="span13">
                    <div class="input-control textarea">
                        <textarea id="comentario" name="comentario"></textarea>
                    </div>
                </div>
        </fieldset>
        <div class="span3" style="padding: 10px;">
        <input type="button" value="Guardar" onclick="enviar_nueva()"/>
       	</div>
      </form>
</body>
</html>