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
    public function guardarProductos($venta_id)
    {
        $sucursal=User::singleton()->sucursal;
        $caja=User::singleton()->caja;
        $sql = "SELECT t.producto,t.unidad,t.paquete,p.precioPackinVenta as precioP,p.precioUnidadVenta as precioU
                FROM tmp_venta t, producto p
                WHERE t.producto=p.id and t.sucursal='".$sucursal."' and t.caja='".$caja."'";
        $query = $this->db->prepare($sql);
        $query->execute();
        $tmps=$query->fetchAll(PDO::FETCH_OBJ);

        $sentencia = $this->db->prepare("INSERT INTO detalle_venta (venta, producto,cantidadUnidad,cantidadPack,subtotal) VALUES (?, ?,?,?,?)");
        $sentencia->bindParam(1, $venta);
        $sentencia->bindParam(2, $producto);
        $sentencia->bindParam(3, $unid);
        $sentencia->bindParam(4, $pack);
        $sentencia->bindParam(5, $subt);

        $update = $this->db->prepare("UPDATE producto_sucursal set cantidadExistente=cantidadExistente-? ,
          cantidadPackExistente=cantidadPackExistente-? WHERE  producto=? and sucursal='".$sucursal."';");
        $update->bindParam(1, $_un);
        $update->bindParam(2, $_pac);
        $update->bindParam(3, $_prod);
        $total_venta=0;
        foreach ($tmps as $tmp):
            $venta=$venta_id;
            $producto = $tmp->producto;
            $_prod=$producto;
            $unid = $tmp->unidad;
            $_un=$unid;
            $pack=$tmp->paquete;
            $_pac=$pack;
            $precioP=$tmp->precioP;
            $precioU=$tmp->precioU;
            $subt=($precioP*$pack)+($precioU* $unid);
            $total_venta=$total_venta+$subt;
            $sentencia->execute();
            $update->execute();
            endforeach;


        $impuesto=2;
        $subtotal=number_format($total_venta,2,'.','');
        $total_iva=($subtotal * $impuesto )/100;
        $total_iva=number_format($total_iva,2,'.','');
        $total_venta_todo=$subtotal+$total_iva;

        $sql=null;
        $query=null;
        $sql = 'update venta';
        $sql .= ' set numero=?, subtotal=? ,descuento=?, iva=?,total=?  where id=? and sucursal=? and caja=? ';
        $params = ['Nª '.$venta_id,$subtotal,0,$impuesto,$total_venta_todo,$venta_id,$sucursal,$caja];
        $query = $this->db->prepare($sql);
        $query->execute($params);
        $sql=null;
        $query=null;
        try {


            $sql = 'DELETE FROM tmp_venta';
            $sql .= ' WHERE sucursal=? and caja=?';
            $params = [$sucursal,$caja];
            $query = $this->db->prepare($sql);
            $query->execute($params);
            return ($query->rowCount() != 0);
        }catch ( PDOException $e)
        {
            return false;
        }

    }
}