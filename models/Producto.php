<?php
require 'models/Departamento.php';
require 'models/Paquete.php';
require 'models/Imagen.php';
class Producto extends Model
{
    public $id;
    public $codigo;
    public $codigobarra;
    public $detalle;
    public $precioFabricaU;
    public $precioFabricaPack;
    public $imagen;
    public $precioUnidadVenta;
    public $precioPackinVenta;
    public $paquete_id;
    public $depto_id;

    const table='producto';
    public function listar()
    {
        $sql = 'SELECT * FROM '.self::table;
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Producto');
    }
    public function departamento()
    {
        $sql = 'SELECT * FROM departamento ';
        $sql .= ' where id = ?';
        $params = [$this->depto_id];
        $query = $this->db->prepare($sql);
        $query->execute($params);
        $query->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Departamento');
        return $query->fetch();
    }
    public function paquete()
    {
        $sql = 'SELECT * FROM paquete';
        $sql .= ' where id = ?';
        $params = [$this->paquete_id];
        $query = $this->db->prepare($sql);
        $query->execute($params);
        $query->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Paquete');
        return $query->fetch();
    }
    public function crear()
    {
        try {
            $sql = 'INSERT INTO producto (codigo,codigobarra,detalle,precioFabricaU,';
            $sql.='precioFabricaPack,imagen,precioUnidadVenta,precioPackinVenta,paquete_id,depto_id)';
            $sql .= ' VALUES (?,?,?,?,?,?,?,?,?,?)';
            $params = [$this->codigo,$this->codigobarra,$this->detalle,$this->precioFabricaU,$this->precioFabricaPack,
                    $this->imagen,$this->precioUnidadVenta,$this->precioPackinVenta,$this->paquete_id,$this->depto_id];
            $query = $this->db->prepare($sql);
            $query->execute($params);
            return ($query->rowCount() != 0);
        }catch ( PDOException $e)
        {
            return false;
        }
    }
    public function update()
    {
        try {
            $sql = 'UPDATE producto SET codigo=?, codigobarra=?,detalle=?,precioFabricaU=?,precioFabricaPack=?,imagen=?,';
            $sql.='precioUnidadVenta=?, precioPackinVenta=?, paquete_id=?,depto_id=?';
            $sql .= ' WHERE id=?';
            $params = [$this->codigo,$this->codigobarra,$this->detalle,$this->precioFabricaU,$this->precioFabricaPack,$this->imagen,
                        $this->precioUnidadVenta,$this->precioPackinVenta,$this->paquete_id,$this->depto_id,$this->id];
            $query = $this->db->prepare($sql);
            $query->execute($params);
            return ($query->rowCount() != 0);
        }catch ( PDOException $e)
        {
            return false;
        }
    }
    public function findById($id)
    {
        $sql = 'SELECT * FROM '.self::table;
        $sql .= ' where id = ?';
        $params = [$id];
        $query = $this->db->prepare($sql);
        $query->execute($params);
        $query->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Producto');
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
    public function imagenes(){
        $sql = 'SELECT * FROM imagen';
        $sql .= ' where producto_id = ?';
        $params = [$this->id];
        $query = $this->db->prepare($sql);
        $query->execute($params);
        return $query->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Imagen');
    }
    public function eliminarImagen($imagen_id){
        try {
            $sql = 'DELETE FROM imagen';
            $sql .= ' WHERE producto_id=? AND id=?';
            $params = [$this->id,$imagen_id];
            $query = $this->db->prepare($sql);
            $query->execute($params);
            return ($query->rowCount() != 0);
        }catch ( PDOException $e)
        {
            return false;
        }
    }
    public function addImagen($url){
        try {
            $sql = 'INSERT INTO imagen (url,producto_id)';
            $sql .= ' VALUES (?,?)';
            $params = [$url,$this->id];
            $query = $this->db->prepare($sql);
            $query->execute($params);
            return ($query->rowCount() != 0);
        }catch ( PDOException $e)
        {
            return false;
        }
    }
}