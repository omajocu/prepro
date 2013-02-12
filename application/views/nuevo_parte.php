<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
	<meta name="author" content="Oscar" />

	<title>Nuevo Parte</title>
    
     <link href="<?php echo base_url(); ?>css/modern.css" rel="stylesheet" type="text/css" />
    
    <script type="text/javascript" src="<?php echo base_url(); ?>js/assets/jquery-1.8.2.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>js/modern/dropdown.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>js/nueva_incidencia.js" ></script>
</head>

<body>
<form action="http://localhost/prepro/index.php/incidencias/nuevo_parte" method="post" name="nuevainc">
<fieldset>
<legend>Nuevo Parte</legend>
<div class="row">
    <div class="span3">
        <div id="tipoparte" class="input-control select" style="width: 200px;">
            <?php
                echo $contenido;
            ?>
        </div>
    </div>
    <div class="span3">
        <div class="input-control text" style="width: 200px;">
            <input name="parte" id="parte" type="text"  />
            <button class="helper" onclick="return false"></button>
            <?php
                echo $id_incidencia;
            ?>
        </div>
    </div>
</div>
</fieldset>
<br/>
<div class="span3" style="padding: 10px;">
        	<input type="submit" value="Guardar" />
       	</div>



</form>
</body>
</html>


