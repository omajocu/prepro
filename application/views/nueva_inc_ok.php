<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <title>Nueva Incidencia</title>

    <link href="<?php echo base_url(); ?>css/modern.css" rel="stylesheet" type="text/css" />
    
    <script type="text/javascript" src="<?php echo base_url(); ?>js/assets/jquery-1.8.2.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>js/modern/dropdown.js"></script>
    
  
</head>

<body class="modern-ui">
<form action="http://localhost/prepro/index.php/incidencias/index" target="_parent" enctype="text/plain" name="form">
    <div class="span10" style="background-color: #ccc; height: 300px; position: relative;">
        <div class="message-dialog bg-color-green fg-color-white">
            <p><?php echo $texto; ?></p>
            <button class="place-right" onclick="parent.$.fancybox.close();">Aceptar</button>
        </div>
    </div>
</form>
</body>
</html>