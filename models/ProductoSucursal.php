<?php
require 'models/Producto.php';

class ProductoSucursal extends Model
{
    public $id;
    public $codigo;
    public $detalle;
    public $precioPackinVenta;
    public $precioUnidadVenta;
    public $paquete_id;
    public $cantUnidades;
    public $depto_id;
    public $descripcion ;
    public $cantidadExistente;
    public $cantidadPackExistente;
    public $cantidadUnidadMinima;

    const table='producto_sucursal';
    public function listar($sucursal){
        $sql = 'SELECT * FROM producto_sucursal';
        $sql .= ' where sucursal = ?';
        $params = [$sucursal];
        $query = $this->db->prepare($sql);
        $query->execute($params);
        return $query->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'ProductoSucursal');

    }
    //este metodo devuelve productos que no estan agregados en la sucursal con id=sucursla del parametro
    public function otrosProductos($sucursal)
    {
        $sql = 'SELECT *
                from producto p
                where p.id NOT in (
                SELECT ps.producto
                from producto_sucursal ps, sucursal s
                WHERE ps.sucursal=s.id and s.id=?)';
        $params = [$sucursal];
        $query = $this->db->prepare($sql);
        $query->execute($params);
        return $query->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Producto');
    }
    public function addproducto($sucursal,$producto,$cantExis,$cantPackExis,$cantUMinima)
    {
        try {
            $sql = 'INSERT INTO '.self::table.' (producto,sucursal,cantidadExistente,cantidadPackExistente,';
            $sql.='cantidadUnidadMinima)';
            $sql .= ' VALUES (?,?,?,?,?)';
            $params = [$producto,$sucursal,$cantExis,$cantPackExis,$cantUMinima];
            $query = $this->db->prepare($sql);
            $query->execute($params);
            return ($query->rowCount() != 0);
        }catch ( PDOException $e)
        {
            return false;
        }
    }
    public function eliminarproducto($sucursal,$producto)
    {
        try {
            $sql = 'DELETE FROM '.self::table;
            $sql .= ' WHERE producto=? and sucursal=?';
            $params = [$producto,$sucursal];
            $query = $this->db->prepare($sql);
            $query->execute($params);
            return ($query->rowCount() != 0);
        }catch ( PDOException $e)
        {
            return false;
        }
    }
}