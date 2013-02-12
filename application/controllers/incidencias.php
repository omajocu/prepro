<?php

/**
 * @author Oscar
 * @copyright 2012
 */

class Incidencias extends CI_Controller 
{
    public function index()
    {
        $this->load->model('Incidenciasdb','',TRUE);
        $this->load->helper('url');
        
        $datos ['incidencia'] = $this->Incidenciasdb->show_incidencias();
            
        $option = 'id="areas"';
        $datos ['contenido'] = form_dropdown('areas', $this->Incidenciasdb->get_areas(), '999', $option);
        $option = 'id="tipo_remedy"';
        $datos ['tipo_remedy'] = form_dropdown('tipo_remedy', $this->Incidenciasdb->get_tiporemedy(),'1',$option);
        $option = 'id="estados"';
        $datos ['estado'] = form_dropdown('estados', $this->Incidenciasdb->get_estado(),'1',$option);
        $option = 'id="tipo_elemento"';
        $datos ['tipo_elemento'] = form_dropdown('tipo_elemento', $this->Incidenciasdb->get_tipoelemento(),'999',$option);        
        $option ='id="nuevo_tipo_parte"';
        $datos['nuevo_tipo_parte'] = form_dropdown('nuevo_tipo_parte', $this->Incidenciasdb->get_tipoparte(NULL),'999',$option);
        
        $this->load->view('gesincidencia',$datos);
    }
    /** Pendiente de desarrollo */
    public function update_incidencia()
    {
        $Id_incidencia = $_POST['Idincidencia'];
        $Estado = $_POST['Estado'];
        
        $this->load->model('Incidenciasdb','',TRUE);
        $this->load->helper('url');
        
        $datos ['incidencia'] = $this->Incidenciasdb->edita_incidencia($Id_incidencia);
          
        if($Estado == 0)
        {
            $this->load->view('updateincidencia',$datos);
        }
        else
        {
            $this->load->view('saveincidencia',$datos);
        }
    }
    
    public function cargar_servicios()
    {
        $IdArea = $_POST['IdTipo'];
        
        $this->load->model('Incidenciasdb','',TRUE);
        $this->load->helper('url');
        
        if($IdArea == 999)
        {
            $listado = array('999' => 'Servicios');
            
            $js = 'id="servicios"';
            echo form_dropdown('servicios',$listado, '999', $js);
        }
        else
        {
            $js = 'id="servicios"';
            echo form_dropdown('servicios', $this->Incidenciasdb->get_servicios($IdArea), '999', $js); 
        }
        
        
    }
    
    public function cargar_aplicaciones()
    {
        $IdArea = $_POST['IdTipo'];
        $IdServicio = $_POST['IdServicio'];
        
        $this->load->model('Incidenciasdb','',TRUE);
        $this->load->helper('url');
        
        If($IdArea != 999 && $IdServicio != 999)
        {
            $js = 'id="aplicaciones"';
            echo form_dropdown('aplicaciones', $this->Incidenciasdb->get_aplicaciones($IdArea,$IdServicio), '999', $js);

        }
        else
        {
            $listado = array('999' => 'Aplicaciones');
            
            $js = 'id="aplicaciones"';
            echo form_dropdown('aplicaciones',$listado, '999', $js);    
        }
    }
    
    public function cargar_tipoparte()
    {
        $IdParte = $_POST['IdTipo'];
        
        $this->load->model('Incidenciasdb','',TRUE);
        $this->load->helper('url');
        
        if($IdParte == 999)
        {
            $listado = array('999' => 'Tipo');
            
            $js = 'id="tipoparte"';
            echo form_dropdown('tipoparte',$listado, '999', $js);
        }
        else
        {
            $js = 'id="tipoparte"';
            echo form_dropdown('tipoparte', $this->Incidenciasdb->get_tipoparte($IdParte), '999', $js); 
        }

    }
    
    public function nueva()
    {
        $this->load->model('Incidenciasdb','',TRUE);
        $this->load->helper('url');
        
        $js = 'id="areas"';
        $data ['contenido'] = form_dropdown('areas', $this->Incidenciasdb->get_areas(), '999', $js);
        $data ['tipo_remedy'] = form_dropdown('tipo_remedy', $this->Incidenciasdb->get_tiporemedy(),'1');
        $data ['estado'] = form_dropdown('estados', $this->Incidenciasdb->get_estado(),'1');
        $data ['tipo_elemento'] = form_dropdown('tipo_elemento', $this->Incidenciasdb->get_tipoelemento(),'999');        
        $this->load->view('nueva_inc', $data);
        
    }
    
    function new_incidencia()
    {
        $this->load->model('Incidenciasdb','',TRUE);
        $this->load->helper('url');
        
        $incidencia['area'] = $_POST['Area'];
        $incidencia['servicio'] = $_POST['Servicio'];
        $incidencia['aplicacion'] = $_POST['Aplicacion'];
        $incidencia['estado'] = $_POST['Estado'];
        
        $incidencia['tipoparte'] = $_POST['Tipoparte'];
        $incidencia['parte'] = $_POST['Parte'];
        
        $incidencia['tipo_remedy'] = $_POST['Tiporemedy'];
        $incidencia['remedy'] = $_POST['Remedy'];
        
        $incidencia['tipo_elemento'] = $_POST['Tipoelemento'];
        $incidencia['elemento'] = $_POST['Elemento'];
        
        $incidencia['tipo_comentario'] = $_POST['Tipocomentario'];
        $incidencia['comentario'] = $_POST['Comentario'];
        
        $resultado = $this->Incidenciasdb->set_incidencia($incidencia);
        
       
        $datos ['incidencia'] = $this->Incidenciasdb->show_incidencias();
          
        $this->load->view('saveincidencia',$datos);
    }
    
    function borra_parte()
    {
        $Id_parte = $_POST['Idparte'];
        $Id_incidencia = $_POST['Idincidencia'];
        
        $this->load->model('Incidenciasdb','',TRUE);
        $this->load->helper('url');
        
        $this->Incidenciasdb->del_partes($Id_parte);
        $incidencia = $this->Incidenciasdb->show_partes($Id_incidencia);
        
        for($i = 0;$i < count($incidencia); $i++)
        {
			echo $incidencia[$i]['tipo_parte'].' : ';
            echo $incidencia[$i]['numero_parte'].' ';
			echo '<a href="#" onclick="borra_parte(';
            echo $incidencia[$i]['id'].', ';
            echo $Id_incidencia;
            echo ')"><i class="icon-remove"></i></a><br>';
        }
    }
    
    function inserta_parte($id_aplicacion, $id_incidencia)
    {
        $this->load->model('Incidenciasdb','',TRUE);
        $this->load->helper('url');
        
        $js = 'id="tipoparte"';   
        $data['contenido'] = form_dropdown('tipoparte', $this->Incidenciasdb->get_tipoparte($id_aplicacion), '999', $js);
        $data['id_incidencia'] = '<input name="id_incidencia" type="hidden" id="id_incidencia" value="'.$id_incidencia.'" />';
        $this->load->view('nuevo_parte', $data);    
    }
    
    function nuevo_parte()
    {
        $this->load->model('Incidenciasdb','',TRUE);
        $this->load->helper('url');
        
        $incidencia['tipoparte'] = $_POST['Tipoparte'];
        $incidencia['parte'] = $_POST['Parte'];
        $incidencia['id_incidencia'] = $_POST['Idincidencia'];
        
        $resultado = $this->Incidenciasdb->set_parte($incidencia);
        
        /*if ($resultado == 0)
        {
            $data['texto'] = "Se ha registrado el parte correctamente.";
            $this->load->view('nueva_inc_ok', $data);
        }
        else
        {
            $data['texto'] = $resultado;
            $this->load->view('nueva_inc_error', $data);
        }*/
    }
    
    function borra_remedy()
    {
        $Id_remedy = $_POST['Idremedy'];
        $Id_incidencia = $_POST['Idincidencia'];
        
        $this->load->model('Incidenciasdb','',TRUE);
        $this->load->helper('url');
        
        $this->Incidenciasdb->del_remedy($Id_remedy);
        $incidencia = $this->Incidenciasdb->show_remedys($Id_incidencia);
        
        for($i = 0;$i < count($incidencia); $i++)
        {
			echo $incidencia[$i]['tipo'].' : ';
            echo $incidencia[$i]['remedy'].' ';
			echo '<a href="#" onclick="borra_remedy(';
            echo $incidencia[$i]['id'].', ';
            echo $Id_incidencia;
            echo ')"><i class="icon-remove"></i></a><br>';
        }
    }
    
    function inserta_remedy($id_incidencia)
    {
        $this->load->model('Incidenciasdb','',TRUE);
        $this->load->helper('url');
        
        $data ['tipo_remedy'] = form_dropdown('tipo_remedy', $this->Incidenciasdb->get_tiporemedy(),'1');
        $data['id_incidencia'] = '<input name="id_incidencia" type="hidden" id="id_incidencia" value="'.$id_incidencia.'" />';
        $this->load->view('nuevo_remedy', $data);    
    }
    
    function nuevo_remedy()
    {
        $this->load->model('Incidenciasdb','',TRUE);
        $this->load->helper('url');
        
        $incidencia['tipo_remedy'] = $_POST['tipo_remedy'];
        $incidencia['remedy'] = $_POST['remedy'];
        $incidencia['id_incidencia'] = $_POST['id_incidencia'];
        
        $resultado = $this->Incidenciasdb->set_remedy($incidencia);
        
        if ($resultado == 0)
        {
            $data['texto'] = "Se ha registrado el remedy correctamente.";
            $this->load->view('nueva_inc_ok', $data);
        }
        else
        {
            $data['texto'] = $resultado;
            $this->load->view('nueva_inc_error', $data);
        }
    }
    
    function borra_elemento()
    {
        $Id_elemento = $_POST['Idelemento'];
        $Id_incidencia = $_POST['Idincidencia'];
        
        $this->load->model('Incidenciasdb','',TRUE);
        $this->load->helper('url');
        
        $this->Incidenciasdb->del_elemento($Id_elemento);
        $incidencia = $this->Incidenciasdb->show_elementos($Id_incidencia);
        
        for($i = 0;$i < count($incidencia); $i++)
        {
			echo $incidencia[$i]['tipo_elemento'].' : ';
            echo $incidencia[$i]['dato'].' ';
			echo '<a href="#" onclick="borra_elementos(';
            echo $incidencia[$i]['id'].', ';
            echo $Id_incidencia;
            echo ')"><i class="icon-remove"></i></a><br>';
        }
    }
    
    function inserta_elemento($id_incidencia)
    {
        $this->load->model('Incidenciasdb','',TRUE);
        $this->load->helper('url');
        
        $data ['tipo_elemento'] = form_dropdown('tipo_elemento', $this->Incidenciasdb->get_tipoelemento(),'999');
        $data['id_incidencia'] = '<input name="id_incidencia" type="hidden" id="id_incidencia" value="'.$id_incidencia.'" />';
        $this->load->view('nuevo_elemento', $data);    
    }
    
    function nuevo_elemento()
    {
        $this->load->model('Incidenciasdb','',TRUE);
        $this->load->helper('url');
        
        $incidencia['tipo_elemento'] = $_POST['tipo_elemento'];
        $incidencia['elemento'] = $_POST['elemento'];
        $incidencia['id_incidencia'] = $_POST['id_incidencia'];
        
        $resultado = $this->Incidenciasdb->set_elemento($incidencia);
        
        if ($resultado == 0)
        {
            $data['texto'] = "Se ha registrado el remedy correctamente.";
            $this->load->view('nueva_inc_ok', $data);
        }
        else
        {
            $data['texto'] = $resultado;
            $this->load->view('nueva_inc_error', $data);
        }
    }
    
    function borra_comentario()
    {
        $Id_comentario = $_POST['Idcomentario'];
        $Id_incidencia = $_POST['Idincidencia'];
        
        $this->load->model('Incidenciasdb','',TRUE);
        $this->load->helper('url');
        
        $this->Incidenciasdb->del_comentario($Id_comentario);
        $incidencia = $this->Incidenciasdb->show_comentarios($Id_incidencia);
        
        for($i = 0;$i < count($incidencia); $i++)
        {
			echo $incidencia[$i]['fecha'].' - ';
            echo $incidencia[$i]['tipo_comentario'].' : ';
            echo $incidencia[$i]['comentario'].' ';
			echo '<a href="#" onclick="borra_comentarios(';
            echo $incidencia[$i]['id'].', ';
            echo $Id_incidencia;
            echo ')"><i class="icon-remove"></i></a><br>';
        }
        
        
    }
    
    function inserta_comentario($id_incidencia)
    {
        $this->load->model('Incidenciasdb','',TRUE);
        $this->load->helper('url'); 
        
        $data['id_incidencia'] = '<input name="id_incidencia" type="hidden" id="id_incidencia" value="'.$id_incidencia.'" />';
        $this->load->view('nuevo_comentario', $data);    
    }
    
    function nuevo_comentario()
    {
        $this->load->model('Incidenciasdb','',TRUE);
        $this->load->helper('url');
        
        $incidencia['tipo_comentario'] = 1;
        $incidencia['comentario'] = $_POST['comentario'];
        $incidencia['id_incidencia'] = $_POST['id_incidencia'];
        
        $resultado = $this->Incidenciasdb->set_comentario($incidencia['id_incidencia'],$incidencia['tipo_comentario'],$incidencia['comentario']);
        
        if ($resultado == 0)
        {
            $data['texto'] = "Se ha registrado el comentario correctamente.";
            $this->load->view('nueva_inc_ok', $data);
        }
        else
        {
            $data['texto'] = $resultado;
            $this->load->view('nueva_inc_error', $data);
        }
    }
    
    function borra_incidencia()
    {
        $this->load->model('Incidenciasdb','',TRUE);
        $this->load->helper('url');
        
        $Id_incidencia = $_POST['Idincidencia'];
        
        $this->Incidenciasdb->del_incidencia($Id_incidencia);
        
        
    }
    
    
}

?>