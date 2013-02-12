<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of estado
 *
 * @author Administrador
 */
class Estado extends CI_Model 
{
    function NewEstado($NuevoEstado)
    {
        $SQL = "INSERT INTO
                    `inc_estados`   
                    (
                        `estado`
                    ) 
                VALUES 
                    (
                        '".$NuevoEstado."'
                     )";
        
        $this->db->query($SQL);
        
        $Salida = 0;
        
        if($this->db->affected_rows() != 1)
        {
            $Salida = "Error al crear el nuevo estado. ";
        }
        
        return $Salida;
    }
    
    function DelEstado($IdEstado)
    {
         $SQL = 'DELETE FROM  
                        `inc_estados`
                WHERE 
                        id ='.$IdEstado.'';
                        
        $this->db->query($SQL);
        
        $Salida = 0;
        
        if($this->db->affected_rows() != 1)
        {
            $Salida = "Error al borrar el estado. ";
        }
        
        return $Salida;
    }
    
    function GetEstado()
    {         
        $SQL = "SELECT 
                    inc_estados.id, 
                    inc_estados.estado 
                FROM 
                    inc_estados";
        
        $query = $this->db->query($SQL);
        
        if ($query->num_rows() > 0)
        {
            foreach ($query->result() as $row)
            {
                $Listado[$row->id] = $row->estado;
            }
        }
        else 
        {
            $Listado = array('1' => 'Error');
        }
        
        return $Listado;
    }
    
    function GetEstadoById($IdEstado)
    {         
        $SQL = "SELECT 
                    inc_estados.id, 
                    inc_estados.estado 
                FROM 
                    inc_estados
                    
                WHERE
                    id = '".$IdEstado."'";
        
        $query = $this->db->query($SQL);
        
        if ($query->num_rows() > 0)
        {
            foreach ($query->result() as $row)
            {
                $Salida = $row->estado;
            }
        }
        else 
        {
            $Salida = " No hay Estados con ese Id. ";
        }
        
        return $Salida;
    }
}

?>
