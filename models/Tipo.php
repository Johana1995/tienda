<?php

class Tipo extends Model
{
    public $id;
    public $descripcion;
    const table='tipo_cliente';
    public function listar(){
        $sql = 'SELECT * FROM '.self::table;
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Tipo');
    }

}