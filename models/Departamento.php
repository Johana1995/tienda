<?php

class Departamento extends Model
{
    public $id;
    public $descripcion;
    const table='departamento';
    public function listar()
    {
        $sql = 'SELECT * FROM '.self::table;
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Departamento');
    }
}