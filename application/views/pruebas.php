<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <title>CGP IBERIA - Gestión de Incidencias</title>

    <link href="<?php echo base_url(); ?>css/modern.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/jquery.cleditor.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/jquery.fancybox.css?v=2.1.3" type="text/css" media="screen" />

    <script type="text/javascript" src="<?php echo base_url(); ?>js/assets/jquery-1.8.2.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>js/modern/dropdown.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>js/nueva_incidencia.js" ></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>js/cleditor/jquery.cleditor.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>js/fancybox/jquery.fancybox.pack.js?v=2.1.3"></script>
    
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

    <script type="text/javascript">
	   $(document).ready
       (
            function() 
            {
		      $(".fancybox").fancybox();
            }
        );
    </script>
    
    <script type="text/javascript">
        $(document).ready
        (
            function() 
            {
	           $(".various").fancybox
               ({
		          maxWidth	: 850,
		          maxHeight	: 600,
		          fitToView	: false,
		          width		: '70%',
		          height	: '70%',
		          autoSize	: true,
		          closeClick	: false,
		          openEffect	: 'elastic',
		          closeEffect	: 'elastic',
		          scrolling : 'auto',
		          preload   : true,
		          closeBtn	: true
	           });
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
                        <a href="#"><span class="element brand">CGP IBERIA - Gestión de Incidencias</span></a>
                        <span class="divider"></span>

                        <ul class="menu">
                            <li data-role="dropdown">
                                <a>Item 1</a>
                                <ul class="dropdown-menu">
                                    <li><a class="various" data-fancybox-type="iframe" href="file:///C:/xampp/htdocs/inicio/pruebas.html">Iframe</a></li>
                                    <li><a href="#">SubItem 2</a></li>
                                    <li><a href="#">SubItem 3</a></li>
                                    <li class="divider"></li>
                                    <li><a href="#">SubItem 4</a></li>
                                </ul>
                            </li>
                            <li><a class="various" data-fancybox-type="iframe" href="http://localhost/prepro/index.php/incidencias/nueva">Iframe</a></li>
                            <li><a href="#">Item 3</a></li>
                            <li><a href="#">Item 4</a></li>
                        </ul>
                    </div>
                </div>
            </div>
     
            <div class="span13" style="background-color: #ccc; height: 100%;">
                <div class="page snapped bg-color-grayDark">
                    <div class="page-sidebar">
                        <ul>
                            <li>
                  		        <a>Projects</a>
                                <ul class="sub-menu">
                                    <li><a href="">Currently</a></li>
                                    <li><a href="">Closed</a></li>
                                </ul>
                            </li>
                            <li>
                                <a>Notes</a>
                                <ul class="sub-menu">
                                    <li><a href="">Important</a></li>
          		                    <li><a href="">Today</a></li>
                        	       <li><a href="">Weekly</a></li>
                        	       <li><a href="">Monthly</a></li>
                    	        </ul>
                		    </li>
                            <li class="sticker sticker-color-orange"><a href="#"><i class="icon-cart"></i> Shopping</a></li>
                            <li class="sticker sticker-color-orangeDark"><a href="#"><i class="icon-clipboard"></i> Recipes</a></li>
                            <li class="sticker sticker-color-green"><a href="#"><i class="icon-history"></i> Hobbies</a></li>
                            <li class="sticker sticker-color-pink dropdown active" data-role="dropdown">
                                <a><i class="icon-list"></i> To Do</a>
                                <ul class="sub-menu light sidebar-dropdown-menu open">
                                    <li><a href="">Today</a></li>
                                    <li><a href="">To Do List</a></li>
                                    <li><a href="">To Do after work</a></li>
                                    <li><a href="">Movies to watch</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="page fill bg-color-white">
                    <p style="padding: 20px;">
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
                                                <input type="text"  />
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
                                                <input type="text"  />
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
                                                <input type="text"  />
                                                <button class="helper" onclick="return false"></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </fieldset> 
                        <fieldset>
                            <legend>Descripción del Problema</legend>
                                <div class="span13">
                                    <div class="input-control textarea">
                                        <textarea id="problema"></textarea>
                                    </div>
                                </div>
                        </fieldset> 

                    </p>
          	     </div>
            </div>
        </div>
    </div>     
</body>
</html>
