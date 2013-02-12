<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of comentarios
 *
 * @author Administrador
 */
class Comentarios extends CI_Model 
{
    function NewComentario($IdIncidencia, $TipoComentario, $Comentario)
    {
        $Salida = 0;
        
        $SQL = "INSERT INTO
                    `inc_comentarios`
                    (
                        `id_incidencia`, 
                        `tipo`, 
                        `comentario`
                     ) 
                VALUES 
                    (
                        '".$IdIncidencia."', 
                        '".$TipoComentario."', 
                        '".$Comentario."'
                     )";
        
        $this->db->query($SQL);
        
        if($this->db->affected_rows() != 1)
        {
            $Salida .= "Error al insertar el comentario";
        }   
        
        return $Salida;
    }
    
    function DelComentario($IdComentario)
    {
        $SQL = 'DELETE FROM  
                        inc_comentarios 
                WHERE 
                        id ='.$IdComentario.'';
                        
        $this->db->query($SQL);  
        
        $Salida = 0;
        
        if($this->db->affected_rows() != 1)
        {
            $Salida = "Error al borrar el Comentario. ";
        }
        
        return $Salida;
    }
    
    function GetComentarios($IdIncidencia)
    {
        $SQL ="SELECT 
                    inc_comentarios.id, 
                    inc_comentarios.fecha, 
                    inc_tipo_comentario.tipo_comentario, 
                    inc_comentarios.comentario
               FROM 
                    inc_tipo_comentario INNER JOIN 
                        (inc_comentarios INNER JOIN inc_incidencias 
                        ON inc_comentarios.id_incidencia = inc_incidencias.id) 
                    ON inc_tipo_comentario.id = inc_comentarios.tipo
               WHERE 
                    inc_incidencias.id='" . $IdIncidencia . "'";
                                    
        $query = $this->db->query($SQL);
         
        $Contador = 0;
               
        if ($query->num_rows() > 0)
        {   
            foreach ($query->result() as $row)
            {
                $Listado[$Contador]['IdComentario'] = $row->id;
                $Listado[$Contador]['FechaComentario'] = $row->fecha;
                $Listado[$Contador]['TipoComentario'] = $row->tipo_comentario;
                $Listado[$Contador]['Comentario'] = $row->comentario;
                
                $Contador++;
            }
        }
        else
        {
            $Listado[$Contador]['IdComentario'] = "";
            $Listado[$Contador]['FechaComentario'] = "";
            $Listado[$Contador]['TipoComentario'] = "";
            $Listado[$Contador]['Comentario'] = "";
        }
        
        return $Listado;
    }
    
    function NewTipoComentario($NuevoTipo)
    {
        $SQL = "INSERT INTO
                    `inc_tipo_comentario`   
                    (
                        `tipo_comentario`
                    ) 
                VALUES 
                    (
                        '".$NuevoTipo."'
                     )";
        
        $this->db->query($SQL);
        
        $Salida = 0;
        
        if($this->db->affected_rows() != 1)
        {
            $Salida = "Error al crear el nuevo tipo de comentario. ";
        }
        
        return $Salida;
    }
    
    function DelTipoComentario($IdTipoComentario)
    {
        $SQL = "DELETE FROM  
                        `inc_tipo_comentario`
                WHERE 
                        id ='".$IdTipoComentario."'";
                        
        $this->db->query($SQL);
        
        $Salida = 0;
        
        if($this->db->affected_rows() != 1)
        {
            $Salida = "Error al borrar el tipo de comentario. ";
        }
        
        return $Salida;
    }
    
    function GetTipoComentario()
    {
        $SQL = "SELECT 
                    inc_tipo_comentario.id, 
                    inc_tipo_comentario.tipo_comentario
                FROM 
                    inc_tipo_comentario;
                "; 
        
        $query = $this->db->query($SQL);
        
        $Listado['999'] = "Seleccione elemto";
        
        if ($query->num_rows() > 0)
        {
            foreach ($query->result() as $row)
            {
                $Listado[$row->id] = $row->tipo_comentario;
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
