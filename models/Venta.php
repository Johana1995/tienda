<?php
require 'models/ProductoVenta.php';
require 'models/Empleado.php';
require 'models/Cliente.php';
require 'models/Sucursal.php';

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
    public function empleado()
    {
        $sql = 'SELECT * FROM empleado ';
        $sql .= ' where id = ?';
        $params = [$this->empleado];
        $query = $this->db->prepare($sql);
        $query->execute($params);
        $query->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Empleado');
        return $query->fetch();
    }
    public function cliente()
    {
        $sql = 'SELECT * FROM cliente ';
        $sql .= ' where id = ?';
        $params = [$this->cliente];
        $query = $this->db->prepare($sql);
        $query->execute($params);
        $query->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Cliente');
        return $query->fetch();
    }
    public function sucursal()
    {
        $sql = 'SELECT * FROM sucursal ';
        $sql .= ' where id = ?';
        $params = [$this->sucursal];
        $query = $this->db->prepare($sql);
        $query->execute($params);
        $query->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Sucursal');
        return $query->fetch();
    }
    public function caja()
    {
        $sql = 'SELECT * FROM caja ';
        $sql .= ' where id = ?';
        $params = [$this->caja];
        $query = $this->db->prepare($sql);
        $query->execute($params);
        $query->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Caja');
        return $query->fetch();
    }
    public function productos(){
        $sql = 'SELECT p.id as producto,p.codigo,p.precioUnidadVenta as precioU,
       p.precioPackinVenta as precioP,q.cantUnidades as cantP,d.descripcion as depto,
       dv.cantidadUnidad As cantidadU,dv.cantidadPack as cantidadP
        FROM producto p,detalle_venta dv,departamento d,paquete q
        WHERE p.id=dv.producto and p.depto_id=d.id AND p.paquete_id=q.id 
              and dv.venta=?;';
        $params = [$this->id];
        $query = $this->db->prepare($sql);
        $query->execute($params);
        return $query->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'ProductoVenta');
    }
    public function anular(){

    }
    public function crear(){

    }
    public function buscar()
    {
        $sql = 'SELECT * FROM venta';
        $sql .= ' where id = ?';
        $params = [$this->id];
        $query = $this->db->prepare($sql);
        $query->execute($params);
        $query->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Venta');
        return $query->fetch();
    }

}