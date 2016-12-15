<?php


class ProductoCompra extends Model
{
    public $producto;
    public $codigo;
    public $precioU;
    public $precioP;
    public $cantP;
    public $depto;
    public $cantidadU;
    public $cantidadP;

    public function guardarProductos($venta_id)
    {
        $sucursal=User::singleton()->sucursal;
        $sql = "SELECT t.producto,t.unidad,t.paquete,p.precioPackinVenta as precioP,p.precioUnidadVenta as precioU
                FROM tmp_compra t, producto p
                WHERE t.producto=p.id and t.sucursal='".$sucursal."'";
        $query = $this->db->prepare($sql);
        $query->execute();
        $tmps=$query->fetchAll(PDO::FETCH_OBJ);

        $sentencia = $this->db->prepare("INSERT INTO detalle_compra (producto, compra,cantidadUnidad,cantidadPack) VALUES (?,?,?,?)");
        $sentencia->bindParam(1, $prod);
        $sentencia->bindParam(2, $comp);
        $sentencia->bindParam(3, $unid);
        $sentencia->bindParam(4, $pack);

        $update = $this->db->prepare("UPDATE producto_sucursal set cantidadExistente=cantidadExistente+? ,
          cantidadPackExistente=cantidadPackExistente+? WHERE  producto=? and sucursal='".$sucursal."';");
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



        $sql=null;
        $query=null;
        $sql = 'update compra';
        $sql .= ' set numero=?, total=?  where id=? and sucursal=? ';
        $params = ['Nª '.$venta_id,$total_venta,$venta_id,$sucursal];
        $query = $this->db->prepare($sql);
        $query->execute($params);
        $sql=null;
        $query=null;
        try {


            $sql = 'DELETE FROM tmp_compra';
            $sql .= ' WHERE sucursal=? ';
            $params = [$sucursal];
            $query = $this->db->prepare($sql);
            $query->execute($params);
            return ($query->rowCount() != 0);
        }catch ( PDOException $e)
        {
            return false;
        }

    }
    public function limpiar()
    {
        try {
            $sucursal=User::singleton()->sucursal;

            $sql = 'DELETE FROM tmp_compra';
            $sql .= ' WHERE sucursal=? ';
            $params = [$sucursal];
            $query = $this->db->prepare($sql);
            $query->execute($params);
            return ($query->rowCount() != 0);
        }catch ( PDOException $e)
        {
            return false;
        }
    }

}