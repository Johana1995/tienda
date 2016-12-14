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
    public function listar($sucursal){
        $sql = 'SELECT p.id as producto, p.codigo,p.precioUnidadVenta as precioU,p.precioPackinVenta as precioP,
           q.cantUnidades as cantP, d.descripcion as depto, dv.cantidadUnidad as cantidadU,
           dv.cantidadPack as cantidadP
          FROM detalle_venta dv, producto p, departamento d,paquete q
          WHERE dv.producto=p.id and d.id=p.depto_id and p.paquete_id=q.id and dv.venta=?;';
        $params = [$sucursal];
        $query = $this->db->prepare($sql);
        $query->execute($params);
        return $query->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'ProductoVenta');
    }
    public function addproducto($producto)
    {
        try {
            $sucursal=User::singleton()->sucursal;
            $caja=User::singleton()->caja;
            $sql = 'INSERT INTO tmp_venta (sucursal,caja,producto,paquete,unidad)';
            $sql .= ' VALUES (?,?,?,?,?)';
            $params = [$sucursal,$caja,$producto,0,0];
            $query = $this->db->prepare($sql);
            $query->execute($params);
            return ($query->rowCount() != 0);
        }catch ( PDOException $e)
        {
            return false;
        }
    }
    public function removeProducts($producto)
    {
        try {
            $sucursal=User::singleton()->sucursal;
            $caja=User::singleton()->caja;
            $sql = 'INSERT INTO tmp_venta (sucursal,caja,producto,paquete,unidad)';
            $sql .= ' VALUES (?,?,?,?,?)';
            $params = [$sucursal,$caja,$producto,0,0];
            $query = $this->db->prepare($sql);
            $query->execute($params);
            return ($query->rowCount() != 0);
        }catch ( PDOException $e)
        {
            return false;
        }
    }
    public function tempProductos()
    {

        $sucursal=User::singleton()->sucursal;
        $caja=User::singleton()->caja;

        $sql = 'SELECT p.id as producto, p.codigo,p.precioUnidadVenta as precioU,p.precioPackinVenta as precioP,
       q.cantUnidades as cantP, d.descripcion as depto, t.unidad as cantidadU,
       t.paquete as cantidadP
        FROM tmp_venta t, producto p, departamento d,paquete q
        WHERE t.producto=p.id and d.id=p.depto_id and p.paquete_id=q.id and t.sucursal=? and t.caja=?;';
        $params = [$sucursal,$caja];
        $query = $this->db->prepare($sql);
        $query->execute($params);
        return $query->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'ProductoVenta');
    }
}