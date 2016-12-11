<?php

class Cargo extends Model
{
    public $id;
    public $nombre;
    public $descripcion;
    const table='cargo';
    public function listar(){
        $sql = 'SELECT * FROM '.self::table;
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Cargo');
    }
}