<?php

class Cargo extends Model
{
    public $id;
    public $nombre;
    public $descripcion;
    const table='cargo';
    public function listar(){
        $sql = 'SELECT * FROM '.self::table;
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Cargo');
    }
    public function crear()
    {
        try {
            $sql = 'INSERT INTO cargo (nombre,descripcion)';
            $sql .= ' VALUES (?,?)';
            $params = [$this->nombre,$this->descripcion];
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
            $sql = 'UPDATE cargo SET nombre=?, descripcion=?';
            $sql .= ' WHERE id=?';
            $params = [$this->nombre,$this->descripcion,$this->id];
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
        $query->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Cargo');
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