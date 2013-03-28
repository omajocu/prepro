    
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
            url:   'http://localhost/prepro/index.php/Helpdesk/CreaRemedy',
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
            url:   'http://localhost/prepro/index.php/Helpdesk/CreaElemento',
            type:  'post',
            beforeSend: function () 
            {
                $("#Elementos"+IdIncidencia).html("Cargando, espere por favor...");
            },
            success:  function (response) 
            {
                $("#Elementos"+IdIncidencia).html(response);
                $("#TipoElemento"+IdIncidencia).prop("selectedIndex",999);
                $("#Elelemento"+IdIncidencia).val("");
            }
        }
    );
}

function DelElemento(IdElemento, IdIncidencia)
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
            url:   'http://localhost/prepro/index.php/Helpdesk/BorraElemento',
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
    var TipoComentario = 1;
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
            url:   'http://localhost/prepro/index.php/Helpdesk/CreaComentario',
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
            url:   'http://localhost/prepro/index.php/Helpdesk/BorraComentario',
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

function NuevaIncidencia()
{
       $("#NuevaIncidencia").dialog
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
                        GuardaIncidencia();
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

function GuardaIncidencia()
{
   var Area = $("#Areas").find(':selected').val();
   var Servicio = $("#Servicios").find(':selected').val();
   var Aplicacion = $("#Aplicaciones").find(':selected').val();
   
   var Estado = '1';
   
   var TipoParte = $("#TipoParte").find(':selected').val();
   var Parte = $("#NumeroParte").val();
   
   var TipoRemedy = $("#TipoRemedy").find(':selected').val();
   var Remedy = $("#NumeroRemedy").val();
   
   var TipoElemento = $("#TipoElemento").find(':selected').val();
   var Elemento = $("#NumeroElemento").val();
     
   var TipoComentario = '0';
   var Comentario = $("#NuevoComentario").val();
     
   var parametros = 
    {
        "Area" : Area,
        "Servicio" : Servicio,
        "Aplicacion" : Aplicacion,
        "Estado" : Estado,
        "TipoParte" : TipoParte,
        "Parte" : Parte,
        "TipoRemedy" : TipoRemedy,
        "Remedy" : Remedy,
        "TipoElemento" : TipoElemento,
        "Elemento" : Elemento,
        "TipoComentario" : TipoComentario,
        "Comentario" : Comentario
    };
    
    $.ajax
    (
        {
            data:  parametros,
            url:   'http://localhost/prepro/index.php/Helpdesk/CreaIncidencia',
            type:  'post',
            beforeSend: function () 
            {
                $("#Listado").html("Cargando, espere por favor...");
            },
            success:  function (response) 
            {
                $("#Listado").html(response);
                
                $("#Areas").prop("selectedIndex",999);
                $("#Servicios").prop("selectedIndex",999);
                $("#Aplicaciones").prop("selectedIndex",999);
   
                $("#TipoParte").prop("selectedIndex",999);
                $("#NumeroParte").val("");
   
                $("#TipoRemedy").prop("selectedIndex",1);
                $("#NumeroRemedy").val("");
   
                $("#TipoElemento").prop("selectedIndex",999);
                $("#NumeroElemento").val("");
     
                $("#NuevoComentario").val("");
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

function CambiaEstado(IdIncidencia)
{        
    $("#ActualizaEstado"+IdIncidencia).dialog
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
                        GuardaEstado(IdIncidencia);
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

function GuardaEstado(IdIncidencia)
{    
    var NuevoEstado = $("#CambioEstado"+IdIncidencia).find(':selected').val();
    
    var parametros = 
    {
        "IdIncidencia" : IdIncidencia,
        "NuevoEstado" : NuevoEstado
    };
    
    $.ajax
    (
        {
            data:  parametros,
            url:   'http://localhost/prepro/index.php/Helpdesk/CambiaEstado',
            type:  'post',
            beforeSend: function () 
            {
                $("#Listado").html("Cargando, espere por favor...");
            },
            success:  function (response) 
            {
                $("#Listado").html(response);
            }
        }
    );
}

function BuscaCerradas()
{    
    $.ajax
    (
        {
            url:   'http://localhost/prepro/index.php/Helpdesk/BuscarHistorico',
            type:  'post',
            beforeSend: function () 
            {
                $("#Listado").html("<img src='images/preloader-w8-line-black.gif' />");
            },
            success:  function (response) 
            {
                $("#Listado").html(response);
                
            }
        }
    );
}

function BuscarDatos()
{    
    var FechaInicio = $("#FechaInicio").val();
    var FechaFin = $("#FechaFin").val();
    
    var Area = $("#Areas").find(':selected').val();
    var Servicio = $("#Servicios").find(':selected').val();
    var Aplicacion = $("#Aplicaciones").find(':selected').val();
   
    var TipoParte = $("#TipoParte").find(':selected').val();
    var Parte = $("#NumeroParte").val();
   
    var TipoRemedy = $("#TipoRemedy").find(':selected').val();
    var Remedy = $("#NumeroRemedy").val();
   
    var TipoElemento = $("#TipoElemento").find(':selected').val();
    var Elemento = $("#NumeroElemento").val();
     
    
    var BuscarPalabra = $("#BuscarPalabra").val();
    
    var parametros = 
    {
        "FechaInicio" : FechaInicio,
        "FechaFin" : FechaFin,
        "Area" : Area,
        "Servicio" : Servicio,
        "Aplicacion" : Aplicacion,
        "TipoParte" : TipoParte,
        "Parte" : Parte,
        "TipoRemedy" : TipoRemedy,
        "Remedy" : Remedy,
        "TipoElemento" : TipoElemento,
        "Elemento" : Elemento,
        "BuscarPalabra" : BuscarPalabra
    };
    
    $.ajax
    (
        {
            data:  parametros,
            url:   'http://localhost/prepro/index.php/Helpdesk/CreaConsulta',
            type:  'post',
            beforeSend: function () 
            {
                $("#Listado").html("Cargando, espere por favor...");
            },
            success:  function (response) 
            {
                $("#Listado").html(response);
            }
        }
    );
}

function SelecAdmin()
{    
    $.ajax
    (
        {
            url:   'http://localhost/prepro/index.php/Helpdesk/AdminSelect',
            type:  'post',
            beforeSend: function () 
            {
                $("#Listado").html("<img src='images/preloader-w8-line-black.gif' />");
            },
            success:  function (response) 
            {
                $("#Listado").html(response);
                
            }
        }
    );
}



$(
    function() 
    {
        $( "#FechaInicio" ).datepicker
        ({
            defaultDate: "+1w",
            changeMonth: false,
            numberOfMonths: 1,
            dateFormat: "yy-mm-dd",
            onClose: 
                function( selectedDate ) 
                {
                    $( "#FechaFin" ).datepicker( "option", "minDate", selectedDate );
                }
        });
        $( "#FechaFin" ).datepicker
        ({
            defaultDate: "+1w",
            changeMonth: false,
            numberOfMonths: 1,
            dateFormat: "yy-mm-dd",
            onClose: 
                function( selectedDate ) 
                {
                    $( "#FechaInicio" ).datepicker( "option", "maxDate", selectedDate );
                }
        });
    }
);
  
$(
    function() 
    {
        $( "#tabs" ).tabs();
    }
);
    
    $(
    function() 
    {
        $( "#tabsadmin" ).tabs();
    }
);

$(function() 
    {
        $( document ).tooltip();
    });

function TodoOk(Texto) {
  	var n = noty({
  		text: Texto,
  		type: 'success',
                dismissQueue: true,
  		layout: 'center',
                modal: true,
  		theme: 'defaultTheme'
  	});
  }
  
function Error(Texto) {
  	var n = noty({
  		text: Texto,
  		type: 'error',
                dismissQueue: true,
  		layout: 'center',
                modal: true,
  		theme: 'defaultTheme'
  	});
  }
 
 function Informacion(Texto) {
  	var n = noty({
  		text: Texto,
  		type: 'information',
                dismissQueue: true,
  		layout: 'center',
                modal: true,
  		theme: 'defaultTheme'
  	});
  }
  
function Alerta(Texto) {
  	var n = noty({
  		text: Texto,
  		type: 'warning',
                dismissQueue: true,
  		layout: 'center',
                modal: true,
  		theme: 'defaultTheme'
  	});
  }
  
  function AddArea()
  {
      var NuevoArea = $("#AddArea").val();
      
      var parametros = 
    {
        "NuevoArea" : NuevoArea
    };
   
    $.ajax
    (
        {
            data:  parametros,
            url:   'http://localhost/prepro/index.php/Helpdesk/CreaArea',
            type:  'post',
            beforeSend: function () 
            {
                $("#ListaAreas").html("<img src='images/preloader-w8-line-black.gif' />");
            },
            success:  function (response) 
            {
                $("#ListaAreas").html(response);
                $("#AddArea").val("");
            }
        }
    );
  }
  
  function DelArea()
  {
      var IdArea = $("#ListaAreas").find(':selected').val();
      
      var parametros = 
    {
        "IdArea" : IdArea
    };
    
    $.ajax
    (
        {
            data:  parametros,
            url:   'http://localhost/prepro/index.php/Helpdesk/BorraArea',
            type:  'post',
            beforeSend: function () 
            {
                $("#ListaAreas").html("<img src='images/preloader-w8-line-black.gif' />");
            },
            success:  function (response) 
            {
                $("#ListaAreas").html(response);
            }
        }
    );
  }
  
  $(document).ready
(
    function()
    {
        $("#ListaAreas").change
        (
            function(event)
            {
                var IdArea = $("#ListaAreas").find(':selected').val();
                
            
                var parametros = 
                {
                    "IdArea" : IdArea
                    
                }; 
    
                $.ajax
                (   
                    {
                        data:  parametros,
                        url:   'http://localhost/prepro/index.php/helpdesk/PermisosServicio',
                        type:  'post',
                        beforeSend: function () 
                        {
                            $("#ListServicios").html("<img src='images/preloader-w8-line-black.gif' />");
                        },
                        success:  function (response) 
                        {
                            $("#ListServicios").html(response);
                        }
                    }
                );        
            }
        );
    }
);
    
function RefreshParmisoArea()
{
    var IdArea = $("#ListaAreas").find(':selected').val();
    var str = $("#ListServicios").val() || [];
    str = str.join(",");      
    
    var parametros = 
    {
        "str" : str,
        "IdArea" : IdArea
    };
    
    $.ajax
    (
        {
            data:  parametros,
            url:   'http://localhost/prepro/index.php/Helpdesk/RefrescaArea',
            type:  'post',
            beforeSend: function () 
            {
                $("#ListServicios").html("<img src='images/preloader-w8-line-black.gif' />");
            },
            success:  function (response) 
            {
                $("#ListServicios").html(response);
            }
        }
    );
}

function AddServicio()
{
      var NuevoServicio = $("#AddServicio").val();
      
      var parametros = 
    {
        "NuevoServicio" : NuevoServicio
    };
   
    $.ajax
    (
        {
            data:  parametros,
            url:   'http://localhost/prepro/index.php/Helpdesk/CreaServicio',
            type:  'post',
            beforeSend: function () 
            {
                $("#ListaServicios").html("<img src='images/preloader-w8-line-black.gif' />");
            },
            success:  function (response) 
            {
                $("#ListaServicios").html(response);
                $("#AddServicio").val("");
            }
        }
    );
  }
  
  function DelServicio()
  {
      var IdServicio = $("#ListaServicios").find(':selected').val();
      
      var parametros = 
    {
        "IdServicio" : IdServicio
    };
    
    $.ajax
    (
        {
            data:  parametros,
            url:   'http://localhost/prepro/index.php/Helpdesk/BorraServicio',
            type:  'post',
            beforeSend: function () 
            {
                $("#ListaServicios").html("<img src='images/preloader-w8-line-black.gif' />");
            },
            success:  function (response) 
            {
                $("#ListaServicios").html(response);
            }
        }
    );
  }
  
  $(document).ready
(
    function()
    {
        $("#ListaServicios").change
        (
            function(event)
            {
                var IdServicio = $("#ListaServicios").find(':selected').val();
                
            
                var parametros = 
                {
                    "IdServicio" : IdServicio
                    
                }; 
    
                $.ajax
                (   
                    {
                        data:  parametros,
                        url:   'http://localhost/prepro/index.php/helpdesk/PermisosAplicacion',
                        type:  'post',
                        beforeSend: function () 
                        {
                            $("#ListAplicaciones").html("<img src='images/preloader-w8-line-black.gif' />");
                        },
                        success:  function (response) 
                        {
                            $("#ListAplicaciones").html(response);
                        }
                    }
                );        
            }
        );
    }
);
    
function RefreshPermisoServicio() 
{
    var IdServicio = $("#ListaServicios").find(':selected').val();
    var str = $("#ListAplicaciones").val() || [];
    str = str.join(",");      
    
    var parametros = 
    {
        "str" : str,
        "IdServicio" : IdServicio
    };
    
    $.ajax
    (
        {
            data:  parametros,
            url:   'http://localhost/prepro/index.php/Helpdesk/RefrescaServicio',
            type:  'post',
            beforeSend: function () 
            {
                $("#ListAplicaciones").html("<img src='images/preloader-w8-line-black.gif' />");
            },
            success:  function (response) 
            {
                $("#ListAplicaciones").html(response);
            }
        }
    );
}

/* de aqui */

function AddAplicacion()
{
      var NuevaAplicacion = $("#AddAplicacion").val();
      
      var parametros = 
    {
        "NuevaAplicacion" : NuevaAplicacion
    };
   
    $.ajax
    (
        {
            data:  parametros,
            url:   'http://localhost/prepro/index.php/Helpdesk/CreaAplicacion',
            type:  'post',
            beforeSend: function () 
            {
                $("#ListaApp").html("<img src='images/preloader-w8-line-black.gif' />");
            },
            success:  function (response) 
            {
                $("#ListaApp").html(response);
                $("#AddAplicacion").val("");
            }
        }
    );
  }
  
  function DelAplicacion()
  {
      var IdAplicacion = $("#ListaApp").find(':selected').val();
      
      var parametros = 
    {
        "IdAplicacion" : IdAplicacion
    };
    
    $.ajax
    (
        {
            data:  parametros,
            url:   'http://localhost/prepro/index.php/Helpdesk/BorraAplicacion',
            type:  'post',
            beforeSend: function () 
            {
                $("#ListaApp").html("<img src='images/preloader-w8-line-black.gif' />");
            },
            success:  function (response) 
            {
                $("#ListaApp").html(response);
            }
        }
    );
  }
  
  $(document).ready
(
    function()
    {
        $("#ListaApp").change
        (
            function(event)
            {
                var IdAplicacion = $("#ListaApp").find(':selected').val();
                
            
                var parametros = 
                {
                    "IdAplicacion" : IdAplicacion
                    
                }; 
    
                $.ajax
                (   
                    {
                        data:  parametros,
                        url:   'http://localhost/prepro/index.php/helpdesk/PermisosPartes',
                        type:  'post',
                        beforeSend: function () 
                        {
                            $("#ListPartes").html("<img src='images/preloader-w8-line-black.gif' />");
                        },
                        success:  function (response) 
                        {
                            $("#ListPartes").html(response);
                        }
                    }
                );        
            }
        );
    }
);
    
function RefreshPermisoApp()
{
    var IdAplicacion = $("#ListaAplicaciones").find(':selected').val();
    var str = $("#ListPartes").val() || [];
    str = str.join(",");      
    
    var parametros = 
    {
        "str" : str,
        "IdAplicacion" : IdAplicacion
    };
    
    $.ajax
    (
        {
            data:  parametros,
            url:   'http://localhost/prepro/index.php/Helpdesk/RefrescaPartes',
            type:  'post',
            beforeSend: function () 
            {
                $("#ListPartes").html("<img src='images/preloader-w8-line-black.gif' />");
            },
            success:  function (response) 
            {
                $("#ListPartes").html(response);
            }
        }
    );
}