<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <title>CGP IBERIA - Gestin de Incidencias</title>

    <link href="<?php echo base_url(); ?>css/modern.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/jquery.cleditor.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/ui/jquery-ui-1.9.2.custom.css" />
    
    <script type="text/javascript" src="<?php echo base_url(); ?>js/assets/jquery-1.8.2.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>js/modern/dropdown.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>js/nueva_incidencia.js" ></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>js/cleditor/jquery.cleditor.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>js/assets/jquery-ui-1.9.2.custom.min.js"></script>
    
    <script type="text/javascript">
      $(document).ready
      (
        function() 
        {
            $.cleditor.defaultOptions.width = 800;
            $.cleditor.defaultOptions.heiht = 500;
            $("#problema").cleditor();
        }
      );
    </script>
    
</head>

<body class="modern-ui">
    <div class="page secondary fixed-header">
        <div class="page-header ">
            <div class="page-header-content">
            
                <div class="user-login">
                    <a href="#">
                        <div class="name">
                            <span class="first-name">IE CGP</span>
                            <span class="last-name">dn10424</span>
                        </div>
                        <div class="avatar">
                            <img src="images/myface.jpg"/>
                        </div>
                    </a>
            	</div>
		<h1>CGP Iberia</h1>
            </div>
    	</div>
        
	<div class="page-region">
            <div class="span13">
                <div class="nav-bar">
                    <div class="nav-bar-inner">
                        <a href="#"><span class="element brand">CGP IBERIA - Gestin de Incidencias</span></a>
                        <span class="divider"></span>

                        <ul class="menu">
                            <li><a class="various" data-fancybox-type="iframe" href="http://localhost/prepro/index.php/incidencias/nueva">Nueva Incidencia</a></li>
                            <li><a href="#" onclick="nueva_incidencia()">Item 3</a></li>
                            <li><a href="#">Item 4</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="span13" style="background-color: #ccc; height: 100%;">
                <div class="page bg-color-white" style="width: 100%; padding: 20px;">
                    <?php
                        echo $Contenido;
                    ?>
          	</div>
            </div>
        </div>
    </div> 
    
    <div id="nuevainc" name="nuevainc" title="Nueva Incidencia" style="display: none;">
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
                        <div id="tipoparte1" class="input-control select" style="width: 200px;">
                            <select size="1">
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
                        <textarea id="comentario" name="comentario"></textarea>
                    </div>
                </div>
        </fieldset>
        <div class="span3" style="padding: 10px;">
            <input type="button" value="Guardar" onclick="enviar_nueva()"/>
       	</div> 
    </div>  

</body>
</html>
