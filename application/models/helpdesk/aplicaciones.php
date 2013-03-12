<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of aplicacion
 *
 * @author Administrador
 */
class Aplicaciones extends CI_Model 
{
    function NewAplicacion($NuevaAplicacion, $IdArea, $IdServicio)
    {
        $SQL = "INSERT INTO
                    `inc_aplicacion`   
                    (
                        `aplicacion`,
                        `id_area`,
                        `id_servicio`
                    ) 
                VALUES 
                    (
                        '".$NuevaAplicacion."',
                        '".$IdArea."',
                        '".$IdServicio."'
                     )";
        
        $this->db->query($SQL);
        
        $Salida = 0;
        
        if($this->db->affected_rows() != 1)
        {
            $Salida = "Error al crear el nueva aplicacion. ";
        }
        
        return $Salida;
    }
    
    function DelAplicacion($IdAplicacion)
    {
         $SQL = 'DELETE FROM  
                       `inc_aplicacion`
                WHERE 
                        id ='.$IdAplicacion.'';
                        
        $this->db->query($SQL);
        
        $Salida = 0;
        
        if($this->db->affected_rows() != 1)
        {
            $Salida = "Error al borrar la aplicacion. ";
        }
        
        return $Salida;
    }
    
    function GetAplicaciones($IdArea, $IdServicio)
    {         
        $SQL = "SELECT 
                    inc_aplicacion.id, 
                    inc_aplicacion.aplicacion
                FROM 
                    (
                        inc_area INNER JOIN inc_servicio 
                        ON inc_area.id = inc_servicio.id_area
                     ) 
                     INNER JOIN inc_aplicacion ON 
                     (
                        inc_servicio.id = inc_aplicacion.id_servicio
                     ) 
                     AND 
                     (
                        inc_area.id = inc_aplicacion.id_area
                      )
                WHERE 
                      inc_aplicacion.id_area='".$IdArea."' 
                      AND 
                      inc_aplicacion.id_servicio='".$IdServicio."'";
        
        $query = $this->db->query($SQL);
        
        $Listado="";
        
        if ($query->num_rows() > 0)
        {
            foreach ($query->result() as $row)
            {
                $Listado[$row->id] = $row->aplicacion;
            }
        }
        else 
        {
            $Listado = array('1' => 'Error');
        }
        
        return $Listado;
    }
    
    function GetAplicacionById($IdAplicacion)
    {         
        $SQL = "SELECT 
                    inc_aplicacion.aplicacion
                FROM  
                     inc_aplicacion
                WHERE 
                     id = '".$IdAplicacion."'";
        
        $query = $this->db->query($SQL);
        
        if ($query->num_rows() > 0)
        {
            foreach ($query->result() as $row)
            {
                $Salida = $row->aplicacion;
            }
        }
        else 
        {
            $Salida = "No hay aplicaciones con este Id";
        }
        
        return $Salida;
    }
    
    function GetAplicacionesAll()
    {         
        $SQL = "SELECT 
                    inc_aplicacion.id, 
                    inc_aplicacion.aplicacion
                FROM 
                    inc_aplicacion";
        
        $query = $this->db->query($SQL);
        
        $Listado="";
        
        if ($query->num_rows() > 0)
        {
            foreach ($query->result() as $row)
            {
                $Listado[$row->id] = $row->aplicacion;
            }
        }
        else 
        {
            $Listado = array('1' => 'Error');
        }
        
        return $Listado;
    }
    
    function PermisosServicios($IdServicio, $Selecionados)
    {
      
        $SQL = "UPDATE 
                    inc_aplicacion 
                SET 
                    inc_aplicacion.id_servicio = 0 
                WHERE 
                    inc_aplicacion.id_servicio=".$IdServicio;
        
        $this->db->query($SQL);
        
        for($Contador = 0 ; $Contador < count($Selecionados) ; $Contador++)
        {
            $SQL = "UPDATE 
                        inc_aplicacion 
                    SET 
                        inc_aplicacion.id_servicio =".$IdServicio." 
                    WHERE 
                        inc_aplicacion.id=".$Selecionados[$Contador];
            
            $query = $this->db->query($SQL);
            
            
        }
         
        
     }
}

?>
