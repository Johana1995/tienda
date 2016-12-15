<?php

class Proveedor extends Model
{

    public $id;
    public $nit;
    public $encargado;
    public $ubicacion;
    public $email;
    public $sitioweb;
    public $telefono;

    const table='proveedor';
    public function listar()
    {
        $sql = 'SELECT * FROM '.self::table;
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Proveedor');
    }
}