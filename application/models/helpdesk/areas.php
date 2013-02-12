<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of areas
 *
 * @author Administrador
 */
class Areas extends CI_Model
{
    function NewArea($NuevoArea)
    {
        $SQL = "INSERT INTO
                    `inc_area`   
                    (
                        `area`
                    ) 
                VALUES 
                    (
                        '".$NuevoArea."'
                     )";
        
        $this->db->query($SQL);
        
        $Salida = 0;
        
        if($this->db->affected_rows() != 1)
        {
            $Salida = "Error al crear el nuevo area. ";
        }
        
        return $Salida;
    }
    
    function DelArea($IdArea)
    {
         $SQL = 'DELETE FROM  
                        `inc_area`
                WHERE 
                        id ='.$IdArea.'';
                        
        $this->db->query($SQL);
        
        $Salida = 0;
        
        if($this->db->affected_rows() != 1)
        {
            $Salida = "Error al borrar el area. ";
        }
        
        return $Salida;
    }
    
    function GetAreas()
    {
        $SQL = "SELECT 
                    inc_area.id, 
                    inc_area.area 
                FROM 
                    inc_area";
        
        $query = $this->db->query($SQL);
        
        $Listado['999'] = "Seleccione area";
        
        if ($query->num_rows() > 0)
        {
            foreach ($query->result() as $row)
            {
                $Listado[$row->id] = $row->area;
            }
        }
        else 
        {
            $Listado = array('1' => 'Error');
        }
        
        return $Listado;
    }
    
    function GetAreaById($IdArea)
    {
        $SQL = "SELECT  
                    inc_area.area
                FROM 
                    inc_area
                WHERE 
                        id ='".$IdArea."'";
        
        $query = $this->db->query($SQL);
        
        if ($query->num_rows() > 0)
        {
            foreach ($query->result() as $row)
            {
                $Salida = $row->area;
            }
        }
        else 
        {
            $Salida = "No hay areas con ese Id";
        }
        
        return $Salida;
    }
}

?>
