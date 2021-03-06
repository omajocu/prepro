<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of helpdesk
 *
 * @author Administrador
 */
class Helpdesk extends CI_Controller
{
    public function index()
    {
        $this->load->model('helpdesk/Areas','',TRUE);
        $this->load->model('helpdesk/Servicios','',TRUE);
        $this->load->model('helpdesk/Aplicaciones','',TRUE);
        $this->load->model('helpdesk/Comentarios','',TRUE);
        $this->load->model('helpdesk/Elementos','',TRUE);
        $this->load->model('helpdesk/Estado','',TRUE);
        $this->load->model('helpdesk/Incidencias','',TRUE);
        $this->load->model('helpdesk/Partes','',TRUE);
        $this->load->model('helpdesk/Remedys','',TRUE);
        
        $this->load->view('helpdesk/Head');
        $this->load->view('helpdesk/Encabezado');
        
        $Incidencias = $this->Incidencias->GetAllIncidencias(1);
       
        If(count($Incidencias)!= 0)
        {
            for($Contador = 0; $Contador<count($Incidencias); $Contador++)
            {
                $Listado['debug'] = $Incidencias[$Contador]['IdIncidencia'];
                
                $Listado['IdIncidencia'] = $Incidencias[$Contador]['IdIncidencia'];
                $Listado['FechaApertura'] = $Incidencias[$Contador]['FechaApertura'];
                $Listado['Area'] = $this->Areas->GetAreaById($Incidencias[$Contador]['IdArea']);
                $Listado['Servicio'] = $this->Servicios->GetServicioById($Incidencias[$Contador]['IdServicio']);
                $Listado['Aplicacion'] = $this->Aplicaciones->GetAplicacionById($Incidencias[$Contador]['IdAplicacion']);
                $Listado['Estado'] = $this->Estado->GetEstadoById($Incidencias[$Contador]['IdEstado']);
                
                $Partes = $this->Partes->GetPartes($Incidencias[$Contador]['IdIncidencia']);
                
                $Listado['Partes'] ="";
                
                for($CuentaPartes = 0; $CuentaPartes < count($Partes); $CuentaPartes++)
                {
                    $Listado['Partes'] .= $Partes[$CuentaPartes]['TipoParte'] . " : " . $Partes[$CuentaPartes]['Parte'] . br(1);
                }
                
                $Remedys = $this->Remedys->GetRemedys($Incidencias[$Contador]['IdIncidencia']);
                
                $Listado['Remedys']="";
                
                for($CuentaRemedys = 0; $CuentaRemedys < count($Remedys); $CuentaRemedys++)
                {
                    $Listado['Remedys'] .= $Remedys[$CuentaRemedys]['TipoRemedy'] . " : " . $Remedys[$CuentaRemedys]['Remedy'] . br(1);
                }
                
                $Elementos = $this->Elementos->GetElementos($Incidencias[$Contador]['IdIncidencia']);
                
                $Listado['Elementos']="";
                
                for($CuentaElementos = 0; $CuentaElementos < count($Elementos); $CuentaElementos++)
                {
                    $Listado['Elementos'] .= $Elementos[$CuentaElementos]['TipoElemento'] . " : " . $Elementos[$CuentaElementos]['Elemento'] . br(1);
                }
                
                $Comentarios = $this->Comentarios->GetComentarios($Incidencias[$Contador]['IdIncidencia']);
                
                $Listado['Comentarios']="";
                
                for($CuentaComentarios = 0; $CuentaComentarios < count($Comentarios); $CuentaComentarios++)
                {
                    $Listado['Comentarios'] .= $Comentarios[$CuentaComentarios]['TipoComentario'] . " : " . $Comentarios[$CuentaComentarios]['Comentario'] . br(1);
                }
                
                $this->load->view('helpdesk/Incidencia', $Listado);
            }
        }
        else
        {
            $Warning['Texto'] = "No hay incidencia abiertas. ";
            
            $this->load->view('helpdesk/Warning', $Warning);
        }
        $Lista =  $this->Areas->GetAreas();
        $Lista [999] = "Selecciona una aplicacion";
        
        $IncidenciasAll ['ListadoAreas'] =  form_dropdown('Areas',$Lista , '999', 'id="Areas"');
        $IncidenciasAll ['TipoRemedy']= form_dropdown('TipoRemedy', $this->Remedys->GetTiporemedy(),'1', 'id="TipoRemedy"');
        $IncidenciasAll ['TipoElemento'] = form_dropdown('TipoElemento', $this->Elementos->GetTipoElemento(),'999', 'id="TipoElemento"');        
            
        $this->load->view('helpdesk/Footer', $IncidenciasAll);
    }
    
    public function EditaIncidencia()
    {
        $this->load->model('helpdesk/Areas','',TRUE);
        $this->load->model('helpdesk/Servicios','',TRUE);
        $this->load->model('helpdesk/Aplicaciones','',TRUE);
        $this->load->model('helpdesk/Comentarios','',TRUE);
        $this->load->model('helpdesk/Elementos','',TRUE);
        $this->load->model('helpdesk/Estado','',TRUE);
        $this->load->model('helpdesk/Incidencias','',TRUE);
        $this->load->model('helpdesk/Partes','',TRUE);
        $this->load->model('helpdesk/Remedys','',TRUE);
        
        $this->load->view('helpdesk/Head');
        
        $Incidencia = $this->Incidencias->GetIncidenciaById($_POST['IdIncidencia']);
       
        $Listado['debug'] = $Incidencia['IdIncidencia'];
                
        $Listado['IdIncidencia'] = $Incidencia['IdIncidencia'];
        $Listado['FechaApertura'] = $Incidencia['FechaApertura'];
        $Listado['Area'] = $this->Areas->GetAreaById($Incidencia['IdArea']);
        $Listado['Servicio'] = $this->Servicios->GetServicioById($Incidencia['IdServicio']);
        $Listado['Aplicacion'] = $this->Aplicaciones->GetAplicacionById($Incidencia['IdAplicacion']);
        $Listado['Estado'] = $this->Estado->GetEstadoById($Incidencia['IdEstado']);
        
        $Partes = $this->Partes->GetPartes($Incidencia['IdIncidencia']);
        $Listado['Partes'] = "";
        
        for($CuentaPartes = 0; $CuentaPartes < count($Partes); $CuentaPartes++)
        {
            $Opciones = '<a href="#" onclick="DelParte('. $Partes[$CuentaPartes]['IdParte'] . ', ' . $Incidencia['IdIncidencia'] . ')"><i class="icon-remove"></i></a>';
            $Listado['Partes'] .= $Partes[$CuentaPartes]['TipoParte'] . " : " . $Partes[$CuentaPartes]['Parte'] . " " . $Opciones . br(1);
        }
                
        $Remedys = $this->Remedys->GetRemedys($Incidencia['IdIncidencia']);
        $Listado['Remedys'] = "";  
        
        for($CuentaRemedys = 0; $CuentaRemedys < count($Remedys); $CuentaRemedys++)
        {
            $Opciones = '<a href="#" onclick="DelRemedy('. $Remedys[$CuentaRemedys]['IdRemedy'] . ', ' . $Incidencia['IdIncidencia'] . ')"><i class="icon-remove"></i></a>';
            $Listado['Remedys'] .= $Remedys[$CuentaRemedys]['TipoRemedy'] . " : " . $Remedys[$CuentaRemedys]['Remedy'] . " " . $Opciones . br(1);
        }
                
        $Elementos = $this->Elementos->GetElementos($Incidencia['IdIncidencia']);
        $Listado['Elementos'] = "";
                
        for($CuentaElementos = 0; $CuentaElementos < count($Elementos); $CuentaElementos++)
        {
            $Opciones = '<a href="#" onclick="DelElemento('. $Elementos[$CuentaElementos]['IdElemento'] . ', ' . $Incidencia['IdIncidencia'] . ')"><i class="icon-remove"></i></a>';
            $Listado['Elementos'] .= $Elementos[$CuentaElementos]['TipoElemento'] . " : " . $Elementos[$CuentaElementos]['Elemento'] . " " . $Opciones . br(1);
        }
                
        $Comentarios = $this->Comentarios->GetComentarios($Incidencia['IdIncidencia']);
        $Listado['Comentarios'] = "";
                
        for($CuentaComentarios = 0; $CuentaComentarios < count($Comentarios); $CuentaComentarios++)
        {
            $Opciones = '<a href="#" onclick="DelComentario('. $Comentarios[$CuentaComentarios]['IdComentario'] . ', ' . $Incidencia['IdIncidencia'] . ')"><i class="icon-remove"></i></a>';
            $Listado['Comentarios'] .= $Comentarios[$CuentaComentarios]['TipoComentario'] . " : " . $Comentarios[$CuentaComentarios]['Comentario'] . " " . $Opciones . br(1);
        }
        
        $this->load->view('helpdesk/EditIncidencia', $Listado);
         
        $Form['IdIncidencia'] = $Incidencia['IdIncidencia'];
        $Form['TipoParte'] = form_dropdown('TipoParte' . $Incidencia['IdIncidencia'], $this->Partes->GetTipoParte($Incidencia['IdAplicacion']), '999', 'id="TipoParte'.$Incidencia['IdIncidencia'].'"');
        $Form['TipoRemedy'] = form_dropdown('TipoRemedy' . $Incidencia['IdIncidencia'], $this->Remedys->GetTipoRemedy(),'1', 'id="TipoRemedy'.$Incidencia['IdIncidencia'].'"');
        $Form['TipoElemento'] = form_dropdown('TipoElemento' . $Incidencia['IdIncidencia'], $this->Elementos->GetTipoElemento(),'999', 'id="TipoElemento'.$Incidencia['IdIncidencia'].'"');
        $Form['CambioEstado'] = form_dropdown('CambioEstado' . $Incidencia['IdIncidencia'], $this->Estado->GetEstados(), $Incidencia['IdEstado'] , 'id="CambioEstado'.$Incidencia['IdIncidencia'].'"');
        
        $this->load->view('helpdesk/Formularios', $Form);
        $this->load->view('helpdesk/FooterIncidencia');
    }
    
    public function CargaIncidencia()
    {
        $this->load->model('helpdesk/Areas','',TRUE);
        $this->load->model('helpdesk/Servicios','',TRUE);
        $this->load->model('helpdesk/Aplicaciones','',TRUE);
        $this->load->model('helpdesk/Comentarios','',TRUE);
        $this->load->model('helpdesk/Elementos','',TRUE);
        $this->load->model('helpdesk/Estado','',TRUE);
        $this->load->model('helpdesk/Incidencias','',TRUE);
        $this->load->model('helpdesk/Partes','',TRUE);
        $this->load->model('helpdesk/Remedys','',TRUE);
        
        $this->load->view('helpdesk/Head');
        
        $Incidencia = $this->Incidencias->GetIncidenciaById($_POST['IdIncidencia']);
        
        $Listado['debug'] = $Incidencia['IdIncidencia'];
        
        $Listado['IdIncidencia'] = $Incidencia['IdIncidencia'];
        $Listado['FechaApertura'] = $Incidencia['FechaApertura'];
        $Listado['Area'] = $this->Areas->GetAreaById($Incidencia['IdArea']);
        $Listado['Servicio'] = $this->Servicios->GetServicioById($Incidencia['IdServicio']);
        $Listado['Aplicacion'] = $this->Aplicaciones->GetAplicacionById($Incidencia['IdAplicacion']);
        $Listado['Estado'] = $this->Estado->GetEstadoById($Incidencia['IdEstado']);
        
        $Partes = $this->Partes->GetPartes($Incidencia['IdIncidencia']);
        $Listado['Partes'] = "";
        
        for($CuentaPartes = 0; $CuentaPartes < count($Partes); $CuentaPartes++)
        {
            $Listado['Partes'] .= $Partes[$CuentaPartes]['TipoParte'] . " : " . $Partes[$CuentaPartes]['Parte'] . br(1);
        }
                
        $Remedys = $this->Remedys->GetRemedys($Incidencia['IdIncidencia']);
        $Listado['Remedys'] = "";  
        
        for($CuentaRemedys = 0; $CuentaRemedys < count($Remedys); $CuentaRemedys++)
        {
            $Listado['Remedys'] .= $Remedys[$CuentaRemedys]['TipoRemedy'] . " : " . $Remedys[$CuentaRemedys]['Remedy'] . br(1);
        }
                
        $Elementos = $this->Elementos->GetElementos($Incidencia['IdIncidencia']);
        $Listado['Elementos'] = "";
                
        for($CuentaElementos = 0; $CuentaElementos < count($Elementos); $CuentaElementos++)
        {
            $Listado['Elementos'] .= $Elementos[$CuentaElementos]['TipoElemento'] . " : " . $Elementos[$CuentaElementos]['Elemento'] . br(1);
        }
                
        $Comentarios = $this->Comentarios->GetComentarios($Incidencia['IdIncidencia']);
        $Listado['Comentarios'] = "";
                
        for($CuentaComentarios = 0; $CuentaComentarios < count($Comentarios); $CuentaComentarios++)
        {
            $Listado['Comentarios'] .= $Comentarios[$CuentaComentarios]['TipoComentario'] . " : " . $Comentarios[$CuentaComentarios]['Comentario'] . br(1);
        }
        
        $this->load->view('helpdesk/Incidencia', $Listado);
        $this->load->view('helpdesk/FooterIncidencia');
    }
    
    public function BorraIncidencia()
    {
        $this->load->model('helpdesk/Comentarios','',TRUE);
        $this->load->model('helpdesk/Elementos','',TRUE);
        $this->load->model('helpdesk/Incidencias','',TRUE);
        $this->load->model('helpdesk/Partes','',TRUE);
        $this->load->model('helpdesk/Remedys','',TRUE);
        
        $this->Incidencias->DelIncidencia($_POST['IdIncidencia']);
        $this->Partes->DelPartes($_POST['IdIncidencia']);
        $this->Remedys->DelRemedys($_POST['IdIncidencia']);
        $this->Elementos->DelElementos($_POST['IdIncidencia']);
        $this->Comentarios->DelComentarios($_POST['IdIncidencia']);
        
        echo"";
    }
    
    public function CreaIncidencia()
    {
        $this->load->model('helpdesk/Areas','',TRUE);
        $this->load->model('helpdesk/Servicios','',TRUE);
        $this->load->model('helpdesk/Aplicaciones','',TRUE);
        $this->load->model('helpdesk/Comentarios','',TRUE);
        $this->load->model('helpdesk/Elementos','',TRUE);
        $this->load->model('helpdesk/Estado','',TRUE);
        $this->load->model('helpdesk/Incidencias','',TRUE);
        $this->load->model('helpdesk/Partes','',TRUE);
        $this->load->model('helpdesk/Remedys','',TRUE);
        
        $IdNuevaIncidencia = $this->Incidencias->NewIncidencia($_POST['Area'], $_POST['Servicio'], $_POST['Aplicacion'], $_POST['Estado']);
        $this->Partes->NewParte($IdNuevaIncidencia, $_POST['TipoParte'], $_POST['Parte']);
        $this->Remedys->NewRemedy($IdNuevaIncidencia, $_POST['TipoRemedy'], $_POST['Remedy']);
        $this->Elementos->NewElemento($IdNuevaIncidencia, $_POST['TipoElemento'], $_POST['Elemento']);
        $this->Comentarios->NewComentario($IdNuevaIncidencia, $_POST['TipoComentario'], $_POST['Comentario']);
       
        $this->RefrescaListado();
    }
    
    public function RefrescaListado()
    {
        $this->load->model('helpdesk/Areas','',TRUE);
        $this->load->model('helpdesk/Servicios','',TRUE);
        $this->load->model('helpdesk/Aplicaciones','',TRUE);
        $this->load->model('helpdesk/Comentarios','',TRUE);
        $this->load->model('helpdesk/Elementos','',TRUE);
        $this->load->model('helpdesk/Estado','',TRUE);
        $this->load->model('helpdesk/Incidencias','',TRUE);
        $this->load->model('helpdesk/Partes','',TRUE);
        $this->load->model('helpdesk/Remedys','',TRUE);
        
        $this->load->view('helpdesk/Head');
        
        $Incidencias = $this->Incidencias->GetAllIncidencias(1);
       
        If(count($Incidencias)!= 0)
        {
            for($Contador = 0; $Contador<count($Incidencias); $Contador++)
            {
                $Listado['debug'] = $Incidencias[$Contador]['IdIncidencia'];
                
                $Listado['IdIncidencia'] = $Incidencias[$Contador]['IdIncidencia'];
                $Listado['FechaApertura'] = $Incidencias[$Contador]['FechaApertura'];
                $Listado['Area'] = $this->Areas->GetAreaById($Incidencias[$Contador]['IdArea']);
                $Listado['Servicio'] = $this->Servicios->GetServicioById($Incidencias[$Contador]['IdServicio']);
                $Listado['Aplicacion'] = $this->Aplicaciones->GetAplicacionById($Incidencias[$Contador]['IdAplicacion']);
                $Listado['Estado'] = $this->Estado->GetEstadoById($Incidencias[$Contador]['IdEstado']);
                
                $Partes = $this->Partes->GetPartes($Incidencias[$Contador]['IdIncidencia']);
                
                $Listado['Partes'] ="";
                
                for($CuentaPartes = 0; $CuentaPartes < count($Partes); $CuentaPartes++)
                {
                    $Listado['Partes'] .= $Partes[$CuentaPartes]['TipoParte'] . " : " . $Partes[$CuentaPartes]['Parte'] . br(1);
                }
                
                $Remedys = $this->Remedys->GetRemedys($Incidencias[$Contador]['IdIncidencia']);
                
                $Listado['Remedys']="";
                
                for($CuentaRemedys = 0; $CuentaRemedys < count($Remedys); $CuentaRemedys++)
                {
                    $Listado['Remedys'] .= $Remedys[$CuentaRemedys]['TipoRemedy'] . " : " . $Remedys[$CuentaRemedys]['Remedy'] . br(1);
                }
                
                $Elementos = $this->Elementos->GetElementos($Incidencias[$Contador]['IdIncidencia']);
                
                $Listado['Elementos']="";
                
                for($CuentaElementos = 0; $CuentaElementos < count($Elementos); $CuentaElementos++)
                {
                    $Listado['Elementos'] .= $Elementos[$CuentaElementos]['TipoElemento'] . " : " . $Elementos[$CuentaElementos]['Elemento'] . br(1);
                }
                
                $Comentarios = $this->Comentarios->GetComentarios($Incidencias[$Contador]['IdIncidencia']);
                
                $Listado['Comentarios']="";
                
                for($CuentaComentarios = 0; $CuentaComentarios < count($Comentarios); $CuentaComentarios++)
                {
                    $Listado['Comentarios'] .= $Comentarios[$CuentaComentarios]['TipoComentario'] . " : " . $Comentarios[$CuentaComentarios]['Comentario'] . br(1);
                }
                
                $this->load->view('helpdesk/Incidencia', $Listado);
            }
        }
        else
        {
            $Warning['Texto'] = "No hay incidencia abiertas. ";
            
            $this->load->view('helpdesk/Warning', $Warning);
        }
            
        $IncidenciasAll ['ListadoAreas'] =  form_dropdown('Areas', $this->Areas->GetAreas(), '999', 'id="Areas"');
        $IncidenciasAll ['TipoRemedy']= form_dropdown('TipoRemedy', $this->Remedys->GetTiporemedy(),'1', 'id="TipoRemedy"');
        $IncidenciasAll ['TipoElemento'] = form_dropdown('TipoElemento', $this->Elementos->GetTipoElemento(),'999', 'id="TipoElemento"');        
            
        $this->load->view('helpdesk/Footer', $IncidenciasAll);
    }


    public function GetListaServicios()
    {
        $this->load->model('helpdesk/Servicios','',TRUE);
        
        if($_POST['IdArea'] == 999)
        {
            $Listado = array('999' => 'Servicios');
            echo form_dropdown('Servicios',$Listado, '999', 'id="Servicios"');
        }
        else
        {
            $Lista = $this->Servicios->GetServicios($_POST['IdArea']);
            $Lista[999] = "Seleciona un Servicio";
            
            echo form_dropdown('Servicios', $Lista, '999', 'id="servicios"'); 
        }
    }
    
    public function GetListaAplicaciones()
    {
        $this->load->model('helpdesk/Aplicaciones','',TRUE);
        
    
        If($_POST['IdServicio'] != 999)
        {
            $Lista = $this->Aplicaciones->GetAplicaciones($_POST['IdServicio']);
            $Lista[999] = "Seleciona Una Aplicacion";
            
            echo form_dropdown('Aplicaciones', $Lista , '999', 'id="Aplicaciones"');
        }
        else
        {
            $Listado = array('999' => 'Aplicaciones');
            
            echo form_dropdown('Aplicaciones',$Listado, '999', 'id="Aplicaciones"');    
        }
    }
    
    public function GetListaTipoParte()
    {
        $this->load->model('helpdesk/Partes','',TRUE);
        
        if($_POST['IdAplicacion'] == 999)
        {
            $Listado = array('999' => 'Tipo de Parte');
            echo form_dropdown('tipoparte',$Listado, '999', 'id="tipoparte"');
        }
        else
        {
            echo form_dropdown('tipoparte', $this->Partes->GetTipoParte($_POST['IdAplicacion']), '999', 'id="tipoparte"'); 
        }
    }
    
    private function ActualizaPartes($IdIncidencia)
    {
        $this->load->model('helpdesk/Partes','',TRUE);
        
        $Incidencia = $this->Partes->GetPartes($IdIncidencia);
        
        $Lista['Objeto'] = "";
        
        for($i = 0;$i < count($Incidencia); $i++)
        {
            $Opciones = '<a href="#" onclick="DelParte(' . $Incidencia[$i]['IdParte'] . ', ' . $IdIncidencia . ')"><i class="icon-remove"></i></a>';
            $Lista['Objeto'] .= $Incidencia[$i]['TipoParte'] . " : " . $Incidencia[$i]['Parte'] . " " . $Opciones . br(1); 
        }
        $this->load->view('helpdesk/Body', $Lista);
    }
    
    public function CreaParte()
    {
        $this->load->model('helpdesk/Partes','',TRUE);
        $this->load->view('helpdesk/Head');
        
        $Resultado = $this->Partes->NewParte($_POST['IdIncidencia'], $_POST['TipoParte'], $_POST['Parte']);
        
        if($Resultado == 0)
        {
            $this->ActualizaPartes($_POST['IdIncidencia']);
        }
        else 
        {
            echo $Resultado;
        }
    }
    
    public function BorraParte()
    {
        $this->load->model('helpdesk/Partes','',TRUE);
        $this->load->view('helpdesk/Head');
   
        $this->Partes->DelParte($_POST['IdParte']);
        $this->ActualizaPartes($_POST['IdIncidencia']); 
    }
    
    private function ActualizaRemedys($IdIncidencia)
    {
        $this->load->model('helpdesk/Remedys','',TRUE);
        
        $Incidencia = $this->Remedys->GetRemedys($IdIncidencia);
        
        $Lista['Objeto'] = "";
        
        for($i = 0;$i < count($Incidencia); $i++)
        {
            $Opciones = '<a href="#" onclick="DelRemedy(' . $Incidencia[$i]['IdRemedy'] . ', ' . $IdIncidencia . ')"><i class="icon-remove"></i></a>';
            $Lista['Objeto'] .= $Incidencia[$i]['TipoRemedy'] . " : " . $Incidencia[$i]['Remedy'] . " " . $Opciones . br(1);
        }
        
        $this->load->view('helpdesk/Body', $Lista);
    }
    
    public function CreaRemedy()
    {
        $this->load->model('helpdesk/Remedys','',TRUE);
        $this->load->view('helpdesk/Head');
        
        $Resultado = $this->Remedys->NewRemedy($_POST['IdIncidencia'], $_POST['TipoRemedy'], $_POST['Remedy']);
        
        if($Resultado == 0)
        {
            $this->ActualizaRemedys($_POST['IdIncidencia']);
        }
        else 
        {
            echo $Resultado;
        }
    }
    
    public function BorraRemedy()
    {
        $this->load->model('helpdesk/Remedys','',TRUE);
        $this->load->view('helpdesk/Head');
        
        $this->Remedys->DelRemedy($_POST['IdRemedy']);
        $this->ActualizaRemedys($_POST['IdIncidencia']);
    }
    
    private function ActualizaElementos($IdIncidencia)
    {
        $this->load->model('helpdesk/Elementos','',TRUE);
        
        $Incidencia = $this->Elementos->GetElementos($IdIncidencia);
        
        $Lista['Objeto'] = "";
        
        for($i = 0;$i < count($Incidencia); $i++)
        {
            $Opciones = '<a href="#" onclick="DelElemento(' . $Incidencia[$i]['IdElemento'] . ', ' . $IdIncidencia . ')"><i class="icon-remove"></i></a>';
            $Lista['Objeto'] .= $Incidencia[$i]['TipoElemento'] . " : " . $Incidencia[$i]['Elemento'] . " " . $Opciones . br(1);
        }
        
        $this->load->view('helpdesk/Body', $Lista);
    }
    
    public function CreaElemento()
    {
        $this->load->model('helpdesk/Elementos','',TRUE);
        $this->load->view('helpdesk/Head');
        
        $Resultado = $this->Elementos->NewElemento($_POST['IdIncidencia'], $_POST['TipoElemento'], $_POST['Elemento']);
        
        if($Resultado == 0)
        {
            $this->ActualizaElementos($_POST['IdIncidencia']);
        }
        else 
        {
            echo $Resultado;
        }
    }
    
     public function BorraElemento()
    {
        $this->load->model('helpdesk/Elementos','',TRUE);
        $this->load->view('helpdesk/Head');
        
        $this->Elementos->DelElemento($_POST['IdElemento']);
        $this->ActualizaElementos($_POST['IdIncidencia']);
    }
    
    private function ActualizaComentarios($IdIncidencia)
    {
        $this->load->model('helpdesk/Comentarios','',TRUE);
        
        $Incidencia = $this->Comentarios->GetComentarios($IdIncidencia);
        
        $Lista['Objeto'] = "";
        
        for($i = 0;$i < count($Incidencia); $i++)
        {
            $Opciones = '<a href="#" onclick="DelComentario(' . $Incidencia[$i]['IdComentario'] . ', ' . $IdIncidencia . ')"><i class="icon-remove"></i></a>';
            $Lista['Objeto'] .= $Incidencia[$i]['TipoComentario'] . " : " . $Incidencia[$i]['Comentario'] . " " . $Opciones . br(1);
        }
        
        $this->load->view('helpdesk/Body', $Lista);
    }
    
    public function CreaComentario()
    {
        $this->load->model('helpdesk/Comentarios','',TRUE);
        $this->load->view('helpdesk/Head');
        
        $Resultado = $this->Comentarios->NewComentario($_POST['IdIncidencia'], $_POST['TipoComentario'], $_POST['Comentario']);
        
        if($Resultado == 0)
        {
            $this->ActualizaComentarios($_POST['IdIncidencia']);
        }
        else 
        {
            echo $Resultado;
        }
    }
    
    public function BorraComentario()
    {
        $this->load->model('helpdesk/Comentarios','',TRUE);
        $this->load->view('helpdesk/Head');
        
        $this->Comentarios->DelComentario($_POST['IdComentario']);
        $this->ActualizaComentarios($_POST['IdIncidencia']);
    }
    
    public function CambiaEstado()
    {
        $this->load->model('helpdesk/Incidencias','',TRUE);
                
        $this->Incidencias->CambiaEstado($_POST['IdIncidencia'], $_POST['NuevoEstado']);
        
        $this->RefrescaListado();
    }
    
    public function BuscarHistorico()
    {
        $this->load->model('helpdesk/Areas','',TRUE);
        $this->load->model('helpdesk/Servicios','',TRUE);
        $this->load->model('helpdesk/Aplicaciones','',TRUE);
        $this->load->model('helpdesk/Comentarios','',TRUE);
        $this->load->model('helpdesk/Elementos','',TRUE);
        $this->load->model('helpdesk/Estado','',TRUE);
        $this->load->model('helpdesk/Incidencias','',TRUE);
        $this->load->model('helpdesk/Partes','',TRUE);
        $this->load->model('helpdesk/Remedys','',TRUE);
        
        $this->load->view('helpdesk/Head');
        
        $IncidenciasAll ['ListadoAreas'] =  form_dropdown('Areas', $this->Areas->GetAreas(), '999', 'id="Areas"');
        $IncidenciasAll ['TipoRemedy']= form_dropdown('TipoRemedy', $this->Remedys->GetTiporemedy(),'1', 'id="TipoRemedy"');
        $IncidenciasAll ['TipoElemento'] = form_dropdown('TipoElemento', $this->Elementos->GetTipoElemento(),'999', 'id="TipoElemento"');        
            
        $this->load->view('helpdesk/Busqueda', $IncidenciasAll);
    }
    
    public function CreaConsulta()
    {
        if($_POST['FechaInicio'] != "" && $_POST['FechaFin'] != "")
        {
            $ConsultaFecha = "fecha_apertura=" . $_POST['FechaInicio'] . " AND fecha_cierre=". $_POST['FechaFin'];
        }
        
        if($_POST['Area'] != 999)
        {
            $ConsultaTipo = "inc_area.id=" . $_POST['Area'];
            
            if($_POST['Servicio'] != 999)
            {
                $ConsultaTipo .= " AND inc_servicio.id=" . $_POST['Servicio'];
                
                if($_POST['Aplicacion'] != 999)
                {
                    $ConsultaTipo .= " AND inc_aplicacion.id=" . $_POST['Aplicacion'];
                    
                    if ($_POST['TipoParte'] != 999)
                    {
                        $ConsultaTipo .= " AND inc_parte.tipo=" . $_POST['TipoParte'];
                        
                        if ($_POST['Parte'] != "")
                        {
                            $ConsultaTipo .= " AND inc_parte.numero_parte=" . $_POST['Parte'];
                        }
                    }
                }
            }
        } 
        
        if($_POST['Remedy'] != "")
        {
           $ConsultaRemedy = "tipo_remedy=". $_POST['TipoRemedy'] ." AND inc_remedys.remedy=" . $_POST['Remedy'];
        }
        
        if($_POST['TipoElemento'] != 999)
        {
            $ConsultaElemento = "tipo_elemento=" . $_POST['TipoElemento'];
            
            if($_POST['Elemento'] != "")
            {
                $ConsultaElemento .= " AND inc_elemento.elemento=" . $_POST['Elemento'];
            }
        }
        
        $Consulta = "";
        
        if (isset($ConsultaFecha) || isset($ConsultaTipo) || isset($ConsultaRemedy) || isset($ConsultaElemento))
        {
            $Consulta = " WHERE ";
            
            if(isset($ConsultaFecha))
            {
                $Consulta .= $ConsultaFecha;
                
                if(isset($ConsultaTipo))
                {
                    $Consulta .= " AND " . $ConsultaTipo;
                }
                
                if(isset($ConsultaRemedy))
                {
                    $Consulta .= " AND " . $ConsultaRemedy;
                }
                
                if(isset($ConsultaElemento))
                {
                    $Consulta .= " AND " . $ConsultaElemento;
                }
            }
            else 
            {
                if(isset($ConsultaTipo))
                {
                    $Consulta = $ConsultaTipo;
                    
                    if(isset($ConsultaRemedy))
                    {
                        $Consulta .= " AND " . $ConsultaRemedy;
                    }
                    
                    if(isset($ConsultaElemento))
                    {
                        $Consulta .= " AND " . $ConsultaElemento;
                    }
                }
                else
                {
                    if(isset($ConsultaRemedy))
                    {
                        $Consulta = $ConsultaRemedy;
                    
                        if(isset($ConsultaElemento))
                        {
                            $Consulta .= " AND " . $ConsultaElemento;
                        }
                    }
                    else
                    {
                        if(isset($ConsultaElemento))
                        {
                            $Consulta = $ConsultaElemento;
                        }
                    }
                }
            }
        }
        
        
        echo $Consulta;
        
    }
    
    public function AdminSelect()
    {
        $this->load->model('helpdesk/Areas','',TRUE);
        $this->load->model('helpdesk/Servicios','',TRUE);
        $this->load->model('helpdesk/Aplicaciones','',TRUE);
        $this->load->model('helpdesk/Elementos','',TRUE);
        $this->load->model('helpdesk/Partes','',TRUE);
        $this->load->model('helpdesk/Remedys','',TRUE);
        
        $this->load->view('helpdesk/Head');
        
        $Listado = $this->Areas->GetAreas();
        $Listado[999] = "Seleciona un Area";
        $Datos['ListadoAreas'] =  form_dropdown('ListaAreas', $Listado, '999', 'id="ListaAreas"');
        
        $Listado = $this->Servicios->GetServiciosAll();
        $Listado[999] = "Seleciona un Servicio";
        $Datos['ListadoServicios'] =  form_dropdown('ListaServicios', $Listado, '999', 'id="ListaServicios"');
        
        $Listado = $this->Aplicaciones->GetAplicacionesAll();
        $Listado[999] = "Selecciona una aplicacion";
        $Datos['ListadoAplicaciones'] = form_dropdown('ListaApp', $Listado, '999', 'id="ListaApp"');
        
        $Datos['ListadoPartes'] = form_dropdown('ListaPartes', $this->Partes->GetTipoParteAll(), '', 'id="ListaPartes" multiple size="6"');
        $Datos['ListadoRemedy'] = form_dropdown('ListaRemedy', $this->Remedys->GetTipoRemedy(), '', 'id="ListaRemedy" multiple size="6"');
        $Datos['ListadoElementos'] = form_dropdown('ListaElementos', $this->Elementos->GetTipoElemento(), '', 'id="ListaElementos" multiple size="6"');
        
        $this->load->view('helpdesk/AdminSelect', $Datos);
    }
    
    public function CreaArea()
    {
        $this->load->model('helpdesk/Areas','',TRUE);
        
        $this->Areas->NewArea($_POST['NuevoArea']);
        
        echo form_dropdown('ListaAreas', $this->Areas->GetAreas(), '999', 'id="ListaAreas"');
    }
    
    public function BorraArea()
    {
        $this->load->model('helpdesk/Areas','',TRUE);
        
        $this->Areas->DelArea($_POST['IdArea']);
        
        echo form_dropdown('ListaAreas', $this->Areas->GetAreas(), '999', 'id="ListaAreas"');
    }
    
    public function RefrescaArea()
    {
        $this->load->model('helpdesk/Servicios','',TRUE);
        
        $this->Servicios->PermisosArea($_POST['IdArea'],explode(',',$_POST['str']));
        
        echo form_dropdown('ListServicios', $this->Servicios->GetServiciosAll(), array_keys($this->Servicios->GetServicios($_POST['IdArea'])), 'id="ListServicios" multiple size="6"');
    }
    
    public function PermisosServicio()
    {
        $this->load->model('helpdesk/Servicios','',TRUE);
        
        echo form_dropdown('ListServicios', $this->Servicios->GetServiciosAll(), array_keys($this->Servicios->GetServicios($_POST['IdArea'])), 'id="ListServicios" multiple size="6"');
    }
    
    public function CreaServicio()
    {
        $this->load->model('helpdesk/Servicios','',TRUE);
        
        $this->Servicios->NewServicio($_POST['NuevoServicio']);
        
        echo form_dropdown('ListaServicios', $this->Servicios->GetServiciosAll(), '999', 'id="ListaServicios"');
    }
    
    public function BorraServicio()
    {
        $this->load->model('helpdesk/Servicios','',TRUE);
        
        $this->Servicios->DelServicio($_POST['IdServicio']);
        
        echo form_dropdown('ListaServicios', $this->Servicios->GetServiciosAll(), '999', 'id="ListaServicios"');
    }
    
    public function RefrescaServicio()
    {
        $this->load->model('helpdesk/Aplicaciones','',TRUE);
        
        $this->Aplicaciones->PermisosServicios($_POST['IdServicio'],explode(',',$_POST['str']));
        
        echo form_dropdown('ListAplicaciones', $this->Aplicaciones->GetAplicacionesAll(), array_keys($this->Aplicaciones->GetAplicaciones($_POST['IdServicio'])), 'id="ListAplicaciones" multiple size="6"');
    }
    
    public function PermisosAplicacion()
    {
        $this->load->model('helpdesk/Aplicaciones','',TRUE);
        
        echo form_dropdown('ListAplicaciones', $this->Aplicaciones->GetAplicacionesAll(), array_keys($this->Aplicaciones->GetAplicaciones($_POST['IdServicio'])), 'id="ListAplicaciones" multiple size="6"');
    }
    
    public function CreaAplicacion()
    {
        $this->load->model('helpdesk/Aplicaciones','',TRUE);
        
        $this->Aplicaciones->NewAplicacion($_POST['NuevaAplicacion']);
        
        echo form_dropdown('ListaApp', $this->Aplicaciones->GetAplicacionesAll(), '999', 'id="ListaApp"');
    }
    
    public function BorraAplicacion()
    {
        $this->load->model('helpdesk/Aplicaciones','',TRUE);
        
        $this->Aplicaciones->DelAplicacion($_POST['IdAplicacion']);
        
        echo form_dropdown('ListaApp', $this->Aplicaciones->GetAplicacionesAll(), '999', 'id="ListaApp"');
    }
    
    public function RefrescaPartes()
    {
        $this->load->model('helpdesk/Partes','',TRUE);
        
        $this->Partes->PermisosAplicaciones($_POST['IdAplicacion'],explode(',',$_POST['str']));
        
        echo form_dropdown('ListPartes', $this->Partes->GetTipoParteAll(), array_keys($this->Partes->GetTipoParte($_POST['IdAplicacion'])), 'id="ListPartes" multiple size="6"');
    }
    
    public function PermisosPartes()
    {
        $this->load->model('helpdesk/Partes','',TRUE);
        
        echo form_dropdown('ListPartes', $this->Partes->GetTipoParteAll(), array_keys($this->Partes->GetTipoParte($_POST['IdAplicacion'])), 'id="ListPartes" multiple size="6"');
    }
    
    public function CreaTipoParte()
    {
        $this->load->model('helpdesk/Partes','',TRUE);
        
        $this->Partes->NewTipoParte($_POST['NuevoTipoParte']);
        
        echo form_dropdown('ListaPartes', $this->Partes->GetTipoParteAll(), '', 'id="ListaPartes" multiple size="6"');
    }
    
    public function BorraTipoParte()
    {
        $this->load->model('helpdesk/Partes','',TRUE);
        
        $Listado = explode(',',$_POST['str']);
        
        foreach ($Listado as $row)
        {
            $this->Partes->DelTipoParte($row);
        }
        
        echo form_dropdown('ListaPartes', $this->Partes->GetTipoParteAll(), '', 'id="ListaPartes" multiple size="6"');
        
    }
    
    public function CreaTipoRemedy()
    {
        $this->load->model('helpdesk/Remedys','',TRUE);
        
        $this->Remedys->NewTipoRemedy($_POST['NuevoTipoRemedy']);
        
        echo form_dropdown('ListaRemedy', $this->Remedys->GetTipoRemedy(), '', 'id="ListaRemedy" multiple size="6"');
    }
    
    public function BorraTipoRemedy()
    {
        $this->load->model('helpdesk/Remedys','',TRUE);
        
        $Listado = explode(',',$_POST['str']);
        
        foreach ($Listado as $row)
        {
            $this->Remedys->DelTipoRemedy($row);
        }
        
        echo form_dropdown('ListaRemedy', $this->Remedys->GetTipoRemedy(), '', 'id="ListaRemedy" multiple size="6"');
        
    }
    
    public function CreaTipoElemento()
    {
        $this->load->model('helpdesk/Elementos','',TRUE);
        
        $this->Elementos->NewTipoElemento($_POST['NuevoTipoElemento']);
        
        echo form_dropdown('ListaElementos', $this->Elementos->GetTipoElemento(), '', 'id="ListaElementos" multiple size="6"');
        
    }
    
    public function BorraTipoElemento()
    {
        $this->load->model('helpdesk/Elementos','',TRUE);
        
        $Listado = explode(',',$_POST['str']);
        
        foreach ($Listado as $row)
        {
            $this->Elementos->DelTipoElemento($row);
        }
        
        echo form_dropdown('ListaElementos', $this->Elementos->GetTipoElemento(), '', 'id="ListaElementos" multiple size="6"');
        
        
    }
}

?>
