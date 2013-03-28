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
    
    function GetAplicaciones($IdServicio)
    {         
        $Listado="";
        
        $SQL = "SELECT
                    inc_rule_app.id_app
                FROM
                    inc_rule_app
                WHERE
                    inc_rule_app.id_servicio=".$IdServicio."
                ";
        
        $query = $this->db->query($SQL);
        
        if ($query->num_rows() > 0)
        {
            foreach ($query->result() as $row)
            {
                $SQL = "SELECT
                            inc_aplicacion.id,
                            inc_aplicacion.aplicacion
                        FROM
                            inc_aplicacion
                        WHERE
                            inc_aplicacion.id=".$row->id_app."
                        ";
                $query_app = $this->db->query($SQL);
                
                if($query_app->num_rows() > 0)
                {
                    foreach ($query_app->result() as $row_app)
                    {
                        $Listado[$row_app->id] = $row_app->aplicacion;
                    }  
                }
                else
                {
                    $Listado = array('0' => 'Error');
                }  
            }
        }
        else 
        {
            $Listado = array('0' => 'Error');
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
        $SQL = "DELETE FROM 
                    inc_rule_app
                WHERE 
                    inc_rule_app.id_servicio = ".$IdServicio."";
        
        $this->db->query($SQL);
        
        if($Selecionados[0] != NULL)
        {
            for($Contador = 0 ; $Contador < count($Selecionados) ; $Contador++)
            {
                $SQL = "INSERT INTO
                        `inc_rule_app`   
                        (
                            `id_servicio`,
                            `id_app`
                        ) 
                    VALUES 
                        (
                            '".$IdServicio."',
                            '".$Selecionados[$Contador]."'
                        )";
            
                $query = $this->db->query($SQL);
            }
        }
     }
}

?>
