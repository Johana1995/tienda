<?php
require 'models/ProductoCompra.php';
require 'models/Proveedor.php';
require 'models/Empleado.php';
require 'models/Sucursal.php';
class Compra extends Model
{

    public $id;
    public $numero;
    public $fechahora;
    public $total;
    public $empleado;
    public $proveedor;
    public $caja;
    public $sucursal;

    const table='compra';


    public function listar(){
        $sql = 'SELECT * FROM '.self::table;
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Compra');
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
    public function proveedor()
    {
        $sql = 'SELECT * FROM proveedor ';
        $sql .= ' where id = ?';
        $params = [$this->proveedor];
        $query = $this->db->prepare($sql);
        $query->execute($params);
        $query->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Proveedor');
        return $query->fetch();
    }
    public function buscar()
    {
        $sql = 'SELECT * FROM compra';
        $sql .= ' where id = ?';
        $params = [$this->id];
        $query = $this->db->prepare($sql);
        $query->execute($params);
        $query->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Compra');
        return $query->fetch();
    }
    public function productos(){
        $sql = 'SELECT p.id, p.detalle as producto,p.codigo,p.precioFabricaU as precioU,p.precioFabricaPack as precioP
  ,q.cantUnidades as cantP,d.descripcion as depto, dv.cantidadPack as cantidadP,dv.cantidadUnidad as cantidadU
FROM detalle_compra dv, producto p,departamento d,paquete q
WHERE dv.producto=p.id and p.depto_id=d.id and p.paquete_id=q.id and dv.compra=?;';
        $params = [$this->id];
        $query = $this->db->prepare($sql);
        $query->execute($params);
        return $query->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'ProductoCompra');
    }
    public function save(){

        try {
            $sql = 'INSERT INTO compra (numero,fechahora,total,empleado,proveedor,sucursal)';
            $sql .= ' VALUES (?,?,?,?,?,?)';
            $params = [$this->numero,$this->fechahora,$this->total,$this->empleado,$this->proveedor,$this->sucursal];
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
}