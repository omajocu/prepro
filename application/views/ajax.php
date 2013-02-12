<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
	<meta name="author" content="Oscar" />

	<title>Ajax</title>
    
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>js/nueva_incidencia.js" ></script>
    
</head>

<body>

<?php
	echo $contenido;
?>
<div id="servicios">
<select size="1">
	<option value="999">Servicios</option>
</select>
</div>
<div id="aplicaciones">
<select size="1">
	<option value="999">Aplicacion</option>
</select>
</div>
<div id="tipoparte">
<select size="1">
	<option value="999">Tipo de Parte</option>
</select>
</div>
<?php
	echo $tipo_remedy;
    echo $estado;
    echo $tipo_elemento;
?>

</body>
</html>