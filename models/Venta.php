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
        $sql = 'SELECT p.id as persona_id,p.apellido,p.nombre,p.direccion,p.nacimiento,p.genero_id,
          e.id as empleado_id,e.correo,e.username , e.password,e.rol_id,g.descripcion as genero,c.nombre as cargo
          from persona p, empleado e,genero g,cargo c
          WHERE p.id=e.persona_id and g.id=p.genero_id and c.id=e.rol_id and e.id=?';
        $params = [$this->empleado];
        $query = $this->db->prepare($sql);
        $query->execute($params);
        $query->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Empleado');
        return $query->fetch();
    }
    public function cliente()
    {
        $sql = 'SELECT p.id as persona_id,p.apellido,p.nombre,p.direccion,p.nacimiento,p.genero_id,
            c.id as cliente_id,c.nit,c.fecha_creacion , c.tipo_id,g.descripcion as genero,t.descripcion as tipo
            from persona p, cliente c,genero g,tipo_cliente t
            WHERE p.id=c.persona_id and g.id=p.genero_id and t.id=c.tipo_id and c.id=?;';
        $params = [$this->cliente];
        $query = $this->db->prepare($sql);
        $query->execute($params);
        return $query->fetch(PDO::FETCH_OBJ);
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
        $sql = 'SELECT p.id, p.detalle as producto,p.codigo,p.precioUnidadVenta as precioU,p.precioPackinVenta as precioP
,q.cantUnidades as cantP,d.descripcion as depto, dv.cantidadPack as cantidadP,dv.cantidadUnidad as cantidadU,
dv.subtotal 
FROM detalle_venta dv, producto p,departamento d,paquete q
WHERE dv.producto=p.id and p.depto_id=d.id and p.paquete_id=q.id and dv.venta=?;';
        $params = [$this->id];
        $query = $this->db->prepare($sql);
        $query->execute($params);
        return $query->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'ProductoVenta');
    }
    public function anular(){

    }
    public function save(){

        try {
            $sql = 'INSERT INTO venta (numero,fechahora,subtotal,descuento,iva,cliente,empleado,caja,sucursal,anulado)';
            $sql .= ' VALUES (?,?,?,?,?,?,?,?,?,?)';
            $params = [$this->numero,$this->fechahora,$this->subtotal,$this->descuento,$this->iva,$this->cliente,$this->empleado,$this->caja,$this->sucursal,$this->anulado];
            $query = $this->db->prepare($sql);
            if(!$query->execute($params)) {
                return false;
            }
            return $this->db->lastInsertId();

        }catch ( PDOException $e)
        {
            return false;
        }
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