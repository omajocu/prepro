<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <title>CGP IBERIA - Gestin de Incidencias</title>

    <link href="<?php echo base_url(); ?>css/modern.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/ui/jquery-ui-1.9.2.custom.css" />
    
    <script type="text/javascript" src="<?php echo base_url(); ?>js/assets/jquery-1.8.2.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>js/modern/dropdown.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>js/nueva_incidencia.js" ></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>js/assets/jquery-ui-1.9.2.custom.min.js"></script>
    

    
    
    
</head>

<body class="modern-ui">

        
        <?php
             
        for($i = 0;$i < count($incidencia); $i++)
        {    
            echo '<div class="border-color-blue">
                    <div class="grid">
                   	    <div class="row">
				            <div class="span12" style="background-color: #aaa; height: 100%; padding: 3px;">';
        
                                echo $incidencia[$i]['area'].' > '.$incidencia[$i]['servicio'].' > '.$incidencia[$i]['aplicacion'].'';
           					    echo '<input name="id_incidencia" type="hidden" id="id_incidencia" value="';
                                echo $incidencia[$i]['id'];
								echo '" />';
                                        
            echo '          </div>
           					<div class="ofset1" style="background-color: #ccc; height: 100%; padding: 3px;">';
            						
                                echo $incidencia[$i]['fecha'];
           					
            echo '          </div>
                        </div>
                        <div class="row">
                       	    <div class="span1" style="background-color: #fff; height: 100%; padding: 3px;">                            
   	                                Estado                            
                            </div>
                            <div class="span3" style="background-color: #fff; height: 100%; padding: 3px;">
                                	Parte
									<a href="#" onclick="modal_parte('.$incidencia[$i]['id'].')"><i class="icon-plus"></i></a>
                            </div>
                            <div class="span3" style="background-color: #fff; height: 100%; padding: 3px;">
                                	Remedy
									<a class="various" data-fancybox-type="iframe" href="http://localhost/prepro/index.php/incidencias/inserta_remedy/'.$incidencia[$i]['id'].'"><i class="icon-plus"></i></a>
                            </div>
                            <div class="span3" style="background-color: #fff; height: 100%; padding: 3px;">
                                	Elemento
									<a class="various" data-fancybox-type="iframe" href="http://localhost/prepro/index.php/incidencias/inserta_elemento/'.$incidencia[$i]['id'].'"><i class="icon-plus"></i></a>
                            </div>
                            <div class="span6" style="background-color: #fff; height: 100%; padding: 3px;">
                                	Problema
									<a class="various" data-fancybox-type="iframe" href="http://localhost/prepro/index.php/incidencias/inserta_comentario/'.$incidencia[$i]['id'].'"><i class="icon-plus"></i></a>
                            </div>
                        </div>';
                  
            echo '      <div class="row">
                       	    <div class="span1" style="background-color: #fff; height: 100%; padding: 3px;">';
                            
                                echo $incidencia[$i]['estado'];	
								echo '<a class="various" data-fancybox-type="iframe" href="pruebas.html"><i class="icon-history"></i></a>';
                            
            echo '          </div>
                            <div class="span3" style="background-color: #fff; height: 100%; padding: 3px;">
                                <div id="partes_';
                                echo $incidencia[$i]['id'];
                                echo '" name="partes_';
                                echo $incidencia[$i]['id'];
                                echo '">';
                            
                                    for($j = 0;$j < count($incidencia[$i]['parte']); $j++)
                                    {
								        echo $incidencia[$i]['parte'][$j]['tipo_parte'].' : ';
                                        echo $incidencia[$i]['parte'][$j]['numero_parte'].' ';
								        echo '<a href="#" onclick="borra_parte(';
                                        echo $incidencia[$i]['parte'][$j]['id'].', ';
                                        echo $incidencia[$i]['id'];
                                        echo ')"><i class="icon-remove"></i></a><br>';
                                    }	
                            
            echo '              </div>
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
                                    echo $incidencia[$i]['remedys'][$j]['remedy'].' ';
									echo '<a href="#" onclick="borra_remedy(';
                                    echo $incidencia[$i]['remedys'][$j]['id'].', ';
                                    echo $incidencia[$i]['id'];
                                    echo ')"><i class="icon-remove"></i></a><br>';
                                }
                            
            echo '          </div>
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
                                    echo $incidencia[$i]['elementos'][$j]['dato'].' ';
									echo '<a href="#" onclick="borra_elementos(';
                                    echo $incidencia[$i]['elementos'][$j]['id'].', ';
                                    echo $incidencia[$i]['id'];
                                    echo ')"><i class="icon-remove"></i></a><br>';
                                }
                                    
            echo '          </div>
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
                                    echo $incidencia[$i]['comentarios'][$j]['comentario'].' ';
									echo '<a href="#" onclick="borra_comentarios(';
                                    echo $incidencia[$i]['comentarios'][$j]['id'].', ';
                                    echo $incidencia[$i]['id'];
                                    echo ')"><i class="icon-remove"></i></a><br>';
                                }
                                
            echo '          </div>
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
                                        echo "1";
                                        echo ')"><i class="icon-locked"></i></button>
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
           	    </div><br>';
                 echo '<div id="nuevoparte" name="nuevoparte" title="Nuevo Parte" style="display: none;">
       <fieldset>
<legend>Nuevo Parte</legend>
<div class="row">
    <div class="span3">
        <div id="tipoparte" class="input-control select" style="width: 200px;">
            
                <div id="nuevotipoparte" class="input-control select" style="width: 200px;">
                            <select size="1">
                                <option value="999">Tipo Parte</option>
                            </select>
                        </div>
            
        </div>
    </div>
    <div class="span3">
        <div class="input-control text" style="width: 200px;">
            <input name="nuevonumparte" id="nuevonumparte" type="text"  />

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
        ?> 
                                                                              
     
</body>
</html>
