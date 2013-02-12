    
$(document).ready
(
    function()
    {
        $("#Areas").change
        (
            function(event)
            {
                var IdArea = $("#Areas").find(':selected').val();
                
            
                var parametros = 
                {
                    "IdArea" : IdArea
                    
                }; 
    
                $.ajax
                (   
                    {
                        data:  parametros,
                        url:   'http://localhost/prepro/index.php/helpdesk/GetListaServicios',
                        type:  'post',
                        beforeSend: function () 
                        {
                            $("#Servicios").html("Cargando, espere por favor...");
                        },
                        success:  function (response) 
                        {
                            $("#Servicios").html(response);
                        }
                    }
                );        
            }
        );
    }
);


$(document).ready
(
    function()
    {
        $("#Servicios").change
        (
            function(event)
            {
                var IdArea = $("#Areas").find(':selected').val();
                var IdServicio = $("#Servicios").find(':selected').val();
                
                
                
                var parametros = 
                {
                    "IdArea" : IdArea,
                    "IdServicio" : IdServicio
                    
                }; 
    
                $.ajax
                (   
                    {
                        data:  parametros,
                        url:   'http://localhost/prepro/index.php/helpdesk/GetListaAplicaciones',
                        type:  'post',
                        beforeSend: function () 
                        {
                            $("#Aplicaciones").html("Cargando, espere por favor...");
                        },
                        success:  function (response) 
                        {
                            $("#Aplicaciones").html(response);
                        }
                    }
                );        
            }
        );
    }
);

$(document).ready
(
    function()
    {
        $("#Aplicaciones").change
        (
            function(event)
            {
                var IdAplicacion = $("#Aplicaciones").find(':selected').val();
            
                var parametros = 
                {
                    "IdAplicacion" : IdAplicacion
                }; 
                
                $.ajax
                (   
                    {
                        data:  parametros,
                        url:   'http://localhost/prepro/index.php/helpdesk/GetListaTipoParte',
                        type:  'post',
                        beforeSend: function () 
                        {
                            $("#TipoParte").html("Cargando, espere por favor...");
                        },
                        success:  function (response) 
                        {
                            $("#TipoParte").html(response);
                        }
                    }
                );        
            }
        );
    }
);

function NewParte(IdIncidencia)
{        
    $("#NuevoParte"+IdIncidencia).dialog
    (
        {
            modal: true,
            width: 800,
            minWidth: 400,
            maxWidth: 900,
            buttons: 
            {
                "Ok": 
                    function()
                    {
                        GuardaParte(IdIncidencia);
                        $(this).dialog("destroy");
                    },
                    
                "Cancelar": 
                    function()
                    {
                        $(this).dialog("destroy");
                    }
            },
            show: "fold",
            hide: "fold"    
        }
    );                    
}

function GuardaParte(IdIncidencia)
{    
    var TipoParte = $("#TipoParte"+IdIncidencia).find(':selected').val();
    var Parte = $("#Parte"+IdIncidencia).val(); 
    
    var parametros = 
    {
        "IdIncidencia" : IdIncidencia,
        "TipoParte" : TipoParte,
        "Parte" : Parte     
    };
    
    $.ajax
    (
        {
            data:  parametros,
            url:   'http://localhost/prepro/index.php/Helpdesk/CreaParte',
            type:  'post',
            beforeSend: function () 
            {
                $("#Partes"+IdIncidencia).html("Cargando, espere por favor...");
            },
            success:  function (response) 
            {
                $("#Partes"+IdIncidencia).html(response);
                $("#TipoParte"+IdIncidencia).prop("selectedIndex",999);
                $("#Parte"+IdIncidencia).val("");
            }
        }
    );
}

function DelParte(IdParte, IdIncidencia)
{
    var parametros = 
    {
        "IdParte" : IdParte,
        "IdIncidencia" : IdIncidencia
    };
    
    $.ajax
    (
        {
            data:  parametros,
            url:   'http://localhost/prepro/index.php/Helpdesk/BorraParte',
            type:  'post',
            beforeSend: function () 
            {
                $("#Partes" + IdIncidencia).html("Cargando, espere por favor...");
            },
            success:  function (response) 
            {
                $("#Partes" + IdIncidencia).html(response);
            }
        }
    );
}

function NewRemedy(IdIncidencia)
{        
    $("#NuevoRemedy"+IdIncidencia).dialog
    (
        {
            modal: true,
            width: 800,
            minWidth: 400,
            maxWidth: 900,
            buttons: 
            {
                "Ok": 
                    function()
                    {
                        GuardaRemedy(IdIncidencia);
                        $(this).dialog("destroy");
                    },
                    
                "Cancelar": 
                    function()
                    {
                        $(this).dialog("destroy");
                    }
            },
            show: "fold",
            hide: "fold"    
        }
    );                    
}

function GuardaRemedy(IdIncidencia)
{    
    var TipoRemedy = $("#TipoRemedy"+IdIncidencia).find(':selected').val();
    var Remedy = $("#Remedy"+IdIncidencia).val(); 
    
    var parametros = 
    {
        "IdIncidencia" : IdIncidencia,
        "TipoRemedy" : TipoRemedy,
        "Remedy" : Remedy     
    };
    
    $.ajax
    (
        {
            data:  parametros,
            url:   'http://localhost/prepro/index.php/Helpdesk/CreaParte',
            type:  'post',
            beforeSend: function () 
            {
                $("#Remedys"+IdIncidencia).html("Cargando, espere por favor...");
            },
            success:  function (response) 
            {
                $("#Remedys"+IdIncidencia).html(response);
                $("#TipoRemedy"+IdIncidencia).prop("selectedIndex",999);
                $("#Remedy"+IdIncidencia).val("");
            }
        }
    );
}

function DelRemedy(IdRemedy, IdIncidencia)
{
    var parametros = 
    {
        "IdRemedy" : IdRemedy,
        "IdIncidencia" : IdIncidencia
    };
    
    $.ajax
    (
        {
            data:  parametros,
            url:   'http://localhost/prepro/index.php/Helpdesk/BorraRemedy',
            type:  'post',
            beforeSend: function () 
            {
                $("#Remedys" + IdIncidencia).html("Cargando, espere por favor...");
            },
            success:  function (response) 
            {
                $("#Remedys" + IdIncidencia).html(response);
            }
        }
    );
}

function NewElemento(IdIncidencia)
{        
    $("#NuevoElemento"+IdIncidencia).dialog
    (
        {
            modal: true,
            width: 800,
            minWidth: 400,
            maxWidth: 900,
            buttons: 
            {
                "Ok": 
                    function()
                    {
                        GuardaElemento(IdIncidencia);
                        $(this).dialog("destroy");
                    },
                    
                "Cancelar": 
                    function()
                    {
                        $(this).dialog("destroy");
                    }
            },
            show: "fold",
            hide: "fold"    
        }
    );                    
}

function GuardaElemento(IdIncidencia)
{    
    var TipoElemento = $("#TipoElemento"+IdIncidencia).find(':selected').val();
    var Elemento = $("#Elemento"+IdIncidencia).val(); 
    
    var parametros = 
    {
        "IdIncidencia" : IdIncidencia,
        "TipoElemento" : TipoElemento,
        "Elemento" : Elemento     
    };
    
    $.ajax
    (
        {
            data:  parametros,
            url:   'http://localhost/prepro/index.php/Helpdesk/CreaParte',
            type:  'post',
            beforeSend: function () 
            {
                $("#Elementos"+IdIncidencia).html("Cargando, espere por favor...");
            },
            success:  function (response) 
            {
                $("#Elementos"+IdIncidencia).html(response);
                $("#TipoElemento"+IdIncidencia).prop("selectedIndex",999);
                $("#Elelemwnto"+IdIncidencia).val("");
            }
        }
    );
}

function DelElemento(IdElelemto, IdIncidencia)
{
    var parametros = 
    {
        "IdElemento" : IdElemento,
        "IdIncidencia" : IdIncidencia
    };
    
    $.ajax
    (
        {
            data:  parametros,
            url:   'http://localhost/prepro/index.php/Helpdesk/BorraRemedy',
            type:  'post',
            beforeSend: function () 
            {
                $("#Elementos" + IdIncidencia).html("Cargando, espere por favor...");
            },
            success:  function (response) 
            {
                $("#Elementos" + IdIncidencia).html(response);
            }
        }
    );
}

function NewComentario(IdIncidencia)
{        
    $("#NuevoComentario"+IdIncidencia).dialog
    (
        {
            modal: true,
            width: 800,
            minWidth: 400,
            maxWidth: 900,
            buttons: 
            {
                "Ok": 
                    function()
                    {
                        GuardaComentario(IdIncidencia);
                        $(this).dialog("destroy");
                    },
                    
                "Cancelar": 
                    function()
                    {
                        $(this).dialog("destroy");
                    }
            },
            show: "fold",
            hide: "fold"    
        }
    );                    
}

function GuardaComentario(IdIncidencia)
{    
    var TipoComentario = $("#TipoComentario"+IdIncidencia).find(':selected').val();
    var Comentario = $("#Comentario"+IdIncidencia).val(); 
    
    var parametros = 
    {
        "IdIncidencia" : IdIncidencia,
        "TipoComentario" : TipoComentario,
        "Comentario" : Comentario     
    };
    
    $.ajax
    (
        {
            data:  parametros,
            url:   'http://localhost/prepro/index.php/Helpdesk/CreaParte',
            type:  'post',
            beforeSend: function () 
            {
                $("#Comentarios"+IdIncidencia).html("Cargando, espere por favor...");
            },
            success:  function (response) 
            {
                $("#Comentarios"+IdIncidencia).html(response);
                $("#TipoComentario"+IdIncidencia).prop("selectedIndex",999);
                $("#Comentario"+IdIncidencia).val("");
            }
        }
    );
}

function DelComentario(IdComentario, IdIncidencia)
{
    var parametros = 
    {
        "IdComentario" : IdComentario,
        "IdIncidencia" : IdIncidencia
    };
    
    $.ajax
    (
        {
            data:  parametros,
            url:   'http://localhost/prepro/index.php/Helpdesk/BorraRemedy',
            type:  'post',
            beforeSend: function () 
            {
                $("#Comentarios" + IdIncidencia).html("Cargando, espere por favor...");
            },
            success:  function (response) 
            {
                $("#Comentarios" + IdIncidencia).html(response);
            }
        }
    );
}

function EditaIncidencia(IdIncidencia)
{    
    var parametros = 
    {
        "IdIncidencia" : IdIncidencia
    };
    
    $.ajax
    (
        {
            data:  parametros,
            url:   'http://localhost/prepro/index.php/Helpdesk/EditaIncidencia',
            type:  'post',
            beforeSend: function () 
            {
                $("#Incidencia" + IdIncidencia).html("Cargando, espere por favor...");
            },
            success:  function (response) 
            {
                $("#Incidencia" + IdIncidencia).html(response);
            }
        }
    );
}

function BloqueaIncidencia(IdIncidencia)
{    
    var parametros = 
    {
        "IdIncidencia" : IdIncidencia
    };
    
    $.ajax
    (
        {
            data:  parametros,
            url:   'http://localhost/prepro/index.php/Helpdesk/CargaIncidencia',
            type:  'post',
            beforeSend: function () 
            {
                $("#Incidencia" + IdIncidencia).html("Cargando, espere por favor...");
            },
            success:  function (response) 
            {
                $("#Incidencia" + IdIncidencia).html(response);
            }
        }
    );
}

function DelIncidencia(IdIncidencia)
{
    var parametros = 
    {
        "IdIncidencia" : IdIncidencia
    };
    
     confirmar = confirm("¿Esta seguro que desea borrar esta incidencia?");
    
    if(confirmar)
    {
        $.ajax
        (
            {
                data:  parametros,
                url:   'http://localhost/prepro/index.php/Helpdesk/BorraIncidencia',
                type:  'post',
                beforeSend: function () 
                {
                    $("#Incidencia" + IdIncidencia).html("Cargando, espere por favor...");
                },
                success:  function (response) 
                {
                    $("#Incidencia" + IdIncidencia).html(response);
                }
            }
        );
    }
}

function enviar_nueva()
{
   var Area = $("#areas").find(':selected').val();
   var Servicio = $("#servicios").find(':selected').val();
   var Aplicacion = $("#aplicaciones").find(':selected').val();
   
   var Estado = '1';
   
   var Tipoparte = $("#tipoparte").find(':selected').val();
   var Parte = $("#numparte").val();
   
   var Tiporemedy = $("#tipo_remedy").find(':selected').val();
   var Remedy = $("#numremedy").val();
   
   var Tipoelemento = $("#tipo_elemento").find(':selected').val();
   var Elemento = $("#numelemento").val();
     
   var Tipocomentario = '0';
   var Comentario = $("#comentario").val();
   
   $("#nuevainc").dialog( "close" );
   
   var parametros = 
    {
        "Area" : Area,
        "Servicio" : Servicio,
        "Aplicacion" : Aplicacion,
        "Estado" : Estado,
        "Tipoparte" : Tipoparte,
        "Parte" : Parte,
        "Tiporemedy" : Tiporemedy,
        "Remedy" : Remedy,
        "Tipoelemento" : Tipoelemento,
        "Elemento" : Elemento,
        "Tipocomentario" : Tipocomentario,
        "Comentario" : Comentario
    };
    
    $.ajax
    (
        {
            data:  parametros,
            url:   'http://localhost/prepro/index.php/incidencias/new_incidencia',
            type:  'post',
            beforeSend: function () 
            {
                $("#listado").html("Cargando, espere por favor...");
            },
            success:  function (response) 
            {
                $("#listado").html(response);
            }
        }
    );
}

function nueva_incidencia()
{
        $("#nuevainc").dialog
        (
            {
                modal: true,
                width: 800,
                minWidth: 400,
                maxWidth: 900,
                show: "fold",
                hide: "scale"
            }
        );
}