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

    public function tempProductos()
    {

        $sucursal=User::singleton()->sucursal;
        $caja=User::singleton()->caja;

        $sql = 'SELECT p.id,p.codigo,p.detalle,p.precioPackinVenta,p.precioUnidadVenta,
               q.cantUnidades as paquete,d.descripcion as depto,ps.cantidadExistente,
               ps.cantidadPackExistente,ps.cantidadUnidadMinima
                from producto p, producto_sucursal ps,departamento d,paquete q
                where p.id=ps.producto and ps.sucursal=? and p.paquete_id=q.id and d.id=p.depto_id';
        $params = [$sucursal];
        $query = $this->db->prepare($sql);
        $query->execute($params);
        return $query->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'ProductoVenta');
    }
}