<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of incidencias
 *
 * @author Administrador
 */
class Incidencias extends CI_Model 
{
    function NewIncidencia($IdArea, $IdServicio, $IdAplicacion, $IdEstado)
    {
        
        
        $sql = "INSERT INTO 
                    `inc_incidencias`
                    (
                        `area`, 
                        `servicio`, 
                        `aplicacion`, 
                        `estado` 
                     ) 
                VALUES 
                     (
                        '".$IdArea."', 
                        '".$IdServicio."', 
                        '".$IdAplicacion."', 
                        '".$IdEstado."'
                      )";
        
        $this->db->query($sql);
        
        if($this->db->affected_rows() != 1)
        {
            $Salida = 0;
        }
        else
        {
            $Salida = $this->db->insert_id();
        }
        
        return $Salida;
    }
    
    function DelIncidencia($IdIncidencia)
    {
         $SQL = 'DELETE FROM
                    inc_incidencias
                WHERE 
                    inc_incidencias.id='.$IdIncidencia.'';
                    
        $this->db->query($SQL);
       
        $Salida = 0;
        
        if($this->db->affected_rows() != 1)
        {
            $Salida = "Error al borrar la incidencia. ";
        }
        
        return $Salida;
    }
    
    function GetIncidenciaById($IdIncidencia)
    {
        $SQL ="SELECT 
                    inc_incidencias.id,
                    inc_incidencias.area, 
                    inc_incidencias.servicio, 
                    inc_incidencias.aplicacion, 
                    inc_incidencias.estado, 
                    inc_incidencias.fecha_apertura
               FROM 
                    inc_incidencias
               WHERE 
                    inc_incidencias.id='".$IdIncidencia."'";
        
        $query = $this->db->query($SQL);
               
        if ($query->num_rows() > 0)
        {   
            foreach ($query->result() as $row)
            {
                $Listado['IdIncidencia'] = $row->id;
                $Listado['IdArea'] = $row->area;
                $Listado['IdServicio'] = $row->servicio;
                $Listado['IdAplicacion'] = $row->aplicacion;
                $Listado['IdEstado'] = $row->estado;
                $Listado['FechaApertura'] = $row->fecha_apertura;
            }
        }
        else
        {
            $Listado['IdIncidencia'] = "";
            $Listado['IdArea'] = "";
            $Listado['IdServicio'] = "";
            $Listado['IdAplicacion'] = "";
            $Listado['IdEstado'] = "";
            $Listado['FechaApertura'] = "";
        }
        
        return $Listado;

    }
    
    function GetAllIncidencias($IdEstado)
    {
        $SQL = "SELECT 
                    inc_incidencias.id,
                    inc_incidencias.area, 
                    inc_incidencias.servicio, 
                    inc_incidencias.aplicacion, 
                    inc_incidencias.estado, 
                    inc_incidencias.fecha_apertura
                FROM 
                    inc_incidencias
                WHERE 
                    inc_incidencias.estado='".$IdEstado."' 
                ORDER BY 
                    inc_incidencias.id
                DESC";
        
        $query = $this->db->query($SQL);
         
        $Contador = 0;
               
        if ($query->num_rows() > 0)
        {   
            foreach ($query->result() as $row)
            {
                $Listado[$Contador]['IdIncidencia'] = $row->id;
                $Listado[$Contador]['IdArea'] = $row->area;
                $Listado[$Contador]['IdServicio'] = $row->servicio;
                $Listado[$Contador]['IdAplicacion'] = $row->aplicacion;
                $Listado[$Contador]['IdEstado'] = $row->estado;
                $Listado[$Contador]['FechaApertura'] = $row->fecha_apertura;
                
                $Contador++;
            }
        }
        else
        {
            $Listado[$Contador]['IdIncidencia'] = "";
            $Listado[$Contador]['IdArea'] = "";
            $Listado[$Contador]['IdServicio'] = "";
            $Listado[$Contador]['IdAplicacion'] = "";
            $Listado[$Contador]['IdEstado'] = "";
            $Listado[$Contador]['FechaApertura'] = "";
        }
        
        return $Listado;

    }
}

?>
