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
            
        $IncidenciasAll ['ListadoAreas'] =  form_dropdown('Areas', $this->Areas->GetAreas(), '999', 'id="Areas"');
        $IncidenciasAll ['TipoRemedy']= form_dropdown('tiporemedy', $this->Remedys->GetTiporemedy(),'1', 'id="tiporemedy"');
        $IncidenciasAll ['TipoElemento'] = form_dropdown('tipoelemento', $this->Elementos->GetTipoElemento(),'999', 'id="tipoelemento"');        
            
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
        
        //$this->load->view('helpdesk/Head');
        
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
            $Listado['Elementos'] = $Elementos[$CuentaElementos]['TipoElemento'] . " : " . $Elementos[$CuentaElementos]['Elemento'] . " " . $Opciones . br(1);
        }
                
        $Comentarios = $this->Comentarios->GetComentarios($Incidencia['IdIncidencia']);
        $Listado['Comentarios'] = "";
                
        for($CuentaComentarios = 0; $CuentaComentarios < count($Comentarios); $CuentaComentarios++)
        {
            $Opciones = '<a href="#" onclick="DelComentario('. $Comentarios[$CuentaComentarios]['IdComentario'] . ', ' . $Incidencia['IdIncidencia'] . ')"><i class="icon-remove"></i></a>';
            $Listado['Comentarios'] = $Comentarios[$CuentaComentarios]['TipoComentario'] . " : " . $Comentarios[$CuentaComentarios]['Comentario'] . " " . $Opciones . br(1);
        }
        
        $this->load->view('helpdesk/EditIncidencia', $Listado);
         
        $Form['IdIncidencia'] = $Incidencia['IdIncidencia'];
        $Form['TipoParte'] = form_dropdown('TipoParte' . $Incidencia['IdIncidencia'], $this->Partes->GetTipoParte($Incidencia['IdAplicacion']), '999', 'id="TipoParte'.$Incidencia['IdIncidencia'].'"');
        $Form['TipoRemedy'] = form_dropdown('TipoRemedy' . $Incidencia['IdIncidencia'], $this->Remedys->GetTipoRemedy(),'1', 'id="TipoRemedy'.$Incidencia['IdIncidencia'].'"');
        $Form ['TipoElemento'] = form_dropdown('TipoElemento' . $Incidencia['IdIncidencia'], $this->Elementos->GetTipoElemento(),'999', 'id="TipoElemento'.$Incidencia['IdIncidencia'].'"');
       
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
            $Listado['Elementos'] = $Elementos[$CuentaElementos]['TipoElemento'] . " : " . $Elementos[$CuentaElementos]['Elemento'] . br(1);
        }
                
        $Comentarios = $this->Comentarios->GetComentarios($Incidencia['IdIncidencia']);
        $Listado['Comentarios'] = "";
                
        for($CuentaComentarios = 0; $CuentaComentarios < count($Comentarios); $CuentaComentarios++)
        {
            $Listado['Comentarios'] = $Comentarios[$CuentaComentarios]['TipoComentario'] . " : " . $Comentarios[$CuentaComentarios]['Comentario'] . br(1);
        }
        
        $this->load->view('helpdesk/Incidencia', $Listado);
        $this->load->view('helpdesk/FooterIncidencia');
    }
    
    public function BorraIncidencia()
    {
        $this->load->model('helpdesk/Incidencias','',TRUE);
        
        $this->Incidencias->DelIncidencia($_POST['IdIncidencia']);
        
        echo"";
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
            
            echo form_dropdown('Servicios', $this->Servicios->GetServicios($_POST['IdArea']), '999', 'id="servicios"'); 
        }
    }
    
    public function GetListaAplicaciones()
    {
        $this->load->model('helpdesk/Aplicaciones','',TRUE);
        
    
        If($_POST['IdArea'] != 999 && $_POST['IdServicio'] != 999)
        {
            echo form_dropdown('Aplicaciones', $this->Aplicaciones->GetAplicaciones($_POST['IdArea'],$_POST['IdServicio']), '999', 'id="Aplicaciones"');
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
            
            $this->load->view('helpdesk/Body', $Lista);
        }
    }
    
    public function CreaRemedy()
    {
        $this->load->model('helpdesk/Remedys','',TRUE);
        $this->load->view('helpdesk/Head');
        
        $Resultado = $this->Remedys->NewRemedy($_POST['Idincidencia'], $_POST['TipoRemedy'], $_POST['Remedy']);
        
        if($Resultado == 0)
        {
            $this->ActualizaRemedys($_POST['Idincidencia']);
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
        
        $this->Partes->DelRemedy($_POST['IdRemedy']);
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
            
            $this->load->view('helpdesk/Body', $Lista);
        }
    }
    
    public function CreaElemento()
    {
        $this->load->model('helpdesk/Elementos','',TRUE);
        $this->load->view('helpdesk/Head');
        
        $Resultado = $this->Elementos->NewElemento($_POST['Idincidencia'], $_POST['TipoElemento'], $_POST['Elemento']);
        
        if($Resultado == 0)
        {
            $this->ActualizaElementos($_POST['Idincidencia']);
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
            
            $this->load->view('helpdesk/Body', $Lista);
        }
    }
    
    public function CreaComentario()
    {
        $this->load->model('helpdesk/Comentarios','',TRUE);
        $this->load->view('helpdesk/Head');
        
        $Resultado = $this->Comentarios->NewComentario($_POST['Idincidencia'], $_POST['TipoComentario'], $_POST['Comentario']);
        
        if($Resultado == 0)
        {
            $this->ActualizaComentarios($_POST['Idincidencia']);
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
        
        $this->Comentarios->DelComentario($_POST['IdElemento']);
        $this->ActualizaComentarios($_POST['IdIncidencia']);
    }
}

?>
