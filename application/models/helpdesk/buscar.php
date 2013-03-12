<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of buscar
 *
 * @author Administrador
 */

class Buscar extends CI_Model 
{
   function ConsultaGeneral($Condicones)
   {
       $SQL = "SELECT 
                    inc_incidencias.id
               FROM 
                    inc_parte INNER JOIN 
                    (
                        inc_elementos INNER JOIN 
                        (
                            inc_remedys INNER JOIN 
                            (
                                inc_comentarios INNER JOIN 
                                (
                                    inc_estados INNER JOIN 
                                    (
                                        inc_aplicacion INNER JOIN 
                                        (
                                            inc_servicio INNER JOIN 
                                            (
                                                inc_area INNER JOIN inc_incidencias 
                                                ON inc_area.id = inc_incidencias.area
                                            ) 
                                            ON inc_servicio.servicio = inc_incidencias.servicio
                                        ) 
                                        ON inc_aplicacion.aplicacion = inc_incidencias.aplicacion
                                    ) 
                                    ON inc_estados.id = inc_incidencias.estado
                                ) 
                                ON inc_comentarios.id_incidencia = inc_incidencias.id
                            ) 
                            ON inc_remedys.id_incidencia = inc_incidencias.id
                        ) 
                        ON inc_elementos.id_incidencia = inc_incidencias.id
                    )
                    ON inc_parte.id_incidencia = inc_incidencias.id" . $Condicones;
       
       $query = $this->db->query($SQL);
        
        $Contador = 0;
        
        if ($query->num_rows() > 0)
        {
            foreach ($query->result() as $row)
            {
                $Listado[$Contador] = $row->id;
                $Contador++;
            }
        }
        else 
        {
            $Listado[0] = 0;
        }
        
        return $Listado;
   }
   
   function CantidadConsultaGeneral($Condicones)
   {
       $SQL = "SELECT 
                    inc_incidencias.id
               FROM 
                    inc_parte INNER JOIN 
                    (
                        inc_elementos INNER JOIN 
                        (
                            inc_remedys INNER JOIN 
                            (
                                inc_comentarios INNER JOIN 
                                (
                                    inc_estados INNER JOIN 
                                    (
                                        inc_aplicacion INNER JOIN 
                                        (
                                            inc_servicio INNER JOIN 
                                            (
                                                inc_area INNER JOIN inc_incidencias 
                                                ON inc_area.id = inc_incidencias.area
                                            ) 
                                            ON inc_servicio.servicio = inc_incidencias.servicio
                                        ) 
                                        ON inc_aplicacion.aplicacion = inc_incidencias.aplicacion
                                    ) 
                                    ON inc_estados.id = inc_incidencias.estado
                                ) 
                                ON inc_comentarios.id_incidencia = inc_incidencias.id
                            ) 
                            ON inc_remedys.id_incidencia = inc_incidencias.id
                        ) 
                        ON inc_elementos.id_incidencia = inc_incidencias.id
                    )
                    ON inc_parte.id_incidencia = inc_incidencias.id" . $Condicones;
       
       $query = $this->db->query($SQL);
        
       return $query->num_rows();
   }
   
   function BuscarPorComentario($Datos)
   {
       $SQL = "SELECT 
                    inc_comentarios.id_incidencia 
                FROM 
                    inc_comentarios
                WHERE 
                    inc_comentarios.comentario
                    LIKE
                     %".$Datos."%";
       
       $query = $this->db->query($SQL);
        
        $Contador = 0;
        
        if ($query->num_rows() > 0)
        {
            foreach ($query->result() as $row)
            {
                $Listado[$Contador] = $row->id;
                $Contador++;
            }
        }
        else 
        {
            $Listado[0] = 0;
        }
        
        return $Listado;
   }
   
   function CantidadPorComentario($Datos)
   {
       $SQL = "SELECT 
                    inc_comentarios.id_incidencia 
                FROM 
                    inc_comentarios
                WHERE 
                    inc_comentarios.comentario
                    LIKE
                     '.$Datos.'";
       
       $query = $this->db->query($SQL);
        
        $Contador = 0;
        
        if ($query->num_rows() > 0)
        {
            foreach ($query->result() as $row)
            {
                $Listado[$Contador] = $row->id;
                $Contador++;
            }
        }
        else 
        {
            $Listado[0] = 0;
        }
        
        return $Listado;
   }
   
   
}

?>
