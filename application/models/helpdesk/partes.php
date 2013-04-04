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
    
    function DelPartes($IdIncidencia)
    {
        $SQL = 'DELETE FROM  
                        inc_parte 
                WHERE 
                        id_incidencia ='.$IdIncidencia.'';
                        
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
    
    function NewTipoParte($NuevoTipo)
    {
        $SQL = "INSERT INTO
                    `inc_tipo_parte`
                    (
                        `tipo_parte`
                    ) 
                VALUES 
                    (
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
        $Listado=""; 
        
        $SQL = "SELECT
                    inc_rule_tipoparte.id_tipo_parte
                 FROM
                    inc_rule_tipoparte
                 WHERE
                    inc_rule_tipoparte.id_app = ".$IdAplicacion;
        
        $query = $this->db->query($SQL);
        
        if ($query->num_rows() > 0)
        {
            foreach ($query->result() as $row)
            {
                $SQL = "SELECT
                            inc_tipo_parte.id,
                            inc_tipo_parte.tipo_parte
                        FROM
                            inc_tipo_parte
                        WHERE
                            inc_tipo_parte.id='".$row->id_tipo_parte."'";
                
                $query_parte = $this->db->query($SQL);
                
                if($query_parte->num_rows() > 0)
                {
                    foreach ($query_parte->result() as $row_parte)
                    {
                        $Listado[$row_parte->id] = $row_parte->tipo_parte;
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
    
    function GetTipoParteAll()
    {
         $SQL = "SELECT 
                    inc_tipo_parte.id, 
                    inc_tipo_parte.tipo_parte
                FROM 
                    inc_tipo_parte";
        
        $query = $this->db->query($SQL);
        
        $Listado="";
        
        if ($query->num_rows() > 0)
        {
            foreach ($query->result() as $row)
            {
                $Listado[$row->id] = $row->tipo_parte;
            }
        }
        else 
        {
            $Listado = array('0' => 'Error');
        }
        
        return $Listado;
    }
    
    function GetPartesAll()
    {
        $SQL ="SELECT 
                    inc_parte.id,
                    inc_parte.numero_parte,
                    inc_tipo_parte.tipo_parte
               FROM 
                    inc_tipo_parte INNER JOIN 
                      (inc_parte INNER JOIN inc_incidencias 
                      ON inc_parte.id_incidencia = inc_incidencias.id) 
                    ON inc_tipo_parte.id = inc_parte.tipo";
               
                                    
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
    
    function PermisosAplicaciones($IdAplicacion, $Selecionados)
    {        
        $SQL = "DELETE FROM 
                    inc_rule_tipoparte
                WHERE 
                    inc_rule_tipoparte.id_app = ".$IdAplicacion;
        
        $this->db->query($SQL);
        
        if($Selecionados[0] != NULL)
        {
            for($Contador = 0 ; $Contador < count($Selecionados) ; $Contador++)
            {
                $SQL = "INSERT INTO
                        `inc_rule_tipoparte`   
                        (
                            `id_app`,
                            `id_tipo_parte`
                        ) 
                    VALUES 
                        (
                            '".$IdAplicacion."',
                            '".$Selecionados[$Contador]."'
                        )";
            
                $query = $this->db->query($SQL);
            }
        }
     }
}

?>
