<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
	<meta name="author" content="Oscar" />

	<title>Nuevo Parte</title>
    
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

<body>
<form action="http://localhost/prepro/index.php/incidencias/nuevo_comentario" method="post" name="nuevainc">

<fieldset>
            <legend>Descripcin del Problema</legend>
                <div class="span13">
                    <div class="input-control textarea">
                        <textarea id="comentario" name="comentario"></textarea>
                        <?php
                            echo $id_incidencia;
                        ?>
                    </div>
                </div>
        </fieldset>
        <div class="span3" style="padding: 10px;">
        	<input type="submit" value="Guardar" />
       	</div>


</form>
</body>
</html>


