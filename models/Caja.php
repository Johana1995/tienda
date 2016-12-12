<?php


class Caja extends Model
{
    public $id;
    public $numero;
    public $montoinicial;
    public $sucursal;
    public $empleado;

    const table='caja';
    public function listar(){
        $sql = 'SELECT * FROM '.self::table;
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Caja');
    }
}