<?php

/**
 * @author Oscar
 * @copyright 2012
 */

class Incidenciasdb extends CI_Model 
{
    function __construct()
    {
        parent::__construct();
    }
    
    function get_areas()
    {         
        $query = $this->db->query("SELECT inc_area.id, inc_area.area FROM inc_area");
        
        $listado['999'] = "Seleccione area";
        
        if ($query->num_rows() > 0)
        {
            foreach ($query->result() as $row)
            {
                $listado[$row->id] = $row->area;
            }
        }
        else 
        {
            $listado = array('1' => 'Error');
        }
        
        return $listado;
    }
    
    function get_servicios($area)
    {         
        $query = $this->db->query("SELECT inc_servicio.id, inc_servicio.servicio FROM inc_area INNER JOIN inc_servicio ON inc_area.id = inc_servicio.id_area WHERE inc_servicio.id_area='".$area."' ");
        
        $listado['999'] = "Seleccione servicio";
        
        if ($query->num_rows() > 0)
        {
            foreach ($query->result() as $row)
            {
                $listado[$row->id] = $row->servicio;
            }
        }
        else 
        {
            $listado = array('1' => 'Error');
        }
        
        return $listado;
    }
    
    function get_aplicaciones($area, $servicio)
    {         
        $query = $this->db->query("SELECT inc_aplicacion.id, inc_aplicacion.aplicacion
FROM (inc_area INNER JOIN inc_servicio ON inc_area.id = inc_servicio.id_area) INNER JOIN inc_aplicacion ON (inc_servicio.id = inc_aplicacion.id_servicio) AND (inc_area.id = inc_aplicacion.id_area)
WHERE inc_aplicacion.id_area='".$area."' AND inc_aplicacion.id_servicio='".$servicio."'");
        
        $listado['999'] = "Seleccione aplicacion";
        
        if ($query->num_rows() > 0)
        {
            foreach ($query->result() as $row)
            {
                $listado[$row->id] = $row->aplicacion;
            }
        }
        else 
        {
            $listado = array('1' => 'Error');
        }
        
        return $listado;
    }
    
    function get_tipoparte($Aplicacion)
    {         
        if($Aplicacion != NULL)
        {
            $query = $this->db->query("SELECT inc_tipo_parte.id, inc_tipo_parte.tipo_parte
            FROM inc_aplicacion INNER JOIN inc_tipo_parte ON inc_aplicacion.id = inc_tipo_parte.id_aplicacion
            WHERE inc_tipo_parte.id_aplicacion='".$Aplicacion."'");
        
            $listado['999'] = "Seleccione Tipo";
        
            if ($query->num_rows() > 0)
            {
                foreach ($query->result() as $row)
                {
                    $listado[$row->id] = $row->tipo_parte;
                }
            }
            else 
            {
                $listado = array('1' => 'Error');
            }
        
            return $listado;
        }
        else 
        {
            $query = $this->db->query("SELECT inc_tipo_parte.id, inc_tipo_parte.tipo_parte
            FROM inc_aplicacion INNER JOIN inc_tipo_parte ON inc_aplicacion.id = inc_tipo_parte.id_aplicacion");
        
            $listado['999'] = "Seleccione Tipo";
        
            if ($query->num_rows() > 0)
            {
                foreach ($query->result() as $row)
                {
                    $listado[$row->id] = $row->tipo_parte;
                }
            }
            else 
            {
                $listado = array('1' => 'Error');
            }
        
            return $listado;
        }
    }
    
    function get_tiporemedy()
    {         
        $query = $this->db->query("SELECT inc_tipo_remedy.id, inc_tipo_remedy.tipo FROM inc_tipo_remedy");
        
        if ($query->num_rows() > 0)
        {
            foreach ($query->result() as $row)
            {
                $listado[$row->id] = $row->tipo;
            }
        }
        else 
        {
            $listado = array('1' => 'Error');
        }
        
        return $listado;
    }
    
    function get_estado()
    {         
        $query = $this->db->query("SELECT inc_estados.id, inc_estados.estado FROM inc_estados");
        
        if ($query->num_rows() > 0)
        {
            foreach ($query->result() as $row)
            {
                $listado[$row->id] = $row->estado;
            }
        }
        else 
        {
            $listado = array('1' => 'Error');
        }
        
        return $listado;
    }
    
    function get_tipoelemento()
    {         
        $query = $this->db->query("SELECT inc_tipo_elemento.id, inc_tipo_elemento.tipo_elemento FROM inc_tipo_elemento");
        
        $listado['999'] = "Seleccione elemto";
        
        if ($query->num_rows() > 0)
        {
            foreach ($query->result() as $row)
            {
                $listado[$row->id] = $row->tipo_elemento;
            }
        }
        else 
        {
            $listado = array('1' => 'Error');
        }
        
        return $listado;
    }
    
    
    
    function set_incidencia($incidencia)
    {
        $salida = 0;
        
        $sql = "INSERT INTO `inc_incidencias`(`area`, `servicio`, `aplicacion`, `estado` ) VALUES ('".$incidencia["area"]."', '".$incidencia["servicio"]."', '".$incidencia["aplicacion"]."', '".$incidencia["estado"]."')";
        $this->db->query($sql);
        
        if($this->db->affected_rows() != 1)
        {
            $salida = "Error al insertar tipificaci�n. ";
        }
        
        $id_nuevo_registro = $this->db->insert_id();
        
        $sql = "INSERT INTO `inc_parte`(`id_incidencia`, `tipo`, `numero_parte`) VALUES ('".$id_nuevo_registro."', '".$incidencia["tipoparte"]."', '".$incidencia["parte"]."')";
        $this->db->query($sql);
        
        if($this->db->affected_rows() != 1)
        {
            $salida .= "Error al insertar datos del parte. ";
        }
        
        $sql = "INSERT INTO `inc_remedys`(`id_incidencia`, `id_tipo_remedy`, `remedy`) VALUES ('".$id_nuevo_registro."', '".$incidencia["tipo_remedy"]."', '".$incidencia["remedy"]."')";
        $this->db->query($sql);
        
        if($this->db->affected_rows() != 1)
        {
            $salida .= "Error al insertar datos del remedy. ";
        }
        
        $sql = "INSERT INTO `inc_elementos`(`id_incidencia`, `tipo_elemento`, `dato`) VALUES ('".$id_nuevo_registro."', '".$incidencia["tipo_elemento"]."', '".$incidencia["elemento"]."')";
        $this->db->query($sql);
        
        if($this->db->affected_rows() != 1)
        {
            $salida .= "Error al insertar elementos. ";
        }
        
        $salida .= $this->set_comentario($id_nuevo_registro, $incidencia['tipo_comentario'], $incidencia['comentario']);
        
        return $salida;
    }
    
    function show_incidencias()
    {
        
        $SQL = 'SELECT
                     inc_incidencias.id,
                     inc_area.area,
                     inc_servicio.servicio,
                     inc_aplicacion.aplicacion,
                     inc_aplicacion.id AS apli_id,
                     inc_estados.estado,
                     inc_incidencias.fecha_apertura
                FROM
                     inc_aplicacion INNER JOIN 
                        (inc_servicio INNER JOIN 
                            (inc_area INNER JOIN 
                                (inc_estados INNER JOIN inc_incidencias 
                                ON inc_estados.id = inc_incidencias.estado)
                             ON inc_area.id = inc_incidencias.area)
                         ON inc_servicio.id = inc_incidencias.servicio)
                     ON inc_aplicacion.id = inc_incidencias.aplicacion
                WHERE 
                    inc_estados.estado="Abierto" 
                ORDER BY 
                    inc_incidencias.id
                DESC';

        
        $query = $this->db->query($SQL);
        
        $contador = 0;
        
        if ($query->num_rows() > 0)
        {
            foreach ($query->result() as $row)
            {
                $listado[$contador]['id'] = $row->id;
                $listado[$contador]['area'] = $row->area;
                $listado[$contador]['servicio'] = $row->servicio;
                $listado[$contador]['aplicacion'] = $row->aplicacion;
                $listado[$contador]['estado'] = $row->estado;
                $listado[$contador]['fecha'] = $row->fecha_apertura;
                
                $listado[$contador]['parte'] = $this->show_partes($row->id);
                $listado[$contador]['elementos'] = $this->show_elementos($row->id);
                $listado[$contador]['remedys'] = $this->show_remedys($row->id);
                $listado[$contador]['comentarios'] = $this->show_comentarios($row->id);
                
                $contador++;
            }
        }
        else 
        {
            $listado[$contador][$contador] = "No hay incidencias abiertas.";
        }
        
        return $listado;
    }
    
    function show_partes($id_incidencia)
    {
        $SQL ='SELECT 
                    inc_parte.id,
                    inc_parte.numero_parte,
                    inc_tipo_parte.tipo_parte
               FROM 
                    inc_tipo_parte INNER JOIN 
                      (inc_parte INNER JOIN inc_incidencias 
                      ON inc_parte.id_incidencia = inc_incidencias.id) 
                    ON inc_tipo_parte.id = inc_parte.tipo
               WHERE 
                    inc_incidencias.id='. $id_incidencia . '';
                                    
                $query = $this->db->query($SQL);
                
                $contador = 0;
                
                if ($query->num_rows() > 0)
                {
                    foreach ($query->result() as $row)
                    {
                        $listado[$contador]['id'] = $row->id;
                        $listado[$contador]['tipo_parte'] = $row->tipo_parte;
                        $listado[$contador]['numero_parte'] = $row->numero_parte;
                        
                        $contador++;
                    }
                }
                else
                {
                                     
                    $listado[$contador]['id'] = "N/A";
                    $listado[$contador]['tipo_parte'] = "N/A";
                    $listado[$contador]['numero_parte'] = "N/A";
                }
                
                return $listado;
    }
    
    function del_partes($id_parte)
    {
        $SQL = 'DELETE FROM  
                        inc_parte 
                WHERE 
                        id ='.$id_parte.'';
                        
        $query = $this->db->query($SQL);                
    }
    
    function show_remedys($id_incidencia)
    {
        $SQL ='SELECT
                    inc_remedys.id,
                    inc_tipo_remedy.tipo,
                    inc_remedys.remedy
               FROM 
                    inc_tipo_remedy INNER JOIN
                        (inc_remedys INNER JOIN inc_incidencias 
                        ON inc_remedys.id_incidencia = inc_incidencias.id) 
                    ON inc_tipo_remedy.id = inc_remedys.id_tipo_remedy
               WHERE 
                    inc_incidencias.id=' . $id_incidencia . '';
                                    
        $query = $this->db->query($SQL);
        
        $contador = 0;
        
        if ($query->num_rows() > 0)
        {
            foreach ($query->result() as $row)
            {
                $listado[$contador]['id'] = $row->id;
                $listado[$contador]['tipo'] = $row->tipo;
                $listado[$contador]['remedy'] = $row->remedy;
            
                $contador++;
            }
        }
        else
        {
            $listado[$contador]['id'] = "N/A";
            $listado[$contador]['tipo'] = "N/A";
            $listado[$contador]['remedy'] = "N/A";
        }
        
        return $listado;
    }
    
    function show_elementos($id_incidencia)
    {
        $SQL ='SELECT
                    inc_elementos.id, 
                    inc_tipo_elemento.tipo_elemento, 
                    inc_elementos.dato
               FROM 
                    inc_tipo_elemento INNER JOIN
                        (inc_elementos INNER JOIN inc_incidencias 
                        ON inc_elementos.id_incidencia = inc_incidencias.id) 
                    ON inc_tipo_elemento.id = inc_elementos.tipo_elemento
               WHERE 
                    inc_incidencias.id='.$id_incidencia.'';
                                    
        $query = $this->db->query($SQL);
        
        $contador = 0;
        
        if ($query->num_rows() > 0)
        {
            foreach ($query->result() as $row)
            {
                $listado[$contador]['id'] = $row->id;
                $listado[$contador]['tipo_elemento'] = $row->tipo_elemento;
                $listado[$contador]['dato'] = $row->dato;
                
                $contador++;
            }
        }
        else
            {
                $listado[$contador]['id'] = "N/A";                    
                $listado[$contador]['tipo_elemento'] = "N/A";
                $listado[$contador]['dato'] = "N/A";
            }
            
        return $listado;
    }
    
    function show_comentarios($id_incidencia)
    {
        $SQL ='SELECT 
                    inc_comentarios.id, 
                    inc_comentarios.fecha, 
                    inc_tipo_comentario.tipo_comentario, 
                    inc_comentarios.comentario
               FROM 
                    inc_tipo_comentario INNER JOIN 
                        (inc_comentarios INNER JOIN inc_incidencias 
                        ON inc_comentarios.id_incidencia = inc_incidencias.id) 
                    ON inc_tipo_comentario.id = inc_comentarios.tipo
               WHERE 
                    inc_incidencias.id=' . $id_incidencia . '';
                                    
        $query = $this->db->query($SQL);
         
        $contador = 0;
               
        if ($query->num_rows() > 0)
        {   
            foreach ($query->result() as $row)
            {
                $listado[$contador]['id'] = $row->id;
                $listado[$contador]['fecha'] = $row->fecha;
                $listado[$contador]['tipo_comentario'] = $row->tipo_comentario;
                $listado[$contador]['comentario'] = $row->comentario;
                
                $contador++;
            }
        }
        else
        {
            $listado[$contador]['id'] = "N/A";
            $listado[$contador]['fecha'] = "N/A";
            $listado[$contador]['tipo_comentario'] = "N/A";
            $listado[$contador]['comentario'] = "N/A";
        }
        
        return $listado;
    }
    
    function set_parte($datos_parte)
    {
        $sql = "INSERT INTO `inc_parte`(`id_incidencia`, `tipo`, `numero_parte`) VALUES ('".$datos_parte['id_incidencia']."', '".$datos_parte["tipoparte"]."', '".$datos_parte["parte"]."')";
        $this->db->query($sql);
        
        $salida = 0;
        
        if($this->db->affected_rows() != 1)
        {
            $salida = "Error al insertar datos del parte. ";
        }
        
        return $salida;
    }
    
    function set_remedy($datos_remedy)
    {
        $salida = 0;
        
        $sql = "INSERT INTO `inc_remedys`(`id_incidencia`, `id_tipo_remedy`, `remedy`) VALUES ('".$datos_remedy['id_incidencia']."', '".$datos_remedy["tipo_remedy"]."', '".$datos_remedy["remedy"]."')";
        $this->db->query($sql);
        
        if($this->db->affected_rows() != 1)
        {
            $salida .= "Error al insertar datos del remedy. ";
        }
        
        return $salida;
    }
    
    function del_remedy($id_remedy)
    {
        $SQL = 'DELETE FROM  
                        inc_remedys 
                WHERE 
                        id ='.$id_remedy.'';
                        
        $query = $this->db->query($SQL);                
    }
    
    function set_elemento($datos_elemento)
    {
        $salida = 0;
        
        $sql = "INSERT INTO `inc_elementos`(`id_incidencia`, `tipo_elemento`, `dato`) VALUES ('".$datos_elemento['id_incidencia']."', '".$datos_elemento["tipo_elemento"]."', '".$datos_elemento["elemento"]."')";
        $this->db->query($sql);
        
        if($this->db->affected_rows() != 1)
        {
            $salida .= "Error al insertar elementos. ";
        }
        
        return $salida;
    }
    
    function del_elemento($id_elemento)
    {
        $SQL = 'DELETE FROM  
                        inc_elementos 
                WHERE 
                        id ='.$id_elemento.'';
                        
        $query = $this->db->query($SQL);                
    }
    
   function set_comentario($id_incidencia, $tipo_comentario, $comentario)
    {
        $salida = 0;
        
        $sql = "INSERT INTO `inc_comentarios`(`id_incidencia`, `tipo`, `comentario`) VALUES ('".$id_incidencia."', '".$tipo_comentario."', '".$comentario."')";
        $this->db->query($sql);
        
        if($this->db->affected_rows() != 1)
        {
            $salida .= "Error al insertar el comentario";
        }   
        
        return $salida;
    }
    
    function del_comentario($id_comentario)
    {
        $SQL = 'DELETE FROM  
                        inc_comentarios 
                WHERE 
                        id ='.$id_comentario.'';
                        
        $query = $this->db->query($SQL);                
    }
    
    function edita_incidencia($id_incidencia)
    {
        
        $SQL = 'SELECT
                     inc_incidencias.id,
                     inc_area.area,
                     inc_servicio.servicio,
                     inc_aplicacion.aplicacion,
                     inc_aplicacion.id AS apli_id,
                     inc_estados.estado,
                     inc_incidencias.fecha_apertura
                FROM
                     inc_aplicacion INNER JOIN 
                        (inc_servicio INNER JOIN 
                            (inc_area INNER JOIN 
                                (inc_estados INNER JOIN inc_incidencias 
                                ON inc_estados.id = inc_incidencias.estado)
                             ON inc_area.id = inc_incidencias.area)
                         ON inc_servicio.id = inc_incidencias.servicio)
                     ON inc_aplicacion.id = inc_incidencias.aplicacion
                WHERE 
                    inc_estados.estado="Abierto" 
                    AND
                    inc_incidencias.id=' . $id_incidencia . '
                ORDER BY 
                    inc_incidencias.id
                DESC';

        
        $query = $this->db->query($SQL);
        
        $contador = 0;
        
        if ($query->num_rows() > 0)
        {
            foreach ($query->result() as $row)
            {
                $listado[$contador]['id'] = $row->id;
                $listado[$contador]['area'] = $row->area;
                $listado[$contador]['servicio'] = $row->servicio;
                $listado[$contador]['aplicacion'] = $row->aplicacion;
                $listado[$contador]['id_aplicacion'] = $row->apli_id;
                $listado[$contador]['estado'] = $row->estado;
                $listado[$contador]['fecha'] = $row->fecha_apertura;
                
                $listado[$contador]['parte'] = $this->show_partes($row->id);
                $listado[$contador]['elementos'] = $this->show_elementos($row->id);
                $listado[$contador]['remedys'] = $this->show_remedys($row->id);
                $listado[$contador]['comentarios'] = $this->show_comentarios($row->id);
                
                
                $contador++;
            }
        }
        else 
        {
            $listado[$contador][$contador] = "Error al editar la incidencia con id: " . $id_incidencia . ". ";
        }
        
        return $listado;
    }
    
    function del_incidencia($Id_incidencia)
    {
        $SQL = 'DELETE FROM
                    inc_incidencias
                WHERE 
                    inc_incidencias.id='.$Id_incidencia.'';
                    
        $this->db->query($SQL);
        $Salida = "Eliminadas ". $this->db->affected_rows()."incidecias. ";
        
        $SQL = 'DELETE FROM 
                    inc_parte
                WHERE 
                    inc_parte.id_incidencia='.$Id_incidencia.'';
                    
        $this->db->query($SQL);
        $Salida .= "Eliminadas ". $this->db->affected_rows()."partes. ";
        
        $SQL = 'DELETE FROM 
                    inc_elementos
                WHERE 
                    inc_elementos.id_incidencia='.$Id_incidencia.'';
                    
        $this->db->query($SQL);
        $Salida .= "Eliminadas ". $this->db->affected_rows()."elementos. ";
        
        $SQL = 'DELETE FROM 
                    inc_remedys
                WHERE 
                    inc_remedys.id_incidencia='.$Id_incidencia.'';
                    
        $this->db->query($SQL);
        $Salida .= "Eliminadas ". $this->db->affected_rows()."remedys. ";
        
        $SQL = 'DELETE FROM 
                    inc_comentarios
                WHERE 
                    inc_comentarios.id_incidencia='.$Id_incidencia.'';
                    
        $this->db->query($SQL);
        $Salida .= "Eliminadas ". $this->db->affected_rows()."comentarios. ";
        
      
                   
    }
}

?>