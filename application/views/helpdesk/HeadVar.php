<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <script type="text/javascript">
            $(
    function()
    {
        $("#NuevoParte<?php echo $IdIncidencia; ?>").dialog
        ({
            modal: true,
            buttons: 
            {
                "Crear": 
                    function()
                    {
                        GuardaParte(<?php echo $IdIncidencia; ?>);
                    },
                "No": 
                    function()
                    {
                        alert("no has aceptado, te jodes y te quedas sin servicio");
                    }
            },
            show: "slide",
            hide: "explode"
        });
        $("#AbreParte<?php echo $IdIncidencia; ?>").button().click(function() 
        {
            $("#NuevoParte<?php echo $IdIncidencia; ?>").dialog("open");
        });
    }
)
        </script>
    </head>
    