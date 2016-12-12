<?php
require 'models/ProductoSucursal.php';
require 'models/Caja.php';

class Sucursal extends Model
{
    public $id;
    public $numero;
    public $direccion;
    public $nombre;
    const table='sucursal';

    public function listar(){
        $sql = 'SELECT * FROM '.self::table;
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Sucursal');
    }
    public function productos()
    {
        $sql = 'SELECT p.id,p.codigo,p.detalle,p.precioPackinVenta,p.precioUnidadVenta,
              p.paquete_id,pq.cantUnidades,p.depto_id,d.descripcion, ps.cantidadExistente,ps.cantidadPackExistente,
              ps.cantidadUnidadMinima
            from sucursal s, producto p,producto_sucursal ps,paquete pq,departamento d
            WHERE s.id=ps.sucursal and p.id=ps.producto and p.paquete_id=pq.id and
                  p.depto_id=d.id and s.id=?;';
        $params = [$this->id];
        $query = $this->db->prepare($sql);
        $query->execute($params);
        return $query->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'ProductoSucursal');
    }
    public function buscar()
    {
        $sql = 'SELECT * FROM sucursal';
        $sql .= ' where id = ?';
        $params = [$this->id];
        $query = $this->db->prepare($sql);
        $query->execute($params);
        $query->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Sucursal');
        return $query->fetch();
    }
    public function cajas()
    {
        $sql = 'SELECT * FROM caja';
        $sql .= ' where sucursal = ?';
        $params = [$this->id];
        $query = $this->db->prepare($sql);
        $query->execute($params);
        $query->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Caja');
        return $query->fetch();
    }
    public function eliminar(){
        try {
            $sql = 'DELETE FROM '.self::table;
            $sql .= ' WHERE id=?';
            $params = [$this->id];
            $query = $this->db->prepare($sql);
            $query->execute($params);
            return ($query->rowCount() != 0);
        }catch ( PDOException $e)
        {
            return false;
        }
    }
    public function crear(){
        try {
            $sql = 'INSERT INTO sucursal (numero,direccion,nombre)';
            $sql .= ' VALUES (?,?,?)';
            $params = [$this->numero,$this->direccion,$this->nombre];
            $query = $this->db->prepare($sql);
            $query->execute($params);
            return ($query->rowCount() != 0);
        }catch ( PDOException $e)
        {
            return false;
        }
    }
}