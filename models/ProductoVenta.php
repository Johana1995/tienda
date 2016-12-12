<?php

class ProductoVenta extends Model
{
    public $producto;
    public $codigo;
    public $precioU;
    public $precioP;
    public $cantP;
    public $depto;
    public $cantidadU;
    public $cantidadP;

    const table='detalle_venta';
    public function listar(){
        $sql = 'SELECT * FROM '.self::table;
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'ProductoVenta');
    }
}