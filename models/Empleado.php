<?php

require 'models/Persona.php';

class Empleado extends Model
{
    public $persona_id;
    public $id;
    public $correo;
    public $username;
    public $password;
    public $rol_id;

    const table='empleado';
    public function listar()
    {
        $sql = 'SELECT * FROM '.self::table;
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Empleado');
    }
    public function persona()
    {
        $sql = 'SELECT * FROM persona ';
        $sql .= ' where id = ?';
        $params = [$this->persona_id];
        $query = $this->db->prepare($sql);
        $query->execute($params);
        $query->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Persona');
        return $query->fetch();
    }
    public function crear()
    {

        try {
            
            $sql = 'INSERT INTO '.self::table.' (codigo,codigobarra,detalle,precioFabricaU,';
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
}