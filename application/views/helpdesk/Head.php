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