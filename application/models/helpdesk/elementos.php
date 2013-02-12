<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of elementos
 *
 * @author Administrador
 */
class Elementos extends CI_Model 
{
    function NewElemento($IdIncidencia, $TipoElemento, $Elemento)
    {
        $Salida = 0;
        
        $SQL = "INSERT INTO
                    `inc_elementos`
                    (
                        `id_incidencia`, 
                        `tipo_elemento`, 
                        `dato`
                     ) 
                VALUES 
                    (
                        '".$IdIncidencia."', 
                        '".$TipoElemento."', 
                        '".$Elemento."'
                     )";
        
        $this->db->query($SQL);
        
        if($this->db->affected_rows() != 1)
        {
            $Salida .= "Error al insertar el nuevo elementos. ";
        }
        
        return $Salida;
    }
    
    function DelElemento($IdElemento)
    {
        $SQL = 'DELETE FROM  
                        inc_elementos 
                WHERE 
                        id ='.$IdElemento.'';
                        
        $this->db->query($SQL);  
        
        $Salida = 0;
        
        if($this->db->affected_rows() != 1)
        {
            $Salida = "Error al borrar el elemento. ";
        }
        
        return $Salida;
    }
    
     function GetElementos($IdIncidencia)
    {
        $SQL ="SELECT
                    inc_elementos.id, 
                    inc_tipo_elemento.tipo_elemento, 
                    inc_elementos.dato
               FROM 
                    inc_tipo_elemento INNER JOIN
                        (inc_elementos INNER JOIN inc_incidencias 
                        ON inc_elementos.id_incidencia = inc_incidencias.id) 
                    ON inc_tipo_elemento.id = inc_elementos.tipo_elemento
               WHERE 
                    inc_incidencias.id='".$IdIncidencia."'";
                                    
        $query = $this->db->query($SQL);
        
        $Contador = 0;
        
        if ($query->num_rows() > 0)
        {
            foreach ($query->result() as $row)
            {
                $Listado[$Contador]['IdElemento'] = $row->id;
                $Listado[$Contador]['TipoElemento'] = $row->tipo_elemento;
                $Listado[$Contador]['Elemento'] = $row->dato;
                
                $Contador++;
            }
        }
        else
            {
                $Listado[$Contador]['IdElemento'] = "";                    
                $Listado[$Contador]['TipoElemento'] = "";
                $Listado[$Contador]['Elemento'] = "";
            }
            
        return $Listado;
    }
    
    function NewTipoElemento($NuevoTipo)
    {
        $SQL = "INSERT INTO
                    `inc_tipo_elemento`  
                    (
                        `tipo_elemento`
                    ) 
                VALUES 
                    (
                        '".$NuevoTipo."'
                     )";
        
        $this->db->query($SQL);
        
        $Salida = 0;
        
        if($this->db->affected_rows() != 1)
        {
            $Salida = "Error al crear el nuevo tipo elemento ";
        }
        
        return $Salida;
    }
    
    function DelTipoElemento($IdTipoElemento)
    {
         $SQL = 'DELETE FROM  
                        `inc_tipo_elemento`
                WHERE 
                        id ='.$IdTipoElemento.'';
                        
        $this->db->query($SQL);
        
        $Salida = 0;
        
        if($this->db->affected_rows() != 1)
        {
            $Salida = "Error al borrar el tipo de elemento. ";
        }
        
        return $Salida;
    }
    
    function GetTipoElemento()
    {
        $SQL = "SELECT 
                    inc_tipo_elemento.id, 
                    inc_tipo_elemento.tipo_elemento 
                FROM 
                    inc_tipo_elemento"; 
        
        $query = $this->db->query($SQL);
        
        $Listado['999'] = "Seleccione elemto";
        
        if ($query->num_rows() > 0)
        {
            foreach ($query->result() as $row)
            {
                $Listado[$row->id] = $row->tipo_elemento;
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
