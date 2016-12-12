<?php
require 'models/ProductoVenta.php';
require 'models/Venta.php';
class Venta extends Model
{
    public $id;//prim
    public $numero;
    public $fechahora;
    public $subtotal;
    public $descuento;
    public $iva;
    public $cliente;
    public $empleado;
    public $caja;//prim
    public $sucursal;//prim
    public $anulado;

    const table='venta';
    public function listar(){
        $sql = 'SELECT * FROM '.self::table;
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Venta');
    }
    public function productos(){

    }
    public function anular(){

    }
    public function crear(){

    }
    public function buscar()
    {
        $sql = 'SELECT * FROM '.self::table;
        $sql .= ' where id = ?';
        $params = [$this->id];
        $query = $this->db->prepare($sql);
        $query->execute($params);
        $query->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Venta');
    }
}