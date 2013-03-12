<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of servicios
 *
 * @author Administrador
 */
class Servicios extends CI_Model 
{
    function NewServicio($NuevoServicio, $IdArea)
    {
        $SQL = "INSERT INTO
                    `inc_servicio`   
                    (
                        `servicio`,
                        `id_area`
                    ) 
                VALUES 
                    (
                        '".$NuevoServicio."',
                        '".$IdArea."'
                     )";
        
        $this->db->query($SQL);
        
        $Salida = 0;
        
        if($this->db->affected_rows() != 1)
        {
            $Salida = "Error al crear el nuevo servicio. ";
        }
        
        return $Salida;
    }
    
    function DelServicio($IdServicio)
    {
         $SQL = 'DELETE FROM  
                       `inc_servicio`
                WHERE 
                        id ='.$IdServicio.'';
                        
        $this->db->query($SQL);
        
        $Salida = 0;
        
        if($this->db->affected_rows() != 1)
        {
            $Salida = "Error al borrar el servicio. ";
        }
        
        return $Salida;
    }
    
    function GetServicios($IdArea)
    {         
        $SQL = "SELECT 
                    inc_servicio.id, 
                    inc_servicio.servicio 
                FROM 
                    inc_area INNER JOIN inc_servicio 
                    ON inc_area.id = inc_servicio.id_area 
                WHERE 
                    inc_servicio.id_area='".$IdArea."' ";
        
        $query = $this->db->query($SQL);
        
        $Listado="";
        
        if ($query->num_rows() > 0)
        {
            foreach ($query->result() as $row)
            {
                $Listado[$row->id] = $row->servicio;
            }
        }
        else 
        {
            $Listado = array('0' => 'Error');
        }
        
        return $Listado;
    }
    
    function GetServicioById($IdServicio)
    {         
        $SQL = "SELECT 
                    inc_servicio.servicio 
                FROM 
                    inc_servicio  
                WHERE 
                    id='".$IdServicio."' ";
        
        $query = $this->db->query($SQL);
        
        if ($query->num_rows() > 0)
        {
            foreach ($query->result() as $row)
            {
                $Salida = $row->servicio;
            }
        }
        else 
        {
            $Salida = "No hay servicio con ese Id. ";
        }
        
        return $Salida;
    }
    
    function GetServiciosAll()
    {         
        $SQL = "SELECT 
                    inc_servicio.id, 
                    inc_servicio.servicio 
                FROM 
                    inc_servicio ";
        
        $query = $this->db->query($SQL);
        
        $Listado="";
        
        if ($query->num_rows() > 0)
        {
            foreach ($query->result() as $row)
            {
                $Listado[$row->id] = $row->servicio;
            }
        }
        else 
        {
            $Listado = array('1' => 'Error');
        }
        
        return $Listado;
    }
    
    function PermisosArea($IdArea, $Selecionados)
    {
        $Acumulado = 0;
        
        $SQL = "UPDATE 
                    inc_servicio 
                SET 
                    inc_servicio.id_area = 0 
                WHERE 
                    inc_servicio.id_area=".$IdArea;
        
        $this->db->query($SQL);
        
        for($Contador = 0 ; $Contador < count($Selecionados) ; $Contador++)
        {
            $SQL = "UPDATE 
                        inc_servicio 
                    SET 
                        inc_servicio.id_area=".$IdArea."
                    WHERE 
                        inc_servicio.id=".$Selecionados[$Contador];
            
            $query = $this->db->query($SQL);
            
            
        }
         
        
     }
}

?>
