<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of partes
 *
 * @author Administrador
 */

class Partes extends CI_Model  
{
    function NewParte($IdIncidencia, $TipoParte, $Parte)
    {
        $SQL = "INSERT INTO
                    `inc_parte`
                    (
                        `id_incidencia`,
                        `tipo`,
                        `numero_parte`
                    ) 
                VALUES 
                    (
                        '".$IdIncidencia."',
                        '".$TipoParte."',
                        '".$Parte."'
                     )";
        
        $this->db->query($SQL);
        
        $Salida = 0;
        
        if($this->db->affected_rows() != 1)
        {
            $Salida = "Error al crear nuevo parte. ";
        }
        
        return $Salida;
    }
    
    function DelParte($IdParte)
    {
        $SQL = 'DELETE FROM  
                        inc_parte 
                WHERE 
                        id ='.$IdParte.'';
                        
        $this->db->query($SQL);
        
        $Salida = 0;
        
        if($this->db->affected_rows() != 1)
        {
            $Salida = "Error al borrar el parte. ";
        }
        
        return $Salida;
    }
    
    
    
    function GetPartes($IdIncidencia)
    {
        $SQL ="SELECT 
                    inc_parte.id,
                    inc_parte.numero_parte,
                    inc_tipo_parte.tipo_parte
               FROM 
                    inc_tipo_parte INNER JOIN 
                      (inc_parte INNER JOIN inc_incidencias 
                      ON inc_parte.id_incidencia = inc_incidencias.id) 
                    ON inc_tipo_parte.id = inc_parte.tipo
               WHERE 
                    inc_incidencias.id='". $IdIncidencia ."'";
                                    
                $query = $this->db->query($SQL);
                
                $Contador = 0;
                
                if ($query->num_rows() > 0)
                {
                    foreach ($query->result() as $row)
                    {
                        $Listado[$Contador]['IdParte'] = $row->id;
                        $Listado[$Contador]['TipoParte'] = $row->tipo_parte;
                        $Listado[$Contador]['Parte'] = $row->numero_parte;
                        
                        $Contador++;
                    }
                }
                else
                {
                                     
                    $Listado[$Contador]['IdParte'] = "";
                    $Listado[$Contador]['TipoParte'] = "";
                    $Listado[$Contador]['Parte'] = "";
                }
                
                return $Listado;
    }
    
    function NewTipoParte($NuevoTipo, $IdAplicacion)
    {
        $SQL = "INSERT INTO
                    `inc_tipo_parte`
                    (
                        `id_aplicacion`,
                        `tipo_parte`
                    ) 
                VALUES 
                    (
                        '".$IdAplicacion."',
                        '".$NuevoTipo."'
                     )";
        
        $this->db->query($SQL);
        
        $Salida = 0;
        
        if($this->db->affected_rows() != 1)
        {
            $Salida = "Error al crear el nuevo tipo de parte ";
        }
        
        return $Salida;
    }
    
    function DelTipoParte($IdTipoParte)
    {
        $SQL = 'DELETE FROM  
                        `inc_tipo_parte` 
                WHERE 
                        id ='.$IdTipoParte.'';
                        
        $this->db->query($SQL);
        
        $Salida = 0;
        
        if($this->db->affected_rows() != 1)
        {
            $Salida = "Error al borrar el tipo de parte. ";
        }
        
        return $Salida;
    }


    function GetTipoParte($IdAplicacion)
    {
         $SQL = "SELECT 
                    inc_tipo_parte.id, 
                    inc_tipo_parte.tipo_parte
                FROM 
                    inc_aplicacion INNER JOIN inc_tipo_parte 
                    ON inc_aplicacion.id = inc_tipo_parte.id_aplicacion
                WHERE 
                    inc_tipo_parte.id_aplicacion='".$IdAplicacion."'";
        
        $query = $this->db->query($SQL);
        
        $Listado['999'] = "Seleccione Tipo";
        
        if ($query->num_rows() > 0)
        {
            foreach ($query->result() as $row)
            {
                $Listado[$row->id] = $row->tipo_parte;
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
