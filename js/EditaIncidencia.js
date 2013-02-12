$(
    function()
    {
        $("#NuevoParte"+IdIncidencia).dialog
        ({
            modal: true,
            buttons: 
            {
                "Crear": 
                    function()
                    {
                        GuardaParte($IdIncidencia);
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
        $("#SaveParte"+IdIncidencia).button().click(function() 
        {
            $("#NuevoParte"+IdIncidencia).dialog("open");
        });
    }
)
