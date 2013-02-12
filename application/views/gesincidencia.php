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
                    <div id="listado" name="listado">
                    <?php
        
                        for($i = 0;$i < count($incidencia); $i++)
                        {    
                            if(isset($incidencia[$i]['id']))
                            {
                                echo '<div id="incidencia_';
                                echo $incidencia[$i]['id'];
                                echo '" name="incidencia_';
                                echo $incidencia[$i]['id'];
                                echo '">';
            
                                echo '<div class="border-color-blue">
                                        <div class="grid">
                                            <div class="row">
                                                <div class="span12" style="background-color: #aaa; height: 100%; padding: 3px;">';
        
                                echo $incidencia[$i]['area'].' > '.$incidencia[$i]['servicio'].' > '.$incidencia[$i]['aplicacion'].'';
           			echo '<input name="id_incidencia" type="hidden" id="id_incidencia" value="';
                                echo $incidencia[$i]['id'];
				echo '" />';
                                        
                                echo '</div>
                                      <div class="ofset1" style="background-color: #ccc; height: 100%; padding: 3px;">';
            						
                                echo $incidencia[$i]['fecha'];
           					
                                echo '</div>
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
                                      </div>';
                  
                                echo '<div class="row">
                                        <div class="span1" style="background-color: #fff; height: 100%; padding: 3px;">';
                            
                                echo $incidencia[$i]['estado'];	
								
                                echo '</div>
                                        <div class="span3" style="background-color: #fff; height: 100%; padding: 3px;">
                                            <div id="partes_';
                                echo $incidencia[$i]['id'];
                                echo '" name="partes_';
                                echo $incidencia[$i]['id'];
                                echo '">';
                            
                                for($j = 0;$j < count($incidencia[$i]['parte']); $j++)
                                {
                                    echo $incidencia[$i]['parte'][$j]['tipo_parte'].' : ';
                                    echo $incidencia[$i]['parte'][$j]['numero_parte'].'<br>';
								       
                                }	
                            
                                echo '</div>
                                      </div>
                                        <div class="span3" style="background-color: #fff; height: 100%; padding: 3px;">';
                                echo '<div id="remedys_';
                                echo $incidencia[$i]['id'];
                                echo '" name="remedys_';
                                echo $incidencia[$i]['id'];
                                echo '">';
                            
                   	        for($j = 0;$j < count($incidencia[$i]['remedys']); $j++)
                                {
                                    echo $incidencia[$i]['remedys'][$j]['tipo'].' : ';
                                    echo $incidencia[$i]['remedys'][$j]['remedy'].'<br>';
									
                                }
                            
                                echo '</div>
                                      </div>
                                      <div class="span3" style="background-color: #fff; height: 100%; padding: 3px;">';
                                echo '<div id="elementos_';
                                echo $incidencia[$i]['id'];
                                echo '" name="elementos_';
                                echo $incidencia[$i]['id'];
                                echo '">';   
                           	 
                                for($j = 0;$j < count($incidencia[$i]['elementos']); $j++)
                                {
                                    echo $incidencia[$i]['elementos'][$j]['tipo_elemento'].' : ';
                                    echo $incidencia[$i]['elementos'][$j]['dato'].'<br>';
									
                                }
                                    
                                echo '</div>
                                      </div>
                                        <div class="span6" style="background-color: #fff; height: 100%; padding: 3px;">';
                                echo '<div id="comentarios_';
                                echo $incidencia[$i]['id'];
                                echo '" name="comentarios_';
                                echo $incidencia[$i]['id'];
                                echo '">';  
                                
                           	for($j = 0;$j < count($incidencia[$i]['comentarios']); $j++)
                                {
                                    echo $incidencia[$i]['comentarios'][$j]['fecha'].' - ';
                                    echo $incidencia[$i]['comentarios'][$j]['tipo_comentario'].' : ';
                                    echo $incidencia[$i]['comentarios'][$j]['comentario'].'<br>';
								
                                }
                                
                                echo '</div>
                                      </div>
                                      </div>
                                      <div class="row">
                                        <div class="span12" style="left: 20px; border-top: 3px #aaa dotted;">
                                            contacto
   					</div>
           				<div class="ofset1" style="left: 20px; border-top: 3px #aaa dotted;">
                                            <div class="toolbar" style="padding: 3px;">
                                            <button onclick="edita_incidencia(';
                                echo $incidencia[$i]['id'].",";
                                echo "0";
                                echo ')"><i class="icon-pencil"></i></button>
                                      <button onclick="borra_incidencia(';
                                echo $incidencia[$i]['id'];
                                echo ')"><i class="icon-remove"></i></button>
                                        <button><i class="icon-phone"></i></button>
                                        <button><i class="icon-compass"></i></button>
                                        <button><i class="icon-mail"></i></button>
                                     </div>
                                     </div>
                                     </div>
                                     </div>
                                     </div>
                                     </div><br>';
                   
                   
                   
                   
                                echo '<div id="nuevoparte_'.$incidencia[$i]['id'].'" name="nuevoparte_'.$incidencia[$i]['id'].'" title="Nuevo Parte" style="display: none;">
                                        <fieldset>
                                        <legend>Nuevo Parte</legend>
                                        <div class="row">
                                            <div class="span3">
                                                
                                                    <div id="nuevotipoparte" class="input-control select" style="width: 200px;">
                                                        ';
                                
                                echo $nuevo_tipo_parte; 
                                                       
                                
                                echo '
                                      
                                      </div>
                                      </div>
                                      <div class="span3">
                                        <div class="input-control text" style="width: 200px;">
                                            <input name="nuevonumparte_'.$incidencia[$i]['id'].'" id="nuevonumparte_'.$incidencia[$i]['id'].'" type="text"  />
                                        </div>
                                      </div>
                                      </div>
                                      </fieldset>
                                      <br/>
                                      <div class="span3" style="padding: 10px;">
                                        <input type="button" value="Guardar" onclick="nuevo_parte(';
                                echo $incidencia[$i]['id'];
                                echo ')"/>
                                      </div>
                                      </div>';
                            }
                            else
                            {
                                echo "No hay incidencias.";
                            }         
                        } 
                    ?> 
                    </div>
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
                                echo $tipo_remedy;
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
                                echo $tipo_elemento;
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
