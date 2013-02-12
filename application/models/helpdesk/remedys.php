<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of remedys
 *
 * @author Administrador
 */
class Remedys extends CI_Model 
{
    function NewRemedy($IdIncidencia, $TipoRemedy, $Remedy)
    {
        $Salida = 0;
        
        $SQL = "INSERT INTO 
                    `inc_remedys`
                    (
                        `id_incidencia`,
                        `id_tipo_remedy`, 
                        `remedy`
                     ) 
                 VALUES 
                    (
                        '".$IdIncidencia."', 
                        '".$TipoRemedy."', 
                        '".$Remedy."'
                     )";
        
        $this->db->query($SQL);
        
        if($this->db->affected_rows() != 1)
        {
            $Salida .= "Error al insertar datos del nuevo remedy. ";
        }
        
        return $Salida;
    }
    
    function DelRemedy($IdRemedy)
    {
        $SQL = 'DELETE FROM  
                        inc_remedys 
                WHERE 
                        id ='.$IdRemedy.'';
                        
        $this->db->query($SQL);
        
        $Salida = 0;
        
        if($this->db->affected_rows() != 1)
        {
            $Salida = "Error al borrar el remedy. ";
        }
        
        return $Salida;
    }
    
    function GetRemedys($IdIncidencia)
    {
        $SQL ="SELECT
                    inc_remedys.id,
                    inc_tipo_remedy.tipo,
                    inc_remedys.remedy
               FROM 
                    inc_tipo_remedy INNER JOIN
                        (inc_remedys INNER JOIN inc_incidencias 
                        ON inc_remedys.id_incidencia = inc_incidencias.id) 
                    ON inc_tipo_remedy.id = inc_remedys.id_tipo_remedy
               WHERE 
                    inc_incidencias.id='" . $IdIncidencia . "'";
                                    
        $query = $this->db->query($SQL);
        
        $Contador = 0;
        
        if ($query->num_rows() > 0)
        {
            foreach ($query->result() as $row)
            {
                $Listado[$Contador]['IdRemedy'] = $row->id;
                $Listado[$Contador]['TipoRemedy'] = $row->tipo;
                $Listado[$Contador]['Remedy'] = $row->remedy;
            
                $Contador++;
            }
        }
        else
        {
            $Listado[$Contador]['IdRemedy'] = "";
            $Listado[$Contador]['TipoRemedy'] = "";
            $Listado[$Contador]['Remedy'] = "";
        }
        
        return $Listado;
    }
    
    function NewTipoRemedy($NuevoTipo)
    {
        $SQL = "INSERT INTO
                    `inc_tipo_remedy` 
                    (
                        `tipo`
                    ) 
                VALUES 
                    (
                        '".$NuevoTipo."'
                     )";
        
        $this->db->query($SQL);
        
        $Salida = 0;
        
        if($this->db->affected_rows() != 1)
        {
            $Salida = "Error al crear el nuevo tipo de remedy ";
        }
        
        return $Salida;
    }
    
    function DelTipoRemedy($IdTipoRemedy)
    {
        $SQL = 'DELETE FROM  
                        `inc_tipo_remedy`
                WHERE 
                        id ='.$IdTipoRemedy.'';
                        
        $this->db->query($SQL);
        
        $Salida = 0;
        
        if($this->db->affected_rows() != 1)
        {
            $Salida = "Error al borrar el tipo de remedy. ";
        }
        
        return $Salida;
    }
    
    function GetTipoRemedy()
    {        
        $SQL = "SELECT 
                    inc_tipo_remedy.id, 
                    inc_tipo_remedy.tipo 
                FROM 
                    inc_tipo_remedy";
        
        $query = $this->db->query($SQL);
        
        if ($query->num_rows() > 0)
        {
            foreach ($query->result() as $row)
            {
                $Listado[$row->id] = $row->tipo;
            }
        }
        else 
        {
            $Listado = array('1' => 'Error');
        }
        
        return $Listado;
    }
}

?>
