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
                  
            echo '      <div class="row">
                       	    <div class="span1" style="background-color: #fff; height: 100%; padding: 3px;">';
                            
                                echo $incidencia[$i]['estado'];	
								
                            
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
                                        echo $incidencia[$i]['parte'][$j]['numero_parte'].'<br>';
								        
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
                                    echo $incidencia[$i]['remedys'][$j]['remedy'].'<br>';
									
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
                                    echo $incidencia[$i]['elementos'][$j]['dato'].'<br>';
									
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
                                    echo $incidencia[$i]['comentarios'][$j]['comentario'].'<br>';
								
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
           	    </div><br>';
                  
        } 
        ?> 
                                                                              
     
</body>
</html>
